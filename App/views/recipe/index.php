<?php
session_start();
$isActive = isset($_SESSION['logged_in']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="../../../assets/CSS/recipe.css" />
  <script type="module" src="../../controllers/recipe.js"></script>
  <title>Recipes & Menus | Hagurash</title>
</head>

<body>
  <div class="container">
    <div class="nav__menu not__visible">
      <button class="close__menu">
        &times;
      </button>
      <a href="#"><img src="../../../assets/images/Logo.png" alt="Hagurash Logo.png" /></a>
      <ul class="nav">
        <li><a href="../">Home</a></li>
        <li><a href="#">Recipes & Menus</a></li>
        <li><a href="../video/">Videos</a></li>
        <li><a href="../about/">About</a></li>
        <li><a href="../contact/">Contact</a></li>
        <?php
        echo $isActive ? "<li><a href='../account/'>Saved Recipes</a></li>" : "";
        ?>
      </ul>
      <div>
        <span class="follow">Follow <span style="color:#ffbd59">Hagurash !</span></span>
        <a href="https://www.facebook.com/hagurash"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/hagurash"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.twitter.com/hagurash"><i class="fa-brands fa-twitter"></i></a><br>
        <a href="../auth/"><button class="sign-inn">Sign In</button></a>
      </div>
    </div>
    <nav>
      <ul class="navbar">
        <li class="flex">
          <img class="logo" src="../../../assets/images/Logo.png" alt="hagurash logo" />
        </li>
        <li>
          <button class='nav-toggler'>
            <span></span>
            <span></span>
            <span></span>
          </button>
        </li>
        <li>
          <form class="search__form">
            <input type="text" class="search__input" id="search__input" placeholder="Search over 1,000,000 recipes..." />
            <button class="input__submit" type="submit">
              <i class="fa fa-magnifying-glass"></i> Search
            </button>
          </form>
        </li>
        <li class="add__recipe">
          <i class="icon__ fa-solid fa-pen-to-square"></i>Add to Recipe
        </li>
        <li class="bookmark">
          <i class="icon__ fa-regular fa-bookmark"></i><span>Bookmarks</span>
          <ul class="bookmarks hidden">
            <p class="bookmark__mess">
              <i class="icon__ fa-solid fa-triangle-exclamation"></i>
              <span class="idc">Sign in to bookmark !</span>
            </p>
            <!--
                list of bookmarked recieps 
              <li>
                <a href="#">
                  <figure class="recipe__fig">
                    <img
                      class="recipe__img"
                      src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1176557_10-1f1914f.jpg?quality=90&webp=true&resize=300,272"
                      alt=""
                    />
                  </figure>
                  <div class="recipe__detail">
                    <p class="title">Scotch Egg</p>
                    <p class="publisher">BBC good food</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <figure class="recipe__fig">
                    <img
                      class="recipe__img"
                      src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1176557_10-1f1914f.jpg?quality=90&webp=true&resize=300,272"
                      alt=""
                    />
                  </figure>
                  <div class="recipe__detail">
                    <p class="title">Scotch Egg</p>
                    <p class="publisher">BBC good food</p>
                  </div>
                </a>
              </li>
            </ul>
          </li> 
        -->
          </ul>
    </nav>

    <div class="recipe__list">
      <ul class="all__recipes">
        <!-- result of Recipes  -->
        <!-- <li>
            <a href="#">
              <figure class="recipe__fig">
                <img
                  class="recipe__img"
                  src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1176557_10-1f1914f.jpg?quality=90&webp=true&resize=300,272"
                  alt=""
                />
              </figure>
              <div class="recipe__detail">
                <p class="title">Scotch Egg</p>
                <p class="publisher">BBC good food</p>
              </div>
            </a>
          </li> -->
      </ul>
      <!-- Pagination -->

      <div class="pagination">
        <!-- <button class="pagination__btn "><i class="fa-solid fa-arrow-left"></i><span>Page 1</span></button> -->
        <!-- <button class="pagination__btn btn__next"><span>Page 3</span> <i class="fa-solid fa-arrow-right"></i></button> -->
      </div>

      <p class="cpy__mess">
        &copy; Copyright by <a href="#">Hagurash</a>. All rights reserved.
      </p>
    </div>
    <div class="recipe">
      <div class="recipe__desc">
        <p class="message">
          <i class="icon__ fa-regular fa-face-smile"></i> Start by searching a recipe. Have fun !
        </p>
        <!-- Single Recipe that will be rendered -->
        <!-- 
          <div>
            <figure class="recipe__img__desc">
              <img
                src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1176557_10-1f1914f.jpg?quality=90&webp=true&resize=300,272"
                alt=""
              />
              <div><label class="recipe__title">Scotch Eggs</label></div>
            </figure>
            <div class="recipe__desc__wrap">
              <div class="buttons">
                <p>
                  <i class="fa-regular fa-clock"></i>
                  <span class="time">60</span> minutes
                </p>
                <p>
                  <i class="fa-solid fa-user-group"></i>
                  <span class="amount">4</span> Serving
                </p>
                <div>
                  <button class="increment">
                    <i class="fa-solid fa-minus"></i>
                  </button>
                  <button class="decrement">
                    <i class="fa-solid fa-plus"></i>
                  </button>
                </div>
                <button class="bookmark__btn">
                  <i class="fa-regular fa-bookmark"></i>
                </button>
              </div>
              <div class="ingredients">
                <h1>Recipe ingredients</h1>
                <ul class="ingredient__list">
                  <li><i class="icon__ fa-solid fa-check"></i> 5 large eggs</li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i> 1 tsp black
                    peppercorns crushed
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>25 g sage apple &
                    onion stuffing mix
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>1 tsp chopped thyme
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>100 g plain flour
                    seasoned plus extra for dusting
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>Sunflower oil for
                    frying
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>300 g good-quality
                    pork sausages skinned
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>140 g cooked ham
                    shredded
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>1 tsp chopped sage
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>1 tsp chopped parsley
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>100 g dried
                    breadcrumbs
                  </li>
                  <li>
                    <i class="icon__ fa-solid fa-check"></i>Piccalilli to serve
                  </li>
                </ul>
              </div>
              <div class="direction__links">
                <h2>How To Cook it</h2>
                <p class="cooker__message">
                  This recipe was carefully designed and tested by
                  <span class="publisher">BBC Good Food</span>. Please check out
                  directions at their website.
                </p>
                <a href="#" class="direction__link"
                  >Direction
                  <span class="arrow"
                    ><i class="fa-solid fa-arrow-right"></i></span
                ></a>
              </div>
          </div>   -->

      </div>
    </div>
    <div class="add__recipe__modal hidden overlay">
      <form action="" class="add__recipe__form" id="recipe__add__form">
        <button class="close__btn">x</button>
        <fieldset class="recipe__data">
          <legend>Recipe Data</legend>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" required>
          <label for="url">URL</label>
          <input type="url" name="source_url" id="url" required>
          <label for="img_url">Image URL</label>
          <input type="url" name="img_url" id="img_url" required>
          <label for="publisher">Publisher</label>
          <input type="text" name="publisher" id="publisher">
          <label for="prep_time">Prep time</label>
          <input type="number" name="cooking_time" id="prep_time" required>
          <label for="serving">Servings</label>
          <input type="number" name="serving" id="serving" required>
        </fieldset>
        <fieldset class="ingredient__data">
          <legend>ingredients</legend>
          <label for="ingrd_1">Ingredient 1</label>
          <input type="text" name="ingredient_1" placeholder="Format: 'Quantity,unit,description'" id="ingrd_1" required>
          <label for="ingrd_2">Ingredient 2</label>
          <input type="text" name="ingredient_2" id="ingrd_2" required>
          <label for="ingrd_3">Ingredient 3</label>
          <input type="text" name="ingredient_3" id="ingrd_3">
          <label for="ingrd_4">Ingredient 4</label>
          <input type="text" name="ingredient_4" id="ingrd_4">
          <label for="ingrd_5">Ingredient 5</label>
          <input type="text" name="ingredient_5" id="ingrd_5">
          <label for="ingrd_6">Ingredient 6</label>
          <input type="text" name="ingredient_6" id="ingrd_6">
          <button class="more__ingrd" data-number="6"><i class="icon__ fa-solid fa-plus"></i></button>
        </fieldset>
        <div class="submit__btn"><button class="add__recipe__submit__btn" type="submit"><i class="fa-solid fa-cloud-arrow-up"></i>Upload</button></div>
      </form>
    </div>
    <div class="premium__modal overlay hidden">
      <div class="premium__container">
        <button class="close__btn close__premium">X</button>
        <div class="header">
          <p class="account">
            <span><i class="fa-solid fa-check check"></i>Account</span>
            <i class="fa-regular fa-user"></i>
          </p>
          <p class="separator"></p>
          <p class="plan">
            <span>Plan Selection</span>
            <i class="fa-regular fa-rectangle-list"></i>
          </p>
          <p class="separator fade"></p>
          <p class="payment">
            <span>Payment</span>
            <i class="fa-regular fa-credit-card"></i>
          </p>
        </div>
        <div class="main">
          <div class="upgrade">
            <p>
              <i class='bx bxs-crown'></i> <span class="f-large">Upgrade to Premium</span>
            </p>
            <p class="premium__featuree__mess">You can get more out of it. <br> Upgrading to premium Get all features: <br><i class='bx bxs-info-circle m-10'></i></p>
            <ul class="premium__features">
              <li>
                <i class="fa-solid fa-check"></i> High quality
              </li>
              <li>
                <i class="fa-solid fa-check"></i> More bookmarks
              </li>
              <li>
                <i class="fa-solid fa-check"></i> Recipe uploads
              </li>
              <li>
                <i class="fa-solid fa-check"></i> More features
              </li>
            </ul>
            <p class="learn__more"><a href="../subscription/offer.php">learn more</a></p>
          </div>
          <div class="plan">
            <p>
              <i class='bx bxs-info-circle'></i> <span class="f-large">Choose your Plan</span>
            </p>
            <div class="offers">
              <div class="offer">
                <span>Starter</span>
                <span class="offer__amount"><sup>$</sup>5 <span class="per">/month</span></span>
                <button class="offer__button" data-offer="5">Select</button>
              </div>
              <div class="offer">
                <span>Cook</span>
                <span class="offer__amount"><sup>$</sup>20 <span class="per">/month</span></span>
                <button class="offer__button" data-offer="20">Select</button>
              </div>
              <div class="offer">
                <span>Culinarian</span>
                <span class="offer__amount"><sup>$</sup>50 <span class="per">/month</span></span>
                <button class="offer__button" data-offer="50">Select</button>
              </div>
              <div class="offer">
                <span>Chef</span>
                <span class="offer__amount"><sup><sup>$</sup></sup>100 <span class="per">/month</span></span>
                <button class="offer__button" data-offer="100">Select</button>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</body>

</html>