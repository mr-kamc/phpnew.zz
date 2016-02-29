<?php

namespace App;


abstract class Model
{

    const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );

    }

    public static function findById($id)
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE ' . static::ID .' = ' . $id,
            static::class
        )[0] ?: false;


    }

    public static function findLastNews($num)
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT ' . $num,
            static::class
        );

    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = '
INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ')
VALUES
(' . implode(',', array_keys($values)) . ')
        ';

        $db = Db::instance();
        $db->execute($sql, $values);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = $v;
        }

        $sql = '
UPDATE ' . static::TABLE . ' SET ' . ' (' . implode(',', $columns) . ')
WHERE id=' . $this->id;

        $db = Db::instance();
        $db->execute($sql, $values);
    }

    public function save()
    {
        if ($this->isNew()){
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        if ($this->isNew()){
            return false;
        }
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=' . $this->id;
        $db = Db::instance();
        $db->execute($sql);
    }

} 