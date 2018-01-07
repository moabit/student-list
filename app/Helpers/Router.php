<?php

namespace Studentlist\Helpers;

use Studentlist\Exceptions\RouterException;

/**
 * routing class
 */
class Router
{
    public function run(\Pimple\Container $container)
    {
        //default controller and action
        $controller = 'Home';
        $action = 'index';

        $url = $this->getParsedURL();
        $url['path'] = isset($url['path']) ? $url['path'] : null;
        $url = explode('/', $url['path']);
        if (!empty($url[0])) {
            $controller = $url[0];
        }

        $controller = sprintf('%s\%s\%s%s', 'Studentlist', 'Controllers', ucfirst(strtolower($controller)), 'Controller');
        if (!empty($url[1])) {
            throw new RouterException('Неправильный путь');
        }
        if (class_exists($controller) && method_exists($controller, $action)) {
            $controller = new $controller($container);
            $controller->$action();
        } else {
            throw new RouterException('Неправильный путь');
        }
    }

    protected function getParsedURL()
    {
        return parse_url(trim($_SERVER['REQUEST_URI'], '/'));
    }

}