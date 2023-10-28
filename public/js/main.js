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
        console.log('aaaaaaaa');
    } else {
        document.getElementsByClassName("accordion__button").style.display = 'block';
        console.log('bbbbbbb');
    }
});