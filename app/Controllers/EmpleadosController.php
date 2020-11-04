<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;

class EmpleadosController extends Controller
{

    //model principal
    public $session;
    public $catalogoTabla;
    public $negocios;
    public $empleados;

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->catalogoTabla = new CatalogoTabla();
        $this->negocios      = new Negocios();
        $this->empleados     = new Empleados();

        $this->session->init();
    }




    public function fncGrabarEmpleado()
    {
        try {

            $nIdRegistro                    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio                     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdTipoEmpleado                = isset($_POST['nIdTipoEmpleado']) ? $_POST['nIdTipoEmpleado'] : null;
            $nTipoDocumento                 = isset($_POST['nTipoDocumento']) ? $_POST['nTipoDocumento'] : null;
            $sNumeroDocumento               = isset($_POST['sNumeroDocumento']) ? $_POST['sNumeroDocumento'] : null;
            $sNombre                        = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sApellidos                     = isset($_POST['sApellidos']) ? $_POST['sApellidos'] : null;
            $nIdColor                       = isset($_POST['nIdColor']) ? $_POST['nIdColor'] : null;
            $dFechaNacimiento               = isset($_POST['dFechaNacimiento']) ? $_POST['dFechaNacimiento'] : null;
            $nCantidadPersonasDependientes  = isset($_POST['nCantidadPersonasDependientes']) ? $_POST['nCantidadPersonasDependientes'] : null;
            $nExperienciaVentas             = isset($_POST['nExperienciaVentas']) ? $_POST['nExperienciaVentas'] : null;
            $sRubroExperiencia              = isset($_POST['sRubroExperiencia']) ? $_POST['sRubroExperiencia'] : null;
            $nIdEstudios                    = isset($_POST['nIdEstudios']) ? $_POST['nIdEstudios'] : null;
            $nIdSituacionEstudios           = isset($_POST['nIdSituacionEstudios']) ? $_POST['nIdSituacionEstudios'] : null;
            $sCarreraCiclo                  = isset($_POST['sCarreraCiclo']) ? $_POST['sCarreraCiclo'] : null;
            $nIdSupervisor                  = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;
            $nEstado                        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio) || is_null($nIdTipoEmpleado)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }


            // Crear 
            if ($nIdRegistro == 0) {

                $this->empleados->fncGrabarEmpleado(
                    $nIdNegocio,
                    $nIdTipoEmpleado,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombre,
                    $sApellidos,
                    $nIdColor,
                    $dFechaNacimiento,
                    $nCantidadPersonasDependientes,
                    $nExperienciaVentas,
                    $sRubroExperiencia,
                    $nIdEstudios,
                    $nIdSituacionEstudios,
                    $sCarreraCiclo,
                    $nIdSupervisor,
                    $nEstado
                );
            } else {
                //Actualizar 
                $this->empleados->fncActualizarEmpleado(
                    $nIdRegistro,
                    $nIdNegocio,
                    $nIdTipoEmpleado,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombre,
                    $sApellidos,
                    $nIdColor,
                    $dFechaNacimiento,
                    $nCantidadPersonasDependientes,
                    $nExperienciaVentas,
                    $sRubroExperiencia,
                    $nIdEstudios,
                    $nIdSituacionEstudios,
                    $sCarreraCiclo,
                    $nIdSupervisor,
                    $nEstado
                );
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Empleado registrado exitosamente...' : 'Empleado actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncFormularioEmpleado($nIdNegocio, $nIdTipoEmpleado, $nIdSupervisoroColor)
    {
        try {


            $aryNegocio  = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($nIdTipoEmpleado == '588') {
                // Supervisores
                $sTitle           = 'Formulario Supervisor';
                $nIdEntidad       = 4;
            } else {
                $sTitle            = 'Formulario Vendedor';
                $nIdEntidad        = 3;
            }

            $this->view('admin/formulario-empleado', array(
                'nIdNegocio'          => $nIdNegocio,
                'sTitle'              => $sTitle,
                'nIdTipoEmpleado'     => $nIdTipoEmpleado,
                'nIdSupervisoroColor' => $nIdSupervisoroColor,
                'aryNegocio'          => $aryNegocio,
                'nIdEntidad'          => $nIdEntidad

            ));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncSendEmailEmpleado()
    {
        try {
            $sEmail              = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;
            $nTipoEmpleado       = isset($_POST['nTipoEmpleado']) ? $_POST['nTipoEmpleado'] : null;
            $nIdColor            = isset($_POST['nIdColor']) ? $_POST['nIdColor'] : null;
            $nIdSupervisor       = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;

            // Valida valores del formulario
            if (is_null($sEmail) || is_null($nTipoEmpleado)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $user = $this->session->get('user');

            // Si el tipo de emepleado es supervisro traeme el color 
            $nIdSupervisoroColor =  $nTipoEmpleado == '588' ? $nIdColor : $nIdSupervisor;
            $sUrl = route("formulario-empleado/" . $user["nIdNegocio"] . "/" . $nTipoEmpleado . "/" . $nIdSupervisoroColor . "");

            $aryNegocio  = $this->negocios->fncGetNegocioById($user["nIdNegocio"]);
            $mail        = new Mail();

            $aryData     = array(
                "sImagen"        => $aryNegocio["sImagen"],
                "sNombreNegocio" => $aryNegocio["sNombre"],
                "sUrl"           => $sUrl
            );

            ob_start();
            $this->view('admin/invitacion-prospectos-email', array('aryData' => $aryData));
            $html = ob_get_contents();
            ob_end_clean();


            if ($mail->send(['tienda' =>  $aryNegocio["sNombre"], 'subject' => 'Invitacion', 'body' => $html, 'email' => $sEmail, 'nombre' => 'Colaborador'])) {
                $this->json(array("success" => true, "sUrl" => $sUrl));
            } else {
                $this->json(array("error" => true, "sUrl" => $sUrl));
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
