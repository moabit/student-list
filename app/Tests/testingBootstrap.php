<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Studentlist\Helpers\Util;

mb_internal_encoding('utf-8');


$config = Util::readJSON(__DIR__ . '/../../config.json');
$testPDO = new PDO(
    "mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}",
    $config['db']['user'],
    $config['db']['password'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4, sql_mode='STRICT_ALL_TABLES'"]);
