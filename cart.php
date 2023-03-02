<?php
session_start();
require_once "conn.php";
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: log-in.php");
    exit;
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <title>All Products|Queen's Plastic Packaging | E-commerce Website</title>

    <link href="index.html">

</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <h1>LOGO</h1>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                    <li><a href="product.php"><i class="fa-solid fa-jar"></i>Products</a></li>
                    <li><a href="contact.php"><i class="fa-solid fa-phone"></i>Contact</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-phone"></i>Logout</a></li>
                    <li><a href="cart.php"><?php echo count($_SESSION['cart']); ?><i class="fa-solid fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
            <div class="color-mode">
                <div class="toggle">
                    <div class="indicator"></div>
                </div>

            </div>
            <a href="account.php">
                <i class="fa-solid fa-user  user"></i>
            </a>
            <i class="fa-solid fa-sparkles  user  menu-icon" onclick="menutoggle()"></i>
        </div>



        <div class="cart-container  small-container">
            <h2 class="cart-title">My Product Cart
                <div class="line"></div>

            </h2>


            <form method="POST" action="save_cart.php">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Size(ml)</th>
                            <th>Price</th>
                            <th>Quantity</th>
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
                                    <td><input style="background-color: transparent; border:none; text-decoration:underline;" type="number" min="1" max="10" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" id="quantity" name="qty_<?php echo $index;  ?>"></td>
                                    <td><?php echo number_format($_SESSION['qty_array'][$index] * $row['product_Price'], 2); ?></td>
                                    <?php $total += $_SESSION['qty_array'][$index] * $row['product_Price'];
                                    $_SESSION['cart_total'] = $total + 500;
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
                        $Subtotal = 500 + $total;
                        $Delivery = 500;
                        ?>
                        <tr>
                            <td colspan="4" align="right"><b>Total</b></td>
                            <td><b><?php echo number_format($total, 2); ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><b>Delivery Fee</b></td>
                            <td><b><?php echo number_format($Delivery, 2);; ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><b>Subtotal</b></td>
                            <td><b><?php echo number_format($Subtotal, 2); ?></b></td>
                        </tr>
                    </tbody>

                </table>
                <a href="product.php" class="btn"> Back</a>
                <a href="confirm_order.php" class="btn"> Confirm order</a>
                <a href="clear_cart.php" class="btn"> Clear Cart</a>
                <button type="submit" class="btn" name="save">Save Changes</button>
            </form>
        </div>


        <div class="footer">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Talk To Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, labore. Voluptatibus cum fuga dolores reprehenderit odit optio. Voluptas ex sapiente animi commodi molestias ullam nihil saepe sunt dolore, et nostrum.</p>
                </div>
                <div class="footer-col-2">
                    <h1>LOGO</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, labore. Voluptatibus cum fuga dolores reprehenderit odit optio. Voluptas ex sapiente animi commodi molestias ullam nihil saepe sunt dolore, et nostrum.</p>
                </div>
                <div class="footer-col-4">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Return Policy</li>
                        <li>Terms and Conditions</li>
                    </ul>
                </div>
                <div class="footer-col-5">
                    <h3>Follow Us</h3>
                    <ul>
                        <li> <i class="fa-solid fa-facebook"></i>
                            Facebook</li>
                        <li><i class="fa-solid fa-instagram"></i>Instagram</li>
                        <li><i class="fa-solid fa-phone"></i>+234 809790555 </li>
                        <li><i class="fa-solid fa-mail"></i>qpp@gmail.com</li>
                    </ul>
                </div>
                <hr>
                <p class="copyright">
                    &copy;Yours Codedly &trade; 2023
                    <br>Developed by Tech Leads Ms Blessed Ohuegbe and Mr Emelifonwu Williams
                    <br>
                    All Rights Reserved
                </p>
            </div>
        </div>
    </div>

    <style>
        input {
            margin: 7px;
            padding: 2px;
        }

        table {
            width: 100%;
            padding: 400px;
        }
    </style>
    <script>
        var MenuItems = document.getElementById("MenuItems")
        MenuItems.style.maxHeight = "0px"

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>
    <script>
        const quantityInput = document.getElementById("quantity");

        quantityInput.addEventListener("input", function(event) {
            if (event.target.value === "0") {
                event.target.setCustomValidity("Please enter a value greater than 0.");
            } else {
                event.target.setCustomValidity("");
            }
        });
    </script>
    <script>
        let toggle = document.querySelector('.toggle')
        let background = document.querySelector('.container')
        let myLilText = document.querySelector('.user')
        let myContact = document.querySelector(' .my-contact')
        let header = document.querySelector('.header')
        let meet = document.querySelector('.meet')
        let phone = document.querySelector('.phone')

        toggle.onclick = function() {
            toggle.classList.toggle('active')
            background.classList.toggle('active')
            myLilText.classList.toggle('active')

        }
    </script>
</body>

</html>