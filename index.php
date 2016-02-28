<?php

require __DIR__ . '/autoload.php';
/*
$news = \App\Models\News::findLastNews(3);

include __DIR__ . '/App/templates/news.php';
*/
$user = new \App\Models\User();
$user->email = 'dfsdfas@mail.ru';
$user->name = 'Vasya';
$user->insert();
