<?php

namespace App\Controllers;


use App\Models\News;
use App\View;

class Admin
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction()
    {

    }


    protected function actionIndex()
    {
        $this->view->title = 'Админка';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/admin.php');
    }


    protected function actionOne()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = \App\Models\News::findById($id);
        }
        $this->view->display(__DIR__ . '/../templates/update.php');
    }


    protected function actionDel()
    {
        $news = new News();
        $news->id = $_GET['id'];
        $news->delete();

        header ('Location: /');
    }

    protected function actionSave()
    {
        $this->view->title = 'редактор новости';
        $post = $_POST;
        if (!empty($post)) {
            $article = new News();
            if (isset($post['id'])) {
                $article->id = $post['id'];
            }
            $article->fill($post);
            $article->save();
            header ('Location: /');
        }
        else {
            header ('Location: /');
        }
    }


}