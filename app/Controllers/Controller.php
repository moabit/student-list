<?php

namespace Studentlist\Controllers;

use Studentlist\Helpers\Authorisation;

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
    protected $twig;
    /**
     * @var
     */
    protected $user;
    protected $authorisation;

    /**
     * Controller constructor.
     * @param \Pimple\Container $container
     */
    public function __construct(\Pimple\Container $container)
    {
        $this->c = $container;
        $this->twig = $this->c['twig'];
        $this->authorisation = new Authorisation($container['studentDataGateway']);
        if ($this->authorisation->checkAuth() == true) {
            $this->user = $this->authorisation->getUser();
        }
    }

    abstract public function index();

}