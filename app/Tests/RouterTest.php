<?php

namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Helpers\Router;
use Studentlist\Exceptions\RouteNotFoundException;

class RouterTest extends TestCase
{

    public function testRouteNotFoundException()
    {
        $router= new Router;
        $this->expectException(RouteNotFoundException::class);
        $_SERVER['REQUEST_URI']='wrongPath/wrong/';
        $router->run($GLOBALS['container']);
    }
}