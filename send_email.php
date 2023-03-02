<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$order = $_POST['order'];

	$to = $email;
	$subject = 'Your Order Details';
	$message = "Hello $name,\n\nThank you for your order! Here are your order details:\n\nOrder: $order\n\nAddress: $address";
	$headers = 'From: noreply@yourwebsite.com';

	if (mail($to, $subject, $message, $headers)) {
		echo 'Your order has been confirmed. Check your email for your order details.';
	} else {
		echo 'There was an error sending your order confirmation email.';
	}
}
