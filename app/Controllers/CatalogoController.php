<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Catalogo;
use Application\Models\Negocios;
use Application\Models\Empleados;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

class CatalogoController extends Controller
{

    //model principal
    public $session;
    public $catalogoTabla;
    public $catalogo;
    public $negocios;
    public $empleados;

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->catalogoTabla = new CatalogoTabla();
        $this->negocios      = new Negocios();
        $this->catalogo      = new Catalogo();

        $this->session->init();
    }

    public function fncPopulate($nIdNegocio)
    {
        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows      = [];
            $aryCatalogos = $this->catalogo->fncGetCatalogos($nIdNegocio);

            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nRol"] == $this->fncGetVarConfig("nRolProspectoAdmin") ? true : false;

            if (is_array($aryCatalogos) && count($aryCatalogos) > 0) {
                foreach ($aryCatalogos as $aryCatalogo) {


                    $sNewState        = $aryCatalogo['nEstado'] == '1' ? '0' : '1';
                    $sActionState     = 'fncCambiarEstadoCatalogo( ' . "'" . $aryCatalogo['nIdCatalogo'] . "', " . $sNewState . ' )';
                    $sActionVer       = "fncMostrarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ", 'editar' );";
                    $sActionEliminar  = "fncEliminarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ");";

                    $sIconState     = $aryCatalogo['nEstado'] == '1'  ? 'power_settings_new' : 'check';
                    $sTitleState    = $aryCatalogo['nEstado'] == '1' ? 'Desactivar' : 'Activar';

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
                        "sAcciones"     => $sAcciones,
                        "sNombre"       => $aryCatalogo["sNombre"],
                        "nPrecio"       => $aryCatalogo["nPrecio"],
                        "nTipoItem"     => $aryCatalogo["nTipoItem"],
                        "sDescripcion"  => $aryCatalogo["sDescripcion"],
                        'sImagen'       => !empty($aryCatalogo['sImagen']) ? '<img style="width: 35px;height: 35px;" class="user-avatar rounded-circle  img-usuario" src="' . src('multi/' . $aryCatalogo['sImagen'])  . '" alt="' . $aryCatalogo['sImagen'] . '">' : '',
                        "nEstado"       => $aryCatalogo["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];

                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
             echo $ex->getMessage();
        }
    }


    public function fncGrabarCatalogo()
    {
        try {
            $nIdRegistro      = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio       = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nTipoItem        = isset($_POST['nTipoItem']) ? $_POST['nTipoItem'] : null;
            $nPrecio          = isset($_POST['nPrecio']) ? $_POST['nPrecio'] : null;
            $sNombre          = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sDescripcion     = isset($_POST['sDescripcion']) ? $_POST['sDescripcion'] : null;
            $sImagen          = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
            $nEstado          = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $sNombreImagen  = null;
            if (isset($sImagen) && !is_null($sImagen)) {
                $sNombreImagen = Upload::process($sImagen, 'images/multi');
            }


            // Crear
            if ($nIdRegistro == 0) {
                $this->catalogo->fncGrabarCatalogo(
                    $nIdNegocio,
                    $sNombre,
                    $nTipoItem,
                    $nPrecio,
                    $sDescripcion,
                    $sNombreImagen,
                    $nEstado
                );
            } else {
                //Actualizar
                $this->catalogo->fncActualizarCatalogo(
                    $nIdRegistro,
                    $nIdNegocio,
                    $sNombre,
                    $nTipoItem,
                    $nPrecio,
                    $sDescripcion,
                    $sNombreImagen,
                    $nEstado
                );
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Catalogo registrado exitosamente...' : 'Catalogo actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
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


            $aryData = $this->catalogo->fncGetCatalogoById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
             echo $ex->getMessage();
        }
    }

    public function fncEliminarRegistro()
    {
        // Recibe valores del formulario
        //hola 
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->catalogo->fncEliminarCatalogo($nIdRegistro);
            $this->json(array("success" => 'Catalogo eliminado exitosamente.'));
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

            $this->catalogo->fncCambiarEstado($nIdRegistro, $nEstado);
            $this->json(array("success" => "Genial se realizo el cambio de estado exitosamente."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
