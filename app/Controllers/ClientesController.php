<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Clientes;

class ClientesController extends Controller
{
    //model principal
    public $users;
    public $clientes;

    public function __construct()
    {
        parent::__construct();
        $this->clientes = new Clientes();
    }

    public function fncPopulate($nIdNegocio)
    {
        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows      = [];
            $aryClientes  = $this->clientes->fncGetClientes($nIdNegocio);

            if (is_array($aryClientes) && count($aryClientes) > 0) {

                foreach ($aryClientes as $aryCliente) {

                    $sActionVer       = "fncMostrarCliente(" . $aryCliente['nIdCliente'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarCliente(" . $aryCliente['nIdCliente'] . ", 'editar' );";
                    $sActionEliminar  = "fncEliminarCliente(" . $aryCliente['nIdCliente'] . ");";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    <a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                    <a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
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
                        "nIdRelacionamiento"    => $aryCliente["sRelacionamiento"],
                        "sTelefono"             => $aryCliente["sTelefono"],
                        "nEstado"               => $aryCliente["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $sTelefono               = isset($_POST['sTelefono']) ? $_POST['sTelefono'] : null;
            $nIdRelacionamiento      = isset($_POST['nIdRelacionamiento']) ? $_POST['nIdRelacionamiento'] : null;
            $nEstado                 = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio)  || is_null($nTipoCliente)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }


            // Crear 
            if ($nIdRegistro == 0) {

                $this->clientes->fncGrabarCliente(
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
                    $sTelefono,
                    $nIdRelacionamiento,
                    $nEstado
                );
            } else {
                //Actualizar 
                $this->clientes->fncActualizarEmpleado(
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
                    $sTelefono,
                    $nIdRelacionamiento,
                    $nEstado
                );
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Cliente registrado exitosamente...' : 'Cliente actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
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


            $aryData = $this->clientes->fncGetClienteById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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


            $this->clientes->fncEliminarCliente($nIdRegistro);
            $this->json(array("success" => 'Cliente eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
