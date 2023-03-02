<?php

require_once "conn.php";

$customer_name = $_POST['name'];
$customer_email = $_POST['email'];
$customer_email = $_POST['phone'];
$product_name = $_POST['product_name'];
$product_price = $_POST['total_price'];

// Insert the order details into the database
$sql = "INSERT INTO orders (customer_name, customer_email, product_name, product_price) 
        VALUES ('$customer_name', '$customer_email', '$product_name', $product_price)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Order placed successfully!";
} else {
    echo "Error placing order.";
}
