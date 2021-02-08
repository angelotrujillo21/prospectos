<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;
use Application\Models\Prospecto;

class DashboardController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $catalogoTabla;
    public $empleados;
    public $prospecto;

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->prospecto     = new Prospecto();
        $this->catalogoTabla = new CatalogoTabla();
        $this->empleados     = new Empleados();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function index($nIdNegocio)
    {
        try {
            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);
            if ($aryNegocio != false) {

                $user               = $this->session->get('user');
                $aryNegocioUsuario  = $this->negocios->fncGetNegociosByIdUsuario($user["nIdUsuario"] ,$nIdNegocio);

                $user["nRol"]       = fncValidateArray($aryNegocioUsuario) ? $aryNegocioUsuario[0]['nRol'] : null;
                $user["nIdNegocio"] = $nIdNegocio;
                
                $this->session->add("user", $user);

                $aryColores = $this->empleados->fncGetColoresEmpleados($nIdNegocio);
                $sColores   = is_array($aryColores) && count($aryColores) > 0 ? implode(",", array_column($aryColores, 'nIdColor')) : "0";
                $sIds       = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo") ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");

                $nIdEstadoPendiente = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nIdEtapaEnProceso") : $this->fncGetVarConfig("nIdEtapaProgramada");
                $sEtapas            = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");
                
               // var_dump($this->session->get('user'));

                $this->view( 
                    'admin/home',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Home',
                        'showNotificacion'            => true,
                        'nIdEstadoPendiente'          => $nIdEstadoPendiente,
                        'sEtapas'                     => $sEtapas,
                        'nTipoProspecto'              => $aryNegocio["nTipoProspecto"],
                        'aryEtapaProspecto'           => $this->prospecto->fncGetEtapaProspecto($sIds),
                        'nTipoProspectoLargo'         => $this->fncGetVarConfig("nTipoProspectoLargo"),
                        'nIdEtapaProgramada'          => $this->fncGetVarConfig("nIdEtapaProgramada"),
                        'nIdEtapaEnvioPropuesta'      => $this->fncGetVarConfig("nIdEtapaEnvioPropuesta"),
                        'nIdEtapaNegociacion'         => $this->fncGetVarConfig("nIdEtapaNegociacion"),
                        'nIdEtapaEnProceso'           => $this->fncGetVarConfig("nIdEtapaEnProceso"),
                        'nIdEtapaCierre'              => $this->fncGetVarConfig("nIdEtapaCierre"),
                        'nIdEstadoActividadPen'       => $this->fncGetVarConfig("nIdEstadoActividadPendiente"),
                        'nIdEstadoActividadEjecutado' => $this->fncGetVarConfig("nIdEstadoActividadEjecutado"),
                        'nTipoActividadCita'          => $this->fncGetVarConfig("nTipoActividadCita"),
                        'nIdEntidadVendedor'          => $this->fncGetVarConfig("nIdEntidadVendedor"),
                        'nIdSupervisor'               => $this->fncGetVarConfig("nIdSupervisor"),
                        'aryNotificaciones'           => $this->prospecto->fncObtenerCambiosForAdmin($nIdNegocio, 1),
                        'aryColores'                  => $this->catalogoTabla->fncListado('COLORES', "nIdCatalogoTabla NOT IN($sColores)"),
                        'aryTipoEmpleados'            => $this->catalogoTabla->fncListado('TIPO_EMPLEADO'),
                        'arySupervisores'             => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"), $nIdNegocio),
                        'nTipoEmpleadoSupervisor'     => $this->fncGetVarConfig("nTipoEmpleadoSupervisor"),
                        'nIdEtapaRechazado'           => $this->fncGetVarConfig("nIdEtapaRechazado"),
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'), 
                        'nRolProspectoAdmin'          => $this->fncGetVarConfig("nRolProspectoAdmin")
                    )
                );

            } else {
                $this->redirect('admin/mis-negocios');
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
