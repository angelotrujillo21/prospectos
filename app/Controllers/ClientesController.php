<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;

class ClientesController extends Controller
{
    //model principal
    public $session;
    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->session->init();
        $this->authAdmin($this->session);
    }




}


