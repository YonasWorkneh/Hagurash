<?php
$prevPage = $_SERVER['HTTP_REFERER'];
session_start();
!isset($_SESSION['logged_in']) && header("Location:$prevPage");
$isActive = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/user.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" href="../../../assets/images/favicon.png">
  <script src="../../controllers/account.js" type="module" defer></script>
  <title>My Recipes | Hagurash</title>
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
          <li><a href="../contact/">Contact</a></li>
        </ul>
        <div class="hidden">
          <span class="follow">Follow <span style="color:#ffbd59">Hagurash!</span></span>
          <a href="https://www.facebook.com/hagurash"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/hagurash"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.twitter.com/hagurash"><i class="fa-brands fa-twitter"></i></a><br>
          <a href="<?php echo $isActive ? "" : "auth/" ?>">
            <button class="sign-inn">
              <?php $isActive ? "Sign Out" : "Sign In" ?>
            </button>
          </a>
        </div>
      </nav>
      <ul class="left">
        <li>
          <button class="save <?php echo $isActive ? "active" : "" ?>">
            <a href="account/">
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
  <main>
    <div class="container">
      <h1>My Saved Recipes</h1>
      <p>These recipes are saved to your account so that you can revisit them anytime. </p>
      <div class="recipe__container">
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