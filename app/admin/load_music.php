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
        <!-- Input file -->
        <div class="form__item">
          <label for="file">Load music</label>
          <input type="file" name="file" id="file" class='form__item-file' data-multiple-caption="{count} files selected" multiple>
          <label for="file">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
            <span>Choose a file</span>
          </label>
        </div>
        <!-- Input title -->
        <div class="form__item">
          <label for="title">Title</label><br/>
          <input type="text" name="title"/><br/>
        </div>
        <div class="form__item">
          <label for="image">Link image</label><br/>
          <input type="text" name="image"/><br/>
        </div>
        <div class="form__item">
          <label for="author">Author</label><br/>
          <input type="text" name="author"/><br/>
        </div>
        <input style="margin-top: 21px" class="button" type="submit" value="Load">
      </div>
    </form>
  </section>
  <script src="../../public/js/main.js"></script>
  <script>
    (function (document, window, index) {
      const inputs = document.querySelectorAll(".form__item-file");

      inputs.forEach((input) => {
        const label = input.nextElementSibling;
        const labelOriginalText = label.innerHTML;

        input.addEventListener("change", (e) => {
          const files = e.target.files;

          if (files.length === 0) {
            label.innerHTML = labelOriginalText;
          } else {
            const fileName = files[0].name;
            label.querySelector("span").innerHTML = fileName;
          }
        });

        // Firefox bug fix
        input.addEventListener("focus", () => {
          input.classList.add("has-focus");
        });
        input.addEventListener("blur", () => {
          input.classList.remove("has-focus");
        });
      });
    })(document, window, 0);
  </script>
</body>

</html>
