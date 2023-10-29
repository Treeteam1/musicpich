<?php
  require_once "../../vendor/autoload.php";
  session_start();

  $user = new App\User();
  $userData = $user->getUserData();
  $user->getUserAdmin(0);
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
  <link rel="icon" href="../../public/assets/images/logo.png" type="image/x-icon" />
</head>

<body>
  <section class="form" style="background-color: transparent;margin: -125px 0 -135px">
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
  <div class="musics center_container" style="margin-bottom: 65px;">
    <ul class="musics-ul list">
      <?php
        $db = new App\Database();
        $stmt = $db->conn->prepare("SELECT * FROM `musics`");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0) {
          foreach($results as $result) {
            ?>
              <li class="musics__item">
                <img class="musics__item-image" width="280px" src="<?= $result['image']; ?>" alt="" />
                <div class="musics__item-info">
                  <p class="musics__item-title"><?= $result['title']; ?></p>
                  <p class="musics__item-author"><?= $result['author']; ?></p>
                  <hr />
                  <div class="musics__item-info-flex">
                    <ul class="interactive-music-ul">
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#A7AAB5">
                          <path d="M17.5 12.5V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V12.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M5.83301 8.33334L9.99967 12.5L14.1663 8.33334"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M10 12.5V2.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.3667 3.84167C16.9411 3.41584 16.4357 3.07804 15.8795 2.84757C15.3233 2.6171 14.7271 2.49848 14.1251 2.49848C13.523 2.49848 12.9268 2.6171 12.3706 2.84757C11.8144 3.07804 11.309 3.41584 10.8834 3.84167L10.0001 4.725L9.11673 3.84167C8.25698 2.98192 7.09092 2.49892 5.87506 2.49892C4.6592 2.49892 3.49314 2.98192 2.63339 3.84167C1.77365 4.70141 1.29065 5.86747 1.29065 7.08333C1.29065 8.29919 1.77365 9.46526 2.63339 10.325L3.51672 11.2083L10.0001 17.6917L16.4834 11.2083L17.3667 10.325C17.7926 9.89937 18.1304 9.39401 18.3608 8.8378C18.5913 8.28158 18.7099 7.68541 18.7099 7.08333C18.7099 6.48126 18.5913 5.88509 18.3608 5.32887C18.1304 4.77265 17.7926 4.2673 17.3667 3.84167Z" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                          <path d="M9.99996 10.8333C10.4602 10.8333 10.8333 10.4602 10.8333 10C10.8333 9.53976 10.4602 9.16667 9.99996 9.16667C9.53972 9.16667 9.16663 9.53976 9.16663 10C9.16663 10.4602 9.53972 10.8333 9.99996 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M15.8333 10.8333C16.2936 10.8333 16.6667 10.4602 16.6667 10C16.6667 9.53976 16.2936 9.16667 15.8333 9.16667C15.3731 9.16667 15 9.53976 15 10C15 10.4602 15.3731 10.8333 15.8333 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M4.16671 10.8333C4.62694 10.8333 5.00004 10.4602 5.00004 10C5.00004 9.53976 4.62694 9.16667 4.16671 9.16667C3.70647 9.16667 3.33337 9.53976 3.33337 10C3.33337 10.4602 3.70647 10.8333 4.16671 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                      </li>
                      <li>
                        <a href="/app/checked/check_music_delete.php?id=<?= $result['id']; ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="#bd4040" viewBox="0 0 64 64" width="25px" height="25px"><path d="M 28 7 C 25.243 7 23 9.243 23 12 L 23 15 L 13 15 C 11.896 15 11 15.896 11 17 C 11 18.104 11.896 19 13 19 L 15.109375 19 L 16.792969 49.332031 C 16.970969 52.510031 19.600203 55 22.783203 55 L 41.216797 55 C 44.398797 55 47.029031 52.510031 47.207031 49.332031 L 48.890625 19 L 51 19 C 52.104 19 53 18.104 53 17 C 53 15.896 52.104 15 51 15 L 41 15 L 41 12 C 41 9.243 38.757 7 36 7 L 28 7 z M 28 11 L 36 11 C 36.552 11 37 11.449 37 12 L 37 15 L 27 15 L 27 12 C 27 11.449 27.448 11 28 11 z M 19.113281 19 L 44.886719 19 L 43.212891 49.109375 C 43.153891 50.169375 42.277797 51 41.216797 51 L 22.783203 51 C 21.723203 51 20.846109 50.170328 20.787109 49.111328 L 19.113281 19 z M 32 23.25 C 31.033 23.25 30.25 24.034 30.25 25 L 30.25 45 C 30.25 45.966 31.033 46.75 32 46.75 C 32.967 46.75 33.75 45.966 33.75 45 L 33.75 25 C 33.75 24.034 32.967 23.25 32 23.25 z M 24.642578 23.251953 C 23.677578 23.285953 22.922078 24.094547 22.955078 25.060547 L 23.652344 45.146484 C 23.685344 46.091484 24.462391 46.835938 25.400391 46.835938 C 25.421391 46.835938 25.441891 46.835938 25.462891 46.835938 C 26.427891 46.801938 27.183391 45.991391 27.150391 45.025391 L 26.453125 24.939453 C 26.419125 23.974453 25.606578 23.228953 24.642578 23.251953 z M 39.355469 23.251953 C 38.388469 23.224953 37.580875 23.974453 37.546875 24.939453 L 36.849609 45.025391 C 36.815609 45.991391 37.571109 46.801938 38.537109 46.835938 C 38.558109 46.836938 38.578609 46.835938 38.599609 46.835938 C 39.537609 46.835938 40.314656 46.091484 40.347656 45.146484 L 41.044922 25.060547 C 41.078922 24.094547 40.321469 23.285953 39.355469 23.251953 z"/></svg>
                        </a>
                      </li>
                    </ul>
                    <!-- <button class="play-music-btn" type="button">
                      <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 32 32" fill="none">
                        <path
                          d="M21 14.2679C22.3333 15.0378 22.3333 16.9623 21 17.7321L15 21.1962C13.6667 21.966 12 21.0037 12 19.4641L12 12.5359C12 10.9963 13.6667 10.034 15 10.8038L21 14.2679Z"
                          fill="#37C25E" />
                        <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#37C25E" />
                      </svg>
                    </button> -->
                    <div class="audio-player">
                      <audio id="audio" src="../..<?= $result['dir']; ?>"></audio>
                      <button id="playButton" class="play-button"></button>
                    </div>
                  </div>
                </div>
              </li>
            <?
          }
        } else {
          echo "Музики немає";
          return 1;
        }
      ?>
    </ul>
    <?php
      if(count($results) > 15) {
        ?>
          <div class="center_container">
            <button style="margin-top: 24px;" class="button stroke-btn" type="button">View More</button>
          </div>
        <?
      }
    ?>
  </div>
  <script src="../../public/js/main.js"></script>
</body>

</html>
