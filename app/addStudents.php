<?php
function addStudent($studentDataGateway, $counter = 100)
{
    $faker = Faker\Factory::create('ru_RU');
    for ($i = 0; $i < $counter; $i++) {
        $student = new \Studentlist\Entities\Student();
        $gender=$faker->randomElement([\Studentlist\Entities\Student::GENDER_FEMALE, \Studentlist\Entities\Student::GENDER_MALE]);
        if ($gender==\Studentlist\Entities\Student::GENDER_FEMALE) {
            $student->setName($faker->firstName('female'));
            $student->setSurname($faker->lastName.'а');
        }
        else {
            $student->setName($faker->firstName('male'));
            $student->setSurname($faker->lastName);
        }
        $student->setGender($gender);
        $student->setGroupNumber($faker->shuffle('AБВ').$faker->numberBetween(1, 20));
        $student->setExamPoints($faker->numberBetween(150, 300));
        $student->setEmail($faker->email);
        $student->setYear($faker->year);
        $student->setResidence($faker->randomElement([\Studentlist\Entities\Student::RESIDENCE_NONRESIDENT, \Studentlist\Entities\Student::RESIDENCE_RESIDENT]));
        $student->setToken(\Studentlist\Helpers\Util::generateToken());
        $studentDataGateway->addStudent($student);
    }
}
addStudent($container['studentDataGateway']);
