<?php

namespace Studentlist\Tests;

use PHPUnit\Framework\TestCase;
use Studentlist\Validators\StudentValidator;
use Studentlist\Entities\Student;


class ValidatorTest extends TestCase
{
    public function testStudentValidation()
    {
        $student = new Student;
        $student->setName('Авраам');
        $student->setSurname('Рабинович');
        $student->setGroupNumber('ААА11');
        $student->setExamPoints(277);
        $student->setGender(Student::GENDER_MALE);
        $student->setEmail('rabinovich@gmail.com');
        $student->setYear(1997);
        $student->setResidence(Student::RESIDENCE_NONRESIDENT);
        $validator= new StudentValidator ($GLOBALS['container']['studentDataGateway']);
        $this->assertEmpty($validator->validate($student));
    }

    public function testStudentValidationWithBadData ()
    {
        $student = new Student;
        $student->setName('1111 bad Name');
        $student->setSurname('1111 bad Surname');
        $student->setGroupNumber('veryLongGroupNumber');
        $student->setExamPoints(100000);
        $student->setGender('');
        $student->setEmail('rabinovichgmail');
        $student->setYear(305000);
        $student->setResidence('');
        $validator= new StudentValidator ($GLOBALS['container']['studentDataGateway']);
        $this->assertCount(8, $validator->validate($student));
    }
}