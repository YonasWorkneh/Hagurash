<?php
session_start();

$isActive = isset($_SESSION['logged_in']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">
  <script src="../../controllers/video.js" type="module" defer></script>
  <title>Videos | Hagurash</title>
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
          <li><a href="../video/" style="color:#ffbd59">Videos</a></li>
          <li><a href="../about/">About</a></li>
          <li><a href="../contact/">Contact</a></li>
        </ul>
        <div class="hidden">
          <span class="follow">Follow <span style="color:#ffbd59">Hagurash!</span></span>
          <a href="https://www.facebook.com/hagurash"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/hagurash"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.twitter.com/hagurash"><i class="fa-brands fa-twitter"></i></a><br>
          <a href="auth/">
            <button class="sign-inn">
              <?php $isActive ? "Sign Out" : "Sign In" ?>
            </button>
          </a>
        </div>
      </nav>
      <ul class="left">
        <li>
          <button class="save <?php echo $isActive ? "active" : "" ?>">
            <a href="<?php echo $isActive ? "../account/user.php" : "" ?>">
              <i class="fa-solid fa-heart"></i>
            </a>
            <span class="tool-tip">
              <?php echo $isActive ? "Saved Recipes" : "Sign in to see saved recipes" ?>
            </span>
          </button>
        <li>
          <?php echo $isActive ?
            '<button class = "logout">Log out</button>' :
            '<a class="log-in" href="../auth/"><i class="fa-solid fa-user"></i></a>' ?>
        </li>
        <li><button class="search"><a href="../recipe/"><i class="fa-solid fa-magnifying-glass"></i></a></button></li>
      </ul>
    </div>
  </header>
  <main>
    <h1>Videos</h1>
    <div class="container">
      <div class="hero">
        <div class="hero__vid">
          <svg class="icon icon-playlist hidden" width="15" height="14" viewBox="0 0 15 14" fill="#000" xmlns="http://www.w3.org/2000/svg">
            <title>Playlist</title>
            <path d="M0 4H12V6H0V4ZM0 0H12V2H0V0ZM0 8H8V10H0V8ZM10 8V14L15 11L10 8Z" fill="black"></path>
          </svg>
          <div id="player"></div>
        </div>
        <h2 class="vid__title">Paella dish Fusioned With Ethiopian Dish</h2>
        <span>About</span>
        <p class="vid__description">
          You can make a delicious, authentic Paella–the most popular dish of Spain–in your own kitchen with simple ingredients like rice, saffron, vegetables, chicken, and seafood. If you love cooking International food, you will fall in love with this comforting dish.When making a spicy Paella dish at home you need to make a lot of decisions. Picking your chicken filet, the rice, sauces, toppings, condiments, and more—the Paella has to work in harmony with the Ethiopian chicken to produce the perfect bite.
        </p>
      </div>

      <div class="up__next">
        <div class="up__next_head">
          <p>Up next</p>
          <p class="hide">Hide</p>
        </div>
        <div class="vid__wrap">
        </div>
      </div>
    </div>
    <div class="trending">
      <h2>Trending Videos</h2>
      <div class="trending__container">
        <div class="trending__videos" data-translate="0">
        </div>
        <div class="slidder__btn">
          <i class="fa-solid fa-angle-left prev-btn"></i>
          <i class="fa-solid fa-angle-right next-btn"></i>
        </div>
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
          <p><a href="../recipe/recipe.php">Recipes & Menus</a></p>
          <p><a href="../video/video.php">videos</a></p>
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
        <a href="../legal/terms.php">Terms & Condition</a>
        <a href="../legal/privacy.php">Privacy Policy</a>
      </p>
    </div>
  </footer>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script type="module">
    import PlayerController from '../../controllers/playerController.js';

    const controller = new PlayerController('Cx6O1_E-Je8');
    controller.init();
  </script>
</body>

</html>