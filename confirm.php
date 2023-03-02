<?php
session_start();
require_once "conn.php";

$total = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;

$Email = $_SESSION["Email"];
$sql = "SELECT * FROM user WHERE Email = '$Email'";
$result = mysqli_query($mysqli, $sql);
$user = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
    $Fname = $user['First_Name'];
    $email = $user['Email'];
    $phone = $user['Phone_number'];
}
if (isset($_POST['Confirm_order'])) {
    $customer_name = $Fname;
    $customer_email = $email;
    $customer_phone = $phone;
    $product_price = $total;

    // Insert the order details into the database
    $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, product_price) 
        VALUES ('$customer_name', '$customer_email', '$customer_phone', $product_price)";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        header("location: confirmOrder.php");
    } else {
        echo "Error placing order.";
    }
}
