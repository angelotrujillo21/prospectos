<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Negocios;

class ProspectosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->negocios = new Negocios();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function index($idNegocio)
    {

       

        $this->view(
            'admin/prospectos',
            [
                "titulo"             => "Configuracion de prospectos",
                "menu"               => true,
                "user"               => $this->session->get('user'),
                'showNotificacion'   => true ,
            ]
        );
    }
}
