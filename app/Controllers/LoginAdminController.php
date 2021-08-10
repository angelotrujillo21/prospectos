<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;
use Application\Models\Negocios;
use Application\Models\Users;

class LoginAdminController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;
    public $empleados;

    public function __construct()
    {
        parent::__construct();
        $this->session   = new Session();
        $this->negocios  = new Negocios();
        $this->users     = new Users();
        $this->empleados = new Empleados();
        $this->session->init();
    }

    public function acceso()
    {
        try {
            if (!is_null($this->session->get('user')) ||  !is_null($this->session->get('user'))) {
                $user = $this->session->get('user');
                $this->redirect('mis-negocios');
            } else {
                $this->view('admin/login', array('negocios' => $this->negocios->fncGetNegocios()));
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function accesoAjax()
    {
        try {

            // Usuario o correo y cliente

            $sUsuario    = isset($_POST['sUsuario']) ? $_POST['sUsuario'] : null;
            $sClave      = isset($_POST['sClave']) ? $_POST['sClave'] : null;

            // Verificar si es administrador 
            $aryUser = ($this->users->acceso($sUsuario, $sClave));

            // var_dump($aryUser);
            // exit;

            if (fncValidateArray($aryUser)) {

                $aryUser["sRol"] = $this->fncGetVarConfig("sRolUser");

                $this->session->init();

                $this->session->add('user', $aryUser);

                $this->json(["success" => true, "msg" =>   "Bienvenido al sistema usuario"]);
            } else {

                $aryUser = $this->users->fncAccesosEmpleado($sUsuario, $sClave);

                if (fncValidateArray($aryUser)) {
                    
                    $aryUser  = $aryUser[0];
                    
                    $aryUser["sRol"] = $this->fncGetVarConfig("sRolEmp");
    
                    $this->session->init();
                    
                    $this->session->add('user', $aryUser);
                    
                    $this->json(["success" => true, "msg" =>  "Bievenido al sistema empleado"]);
                } else {
                    $this->json(["success" => false, "msg" => "Por favor verifique su usuario o correo o contraseña"]);
                }
                
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
