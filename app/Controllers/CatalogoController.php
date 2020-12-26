<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Catalogo;
use Application\Models\Empleados;

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

            if (is_array($aryCatalogos) && count($aryCatalogos) > 0) {
                foreach ($aryCatalogos as $aryCatalogo) {
                    $sActionVer       = "fncMostrarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ", 'editar' );";
                    $sActionEliminar  = "fncEliminarCatalogo(" . $aryCatalogo['nIdCatalogo'] . ");";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    <a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                    <a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                </div>';

                    $aryRows[] = [
                        "sAcciones"     => $sAcciones,
                        "sNombre"       => $aryCatalogo["sNombre"],
                        "nPrecio"       => $aryCatalogo["nPrecio"],
                        "nTipoItem"     => $aryCatalogo["nTipoItem"],
                        "sDescripcion"  => $aryCatalogo["sDescripcion"],
                        "nEstado"       => $aryCatalogo["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $nEstado          = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }


            // Crear
            if ($nIdRegistro == 0) {
                $this->catalogo->fncGrabarCatalogo(
                    $nIdNegocio,
                    $sNombre,
                    $nTipoItem,
                    $nPrecio,
                    $sDescripcion,
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
                    $nEstado
                );
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Catalogo registrado exitosamente...' : 'Catalogo actualizado exitosamente...';

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


            $aryData = $this->catalogo->fncGetCatalogoById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
        }
    }
   

}
