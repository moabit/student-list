<?php

namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Helpers\Router;

class RouterTest extends TestCase
{
    public function testRouterException()
    {
        require_once __DIR__ . '/../../app/container.php';
        $_POST['REQUEST_URI'];
        $router = $container['router'];
        $router->run($container);



    }
}