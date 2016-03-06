<?php

namespace App;


class Logger
{
    const LOG_FILE = __DIR__ . '/log.txt';

    /**
     * запись в лог, возникших исключений
     *
     * @param \Exception $e
     */
    public static function toFile(\Exception $e)
    {
        $str = date('d-m-Y H:m:s') . ' ' . $e->getFile() . ' строка' . $e->getLine() .
            ' исключение: ' . $e->getMessage();

        file_put_contents(self::LOG_FILE, $str . PHP_EOL, FILE_APPEND);

    }
}