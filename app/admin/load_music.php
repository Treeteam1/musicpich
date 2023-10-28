<?php 
  require_once "../../vendor/autoload.php";
  session_start();

  if(!empty($_SESSION['login'])) {
    $columns = ["email = ?", "name = ?"];
    $values = [$_SESSION['login'], $_SESSION['login']];
    $userResult = \App\Database::selectDatabaseEx("users", $columns, $values, "OR");
  }
  if(!$userResult['admin'] > 0) {
    header("Location: /public/index.php");
    exit();
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
  <link rel="stylesheet" href="../../public/css/style.css" />
  <link rel="stylesheet" href="../../public/css/adaptive.css" />
  <link rel="icon" href="../../public/images/logo.png" type="image/x-icon" />
</head>

<body>
  <section class="form">
    <form action="/app/checked/check_load_music.php" method="post" enctype="multipart/form-data">
      <h2 class="title">Load music</h2>
      <div class="form__items">
        <div class="form__item">
          <label for="email">Load music</label><br/>
          <input type="file" name="file"/><br/>
        </div>
        <input style="margin-top: 21px" class="button" type="submit" value="Load">
      </div>
    </form>
  </section>
  <script src="../../public/js/main.js"></script>
</body>

</html>