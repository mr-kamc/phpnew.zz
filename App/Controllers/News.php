<?php

namespace App\Controllers;


use App\MultiException;
use App\View;

class News extends AbstractController
{

    protected function actionIndex()
    {
        $this->view->title = 'Мой сайт';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/news.php');
    }

    protected function actionOne()
    {
        $id = $_GET['id'];
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/article.php');
    }

    protected function actionCreate()
    {
        try {
            $article = new \App\Models\News();
            $article->fill([]);
            $article->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
        $this->view->display(__DIR__ . '/../templates/create.php');
    }

}