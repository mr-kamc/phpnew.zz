<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\News::findLastNews(3);

include __DIR__ . '/App/templates/news.php';

/*
$ctrl = !empty($_GET['ctrl'])? 'App\\Controllers\\' . $_GET['ctrl'] : 'App\\Controllers\\News';
$act = !empty($_GET['act'])? $_GET['act'] : 'Index';

$controller = new $ctrl;
$controller->action($act);
*/
