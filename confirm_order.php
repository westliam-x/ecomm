<?php
session_start();
require_once "conn.php";
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
	header("location: log-in.php");
	exit;
}

$Total = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Confirm Order</title>
	<style>
		body {
			background-color: #1C1C1C;
			color: #EAEAEA;
			font-family: Arial, sans-serif;
		}

		h1 {
			color: gold;
			text-align: center;
			margin-top: 50px;
		}

		p {
			margin-bottom: 20px;
		}

		a {
			color: gold;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #EAEAEA;
		}

		th {
			background-color: black;
			color: gold;
		}

		tr:hover {
			background-color: #333333;
		}

		form {
			background-color: #3B3B3B;
			color: white;
			width: 500px;
			margin: 0 auto;
			padding: 20px;
			border-radius: 10px;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="email"],
		textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			background-color: #1C1C1C;
			color: #EAEAEA;
		}

		input[type="submit"] {
			background-color: gold;
			color: black;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<h1>Confirm Order</h1>
	<form method="POST" action="confirm.php">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Product</th>
					<th>Size(ml)</th>
					<th>Price</th>
					<th>Subtotal</th>
				</tr>
			</thead>

			<tbody>
				<?php
				//initialize total
				$total = 0;
				if (!empty($_SESSION['cart'])) {
					//create array of initial qty which is 1
					$index = 0;
					if (!isset($_SESSION['qty_array'])) {
						$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
					}
					$sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
					$query = $mysqli->query($sql);
					while ($row = $query->fetch_assoc()) {
				?>
						<tr>

							<td>
								<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>"><i class="fa-solid fa-trash"></i></a>
							</td>

							<td style="margin:40px;"><?php echo $row['Name']; ?></td>
							<td style="margin:40px;"><?php echo $row['sizes'];
														'ml' ?></td>
							<td><?php echo number_format($row['product_Price'], 2); ?></td>
							<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
							<td><?php echo number_format($_SESSION['qty_array'][$index] * $row['product_Price'], 2); ?></td>
							<?php $total += $_SESSION['qty_array'][$index] * $row['product_Price'];
							?>
						</tr>
					<?php
						$index++;
					}
				} else {
					?>
					<tr>
						<td colspan="4" style="text-align: center; justify-content:center;">
							No Item in Cart
						</td>
					</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" align="right"><b>Total</b></td>
					<td><b><?php echo number_format($Total, 2); ?></b></td>
				</tr>

			</tbody>

		</table>

		<a href="cart.php" class="btn"> Back</a>
		<button type="submit" class="btn" name="Confirm_order">Confirm</button>
		<!-- <a href="clear_cart.php" class="btn"> Clear Cart</a>
		<a href="check.php" class="btn">Checkout</a> -->
	</form>
</body>

</html>