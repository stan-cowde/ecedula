<?php

$ch = curl_init();

$url = 'https://api.paymongo.com/v1/payment_intents';
$api_key = 'pk_test_b864EJQ9GP5mepGx16hr3VnB'; 

$headers = [
    'Accept: application/json',
    'Authorization: Basic ' . base64_encode($api_key),
    'Content-Type: application/json',
];

$data = [
    'data' => [
        'attributes' => [
            'amount' => 10000,
            'payment_method_allowed' => [
                'gcash',
                'paymaya',
            ],
            'payment_method_options' => [
                'card' => [
                    'request_three_d_secure' => 'any',
                ],
            ],
            'currency' => 'PHP',
            'capture_type' => 'automatic',
            'description' => 'Your internal description',
            'statement_descriptor' => 'Statement',
            'metadata' => [
                'key' => 'value',
                'key2' => 'value',
            ],
        ],
    ],
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo 'Response:' . $response;
}

curl_close($ch);
