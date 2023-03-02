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
                    <a href="#">
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

            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo Products(); ?></div>
                        <div class="cardName">Products Available</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-house"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo Orders(); ?></div>
                        <div class="cardName">Number of orders</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-house"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo UnreadMessage(); ?></div>
                        <div class="cardName">Messages</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-house"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo users(); ?></div>
                        <div class="cardName">Customers</div>
                    </div>
                    <div class="iconBx">
                        <i class="fa-solid fa-house"></i>
                    </div>
                </div>
            </div>

            <!-- order  details -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="orders.php" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Phone Number</td>
                                <td>Refrence</td>
                                <td>Email</td>
                                <td>Amount</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through the products and display each one

                            $sql = "SELECT * FROM orders LIMIT 7";
                            $result = mysqli_query($mysqli, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($order = mysqli_fetch_assoc($result)) {
                                    $refrence = $order['reference'];
                                    $name = $order['customer_name'];
                                    $amount = $order['product_price'];
                                    $status = $order['order_status'];
                                    $suc = 'delivered';
                                    $number = $order['customer_phone'];
                                    $email = $order['customer_email'];
                            ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $refrence ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $amount ?></td>
                                        <td>
                                            <span class="status <?php echo $status ?>"><?php echo $status ?></span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No products found";
                            }
                            // Close the connection
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- customers -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                        <a href="customers.php" class="btn">View All</a>
                    </div>
                    <table>
                        <?php
                        // Loop through the products and display each one

                        $sql = "SELECT * FROM user LIMIT 10";
                        $result = mysqli_query($mysqli, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($user = mysqli_fetch_assoc($result)) {
                                $Fname = $user['First_Name'];
                                $image = $user['image'];
                                $image_path = 'images/' . $image;
                        ?>
                                <tr>
                                    <td>
                                        <div class="imgBx">
                                            <img src="<?php echo $image_path; ?> " alt="Customer img">
                                        </div>
                                    </td>
                                    <td>
                                        <h4><?php echo $Fname; ?> </h4>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Users found";
                        }
                        // Close the connection
                        mysqli_close($mysqli);
                        ?>
                    </table>
                </div>
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