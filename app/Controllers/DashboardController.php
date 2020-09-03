<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Negocios;

class DashboardController extends Controller
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
        $negocio = $this->negocios->getNegocioById($idNegocio);
        if ($negocio != false) {
            $user = $this->session->get('user');
            $user["idNegocio"] = $idNegocio;
            $this->session->add("user", $user);

            $this->view(
                'admin/home',
                array(
                    'negocio'  => $negocio,
                    'user'     => $this->session->get('user'),
                    'menu'     => true,
                    'titulo'   => 'Home'
                )
            );

        } else {
            $this->redirect('admin/mis-negocios');
        }
    }
}
