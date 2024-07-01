<?php
session_start();
$isActive = isset($_SESSION['logged_in']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/contact.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">
  <script src="../../controllers/contact.js" type="module" defer></script>
  <title>Contact Us | Hagurash</title>
</head>

<body>
  <header>
    <button class='nav-toggler'>
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="header-top">
      <a href="#" class="logo"><img src="../../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
      <nav>
        <button class="menu-close hidden">&times;</button>
        <a href="#" class="logo hidden"><img src="../../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
        <ul class="nav">
          <li><a href="../">Home</a></li>
          <li><a href="../recipe/">Recipes & Menus</a></li>
          <li><a href="../video/">Videos</a></li>
          <li><a href="../about/">About</a></li>
          <li><a href="#" style="color:#ffbd59">Contact</a></li>
        </ul>
        <div class="hidden">
          <span class="follow">Follow <span style="color:#ffbd59">Hagurash!</span></span>
          <a href="https://www.facebook.com/hagurash"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/hagurash"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.twitter.com/hagurash"><i class="fa-brands fa-twitter"></i></a><br>
          <a href="<?php echo $isActive ? "" : "auth/login.php" ?>">
            <button class="sign-inn">
              <?php $isActive ? "Sign Out" : "Sign In" ?>
            </button>
          </a>
        </div>
      </nav>
      <ul class="left">
        <li>
          <button class="save <?php echo $isActive ? "active" : "" ?>">
            <a href="../account/">
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
            '<a class="log-in" href="../auth/"><i class="fa-solid fa-user"></i></a>' ?>
        </li>
        <li>
          <a href="../recipe/" class="search" style="text-decoration: none;">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </li>
      </ul>
    </div>
  </header>
  <main class="main">
    <div class="container">
      <div class="right">
        <div class="hero">
          <h1>How Can We Help ?</h1>
          <p>Our team at <span>Hagurash</span> is at your disposal to assist you with anything you need. please fill out the form and we will get back to you as soon as possible.</p>
        </div>
        <div class="contacts">
          <div class="address">
            <a href="https://www.google.com/maps/place/Ethiopian+Skylight+Hotel+%7C+Bole+Dildey/@8.9795954,38.7496416,12z/data=!4m18!1m8!3m7!1s0x164b9b33a3569139:0xb505349b8c87fdd2!2sBole,+Addis+Ababa!3b1!8m2!3d8.9831138!4d38.8100855!16s%2Fm%2F0y6dm5m!3m8!1s0x164b853c14f0e2d5:0x32ce0404870c8088!5m2!4m1!1i2!8m2!3d8.9879715!4d38.7891861!16s%2Fg%2F11ffw4h0mz?entry=ttu" target="_blank"><i class="fa-solid fa-location-dot"></i></a>
            <a href="https://www.google.com/maps/place/Ethiopian+Skylight+Hotel+%7C+Bole+Dildey/@8.9795954,38.7496416,12z/data=!4m18!1m8!3m7!1s0x164b9b33a3569139:0xb505349b8c87fdd2!2sBole,+Addis+Ababa!3b1!8m2!3d8.9831138!4d38.8100855!16s%2Fm%2F0y6dm5m!3m8!1s0x164b853c14f0e2d5:0x32ce0404870c8088!5m2!4m1!1i2!8m2!3d8.9879715!4d38.7891861!16s%2Fg%2F11ffw4h0mz?entry=ttu" target="_blank">123 Main Street</a>
          </div>
          <div class="phone">
            <a href="tel:+251-123-456-789"><i class="fa-solid fa-phone"></i></a>
            <a href="tel:+251-123-456-789">+251-123-456-789</a>
          </div>
          <div class="mail">
            <a href="mailto:info@hagurash.com"><i class="fa-solid fa-paper-plane"></i></a>
            <a href="mailto:info@hagurash.com">info@hagurash.com</a>
          </div>
        </div>
      </div>
      <div class="left">
        <form action="" class="comment__form" method="POST">
          <fieldset>
            <legend>Get in touch</legend>
            <input type="text" id="name" placeholder="Name *" name="name" required>
            <div class="gender">
              <label for="m">M</label>
              <input type="checkbox" name="gender" value="m" id="m">
              <label for="f">F</label>
              <input type="checkbox" name="gender" value="f" id="f">
            </div>
            <input type="email" id="email" placeholder="Email *" name="email" required>
            <input type="text" id="subject" placeholder="Subject" name="subject">
            <textarea required name="comment" id="comment" cols="30" rows="10" placeholder="Message..." name="message"></textarea>
            <input type="submit" value="Send Message" class="submit">
          </fieldset>
        </form>
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
          <p><a href="../recipe/">Recipes & Menus</a></p>
          <p><a href="../video/">videos</a></p>
          <p><a href="../subscription/offer.php">pricing</a></p>
        </div>
        <div class="resources flex">
          <p>Resources</p>
          <p><a href="../faq/faq.php">FAQ</a></p>
          <p><a href="https://forkify-api.herokuapp.com/v2">forkify</a></p>
          <p><a href="https://spoonacular.com/food-api">spoonacular</a></p>
          <p></p>
        </div>
        <div class="about flex">
          <p>About</p>
          <p><a href="#team">Our team</a></p>
          <p><a href="../about/">About company</a></p>
          <p><a href="../contact/">contact us</a></p>
        </div>
        <div class="community flex">
          <p>Community</p>
          <p><a href="#blog">blog</a></p>
          <p><a href="#events">Events</a></p>
          <p><a href="../contact/">help center</a></p>
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