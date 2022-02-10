<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Entidades;
use Application\Models\Prospecto;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Usuarios;

class NegociosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $entidades;
    public $catalogoTabla;
    public $prospecto;
    public $usuarios;
    public $sMsg  = "";

    public function __construct()
    {
        parent::__construct();

        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->entidades     = new Entidades();
        $this->catalogoTabla = new CatalogoTabla();
        $this->prospecto     = new Prospecto();
        $this->usuarios      = new Usuarios();
        $this->session->init();
        $this->authAdmin($this->session);
    }


    public function fncGrabarNegocio()
    {
        try {
            $nIdRegistro                = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $sNombre                    = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sDireccion                 = isset($_POST['sDireccion']) ? $_POST['sDireccion'] : null;
            $sImagen                    = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
            $nTipoProspecto             = isset($_POST['nTipoProspecto']) ? $_POST['nTipoProspecto'] : null;
            $nEstado                    = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;
            $aryConfiguracionCliente    = isset($_POST['aryConfiguracionCliente']) ? $_POST['aryConfiguracionCliente'] : null;
            $aryConfiguracionCatalogo   = isset($_POST['aryConfiguracionCatalogo']) ? $_POST['aryConfiguracionCatalogo'] : null;
            $aryConfiguracionVendedores = isset($_POST['aryConfiguracionVendedores']) ? $_POST['aryConfiguracionVendedores'] : null;
            $aryConfiguracionSupervisor = isset($_POST['aryConfiguracionSupervisor']) ? $_POST['aryConfiguracionSupervisor'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($sNombre) || is_null($sDireccion) || is_null($nTipoProspecto) || is_null($nEstado)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryConfiguracionCliente     = json_decode($aryConfiguracionCliente);
            $aryConfiguracionCatalogo    = json_decode($aryConfiguracionCatalogo);
            $aryConfiguracionVendedores  = json_decode($aryConfiguracionVendedores);
            $aryConfiguracionSupervisor  = json_decode($aryConfiguracionSupervisor);


            $sNombreImagen = null;
            $user          = $this->session->get('user');

            if (isset($sImagen) && !is_null($sImagen)) {
                $sNombreImagen = Upload::process($sImagen, 'images/multi');
            }

            // Crear
            if ($nIdRegistro == 0) {
                $nIdNegocio = $this->negocios->fncGrabarNegocio($sNombre, $sDireccion, $sNombreImagen, $nTipoProspecto, $nEstado);

                $this->negocios->fncGrabarUsuarioNegocio($user['nIdUsuario'], $nIdNegocio, $this->fncGetVarConfig("nIdRolAdmin"));

                if (count($aryConfiguracionCliente) > 0) {
                    foreach ($aryConfiguracionCliente as $aryCliente) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryCliente->nIdCampoEntidad, $aryCliente->nEstado);
                    }
                }

                if (count($aryConfiguracionCatalogo) > 0) {
                    foreach ($aryConfiguracionCatalogo as $aryCatalogo) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryCatalogo->nIdCampoEntidad, $aryCatalogo->nEstado);
                    }
                }

                if (count($aryConfiguracionVendedores) > 0) {
                    foreach ($aryConfiguracionVendedores as $aryVendedor) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryVendedor->nIdCampoEntidad, $aryVendedor->nEstado);
                    }
                }

                if (count($aryConfiguracionSupervisor) > 0) {
                    foreach ($aryConfiguracionSupervisor as $arySupervisor) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $arySupervisor->nIdCampoEntidad, $arySupervisor->nEstado);
                    }
                }

                // Obtener lso campos del prospecto por default
                $aryConfigProspectoDefault = $this->prospecto->fncObtenerWidgetProspecto(1, 1);
                if (is_array($aryConfigProspectoDefault) && count($aryConfigProspectoDefault) > 0) {
                    foreach ($aryConfigProspectoDefault as $nKey => $aryDefault) {
                        $this->prospecto->fncGrabarConfigProspecto($nIdNegocio, $aryDefault['nIdWidget'], 1);
                    }
                }
            } else {
                //Actualizar
                $this->negocios->fncActualizarNegocio($sNombre, $sDireccion, $sNombreImagen, $nTipoProspecto, $nEstado, $nIdRegistro);

                if (count($aryConfiguracionCliente) > 0) {
                    foreach ($aryConfiguracionCliente as $aryCliente) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryCliente->nEstado, $aryCliente->nIdConfiguracionCampo);
                    }
                }

                if (count($aryConfiguracionCatalogo) > 0) {
                    foreach ($aryConfiguracionCatalogo as $aryCatalogo) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryCatalogo->nEstado, $aryCatalogo->nIdConfiguracionCampo);
                    }
                }


                if (count($aryConfiguracionVendedores) > 0) {
                    foreach ($aryConfiguracionVendedores as $aryVendedor) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryVendedor->nEstado, $aryVendedor->nIdConfiguracionCampo);
                    }
                }

                if (count($aryConfiguracionSupervisor) > 0) {
                    foreach ($aryConfiguracionSupervisor as $arySupervisor) {
                        $this->negocios->fncActualizarConfiguracionCampos($arySupervisor->nEstado, $arySupervisor->nIdConfiguracionCampo);
                    }
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Negocio registrado exitosamente...' : 'Negocio actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncGetNegocios()
    {
        try {

            //El usuario 1 es el administrador general del sistema
            $user         = $this->session->get('user');
            $aryNegocios  = [];


            $aryNegocios = $this->negocios->fncGetNegociosByIdUsuario($user["nIdUsuario"]);

            $this->json(array("success" => true, "aryData" => $aryNegocios));
        } catch (Exception $ex) {
            echo $ex->getMessage();
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

            $aryData     = [];
            $aryNegocios = $this->negocios->fncGetNegocioById($nIdRegistro);


            $aryConfigClientes        = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, $this->fncGetVarConfig("nIdEntidadCliente"));
            $aryConfigCatalogos       = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, $this->fncGetVarConfig("nIdEntidadCatalogo"));
            $aryConfigVendedores      = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, $this->fncGetVarConfig("nIdEntidadVendedor"));
            $aryConfigSupervisores    = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, $this->fncGetVarConfig("nIdSupervisor"));

            $aryData = [
                "aryNegocio"             => $aryNegocios,
                "aryConfigClientes"      => $aryConfigClientes,
                "aryConfigCatalogos"     => $aryConfigCatalogos,
                "aryConfigVendedores"    => $aryConfigVendedores,
                "aryConfigSupervisores"  => $aryConfigSupervisores
            ];

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEliminarRegistro()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryConfigNegocio   = $this->prospecto->fncObtenerConfigProspecto($nIdRegistro, null, 0);

            if (is_array($aryConfigNegocio) && count($aryConfigNegocio)) {
                foreach ($aryConfigNegocio as $aryconf) {
                    $this->prospecto->fncEliminarColumnaProspecto($aryconf["sWidgetSystem"]);
                    $this->prospecto->fncEliminarWidgetProspecto($aryconf["nIdWidget"]);
                }
            }

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdRegistro);

            // Eliminar la imagen
            if (!empty($aryNegocio['sImagen']) && file_exists(ROOTPATHRESOURCE . "/images/multi/" . $aryNegocio['sImagen'])) {
                fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryNegocio['sImagen']);
            }

            $this->negocios->fncEliminarNegocio($nIdRegistro);

            $this->json(array("success" => 'Negocio eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncGetUsuariosInvitacion()
    {
        $nIdNegocio = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData    = [];
            $aryData    = $this->negocios->fncGetUsuariosInvitacion($nIdNegocio);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncProcesarInvitacionNegocio()
    {
        $nIdNegocio             = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $sNombre                = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
        $sCorreoInvitacion      = isset($_POST['sCorreoInvitacion']) ? $_POST['sCorreoInvitacion'] : null;
        $nRol                   = isset($_POST['nRol']) ? $_POST['nRol'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio) && is_null($nRol)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $bSend  = false;

            # Validar si esque el usuario existe
            $aryUser = $this->usuarios->fncBuscarUsuarioPorCorreo($sCorreoInvitacion);

            if (fncValidateArray($aryUser)) {
                $aryUser = $aryUser[0];
                # Si esque existe el usuario vamos a relacionarlo pero antes de relacionarlo vamos a verificar si ya esta relacionado

                # Valido si esque ya esta relacionado
                $aryNegocio = $this->negocios->fncGetNegociosByIdUsuario($aryUser["nIdUsuario"], $nIdNegocio);
                if (fncValidateArray($aryNegocio)) {
                    $this->sMsg = "El usuario ya se encuentra relacionado .Porfavor verifique";
                } else {
                    # Vamos relacionar usuario a negocio
                    $this->usuarios->fncGrabarUsuarioNegocio($aryUser["nIdUsuario"], $nIdNegocio, null, $nRol);
                    $this->sMsg = "Se relaciono el usuario ya existente de forma existosa";
                }
            } else {
                if (strlen($sCorreoInvitacion) > 0) {
                    $sUrl = route("formulario-usuario/" . $nIdNegocio . "/" . $nRol);

                    $mail = new Mail();

                    $html = '
                    <div>
                        <p>
                            <b><span style="font-size:14px;font-family:Arial">Estimado(a): </span></b>
                        </p>
                        <p>
                            <span style="font-size:14px;font-family:Arial">Se le a invitado para visualizar el tablero del negocio "' . $sNombre . '"
                            para ello tiene que aceptar la invitacion y registrarse haciendo click.
                            
                                <a style="color: #188ff6 !important " href="' . $sUrl . '">Aquí</a>
                            </span>
                        </p>
                    
                    </div>';
                    if ($mail->send(['sFrom' => NOMBRE_SITIO, 'subject' => 'Invitacion Negocio', 'body' => $html, 'sCorreo' => $sCorreoInvitacion, 'sNombre' => '',])) {
                        $bSend  = true;
                        $this->sMsg = "Genial se realizo el envio de la invitacion ...";
                    } else {
                        $bSend  = false;
                        $this->sMsg = "Ups.. hubo un error al enviar la invitacion la invitacion ...";
                    }
                }
            }

            $this->json(array("success" =>  $this->sMsg,  "bSend" => $bSend));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarUsuarioNegocio()
    {
        try {
            $nIdUsuario    = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $nIdNegocio    = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nRol          = isset($_POST['nRol']) ? $_POST['nRol'] : null;


            // Valida valores del formulario
            if (is_null($nIdUsuario)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $this->negocios->fncGrabarUsuarioNegocio($nIdUsuario, $nIdNegocio, $nRol);

            $this->json(array("success" => 'Usuario registrado exitosamente...'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncEliminarUsuarioNegocio()
    {
        try {
            $nIdUsuario    = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $nIdNegocio    = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;


            // Valida valores del formulario
            if (is_null($nIdUsuario)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $this->negocios->fncEliminarUsuarioNegocio($nIdUsuario, $nIdNegocio);
            $this->json(array("success" => 'Usuario Eliminado correctamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }




    public function fncMostrarUsuariosNegocios()
    {
        try {
            $nIdNegocio    = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;


            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $nIdRolAdmin = $this->fncGetVarConfig("nIdRolAdmin");
            $nIdRolVisitante = $this->fncGetVarConfig("nIdRolVisitante");

            $sIds = "  $nIdRolAdmin , $nIdRolVisitante ";

            // Solo mostrata los registros de administradores y visitantes
            $aryData = $this->negocios->fncMostrarUsuariosNegocios($nIdNegocio, $sIds);

            // Eliminamos el primer elemento ya que es la persona quien creo el negocio el no se puede eliminar la relacion
            unset($aryData[0]);

            // Reordenamos las keys de el arreglo
            $aryData = array_values($aryData);

            $this->json(array("success" => 'Mostrando datos encontrados...', 'aryData' => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
