<?php
session_start();
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/c2.css">
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
          <li><a href="#"><i class="fa-solid fa-phone"></i>Contact</a></li>
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
      <div class="hamburger   menu-icon" onclick="menutoggle()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>


    <!-- single product -->
    <div class="single-product">
      <div class="row">
        <div class="col-2">
          <img src="images/bottle1.1.jpg" id="contact-img" width="100%">
        </div>
        <div class="col-2 more-stuff  details">
          <h2 style="font-size: 30px;" class="line-dec">Reach Out To Us
            <div class="line"></div>

          </h2>
          <p>
            Quality Service is our watchword. Here at Queens Plastic Packaging, we dedicate ourselves to ensuring that you enjoy nothing but the best. Have any complaints or wish to request a special quote? Send Us a message now!
          </p>

          <form id="contact" action="contact_message.php" method="post">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
            <input type="subject" name="subject" id="subject" placeholder="Subject" required>

            <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>

            <button type="submit" id="form-submit" name="Submit" class="main-button ">Send Message Now</button>

          </form>
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
            <li><a href="index.html"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="product.html"><i class="fa-solid fa-jar"></i>Products</a></li>

            <li><a href="cart.html"><i class="fa-solid fa-shopping-cart"></i>Cart</a></li>
            <li><a href=""><i class="fa-solid fa-phone"></i>Contact</a></li>

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