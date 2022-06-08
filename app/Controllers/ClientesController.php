<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Clientes;
use Application\Models\Prospecto;

class ClientesController extends Controller
{
    //model principal
    public $users;
    public $clientes; // Es mi modelo
    public $session;
    public $prospectos;

    public function __construct()
    {
        parent::__construct();
        $this->clientes = new Clientes();
        $this->session  = new Session();
        $this->prospectos = new Prospecto();
        $this->session->init();
    }

    public function fncPopulate($nIdNegocio)
    {
        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nIdRol"] == $this->fncGetVarConfig("nIdRolAdmin") ? true : false;

            $aryRows       = [];
            $aryClientes   = $this->clientes->fncGetClientes($nIdNegocio);

            if (is_array($aryClientes) && count($aryClientes) > 0) {
                foreach ($aryClientes as $aryCliente) {
                    $sNewState = $aryCliente['nEstado'] == '1' ? '0' : '1';


                    $sActionState     = 'fncCambiarEstadoCliente( ' . "'" . $aryCliente['nIdCliente'] . "', " . $sNewState . ' )';
                    $sActionVer       = "fncMostrarCliente(" . $aryCliente['nIdCliente'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarCliente(" . $aryCliente['nIdCliente'] . ", 'editar' );";
                    $sActionEliminar  = "fncEliminarCliente(" . $aryCliente['nIdCliente'] . ");";

                    $sIconState     = $aryCliente['nEstado'] == '1'  ? 'power_settings_new' : 'check';
                    $sTitleState    = $aryCliente['nEstado'] == '1' ? 'Desactivar' : 'Activar';


                    $sLinkEdit      = $bIsRolAdmin ? '<a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>' : '';
                    $sLinkEliminar  = $bIsRolAdmin ? '<a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>' : '';
                    $sLinkState     = $bIsRolAdmin ? '<a onclick="' . $sActionState . '"  href="javascript:;"  class="text-primary" title="' . $sTitleState . '"><i class="material-icons">' . $sIconState . '</i></a></a>' : '';


                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    ' . $sLinkEdit . '
                                    ' . $sLinkState . '
                                    ' . $sLinkEliminar . '
                                </div>';

                    $aryRows[] = [
                        "sAcciones"             => $sAcciones,
                        "nTipoDocumento"        => $aryCliente["sTipoDoc"],
                        "sNombreoRazonSocial"   => $aryCliente["sNombreoRazonSocial"],
                        "sNumeroDocumento"      => $aryCliente["sNumeroDocumento"],
                        "sContacto"             => $aryCliente["sContacto"],
                        "sCorreo"               => $aryCliente["sCorreo"],
                        "nIdDepartamento"       => $aryCliente["sDpt"],
                        "nIdProvincia"          => $aryCliente["sProvincia"],
                        "nIdDistrito"           => $aryCliente["sDistrito"],
                        "sDireccion"            => $aryCliente["sDireccion"],
                        "nIdRelacionamiento"    => $aryCliente["sRelacionamiento"],
                        "sTelefono"             => $aryCliente["sTelefono"],
                        "nEstado"               => $aryCliente["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarCliente()
    {
        try {
            $nIdRegistro             = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio              = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nTipoCliente            = isset($_POST['nTipoCliente']) ? $_POST['nTipoCliente'] : null;
            $nTipoDocumento          = isset($_POST['nTipoDocumento']) ? $_POST['nTipoDocumento'] : null;
            $sNumeroDocumento        = isset($_POST['sNumeroDocumento']) ? $_POST['sNumeroDocumento'] : null;
            $sNombreoRazonSocial     = isset($_POST['sNombreoRazonSocial']) ? $_POST['sNombreoRazonSocial'] : null;
            $sContacto               = isset($_POST['sContacto']) ? $_POST['sContacto'] : null;
            $sCorreo                 = isset($_POST['sCorreo']) ? $_POST['sCorreo'] : null;
            $nIdDepartamento         = isset($_POST['nIdDepartamento']) ? $_POST['nIdDepartamento'] : null;
            $nIdProvincia            = isset($_POST['nIdProvincia']) ? $_POST['nIdProvincia'] : null;
            $nIdDistrito             = isset($_POST['nIdDistrito']) ? $_POST['nIdDistrito'] : null;
            $sDireccion              = isset($_POST['sDireccion']) ? $_POST['sDireccion'] : null;
            $sTelefono               = isset($_POST['sTelefono']) ? $_POST['sTelefono'] : null;
            $nIdRelacionamiento      = isset($_POST['nIdRelacionamiento']) ? $_POST['nIdRelacionamiento'] : null;
            $nEstado                 = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio)  || is_null($nTipoCliente)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $nIdClienteNew = null;
            // Crear
            if ($nIdRegistro == 0) {

                $aryCliente = $this->clientes->fncGetClienteByNumDoc($nIdNegocio, $nTipoDocumento, $sNumeroDocumento);

                if (fncValidateArray($aryCliente)) {
                    $this->exception("Error.Ya existe un cliente con este numero de documento .Porfavor verifique");
                }

                $aryCliente = $this->clientes->fncGetClienteByNombre($nIdNegocio, $sNombreoRazonSocial);

                if (fncValidateArray($aryCliente)) {
                    $this->exception("Error.Ya existe un cliente con este nombre .Porfavor verifique");
                }

                $nIdClienteNew = $this->clientes->fncGrabarCliente(
                    $nIdNegocio,
                    $nTipoCliente,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombreoRazonSocial,
                    $sContacto,
                    $sCorreo,
                    $nIdDepartamento,
                    $nIdProvincia,
                    $nIdDistrito,
                    $sDireccion,
                    $sTelefono,
                    $nIdRelacionamiento,
                    $nEstado
                );
            } else {
                //Actualizar

                # Valida que otro usuario no tenga ese numero de documento
                $aryCliente = $this->clientes->fncValidarClientByNumDoc($nIdRegistro, $nIdNegocio, $nTipoDocumento, $sNumeroDocumento);

                if (fncValidateArray($aryCliente)) {
                    $this->exception("Error.No se puede actualizar el cliente ya que existe otro cliente , con este numero de documento .Porfavor verifique");
                }

                $aryCliente = $this->clientes->fncValidarClienteByNombre($nIdRegistro, $nIdNegocio, $sNombreoRazonSocial);

                if (fncValidateArray($aryCliente)) {
                    $this->exception("Error.No se puede actualizar el cliente ya que existe otro cliente , con este nombre .Porfavor verifique");
                }

                $this->clientes->fncActualizarClientes(
                    $nIdRegistro,
                    $nIdNegocio,
                    $nTipoCliente,
                    $nTipoDocumento,
                    $sNumeroDocumento,
                    $sNombreoRazonSocial,
                    $sContacto,
                    $sCorreo,
                    $nIdDepartamento,
                    $nIdProvincia,
                    $nIdDistrito,
                    $sDireccion,
                    $sTelefono,
                    $nIdRelacionamiento,
                    $nEstado
                );
                $nIdClienteNew = $nIdRegistro;
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Cliente registrado exitosamente...' : 'Cliente actualizado exitosamente...';

            $this->json(array("success" => $sSuccess, "nIdClienteNew" => $nIdClienteNew));
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


            $aryData = $this->clientes->fncGetClienteById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
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

            $aryProspecto = $this->prospectos->fncObtenerProspectosByIdCliente($nIdRegistro);

            if (fncValidateArray($aryProspecto)) {
                $this->exception('Error. No se puede eliminar el cliente porque se esta utilizando en el sistema. Por favor verifique.');
            }


            $this->clientes->fncEliminarCliente($nIdRegistro);
            $this->json(array("success" => 'Cliente eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetClientes()
    {
        // Recibe valores del formulario
        $nIdNegocio = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->clientes->fncGetClientes($nIdNegocio, 1);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetClientesParaAdmin()
    {
        try {

            $nIdNegocio   = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nTipoCliente = isset($_POST['nTipoCliente']) ? $_POST['nTipoCliente'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows      = [];
            $aryClientes  = $this->clientes->fncGetClientes($nIdNegocio, 1, $nTipoCliente);

            if (is_array($aryClientes) && count($aryClientes) > 0) {
                foreach ($aryClientes as $aryCliente) {

                    $aryRows[] = [
                        "sNombreoRazonSocial"   => $aryCliente["sNombreoRazonSocial"],
                        "sNumeroDocumento"      => $aryCliente["sTipoDoc"]  . " - " . $aryCliente["sNumeroDocumento"],
                        "sContacto"             => $aryCliente["sContacto"],
                        "sCorreo"               => $aryCliente["sCorreo"],
                        "sDireccion"            => $aryCliente["sDireccion"],
                        "sRelacionamiento"      => $aryCliente["sRelacionamiento"],
                        "sTelefono"             => $aryCliente["sTelefono"],
                        "sTiempoCreacion"       => " Hace " .  fncSecondsToTime($aryCliente["sTimeFechaCreacion"]),
                        "sHistorico"            => '<a onclick="fncVerHistorial(' . $aryCliente["nIdCliente"] . ');" href="javascript:;"><i class="fas fa-history"></i></a>',
                        "nEstado"               => $aryCliente["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }
            $this->json(array("success" => true, "aryData" => $aryRows));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncCambiarEstado()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nEstado     = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nEstado)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->clientes->fncCambiarEstado($nIdRegistro, $nEstado);
            $this->json(array("success" => "Genial se realizo el cambio de estado exitosamente."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
