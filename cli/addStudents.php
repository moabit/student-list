<?php
use Studentlist\Entities\Student;
use Studentlist\Helpers\Util;
use Studentlist\Helpers\ErrorHandler;
require_once(__DIR__ . '/../vendor/autoload.php');

$errorHandler = new ErrorHandler();
$errorHandler->register();
require_once(__DIR__.'/../app/container.php');


/**
 * Run this script via command line to add some random students to your database
 * @param \Studentlist\Database\StudentDataGateway $studentDataGateway
 * @param int $counter
 * @throws Exception
 */

function addStudent(\Studentlist\Database\StudentDataGateway $studentDataGateway, int $counter)
{
    $faker = Faker\Factory::create('ru_RU');
    for ($i = 0; $i < $counter; $i++) {
        $student = new Student();
        $gender = $faker->randomElement([Student::GENDER_FEMALE, Student::GENDER_MALE]);
        if ($gender == Student::GENDER_FEMALE) {
            $student->setName($faker->firstName('female'));
            $student->setSurname($faker->lastName . 'а');
        } else {
            $student->setName($faker->firstName('male'));
            $student->setSurname($faker->lastName);
        }
        $student->setGender($gender);
        $student->setGroupNumber($faker->shuffle('AБВ') . $faker->numberBetween(1, 20));
        $student->setExamPoints($faker->numberBetween(150, 300));
        $student->setEmail($faker->email);
        $student->setYear($faker->year);
        $student->setResidence($faker->randomElement([Student::RESIDENCE_NONRESIDENT, Student::RESIDENCE_RESIDENT]));
        $student->setToken(Util::generateToken());
        $studentDataGateway->addStudent($student);
    }
}
if (!$argv[1]) {
    echo "You have not entered a number of students you want to add to the database". PHP_EOL;
    exit;
}
addStudent ($container['studentDataGateway'], $argv[1]);
echo "$argv[1] students were successfully added!". PHP_EOL;
exit;
