<?php

session_start();
require_once('config/config.php');


$user_id = $_SESSION['user_id'];


// Read the payload from the request body
$input = file_get_contents("php://input");
$event = json_decode($input, true);

// Ensure the event is valid
if (isset($event['data']['type']) && $event['data']['type'] === 'payment_intent' && isset($event['data']['attributes']['status'])) {
    $payment_intent_id = $event['data']['id'];
    $status = $event['data']['attributes']['status'];
    $amount = $event['data']['attributes']['amount'];

    if ($status === 'succeeded') {
        // Handle successful payment
        // Save transaction details to your database for future reference
        // Example function: storeTransaction($payment_intent_id, $amount);
        storeTransaction($payment_intent_id, $user_id, $amount);

        // Respond with HTTP 200 to acknowledge receipt of the webhook
        http_response_code(200);
        echo json_encode(['status' => 'success']);
    } else {
        // Handle other statuses as needed
        http_response_code(400);
        echo json_encode(['status' => 'failed', 'message' => 'Unhandled status: ' . $status]);
    }
} else {
    // Invalid event
    http_response_code(400);
    echo json_encode(['status' => 'failed', 'message' => 'Invalid event']);
}

// Function to store transaction details
function storeTransaction($payment_intent_id, $user_id, $amount) {

    try {
        global $db;

        $stmt = $db->prepare("INSERT INTO transactions (payment_intent_id, user_id, amount) VALUES (:payment_intent_id, :user_id, :amount)");
        $stmt->execute(
                        ['payment_intent_id' => $payment_intent_id, 
                         'user_id' => $user_id,
                         'amount' => $amount
                        ]);

        // Add additional logic if needed, such as sending a confirmation email
    } catch (PDOException $e) {
        error_log("Error storing transaction: " . $e->getMessage());
    }
}
