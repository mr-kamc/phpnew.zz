<?php

namespace App\Controllers;


class Error extends AbstractController
{
    public function action404()
    {
        echo $this->view->render(__DIR__ . '/../templates/404.php');
    }
    public function error($e)
    {
        $this->view->error = $e;
        $this->view->display(__DIR__ . '/../templates/error.php');
    }
    public function errorForm($e)
    {
        $this->view->errors = $e;
        echo 'исключение';
        $this->view->display(__DIR__ . '/../templates/update.php');
    }


}