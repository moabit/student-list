<?php
/**
 * Created by PhpStorm.
 * User: moabit
 * Date: 23.11.2017
 * Time: 16:59
 */

namespace Studentlist\Helpers;

use Studentlist\Exceptions\AuthException;


class Authorisation
{
    protected $user;
    protected $isAuth = false;
    protected $studentDataGateway;

    public function __construct(\Studentlist\Database\StudentDataGateway $studentDataGateway)
    {
        $this->studentDataGateway = $studentDataGateway;
    }


    public function signIn($token)
    {
        setcookie('token', $token, strtotime('10 years'), '/', null, false, true);
    }


    public function getUser()
    {
        if ($this->isAuth == true) {
            return $this->user;
        } else throw new AuthException();
    }

    public function checkAuth(): bool
    {
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