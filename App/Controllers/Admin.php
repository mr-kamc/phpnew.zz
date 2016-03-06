<?php

namespace App\Controllers;


use App\Models\News;
use App\View;

class Admin extends AbstractController
{

    protected function actionIndex()
    {
        $this->view->title = 'Админка';
        $this->view->news = \App\Models\News::findAll();
        //$this->view->display(__DIR__ . '/../templates/admin.php');
        echo $this->view->render(__DIR__ . '/../templates/admin.php');
    }


    protected function actionOne()
    {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $this->view->article = \App\Models\News::findById($id);
        }
        //$this->view->display(__DIR__ . '/../templates/update.php');
        echo $this->view->render(__DIR__ . '/../templates/admin.php');
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