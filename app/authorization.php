<?php 
  require_once "../vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Musicpich</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css"
    integrity="sha512-4xo8blKMVCiXpTaLzQSLSw3KFOVPWhm/TRtuPVc4WG6kUgjH6J03IBuG7JZPkcWMxJ5huwaBpOpnwYElP/m6wg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Anton&family=Plus+Jakarta+Sans:wght@600&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../public/css/style.css" />
  <link rel="stylesheet" href="../public/css/adaptive.css" />
  <link rel="icon" href="../public/images/logo.png" type="image/x-icon" />
</head>

<body>
  <section class="form">
    <img class="form__image" src="../public/assets/images/RelicsOfAMortalPast-NFT1.png" alt=""/>
    <form action="/app/checked/check_authorization.php" method="post">
      <h2 class="title">Welcome to Musicpich</h2>
      <p class="subtitle">Sign in your account</p>
      <div class="form__items">
        <div class="form__item">
          <label for="email">Login</label><br/>
          <input type="text" name="login" id="login" placeholder="E-mail or name"/><br/>
        </div>
        <div class="form__item">
          <label for="password">Password</label><br/>
          <div class="form__item-hide_text">
            <input type="password" name="password" class="password-input" placeholder="8+ Strong character"/>
            <img class="visibility-off" src="../public/assets/images/eye-off.png" alt=""/>
            <img class="visibility-on" src="../public/assets/images/eye-on.png" alt=""/>
          </div>
        </div>
        <input style="margin-top: 21px" class="button" type="submit" value="Log in">
        <div class="text-container">
          <p class="form__bottom-description">Don't have an account ? <a class="green__span" href="/app/registration.php">Sign up</a></p>
        </div>
      </div>
    </form>
  </section>
  <script src="../public/js/main.js"></script>
</body>

</html>