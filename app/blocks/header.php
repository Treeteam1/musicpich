<?php
session_start();

if (!empty($_SESSION['login'])) {
  $columns = ["email = ?", "name = ?"];
  $values = [$_SESSION['login'], $_SESSION['login']];
  $userResult = \App\Database::selectDatabaseEx("users", $columns, $values, "OR");

  if (isset($userResult['admin']) && $userResult['admin'] > 0) {
    $isAdmin = true;
  } else {
    $isAdmin = false;
  }
}
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
  <!-- Навигация -->
  <header class="header">
    <div class="container">
      <div class="logo-container">
        <img src="../public/assets/images/logo.png" alt="Website Logo" class="logo" />
        <a href="/public/index.php" class="websites-name link">Musicpich</a>
      </div>
      <nav class="navigate">
        <ul class="list nav-ul">
          <li class="nav-ul-item"><a class="link nav-item-link" href="#">Home</a></li>
          <li class="nav-ul-item"><a class="link nav-item-link" href="#">Category</a></li>
          <li class="nav-ul-item"><a class="link nav-item-link" href="#">Pricing</a></li>
          <li class="nav-ul-item"><a class="link nav-item-link" href="#">FAQ</a></li>
          <li class="nav-ul-item"><a class="link nav-item-link" href="#">Contact Us</a></li>
        </ul>
      </nav>
      <div class="popup-btn-container">
        <?php
        if (!empty($_SESSION['login'])) {
          ?>
          <a href="/app/personal.php" class="button stroke-btn">
            <?= $_SESSION['login'] ?>
          </a>
          <?php
          if ($isAdmin) {
            ?>
            <a href="/app/admin/load_music.php" class="button stroke-btn">Admin panel</a>
            <?php
          }
        } else {
          ?>
          <a href="/app/authorization.php" class="button">Login</a>
          <a href="/app/registration.php" class="button stroke-btn">Sign up</a>
          <?php
        }
        ?>
      </div>
    </div>