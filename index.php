<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="./styles/page.css" />
  <title>CHMSU TMS</title>
  <style>
    .link {
      text-decoration: none;
      margin: 15px;
      display: none;
    }

    @media screen and (max-device-width: 480px) {
      .link {
        display: inline;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar Section -->
  <nav class="navbar animate__animated animate__fadeIn">
    <a href="index.php" class="navbar__logo"><img src="images/logo.png" alt=""></a>
    <div class="navbar__menu">
      <a href="index.php" class="navbar__menu--links">Home</a>
      <a href="guidelines.php" class="navbar__menu--links">Guidelines</a>
      <a href="login.php" class="navbar__menu--links" id="button">Sign in</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="hero__container">
      <div class="hero__container--left animate__animated animate__fadeInLeft">
        <h1>Become a part of </h1>
        <h2>CHMSU Tenant</h2>
        <p>Sign up now to join the list.</p>

        <button class="hero__container--btn"><a href="registration.php">Register</a></button>
        <a href="login.php" class="link">Sign in</a>


      </div>
      <div class="hero__container--right animate__animated animate__fadeInRight">
        <img src="images/15588818_5643749.png" alt="alien" class="hero__container--img" />
      </div>
    </div>
  </div>
</body>

</html>