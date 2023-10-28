<?php
    require_once "../vendor/autoload.php";
    session_start();

    if(App\User::logoutUser()) {header("Location: /public/index.php");}
    else {echo "Ошибка №82. Сообщите <a href='https://t.me/murphez'>разработчику</a>";}
?>