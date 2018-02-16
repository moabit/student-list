<?php

namespace Studentlist\Controllers;

use Studentlist\Entities\Student;
use Studentlist\Helpers\{
    Util, Authorisation
};
use Studentlist\Exceptions\SecurityException;


/**
 * Class ProfileController
 * @package Studentlist\Controllers
 */
class ProfileController extends Controller
{
    /**
     * @var string
     */
    protected $CSRFToken;
    /**
     * @var
     */
    protected $errors;


    /**
     * ProfileController constructor.
     * @param \Pimple\Container $container
     */


    public function __construct(\Pimple\Container $container)
    {
        parent::__construct($container);
        $this->CSRFToken = Util::setCSRFToken();

    }

    /**
     * @throws SecurityException
     */
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processUser();
        }
        echo $this->twig->render('profile.twig', ['user' => $this->user, 'CSRFToken' => $this->CSRFToken, 'errors' => $this->errors]);
    }

    /**
     * Registrates or updates a profile
     * @throws SecurityException
     */
    private function processUser(): void
    {
        if (!Util::checkCSRFToken()) {
            throw new SecurityException ('Токен формы и токен пользователя не совпадает');
        }
        $this->updateUser();
        $this->errors = $this->c['studentValidator']->validate($this->user);
        if (empty ($this->errors)) {
            if (!$this->authorisation->checkAuth()) {
                $token = Util::generateToken();
                $this->authorisation->signIn($token);
                $this->user->setToken($token);
                $this->c['studentDataGateway']->addStudent($this->user);
                header('Location: /?notify=registered');
                exit;
            } else {
                $this->c['studentDataGateway']->updateStudent($this->user);
                header('Location: /?notify=edited');
                exit;
            }
        }

    }


    /**
     * Updates fields of user-object if a user is logged in or creates a new user-object from input data if not
     * @return Student
     */
    private function updateUser(): void
    {
        if (!$this->user) {
            $this->user = new Student();
        }
        $this->user->setName(Util::mbUcfirst(trim(strval($_POST['name']))));
        $this->user->setSurname(Util::mbUcfirst(trim(strval($_POST['surname']))));
        $this->user->setGroupNumber(trim(strval($_POST['groupNumber'])));
        $this->user->setExamPoints(intval($_POST['examPoints'], 10));
        $this->user->setGender(strval($_POST['gender']));
        $this->user->setEmail(trim(strval($_POST['email'])));
        $this->user->setYear(intval($_POST['year'], 10));
        $this->user->setResidence(strval($_POST['residence']));
    }
}