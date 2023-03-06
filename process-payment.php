<?php
session_start();
require_once 'vendor/autoload.php'; // Include the Paystack PHP library

$paystack = new Yabacon\Paystack('sk_test_20d999997a6fdbf1f5161478b52df786f38d9196'); // Replace with your secret key

$ref = $_GET['reference'];

$transaction = $paystack->transaction->verify([
    'reference' => $ref,
]);

if ($transaction->data->status == 'success') {
    // Payment successful, update your database or take any other actions
    $status = $transaction->data->status;
    header("location: success.php");
} else {
    // Payment failed, take appropriate actions
    echo "Payment failed";
}

require_once 'conn.php';
$id = $_SESSION["id"];

// Insert the order details into the database
$sql = "UPDATE orders SET reference ='$ref', order_status = '$status' WHERE user_id = '$id' ";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
