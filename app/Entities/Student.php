<?php

namespace Studentlist\Entities;

/**
 * Class Student
 * @package Studentlist\Entities
 */
class Student
{
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $surname;
    /**
     * @var
     */
    protected $groupNumber;
    /**
     * @var
     */
    protected $examPoints;
    /**
     * @var
     */
    protected $gender;
    /**
     * @var
     */
    protected $email;
    /**
     * @var
     */
    protected $year;
    /**
     * @var
     */
    protected $residence;
    /**
     * @var
     */
    protected $token;

    /**
     *
     */
    const GENDER_MALE = 'm';
    /**
     *
     */
    const GENDER_FEMALE = 'f';
    /**
     *
     */
    const RESIDENCE_RESIDENT = 'resident';
    /**
     *
     */
    const RESIDENCE_NONRESIDENT = 'nonresident';


    // getters

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @return mixed
     */
    public function getExamPoints()
    {
        return $this->examPoints;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getResidence()
    {
        return $this->residence;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    //setters

    /**
     * @param $id
     */
    public function setID ($id)
    {
        $this->id=$id;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @param $groupNumber
     */
    public function setGroupNumber($groupNumber)
    {
        $this->groupNumber = $groupNumber;
    }

    /**
     * @param $examPoints
     */
    public function setExamPoints($examPoints)
    {
        $this->examPoints = $examPoints;
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param $residence
     */
    public function setResidence($residence)
    {
        $this->residence = $residence;
    }

    /**
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}