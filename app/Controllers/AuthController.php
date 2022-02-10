<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Usuarios;
use Application\Core\Controller as Controller;

class AuthController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $usuarios;

    public function __construct()
    {
        parent::__construct();
        $this->session   = new Session();
        $this->negocios  = new Negocios();
        $this->usuarios  = new Usuarios();
        $this->session->init();
    }

    public function acceso()
    {
        try {
            if (!is_null($this->session->get('user')) ||  !is_null($this->session->get('user'))) {
                $user = $this->session->get('user');
                $this->redirect('mis-negocios');
            } else {
                $this->view('admin/login');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function accesoAjax()
    {

         // Usuario o correo y cliente

         $sUsuario    = isset($_POST['sUsuario']) ? $_POST['sUsuario'] : null;
         $sClave      = isset($_POST['sClave']) ? $_POST['sClave'] : null;

        try {

    
            // Verificar si es administrador
            $aryUser = ($this->usuarios->acceso($sUsuario, $sClave));

            if (fncValidateArray($aryUser)) {

                $this->session->init();

                $this->session->add('user', $aryUser);

                $this->json(["success" => true, "msg" => "Bienvenido al sistema usuario"]);
            } else {
                $this->json(["success" => false, "msg" => "Por favor verifique su usuario o correo o contraseña"]);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function salir()
    {
        $this->session->close();
        $this->redirect('acceso');
    }
}
