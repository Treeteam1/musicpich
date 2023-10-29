<?php
    session_start();
    require_once "../../vendor/autoload.php";
    $user = new App\User();
    $data = [
        "name" => htmlspecialchars(trim($_POST['name'])),
        "email" => htmlspecialchars(trim($_POST['email'])),
        "password" => htmlspecialchars(trim($_POST['password']))
    ];

    if(empty($data['email']) || empty($data['password']) || empty($data['name'])) {
        echo "Поле с именем, почтой или паролем пустые";
        exit;
    } else {
        if ($user->registrationUser($data['name'], $data['email'], $data['password'])) {
            $_SESSION['login'] = $name;
            header('Location: /public/index.php');
        }
        else { 
            echo "Ошибка №81. Сообщите <a href='https://t.me/murphez'>разработчику</a>";
        }
    }
?>