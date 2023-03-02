<?php
require_once "conn.php";
session_start();

//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
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
            <a href="account.html">
                <i class="fa-solid fa-user  user"></i>
            </a>
            <i class="fa-solid fa-sparkles  user  menu-icon" onclick="menutoggle()"></i>

        </div>

        <?php
        //info message
        if (isset($_SESSION['message'])) {
        ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                </div>
            </div>
        <?php
            unset($_SESSION['message']);
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($mysqli, $sql);
        $product = mysqli_fetch_assoc($result);
        // Display the product details
        if (mysqli_num_rows($result) > 0) {
            $name = $product['Name'];
            $price = $product['product_Price'];
            $details = $product['product_Details'];
            $size = $product['sizes'];
            $image = $product['product_image'];
        ?>
            <!-- <h2>.<?php echo $name; ?>.</h2>
            <p><?php echo $details; ?></p>
            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>"> -->
            <!-- single product -->
            <div class="single-product">
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo $image; ?>" id="product-img" width="100%">
                        <div class="small-img-row">
                            <div class="small-img-col">
                                <img src="images/bottle.jpg" class="small-img" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img src="images/bottle1.1.jpg" class="small-img" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img src="images/bottle.jpg" class="small-img" width="100%">
                            </div>
                            <div class="small-img-col">
                                <img src="images/bottle1.1.jpg" class="small-img" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-2   details">
                        <p>Home / Jar</p>
                        <h1><?php echo $name; ?></h1>
                        <h4>#<?php echo $price; ?></h4>
                        <a href="add_cart.php?id=<?php echo $id; ?>" class="btn">Add to cart</a>
                        <h3>Product Details&nbsp;<i class="fa-solid fa-indent"></i></h3>
                        <p><?php echo $details; ?></p>
                    </div>
                </div>
            </div>

        <?php
        } else {
            echo "No product found with ID $id";
        }

        ?>
        <div class="row row-first">
            <h2>Related Products
                <div class="line"></div>
            </h2>
            <p>View More</p>
        </div>
        <div class="small-container">
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id !='$id' ORDER BY RAND() LIMIT 4";
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
                        <div class="col-4">
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

            // Close the connection
            mysqli_close($mysqli);
            ?>
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
        .product {
            width: 25%;
            display: inline-block;
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
        var ProductImg = document.getElementById("product-img")
        var SmallImg = document.getElementsByClassName('small-img')

        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src
        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src
        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src
        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src
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