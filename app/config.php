<?php
    $dsn = "mysql:host=localhost;dbname=music_db";
    $pdo = new PDO($dsn, 'root', '');

    try {
        $pdo = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
        echo 'Connection failed:' . $e->getMessage();
    }
?>