<?php
    session_start();
    require_once "../../vendor/autoload.php";

    $user = new \App\User();

    $login = htmlspecialchars(trim($_POST["login"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if (empty($login) || empty($password)) {
        echo "Поле с почтой или паролем пустые";
        exit;
    } else {
        if ($user->loginUser($login, $password)) {
            $columns = ["email = ?", "name = ?"];
            $values = [$login, $login];
            $result = \App\Database::selectDatabaseEx("users", $columns, $values, "OR");
            $name = $result['name'];
            $_SESSION['login'] = $name;

            if($result['admin'] > 0) {
                $_SESSION['admin'] = $result['admin'];
                header('Location: /public/index.php');
            }
            header('Location: /public/index.php');
            exit;
        } else {
            echo "Не вірна пошта або пароль";
            exit;
        }
    }
?>