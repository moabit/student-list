<?php

namespace Studentlist\Controllers;

use Studentlist\Helpers\Pager;

class HomeController extends Controller
{

    public function __construct(\Pimple\Container $container)
    {
        parent::__construct($container);
    }

    public function index()
    {
        $userData = $this->getUserData();

        $currentPage = isset($userData['page']) ? $userData['page'] : 1;
        $limit = 15; // students on page
        $offset = ($currentPage - 1) * $limit;

        $studentsQuantity = $this->c['studentDataGateway']->countStudents($userData['search']);
        $students = $this->c['studentDataGateway']->getStudents($userData['field'], $userData['direction'], $limit, $offset, $userData['search']);

        $pager = new Pager ($userData, $studentsQuantity);

        echo $this->view->render('main.twig', ['students' => $students, 'pager' => $pager, 'user' => $this->user]);
    }

    protected function getUserData(): array
    {
        $data['field'] = isset($_GET['field']) ? strval($_GET['field']) : 'examPoints';
        $data['direction'] = isset($_GET['direction']) ? strval($_GET['direction']) : 'desc';
        $data['page'] = isset($_GET['page']) ? intval($_GET['page'], 10) : null;
        $data['search'] = isset($_GET['search']) ? trim(strval($_GET['search'])) : null;
        $data['notify'] = isset($_GET['notify']) ? strval($_GET['notify']) : null;
        return $data;
    }


}