<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="../../../assets/CSS/login.css">
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/x-icon">
  <script type="module" src="../../controllers/adminLogin.js" defer></script>
  <title>LogIn | Dashboard Hagurash</title>
</head>
<body>
  <div class="wrapper">
    <div class="inner__wrap">
      <div class="wrap__close">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="sign-in ">
          <fieldset class="fieldset">
            <div class="line"></div>
            <img src="../../../assets/images/Logo.png" alt="Hagurash logo.png">
            <h1>Admin Login</h1>
            <div class="name__input">
              <label for="email">Email</label>
              <input class="input" type="text" autofocus name="email" id="email">
            </div>
            <div class="pass__input">
              <label for="pin">Password</label>
              <input class="input" autocomplete="" type="password" name="pass" id="pin" minlength="8" maxlength="20">
            </div>
            <input class="input" type="submit" value="Sign-In">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>

</html>