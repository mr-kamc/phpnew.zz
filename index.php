<?php

require __DIR__ . '/autoload.php';

$path = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

//var_dump ($path);
//var_dump (count($path));

switch (count($path)){
    case 3:
        $ctrl = !empty($path[1]) ? '\\App\\Controllers\\' . $path[1] : '\\App\\Controllers\\News';
        $action = !empty($path[2]) ? $path[2] : 'Index';
        break;
    case 2:
        $ctrl = !empty($path[1]) ? '\\App\\Controllers\\' . $path[1] : '\\App\\Controllers\\News';
        $action = 'Index';
        break;
    default:
        $ctrl = !empty($path[1]) ? '\\App\\Controllers\\' . $path[1] : '\\App\\Controllers\\News';
        $action = !empty($path[2]) ? $path[2] : 'Index';
}

try {
    $controller = new $ctrl;
    $controller->action($action);
} catch (\App\Exceptions\Core $e) {
    echo 'Возникло исключение приложения: ' .$e;
}
catch (\App\Exceptions\Db $e) {
    echo 'Возникло исключение приложения: ' . $e;
}
catch (\App\MultiException $e) {
    var_dump($e->getMessage());
}

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
