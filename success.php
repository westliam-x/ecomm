<?php
session_start();
require_once "conn.php";
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: log-in.php");
    exit;
}
$total = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0;

$Email = $_SESSION["Email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="check.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
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



        <div class="order-container">

            <form method="post" action="">
                <h1>Payment Successful</h1>
                <a href="index.php">Click to proceed home</a>
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



        .order-container {

            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: black;
            max-width: 1300px;
            margin: auto;
            padding-left: 20px;
            padding-right: 20px;
            width: 100vw;
            height: 70%;
            gap: 1rem;
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