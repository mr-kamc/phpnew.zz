<?php

namespace App\Models;


use App\Model;
use App\MultiException;


class News extends Model{
    const TABLE = 'news';
    const ID = 'id';

    public $name;
    public $text;
    public $author_id;

    public function __get($name)
    {
        switch ($name) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }
    public function __isset($name)
    {
        switch ($name) {
            case 'author':
                return true;
                break;
            default:
                return false;
        }
    }
    public function fill($data)
    {
        $e = new MultiException();
        foreach ($data as $key => $value){
            if (empty($value)){
                $e[] = new \Exception('Пустое поле: ' . $key);
            }
            else {
                $this->$key = $value;
            }
        }
        if (!is_null($e[0])){
            throw $e;
        }



    }

}
