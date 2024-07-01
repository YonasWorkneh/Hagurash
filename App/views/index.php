<?php
session_start();
// ini_set('session.gc_maxlifetime', 3600 * 24); // to extend the session life span to 24 hour
$isActive = isset($_SESSION['logged_in']);
$consentSet = isset($_COOKIE['cookie_consent']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Hagurash is the ultimate food resource for the home cook, with kitchen tips, fun cooking videos, and, oh yeah, over 33,000 recipes.">
  <meta name="keywords" content="Food,Recipe,cooking,cook,cooking tip,">
  <link rel="stylesheet" href="../../assets/CSS/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../assets/images/Logo.png">
  <script type="module" src="../controllers/index.js" defer></script>
  <title>Hagurash</title>
</head>

<body>
  <header>
    <button class='nav-toggler'>
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="header-top">
      <a href="#" class="logo"><img src="../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
      <nav>
        <a href="#" class="logo hidden"><img src="../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
        <ul class="nav">
          <li><a href="#" style="color:#ffbd59">Home</a></li>
          <li><a href="recipe/">Recipes & Menus</a></li>
          <li><a href="video/">Videos</a></li>
          <li><a href="about/">About</a></li>
          <li><a href="contact/">Contact</a></li>
        </ul>
        <div class="socials hidden">
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
            '<a class="log-in" href="auth/"><i class="fa-solid fa-user"></i></a>' ?>
        </li>
        <li>
          <button class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </li>
      </ul>
    </div>
  </header>
  <main>
    <div class="hero">
      <h1>Every one can <span>cook</span></h1>
      <p>
        <span>HAGURASH</span> brings you more than 100,000 recipes world
        wide. You can search your favourite recipe and have fun cooking your favourite meal.
      </p>
      <button class="btn search">
        <i class="fa-solid fa-magnifying-glass"></i><strong>Search a Recipe </strong>
      </button>
    </div>
    <div class="hero__bg">
      <img src="../../assets/images/image-removebg.png" alt="happy family enjoying a meal together">
    </div>
  </main>
  <article class="brand">
    <div class="brand-wrap reveal">
      <div>
        <h2>Building a Digital <br>Brand</h2>
        <p>
          Our company has partnered with several michelin starred restaurants and hotels to ease acess to specialized recipes to its users. We are working to bring multiple palettes and cuisines across the world into the hands of everyone. With thousands of recipes across the world comes unparalled user experience. Our recipes offer multitudes of categories vegan, sweets,savory and a lot others.
        </p>
        <div class="cust-review">
          <h3>"I consider Hagurash a pragmatic push in the culinary culture of Ethiopia... </h3>
          <p>In my restaurant coming up with new dishes and recipes is in our to do list. Hagurash is my go-to when I need inspirations to create new cuisines. Their quality is un-matched, thier diversity coupled with the great platform they created is astonishing. They created this new bond between customers and culinary world which highly influenced the industry."</p>
          <img src="../../assets/images/Chef-Yohanis.jpg" alt="Chef Yohannis Gebereyesus">
          <span class="name"><a href="https://et.linkedin.com/in/yohanis-gebreyesus-hailemariam-83b59041" target="_blank">Chef &nbsp; Yohannis Gebereyesus</a></span><br>
          <span class="position">Chef, CEO of Antica, General Director in CY dynamics, Founder of multiple restuarants In Addis Ababa </span>
        </div>
      </div>
      <div class="bg-img">
        <img src="../../assets/images/bg-img2.avif" alt="blueberries on plate">
      </div>
  </article>
  <section class="recipe-display reveal">
    <div class="recipe-heading">
      <h4>Our Popular Recipes</h4>
    </div>
    <div class="recipe-slider">
      <div class="recipe-slider-track">
      </div>
      <div class="recipe-slider-track recipe-slider-track2">
      </div>
    </div>
  </section>
  <section class="testimonial-section reveal">
    <h5 align="center">Client reviews</h5>
    <div class="testimonial-container">
      <div class="testimonial-wrapper" data-translate="0">
      </div>
    </div>
    <div class="slider-controls">
      <button class="prev-btn">&#8249;</button>
      <button class="next-btn">&#8250;</button>
    </div>
  </section>
  <?php
  echo $consentSet ?
    "" :
    '
      <aside class="cookie__container cookie__hidden">
        <div class="cookie">
          <p class="title"> <i class="fa-solid fa-cookie-bite"></i></p>
          <p>We use cookies to operate this website, improve usablity, personalize your experience and improve our marketing. Your privacy is important to us, and we will never sell your data. <a href="legal/privacy.php">Privacy Policy.</a></p>
          <div class="consent">
            <button class="accept btn" value="1">Accept all</button>
            <button class="reject btn" value="0">Reject all</button>
          </div>
        </div>
      </aside>'
  ?>
  <footer>
    <div class="footer__content">
      <div class="footer__logo">
        <p class="hagu fancy">Hagurash</p>
      </div>
      <div class="content">
        <div class="product flex">
          <p>Product</p>
          <p><a href="recipe/">Recipes & Menus</a></p>
          <p><a href="video/">videos</a></p>
          <p><a href="subscription/offer.php">pricing</a></p>
        </div>
        <div class="resources flex">
          <p>Resources</p>
          <p><a href="faq/faq.php">FAQ</a></p>
          <p><a href="https://forkify-api.herokuapp.com/v2">forkify</a></p>
          <p><a href="https://spoonacular.com/food-api">spoonacular</a></p>
          <p></p>
        </div>
        <div class="about flex">
          <p>About</p>
          <p><a href="#team">Our team</a></p>
          <p><a href="about/">About company</a></p>
          <p><a href="contact/">contact us</a></p>
        </div>
        <div class="community flex">
          <p>Community</p>
          <p><a href="#blog">blog</a></p>
          <p><a href="#events">Events</a></p>
          <p><a href="contact/">help center</a></p>
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
        <a href="legal/terms.php">Terms & Condition</a>
        <a href="legal/privacy.php">Privacy Policy</a>
      </p>
    </div>
  </footer>
</body>

</html>