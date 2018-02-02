<?php

namespace Studentlist\Helpers;
use Studentlist\Exceptions\RouteNotFoundException;

/**
 * Class ErrorHandler
 * @package Studentlist\Helpers
 */
class ErrorHandler
{
    /**
     *
     */
    public function register()
    {
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            if (!error_reporting()) {
                return;
            }
            throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
        });
    }

    /**
     * @param \Throwable $e
     */
    public function exceptionHandler(\Throwable $e)
    {
        error_log($e->__toString());
        if ($e instanceof RouteNotFoundException) {
            header("HTTP/1.0 404 Not Found");
            include (__DIR__ . '/../../views/404.html');
        } else {
            header("HTTP/1.0 500 Internal Server Error");
            include (__DIR__ . '/../../views/500.html');
        }
    }
}