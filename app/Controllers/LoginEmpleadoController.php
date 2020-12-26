<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;
use Application\Models\Negocios;
use Application\Models\Users;

class LoginEmpleadoController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;
    public $empleados;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->negocios = new Negocios();
        $this->users    = new Users();
        $this->empleados    = new Empleados();
        $this->session->init();
    }

    public function acceso()
    {
        try {
            if (!is_null($this->session->get('userEmpleado'))) {
                $user = $this->session->get('userEmpleado');
                $this->redirect('home');
            } else {
                if (!empty($_POST)) {

                    $sUsuario    = isset($_POST['sUsuario']) ? $_POST['sUsuario'] : null;
                    $sClave      = isset($_POST['sClave']) ? $_POST['sClave'] : null;
                    $nIdUsuario  = $this->users->fncAccesoEmpleado($sUsuario, $sClave);
                    if ($nIdUsuario > 0) {

                        $user = $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"), null, $nIdUsuario);

                        $this->session->init();
                        $this->session->add('userEmpleado', $user[0]);
                        $this->empleados->fncActualizarHoraAcceso($nIdUsuario);
                        $this->redirect('home/' . $user[0]['nIdNegocio']);
                    } else {
                        $this->view('empleado/login', array('error' => 'Por favor verifique su usuario o contraseña'));
                    }
                } else {
                    $this->view('empleado/login', []);
                }
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function salir()
    {
        $this->session->close();
        $this->redirect('/');
    }
}
