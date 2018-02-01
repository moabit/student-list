<?php

mb_internal_encoding('utf-8');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../vendor/autoload.php';
$errorHandler = new \Studentlist\Helpers\ErrorHandler();
$errorHandler->register();
require_once __DIR__ . '/../app/container.php';
$router = $container['router'];
$router->run($container);

