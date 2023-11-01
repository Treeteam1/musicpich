<?php 
  session_start();
  require_once "../vendor/autoload.php";
  require_once "../app/blocks/header.php"; 
?>
<link rel="icon" href="./assets/images/logo.png" type="image/x-icon"/>
    <!-- Основний блок -->
    <section class="hero-section">
      <!-- <div class="background-overlay"></div> -->
      <div class="container">
        <h1 class="hero-title">Epic music<br>experience</h1>
        <p class="hero-subtitle">
          У нас есть идеальная музыка с бесплатной лицензией для вашей<br>
          креативности. Откройте для себя возможности прямо сейчас!
        </p>
        <button style="margin-top: 21px" class="button" type="button">Начать</button>
      </div>
    </section>
  </header>
  <!-- Наші соц. мережі -->
  <section class="downloads-music">
    <div class="container">
      <h2 class="title">Загрузка музыки для всех ваших творческих проектов</h2>
      <p class="subtitle">
        Раскройте свой творческий потенциал с помощью наших универсальных музыкальных загрузок<br>
        для любого проекта, который вы задумали и просто для души.
      </p>
      <ul class="list music-variants-ul">
        <li class="music-variants-ul-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><path d="M27.1673 8L12.5007 22.6667L5.83398 16" stroke="#37C25E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>Youtube</p>
        </li>
        <li class="music-variants-ul-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><path d="M27.1673 8L12.5007 22.6667L5.83398 16" stroke="#37C25E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>Instagram</p>
        </li>
        <li class="music-variants-ul-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><path d="M27.1673 8L12.5007 22.6667L5.83398 16" stroke="#37C25E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>TikTok</p>
        </li>
        <li class="music-variants-ul-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><path d="M27.1673 8L12.5007 22.6667L5.83398 16" stroke="#37C25E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>Games</p>
        </li>
        <li class="music-variants-ul-item">
          <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none"><path d="M27.1673 8L12.5007 22.6667L5.83398 16" stroke="#37C25E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <p>Commercials</p>
        </li>
      </ul>
    </div>
  </section>
  <!-- Філтрація музики -->
  <section class="filter-and-music">
    <div class="container">
      <!-- Верхнє меню для фільтрації -->
      <div class="found-header">
        <!-- Поле для пошуку по назві треку -->
        <div class="found-flex-container">
          <div class="input-flex-container">
            <input class="search-input" type="text" name="search" id="search" placeholder="Search Music or Backsound"/>
            <svg class="search-image" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M11.7669 20.7554C16.7311 20.7554 20.7554 16.7311 20.7554 11.7669C20.7554 6.80263 16.7311 2.77832 11.7669 2.77832C6.80263 2.77832 2.77832 6.80263 2.77832 11.7669C2.77832 16.7311 6.80263 20.7554 11.7669 20.7554Z" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.0186 18.4854L21.5426 22.0002" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
        </div>
        <!-- Випадаючі списки для філтрації -->
        <ul class="dropdowns-ul list">
          <!-- Випадаючий список "Popular" -->
          <li class="nav-item dropdown">
            <button id="dropdown-btn-popular" class="dropdown-toggle" data-target="dropdown-menu1" type="button">Popular<span class="dropdown-btn"></span></button>
            <ul id="dropdown-menu1" class="dropdown-menu list hide">
              <li><a id="dropdown-popular" class="dropdown-item link">Popular</a></li>
              <li><a id="dropdown-newest" class="dropdown-item link">Newest</a></li>
              <li><a id="dropdown-relevant" class="dropdown-item link">Relevant</a></li>
              <li><a id="dropdown-none" class="dropdown-item link">None</a></li>
            </ul>
          </li>
          <!-- Випадаючий список "Duration" -->
          <li class="nav-item dropdown">
            <button id="dropdown-btn-duration" class="dropdown-toggle" data-target="dropdown-menu2" type="button">Duration<span class="dropdown-btn"></span></button>
            <ul id="dropdown-menu2" class="dropdown-menu list hide">
              <li><a id="dropdown-short" class="dropdown-item link">Short</a></li>
              <li><a id="dropdown-medium" class="dropdown-item link">Medium</a></li>
              <li><a id="dropdown-long" class="dropdown-item link">Long</a></li>
              <li><a id="dropdown-very-long" class="dropdown-item link">Very long</a></li>
            </ul>
          </li>
          <!-- Випадаючий список "Vocal & Instrument" -->
          <li class="nav-item dropdown">
            <button id="dropdown-btn-vi" class="dropdown-toggle vocal" data-target="dropdown-menu3" type="button">Vocal & Instrument<span style="position: relative; top: -3px" class="dropdown-btn"></span></button>
            <ul id="dropdown-menu3" style="width: 260px" class="dropdown-menu list hide">
              <li><a id="dropdown-vocal" class="dropdown-item link">Vocal</a></li>
              <li><a id="dropdown-instrument" class="dropdown-item link">Instrument</a></li>
              <li><a id="dropdown-vi" style="width: 260px" class="dropdown-item link">Vocal & Instrument</a></li>
              <li><a id="dropdown-nonee" class="dropdown-item link">None</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Меню для філтрації | Списки з треками -->
      <div class="filters-flex-container">
        <!-- Меню зліва для філтрації -->
        <div class="filters">
          <!-- Кнопка "Фільтр" -->
          <button id="filter-btn" class="filter-btn" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 9H19" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M5 15H13" stroke="white" stroke-width="2" stroke-linecap="round"/></svg>
            Filter
          </button>
          <!-- Аккордіон ( випадающий список ) -->
          <button class="accordion__button">Mood</button>
          <div class="accordion__panel">
            <ul class="accordion__panel-list">
              <li>
                <input class="form__checkbox" type="checkbox" name="chill" id="chill"/>
                <label class="form__checkbox-label" for="chill"></label>
                <label for="chill">Chill</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="dramatic" id="dramatic"/>
                <label class="form__checkbox-label" for="dramatic"></label>
                <label for="dramatic">Dramatic</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="happy" id="happy"/>
                <label class="form__checkbox-label" for="happy"></label>
                <label for="happy">Happy</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="sad" id="sad"/>
                <label class="form__checkbox-label" for="sad"></label>
                <label for="sad">Sad</label>
              </li>
              </li>
            </ul>
          </div>
          <!-- Аккордіон ( випадающий список ) -->
          <button class="accordion__button">Instrument</button>
          <div class="accordion__panel">
            <ul class="accordion__panel-list">
              <li>
                <input class="form__checkbox" type="checkbox" name="chill" id="chill"/>
                <label class="form__checkbox-label" for="chill"></label>
                <label for="chill">Chill</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="dramatic" id="dramatic"/>
                <label class="form__checkbox-label" for="dramatic"></label>
                <label for="dramatic">Dramatic</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="happy" id="happy"/>
                <label class="form__checkbox-label" for="happy"></label>
                <label for="happy">Happy</label>
              </li>
            </ul>
          </div>
          <!-- Аккордіон ( випадающий список ) -->
          <button class="accordion__button">Theme</button>
          <div class="accordion__panel">
            <ul class="accordion__panel-list">
              <li>
                <input class="form__checkbox" type="checkbox" name="chill" id="chill"/>
                <label class="form__checkbox-label" for="chill"></label>
                <label for="chill">Chill</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="dramatic" id="dramatic"/>
                <label class="form__checkbox-label" for="dramatic"></label>
                <label for="dramatic">Dramatic</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="happy" id="happy"/>
                <label class="form__checkbox-label" for="happy"></label>
                <label for="happy">Happy</label>
              </li>
            </ul>
          </div>
          <!-- Аккордіон ( випадающий список ) -->
          <button class="accordion__button">Genre</button>
          <div class="accordion__panel">
            <ul class="accordion__panel-list">
              <li>
                <input class="form__checkbox" type="checkbox" name="chill" id="chill"/>
                <label class="form__checkbox-label" for="chill"></label>
                <label for="chill">Chill</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="dramatic" id="dramatic"/>
                <label class="form__checkbox-label" for="dramatic"></label>
                <label for="dramatic">Dramatic</label>
              </li>
              <li>
                <input class="form__checkbox" type="checkbox" name="happy" id="happy"/>
                <label class="form__checkbox-label" for="happy"></label>
                <label for="happy">Happy</label>
              </li>
            </ul>
          </div>
        </div>
        <!-- Списки з треками -->
        <div class="musics">
          <ul id="musicList" class="musics-ul list">
            <?php
              $db = new App\Database();
              $stmt = $db->conn->prepare("SELECT * FROM `musics`");
              $stmt->execute();
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $item = 0;

              if(count($results) > 0) {
                foreach($results as $result) {
                  $item++;
                  if($item > 10) {break;}
                  ?>
                    <li class="musics__item" data-id="<?= $result['id']; ?>">
                      <img class="musics__item-image" width="280px" src="<?= $result['image']; ?>" alt=""/>
                      <div class="musics__item-info">
                        <p class="musics__item-title"><?= $result['title']; ?></p>
                        <p class="musics__item-author"><?= $result['author']; ?></p>
                        <hr/>
                        <div class="musics__item-info-flex">
                          <ul class="interactive-music-ul">
                            <li class="interactive-music-item save">
                              <a href="..<?= $result['dir']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#A7AAB5">
                                  <path d="M17.5 12.5V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0118C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0118C2.67559 16.6993 2.5 16.2754 2.5 15.8333V12.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M5.83301 8.33334L9.99967 12.5L14.1663 8.33334"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                  <path d="M10 12.5V2.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                              </a>
                            </li>
                            <li class="interactive-music-item">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.3667 3.84167C16.9411 3.41584 16.4357 3.07804 15.8795 2.84757C15.3233 2.6171 14.7271 2.49848 14.1251 2.49848C13.523 2.49848 12.9268 2.6171 12.3706 2.84757C11.8144 3.07804 11.309 3.41584 10.8834 3.84167L10.0001 4.725L9.11673 3.84167C8.25698 2.98192 7.09092 2.49892 5.87506 2.49892C4.6592 2.49892 3.49314 2.98192 2.63339 3.84167C1.77365 4.70141 1.29065 5.86747 1.29065 7.08333C1.29065 8.29919 1.77365 9.46526 2.63339 10.325L3.51672 11.2083L10.0001 17.6917L16.4834 11.2083L17.3667 10.325C17.7926 9.89937 18.1304 9.39401 18.3608 8.8378C18.5913 8.28158 18.7099 7.68541 18.7099 7.08333C18.7099 6.48126 18.5913 5.88509 18.3608 5.32887C18.1304 4.77265 17.7926 4.2673 17.3667 3.84167Z" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </li>
                            <li class="interactive-music-item">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M9.99996 10.8333C10.4602 10.8333 10.8333 10.4602 10.8333 10C10.8333 9.53976 10.4602 9.16667 9.99996 9.16667C9.53972 9.16667 9.16663 9.53976 9.16663 10C9.16663 10.4602 9.53972 10.8333 9.99996 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.8333 10.8333C16.2936 10.8333 16.6667 10.4602 16.6667 10C16.6667 9.53976 16.2936 9.16667 15.8333 9.16667C15.3731 9.16667 15 9.53976 15 10C15 10.4602 15.3731 10.8333 15.8333 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.16671 10.8333C4.62694 10.8333 5.00004 10.4602 5.00004 10C5.00004 9.53976 4.62694 9.16667 4.16671 9.16667C3.70647 9.16667 3.33337 9.53976 3.33337 10C3.33337 10.4602 3.70647 10.8333 4.16671 10.8333Z" fill="#A7AAB5" stroke="#A7AAB5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                            </li>
                          </ul>
                          <div class="audio-player">
                            <audio id="audio" src="..<?= $result['dir']; ?>"></audio>
                            <button id="playButton" class="play-button"></button>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?
                }
              } else echo "Музики немає";
            ?>
          </ul>
          <?php
            if(count($results) > 10) {
              ?>
                <div class="center_container">
                  <button id="loadMore" style="margin-top: 24px;" class="button stroke-btn" type="button">Показать больше</button>
                </div>
              <?
            }
          ?>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.getElementById("loadMore").addEventListener("click", function() {
        var lastId = 0;
        var loadedItems = document.querySelectorAll(".musics__item");
        if (loadedItems.length > 0) {
            lastId = loadedItems[loadedItems.length - 1].dataset.id;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../app/load_more_data.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            // Добавляем полученные данные на страницу
            var contentDiv = document.getElementById("musicList"); // Змінено з "content" на "musicList"
            contentDiv.innerHTML += xhr.responseText;
        };
        xhr.send("page=" + page + "&lastId=" + lastId);
    });
  </script>
<?php require_once "../app/blocks/footer.php"; ?>