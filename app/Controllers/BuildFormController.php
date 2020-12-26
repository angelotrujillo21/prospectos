<?php

namespace Application\Controllers;

use Application\Core\App;
use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\Catalogo;
use Application\Models\CatalogoTabla;
use Application\Models\Clientes;
use Application\Models\Negocios;
use Application\Models\Prospecto;
use Application\Models\Segmentacion;
use Application\Models\Ubigeo;

class BuildFormController extends Controller
{

    //model principal
    public $negocios;
    public $ubigeo;
    public $session;
    public $users;
    public $catalogoTabla;
    public $prospecto;
    public $clientes;
    public $catalogo;

    public function __construct()
    {
        parent::__construct();
        $this->session          = new Session();
        $this->negocios         = new Negocios();
        $this->clientes         = new Clientes();
        $this->ubigeo           = new Ubigeo();
        $this->catalogoTabla    = new CatalogoTabla();
        $this->prospecto        = new Prospecto();
        $this->catalogo         = new Catalogo();
        $this->segmentacion     = new Segmentacion();
        $this->session->init();
    }

    public function fncBuildForm()
    {
        try {

            $nIdNegocio  = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdEntidad  = isset($_POST['nIdEntidad']) ? $_POST['nIdEntidad'] : null;

            $aryCampos   = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, $nIdEntidad, 1);
            $aryResponse = [];

            if (is_array($aryCampos) && count($aryCampos) > 0) {

                foreach ($aryCampos as $nKey => $aryCampo) {

                    $aryResponse[] = [
                        "nIdEntidad"        => $nIdEntidad,
                        "sNombreTipoCampo"  => $aryCampo['sNombreTipoCampo'],
                        "sNombre"           => $aryCampo['sNombre'],
                        "sNombreUsuario"    => $aryCampo['sNombreUsuario'],
                        "sNombreTipoCampo"  => $aryCampo['sNombreTipoCampo'],
                        "sNombreConfig"     => $aryCampo['sNombreConfig'],
                        "sPlaceHolder"      => $aryCampo['sPlaceHolder'],
                        "nTamano"           => $aryCampo['nTamano'],
                        "aryLista"          => $aryCampo['sNombreConfig'] != 'UBIGEO_DEPARTAMENTO' && $aryCampo['sNombreConfig'] != 'CONDICIONAL' &&  strlen($aryCampo['sNombreConfig']) > 0 ? $this->catalogoTabla->fncListado(trim($aryCampo['sNombreConfig'])) : ($aryCampo['sNombreConfig'] == 'UBIGEO_DEPARTAMENTO' ? $this->ubigeo->fncObtenerDepartamentos() : [])
                    ];
                }
            }

            $this->json($aryResponse);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function fncBuildFormProspecto()
    {
        try {

            $nIdNegocio = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $segmentacionController = new SegmentacionController();
            $aryConfig              = $this->prospecto->fncObtenerConfigProspecto($nIdNegocio, 1);
            $aryData                = [];


            if (is_array($aryConfig) && count($aryConfig) > 0) {
                foreach ($aryConfig as $ary) {
                    $aryLista = [];

                    switch ($ary['sWidgetSystem']) {
                        case 'CLIENTE':
                            $aryLista = $this->clientes->fncGetClientes($nIdNegocio, 1);
                            break;
                        case 'CATALOGO':
                            $aryLista = $this->catalogo->fncGetCatalogos($nIdNegocio, 1);
                            break;
                        case 'SEGMENTACION_COMPETENCIA':
                            $aryLista = $segmentacionController->fncGetSegmentacionAll($nIdNegocio, 2, 1);
                            break;
                        case 'SEGMENTACION':
                            $aryLista = $segmentacionController->fncGetSegmentacionAll($nIdNegocio, 1, 1);
                            break;
                    }


                    switch ($ary['sTipoCampoSystem']) {
                        case 'select':
                        case 'radio':
                            $aryLista = strlen($ary["sValores"]) > 0 ? explode(',', $ary['sValores']) : [];
                            break;
                    }

                    $aryData[] = [
                        "nIdConfigProspecto" => $ary['nIdConfigProspecto'],
                        "sWidgetSystem"      => $ary['sWidgetSystem'],
                        "sWidget"            => uc($ary['sWidget']),
                        "aryLista"           => $aryLista,
                        "nTamano"            => $ary['nTamano'],
                        "nDefault"           => $ary['nDefault'],
                        "nRequerido"         => $ary['nRequerido'],
                        "sTipoCampoSystem"   => $ary['sTipoCampoSystem'],
                        "nTipoWidget"        => $ary['nTipoWidget'],
                    ];
                }
            }


            $this->json(["success" => true, "aryData" => $aryData]);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
