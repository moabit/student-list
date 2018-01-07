<?php
use Pimple\Container;
use Studentlist\Helpers\{Router, Util, Pager};
use Studentlist\Database\StudentDataGateway;
use Studentlist\Helpers\Authorisation;
use Studentlist\Validators\StudentValidator;

$container = new Container();

$container['config'] = function ($c) {
    return Util::readJSON(__DIR__ . '/../config.json');
};

$container ['dbConnection'] = function ($c) {

    $dbConnection = new PDO(
        "mysql:host={$c['config']['db']['host']};dbname={$c['config']['db']['dbname']}",
        $c['config']['db']['user'],
        $c['config']['db']['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4, sql_mode='STRICT_ALL_TABLES'"]);

    return $dbConnection;
};
$container['studentDataGateway'] = function ($c) {
    return new StudentDataGateway($c['dbConnection']);
};

$container['twigLoader'] = function ($c) {
    return new Twig_Loader_Filesystem(__DIR__ . '/views/templates');
};

$container['twig'] = function ($c) {
    return new Twig_Environment($c['twigLoader']);
};
$container['pager'] = function ($c) {
    return new Pager ();
};

$container['router'] = function ($c) {
    return new Router ();
};
$container['authorisation'] = function ($c) {
    return new Authorisation($c['studentDataGateway']);
};
$container['studentValidator'] = function ($c) {
    return new StudentValidator($c['studentDataGateway']);
};