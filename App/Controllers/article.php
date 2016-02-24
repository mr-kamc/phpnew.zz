<?php

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'] ?: false;
if (!empty($id)) {
    if ($article = \App\Models\News::findById($id)){
        include __DIR__ . '/../templates/article.php';
    } else {
        echo 'Записи с таким id не существует!';
    }
} else {
    header('Location: /');
}