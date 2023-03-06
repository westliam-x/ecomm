<!DOCTYPE html>
<html lang="en">
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




<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <title>My Account |Queen's Plastic Packaging | E-commerce Website</title>
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
            <!-- <a href="#">
            <i class="fa-solid fa-user  user"></i>
        </a> -->
            <div class="hamburger   menu-icon" onclick="menutoggle()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
        <?php
        $id = $_SESSION["id"];
        // $Email = $_SESSION["Email"];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($mysqli, $sql);
        $user = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $Fname = $user['First_Name'];
            $email = $user['Email'];
            $Lname = $user['Last_Name'];
            $DOB = $user['DOB'];
            $Gender = $user['Gender'];
            $image = $user['image'];
            $phone = $user['Phone_number'];
            $image_path = 'images/' . $image;
        ?>

            <h2 class="user-information">User Information
                <div class="line"></div>

            </h2>
            <div class="row">
                <div class="col-2   the-user">
                    <div style="margin-bottom: 100px;">
                        <img class="user" src=" <?php echo $image_path; ?> " alt="" srcset="">
                    </div>

                </div>
                <div class="col-2   the-user2">
                    <!-- <img src="images/bottle1.png" alt=""> -->
                    <div class="user-info">
                        <h2 class="name">
                            <?php echo $Fname; ?><?php echo " " ?><?php echo $Lname; ?>
                        </h2>
                        <div class="infos">
                            <div class="info">
                                Email: <?php echo $email; ?>
                            </div>
                            <div class="info">
                                Phone Number: <?php echo $phone ?>
                            </div>
                            <div class="info">
                                Gender: <?php echo $Gender; ?>
                            </div>
                            <div class="info">
                                Date Of Birth: <?php echo $DOB; ?>
                            </div>
                        </div>


                        <a href="cart.php" class="btn">Update Details</a>
                    </div>
                </div>
            </div>
        <?php
        } else {
            echo "No user found with email $Email";
        }
        ?>
        <h2 style="margin: 20px;">Products You May Like
            <div class="line"></div>
        </h2>
        <?php
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
        $result = mysqli_query($mysqli, $sql);
        // Loop through the products and display each one
        if (mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
                $id = $product['id'];
                $name = $product['Name'];
                $star = $product['Stars'];
                $price = $product['product_Price'];
                $size = $product['sizes'];
        ?>
                <div class="row product">
                    <div class="col-4 mod1">
                        <img src="images/bottle1.1.jpg" alt="">
                        <h4><?php echo $name; ?> </h4>
                        <div class="rating">
                            <?php
                            for ($i = 1; $i <= $star; $i++) {
                                echo '<i class="fa-solid fa-star"></i>';
                            }
                            ?>
                        </div>
                        <p>Price:₦<?php echo $price; ?></p>
                        <a href="product-details.php?id=<?php echo $id; ?>" class="btn">View</a>
                    </div>
                </div>

        <?php
            }
        } else {
            echo "No products found";
        }

        ?>


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
        .product {
            width: 24%;
            display: inline-block;
        }

        .product:nth-child(4n) {
            clear: left;
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