<?php
session_start();
$isActive = isset($_SESSION['logged_in']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <script type="module" src="../../controllers/about.js"></script>
  <title>About Us | Hagurash</title>

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
          <li><a href="#" style="color:#ffbd59">About</a></li>
          <li><a href="../contact/">Contact</a></li>
        </ul>
        <div class="hidden">
          <span class="follow">Follow <span style="color:#ffbd59">Hagurash!</span></span>
          <a href="https://www.facebook.com/hagurash"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://www.instagram.com/hagurash"><i class="fa-brands fa-instagram"></i></a>
          <a href="https://www.twitter.com/hagurash"><i class="fa-brands fa-twitter"></i></a><br>
          <a href="<?php echo $isActive ? "" : "../auth/" ?>">
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
  <main>
    <section class="top_view">
      <img src="../../../assets/images/about1.jpg" class="img_top_about" width="100%" height="450px" alt="sushi_img">
      <div class="about_us">ABOUT US</div>

    </section>

    <section class="ourstory">
      <div class="family"> Kitchen Passport</div>
      <div class="tradition">OUR STORY</div>
      <div class="text_our_story">
        It all began with a shared passion for cooking. Two of our core members, would spend hours in the kitchen, experimenting with new ingredients and techniques, eagerly anticipating each other's culinary creations. As their love for food grew, they realized they had a wealth of delicious recipes and invaluable kitchen wisdom to share with the world.
        One fateful evening, as they were sipping wine and discussing their day, the idea for a recipe website was born. They envisioned a platform where people from all walks of life could come together to explore, learn, and celebrate the joys of home cooking. With a surge of excitement, they set out to turn their dream into reality and made hagurash possible.
      </div>
    </section>

    <section class="Images">

      <div class="test_img"><img src="../../../assets/images/mid1.jpg" alt="" class="img__mid"></div>
      <div class="test_img"><img src="../../../assets/images/mid2.jpg" alt="" class="img__mid"></div>
      <div class="test_img"><img src="../../../assets/images/mid3.jpg" alt="" class="img__mid"></div>
      <div class="test_img"><img src="../../../assets/images/mid4.jpg" alt="" class="img__mid"></div>
      <div class="test_img"><img src="../../../assets/images/mid5.jpg" alt="" class="img__mid"></div>
    </section>
    <div class="abb">
      <div class="about_out_tra">family tradition</div>
      <div class="about_out_tradition">Flavorful Feast</div>
      <div class="about_out_tradition_text">Dive into fiery stews (wats), tender tibs, and spongy injera. Ethiopian cuisine is a vibrant tapestry of flavors, textures, and traditions. Explore beyond the main course with gomen, alicha, and atkilt wat. Each bite, a journey into ancient recipes and vibrant culture. So grab your loved ones, share stories, and savor the delicious discoveries!</div>
    </div>
    <section class="middle_view">
      <img src="../../../assets/images/" width="700px" class="img_middle_about" alt="">

      <div class="right_text">
        <div class="right_text_top">Traditional culture</div> Forget forks, embrace spice! Ethiopia's feasts unfold on tangy injera, a spongy canvas for fiery wats and melt-in-your-mouth tibs. Explore beyond, from vibrant gomen to earthy alicha, each bite a story of history and spice. Gather loved ones, share laughter, savor the journey.
      </div>
    </section>

    <section class="num_counting">
      <div class="num1_counting">
        <div class="num1 count" data-max="9999">0</div>
        <div class="num_text">RECIPES</div>
        <div class="num_text_bottom">we have more to offer than you expect</div>
      </div>
      <div class="num2_counting">
        <div class="num2 count" data-max="3246">0</div>
        <div class="num_text">CHEFS</div>
        <div class="num_text_bottom">we have more to offer than you expect</div>

      </div>
      <div class="num3_counting">
        <div class="num3 count" data-max="8">0</div>
        <div class="num_text">USERS</div>
        <div class="num_text_bottom">we have more to offer than you expect</div>

      </div>
    </section>

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
  <script src="../../controllers/about.js" type="module"></script>
</body>

</html>