<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Negocios;

class ProductosController extends Controller
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

        $this->view('admin/productos',
        [
            "titulo" => "Mantemiento de productos",
            "menu"   => true ,
            "user"   => $this->session->get('user'),
            'showNotificacion'   => true ,

        ]);
    }
    
}
