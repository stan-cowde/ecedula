<?php


/**
 * 
 * In case gusto mo og Checkout Page na gi provide ni paymongo 
 * para dili na mnual mag buhat og checkout page nato
 * 
 */

 //test key ni benz
$api_key = 'sk_test_pg5oqsNATMue2mZCFQvtDcMY'; 

$headers = [
    'Accept: application/json',
    'Authorization: Basic ' . base64_encode($api_key),
    'Content-Type: application/json',
];



if ($_SERVER['REQUEST_METHOD'] === 'POST' && (! empty($_POST['amount']))) 
{
    //centavos conversion 
    $amount = intval($_POST['amount']) * 100;
                

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
                            'send_email_receipt' => false,
                            'show_description' => true,
                            'show_line_items' => true,
                            'success_url' => 'http://localhost/ecedula/testSuccess.php',
                            'cancel_url' => 'http://localhost/ecedula/cancel.php',
                            'line_items' => [
                                    [
                                        'currency' => 'PHP',
                                        'amount' => $amount,
                                        'name' => 'cedula',
                                        'quantity' => 1
                                    ]
                            ],
                            'description' => 'Joana olarte company',
                            'payment_method_types' => [
                                            'gcash',
                                            'paymaya'
                            ]
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


