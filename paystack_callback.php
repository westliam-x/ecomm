<?php

$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_PAYSTACK_SIGNATURE'];

// Verify webhook signature
if ($signature !== hash_hmac('sha512', $payload, '<PAYSTACK_WEBHOOK_SECRET>')) {
    exit();
}

$event = json_decode($payload, true);

if ($event['event'] === 'charge.success') {
    $transaction_reference = $event['data']['reference'];
    // Update your database here to mark the order as paid
}
