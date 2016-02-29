<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->users = \App\Models\User::findAll();
var_dump($view->users);
die;

$view->display(__DIR__ . '/App/templates/index.php');

/*
$news = \App\Models\News::findLastNews(3);

include __DIR__ . '/App/templates/news.php';
*/
/*
$ctrl = !empty($_GET['ctrl'])? 'App\\Controllers\\' . $_GET['ctrl'] : 'App\\Controllers\\News';
$act = !empty($_GET['act'])? $_GET['act'] : 'Index';

$controller = new $ctrl;
$controller->action($act);
*/
