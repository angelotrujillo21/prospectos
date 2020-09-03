<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Negocios;

class NegociosController extends Controller
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

    public function misNegocios()
    {

        // El usuario 1 es el administrador general del sistema
        $user     = $this->session->get('user');
        $negocios = $user["idUsuario"] == '1' ? $this->negocios->getNegocios() :   $this->negocios->getNegociosByIdUsuario($user["idUsuario"]);

        $this->view(
            'admin/mis-negocios',
            array(
                'negocios' => $negocios,
                'user'     => $this->session->get('user'),
                'menu'     => false,
                'titulo'   => 'Mis Negocios'
            )
        );
    }
}
