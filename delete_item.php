<?php
session_start();
require_once 'conn.php';
$product_id = $_GET['id'];
//remove the id from our cart array
$key = array_search($_GET['id'], $_SESSION['cart']);
unset($_SESSION['cart'][$key]);
$sql = "DELETE FROM cart_items WHERE product_id = ?";
$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "i", $product_id);
if (mysqli_stmt_execute($stmt)) {
	echo "Record deleted successfully";
} else {
	echo "Error deleting record: " . mysqli_error($mysqli);
}

unset($_SESSION['qty_array'][$_GET['index']]);
//rearrange array after unset
$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

$_SESSION['message'] = "Product deleted from cart";
header('location: cart.php');
