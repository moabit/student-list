<?php


namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Helpers\Util;
use Studentlist\Entities\Student;


class StudentDataGatewayTest extends TestCase
{
    private $studentDataGateway;
    private $testPDO;

    public function setUp()
    {

        $this->testPDO = $GLOBALS['container']['dbConnection'];
        $this->testPDO->beginTransaction();
        $this->studentDataGateway = $GLOBALS['container']['studentDataGateway'];

    }

    public function tearDown()
    {
        $this->testPDO->rollBack();
    }

    public function testGetStudentsWithWrongField()
    {
        $this->expectException(\PDOException::class);
        $this->studentDataGateway->getStudents('wrongOrderField', 'asc', 15, 0);
    }

    public function testGetStudentsWithWrongDirections()
    {
        $this->expectException(\PDOException::class);
        $this->studentDataGateway->getStudents('surname', 'wrongDirection', 15, 0);
    }

    public function testAddStudent ()
    {
        $student= new Student ();
        $token=Util::generateToken();
        $student->setName('Авраам');
        $student->setSurname('Рабинович');
        $student->setGroupNumber('ААА11');
        $student->setExamPoints(277);
        $student->setGender(Student::GENDER_MALE);
        $student->setEmail('rabinovich@gmail.com');
        $student->setYear(1997);
        $student->setResidence(Student::RESIDENCE_NONRESIDENT);
        $student->setToken($token);
        $this->studentDataGateway->addStudent ($student);
        $student=$this->studentDataGateway->getStudentByToken($token);
        $this->assertNotNull($student);
    }






}