<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Empleados;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

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
            $sCorreo                        = isset($_POST['sCorreo']) ? $_POST['sCorreo'] : null;
            $nIdColor                       = isset($_POST['nIdColor']) ? $_POST['nIdColor'] : null;
            $dFechaNacimiento               = isset($_POST['dFechaNacimiento']) ? $_POST['dFechaNacimiento'] : null;
            $nCantidadPersonasDependientes  = isset($_POST['nCantidadPersonasDependientes']) ? $_POST['nCantidadPersonasDependientes'] : null;
            $nExperienciaVentas             = isset($_POST['nExperienciaVentas']) ? $_POST['nExperienciaVentas'] : null;
            $sRubroExperiencia              = isset($_POST['sRubroExperiencia']) ? $_POST['sRubroExperiencia'] : null;
            $nIdEstudios                    = isset($_POST['nIdEstudios']) ? $_POST['nIdEstudios'] : null;
            $nIdSituacionEstudios           = isset($_POST['nIdSituacionEstudios']) ? $_POST['nIdSituacionEstudios'] : null;
            $sCarreraCiclo                  = isset($_POST['sCarreraCiclo']) ? $_POST['sCarreraCiclo'] : null;
            $nIdSupervisor                  = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;
            $sClave                         = isset($_POST['sClave']) ? $_POST['sClave'] : null;
            $sImagen                        = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
            $nEstado                        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $sNombreImagen = null;



            // Crear
            if ($nIdRegistro == 0) {
                if (isset($sImagen) && !is_null($sImagen)) {
                    $sNombreImagen = Upload::process($sImagen, 'images/multi');
                }

                $this->empleados->fncGrabarEmpleado(
                    $nIdNegocio,
                    $nIdTipoEmpleado,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombre,
                    $sCorreo,
                    $nIdColor,
                    $dFechaNacimiento,
                    $nCantidadPersonasDependientes,
                    $nExperienciaVentas,
                    $sRubroExperiencia,
                    $nIdEstudios,
                    $nIdSituacionEstudios,
                    $sCarreraCiclo,
                    $nIdSupervisor,
                    $sClave,
                    $sNombreImagen,
                    $nEstado
                );
            } else {
                if (isset($sImagen) && !is_null($sImagen)) {
                    $aryEmpleado = ($this->empleados->fncGetEmpleadoById($nIdRegistro))[0];

                    if (!empty($aryEmpleado["sImagen"])) {
                        fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryEmpleado['sImagen']);
                    }

                    $sNombreImagen = Upload::process($sImagen, 'images/multi');
                }

                //Actualizar
                $this->empleados->fncActualizarEmpleado(
                    $nIdRegistro,
                    $nIdNegocio,
                    $nIdTipoEmpleado,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombre,
                    $sCorreo,
                    $nIdColor,
                    $dFechaNacimiento,
                    $nCantidadPersonasDependientes,
                    $nExperienciaVentas,
                    $sRubroExperiencia,
                    $nIdEstudios,
                    $nIdSituacionEstudios,
                    $sCarreraCiclo,
                    $nIdSupervisor,
                    $sClave,
                    $sNombreImagen,
                    $nEstado
                );

                // Si actualizamos el empleado desde la app actualizamos su session
                $aryEmpleado  = $this->empleados->fncGetEmpleados(null, null, $nIdRegistro);
                $aryEmpleado  = fncValidateArray($aryEmpleado) ? $aryEmpleado[0] : null;

                if (!is_null($this->session->get("userEmpleado"))  && ($aryEmpleado["nTipoEmpleado"] == $this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"))) {
                    $this->session->add('userEmpleado', $aryEmpleado);
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Empleado registrado exitosamente...' : 'Empleado actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncPopulate()
    {
        try {
            $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nTipoEmpleado  = isset($_POST['nTipoEmpleado']) ? $_POST['nTipoEmpleado'] : null;
            $nRol           = isset($_POST['nRol']) ? $_POST['nRol'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows      = [];
            $aryEmpleados  = $this->empleados->fncGetEmpleadosAll($nTipoEmpleado, $nIdNegocio);

            $bIsSupervisor = $nTipoEmpleado == $this->fncGetVarConfig("nTipoEmpleadoSupervisor") ? true : false;

            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nRol"] == $this->fncGetVarConfig("nRolProspectoAdmin") ? true : false;
            
            if (fncValidateArray($aryEmpleados)) {
                foreach ($aryEmpleados as $aryEmpleado) {

                    $sActionVer       = "fncMostrarEmpleado(" . $aryEmpleado['nIdEmpleado'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarEmpleado(" . $aryEmpleado['nIdEmpleado'] . ", 'editar' );";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    ' . ( $bIsRolAdmin ? '<a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>'  : '') . ' 
                                </div>';

                    $sCuadradoSuper = ($bIsSupervisor ? '<div class="cuadrado fondo-' . strtolower($aryEmpleado["sColorSuper"]) . '"></div>' : '');

                    $aryRows[] = [
                        "sAcciones"                         => $sAcciones,
                        "nIdEmpleado"                       => $aryEmpleado["nIdEmpleado"],
                        "nTipoDocumento"                    => $aryEmpleado["sTipoDoc"],
                        "sNumeroDocumento"                  => $aryEmpleado["sNumeroDocumento"],
                        "sColor"                            => $sCuadradoSuper,
                        "sNombre"                           => $aryEmpleado["sNombre"],
                        "sCorreo"                           => $aryEmpleado["sCorreo"],
                        "nExperienciaVentas"                => $aryEmpleado["nExperienciaVentas"] == 1 ? "SI" : "NO",
                        "sRubroExperiencia"                 => $aryEmpleado["sRubroExperiencia"],
                        "dFechaNacimiento"                  => $aryEmpleado["dFechaNacimiento"],
                        "nCantidadPersonasDependientes"     => $aryEmpleado["nCantidadPersonasDependientes"],
                        "nIdEstudios"                       => $aryEmpleado["sEstudio"],
                        "nIdSituacionEstudios"              => $aryEmpleado["sSituacionEstudio"],
                        "sCarreraCiclo"                     => $aryEmpleado["sCarreraCiclo"],
                        "sClave"                            => $aryEmpleado["sClave"],
                        'sImagen'                           => !empty($aryEmpleado['sImagen']) ? '<img class="user-avatar rounded-circle  img-usuario" src="' . src('multi/' . $aryEmpleado['sImagen'])  . '" alt="' . $aryEmpleado['sImagen'] . '">' : '',
                        "nEstado"                           => $aryEmpleado["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json(array("success" => true, "aryData" => $aryRows));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncFormularioEmpleado($nIdNegocio, $nIdTipoEmpleado, $nIdSupervisoroColor)
    {
        try {
            $aryNegocio  = $this->negocios->fncGetNegocioById($nIdNegocio);

            $nTipoEmpleadoSupervisor =  $this->fncGetVarConfig("nTipoEmpleadoSupervisor");

            if ($nIdTipoEmpleado == $nTipoEmpleadoSupervisor) {
                // Supervisores
                $sTitle           = 'Formulario Supervisor';
                $nIdEntidad       = 4;
            } else {
                $sTitle            = 'Formulario Vendedor';
                $nIdEntidad        = 3;
            }

            $this->view('admin/formulario-empleado', array(
                'nIdNegocio'              => $nIdNegocio,
                'sTitle'                  => $sTitle,
                'nIdTipoEmpleado'         => $nIdTipoEmpleado,
                'nIdSupervisoroColor'     => $nIdSupervisoroColor,
                'aryNegocio'              => $aryNegocio,
                'nIdEntidad'              => $nIdEntidad,
                'nTipoEmpleadoSupervisor' => $nTipoEmpleadoSupervisor

            ));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncMostrarRegistro()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $aryData = $this->empleados->fncGetEmpleadoById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncMostrarRegistroCard()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->empleados->fncMostrarRegistroCard($nIdRegistro);
            $aryData["sUltimoAcceso"] = fncSecondsToTime($aryData["sTimeUltimoAcceso"]);

            $this->json(array("success" => true, "aryData" => $aryData));
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
            $nIdSupervisoroColor =  $nTipoEmpleado == $this->fncGetVarConfig("nTipoEmpleadoSupervisor") ? $nIdColor : $nIdSupervisor;
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


            if ($mail->send(['sFrom' =>  $aryNegocio["sNombre"], 'subject' => 'Invitacion', 'body' => $html, 'sCorreo' => $sEmail, 'sNombre' => 'Colaborador'])) {
                $this->json(array("success" => true, "sUrl" => $sUrl));
            } else {
                $this->json(array("error" => true, "sUrl" => $sUrl));
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncObtenerCamposEmpleados()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nTipoEmpleado  = isset($_POST['nTipoEmpleado']) ? $_POST['nTipoEmpleado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)  || is_null($nTipoEmpleado)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $nEntidad = 0;

            if ($nTipoEmpleado == $this->fncGetVarConfig("nTipoEmpleadoSupervisor")) {
                $nEntidad = $this->fncGetVarConfig("nIdSupervisor");
            } else {
                $nEntidad = $this->fncGetVarConfig("nIdEntidadVendedor");
            }

            $aryData = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, $nEntidad, 1, true);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncObtenerColores()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryColores = $this->empleados->fncGetColoresEmpleados($nIdNegocio);
            $sColores   = fncValidateArray($aryColores) ? implode(",", array_column($aryColores, 'nIdColor')) : "0";
            $aryColores = $this->catalogoTabla->fncListado('COLORES', "nIdCatalogoTabla NOT IN($sColores)");

            $this->json(array("success" => true, "aryData" => $aryColores));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
