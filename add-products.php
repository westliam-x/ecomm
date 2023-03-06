<?php
require("function.php");
require_once 'conn.php';
session_start();
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true) {
    header("location: log-in-admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Queen's Plastic Packaging</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="admin-container">
        <div class="ad-nav">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fa-solid fa-sparkles"></i></span>
                        <span class="title  b-name"><i class="fa-solid fa-house"></i>Queen's Plastic Packaging</span>
                        <div class="line"></div>

                    </a>
                </li>
                <li>
                    <a href="admin-panel.php">
                        <!-- <span  class="icons"><i class="fa-solid fa-sparkles"></i></span> -->
                        <span class="title"><i class="fa-solid fa-house"></i>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customers.php">
                        <span class="title"><i class="fa-solid fa-house"></i>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="orders.php">
                        <span class="title"><i class="fa-solid fa-house"></i>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="messages.php">
                        <!-- <span  class="icon"><i class="fa-solid fa-sparkles"></i></span> -->
                        <span class="title"><i class="fa-solid fa-house"></i>Messages</span>
                    </a>
                </li>
                <li>
                    <a href="add-products.php">
                        <!-- <span  class="icon"><i class="fa-solid fa-sparkles"></i></span> -->
                        <span class="title"><i class="fa-solid fa-house"></i>Add Products</span>
                    </a>
                </li>
                <li>
                    <a href="logout-admin.php">
                        <!-- <span  class="icon"><i class="fa-solid fa-sparkles"></i></span> -->
                        <span class="title"><i class="fa-solid fa-house"></i>Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-admin">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search Here">
                    </label>
                </div>
                <div class="user">
                    <img src="images/gold.jpg" alt="">
                </div>
            </div>

            <div class="cart-container  small-container">
                <h2 class="cart-title">My Product Cart
                    <div class="line"></div>

                </h2>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                    <tr class="removeMe">
                        <td>
                            <div class="cart-info">
                                <img src="images/bottle1.1.jpg" alt="">
                                <div>
                                    <p> 100ml Jar</p>
                                    <small>#50000.00</small>
                                    <a href="#" onclick="gerrout()">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td>
                            #5000.00
                        </td>
                    </tr>
                    <tr class="removeMe">
                        <td>
                            <div class="cart-info">
                                <img src="images/bottle1.1.jpg" alt="">
                                <div>
                                    <p> 100ml Jar</p>
                                    <small>#50000.00</small>
                                    <a href="#" onclick="gerrout()">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td>
                            #5000.00
                        </td>
                    </tr>
                    <tr class="removeMe">
                        <td>
                            <div class="cart-info">
                                <img src="images/bottle1.1.jpg" alt="">
                                <div>
                                    <p> 100ml Jar</p>
                                    <small>#50000.00</small>
                                    <a href="#" onclick="gerrout()">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td>
                            #5000.00
                        </td>
                    </tr>
                    <tr class="removeMe">
                        <td>
                            <div class="cart-info">
                                <img src="images/bottle1.1.jpg" alt="">
                                <div>
                                    <p> 100ml Jar</p>
                                    <small>#50000.00</small>
                                    <a href="#" onclick="gerrout()">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" value="1">
                        </td>
                        <td>
                            #5000.00
                        </td>
                    </tr>
                </table>


                <a href="" class="btn cart-btn">Add New Product</a>
            </div>
        </div>
    </div>


    <script>
        // Menu-toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.ad-nav');
        let mainAdmin = document.querySelector('.main-admin')

        toggle.onclick = function() {
            navigation.classList.toggle('active')
            mainAdmin.classList.toggle('active')
        }
        // let list=document.querySelectorAll(".ad-nav li")
        // function  activeLink(){
        //     list.forEach((item)=>
        //     item.classList.remove('hovered'))
        //     this.classList.add('hovered')
        // }
        // list.forEach((item)=>
        // item.addEventListener('mouseover',activeLink))
    </script>
</body>

</html>