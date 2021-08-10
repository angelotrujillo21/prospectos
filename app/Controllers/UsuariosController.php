<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Users;
use Application\Models\Negocios;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;

class UsuariosController extends Controller
{

    //model principal
    public $session;
    public $negocios;
    public $empleados;

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->negocios = new Negocios();
        $this->users    = new Users();
        $this->empleados    = new Empleados();

        $this->session->init();
    }

    public function fncGrabarUsuario()
    {
        try {

            $nIdRegistro   = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $sNombre       = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sApellidos    = isset($_POST['sApellidos']) ? $_POST['sApellidos'] : null;
            $sEmail        = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;
            $sLogin        = isset($_POST['sLogin']) ? $_POST['sLogin'] : null;
            $sImagen       = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
            $sClave        = isset($_POST['sClave']) ? $_POST['sClave'] : null;
            $nIdRol        = isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null;
            $nEstado       = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($sNombre)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }


            $sNombreImagen = null;

            if (isset($sImagen) && !is_null($sImagen)) {
                $sNombreImagen = Upload::process($sImagen, 'images/multi');
            }

            $nIdUsuarioNew = null;

            // Crear 
            if ($nIdRegistro == 0) {

                $aryData = $this->users->fncBuscarUsuarioPorCorreoOLogin($sEmail, $sLogin);

                if (fncValidateArray($aryData)) {
                    $this->exception("Error. Ya existe un usuario con el correo ingresado.Porfavor verifique");
                }

                $nIdUsuarioNew = $this->users->fncGrabarUsuario(
                    $sNombre,
                    $sApellidos,
                    $sEmail,
                    $sLogin,
                    $sClave,
                    $sNombreImagen,
                    $nIdRol,
                    $nEstado
                );
            } else {
                //Actualizar 
                $this->users->fncActualizarUsuario(
                    $nIdRegistro,
                    $sNombre,
                    $sApellidos,
                    $sEmail,
                    $sLogin,
                    $sClave,
                    $sNombreImagen,
                    $nIdRol,
                    $nEstado
                );
                $nIdUsuarioNew = $nIdRegistro;

                $sRolUser     = $this->fncGetVarConfig("sRolUser");
                $aryUser      = $this->users->getUser($nIdRegistro);
                $userOld      = $this->session->get("user");

                if (!is_null($userOld)  && ($userOld["sRol"] == $sRolUser)) {

                    if (array_key_exists("nIdNegocio", $userOld)) {
                        $aryUser["nIdNegocio"]   = $userOld["nIdNegocio"];
                    }

                    $aryUser["sRol"] =  $sRolUser;
                    $this->session->add('user', $aryUser);
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Usuario registrado exitosamente...' : 'Usuario actualizado exitosamente...';

            $this->json(array("success" => $sSuccess, 'nIdUsuarioNew' => $nIdUsuarioNew));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncEliminarUsuario()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $aryData = $this->users->getUser($nIdRegistro);

            // Eliminar la imagen 
            if (!empty($aryData['sImagen'])) {
                fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryData['sImagen']);
            }

            $this->users->fncEliminarUsuario($nIdRegistro);

            $this->json(array("success" => 'Usuario eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncMostrarUsuario()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->users->getUser($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function fncRecuperarClave()
    {
        try {


            $sEmail = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;

            // Valida valores del formulario
            if (is_null($sEmail)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryData = $this->users->fncBuscarUsuarioPorCorreo($sEmail);
            $mail = new Mail();

            if (fncValidateArray($aryData)) {

                $aryData = $aryData[0];

                $aryUser = $this->users->getUser($aryData["nIdUsuario"]);


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
                       <span style="font-size:14px;font-family:Arial"><b>Login :</b> ' . $aryUser["sLogin"] . '  </span>
                    </p>

                    <p>
                        <span style="font-size:14px;font-family:Arial"><b>Clave :</b> ' . $aryUser["sClave"] . '  </span>
                    </p>
                  
                    <p>
                        <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                    </p>
                </div>';

                if ($mail->send(['sFrom' => 'Auth', 'subject' => 'Recuperacion de acceso', 'body' => $sHtml, 'sCorreo' => $aryUser["sEmail"], 'sNombre' => $aryUser["sNombre"]])) {
                    $this->json(array("success" => "Genial!.Enviamos los datos de acceso al correo " . $aryUser["sEmail"]  . ". Porfavor verifique."));
                } else {
                    $this->exception("Error. Se encontro al usuario pero no se pudo enviar el correo . Intentelo mas tarde porfavor");
                }
            } else {

                $sMsgFinal = "";
                $aryDataEmpleados = $this->empleados->fncBuscarEmpleadosPorCorreo($sEmail);
                if (fncValidateArray($aryDataEmpleados)) {
                    foreach ($aryDataEmpleados as $aryLoop) {

                        $sHtml = '
                        <div>
                            <p>
                                <b><span style="font-size:14px;font-family:Arial">
                                        Estimados señor(a): </span></b>
                                <span style="font-size:14px;font-family:Arial">' . uc($aryLoop["sNombre"]) . '</span>
                            </p>
                            <p>
                                <span style="font-size:14px;font-family:Arial">Por medio de la presente y de acuerdo a su
                                    solicitud, sometemos a brindarle la informacion para el acceso  a la plataforma de prospectos <br> <b>Porfavor no comparta su informacion con nadie</b> </span>
                            </p>

                            <p>
                            <span style="font-size:14px;font-family:Arial"><b>Login :</b> ' . $aryLoop["sCorreo"] . '  </span>
                            </p>

                            <p>
                                <span style="font-size:14px;font-family:Arial"><b>Clave :</b> ' . $aryLoop["sClave"] . '  </span>
                            </p>
                        
                            <p>
                                <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                            </p>
                        </div>';

                        if ($mail->send(['sFrom' => 'Auth', 'subject' => 'Recuperacion de acceso' . $aryLoop["sNegocio"], 'body' => $sHtml, 'sCorreo' => $aryLoop["sCorreo"], 'sNombre' => $aryLoop["sNombre"]])) {
                            $sMsgFinal .= "Genial!.Enviamos los datos de acceso ". $aryLoop["sNegocio"] ."  de al correo " . $aryLoop["sCorreo"]  . ". Porfavor verifique." ."<br><br>";
                        }
                    }
                    $this->json(array("success" => $sMsgFinal));
                } else {
                    $this->exception("Error. No se encontro ningun usuario del sistema con este correo. Porfavor verifique");
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncFormularioUsuario($nIdNegocio, $nRol)
    {
        try {


            $this->view('admin/formulario-usuario', array(
                'nIdNegocio'    => $nIdNegocio,
                'nRol'          => $nRol,
            ));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
