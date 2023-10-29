<?php
    require_once "../../vendor/autoload.php";
    $music = new App\Music();

    $data = [
        "title" => htmlspecialchars(trim($_POST['title'])),
        "author" => htmlspecialchars(trim($_POST['author'])),
        "image" => htmlspecialchars(trim($_POST['image']))
    ];

    if(empty($data['title'])) {
        echo "Поле з назвою не має бути пустим";
        return 1;
    }
    else if(empty($data['author'])) {
        echo "Поле з назвою не має бути пустим";
        return 1;
    }
    else if(empty($data['image'])) {
        echo "Поле з назвою не має бути пустим";
        return 1;
    }
    else {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/app/music/';
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0755, true); // Створити каталог, якщо його немає
            }

            chmod($targetDirectory, 0755); // Встановлюємо права на папку

            $tmpFilePath = $_FILES['file']['tmp_name'];
            $newFilePath = $targetDirectory . $_FILES['file']['name'];

            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                echo "Файл " . $_FILES['file']['name'] . " успішно завантажено.";
                $music->loadMusic($data['title'], $data['author'], "/app/music/{$_FILES['file']['name']}", $data['image']);
                exit;
            } else echo "Помилка під час переміщення файлу.";
        } else echo "Помилка при завантаженні файлу.";
    }
?>
