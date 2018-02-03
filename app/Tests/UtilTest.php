<?php
/**
 * Created by PhpStorm.
 * User: moabit
 * Date: 22.01.2018
 * Time: 12:21
 */

namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Helpers\Util;
use Studentlist\Exceptions\ConfigException;

class UtilTest extends TestCase
{
    public function testReadJSONwithWrongPath()
    {
        $this->expectException(ConfigException::class);
        Util::readJSON('/wrongPath/');
    }

    public function testCheckCSRFToken()
    {
        $_COOKIE['CSRFToken'] = "";
        $_POST['CSRFToken'] = "";
        $this->assertFalse(Util::checkCSRFToken());
        $_COOKIE['CSRFToken'] = "wrongToken";
        $_POST['CSRFToken'] = "badToken";
        $this->assertFalse(Util::checkCSRFToken());
        $_COOKIE['CSRFToken'] = "sameToken";
        $_POST['CSRFToken'] = "sameToken";
        $this->assertTrue(Util::checkCSRFToken());
    }

}