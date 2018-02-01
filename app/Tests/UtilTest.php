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

}