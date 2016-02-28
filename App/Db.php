<?php

namespace App;


class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = \App\Config::instance();

        $this->dbh = new \PDO('mysql:host=' . $config->data['host'] . ';dbname=' . $config->data['dbname'] .
            ';charset=UTF8', $config->data['user'], $config->data['password']);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    public function query($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}