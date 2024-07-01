<?php
session_start();
$name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';
$imgSrc = isset($_SESSION['admin_img_src']) ? $_SESSION['admin_img_src'] : '';
!isset($_SESSION['logged_admin']) && header("Location:login.php");
if (empty($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == $_SERVER['REQUEST_URI']) {
  require "../../models/php/conn.php";
  $query = "SELECT name,img_src FROM users WHERE admin='1'";

  $result = $conn->query($query);
  $row = $result->fetch_assoc();

  $name = $row['name'];
  $imgSrc = $row['img_src'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/CSS/dash.css">
  <link rel="icon" href="../../../assets/images/favicon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,400,0,0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/apexcharts" defer></script>
  <script src="../../controllers/dash.js" type="module" defer></script>
  <title>Dashboard | Hagurash </title>
</head>

<body class="nothing">
  <div class="hero">
    <div class="sidebar">
      <img class="logo" src="../../../assets/images/Logo.png" alt="logo.png">
      <ul class="nav">
        <li class="over active" data-class="overview"><i class='bx bxs-grid-alt'></i> Overview</li>
        <li class="rec" data-class="recipes"><i class="fa-solid fa-burger"></i> Recipes</li>
        <li class="vids" data-class="videos">
          <span class="material-symbols-outlined">
            monitoring
          </span>
          Analytics
        </li>
        <li class="cust" data-class="customers"><i class="fa-solid fa-user-group"></i> Clients</li>
        <li class="comm" data-class="comments"><span class="notification"><i class="fa-solid fa-comments"></i><span class="unseen"></span></span> Comments</li>
        <li class="prof" data-class="admin_profile"><i class="fa-solid fa-user"></i> Profile</li>
        <li class="dark" data-view="light">
          <i class="fa-solid fa-moon"></i> Dark mode
          <label class="toggle-switch">
            <input type="checkbox">
            <div class="toggle-switch-background">
              <div class="toggle-switch-handle"></div>
            </div>
          </label>
        </li>
      </ul>

    </div>
    <div class="main">
      <div class="heading">
        <div>
          <h1>Hi ! Welcome Back</h1>
          <p>Hagurash, a place where you can enjoy finger licking food made by yourself.</p>
        </div>
        <img class="woma" src="../../../assets/images/model.png" alt="woman enjoying a beautiful meal">
      </div>
      <div class="dash__detail">
        <div class="detail overview">
          <div class="totals">
            <div class="total total__cust">
              <div class="desc__icon">
                <span class="material-symbols-outlined">
                  group
                </span>
              </div>
              <p>Total Customers</p>
              <span class="cust__num">0</span>
            </div>
            <div class="total total__bookmarks">
              <div class="desc__icon">
                <span class="material-symbols-outlined">
                  bookmark
                </span>
              </div>
              <p>Total Bookmarks</p>
              <span class="bookmark__total">0</span>
            </div>
            <div class="mail">
              <div class="desc__icon">
                <span class="material-symbols-outlined">
                  all_inbox
                </span>
              </div>
              <p>User Comments</p>
              <span class="total__comments"><span class="comment__total"></span></span>
            </div>
            <div class="total total__recipes">
              <div class="desc__icon">
                <span class="material-symbols-outlined">
                  lunch_dining
                </span>
              </div>
              <p>Total Recipes</p>
              <span class="total__recipes__num">+<span class="recipe_num">100,000</span></span>
            </div>
          </div>
          <div class="flex">
            <div id="bar">
              <p class="mb-10">Popular Recipes By Rating</p>
              <div id="bar_graph">
              </div>
            </div>
            <div id="pie">
              <p class="mb-10">Popular Recipes By Views</p>
              <div id="pie_chart">
              </div>
            </div>
          </div>
          <div class="growth">
            <div class="bookmark__growth">
              <div class="desc__icon green">
                <span class="material-symbols-outlined">
                  trending_up
                </span>
              </div>
              <p>Bookmark Growth</p>
              <div class="growth__wrap">
                <div>
                  <span class="perc__growth">+ 76%</span><br>
                  <span>from last quarter</span>
                </div>
                <div>
                  <span class="grow grow__1"><span class="fill">2270</span></span>
                  <span class="grow grow__2"><span class="fill"></span></span>
                  <span class="grow grow__3"><span class="fill"></span></span>
                  <span class="grow grow__4"><span class="fill">4000</span></span>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="detail recipes hidden">
          <div class="popular__heading">
            <h2>Popular Recipes</h2>
            <button class="add__recipe">+ Add Recipe</button>
          </div>
          <div class="recipes__wrapper">
            <div class="recipes__wrap"></div>
          </div>
        </div>
        <div class="detail videos hidden">
          <h3 align="center">Analysis Report</h3>
          <div class="center">
            <button class="btn">
              Generate Report <span class="material-symbols-outlined">arrow_downward</span>
            </button>
          </div>
        </div>
        <div class="detail customers hidden">
          <div class="cust__heading">
            <p class="header">Clients</p>
            <p class="last__upd">
              <span>LAST UPDATED</span>
              <span>Today at <span class="upd__hour">17:53</span></span>
            </p>
          </div>
          <div class="cust__main">
            <div class="cust__list__header">
              <input class="search" type="text" placeholder="&#128269; Search by Client ID, or Name...">
              <div>
                <label for="sort">Sort By</label>
                <select name="sort" id="sort">
                  <option value="0"></option>
                  <option value="name">By name</option>
                  <option value="user_id">By ID</option>
                  <option value="bookmarked">Bookmarked</option>
                </select>
              </div>
              <button class="filter add__filter btn__orange" data-filter="0">
                <span>Add filter</span>
                <i class="fa-solid fa-filter"></i>
              </button>
              <form class="format" action="../../models/php/API/export.php" method="POST">
                <select name="format" id="format">
                  <option value="csv">csv</option>
                  <option value="xlsx">xlsx</option>
                  <option value="xls">xls</option>
                </select>
                <button class="btn__orange export" type="submit">
                  <span>Export</span>
                  <i class="fa-solid fa-file-export"></i>
                </button>
              </form>
            </div>
            <table class="customer__list">
              <thead>
                <tr>
                  <td class="head">Client ID</td>
                  <td class="head">Client Name</td>
                  <td class="head">Client Email</td>
                  <td class="head">A/C Created On</td>
                  <td class="head">Last active</td>
                  <td class="head">Bookmark Status</td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <div class="detail comments hidden">
          <div class="menu">
            <div class="menu__wrap">
              <h1>Messages</h1>
              <form class="mess-search">
                <button class="search__chat" type="submit"><i class="fa-solid fa-magnifying-glass" type="submit"></i></button>
                <input type="text" placeholder="Search here..." class="search">
              </form>
              <p class="chat__title">Chats</p>
              <ul class="chats">
              </ul>
              <div class="no__chats">
                <div class="tooltip-container">
                  <span class="tooltip">No comments yet</span>
                  <span class="text">Hagurash</span>
                </div>
              </div>
            </div>
          </div>
          <div class="comment__detail">
            <div class="comment__detail__wrap">
            </div>
            <div class="comment__detail__placeholder">
              <div class="group relative">
                <button class="comm__icon">
                  <svg stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" height="44" width="44" fill="none">
                    <path fill="none" d="M0 0h24v24H0z" stroke="none"></path>
                    <path d="M8 9h8"></path>
                    <path d="M8 13h6"></path>
                    <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z"></path>
                  </svg>
                  <span>No chat selected</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="detail admin_profile hidden">
          <h6>Manage Account</h6>
          <form class="admin_profile_form" enctype="multipart/form-data">
            <div>
              <div class="input">
                <label for="admin_name">Name </label>
                <input type="text" class="admin__name" id="admin_name" name="name">
              </div>
              <div class="input">
                <label for="admin_email">Email </label>
                <input type="email" class="admin__email" id="admin_email" name="email">
              </div>
              <div class="input">
                <label for="admin_pass">Password </label>
                <input type="password" class="admin_pass" id="admin_pass" autocomplete="" name="pass">
              </div>
              <button class="save" type="submit">Update Info</button>
            </div>
            <div>
              <input type="file" id="profile__img" accept="image/*" name="admin_img">
              <div class="admin_img">
                <img src="<?php echo empty($imgSrc) ? "../../../assets/images/admin.png" : $imgSrc ?>" alt="admin">
                <label for="profile__img"><i class="fa-solid fa-camera"></i></label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="profile__container">
      <div class="profile">
        <img class="admin_img" src="<?php echo empty($imgSrc) ? "../../../assets/images/admin.png" : $imgSrc ?>" alt="admin image">
        <div>
          <span class="admin_name"><?php echo $name ?></span>
        </div>
        <span class="down"><i class="fa-solid fa-caret-down"></i></span>
        <ul class="profile__details hidden">
          <li class="p-head">Profile</li>
          <li class="settings">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
          </li>
          <li class="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log out</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</body>


</html>