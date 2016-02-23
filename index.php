<?php

require __DIR__ . '/autoload.php';
$db = new \App\Db();
$res = $db->execute('SELECT * FROM news');
var_dump($res);