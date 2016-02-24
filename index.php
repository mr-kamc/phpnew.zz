<?php

require __DIR__ . '/autoload.php';

$news = new \App\Models\News();
$article = $news->findLastNews(3);
include __DIR__ . '/App/templates/news.php';