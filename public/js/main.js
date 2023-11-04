// Dropdown menu
document.addEventListener('DOMContentLoaded', function() {
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');

    document.addEventListener('click', function(event) {
        const target = event.target;

        // Закриваємо всі відкриті списки, якщо клікнуто не на відкритому списку або його пункті
        if (!target.classList.contains('dropdown-toggle') && !target.classList.contains('dropdown-item')) {
            dropdownMenus.forEach((menu) => {
                menu.style.display = 'none';
            });
            return;
        }

        if (target.classList.contains('dropdown-toggle')) {
            // Відкриваємо або закриваємо відповідний список
            const targetId = target.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);

            if (targetMenu) {
                dropdownMenus.forEach((menu) => {
                    if (menu !== targetMenu) {
                        menu.style.display = 'none';
                    }
                });

                targetMenu.style.display = (targetMenu.style.display === 'none' || targetMenu.style.display === '') ? 'block' : 'none';
            }
        } else if (target.classList.contains('dropdown-item')) {
            // Закриваємо відповідний список та встановлюємо вибраний текст у відповідну кнопку
            const parentMenu = target.closest('.dropdown-menu');
            if (parentMenu) {
                parentMenu.style.display = 'none';
                const targetButtonId = parentMenu.getAttribute('data-target');
                const targetButton = document.getElementById(targetButtonId);

                if (targetButton) {
                    const buttonText = target.textContent;
                    targetButton.textContent = buttonText;
                }
            }
        }
    });
});



/* Акордеон */
var acc = document.getElementsByClassName("accordion__button");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("accordion__active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}



/* Кнопка для скриття тексту при вводі паролю */
/* Отримуємо всі елементи з класами visibility-off та visibility-on */
const visibilityOffButtons = document.querySelectorAll('.visibility-off');
const visibilityOnButtons = document.querySelectorAll('.visibility-on');
const passwordInputs = document.querySelectorAll('.password-input');

/* Додаємо обробники подій до кожної пари кнопок (вимикачів) */
visibilityOffButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        passwordInputs[index].type = 'text';
        button.style.display = 'none';
        visibilityOnButtons[index].style.display = 'block';
    });
});

visibilityOnButtons.forEach((button, index) => {
    button.addEventListener('click', function() {
        passwordInputs[index].type = 'password';
        button.style.display = 'none';
        visibilityOffButtons[index].style.display = 'block';
    });
});
document.getElementById('filter-btn').addEventListener('click', function() {
    if (document.getElementsByClassName("accordion__button").style.display == 'block') {
        document.getElementsByClassName("accordion__button").style.display = 'none';
    } else {
        document.getElementsByClassName("accordion__button").style.display = 'block';
    }
});



/* аудіо */
let currentAudio = null;

document.body.addEventListener('click', function(event) {
    // Перевірити, чи було натискання на кнопку з класом .play-button
    if (event.target.classList.contains('play-button')) {
        // Отримати батьківський .audio-player елемент для конкретної кнопки
        const audioPlayer = event.target.closest('.audio-player');
        // Отримати аудіо елемент і його стан відтворення
        const audio = audioPlayer.querySelector('audio');

        // Перевірити, чи є попередня аудіо-доріжка і чи вона не є тепершньою
        if (currentAudio && currentAudio !== audio) {
            // Призупинити попередню аудіо-доріжку і змінити її значок на паузу
            currentAudio.pause();
            const previousPlayButton = currentAudio.parentElement.querySelector('.play-button');
            if (previousPlayButton) {
                previousPlayButton.classList.remove('paused');
            }
        }

        // Перевірити, чи це не та ж сама аудіо-доріжка, яка вже відтворюється
        if (audio !== currentAudio) {
            // Перевірити, чи поточна аудіо-доріжка існує і вимкнути її
            if (currentAudio) {
                currentAudio.pause();
            }

            // Встановити нову аудіо-доріжку як поточну і відтворити її
            currentAudio = audio;
            audio.play();
            event.target.classList.add('paused');
        } else {
            // Поточна аудіо-доріжка натискана знову, тому вимкнути її
            audio.pause();
            event.target.classList.remove('paused');
            currentAudio = null;
        }
    }
});



/* Програвання другого аудіо одразу після першгого */
const audioPlayers = document.querySelectorAll('.audio-player');
let currentAudioIndex = 0;

function playNextAudio() {
    // Перевірити, чи є наступна аудіо-доріжка
    if (currentAudioIndex < audioPlayers.length - 1) {
        // Призупинити поточну аудіо-доріжку
        if (audioPlayers[currentAudioIndex].querySelector('audio')) {
            audioPlayers[currentAudioIndex].querySelector('audio').pause();
        }

        // Збільшити індекс, щоб відтворити наступну аудіо-доріжку
        currentAudioIndex++;

        // Відтворити наступну аудіо-доріжку
        if (audioPlayers[currentAudioIndex].querySelector('audio')) {
            audioPlayers[currentAudioIndex].querySelector('audio').play();
        }
    }
}

// Додати обробник події 'ended' для кожного аудіо-елемента
audioPlayers.forEach((audioPlayer, index) => {
    const audio = audioPlayer.querySelector('audio');
    audio.addEventListener('ended', () => {
        // Якщо поточний індекс відповідає цьому аудіо-елементу, відтворити наступний
        if (index === currentAudioIndex) {
            playNextAudio();
        }
    });
});



/* Інпут типу file */
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



/* Функціонал кнопки "Показати більше" */
var xhr = new XMLHttpRequest();
xhr.open('POST', '../app/load_more.php', true);
xhr.setRequestHeader('Content-Type', 'application/json');

var loadMoreButton = document.getElementById('loadMore');

loadMoreButton.addEventListener('click', function() {
    var lastId = loadMoreButton.dataset.lastid; // Отримання значення lastId всередині обробника подій
    var data = {
        lastId: lastId
    };

    var jsonData = JSON.stringify(data);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);

            try {
                var response = JSON.parse(xhr.responseText); // Парсимо JSON в масив об'єктів

                response.forEach(function(result) {
                    var listItem = document.createElement('li');
                    var musicList = document.getElementById('musicList');

                    // Ваш код для створення DOM-елементів та їх заповнення даними з result тут

                    musicList.appendChild(listItem);
                });
            } catch (error) {
                console.error('Помилка парсингу JSON: ', error);
            }
        } else {
            console.error('Помилка запиту: ' + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error('Помилка запиту');
    };

    xhr.send(jsonData);
});



/* Бургер меню */
let headerMenuButton = document.querySelector('.navigate__burger-lines');
let headerMenu = document.querySelector('.navigate__burger-menu');
let navigation = document.querySelector('.navigate');
headerMenuButton.addEventListener('click', function(){
	headerMenu.classList.toggle('active');
    headerMenuButton.classList.toggle('active');
})