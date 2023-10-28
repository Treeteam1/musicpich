<?php
    // if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/app/music/';
        chmod($targetDirectory, 0755);
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true); // Створити каталог, якщо його немає
        }
        
        $tmpFilePath = $_FILES['file']['tmp_name'];
        $newFilePath = '/app/music/' . $_FILES['file']['name'];

        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            echo "Файл успішно завантажено." . $_FILES['file']['name'];
        } else {
            echo "Помилка під час переміщення файлу.";
        }
    // } else {
    //     echo "Помилка при завантаженні файлу.";
    // }
    
?>