<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Negocios;
use Application\Models\Users;

class LoginAdminController extends Controller
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
        $this->users    = new Users();
        $this->session->init();
    }

    public function acceso()
    {
        try {
            if (!is_null($this->session->get('user'))) {
                $user = $this->session->get('user');
                $this->redirect('admin/mis-negocios');
            } else {
                if (!empty($_POST)) {

                    $sUsuario    = isset($_POST['sUsuario']) ? $_POST['sUsuario'] : null;
                    $sClave      = isset($_POST['sClave']) ? $_POST['sClave'] : null;

                    $nIdUsuario = ($this->users->acceso($sUsuario, $sClave));

                    if ($nIdUsuario > 0) {
                        $user = $this->users->getUser($nIdUsuario);
                        $this->session->init();
                        $this->session->add('user', $user);
                        $this->redirect('admin/mis-negocios');
                    } else {
                        $this->view('admin/login', array('error' => 'Por favor verifique su usuario o contraseña', 'negocios' => $this->negocios->fncGetNegocios()));
                    }
                } else {
                    $this->view('admin/login', array('negocios' => $this->negocios->fncGetNegocios()));
                }
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function salir()
    {
        $this->session->close();
        $this->redirect('admin/acceso');
    }
}
