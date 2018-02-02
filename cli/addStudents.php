<?php
require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__.'/../app/container.php');
use Studentlist\Entities\Student;
use Studentlist\Helpers\Util;
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
echo "Enter the number of students you want to add to the database:\n";
$input=intval(fgets(STDIN));
addStudent ($container['studentDataGateway'], $input);
echo "$input Students were added";
exit;
