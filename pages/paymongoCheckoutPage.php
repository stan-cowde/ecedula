<?php


/**
 * 
 * In case gusto mo og Checkout Page na gi provide ni paymongo 
 * para dili na mnual mag buhat og checkout page nato
 * 
 */

session_start();
require_once '../config/config.php';

$id = $_SESSION['user_id'];

$query = $db->prepare("SELECT * FROM users WHERE id = :user_id");
$query->execute(['user_id' => $_SESSION['user_id']]);
$users = $query->fetchAll(PDO::FETCH_ASSOC);
$name = $users[0]['firstname'] . ' ' . $users[0]['lastname'];
$email = $users[0]['email'];


 //test key ni benz or pwede ibutang inyong sekret key diri
$api_key = 'sk_test_pg5oqsNATMue2mZCFQvtDcMY'; 

$headers = [
    'Accept: application/json',
    'Authorization: Basic ' . base64_encode($api_key),
    'Content-Type: application/json',
];


if ($_SERVER['REQUEST_METHOD'] === 'GET' && (! empty($_GET['amount']))) 
{

    $cedula_amount = calculateCedulaPayment($_GET['amount']);

    //calculate with additional fee
    $amount = floatval($cedula_amount);
    $paymongo_fee = 2.5;
    $totalAmount = $amount + ($amount * ($paymongo_fee / 100));


    //centavos conversion for final amount
    $finalAmount = intval($totalAmount * 100);


    //transaction ID
    $transactionID = generateTransactionID();

    
    //make transaction record
    $stmt = $db->prepare("INSERT INTO transactions (user_id, transaction_code, amount, created_at) VALUES (:user_id, :transaction_code, :amount, NOW())");
    $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':transaction_code', $transactionID, PDO::PARAM_STR);
    $stmt->bindParam(':amount', $finalAmount, PDO::PARAM_INT);
    $stmt->execute();
                

    //create checkout
            $ch = curl_init('https://api.paymongo.com/v1/checkout_sessions');
            curl_setopt_array($ch, [
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'data' => [
                            'attributes' => [
                                    "email" => $email,
                                    "name" => $name,
                                    'send_email_receipt' => true,
                                    'show_description' => true,
                                    'show_line_items' => true,
                                    'success_url' => "http://localhost/ecedula/pages/testSuccess.php?amount={$finalAmount}&transactionID={$transactionID}&name={$name}",
                                    'cancel_url' => 'http://localhost/ecedula/pages/create-payment.php',
                                    'line_items' => [
                                            [
                                                'currency' => 'PHP',
                                                'amount' => $finalAmount,
                                                'name' => 'cedula',
                                                'quantity' => 1
                                            ]
                                    ],
                                    'description' => 'Joana olarte company',
                                    'payment_method_types' => [
                                                    'gcash',
                                                    'paymaya'
                                    ],
                            ]
                        ]
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "accept: application/json",
                        "authorization: Basic ". base64_encode($api_key)
                    ],
            ]);

            $joana = curl_exec($ch);


            if (curl_errno($ch)){
                    echo 'Error:' . curl_error($ch);
            } 
             else 
                {
                    $respo = json_decode($joana);
                    //id para sa uban functions na i-customize
                    // $id = $respo->data->id;
                    if ($respo->data->attributes->checkout_url) {
                        $joana_redirect = $respo->data->attributes->checkout_url;

                        //redirect siya sa checkout
                        header('Location: '. $joana_redirect);
                        exit;
                    }else{
                        echo 'Error: Unable to get checkout URL';
                        exit;
                    }
                }

           
}
else {
    echo 'Error: Amount is required';
    exit;
}


function generateTransactionID()
{
    return "T" . date("Y") . "-" . uniqid();
}


function calculateCedulaPayment($annual_income) 
{
    
    $basic_tax = 5.00;

    $income_tax = ceil($annual_income / 1000) * 1.00;

    $fixed_fee = 7.70; 

    $total_cedula_payment = $basic_tax + $income_tax + $fixed_fee;

    return $total_cedula_payment;

}