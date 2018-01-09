<?php

namespace Studentlist\Controllers;

/**
 * Class Controller
 * @package Studentlist\Controllers
 */
abstract class Controller
{
    /**
     * @var \Pimple\Container
     */
    protected $c;
    /**
     * @var mixed
     */
    protected $view;
    /**
     * @var
     */
    protected $user;

    /**
     * Controller constructor.
     * @param \Pimple\Container $container
     */
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