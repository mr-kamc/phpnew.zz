<?php

namespace App\Models;


use App\Model;

class Author extends Model
{
    const TABLE = 'authors';
    const ID = 'author_id';

    public $author_id;
    public $name;

}