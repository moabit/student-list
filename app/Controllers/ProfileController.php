<?php

namespace Studentlist\Controllers;

use Studentlist\Entities\Student;
use Studentlist\Helpers\Util;
use Studentlist\Exceptions\SecurityException;


class ProfileController extends Controller
{
    protected $CSRFToken;
    protected $errors;

    public function __construct(\Pimple\Container $container)
    {
        parent::__construct($container);
        $this->CSRFToken = Util::setCSRFToken();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->user == false) {
            $this->registerUser();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $this->user == true) {
            $this->editUser($this->user->getToken());
        }
        echo $this->view->render('profile.twig', ['user' => $this->user, 'CSRFToken' => $this->CSRFToken, 'errors' => $this->errors]);
    }

    private function registerUser(): void
    {
        $student = $this->getUserData();
        $this->errors = $this->c['studentValidator']->validate($student);
        if (empty ($this->errors)) {
            if (Util::checkCSRFToken() == false) {
                throw new SecurityException ('Токен формы и токен пользователя не совпадает');
            }
            $token = Util::generateToken();
            $this->c['authorisation']->signIn($token);
            $student->setToken($token);
            $this->c['studentDataGateway']->addStudent($student);
            header('Location: /?notify=registered');
            exit;
        }
    }

    private function editUser($token): void
    {
        $student = $this->getUserData();
        $student->setToken($token);
        $this->errors = $this->c['studentValidator']->validate($student);
        if (empty ($this->errors)) {
            if (Util::checkCSRFToken() == false) {
                throw new SecurityException ('Токен формы и токен пользователя не совпадает');
            }
            $this->c['studentDataGateway']->updateStudent($student);
            header('Location: /?notify=edited');
            exit;
        }
    }

    protected function getUserData(): Student
    {
        $student = new Student;
        if ($this->user) {
            $student->setID($this->user->getID());
        }
        $student->setName(ucfirst(trim(strval($_POST['name']))));
        $student->setSurname(ucfirst(trim(strval($_POST['surname']))));
        $student->setGroupNumber(trim(strval($_POST['groupNumber'])));
        $student->setExamPoints(intval($_POST['examPoints'], 10));
        $student->setGender(strval($_POST['gender']));
        $student->setEmail(trim(strval($_POST['email'])));
        $student->setYear(intval($_POST['year'], 10));
        $student->setResidence(strval($_POST['residence']));
        return $student;
    }
}