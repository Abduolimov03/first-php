<?php

//use Monolog\Logger;

include "autoload.php";
require __DIR__ . '/vendor/autoload.php';

use vendor\myframe\Application;

$app = new Application();
$app->run();

//$log = new Logger('name');
//$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Logger::WARNING));
//$log->warning('Salom');