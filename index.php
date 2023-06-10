<?php

// FRONT CONTROLLER


//1 ОБЩИИ НАСТРОЙКИ
ini_set('display_errors', 1);
error_reporting(E_ALL);


//2 ПОДКЛЮЧЕНИЕ ФАЙЛОВ
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/vendor/Autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->load();


//3 УСТАНОВКА СОЕДИНЕНИЯ С БД
$_DB = Db::getConnection();

session_start();

//4 ВЫЗОВ РОУТА
$router = new Router();
$router->run();
