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
    public function getID():int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getGroupNumber(): string
    {
        return $this->groupNumber;
    }

    /**
     * @return mixed
     */
    public function getExamPoints(): int
    {
        return $this->examPoints;
    }

    /**
     * @return mixed
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getResidence(): string
    {
        return $this->residence;
    }

    /**
     * @return mixed
     */
    public function getToken(): string
    {
        return $this->token;
    }

    //setters

    /**
     * @param $id
     */
    public function setID(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @param $groupNumber
     */
    public function setGroupNumber(string $groupNumber): void
    {
        $this->groupNumber = $groupNumber;
    }

    /**
     * @param $examPoints
     */
    public function setExamPoints(int $examPoints): void
    {
        $this->examPoints = $examPoints;
    }

    /**
     * @param $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @param $residence
     */
    public function setResidence(string $residence): void
    {
        $this->residence = $residence;
    }

    /**
     * @param $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}