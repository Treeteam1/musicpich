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
    <form action="/app/checked/check_registration.php" method="post">
      <h2 class="title">Welcome to Musicpich</h2>
      <p class="subtitle">Create your account</p>
      <div class="form__items">
        <div class="form__item">
          <label for="name">Full name</label><br/>
          <input type="text" id="name" name="name" placeholder="Nodo"/><br/>
        </div>
        <div class="form__item">
          <label for="email">Email</label><br/>
          <input type="email" name="email" id="email" placeholder="Nodarimekvasfebvilli@gmail.com"/><br/>
        </div>
        <div class="form__item">
          <label for="password">Password</label><br/>
          <div class="form__item-hide_text">
            <input type="password" name="password" class="password-input" placeholder="8+ Strong character"/>
            <img class="visibility-off" src="../public/assets/images/eye-off.png" alt=""/>
            <img class="visibility-on" src="../public/assets/images/eye-on.png" alt=""/>
          </div>
        </div>
        <div class="form__item">
          <label for="rep_password">Repeat password</label>
          <div class="form__item-hide_text">
            <input type="password" name="rep_password" class="password-input" placeholder="8+ Strong character"/>
            <img class="visibility-off" src="../public/assets/images/eye-off.png" alt=""/>
            <img class="visibility-on" src="../public/assets/images/eye-on.png" alt=""/>
          </div>
        </div>
        <div class="form__checkbox-items">
          <input class="form__checkbox" type="checkbox" name="agreement" id="agreement"/>
          <label class="form__checkbox-label" for="agreement"></label>
          <label for="form__checkbox-info">I agree terms & conditions</label>
        </div>
        <input class="button" type="submit" value="Create an account">
        <div class="text-container">
          <p class="form__bottom-description">Already have an account ? <a class="green__span" href="/app/authorization.php">Sign in</a></p>
        </div>
      </div>
    </form>
  </section>
  <script src="../public/js/main.js"></script>
</body>

</html>