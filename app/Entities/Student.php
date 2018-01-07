<?php

namespace Studentlist\Entities;

class Student
{
    protected $id;
    protected $name;
    protected $surname;
    protected $groupNumber;
    protected $examPoints;
    protected $gender;
    protected $email;
    protected $year;
    protected $residence;
    protected $token;

    const GENDER_MALE = 'm';
    const GENDER_FEMALE = 'f';
    const RESIDENCE_RESIDENT = 'resident';
    const RESIDENCE_NONRESIDENT = 'nonresident';


    // getters

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    public function getExamPoints()
    {
        return $this->examPoints;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getResidence()
    {
        return $this->residence;
    }

    public function getToken()
    {
        return $this->token;
    }

    //setters

    public function setID ($id)
    {
        $this->id=$id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
    }

    public function setExamPoints($examPoints)
    {
        $this->examPoints = $examPoints;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function setResidence($residence)
    {
        $this->residence = $residence;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}