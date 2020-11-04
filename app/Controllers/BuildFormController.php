<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\CatalogoTabla;
use Application\Models\Negocios;
use Application\Models\Ubigeo;

class BuildFormController extends Controller
{

    //model principal
    public $negocios;
    public $ubigeo;
    public $session;
    public $users;
    public $catalogoTabla;

    public function __construct()
    {
        parent::__construct();
        $this->session          = new Session();
        $this->negocios         = new Negocios();
        $this->ubigeo           = new Ubigeo();
        $this->catalogoTabla    = new CatalogoTabla();
        $this->session->init();
        $this->authAdmin($this->session);
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
}
