<?php


namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Database\StudentDataGateway;
use Studentlist\Helpers\Util;


class StudentDataGatewayTest extends TestCase
{
    private $pdo;
    private $studentDataGateway;

    public function setUp()
    {

 utf8mb4, sql_mode='STRICT_ALL_TABLES'"]);




        $this->pdo->beginTransaction();





        $this->studentDataGateway = new StudentDataGateway($this->pdo);


    }

    public function tearDown()
    {
        $this->pdo->rollback();
    }

    public function testGetStudentsWithWrongField()
    {
        $this->studentDataGateway->getStudents('wrongOrderField', 'asc', 15, 0);
        $this->expectException (PDOException::class);
    }

    public function testGetStudentsWithWrongDirections()
    {

    }


}