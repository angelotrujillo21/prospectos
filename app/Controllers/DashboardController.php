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
    public $isUser;
    public $isEmpleado;

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

        $aryData =  $this->fncGetRoles($this->session);
        $this->isUser     = $aryData["isUser"];
        $this->isEmpleado = $aryData["isEmpleado"];
    }

    public function index($nIdNegocio)
    {
        try {
            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);
            if ($aryNegocio != false) {

                $user = $this->session->get('user');

                if ($this->isUser) {
                    $aryNegocioUsuario  = $this->negocios->fncGetNegociosByIdUsuario($user["nIdUsuario"], $nIdNegocio);
                    $user["nRol"]       = fncValidateArray($aryNegocioUsuario) ? $aryNegocioUsuario[0]['nRol'] : null;
                } else {
                    $user["nRol"]   = 0;
                }

                $user["nIdNegocio"] = $nIdNegocio;

                $this->session->add("user", $user);

                $aryColores = $this->empleados->fncGetColoresEmpleados($nIdNegocio);
                $sColores   = is_array($aryColores) && count($aryColores) > 0 ? implode(",", array_column($aryColores, 'nIdColor')) : "0";
                $sIds       = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo") ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");

                $nIdEtapaPendiente  = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nIdEtapaEnProceso") : $this->fncGetVarConfig("nIdEtapaProgramada");
                $sEtapas            = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");

                // var_dump($this->session->get('user'));
                $aryEmpleados = [];

                $nTipoEmpleadoAsesorVentas = $this->fncGetVarConfig("nTipoEmpleadoAsesorVentas");

                $aryEmpleados = $this->empleados->fncGetEmpleados(
                    $nTipoEmpleadoAsesorVentas,
                    $nIdNegocio,
                    null,
                    1
                );

                
                # Evalua si esque existe el widget para citas 

                $nIdActividadesWidget = $this->fncGetVarConfig("nIdActividadesWidget");
                $aryExistWidgetCitas  = $this->prospecto->fncExistWidgetInConfigProspecto($nIdNegocio, $nIdActividadesWidget, 1);
                $bExisteWidgetCitas   = fncValidateArray($aryExistWidgetCitas) ? true : false;
 

                $this->view(
                    'admin/home',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Home',
                        'showNotificacion'            => true,
                        'nIdEtapaPendiente'           => $nIdEtapaPendiente, // Este estado sirve para verificar que etapa es pendiente en caso  de que la prospeccion sea larga la etapa pendiente es 90 en caso de corto es de 1
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
                        'aryVendedoresLimit'          => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"), $nIdNegocio, null, 1, " emp.nIdEmpleado DESC ", 5),
                        'nTipoEmpleadoSupervisor'     => $this->fncGetVarConfig("nTipoEmpleadoSupervisor"),
                        'nTipoEmpleadoAsesorVentas'   => $this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"),
                        'nTipoEntidadNotaAdmin'       => $this->fncGetVarConfig("nTipoEntidadNotaAdmin"),
                        'nTipoEntidadNotaEmpleado'    => $this->fncGetVarConfig("nTipoEntidadNotaEmpleado"),
                        'nIdEtapaRechazado'           => $this->fncGetVarConfig("nIdEtapaRechazado"),
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'nRolProspectoAdmin'          => $this->fncGetVarConfig("nRolProspectoAdmin"),
                        'isUser'                      => $this->isUser ? "true" : "false",
                        'isEmpleado'                  => $this->isEmpleado ? "true" : "false",
                        'aryEmpleados'                => $aryEmpleados,
                        'aryModulos'                  => $this->fncGetModulos($this->session),
                        'bExisteWidgetCitas'          => $bExisteWidgetCitas
                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function reporteventas($nIdNegocio)
    {
        try {

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {


                $this->view(
                    'admin/reporte-ventas',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Reporte Ventas',
                        'showNotificacion'            => true,
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'arySupervisores'             => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"), $nIdNegocio),
                        'nTipoItemCatalogoProducto'   => $this->fncGetVarConfig("nTipoItemCatalogoProducto"),
                        'nTipoItemCatalogoServicio'   => $this->fncGetVarConfig("nTipoItemCatalogoServicio"),
                        'aryTipoEmpleados'            => $this->catalogoTabla->fncListado('TIPO_EMPLEADO'),
                        'nTipoEmpleadoSupervisor'     => $this->fncGetVarConfig("nTipoEmpleadoSupervisor"),
                        'nTipoEmpleadoAsesorVentas'   => $this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"),
                        'aryModulos'                  => $this->fncGetModulos($this->session),


                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
