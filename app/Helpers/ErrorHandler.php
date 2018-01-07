<?php

namespace Studentlist\Helpers;
use Studentlist\Exceptions\RouterException;

class ErrorHandler
{
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

    public function exceptionHandler(\Throwable $e)
    {
        error_log($e->__toString());
        if ($e instanceof RouterException) {
            header("HTTP/1.0 404 Not Found");
            echo "Страница с таким адресом не существует";
        } else {
            header("HTTP/1.0 500 Internal Server Error");
            echo "Что-то пошло не так...";
        }
    }
}