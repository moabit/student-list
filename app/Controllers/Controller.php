<?php

namespace Studentlist\Controllers;

abstract class Controller
{
    protected $c;
    protected $view;
    protected $user;

    public function __construct(\Pimple\Container $container)
    {
        $this->c = $container;
        $this->view = $this->c['twig'];
        if ($this->c['authorisation']->checkAuth() == true) {
            $this->user = $this->c['authorisation']->getUser();
        }
    }

    public function index()
    {

    }

    protected function getUserData()
    {

    }
}