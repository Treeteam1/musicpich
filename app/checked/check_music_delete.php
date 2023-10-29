<?php
    require_once "../../vendor/autoload.php";
    session_start();

    $user = new App\User();
    $db = new App\Database();
    $music = new App\Music();


    $userData = $user->getUserData();
    $user->getUserAdmin(0);

    $data = [
        "id" => htmlspecialchars(trim($_GET['id'])),
    ];
    
    $stmt = $db->conn->prepare("SELECT * FROM musics WHERE id = ?");
    $stmt->execute([$data['id']]);
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $music->deleteMusic($data['id']);
    unlink("../.." . $results['dir']);
    header('Location: /app/admin/load_music.php');
?>