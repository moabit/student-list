<?php

namespace Studentlist\Validators;

use Studentlist\Entities\Student;

/**
 * student validation class
 */
class StudentValidator
{
    protected $studentDataGateway;

    public function __construct($studentDataGateway)
    {
        $this->studentDataGateway = $studentDataGateway;
    }

    public function validate(Student $student)
    {
        $errors = [];
        $errors['name'] = $this->validateName($student->getName());
        $errors['surname'] = $this->validateSurname($student->getSurname());
        $errors['groupNumber'] = $this->validateGroupNumber($student->getGroupNumber());
        $errors['examPoints'] = $this->validateExamPoints($student->getExamPoints());
        $errors['gender'] = $this->validateGender($student->getGender());
        $errors['email'] = $this->validateEmail($student->getEmail(), $student->getID());
        $errors['year'] = $this->validateYear($student->getYear());
        $errors['residence'] = $this->validateResidence($student->getResidence());
        $errors = array_filter($errors);
        return $errors;
    }

    private function validateName(string $name)
    {
        if (!preg_match("/^[а-яёa-z][а-яёa-z'-]{0,35}$/iu", $name)) {
            return 'ошибка имени';
        }
        return null;
    }

    private function validateSurname(string $surname)
    {
        if (!preg_match("/^[а-яёa-z][а-яёa-z'-]{0,35}$/ui", $surname)) {
            return 'ошибка имени';
        }
        return null;
    }

    private function validateGroupNumber(string $group)
    {
        if (!preg_match('/^[а-яёa-z0-9]{2,5}$/ui', $group))  {
            return 'Ваш адрес электронной почты должен быть в формате example@mail.com';
        }
        return null;
    }

    private function validateExamPoints(int $points)
    {
        if ($points > 300 || $points < 150) {
            return 'Ваш суммарный балл должен быть не больше 300 и не меньше 150';
        }
        return null;
    }

    private function validateGender(string $gender)
    {
        if ($gender !== Student::GENDER_FEMALE && $gender !== Student::GENDER_MALE) {
            return 'Вы не выбрали свой пол';
        }
        return null;
    }

    private function validateEmail(string $email, $id)
    {
        if (!preg_match('/^.+@.+$/u', $email) || mb_strlen($email) > 30 || mb_strlen($email) < 4) {
            return 'Ваш адрес электронной почты должен быть в формате example@mail.com';
        }
        elseif ($this->studentDataGateway->checkEmail($email, $id)) {
            return 'Такой адрес уже имеется в базе данных';
        }
        return null;
    }

    private function validateYear(int $year)
    {
        if ($year > 2001 || $year < 1970) {
            return 'Ваш год рождения должен быть не ранее 1970 и не позднее 2001';
        }
        return null;
    }

    private function validateResidence(string $residence)
    {
        if ($residence !== Student::RESIDENCE_RESIDENT && $residence !== Student::RESIDENCE_NONRESIDENT) {
            return 'Вы не выбрали ваше место жительства';
        }
        return null;
    }

}