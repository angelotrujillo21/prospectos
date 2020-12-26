<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;
use Application\Models\Prospecto;

class AppProspectoController extends Controller
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
        $this->empleados     = new Empleados();
        $this->prospecto     = new Prospecto();
        $this->session->init();
        $this->authEmpleado($this->session);
    }


    public function home($nIdNegocio)
    {
        try {

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio !== false) {

                $nTipoProspecto      = $aryNegocio["nTipoProspecto"];
                $nTipoProspectoLargo = $this->fncGetVarConfig("nTipoProspectoLargo");
                
                $sIds                = $nTipoProspecto == $nTipoProspectoLargo ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");
                $nIdEtapaNegociacion = $nTipoProspecto == $nTipoProspectoLargo ? $this->fncGetVarConfig("nIdEtapaNegociacion") :0;
                $this->view(
                    'empleado/home',
                    array(
                        'user'                        => $this->session->get('userEmpleado'),
                        'nTipoProspecto'              => $nTipoProspecto,
                        'nTipoProspectoLargo'         => $nTipoProspectoLargo,
                        'nIdEtapaNegociacion'         => $nIdEtapaNegociacion,
                        'nIdEntidad'                  => $this->fncGetVarConfig("nIdEntidadVendedor"),
                        'nIdEstadoActividadPen'       => $this->fncGetVarConfig("nIdEstadoActividadPendiente"),
                        'nIdEstadoActividadEjecutado' => $this->fncGetVarConfig("nIdEstadoActividadEjecutado"),
                        'aryEtapaProspecto'           => $this->prospecto->fncGetEtapaProspecto($sIds)
                    )
                );

            } else {
                $this->view('empleado/login', array('error' => 'El negocio de este usuario no existe o fue eliminado.'));
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
