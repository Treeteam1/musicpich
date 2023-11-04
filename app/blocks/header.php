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
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Musicpich</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css" integrity="sha512-4xo8blKMVCiXpTaLzQSLSw3KFOVPWhm/TRtuPVc4WG6kUgjH6J03IBuG7JZPkcWMxJ5huwaBpOpnwYElP/m6wg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Plus+Jakarta+Sans:wght@600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="../public/css/style.css"/>
  <link rel="stylesheet" href="../public/css/adaptive.css"/>
  <link rel="icon" href="../public/assets/images/logo.png" type="image/x-icon"/>
  <script>
      var loadedItems = 34;

      function loadMoreItems() {
          $.ajax({
              url: '../app/load_more.php',
              type: 'POST',
              data: { loadedItems: loadedItems },
              success: function(response) {
                  $('#items-container').append(response);
                  loadedItems += 5; // Assuming 5 items loaded at a time
              }
          });
      }
  </script>
</head>

<body>
  <!-- Навигация -->
  <header class="header">
    <nav class="navigate">
      <div class="container">
        <!-- Бургер меню -->
        <div class="navigate__burger">
          <div class="navigate__burger-container">
            <div class="navigate__burger-logo">
              <div class="logo-container">
                <img src="../public/assets/images/logo.png" alt="Website Logo" class="logo"/>
                <a href="/public/index.php" class="websites-name">Musicpich</a>
              </div>
            </div>
            <div class="navigate__burger-lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="navigate__burger-menu">
              <ul>
                <li><a class="navigate__menu-item" href="#">Главная</a></li>
                <li><a class="navigate__menu-item" href="#">FAQ</a></li>
                <li><a class="navigate__menu-item" href="#">Связь с нами</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- ПК меню -->
        <ul class="navigate__menu">
          <!-- Логотип -->
          <li>
            <div class="logo-container">
              <img src="../public/assets/images/logo.png" alt="Website Logo" class="logo"/>
              <a href="/public/index.php" class="websites-name">Musicpich</a>
            </div>
          </li>
          <!-- Сама навігація -->
          <li>
            <div class="navigate__menu-items">
              <a class="navigate__menu-item" href="#">Главная</a>
              <a class="navigate__menu-item" href="#">FAQ</a>
              <a class="navigate__menu-item" href="#">Связь с нами</a>
            </div>
          </li>
          <!-- Кнопки справа -->
          <li>
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
                      <a href="/app/admin/load_music.php" class="button stroke-btn">Админ панель</a>
                    <?php
                  }
                } else {
                  ?>
                    <a href="/app/authorization.php" class="button">Войти</a>
                    <a href="/app/registration.php" class="button stroke-btn">Зарегистрироваться</a>
                  <?php
                }
              ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
