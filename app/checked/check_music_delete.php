<?php
    require_once "../../vendor/autoload.php";
    session_start();

    $user = new App\User();
    $userData = $user->getUserData();
    $user->getUserAdmin(0);

    $music = new App\Music();
    $data = [
        "id" => htmlspecialchars(trim($_GET['id'])),
    ];

    $music->deleteMusic($data['id']);
    header('Location: /app/admin/load_music.php');
?>