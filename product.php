<?php
require_once "conn.php";

session_start();
// Select all products from the database
$sql = "SELECT * FROM products";
$result = mysqli_query($mysqli, $sql);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
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
            <a href="account.php">
                <i class="fa-solid fa-user  user"></i>
            </a>
            <i class="fa-solid fa-sparkles  user  menu-icon" onclick="menutoggle()"></i>
        </div>

        <div class="products">
            <div class="row  row-first">
                <h2>All Products
                    <div class="line"></div>

                </h2>
                <!-- <select name="" id="select">
                    <option value="Default ">Default Sorting</option>
                    <option value=" LowtoHigh">Price Low to High</option>
                    <option value="HightoLow">Price High to Low</option>
                    <option value="Rating">Rating</option>
                </select> -->
            </div>
            <?php
            // Loop through the products and display each one
            if (mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $id = $product['id'];
                    $name = $product['Name'];
                    $star = $product['Stars'];
                    $price = $product['product_Price'];
                    $size = $product['sizes'];
                    $image = $product['product_image'];
            ?>
                    <div class="col-sm-3">
                        <div class="row product ">
                            <div class="col-4">
                                <img src="<?php echo $image; ?>" alt="">
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
        <!-- <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>&#8594</span>
        </div> -->


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
</body>

</html>
<style>
    .col-sm-3 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px
    }

    @media (min-width:768px) {
        .col-sm-3 {
            float: left;
        }
    }

    .col-sm-3 {
        width: 25%;
    }

    .product {
        width: 25%;
        display: inline-block;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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