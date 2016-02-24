<?php

namespace App;


abstract class Model {

    const TABLE = '';

    public function findAll()
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );

    }
    public function findById($id)
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id = ' . $id,
            static::class
        )[0] ?: false;

    }
    public function findLastNews($num)
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $num,
            static::class
        );

    }

} 