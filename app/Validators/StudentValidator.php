<?php

namespace Studentlist\Validators;

use Studentlist\Entities\Student;
use Studentlist\Helpers\{
    Authorisation, Util
};


/**
 * Validates a student object
 * Class StudentValidator
 * @package Studentlist\Validators
 */
class StudentValidator
{
    /**
     * @var
     */
    protected $studentDataGateway;

    /**
     * StudentValidator constructor.
     * @param $studentDataGateway
     */
    public function __construct(\Studentlist\Database\StudentDataGateway $studentDataGateway)
    {
        $this->studentDataGateway = $studentDataGateway;
    }

    /**
     * @param Student $student
     * @return array
     */
    public function validate(Student $student): array
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

    /**
     * @param string $name
     * @return null|string
     */
    private function validateName(string $name)
    {
        if (!preg_match("/^[а-яёa-z][а-яёa-z'-]{0,35}$/iu", $name)) {
            return 'Неверный формат имени';
        }
        return null;
    }

    /**
     * @param string $surname
     * @return null|string
     */
    private function validateSurname(string $surname)
    {
        if (!preg_match("/^[а-яёa-z][а-яёa-z'-]{0,35}$/ui", $surname)) {
            return 'Неверный формат фамилии';
        }
        return null;
    }

    /**
     * @param string $group
     * @return null|string
     */
    private function validateGroupNumber(string $group)
    {
        if (!preg_match('/^[а-яёa-z0-9]{2,5}$/ui', $group)) {
            return 'Неверный формат номера группы';
        }
        return null;
    }

    /**
     * @param int $points
     * @return null|string
     */
    private function validateExamPoints(int $points)
    {
        if ($points > 300 || $points < 150) {
            return 'Ваш суммарный балл должен быть не больше 300 и не меньше 150';
        }
        return null;
    }

    /**
     * @param string $gender
     * @return null|string
     */
    private function validateGender(string $gender)
    {
        if ($gender !== Student::GENDER_FEMALE && $gender !== Student::GENDER_MALE) {
            return 'Вы не выбрали свой пол';
        }
        return null;
    }

    /**
     * @param string $email
     * @param $id
     * @return null|string
     */
    private function validateEmail(string $email, $id)
    {
        if (!preg_match('/^.+@.+$/u', $email) || mb_strlen($email) > 60 || mb_strlen($email) < 4) {
            return 'Ваш адрес электронной почты должен быть в формате example@mail.com';
        } elseif ($this->studentDataGateway->checkEmail($email, $id)) {
            return 'Такой адрес уже имеется в базе данных';
        }
        return null;
    }

    /**
     * @param int $year
     * @return null|string
     */
    private function validateYear(int $year)
    {
        if ($year > 2007 || $year < 1910) {
            return 'Ваш год рождения должен быть не ранее 1910 и не позднее 2007';
        }
        return null;
    }

    /**
     * @param string $residence
     * @return null|string
     */
    private function validateResidence(string $residence)
    {
        if ($residence !== Student::RESIDENCE_RESIDENT && $residence !== Student::RESIDENCE_NONRESIDENT) {
            return 'Вы не выбрали ваше место жительства';
        }
        return null;
    }

}