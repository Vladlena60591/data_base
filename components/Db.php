<?php

class Db
{
    public static function getConnection()
    {
        $db = new PDO("mysql:host={$_ENV['HOST']}; dbname={$_ENV['DBNAME']}", $_ENV['USER'], $_ENV['PASSWORD']);
//            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }


}