<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Core\Controller as Controller;
use Application\Models\CatalogoTabla;
use Application\Models\Negocios;

class ProspectosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;
    public $catalogoTabla;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->negocios = new Negocios();
        $this->catalogoTabla = new CatalogoTabla();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function index($nIdNegocio)
    {

        $aryCamposClientes = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, 1, 1, true);
        $aryCamposCatalogo = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, 2, 1, true);

        $this->view(
            'admin/prospectos',
            [
                "titulo"                => "Configuracion de prospectos",
                "menu"                  => true,
                "user"                  => $this->session->get('user'),
                'showNotificacion'      => true,
                'nIdNegocio'            => $nIdNegocio,
                'aryCamposCatalogo'     => $aryCamposCatalogo,
                'aryCamposClientes'     => $aryCamposClientes
            ]
        );
    }
}
