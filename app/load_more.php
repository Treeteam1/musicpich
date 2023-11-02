<?php
    require_once "../vendor/autoload.php";
    // Подключение к базе данных и другие необходимые настройки

    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $loadedItems = $data->lastId;

    $db = new App\Database();
    $stmt = $db->conn->prepare("SELECT * FROM `musics` ORDER BY `id` LIMIT $loadedItems, 5");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($results as $result) {
        ?>
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
        <?
    }
?>