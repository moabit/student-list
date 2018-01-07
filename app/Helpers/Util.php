<?php
/**
 * collection of utility and security functions
 */

namespace Studentlist\Helpers;

use Studentlist\Exceptions\ConfigException;

class Util
{
    public static function readJSON($JSONpath): array
    {
        if (!file_exists($JSONpath)) {
            throw new ConfigException('Файл конфигурации не существует');
        }
        $fileContent = file_get_contents($JSONpath);
        $fileContent = json_decode($fileContent, true);
        if ($fileContent == null) {
            throw new ConfigException('Ошибка в файле конфигурации');
        }
        return $fileContent;
    }

    public static function generateToken(int $length = 16): string
    {
        return $token = bin2hex(random_bytes($length));
    }

    public static function setCSRFToken()
    {
        $token = isset($_POST['CSRFToken']) ? strval($_POST['CSRFToken']) : self::generateToken();
        setcookie('CSRFToken', $token, strtotime('2 hours'), '/', null, false, true);
        return $token;
    }

    public static function checkCSRFToken(): bool
    {
        if (!isset($_COOKIE['CSRFToken']) || !isset($_POST['CSRFToken']) || $_COOKIE['CSRFToken'] != $_POST['CSRFToken']) {
            return false;
        }
        return true;
    }
}