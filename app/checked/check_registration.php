<?php
    session_start();
    require_once "../../vendor/autoload.php";

    $user = new App\User();

    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if(empty($email) || empty($password) || empty($name)) {
        echo "Поле с именем, почтой или паролем пустые";
        exit;
    } else {
        if ($user->registrationUser($name, $email, $password)) {
            $_SESSION['login'] = $name;
            header('Location: /public/index.php');
        }
        else { 
            echo "Ошибка №81. Сообщите <a href='https://t.me/murphez'>разработчику</a>";
        }
    }
?>