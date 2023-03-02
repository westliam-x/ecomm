<?php

function paystack_payment($transaction_reference, $total_price, $email)
{
  $url = 'https://api.paystack.co/transaction/initialize';

  $headers = array(
    'Authorization: Bearer <PAYSTACK_SECRET_KEY>',
    'Content-Type: application/json'
  );

  $data = array(
    'amount' => $total_price * 100, // Convert price to kobo (Paystack's minimum unit)
    'email' => $email,
    'reference' => $transaction_reference,
    'callback_url' => 'https://example.com/paystack_callback.php',
  );

  $data_string = json_encode($data);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  curl_close($ch);

  return json_decode($response, true);
}

function generate_transaction_reference()
{
  $reference = 'TX' . time(); // Use current timestamp as unique reference
  return $reference;
}
