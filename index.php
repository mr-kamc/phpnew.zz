<?php

require __DIR__ . '/autoload.php';

$controller = new \App\Controllers\News();

//$url = $_SERVER['REQUEST_URI'];

$url = 'http://php.net/manual/ru/function.parse-url.php';

$pathRel = explode('/', parse_url($url, PHP_URL_PATH));

var_dump ($pathRel);
var_dump (count($pathRel));

$action = $_GET['action'] ?: 'Index';
$controller->action($action);
/*
$view = new \App\View();
$view->news = \App\Models\News::findLastNews(3);

echo $view->render(__DIR__ . '/App/templates/news.php');
*/

/*
include __DIR__ . '/App/templates/news.php';
*/
/*
$ctrl = !empty($_GET['ctrl'])? 'App\\Controllers\\' . $_GET['ctrl'] : 'App\\Controllers\\News';
$act = !empty($_GET['act'])? $_GET['act'] : 'Index';

$controller = new $ctrl;
$controller->action($act);
*/
