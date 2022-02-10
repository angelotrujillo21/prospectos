<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Usuarios;
use Application\Models\Empleados;
use Application\Models\Entidades;
use Application\Models\Prospecto;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

class VistasController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $catalogoTabla;
    public $usuarios;
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
        $this->usuarios      = new Usuarios();
        $this->entidades     = new Entidades();
        $this->session->init();

        // $aryData =  $this->fncGetRoles($this->session);
        // $this->isUser     = $aryData["isUser"];
        // $this->isEmpleado = $aryData["isEmpleado"];
    }


    public function misNegocios()
    {
        try {
            $this->authAdmin($this->session);

            // El usuario 1 es el administrador general del sistema
            $user = $this->session->get('user');
 
            if (!is_null($user) && isset($user["nIdUsuario"]) ) {
                $aryConfigClientes        = $this->entidades->fncGetCamposByEntidad($this->fncGetVarConfig("nIdEntidadCliente"));
                $aryConfigCatalogos       = $this->entidades->fncGetCamposByEntidad($this->fncGetVarConfig("nIdEntidadCatalogo"));
                $aryConfigVendedores      = $this->entidades->fncGetCamposByEntidad($this->fncGetVarConfig("nIdEntidadVendedor"));
                $aryConfigSupervisores    = $this->entidades->fncGetCamposByEntidad($this->fncGetVarConfig("nIdSupervisor"));
                $aryTipoProspectos        = $this->catalogoTabla->fncListado('TIPO_PROSPECTO');

                $user["nIdRol"] = 0;
                $user["nIdNegocio"] = 0;
                $this->session->add('user', $user);
                $this->view(
                    'admin/mis-negocios',
                    array(
                        'user'                   => $this->session->get('user'),
                        'menu'                   => false,
                        'showNotificacion'       => false,
                        'titulo'                 => 'Mis Negocios',
                        'aryConfigClientes'      => $aryConfigClientes,
                        'aryConfigCatalogos'     => $aryConfigCatalogos,
                        'aryConfigVendedores'    => $aryConfigVendedores,
                        'aryConfigSupervisores'  => $aryConfigSupervisores,
                        'aryTipoProspectos'      => $aryTipoProspectos,
                        'nRolProspectoAdmin'     => $this->fncGetVarConfig("nIdRolAdmin"),
                        'sRolUser'               => $this->fncGetVarConfig("sRolUser"),

                    )
                );
            } else{
                # Si se pierde la sesion vamos a salir de la app
                $authController  = new AuthController();
                $authController->salir();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function configprospecto($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryCamposClientes = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, 1, 1, true);
            $aryCamposCatalogo = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, 2, 1, true);
            $aryTipoCampos     = $this->entidades->fnGetTipoCampos(1, "7");

            $this->view(
                'admin/prospectos',
                [
                    "titulo"                 => "Configuracion de prospectos",
                    "menu"                   => true,
                    "user"                   => $this->session->get('user'),
                    'aryNotificaciones'      => $this->prospecto->fncObtenerCambiosForAdmin($nIdNegocio, 1),
                    'showNotificacion'       => true,
                    'nIdNegocio'             => $nIdNegocio,
                    'aryCamposClientes'      => $aryCamposClientes,
                    'aryCamposCatalogo'      => $aryCamposCatalogo,
                    'aryTipoCampos'          => $aryTipoCampos,
                    'nIdRolAdmin'            => $this->fncGetVarConfig("nIdRolAdmin"),
                    'aryModulos'             => $this->fncGetModulos($this->session)

                ]
            );
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function index($nIdNegocio, $nIdRol)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {
                $user = $this->session->get('user');
                $user["nIdRol"]     = $nIdRol;
                $user["nIdNegocio"] = $nIdNegocio;
                $this->session->add("user", $user);

                $aryColores = $this->usuarios->fncGetColoresEmpleados($nIdNegocio);
                $sColores   = is_array($aryColores) && count($aryColores) > 0 ? implode(",", array_column($aryColores, 'nIdColor')) : "0";
                $sIds       = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo") ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");

                $nIdEtapaPendiente  = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nIdEtapaEnProceso") : $this->fncGetVarConfig("nIdEtapaProgramada");
                $sEtapas            = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nPorcentajesProspectoLargo") : $this->fncGetVarConfig("nPorcentajesProspectoCorto");


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

                        'bShowMenu'                   => true,

                        'showNotificacion'            => true,
                        'nIdEtapaPendiente'           => $nIdEtapaPendiente, // Este estado sirve para verificar que etapa es pendiente en caso  de que la prospeccion sea larga la etapa pendiente es 90 en caso de corto es de 1
                        'sEtapas'                     => $sEtapas,
                        'nTipoProspecto'              => $aryNegocio["nTipoProspecto"],

                        'aryEtapaProspecto'           => $this->prospecto->fncGetEtapaProspecto($sIds),
                        'nTipoProspectoLargo'         => $this->fncGetVarConfig("nTipoProspectoLargo"),

                        'nIdEtapaRechazado'           => $this->fncGetVarConfig("nIdEtapaRechazado"),

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
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio, null, 1),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio, null, 1),
                        'aryVendedoresLimit'          => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio, null, 1, " us.nIdUsuario DESC ", 5),

                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'aryModulos'                  => $this->fncGetModulos($this->session),
                        'bExisteWidgetCitas'          => $bExisteWidgetCitas,


                        'nIdRolAdmin'                 => $this->fncGetVarConfig("nIdRolAdmin"),
                        'nIdRolVisitante'             => $this->fncGetVarConfig("nIdRolVisitante"),
                        'nIdRolAsesor'                => $this->fncGetVarConfig("nIdRolAsesor"),
                        'nIdRolSupervisor'            => $this->fncGetVarConfig("nIdRolSupervisor"),

                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function reporteGrafico($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {
                $this->view(
                    'admin/reporte-grafico',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Reporte Ventas',
                        'showNotificacion'            => true,
                        'bShowMenu'                   => true,

                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio),
                        'nTipoItemCatalogoProducto'   => $this->fncGetVarConfig("nTipoItemCatalogoProducto"),
                        'nTipoItemCatalogoServicio'   => $this->fncGetVarConfig("nTipoItemCatalogoServicio"),
                        'aryTipoEmpleados'            => $this->catalogoTabla->fncListado('TIPO_EMPLEADO'),
                        'nIdRolSupervisor'            => $this->fncGetVarConfig("nIdRolSupervisor"),
                        'nIdRolAsesorVentas'          => $this->fncGetVarConfig("nIdRolAsesor"),
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

    public function reporteVentas($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {
                $nIdEtapaPendiente  = $aryNegocio["nTipoProspecto"] == $this->fncGetVarConfig("nTipoProspectoLargo")  ? $this->fncGetVarConfig("nIdEtapaEnProceso") : $this->fncGetVarConfig("nIdEtapaProgramada");


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
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio),
                        'aryModulos'                  => $this->fncGetModulos($this->session),
                        'nIdEtapaCierre'              => $this->fncGetVarConfig("nIdEtapaCierre"),
                        'nIdEtapaPendiente'           => $nIdEtapaPendiente
                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function reporteConsultor($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {
                $this->view(
                    'admin/reporte-consultor',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'showNotificacion'            => true,
                        'menu'                        => true,
                        'titulo'                      => 'Reporte Consultor',
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio),
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

    public function reporteCliente($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($aryNegocio != false) {
                $this->view(
                    'admin/reporte-clientes',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Reporte por Cliente',
                        'showNotificacion'            => true,
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio),
                        'aryModulos'                  => $this->fncGetModulos($this->session),
                        'nIdEtapaCierre'              => $this->fncGetVarConfig("nIdEtapaCierre"),
                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function listadoEmpleados($nIdNegocio)
    {
        try {
            $this->authAdmin($this->session);

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            $aryColores = $this->usuarios->fncGetColoresEmpleados($nIdNegocio);
            $sColores   = is_array($aryColores) && count($aryColores) > 0 ? implode(",", array_column($aryColores, 'nIdColor')) : "0";

            if ($aryNegocio != false) {
                $this->view(
                    'admin/listado-empleados',
                    array(
                        'aryNegocio'                  => $aryNegocio,
                        'nIdNegocio'                  => $nIdNegocio,
                        'user'                        => $this->session->get('user'),
                        'menu'                        => true,
                        'titulo'                      => 'Base de datos de el empleado',
                        'showNotificacion'            => true,
                        'aryTipoItem'                 => $this->catalogoTabla->fncListado('TIPO_ITEM'),
                        'arySupervisores'             => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolSupervisor"), $nIdNegocio),
                        'aryVendedores'               => $this->usuarios->fncGetUsuarios($this->fncGetVarConfig("nIdRolAsesor"), $nIdNegocio),
                        'aryModulos'                  => $this->fncGetModulos($this->session),
                        'nIdEtapaCierre'              => $this->fncGetVarConfig("nIdEtapaCierre"),
                        'nIdEntidadVendedor'          => $this->fncGetVarConfig("nIdEntidadVendedor"),

                        'nIdSupervisor'               => $this->fncGetVarConfig("nIdSupervisor"),
                        'aryColores'                  => $this->catalogoTabla->fncListado('COLORES', "nIdCatalogoTabla NOT IN($sColores)"),
                        'aryTipoEmpleados'            => $this->catalogoTabla->fncListado('TIPO_EMPLEADO'),
                        'nIdRolSupervisor'     => $this->fncGetVarConfig("nIdRolSupervisor"),
                        'nIdRolAsesorVentas'   => $this->fncGetVarConfig("nIdRolAsesor"),
                    )
                );
            } else {
                $this->redirect('mis-negocios');
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncFormularioUsuario($nIdNegocio, $nRol)
    {
        try {
            $this->view('admin/formulario-usuario', [
                'nIdNegocio'    => $nIdNegocio,
                'nRol'          => $nRol,
                'titulo'        => "Nuevo usuario"
            ]);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncFormularioEmpleado($nIdNegocio, $nIdRol, $nIdSupervisoroColor)
    {
        try {
            $bExisteError = false;
            $aryNegocio   = $this->negocios->fncGetNegocioById($nIdNegocio);
            $sMensajeError    = "";
            $nIdRolSupervisor =  $this->fncGetVarConfig("nIdRolSupervisor");

            if ($nIdRol == $nIdRolSupervisor) {

                // Supervisores
                $sTitle           = 'Formulario Supervisor';
                $nIdEntidad           = 3;

                // Verifica si existe el color o supervisor dentro de ese negocio
                $aryDataColores   = $this->usuarios->fncVerificarExisteColorSupervisor($nIdNegocio, $nIdSupervisoroColor);

                if (fncValidateArray($aryDataColores)) {
                    $bExisteError  = true;
                    $sMensajeError = "Error. Ya existe un supervisor que se le asigno este color. Porfavor verifique o solicite asistencia.";
                }
            } else {
                $sTitle         = 'Formulario Vendedor o asesor de ventas';
                $nIdEntidad     = 4;
            }

            $this->view('admin/formulario-empleado', array(
                'nIdNegocio'              => $nIdNegocio,
                'sTitle'                  => $sTitle,
                'nIdRol'         => $nIdRol,
                'nIdSupervisoroColor'     => $nIdSupervisoroColor,
                'aryNegocio'              => $aryNegocio,
                'nIdEntidad'              => $nIdEntidad,
                'nIdRolSupervisor'        => $nIdRolSupervisor,
                'bExisteError'            => $bExisteError,
                'sMensajeError'           => $sMensajeError,

            ));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
