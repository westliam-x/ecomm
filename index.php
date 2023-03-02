<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
require_once "conn.php";
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
    <title>Queen's Plastic Packaging | E-commerce Website</title>
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
        <div class="row">
            <div class="col-2">
                <h2>Think <b class="bold">
                        Luxury
                    </b> <br>Think <b class="bold"> Queen's Plastic Packaging</b></h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus vero, saepe facilis tempora obcaecati eaque aperiam possimus error quia, sed a suscipit natus magni impedit libero nobis eum sequi? Vel!

                </p>
                <a href="product.php" class="btn">Explore Now! &#8594</a>
            </div>
            <div class="col-2">
                <img src="images/bottle1.png" alt="">
            </div>
        </div>

        <!-- Featured   Categories -->
        <div class="categories">
            <h2 class="title">Popular <b class="bold">Categories</b>
            </h2>
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <img src="images/bottle.jpg" alt="">
                    </div>
                    <div class="col-3">
                        <img src="images/bottle.jpg" alt="">
                    </div>
                    <div class="col-3">
                        <img src="images/bottle.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>

        <!-- Featured   Products -->
        <div class="products">
            <h2 class="title">Featured <b class="bold">Products</b>
            </h2>
            <div class="small-container">
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

                ?>
            </div>

            <!-- latest products -->
        </div>
        <h2 class="title">Latest Products</h2>
        <div class="small-container">
            <?php
            $sql = "SELECT * FROM products LIMIT 4";
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

        <!-- ceo-->
        <div class="meettheceo">
            <div class="row">
                <div class="col-2">
                    <img src="images/bottle1.png" class="offer-img">
                </div>
                <div class="col-2   noo1">
                    <p>Meet the CEO</p>
                    <h1 class="title2">Mrs Okpara Williams</h1>
                    <small>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur repellendus corporis nulla molestiae explicabo veniam quas culpa necessitatibus
                        <br>

                    </small>
                    <a href="contact.php" class="btn">Let's Talk! &#8594</a>
                </div>
            </div>
        </div>

        <!-- testimonial -->
        <div class="testimonial">
            <div class="row">
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis blanditiis rerum reiciendis cupiditate iure repellat voluptatem, unde ab ratione veniam totam aut numquam dolorum suscipit, quos adipisci sequi id placeat!</p>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <img src="images/bottle1.1.jpg" alt="">
                    <h3>Kay Skins</h3>
                </div>
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis blanditiis rerum reiciendis cupiditate iure repellat voluptatem, unde ab ratione veniam totam aut numquam dolorum suscipit, quos adipisci sequi id placeat!</p>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <img src="images/bottle1.1.jpg" alt="">
                    <h3>Kay Skins</h3>
                </div>
                <div class="col-3">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis blanditiis rerum reiciendis cupiditate iure repellat voluptatem, unde ab ratione veniam totam aut numquam dolorum suscipit, quos adipisci sequi id placeat!</p>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <img src="images/bottle1.1.jpg" alt="">
                    <h3>Kay Skins</h3>
                </div>
            </div>

        </div>

        <div class="brands">
            <div class="row">
                <div class="col-5">
                    <h1>LOGO1</h1>
                </div>
                <div class="col-5">
                    <h1>LOGO1</h1>
                </div>
                <div class="col-5">
                    <h1>LOGO1</h1>
                </div>
                <div class="col-5">
                    <h1>LOGO1</h1>
                </div>
            </div>
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