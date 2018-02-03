<?php

namespace Studentlist\Helpers;

use Studentlist\Entities\Student;


/**
 * Class Authorisation
 * @package Studentlist\Helpers
 */
class Authorisation
{
    /**
     * @var
     */
    protected $user;
    /**
     * @var bool
     */
    protected $isAuth = false;
    /**
     * @var \Studentlist\Database\StudentDataGateway
     */
    protected $studentDataGateway;

    /**
     * Authorisation constructor.
     * @param \Studentlist\Database\StudentDataGateway $studentDataGateway
     */
    public function __construct(\Studentlist\Database\StudentDataGateway $studentDataGateway)
    {
        $this->studentDataGateway = $studentDataGateway;
    }


    /**
     * @param $token
     */
    public function signIn($token)
    {
        setcookie('token', $token, strtotime('10 years'), '/', null, false, true);
    }


    /**
     * @return mixed
     */
    public function getUser(): Student
    {
        return $this->user;
    }

    /**
     * @return bool
     */
    public function checkAuth(): bool
    {
        $this->isAuth=false;
        if (isset($_COOKIE['token'])) {
            $student = $this->studentDataGateway->getStudentByToken(strval($_COOKIE['token']));
            if ($student != false) {
                $this->isAuth = true;
                $this->user = $student;
            }
        }
        return $this->isAuth;
    }
}