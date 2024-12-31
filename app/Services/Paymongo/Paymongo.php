<?php

namespace App\Services\Paymongo;

use Illuminate\Support\Facades\Http;

class Paymongo {

    private $Key = '';
    private $amount = 0;

    public function __construct($amount, $key = 'sk_test_pg5oqsNATMue2mZCFQvtDcMY')
    {
            $this->Key = $key;
            $this->amount = $amount;

            #abort_if(404, empty($amount), 'No Amount Declared');
    }

    public function redirectToPaymongoCheckout()
    {

        $name = \Auth::user()->firstname . ' ' . \Auth::user()->lastname;

        $finalAmount = (int) ($this->amount * 100);

        $transactionID = uuid_create();


        $ch = curl_init('https://api.paymongo.com/v1/checkout_sessions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'data' => [
                    'attributes' => [
                        "email" => \Auth::user()->email,
                        "name" => $name,
                        'send_email_receipt' => true,
                        'show_description' => true,
                        'show_line_items' => true,
                        'success_url' => route('user.checkout.success', [
                                                                                'amount' => $finalAmount,
                                                                                'transactionID' => $transactionID,
                                                                                'user_id' => \Auth::user()->id
                                                                            ]),
                        'cancel_url' => route('user.create-payment'),
                        'line_items' => [
                            [
                                'currency' => 'PHP',
                                'amount' => $finalAmount,
                                'name' => 'cedula',
                                'quantity' => 1
                            ]
                        ],
                        'description' => 'E-cedula Company',
                        'payment_method_types' => [
                            'gcash',
                            'paymaya'
                        ],
                    ]
                ]
            ]),
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Authorization: Basic ' . base64_encode($this->Key),
                'Content-Type: application/json',
            ],
        ]);

        $roseAnn = curl_exec($ch);

        #dd($roseAnn);

        if (curl_errno($ch)){
            echo 'Error:' . curl_error($ch);
        }
        else
        {
            $respo = json_decode($roseAnn);

            //id para sa uban functions na i-customize
            // $id = $respo->data->id;

            if ($respo->data->attributes->checkout_url) {
                $roseAnn_redirect = $respo->data->attributes->checkout_url;

                //redirect siya sa checkout
                header('Location: '. $roseAnn_redirect);
                exit;
            }else{
                echo 'Error: Unable to get checkout URL: ' . $roseAnn;
                exit;
            }
        }
    }


}
