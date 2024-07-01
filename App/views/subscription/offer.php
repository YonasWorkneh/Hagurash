<?php
session_start();

$isActive = isset($_SESSION['logged_in']);
$id = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : '';


require("../../models/php/conn.php");

$result = $conn->query("SELECT * FROM users WHERE user_id = '$id'");
$email = '';
$status = 0;
$row = $result->fetch_assoc();
if ($result->num_rows) {
  $email = $row['email'];
  $status = $row['status'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/offer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon">
  <script type="module" src="../../controllers/offer.js" defer></script>
  <title>Subscriptions | Hagurash</title>
</head>

<body>
  <header>
    <nav class="header__top">
      <a href="#" class="logo"><img src="../../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
      <ul class="nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../recipe/recipe.php">Recipes & Menus</a></li>
        <li><a href="../video/video.php">Videos</a></li>
        <li><a href="../about/about.php">About</a></li>
        <li><a href="../contact/contact.php">Contact</a></li>
      </ul>
      <ul class="left">
        <li>
          <button class="save <?php echo $isActive ? "active" : "" ?>">
            <a href="../account/user.php">
              <i class="fa-solid fa-heart"></i>
            </a>
            <span class="tool-tip">
              <?php echo $isActive ? "Saved Recipes" : "Sign in to see saved recipes" ?>
            </span>
          </button>
        </li>
        <li>
          <?php echo $isActive ?
            '<button class = "logout">Log out</button>' :
            '<a class="log-in" href="../auth/login.php"><i class="fa-solid fa-user"></i></a>' ?>
        </li>
        <li>
          <a href="../recipe/recipe.php" class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="hero">
    <h1>Subscriptions</h1>
    <p class="font__fade">Manage your subscriptions. You are currently subscribed to the <span class="user__sub"><?php echo $status ? "" : 'free' ?></span> plan.</p>
    <div class="offers">
      <div class="offer">
        <p class="title">Starter</p>
        <img src="../../../assets/images/starter.svg" alt="starter svg icon">
        <span class="offer__amount"><span class="amount"><sup>$</sup>5</span> <span class="per">/month</span></span>
        <p><span>2</span> Uploads <span class="per">/day</span></p>
        <ul>
          <li><i class="fa-regular fa-circle-check"> </i> 20 Uploads <span class="per">/month</span></li>
          <li><i class="fa-regular fa-circle-check"> </i> forum support</li>
        </ul>
        <a href="checkout.php" class="sub__btn">Subscribe</a>
      </div>
      <div class="offer">
        <p class="title">Cook</p>
        <img src="../../../assets/images/spoon.svg" alt="spoon svg icon">
        <span class="offer__amount"><span class="amount"><sup>$</sup>20</span> <span class="per">/month</span></span>
        <p><span>5</span> Uploads <span class="per">/day</span></p>
        <ul>
          <li><i class="fa-regular fa-circle-check"> </i> 50 Uploads <span class="per">/month</span></li>
          <li><i class="fa-regular fa-circle-check"> </i> 40 Bookmarks</li>
          <li><i class="fa-regular fa-circle-check"> </i> email support</li>
        </ul>
        <a href="checkout.php" class="sub__btn">Subscribe</a>
      </div>
      <div class="offer">
        <p class="title">Cullinarian</p>
        <img src="../../../assets/images/knife-fork.svg" alt="crossed knife-fork svg">
        <span class="offer__amount"><span class="amount"><sup>$</sup>50</span> <span class="per">/month</span></span>
        <p><span>10</span> Uploads <span class="per">/day</span></p>
        <ul>
          <li><i class="fa-regular fa-circle-check"> </i> 100 Uploads <span class="per">/month</span></li>
          <li><i class="fa-regular fa-circle-check"> </i> 80 Bookmarks</li>
          <li><i class="fa-regular fa-circle-check"> </i> email support</li>
        </ul>
        <a href="checkout.php" class="sub__btn">Subscribe</a>
      </div>
      <div class="offer">
        <p class="title">Chef</p>
        <img src="../../../assets/images/chef-hat.svg" alt="chef-hat svg">
        <span class="offer__amount"><span class="amount"><sup>$</sup>100</span> <span class="per">/month</span></span>
        <p><span>20</span> Uploads <span class="per">/day</span></p>
        <ul>
          <li><i class="fa-regular fa-circle-check"> </i> 200 Uploads <span class="per">/month</span></li>
          <li><i class="fa-regular fa-circle-check"> </i> Unlimitted Bookmarks</li>
          <li><i class="fa-regular fa-circle-check"> </i> email support</li>
        </ul>
        <a href="checkout.php" class="sub__btn">Subscribe</a>
      </div>
    </div>
  </main>
  <footer>
    <div class="footer__content">
      <div class="footer__logo">
        <p class="hagu fancy">Hagurash</p>
      </div>
      <div class="content">
        <div class="product flex">
          <p>Product</p>
          <p><a href="recipes.php">Recipes & Menus</a></p>
          <p><a href="video.php">videos</a></p>
          <p><a href="#pricing">pricing</a></p>
        </div>
        <div class="resources flex">
          <p>Resources</p>
          <p><a href="#faq">FAQ</a></p>
          <p><a href="https://forkify-api.herokuapp.com/v2">forkify</a></p>
          <p><a href="https://spoonacular.com/">spoonacular</a></p>
          <p></p>
        </div>
        <div class="about flex">
          <p>About</p>
          <p><a href="#team">Our team</a></p>
          <p><a href="#about">About company</a></p>
          <p><a href="#contact">contact us</a></p>
        </div>
        <div class="community flex">
          <p>Community</p>
          <p><a href="#blog">blog</a></p>
          <p><a href="#events">Events</a></p>
          <p><a href="#help">help center</a></p>
        </div>
      </div>
      <div class="social__links">
        <div class="links">
          <a href="twitter.com"><i class="fa-brands fa-twitter"></i></a>
          <a href="facebook.com"><i class="fa-brands fa-facebook"></i></a>
          <a href="instagram.com"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="footer__line"></div>
    <div class="terms">
      <p> &copy; Copyright 2023-2024 Hagurash LLC. All Rights Reserved.</p>
      <p class="terms__link">
        <a href="terms.php">Terms & Condition</a>
        <a href="privacy.php">Privacy Policy</a>
      </p>
    </div>
  </footer>
</body>

</html>