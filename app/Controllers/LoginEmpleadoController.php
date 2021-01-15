<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Session;
use Application\Models\Users;
use Application\Models\Negocios;
use Application\Models\Empleados;
use Application\Core\Controller as Controller;

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
        $this->session      = new Session();
        $this->negocios     = new Negocios();
        $this->users        = new Users();
        $this->empleados    = new Empleados();
        $this->session->init();
    }

    public function fncRecuperarClave()
    {
        try {


            $sEmail = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;

            // Valida valores del formulario
            if (is_null($sEmail)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryData = $this->empleados->fncBuscarEmpleadoPorCorreo($sEmail);

            if ( fncValidateArray( $aryData ) ) {
              
                $aryData = $aryData[0];
              
                $aryUser = ($this->empleados->fncGetEmpleadoById($aryData["nIdEmpleado"]))[0];

                $mail = new Mail();

                $sHtml = '
                <div>
                    <p>
                        <b><span style="font-size:14px;font-family:Arial">
                                Estimados señor(a): </span></b>
                        <span style="font-size:14px;font-family:Arial">' . uc($aryUser["sNombre"]) . '</span>
                    </p>
                    <p>
                        <span style="font-size:14px;font-family:Arial">Por medio de la presente y de acuerdo a su
                            solicitud, sometemos a brindarle la informacion para el acceso  a la plataforma de prospectos <br> <b>Porfavor no comparta su informacion con nadie</b> </span>
                    </p>

                    <p>
                       <span style="font-size:14px;font-family:Arial"><b>Correo :</b> '.$aryUser["sCorreo"].'  </span>
                    </p>

                    <p>
                        <span style="font-size:14px;font-family:Arial"><b>Clave :</b> '.$aryUser["sClave"].'  </span>
                    </p>
                  
                    <p>
                        <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                    </p>
                </div>';

                if ($mail->send(['sFrom' => 'Auth' , 'subject' => 'Recuperacion de acceso', 'body' => $sHtml, 'sCorreo' => $aryUser["sCorreo"], 'sNombre' => $aryUser["sNombre"]])) {
                    $this->json(array("success" => "Genial!.Enviamos los datos de acceso al correo ". $aryUser["sCorreo"]  .". Porfavor verifique."));
                } else {
                    $this->exception("Error. Se encontro al usuario pero no se pudo enviar el correo . Intentelo mas tarde porfavor");
                }

            } else {
                $this->exception("Error. No se encontro data con el correo ingresado. Porfavor veriique");
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function acceso()
    {
        try {
            if (!is_null($this->session->get('userEmpleado'))) {
                $user = $this->session->get('userEmpleado');
                $this->redirect('home/'. $user['nIdNegocio']);
            } else {
                if (!empty($_POST)) {
                    $sUsuario    = isset($_POST['sUsuario']) ? $_POST['sUsuario'] : null;
                    $sClave      = isset($_POST['sClave']) ? $_POST['sClave'] : null;
                    $nIdUsuario  = $this->users->fncAccesoEmpleado($sUsuario, $sClave);
                    if ($nIdUsuario > 0) {
                        //var_dump($nIdUsuario);

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
