<?php

namespace Application\Controllers;

use DateTime;
use Exception;
use Mpdf\Mpdf;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Clientes;
use Application\Models\Negocios;
use Application\Models\Empleados;
use Application\Models\Entidades;
use Application\Models\Prospecto;
use Application\Models\CatalogoTabla;
use setasign\Fpdi\PdfParser\Filter\Flate;
use Application\Core\Controller as Controller;

class ProspectosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;
    public $prospecto;
    public $entidades;
    public $empleado;
    public $clientes;
    public $catalogoTabla;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->catalogoTabla = new CatalogoTabla();
        $this->prospecto     = new Prospecto();
        $this->clientes      = new Clientes();
        $this->empleado      = new Empleados();
        $this->entidades     = new Entidades();
        $this->session->init();
    }

    public function index($nIdNegocio)
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
                    'nRolProspectoAdmin'     => $this->fncGetVarConfig("nRolProspectoAdmin"),
                    'aryModulos'             => $this->fncGetModulos($this->session)

                ]
            );
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetProspectos()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdEmpleado          = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $sBuscador            = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
        $sFiltro              = isset($_POST['sFiltro']) ? $_POST['sFiltro'] : null;
        $nValidacionAdmin     = isset($_POST['nValidacionAdmin']) ? $_POST['nValidacionAdmin'] : null;
        $nIdEtapa             = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $nIdSupervisor        = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;
        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;

        try {
            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $sFiltro = strlen($sFiltro) === 0 ? null :  $sFiltro;


            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                $nIdEmpleado,
                $sBuscador,
                $nValidacionAdmin,
                $nIdEtapa,
                $nIdSupervisor,
                null,
                null,
                null,
                null,
                $dDesde,
                $dHasta
            );

            $nTotalUnidades = 0;

            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;
            $nCitasCercanas = 0;
            $nOportunidad   = 0;

            $nIdEtapaCierre              = $this->fncGetVarConfig("nIdEtapaCierre");
            $nTipoActividadCita          = $this->fncGetVarConfig("nTipoActividadCita");
            $nIdEstadoActividadPendiente = $this->fncGetVarConfig("nIdEstadoActividadPendiente");
            $dAUnaSemana                 = date("Y-m-d", strtotime(date("Y-m-d") . "+ 7 days"));
            $dFechaHoy                   = date("Y-m-d");

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {
                    $aryEmpleado =  ($this->empleado->fncGetEmpleados(null, $nIdNegocio, $aryProspecto["nIdEmpleado"], null));
                    $aryEmpleado =   fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];

                    $aryUltimaCita = ($this->prospecto->fncGetProspectoActividadByIdProspecto($aryProspecto["nIdProspecto"], $nTipoActividadCita, null, null, " act.nIdActividad DESC ", 1));
                    $aryUltimaCita = fncValidateArray($aryUltimaCita) > 0 ? $aryUltimaCita[0] : [];


                    if (fncValidateArray($aryUltimaCita)) {
                        $aryUltimaCita["sColor"] = $this->fncObtenerColor($aryUltimaCita["sEstadoActividadCorta"], $aryUltimaCita["dtFechaEjecucion"]);
                    }

                    $aryCatalogo = $this->prospecto->fncGetAryProspectoCatalogo($aryProspecto["nIdProspecto"], SIMBOLO_MONEDA);

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    // Si es un prospecto combinado es decir que existen productos y servicios solo se suma los prospectos
                    $aryDetalleCatalogo = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"]);

                    if (is_null($sFiltro) && fncValidateArray($aryDetalleCatalogo)) {
                        $nAvance        += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nCantidad"] : 0;
                        $nRentaBasica   += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nTotal"] : 0;

                        $nTotalUnidades += $aryDetalleCatalogo["nCantidad"];
                        $nTotal         += $aryDetalleCatalogo["nTotal"];
                    }

                    if (fncValidateArray($aryUltimaCita) && ($nIdEstadoActividadPendiente == $aryUltimaCita["nIdEstadoActividad"])) {
                        $bCheckRango = fncCheckInRange($dFechaHoy, $dAUnaSemana, $aryUltimaCita["dFecha"]);
                        if ($bCheckRango) {
                            $nCitasCercanas++;
                        }
                    }

                    if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $nOportunidad++;
                    }

                    if ($sFiltro == 'CITAS' && fncValidateArray($aryUltimaCita) && ($nIdEstadoActividadPendiente == $aryUltimaCita["nIdEstadoActividad"])) {
                        $bCheckRango = fncCheckInRange($dFechaHoy, $dAUnaSemana, $aryUltimaCita["dFecha"]);
                        if ($bCheckRango) {
                            $nTotalUnidades += $aryDetalleCatalogo["nCantidad"];
                            $nTotal         += $aryDetalleCatalogo["nTotal"];
                            $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                        }
                    }
                    // elseif ($sFiltro == 'CIERRES' && ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre)) {
                    //     $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    // } elseif ($sFiltro == 'OPORTUNIDAD' && ($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                    //     $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    // }

                    if (is_null($sFiltro)) {
                        $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    }
                }
            }


            $nTotalCantidadProspectos = count($aryData);

            $aryIndicativos = [
                "nAvance"                   => $nAvance,
                "nRentaBasica"              => SIMBOLO_MONEDA . nf($nRentaBasica),
                "nCompra"                   => SIMBOLO_MONEDA . ($nTotalCierre > 0 ?  nf($nRentaBasica / $nTotalCierre) : 0),
                "nTicket"                   => $nAvance > 0 ? SIMBOLO_MONEDA . nf($nRentaBasica / $nAvance) : 0,
                "nEfectividad"              => $nTotalCantidadProspectos > 0 ? ((round(($nTotalCierre / $nTotalCantidadProspectos) * 100)) . "%")  : 0,
                "nCitasCercanas"            => $nCitasCercanas,
                "nTotalCierre"              => $nTotalCierre,
                "nOportunidad"              => $nOportunidad,
                "nTotal"                    => $nTotal,
                "nTotalCantidadProspectos"  => $nTotalCantidadProspectos,
                "nTotalUnidades"            => $nTotalUnidades
            ];

            $this->json(array("success" => true, "aryData" => $aryData, "aryIndicativos" => $aryIndicativos));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita)
    {
        return [
            "nIdProspecto"       => $aryProspecto["nIdProspecto"],
            "nIdProspectoFormat" => sp($aryProspecto["nIdProspecto"]),
            "nIdEtapa"           => $aryProspecto["nIdEtapa"],
            "sEtapa"             => $aryProspecto["sNombreEtapa"],
            "sCliente"           => $aryProspecto["sCliente"],
            "sTitulo"            => $aryProspecto["sTitulo"],
            "aryEmpleado"        => $aryEmpleado,
            "aryCatalogo"        => $aryCatalogo,
            "aryUltimaCita"      => $aryUltimaCita,
            "sTimeUltimoAcceso"  => fncSecondsToTime($aryProspecto["sTimeUltimoAcceso"])
        ];
    }

    public function fncGetProspectosParaReporteVentas()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdEmpleado          = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $sBuscador            = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
        $nValidacionAdmin     = isset($_POST['nValidacionAdmin']) ? $_POST['nValidacionAdmin'] : null;
        $nIdEtapa             = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $nIdSupervisor        = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;
        $nIdTipoItem          = isset($_POST['nIdTipoItem']) ? $_POST['nIdTipoItem'] : null;
        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;
        $arySupervisor        = isset($_POST['arySupervisor']) ? $_POST['arySupervisor'] : null;
        $aryAsesor            = isset($_POST['aryAsesor']) ? $_POST['aryAsesor'] : null;


        try {
            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                $nIdEmpleado,
                $sBuscador,
                $nValidacionAdmin,
                $nIdEtapa,
                $nIdSupervisor,
                null,
                $nIdTipoItem,
                null,
                null,
                $dDesde,
                $dHasta,
                $arySupervisor,
                $aryAsesor
            );

            $user         = $this->session->get("user");
            $bIsRolAdmin  = $user["nRol"] == $this->fncGetVarConfig("nRolProspectoAdmin") ? true : false;

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $nKey => $aryProspecto) {

                    $aryCliente  = null;

                    if (!empty($aryProspecto["nIdCliente"])) {
                        $aryCliente      = $this->clientes->fncGetClienteById($aryProspecto["nIdCliente"]);
                        $aryCliente      = fncValidateArray($aryCliente) ? $aryCliente[0] : null;
                    }

                    $aryDataDetalle  = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"], $nIdTipoItem);


                    $sActionVerAdjuntos      = "fncVerAdjuntosReporteVentas(" . $aryProspecto['nIdProspecto'] . ");";
                    $sActionDelete           = "fncEliminarProspectoCerrado(" . $aryProspecto['nIdProspecto'] . ");";
                    $sLinkEliminar           = $bIsRolAdmin ? '<a onclick="' . $sActionDelete . '" href="javascript:;"  title="Eliminar prospecto de reporte de ventas" class="text-danger"><i class="material-icons">delete</i> </a>' : '';
                    $sLinkVerAdjuntos        = '<a  onclick="' . $sActionVerAdjuntos . '" href="javascript:;" title="Ver Adjuntos" style=""><i class="material-icons">attach_file</i></a>                    ';

                    $sAcciones =    '<div class="content-acciones">
                                      ' . $sLinkVerAdjuntos . '
                                      <a class="text-danger" title="Descargar propuesta" target="_blank" href="' . route('admin/prospecto/fncDownloadPropuesta/' . $aryProspecto['nIdProspecto']) . '" style=""><i class="material-icons">picture_as_pdf</i></a>
                                      ' . $sLinkEliminar . '
                                    </div>';


                    $aryData[] = [
                        "sAcciones"         => $sAcciones,
                        "nIdProspecto"      => $aryProspecto["nIdProspecto"],
                        "nItem"             => sp($nKey + 1, 4),
                        "dFechaCreacion"    => $aryProspecto["dFecha"],
                        "sCliente"          => !is_null($aryCliente) ? $aryCliente["sNombreoRazonSocial"] : $aryProspecto["sTitulo"],
                        "sTelefono"         => !is_null($aryCliente) ? $aryCliente["sTelefono"] :  "",
                        "sDocumento"        => !is_null($aryCliente) ? $aryCliente["sTipoDoc"] . "-" .  $aryCliente["sNumeroDocumento"] : "",
                        "sTipoItem"         => $aryDataDetalle["sTipoItem"],
                        "sDetalle"          => $aryDataDetalle["sDetalle"],
                        "nCantidad"         => $aryDataDetalle["nCantidad"],
                        "nTotal"            => nf($aryDataDetalle["nTotal"]),
                        "sEmpleado"         => $aryProspecto["sEmpleado"],
                    ];
                }
            }

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetDetalleCatalogoByIdProspecto($nIdProspecto, $nIdTipoItem = null)
    {
        try {
            $nTipoItemCatalogoProducto   = $this->fncGetVarConfig("nTipoItemCatalogoProducto");
            $nTipoItemCatalogoServicio   = $this->fncGetVarConfig("nTipoItemCatalogoServicio");

            $bExisteProducto      = false;
            $nTotalProductos      = 0;
            $nCantidadProductos   = 0;


            $bExisteServicio      = false;
            $nTotalServicios      = 0;
            $nCantidadServicios   = 0;

            $aryDetalles = $this->prospecto->fncObtenerDetalleProspecto($nIdProspecto, $nIdTipoItem);


            $aryItems    = [];
            $sDetalle    = "";

            if (fncValidateArray($aryDetalles)) {
                foreach ($aryDetalles as $aryDetalle) {
                    $nTotalItem    = $aryDetalle["nCantidad"] *  $aryDetalle["nPrecio"];
                    $sDetalle     .= $aryDetalle["sCatalogo"] . " | " . $aryDetalle["nCantidad"] . " x " . $aryDetalle["nPrecio"] . " </br>";

                    switch ($aryDetalle["nTipoItem"]) {

                        case $nTipoItemCatalogoServicio:
                            $bExisteServicio      = true;
                            $nTotalServicios      += $nTotalItem;
                            $nCantidadServicios   += $aryDetalle["nCantidad"];
                            break;
                        case $nTipoItemCatalogoProducto:
                            $bExisteProducto      = true;
                            $nTotalProductos      += $nTotalItem;
                            $nCantidadProductos   += $aryDetalle["nCantidad"];
                            break;
                    }

                    $aryItems[]  = $aryDetalle["sTipoItem"];
                }
            }

            $aryItems  = array_unique($aryItems);
            $sTipoItem = "";

            if (count($aryItems) == 1) {
                $sTipoItem = $aryItems[0];
            } else {
                $sTipoItem = implode(",", $aryItems);
            }

            $nTotalGeneral     = 0;
            $nCantidadGeneral  = 0;

            // Segun reglas de negocio si existe producto y servicio de un prospecto solo se suman los servicios

            if ($bExisteServicio === true && $bExisteProducto === true) {
                $nTotalGeneral    = $nTotalServicios;
                $nCantidadGeneral = $nCantidadServicios;
            } elseif ($bExisteServicio === true && $bExisteProducto === false) {
                $nTotalGeneral    = $nTotalServicios;
                $nCantidadGeneral = $nCantidadServicios;
            } elseif ($bExisteProducto === true && $bExisteServicio === false) {
                $nTotalGeneral    = $nTotalProductos;
                $nCantidadGeneral = $nCantidadProductos;
            }

            return [
                "nTotal"          => $nTotalGeneral,
                "nCantidad"       => $nCantidadGeneral,
                "sTipoItem"       => $sTipoItem,
                "sDetalle"        => $sDetalle,
                "bExisteServicio" => $bExisteServicio,
                "bExisteProducto" => $bExisteProducto,
            ];
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarProspecto()
    {
        try {
            $nIdRegistro        = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio         = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdCliente         = isset($_POST['nIdCliente']) ? $_POST['nIdCliente'] : null;
            $sTitulo            = isset($_POST['sTitulo']) ? $_POST['sTitulo'] : null;

            $nIdEmpleado        = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
            $aryCatalogos       = isset($_POST['aryCatalogos']) ? $_POST['aryCatalogos'] : null;
            $arySegmentaciones  = isset($_POST['arySegmentaciones']) ? $_POST['arySegmentaciones'] : null;
            $aryActividades     = isset($_POST['aryActividades']) ? $_POST['aryActividades'] : null;
            $sNota              = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $nTipoEntidadNota   = isset($_POST['nTipoEntidadNota']) ? $_POST['nTipoEntidadNota'] : null;
            $aryValueExtra      = isset($_POST['aryValueExtra']) ? $_POST['aryValueExtra'] : null;
            $nEstado            = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryValueExtra   = is_array($aryValueExtra) && count($aryValueExtra) > 0 ?  $this->fncBuildArrayValues($aryValueExtra) : [];


            if ($nIdRegistro == 0) {

                $nIdEtapa        = $this->fncGetVarConfig("nIdEtapaProgramada");

                $nIdNewProspecto = $this->prospecto->fncGrabarProspecto($sTitulo, $nIdCliente, $nIdNegocio, $nIdEmpleado, $nIdEtapa, $nEstado, $aryValueExtra);

                $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, null, "Se creo el prospecto - " . date("d/m/Y h:i:s"), $nEstado);

                if (fncValidateArray($aryCatalogos)) {
                    foreach ($aryCatalogos as $aryCata) {
                        $this->prospecto->fncGrabarProspectoCatalogo($nIdNewProspecto, $aryCata["nIdCatalogo"], $aryCata["nCantidad"], $aryCata["nPrecio"]);
                    }
                }

                if (fncValidateArray($arySegmentaciones)) {
                    foreach ($arySegmentaciones as $arySeg) {
                        $this->prospecto->fncGrabarProspectoSegmentacion($nIdNewProspecto, $arySeg["nIdSegmentacion"], $arySeg["nIdDetalle"]);
                    }
                }

                if (fncValidateArray($aryActividades)) {
                    foreach ($aryActividades as $aryActi) {
                        $this->prospecto->fncGrabarProspectoActividad(
                            $nIdNewProspecto,
                            $aryActi["nIdEmpleado"],
                            $aryActi["nTipoActividad"],
                            $aryActi["nIdEstadoActividad"],
                            $aryActi["sFechaActividad"],
                            $aryActi["sHoraActividad"],
                            $aryActi["sNota"],
                            $aryActi["sLatitud"],
                            $aryActi["sLongitud"],
                            $aryActi["nEstado"]
                        );
                    }
                    $sCambio = ("Se creo " . count($aryActividades) . (count($aryActividades) == 1 ? " cita " : " citas "));
                    $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, null, $sCambio, $nEstado);
                }

                if (!empty($sNota)) {
                    $this->prospecto->fncGrabarProspectoNota($nIdNewProspecto, $nIdEmpleado, $nTipoEntidadNota, $sNota, 1);
                }
            } else {
                // Actualizar
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Prospecto registrado exitosamente...' : 'Prospecto actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncGrabarPS()
    {
        try {

            $nIdRegistro        = 0;
            $nIdNegocio         = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdCliente         = isset($_POST['nIdCliente']) ? $_POST['nIdCliente'] : null;
            $nIdEmpleado        = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
            $sTitulo            = isset($_POST['sTitulo']) ? $_POST['sTitulo'] : null;

            $bExisteWidgetCitas = isset($_POST['bExisteWidgetCitas']) ? $_POST['bExisteWidgetCitas'] : null;

            $aryActi            = isset($_POST['aryActividades']) ? $_POST['aryActividades'] : null;
            $nTipoEntidadNota   = isset($_POST['nTipoEntidadNota']) ? $_POST['nTipoEntidadNota'] : null;
            $sNota              = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $nEstado            = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // var_dump($aryActi);
            // exit;



            if ($nIdRegistro == 0) {

                $nIdEtapa        = $this->fncGetVarConfig("nIdEtapaProgramada");

                $nIdNewProspecto = $this->prospecto->fncGrabarProspecto($sTitulo, $nIdCliente, $nIdNegocio, $nIdEmpleado, $nIdEtapa, $nEstado, []);

                $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, null, "Se creo el prospecto - " . date("d/m/Y h:i:s"), $nEstado);

                # Atraves de la vista paso la validacion si esque el widget de citas
                
                if ($bExisteWidgetCitas) {

                    $this->prospecto->fncGrabarProspectoActividad(
                        $nIdNewProspecto,
                        $aryActi["nIdEmpleado"],
                        $aryActi["nTipoActividad"],
                        $aryActi["nIdEstadoActividad"],
                        $aryActi["sFechaActividad"],
                        $aryActi["sHoraActividad"],
                        $aryActi["sNota"],
                        $aryActi["sLatitud"],
                        $aryActi["sLongitud"],
                        $aryActi["nEstado"]
                    );

                    $sCambio = "Se creo 1 cita";
                    $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, null, $sCambio, $nEstado);
                }

                if (!empty($sNota)) {
                    $this->prospecto->fncGrabarProspectoNota($nIdNewProspecto, $nIdEmpleado, $nTipoEntidadNota, $sNota, 1);
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Prospecto simple registrado exitosamente...' : 'Prospecto simple actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncBuildArrayValues($aryValueExtra)
    {
        $aryNew = [];
        if (is_array($aryValueExtra) && count($aryValueExtra) > 0) {
            foreach ($aryValueExtra as $ary) {
                $aryNew[key($ary)] = $ary[key($ary)];
            }
        }
        return $aryNew;
    }

    public function fncObtenerConfigProspecto()
    {
        try {
            $nIdNegocio = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nEstado    = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;
            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }
            $aryData = $this->prospecto->fncObtenerConfigProspecto($nIdNegocio, $nEstado);
            $this->json(["success" => true, "aryData" => $aryData]);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncMostrarRegistro()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdNegocio  = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData              = [];
            $aryConfig            = $this->prospecto->fncObtenerConfigProspecto($nIdNegocio, 1, 0);
            $aryConfigSWidget     = fncValidateArray($aryConfig) ? array_column($aryConfig, "sWidgetSystem") : [];
            $aryProspecto         = $this->prospecto->fncGetProspectoById($nIdRegistro, $nIdNegocio, $aryConfigSWidget);
            $aryProspecto         = fncValidateArray($aryProspecto) ? $aryProspecto[0] : [];


            $sArchivo = "CTZ_" . sp($aryProspecto["nIdProspecto"]) . ".pdf";

            $aryData = [
                "aryProspecto"              => $aryProspecto,
                "sLinkWebCotizacion"        => file_exists(ROOTPATHRESOURCE . "/docs/" . $sArchivo) ? docs($sArchivo) : "",
                "aryProspectoSegmentacion"  => $this->prospecto->fncGetProspectoSegmentacionByIdProspecto($nIdRegistro),
                "aryConfigExtra"            => $aryConfig
            ];

            // Solo si esta consultando un empleado se actualiza si es el admin no actualiza  

            $user = $this->session->get("user");
            $sRolEmp = $this->fncGetVarConfig("sRolEmp");

            if (!is_null($user) && is_array($user) && $user["sRol"] == $sRolEmp  && ($aryProspecto["nIdEmpleado"] == $user["nIdEmpleado"])) {
                $this->prospecto->fncActualizarFechaUltimoAccesoProspecto($nIdRegistro);
            }


            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetActividadByIdProspecto()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nTipoActividad = isset($_POST['nTipoActividad']) ? $_POST['nTipoActividad'] : null;

        try {
            $aryData = [];
            $aryActividades =   $this->prospecto->fncGetProspectoActividadByIdProspecto($nIdRegistro, $nTipoActividad);

            if (fncValidateArray($aryActividades)) {
                foreach ($aryActividades as $aryActividad) {
                    $aryData[] = [
                        "nIdActividad"            => $aryActividad["nIdActividad"],
                        "nIdProspecto"            => $aryActividad["nIdProspecto"],
                        "sEmpleado"               => $aryActividad["sEmpleado"],
                        "dFechaCreacion"          => $aryActividad["dFechaCreacion"],
                        "nIdEstadoActividad"      => $aryActividad["nIdEstadoActividad"],
                        "sEstadoActividadLarga"   => $aryActividad["sEstadoActividadLarga"],
                        "sEstadoActividadCorta"   => $aryActividad["sEstadoActividadCorta"],
                        "dtFechaEjecucion"        => $aryActividad["dtFechaEjecucion"],
                        "nTipoActividad"          => $aryActividad["nTipoActividad"],
                        "dFecha"                  => $aryActividad["dFecha"],
                        "dHora"                   => $aryActividad["dHora"],
                        "sNota"                   => $aryActividad["sNota"],
                        "sLatitud"                => $aryActividad["sLatitud"],
                        "sLongitud"               => $aryActividad["sLongitud"],
                        "sColor"                  => $this->fncObtenerColor($aryActividad["sEstadoActividadCorta"], $aryActividad["dtFechaEjecucion"]),
                        "nEstado"                 => $aryActividad["nEstado"],
                    ];
                }
            }

            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncObtenerColor($sNombreCorto, $dFechaEjecucion)
    {
        $sColor = "";

        switch ($sNombreCorto) {
            case "PDT":
                $dFechaHoy       = new DateTime("now");
                $dFechaEjecucion = new DateTime($dFechaEjecucion);
                $df              = $dFechaHoy->diff($dFechaEjecucion);
                // si el invert es 1 es porque ya se paso la fecha osea negativo
                if ($df->invert == 1) {
                    // color rojo
                    $sColor = "rojo";
                } else {
                    // si la difrencia es mayor a una año a un mes o aun dia
                    if ($df->y > 0 || ($df->m > 0) || $df->d > 0) {
                        // color verde
                        $sColor =  "verde";
                        // si la diferencia es menor a 24 horas
                    } elseif ($df->h < 24) {
                        // color amarillo
                        $sColor =  "amarillo";
                    }
                }
                break;
            case "CLD":
                // color negro
                $sColor = "negro";
                break;
            case "CPG":
                // color lila
                $sColor = "lila";
                break;
            case "ETD":
                // color azul
                $sColor = "azul";
                break;
        }

        return $sColor;
    }

    public function fncActualizarConfigProspecto()
    {
        try {
            $aryData = isset($_POST['aryData']) ? $_POST['aryData'] : null;

            // Valida valores del formulario
            if (is_null($aryData)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            if (is_array($aryData) && count($aryData) > 0) {
                foreach ($aryData as $nKey => $aryItem) {
                    $this->prospecto->fncActualizarConfigProspecto($aryItem['nIdConfigProspecto'], null, null, $aryItem['nOrden'], $aryItem['nEstado']);
                }
            }

            $this->json(["success" => "Configuracion de prospecto actualizado correctamente."]);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarWidgetProspecto()
    {
        try {
            $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $sNombre        = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sValores       = isset($_POST['sValores']) ? $_POST['sValores'] : null;
            $nTipoWidget    = isset($_POST['nTipoWidget']) ? $_POST['nTipoWidget'] : null;
            $nTipoCampo     = isset($_POST['nTipoCampo']) ? $_POST['nTipoCampo'] : null;
            $nDefault       = isset($_POST['nDefault']) ? $_POST['nDefault'] : null;
            $nRequerido     = isset($_POST['nRequerido']) ? $_POST['nRequerido'] : null;
            $nEstado        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro) || is_null($sNombre) || is_null($nTipoWidget)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // Se le adjunta un id al nombre del camp para que sean distintos
            $sNombreDb = fncSanitizeDb($nIdNegocio . $sNombre);
            $nSize     = 250;

            if ($nIdRegistro == 0) {
                $aryValidate = $this->prospecto->fncGetProspectoByName($sNombreDb);

                if (fncValidateArray($aryValidate)) {
                    $this->exception('Error. El campo ingresado ya existe. Por favor verifique.');
                }

                // Crear
                $nIdWidget           = $this->prospecto->fncGrabarWidgetProspecto($sNombreDb, $sNombre, $sValores, $nTipoWidget, $nTipoCampo, $nDefault, $nRequerido, $nEstado);
                $nIdConfigProspecto  = $this->prospecto->fncGrabarConfigProspecto($nIdNegocio, $nIdWidget, $nEstado);
                $this->prospecto->fncGrabarColumnaProspecto($sNombreDb, $nSize);
            } else {
                // Actualizar
                $aryWidget = $this->prospecto->fncGetWidgetProspectosById($nIdRegistro);
                $aryWidget = $aryWidget[0];
                $this->prospecto->fncActualizarWidgetProspecto($nIdRegistro, $sNombreDb, $sNombre, $sValores, $nTipoWidget, $nDefault, $nRequerido, $nEstado);
                $this->prospecto->fncActualizarColumnaProspecto($aryWidget['sNombre'], $sNombreDb, $nSize);
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Campo registrado exitosamente...' : 'Campo actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncMostrarWidget()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $aryData = $this->prospecto->fncGetWidgetProspectosById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncEliminarWidget()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncGetWidgetProspectosById($nIdRegistro);
            $aryData = $aryData[0];

            $this->prospecto->fncEliminarColumnaProspecto($aryData['sNombre']);
            $this->prospecto->fncEliminarWidgetProspecto($nIdRegistro);

            $this->json(array("success" => 'Campo eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarProspectoCatalogo()
    {
        try {
            $nIdRegistro       = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdProspecto      = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
            $nIdCatalogo       = isset($_POST['nIdCatalogo']) ? $_POST['nIdCatalogo'] : null;
            $nCantidad         = isset($_POST['nCantidad']) ? $_POST['nCantidad'] : null;
            $nPrecio           = isset($_POST['nPrecio']) ? $_POST['nPrecio'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdProspecto)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            if ($nIdRegistro == 0) {
                $this->prospecto->fncGrabarProspectoCatalogo($nIdProspecto, $nIdCatalogo, $nCantidad, $nPrecio);
            } else {
                $this->prospecto->fncActualizaProspectoCatalogo($nIdRegistro, $nIdProspecto, $nIdCatalogo, $nCantidad, $nPrecio);
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Producto o servicio registrado exitosamente...' : 'Producto o servicio actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetProspectoCatalogoByIdProspecto()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $aryData = $this->prospecto->fncGetProspectoCatalogoByIdProspecto($nIdRegistro);

            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEliminarProspectoCatalogo()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncEliminarProspectoCatalogo($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncActualizaProspectoSegmentacion()
    {
        $nIdProspectoSegmentacion   = isset($_POST['nIdProspectoSegmentacion']) ? $_POST['nIdProspectoSegmentacion'] : null;
        $nIdProspecto               = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
        $nIdSegmentacion            = isset($_POST['nIdSegmentacion']) ? $_POST['nIdSegmentacion'] : null;
        $nIdDetalleSegmentacion     = isset($_POST['nIdDetalleSegmentacion']) ? $_POST['nIdDetalleSegmentacion'] : null;

        try {
            $this->prospecto->fncActualizaProspectoSegmentacion($nIdProspectoSegmentacion, $nIdProspecto, $nIdSegmentacion, $nIdDetalleSegmentacion);
            $this->json(array("success" => 'Segmentacion actualizado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarProspectoActividad()
    {
        try {
            $nIdRegistro           = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdProspecto          = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
            $nIdEmpleado           = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
            $nTipoActividad        = isset($_POST['nTipoActividad']) ? $_POST['nTipoActividad'] : null;
            $nIdEstadoActividad    = isset($_POST['nIdEstadoActividad']) ? $_POST['nIdEstadoActividad'] : null;
            $sFechaActividad       = isset($_POST['sFechaActividad']) ? $_POST['sFechaActividad'] : null;
            $sHoraActividad        = isset($_POST['sHoraActividad']) ? $_POST['sHoraActividad'] : null;
            $sNota                 = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $sLatitud              = isset($_POST['sLatitud']) ? $_POST['sLatitud'] : null;
            $sLongitud             = isset($_POST['sLongitud']) ? $_POST['sLongitud'] : null;
            $nEstado               = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdProspecto)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $sCambio  = "";

            $sActividad = $this->fncGetVarConfig("nTipoActividadCita") == 1 ? "cita" : "";

            if ($nIdRegistro == 0) {
                $this->prospecto->fncGrabarProspectoActividad(
                    $nIdProspecto,
                    $nIdEmpleado,
                    $nTipoActividad,
                    $nIdEstadoActividad,
                    $sFechaActividad,
                    $sHoraActividad,
                    $sNota,
                    $sLatitud,
                    $sLongitud,
                    $nEstado
                );

                $sCambio = "Se agrego una nueva " .  $sActividad;
            } else {
                $this->prospecto->fncActualizaProspectoActividad(
                    $nIdRegistro,
                    $nIdProspecto,
                    $nIdEmpleado,
                    $nTipoActividad,
                    $nIdEstadoActividad,
                    $sFechaActividad,
                    $sHoraActividad,
                    $sNota,
                    $sLatitud,
                    $sLongitud,
                    $nEstado
                );

                $sCambio =  "Se actualizo una " .  $sActividad;
            }


            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdEmpleado, null, $sCambio, 1);

            // Validar 2 Citas Efectivas
            $bChangeEstado = false;
            $nIdEtapaNegociacion = $this->fncGetVarConfig("nIdEtapaNegociacion");
            $aryData = $this->prospecto->fncGetActividadesByProspecto($nIdProspecto, $nTipoActividad, $this->fncGetVarConfig("nIdEstadoActividadEjecutado"));
            // Si existen mas de dos citas efectivas se actualiza el estado de prospecto a negociacion
            if ($aryData["nCantidad"] >= 2) {
                $this->prospecto->fncActualizarEstadoProspecto($nIdProspecto, $nIdEtapaNegociacion);
                $this->fncGuardarCambioEtapa($nIdProspecto, $nIdEmpleado, $nIdEtapaNegociacion);
                $bChangeEstado = true;
            }
            // Fin de validacion

            $sSuccess =  $nIdRegistro == 0 ?  $sActividad . ' registrado exitosamente...' :  $sActividad . ' actualizado exitosamente...';

            $this->json(array("success" => $sSuccess, "nIdEtapaNegociacion" => $nIdEtapaNegociacion, "bChangeEstado" => $bChangeEstado));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEliminarProspectoActividad()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncEliminarProspectoActividad($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetProspectoNotaByIdProspecto()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncGetProspectoNotaByIdProspecto($nIdRegistro);
            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarProspectoNota()
    {
        try {
            $nIdRegistro           = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdProspecto          = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
            $nIdTipoEntidad        = isset($_POST['nIdTipoEntidad']) ? $_POST['nIdTipoEntidad'] : null;
            $nTipoEntidad          = isset($_POST['nTipoEntidad']) ? $_POST['nTipoEntidad'] : null;
            $sNota                 = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $nEstado               = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdProspecto)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $sCambio  = null;

            if ($nIdRegistro == 0) {

                $this->prospecto->fncGrabarProspectoNota(
                    $nIdProspecto,
                    $nIdTipoEntidad,
                    $nTipoEntidad,
                    $sNota,
                    $nEstado
                );

                $sCambio = "Se creo una nueva nota";
            } else {

                $this->prospecto->fncActualizaProspectoNota(
                    $nIdRegistro,
                    $nIdProspecto,
                    $nIdTipoEntidad,
                    $nTipoEntidad,
                    $sNota,
                    $nEstado
                );

                $sCambio = "Se actualizo una nota";
            }

            if ($this->fncGetVarConfig("nTipoEntidadNotaEmpleado") ==  $nIdTipoEntidad) {
                $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdTipoEntidad, null, $sCambio, 1);
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Nota registrado exitosamente...' : 'Nota actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEliminarProspectoNota()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncEliminarProspectoNota($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncActualizarControlExtra()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEmpleado = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $sWidget     = isset($_POST['sWidget']) ? $_POST['sWidget'] : null;
        $sCol        = isset($_POST['sCol']) ? $_POST['sCol'] : null;
        $sVal        = isset($_POST['sVal']) ? $_POST['sVal'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            if (!is_null($sWidget) && strlen($sWidget) > 0) {
                $sCambio = "Se hizo una actualizacion en el campo " . $sWidget;
                $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $nIdEmpleado, null, $sCambio, 1);
            }

            $this->prospecto->fncActualizarControlExtra($nIdRegistro, $sCol, $sVal);
            $this->json(array("success" => 'Item actualizado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetCambioProspectoByIdProspecto()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncGetCambioProspectoByIdProspecto($nIdRegistro);
            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarCambioProspecto()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEmpleado    = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $sCambio        = isset($_POST['sCambio']) ? $_POST['sCambio'] : null;
        $nEstado        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $nIdEmpleado, $nIdEtapa, $sCambio, $nEstado);;
            $this->json(array("success" => "Cambio agregado  correctamente."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncActualizarEstadoProspecto()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEmpleado    = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) && is_null($nIdEtapa)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            // Si es envio de propuesta
            $sLinkArchivo = "";
            $bSend = false;
            if ($nIdEtapa  == $this->fncGetVarConfig("nIdEtapaEnvioPropuesta")) {
                // $aryDataPropuesta = $this->fncEnviarPropuesta($nIdRegistro);
                // $sLinkArchivo   = $aryDataPropuesta["sLinkArchivo"];
                // $bSend          = $aryDataPropuesta["bSend"];
            }
            // Fin de envio de propuesta


            if ($nIdEtapa == $this->fncGetVarConfig("nIdEtapaCierre")) {

                /* Validaciones  */
                $aryNegocio             = $this->negocios->fncGetNegocioById($nIdNegocio);
                $nTipoProspectoCorto    = $this->fncGetVarConfig("nTipoProspectoCorto");
                $nTipoProspectoLargo    = $this->fncGetVarConfig("nTipoProspectoLargo");


                switch ($aryNegocio["nTipoProspecto"]) {
                    case $nTipoProspectoLargo:


                        // Para poder finalizar el prosepcto validamos que existan las dos citas efectivas y que se haya adjuntado el contrato
                        // Antes de validar primeros debemos verificar que exista el widget cita es decir que este activo

                        $nIdActividadesWidget = $this->fncGetVarConfig("nIdActividadesWidget");
                        $aryExistWidget       = $this->prospecto->fncExistWidgetInConfigProspecto($nIdNegocio, $nIdActividadesWidget, 1);

                        if (fncValidateArray($aryExistWidget)) {
                            $aryData = $this->prospecto->fncGetActividadesByProspecto(
                                $nIdRegistro,
                                $this->fncGetVarConfig("nTipoActividadCita"),
                                $this->fncGetVarConfig("nIdEstadoActividadEjecutado")
                            );

                            if ($aryData["nCantidad"] < 2) {
                                $this->exception("Error. Para poder finalizar el prospecto primero debe de tener las dos citas efectivas .Por favor verifique");
                            }
                        }

                        $aryContrato = $this->prospecto->fncObtenerAdjuntoContrato($nIdRegistro);

                        if (fncValidateArray($aryContrato) === false) {
                            $this->exception("Error. Para poder finalizar el prospecto primero debe de adjuntar el contrato .Por favor verifique");
                        }

                        break;
                    case $nTipoProspectoCorto:
                    default:
                        break;
                }

                /* Fin de Validaciones  */

                $this->prospecto->fncActualizarProspectonValidacionAdmin($nIdRegistro, 1);
                $sSucces = "Se actualizo el prospecto debe esperar la validacion del administrador";
            } else {
                $sSucces = "Actualizado estado del prospecto correctamente.";
                $this->prospecto->fncActualizarEstadoProspecto($nIdRegistro, $nIdEtapa);
                $this->fncGuardarCambioEtapa($nIdRegistro, $nIdEmpleado, $nIdEtapa);
            }

            $this->json(array("success" => $sSucces,  "sLinkArchivo" => $sLinkArchivo, "bSend" => $bSend));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEnviarPropuesta($nIdProspecto)
    {
        try {
            $aryDataProspecto        = $this->prospecto->fncGetProspectoById($nIdProspecto);
            $aryCliente              = ($this->clientes->fncGetClienteById($aryDataProspecto[0]["nIdCliente"]))[0];
            $aryNegocio              = $this->negocios->fncGetNegocioById($aryDataProspecto[0]["nIdNegocio"]);
            $aryDataProp             = $this->fncDrawPdfProspecto($nIdProspecto, false);
            $sLinkArchivo            = $aryDataProp["sLinkArchivo"];
            $sPathArchivo            = $aryDataProp["sPathArchivo"];


            if (strlen($aryCliente["sCorreo"]) > 0) {
                $mail = new Mail();

                $html = '
                <div>
                    <p>
                        <b><span style="font-size:14px;font-family:Arial">
                                Estimados señores: </span></b>
                        <span style="font-size:14px;font-family:Arial">' . $aryCliente["sNombreoRazonSocial"] . '</span>
                    </p>
                    <p>
                        <span style="font-size:14px;font-family:Arial">Por medio de la presente y de acuerdo a su
                            solicitud, sometemos a su consideración nuestra mejor oferta por el siguiente servicio / Producto a
                            brindar.</span>
                    </p>
                    <p>
                       <span style="font-size:14px;font-family:Arial">Sin otro particular y en espera de su
                        aceptación a la presente, quedamos a su disposición para cualquier consulta que ustedes estimen
                        conveniente.</span>
                    </p>
                    <p>
                
                        <span style="font-size:14px">Para visualizar su propuesta economica &nbsp; ingrese al siguiente
                        </span><b style="font-family:Arial;font-size:14px"><a href="' . $sLinkArchivo . '">link</a></b>
                    </p>
                    <p>
                        <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                    </p>
                </div>';

                if ($mail->send(['sFrom' => uc($aryNegocio["sNombre"]), 'subject' => 'Envio de propuesta', 'body' => $html, 'sCorreo' => $aryCliente["sCorreo"], 'sNombre' => $aryCliente["sNombreoRazonSocial"], 'sLinkArchivo' => $sPathArchivo])) {
                    return ["sLinkArchivo" => $sLinkArchivo, "bSend" => true];
                } else {
                    return ["sLinkArchivo" => $sLinkArchivo, "bSend" => false];
                }
            } else {
                return ["sLinkArchivo" => $sLinkArchivo, "bSend" => false];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncDownloadPropuesta($nIdProspecto)
    {
        try {
            $this->fncDrawPdfProspecto($nIdProspecto, true);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncDrawPdfProspecto($nIdProspecto, $bDownload = false)
    {
        try {
            $aryDataProspecto        = $this->prospecto->fncGetProspectoById($nIdProspecto);

            if ($aryDataProspecto[0]["nIdCliente"] == 0) {
                $this->exception("Error.No se puede enviar una propuesta si al prospecto no se le ha asignado un cliente .Porfavor verifique y vuelva a intentarlo");
            }

            $aryDataProspectoDetalle = $this->prospecto->fncGetProspectoCatalogoByIdProspecto($nIdProspecto);
            $aryNegocio              = $this->negocios->fncGetNegocioById($aryDataProspecto[0]["nIdNegocio"]);
            $aryCliente              = $this->clientes->fncGetClienteById($aryDataProspecto[0]["nIdCliente"]);


            $aryData   = [
                "sTitulo"           => "Propuesta",
                "nIdProspecto"      => $nIdProspecto
            ];

            ob_start();

            $this->view("empleado/cotizacion-pdf", [
                "aryDataProspecto"          => $aryDataProspecto[0],
                "aryCliente"                => $aryCliente[0],
                "aryDataProspectoDetalle"   => $aryDataProspectoDetalle,
                "aryNegocio"                => $aryNegocio,
                "aryData"                   => $aryData,
            ]);

            $html = ob_get_contents();
            ob_end_clean();


            $sNameFile      = "CTZ_" . sp($nIdProspecto) . ".pdf";
            $sPathArchivo   = ROOTPATHRESOURCE . "docs/" . $sNameFile;
            $sLinkArchivo   = WEB_ROOT_RESOURCE . "docs/" . $sNameFile;


            $mpdf = new Mpdf();
            $mpdf->curlAllowUnsafeSslRequests = true;
            $mpdf->showImageErrors = true;
            $mpdf->WriteHTML($html);

            if ($bDownload) {
                $mpdf->Output($sNameFile, 'D');
                return true;
            } else {
                $mpdf->Output($sPathArchivo);

                return [
                    "sLinkArchivo" => $sLinkArchivo,
                    "sPathArchivo" => $sPathArchivo,
                ];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarProspectoAdjunto()
    {
        try {
            $nIdRegistro          = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdProspecto         = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
            $nIdAdjuntoContrato   = isset($_POST['nIdAdjuntoContrato']) ? $_POST['nIdAdjuntoContrato'] : null;
            $sContrato            = isset($_FILES['sContrato']) ? $_FILES['sContrato'] : null;
            $aryOtros             = isset($_FILES['aryOtros']) ? $_FILES['aryOtros'] : null;
            $nIdEmpleado          = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;


            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            if (fncValidateArray($aryOtros)) {
                $aryOtros = reArrayFiles($aryOtros);
            }

            $bChangeEstado = false;

            $sCustomName = "_PRT" . $nIdProspecto;

            if ($nIdRegistro == 0) {
                // Crear

                if (isset($sContrato) && !is_null($sContrato)) {
                    $aryDataProspecto      = $this->prospecto->fncGetNegocioByIdProspecto($nIdProspecto);
                    $nIdActividadesWidget  = $this->fncGetVarConfig("nIdActividadesWidget");
                    if (fncValidateArray($aryDataProspecto)) {
                        $aryExistWidget       = $this->prospecto->fncExistWidgetInConfigProspecto($aryDataProspecto["nIdNegocio"], $nIdActividadesWidget, 1);

                        // Si existe el widget actividad valida que las dos citas sean efectivas
                        if (fncValidateArray($aryExistWidget)) {
                            // Validar 2 Citas Efectivas
                            $nTipoActividadCita   = $this->fncGetVarConfig("nTipoActividadCita");
                            $aryData              = $this->prospecto->fncGetActividadesByProspecto($nIdProspecto, $nTipoActividadCita, $this->fncGetVarConfig("nIdEstadoActividadEjecutado"));

                            // Si existen mas de dos citas efectivas se actualiza el estado de prospecto a negociacion
                            if ($aryData["nCantidad"] < 2) {
                                $this->exception("Error. No existen dos citas efectivas para que ud pueda adjuntar el contrato , recuerde que para adjuntar el contrato primero debe de realizar dos citas efectivas. Porfavor verifique");
                            }
                        }
                    } else {
                        $this->exception('Error. No existe el prospecto o se ha eliminado. Por favor verifique o solicite asistencia.');
                    }
                    // Fin de validacion


                    $bChangeEstado   = true;
                    $sNombreContrato = Upload::fncProccesCustomName($sContrato, 'docs', $sCustomName);
                    $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreContrato, 1);
                }

                if (fncValidateArray($aryOtros)) {
                    foreach ($aryOtros as $aryOtro) {
                        $sNombreArchivo = Upload::fncProccesCustomName($aryOtro, 'docs', $sCustomName);
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreArchivo, 0);
                    }
                }
            } else {

                // Actualizar
                if (isset($sContrato) && !is_null($sContrato)) {
                    $bChangeEstado = true;

                    if ($nIdAdjuntoContrato > 0) {
                        $aryDataContrato = $this->prospecto->fncObtenerProspectoAdjunto($nIdAdjuntoContrato);

                        if (fncValidateArray($aryDataContrato)) {
                            fncEliminarArchivo(ROOTPATHRESOURCE . 'docs/' . $aryDataContrato["sNombreArchivo"]);
                        }

                        // Si existe un adjunto
                        $sNombreContrato = Upload::fncProccesCustomName($sContrato, 'docs', $sCustomName);

                        $this->prospecto->fncActualizaProspectoAdjunto($nIdAdjuntoContrato, $nIdProspecto, $sNombreContrato, 1);
                    } else {

                        // Si no existe pero se va a editar
                        $sNombreContrato = Upload::fncProccesCustomName($sContrato, 'docs', $sCustomName);
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreContrato, 1);
                    }
                }

                if (fncValidateArray($aryOtros)) {
                    foreach ($aryOtros as $aryOtro) {
                        $sNombreArchivo = Upload::fncProccesCustomName($aryOtro, 'docs', $sCustomName);
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreArchivo, 0);
                    }
                }
            }

            $nIdEtapaEnProceso = $this->fncGetVarConfig("nIdEtapaEnProceso");

            if ($bChangeEstado) {
                $this->prospecto->fncActualizarEstadoProspecto($nIdProspecto, $nIdEtapaEnProceso);
                $this->fncGuardarCambioEtapa($nIdProspecto, $nIdEmpleado, $nIdEtapaEnProceso);
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Adjuntos registrado exitosamente...' : 'Adjuntos actualizado exitosamente...';
            $this->json(array("success" => $sSuccess, "nIdEtapaEnProceso" => $nIdEtapaEnProceso, "bChangeEstado" => $bChangeEstado));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncGuardarCambioEtapa($nIdProspecto, $nIdEmpleado, $nIdEtapa)
    {
        try {
            $aryEtapa = $this->prospecto->fncObtenerEtapaProspectoById($nIdEtapa);

            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdEmpleado, $nIdEtapa, "Se cambio de etapa a " . $aryEtapa["sNombre"], 1);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncEliminarProspectoAdjunto()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncObtenerProspectoAdjunto($nIdRegistro);

            // Eliminar la imagen
            if (!empty($aryData['sNombreArchivo'])) {
                fncEliminarArchivo(ROOTPATHRESOURCE . "/docs/" . $aryData['sNombreArchivo']);
            }

            $bChangeEstado = false;

            // En caso se elimine el contrato el prospecto debe de volver a la etapa anterior que este caso es negociacion
            if ($aryData["nContrato"] == '1') {
                $this->prospecto->fncActualizarEstadoProspecto($aryData["nIdProspecto"], $this->fncGetVarConfig("nIdEtapaNegociacion"));
                $bChangeEstado = true;
            }


            $this->prospecto->fncEliminarProspectoAdjunto($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.', 'bChangeEstado' => $bChangeEstado));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncObtenerProspectoAdjuntosByIdProspecto()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncObtenerProspectoAdjuntosByIdProspecto($nIdRegistro);
            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncActualizarEstadoCambiosProspecto()
    {
        $aryIds     = isset($_POST['aryIds']) ? $_POST['aryIds'] : null;
        $nEstado    = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($aryIds)) {
                $this->exception('Error. No se a enviados los ids de los cambios. Por favor verifique.');
            }


            if (fncValidateArray($aryIds)) {
                foreach ($aryIds as $nIdCambio) {
                    $this->prospecto->fncActualizarEstadoCambiosProspecto($nIdCambio, $nEstado);
                }
            }

            $this->json(array("success" => "Actualizado cambios correctamente",));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncTerminarProspecto()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) && is_null($nIdEtapa)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncActualizarCierreProspecto($nIdRegistro);
            $this->prospecto->fncActualizarEstadoProspecto($nIdRegistro, $nIdEtapa);
            $this->fncGuardarCambioEtapa($nIdRegistro, null, $nIdEtapa);
            $this->json(array("success" => "Genial ! . Se termino el prospecto de forma correcta"));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncPopulateHistorialCliente()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdCliente     = isset($_POST['nIdCliente']) ? $_POST['nIdCliente'] : null;

        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdCliente)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll($nIdNegocio, null, null, null, null, null, $nIdCliente);

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $nKey => $aryProspecto) {
                    $aryEmpleado =  ($this->empleado->fncGetEmpleados(null, $nIdNegocio, $aryProspecto["nIdEmpleado"]));
                    $aryEmpleado =   fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];

                    // Totales del prospecto
                    $aryCatalogo = $this->prospecto->fncGetAryProspectoCatalogo($aryProspecto["nIdProspecto"], SIMBOLO_MONEDA);

                    if (fncValidateArray($aryCatalogo)) {
                        $aryCatalogo = $aryCatalogo[0];
                    }

                    $aryData[] = [
                        "nItem"                  => sp($nKey + 1, 4),
                        "sCliente"               => $aryProspecto["sCliente"],
                        "sEmpleado"              => $aryProspecto["sEmpleado"],
                        "sNombreEtapa"           => $aryProspecto["sNombreEtapa"],
                        "nTotal"                 => $aryCatalogo["nTotal"],
                        "dFechaCreacion"         => $aryProspecto["dFechaCreacion"],
                        "dFechaHoraUltimoAcceso" => $aryProspecto["dFechaHoraUltimoAcceso"],
                    ];
                }
            }

            $this->json(array("success" => "Mostrando resultados..", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncIndicativosHoy()
    {
        try {
            $nIdNegocio       = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdEmpleado      = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
            $sBuscador        = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
            $nIdSupervisor    = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;

            $nCantidadCitasHoy = 0;
            $nCierreHoy        = 0;
            $nRentaBasica      = 0;
            $nAvance           = 0;

            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                $nIdEmpleado,
                $sBuscador,
                null,
                $this->fncGetVarConfig("nIdEtapaCierre"),
                $nIdSupervisor,
                null,
                null,
                null,
                date("d/m/Y")
            );


            $nCierreHoy  = count($aryProspectos);

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {

                    // Si es un prospecto combinado es decir que existen productos y servicios solo se suma los prospectos
                    $aryDetalleCatalogo = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"]);

                    if (fncValidateArray($aryDetalleCatalogo)) {
                        $nAvance      +=  $aryDetalleCatalogo["nCantidad"];
                        $nRentaBasica +=  $aryDetalleCatalogo["nTotal"];
                    }
                }
            }


            $aryCitas  = $this->prospecto->fncGetActividadesByProspecto(
                null,
                $this->fncGetVarConfig("nTipoActividadCita"),
                $this->fncGetVarConfig("nIdEstadoActividadPendiente"),
                $nIdEmpleado,
                date("d/m/Y"),
                $nIdNegocio,
                $nIdSupervisor
            );

            $nCantidadCitasHoy = $aryCitas["nCantidad"];

            $aryProspectosHoy  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                $nIdEmpleado,
                $sBuscador,
                null,
                null,
                $nIdSupervisor,
                null,
                null,
                date("d/m/Y")
            );

            $aryEmpleadosHoy = [];
            if (fncValidateArray($aryProspectosHoy)) {
                foreach ($aryProspectosHoy as $aryLoop) {
                    array_push($aryEmpleadosHoy, $aryLoop["nIdEmpleado"]);
                }
            }

            $aryEmpleadosHoy = array_unique($aryEmpleadosHoy);

            $aryData = [
                "nCierreHoy"            => $nCierreHoy,
                "nCantidadCitasHoy"     => $nCantidadCitasHoy,
                "nAvance"               => $nAvance,
                "nRentaBasica"          => SIMBOLO_MONEDA . nf($nRentaBasica),
                "nProspectosHoy"        => count($aryProspectosHoy),
                "nCantidadEmpleadosHoy" => count($aryEmpleadosHoy)
            ];

            $this->json(array("success" => "Mostrando resultados..", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetActividadesNoCumplidas()
    {
        try {
            $nIdEmpleado  = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;

            // Valida valores del formulario
            if (is_null($nIdEmpleado)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $nIdEtapaRechazado  = $this->fncGetVarConfig("nIdEtapaRechazado");
            $nIdEtapaCierre     = $this->fncGetVarConfig("nIdEtapaCierre");
            $aryEtapasNot       = [$nIdEtapaRechazado, $nIdEtapaCierre];
            $sEtapasNot         = implode(",", $aryEtapasNot); // Vamos A validar todas los prospectos que no esten en cierre o rechazado

            $aryCitas = $this->prospecto->fncGetProspectoActividadByIdProspecto(
                null,
                $this->fncGetVarConfig("nTipoActividadCita"),
                $this->fncGetVarConfig("nIdEstadoActividadPendiente"),
                $nIdEmpleado,
                null,
                null,
                $sEtapasNot
            );

            $nCantidadActividad  = 0;
            $bExistenNoCumplidas = false;
            $sDetalle            = "";

            if (fncValidateArray($aryCitas)) {
                foreach ($aryCitas as $aryCita) {
                    $sColor = $this->fncObtenerColor($aryCita["sEstadoActividadCorta"], $aryCita["dtFechaEjecucion"]);
                    if ($sColor == 'rojo') {
                        $nCantidadActividad++;
                        $bExistenNoCumplidas = true;
                        $sDetalle .= "<b>Prospecto</b> " . sp($aryCita["nIdProspecto"]) . " - " . " <b>Cliente</b> " . $aryCita["sCliente"] . "</br>";
                    }
                }
            }

            $aryData = [
                "bExistenNoCumplidas" => $bExistenNoCumplidas,
                "sDetalle"            => $sDetalle,
                "nCantidadActividad"  => $nCantidadActividad
            ];

            $this->json(array("success" => "Mostrando resultados..", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetIndicativosGeneral()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdEmpleado          = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $sBuscador            = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
        $sFiltro              = isset($_POST['sFiltro']) ? $_POST['sFiltro'] : null;
        $nValidacionAdmin     = isset($_POST['nValidacionAdmin']) ? $_POST['nValidacionAdmin'] : null;
        $nIdEtapa             = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $nIdSupervisor        = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;
        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;

        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                $nIdEmpleado,
                $sBuscador,
                null,
                null,
                $nIdSupervisor,
                null,
                null,
                null,
                null,
                $dDesde,
                $dHasta
            );



            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;
            $nOportunidad   = 0;

            $aryIdEmpleados = [];
            $aryIdClientes  = [];


            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    array_push($aryIdEmpleados, $aryProspecto["nIdEmpleado"]);
                    array_push($aryIdClientes, $aryProspecto["nIdCliente"]);

                    // Si es un prospecto combinado es decir que existen productos y servicios solo se suma los prospectos
                    $aryDetalleCatalogo = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"]);

                    if (fncValidateArray($aryDetalleCatalogo)) {
                        $nAvance      += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nCantidad"] : 0;
                        $nRentaBasica += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nTotal"] : 0;
                        $nTotal       += $aryDetalleCatalogo["nTotal"];
                    }

                    if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $nOportunidad++;
                    }
                }
            }



            $aryIdEmpleados  = array_unique($aryIdEmpleados);
            $aryIdClientes   = array_unique($aryIdClientes);

            $nCantidadEmpleadosDentroRango = count($aryIdEmpleados);
            $nCantidadClientesDentroRango  = count($aryIdClientes);
            $nTotalCantidadProspectos      = count($aryProspectos);

            $nProductividadUnidades  = $nCantidadEmpleadosDentroRango > 0 ?  $nAvance / $nCantidadEmpleadosDentroRango : 0;
            $nProductividadMonto     = $nCantidadEmpleadosDentroRango > 0 ?  $nRentaBasica / $nCantidadEmpleadosDentroRango : 0;
            $nTasaCliente            = $nTotalCantidadProspectos > 0 ?  round($nCantidadClientesDentroRango / $nTotalCantidadProspectos) : 0;

            $sProductividad          = intval($nProductividadUnidades) . " - " .  SIMBOLO_MONEDA .  nf($nProductividadMonto);


            // Nueva formula de efectividad Cantidad de prospectos del 100% / entre la cantidad prospecto
            $nTipoEmpleadoAsesorVentas   = $this->fncGetVarConfig("nTipoEmpleadoAsesorVentas");
            $aryEmpleadosActivos         = $this->empleado->fncGetEmpleadosAll($nTipoEmpleadoAsesorVentas, $nIdNegocio, $nIdEmpleado, 1, null, null, $nIdSupervisor);

            $aryData = [
                "nAvance"                   => $nAvance,
                "nRentaBasica"              => SIMBOLO_MONEDA . nf($nRentaBasica),
                "nCompra"                   => SIMBOLO_MONEDA . ($nTotalCierre > 0 ?  nf($nRentaBasica / $nTotalCierre) : 0),
                "nTicket"                   => $nAvance > 0 ? SIMBOLO_MONEDA . nf($nRentaBasica / $nAvance) : 0,
                "nEfectividad"              => $nTotalCantidadProspectos > 0 ? ((round(($nTotalCierre / $nTotalCantidadProspectos) * 100)) . "%")  : 0,
                "nTotalCierre"              => $nTotalCierre,
                "nOportunidad"              => $nOportunidad,
                "nTotal"                    => $nTotal,
                "nTotalCantidadProspectos"  => $nTotalCantidadProspectos,
                "sProductividad"            => $sProductividad,
                "nTasaCliente"              => $nTasaCliente,
                "nEmpleadosActivos"         => count($aryEmpleadosActivos)
            ];

            $this->json(array("success" => "Mostrando resultados..", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncObtenerCambiosForAdmin()
    {
        $nIdNegocio  = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;


        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryData  = $this->prospecto->fncObtenerCambiosForAdmin($nIdNegocio, 1);


            $this->json(array("success" => "Mostrando resultados..", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    //  Esta funcion no elimina el prospecto solo lo regresa a la etapa  pendiente
    public function fncEliminarProspectoCerrado()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) && is_null($nIdEtapa)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncEliminarProspectoCerrado($nIdRegistro, $nIdEtapa);
            $this->json(array("success" => "Se elimino el prospecto del reporte de ventas.."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetReporteProspectos()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nTipoItem            = isset($_POST['nTipoItem']) ? $_POST['nTipoItem'] : null;
        $arySupervisor        = isset($_POST['arySupervisor']) ? $_POST['arySupervisor'] : null;
        $aryAsesor            = isset($_POST['aryAsesor']) ? $_POST['aryAsesor'] : null;
        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;

        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos    = [];

            $aryProspectos = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                null,
                null,
                null,
                null,
                null,
                null,
                $nTipoItem,
                null,
                null,
                $dDesde,
                $dHasta,
                $arySupervisor,
                $aryAsesor
            );
            // solo vendo un servicios producto o sevicioo
            // unidades : cantidad de productos o servicios

            $nAvance                = 0;
            $nRentaBasica           = 0;
            $nTotal                 = 0;
            $nTotalCierre           = 0;
            $nOportunidad           = 0;

            $nCantidadProspectos    = 0;

            $nIdEtapaRechazado         = $this->fncGetVarConfig("nIdEtapaRechazado");
            $nIdEtapaProgramada        = $this->fncGetVarConfig("nIdEtapaProgramada");
            $nIdEtapaEnvioPropuesta    = $this->fncGetVarConfig("nIdEtapaEnvioPropuesta");
            $nIdEtapaNegociacion       = $this->fncGetVarConfig("nIdEtapaNegociacion");
            $nIdEtapaEnProceso         = $this->fncGetVarConfig("nIdEtapaEnProceso");
            $nIdEtapaCierre            = $this->fncGetVarConfig("nIdEtapaCierre");



            $nCantidadProspectoOppActivo = 0;
            $nUnidadesProspectoOppActivo = 0;
            $nTotalProspectoOppActivo    = 0;

            $aryIdEmpleados = [];
            $aryIdClientes  = [];


            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {
                    $aryDetalle = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"], $nTipoItem);

                    array_push($aryIdEmpleados, $aryProspecto["nIdEmpleado"]);
                    array_push($aryIdClientes, $aryProspecto["nIdCliente"]);

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    $nAvance       += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalle["nCantidad"] : 0;
                    $nRentaBasica  += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalle["nTotal"] : 0;
                    $nTotal        += $aryDetalle["nTotal"];


                    // Oportunidad Activa

                    if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $nCantidadProspectoOppActivo++;

                        $nUnidadesProspectoOppActivo  += $aryDetalle["nCantidad"];
                        $nTotalProspectoOppActivo     += $aryDetalle["nTotal"];
                    }

                    // End  Oportunidad Activa
                }
            }

            $aryIdEmpleados  = array_unique($aryIdEmpleados);
            $aryIdClientes   = array_unique($aryIdClientes);

            $nCantidadEmpleadosDentroRango = count($aryIdEmpleados);
            $nCantidadClientesDentroRango  = count($aryIdClientes);
            $nTotalCantidadProspectos      = count($aryProspectos);

            $dDesdeFormat  = date("Y-m-d", strtotime(str_replace('/', '-', $dDesde)));
            $dHastaFormat  = date("Y-m-d", strtotime(str_replace('/', '-', $dHasta)));

            $dDesdeFormat = new DateTime($dDesdeFormat);
            $dHastaFormat = new DateTime($dHastaFormat);

            $objDiff            = $dDesdeFormat->diff($dHastaFormat);
            $nDiferenciasDias   = $objDiff->days;
            $nDiferenciasDias   = $nDiferenciasDias <= 0 ? 1 : $nDiferenciasDias;


            $nProspeccionPromedio = $nCantidadEmpleadosDentroRango > 0 ? ($nTotalCantidadProspectos / $nCantidadEmpleadosDentroRango) / $nDiferenciasDias  : 0;


            $nCompraUnidades = $nTotalCierre > 0 ? $nAvance / $nTotalCierre  : 0;
            $nCompraMonto    = $nTotalCierre > 0 ? SIMBOLO_MONEDA . nf($nRentaBasica / $nTotalCierre)  : 0;

            $nProductividadUnidades  = $nCantidadEmpleadosDentroRango > 0 ?  $nAvance / $nCantidadEmpleadosDentroRango : 0;
            $nProductividadMonto     = $nCantidadEmpleadosDentroRango > 0 ?  $nRentaBasica / $nCantidadEmpleadosDentroRango : 0;
            $nTasaCliente            = $nTotalCantidadProspectos > 0 ?  $nCantidadClientesDentroRango / $nTotalCantidadProspectos : 0;


            $sAvance                        = $nAvance . " Unidades " . " - " .  SIMBOLO_MONEDA . nf($nRentaBasica);
            $sTicket                        = $nAvance > 0 ? SIMBOLO_MONEDA . nf($nRentaBasica / $nAvance) : 0;
            $sCompra                        = intval($nCompraUnidades) .  (intval($nCompraUnidades) == 1  ? " Unidad " : "Unidades") . " - " . $nCompraMonto;
            $sProspeccionPromedio           = intval(round($nProspeccionPromedio, 2));
            $sCantidadOppActiva             = intval($nCantidadProspectoOppActivo) . " Prospectos ";
            $sOppActiva                     = $nUnidadesProspectoOppActivo . " Unidades " . " - "  . ($nTotalProspectoOppActivo > 0 ? SIMBOLO_MONEDA . nf($nTotalProspectoOppActivo) : 0);
            $sProductividad                 = intval($nProductividadUnidades) . " - " .  SIMBOLO_MONEDA .  nf($nProductividadMonto);
            $sTasaCliente                   = intval($nTasaCliente);

            $aryIndicativos  = [
                "sAvance"               => $sAvance,
                "sTicket"               => $sTicket,
                "sCompra"               => $sCompra,
                "sProspeccionPromedio"  => $sProspeccionPromedio,
                "sCantidadOppActiva"    => $sCantidadOppActiva,
                "sOppActiva"            => $sOppActiva,
                "sProductividad"        => $sProductividad,
                "sTasaCliente"          => $sTasaCliente,
            ];



            // Catalogo por cliente

            $nTipoItemCatalogoProducto = $this->fncGetVarConfig("nTipoItemCatalogoProducto");
            $nTipoItemCatalogoServicio = $this->fncGetVarConfig("nTipoItemCatalogoServicio");
            $nTipoClienteEmpresa       = $this->fncGetVarConfig("nTipoClienteEmpresa");
            $nTipoClientePersona       = $this->fncGetVarConfig("nTipoClientePersona");

            $aryDataCatalogoEmpresaProducto  = [];
            $aryDataCatalogoPersonaProducto  = [];
            $aryDataCatalogoEmpresaServicio  = [];
            $aryDataCatalogoPersonaServicio  = [];


            if ($nTipoItem == $nTipoItemCatalogoProducto) {
                $aryDataCatalogoEmpresaProducto = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClienteEmpresa, $nTipoItem, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);

                $aryDataCatalogoPersonaProducto = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClientePersona, $nTipoItem, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);
            } elseif ($nTipoItem == $nTipoItemCatalogoServicio) {
                $aryDataCatalogoEmpresaServicio  = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClienteEmpresa, $nTipoItem, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);

                $aryDataCatalogoPersonaServicio  = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClientePersona, $nTipoItem, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);
            } else {
                $aryDataCatalogoEmpresaProducto = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClienteEmpresa, $nTipoItemCatalogoProducto, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);

                $aryDataCatalogoPersonaProducto = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClientePersona, $nTipoItemCatalogoProducto, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);

                $aryDataCatalogoEmpresaServicio = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClienteEmpresa, $nTipoItemCatalogoServicio, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);

                $aryDataCatalogoPersonaServicio = $this->prospecto->fncGetDataForReportClienteCatalogo($nIdNegocio, $nTipoClientePersona, $nTipoItemCatalogoServicio, $arySupervisor, $aryAsesor, $dDesde, $dHasta, $nIdEtapaCierre);
            }

            $aryDataCatalogoReport = [
                "aryDataCatalogoEmpresaProducto" => $aryDataCatalogoEmpresaProducto,
                "aryDataCatalogoPersonaProducto" => $aryDataCatalogoPersonaProducto,
                "aryDataCatalogoEmpresaServicio" => $aryDataCatalogoEmpresaServicio,
                "aryDataCatalogoPersonaServicio" => $aryDataCatalogoPersonaServicio,
            ];

            // End Catalogo por cliente


            // Productividad

            // First day of the month.
            $dDesdeRango = is_null($dDesde) || empty($dDesde) ? null : date('01/m/Y', strtotime(str_replace('/', '-', $dDesde)));

            // Last day of the month.
            $dHastaRango = is_null($dHasta) || empty($dHasta) ? null  : date('t/m/Y', strtotime(str_replace('/', '-', $dHasta)));



            $aryProspectosForProductividad = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                null,
                null,
                null,
                null,
                null,
                null,
                $nTipoItem,
                null,
                null,
                $dDesdeRango,
                $dHastaRango,
                $arySupervisor,
                $aryAsesor,
                null,
                " p.dFechaCreacion ASC  "
            );


            $aryDataProductividadMes = [];

            if (fncValidateArray($aryProspectosForProductividad)) {
                foreach ($aryProspectosForProductividad as $aryProspecto) {
                    $sNamekey = fncGetNameMesById($aryProspecto["sMes"]) . " " . $aryProspecto["sAnio"];

                    $aryDetalle = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"], $nTipoItem);


                    if (!isset($aryDataProductividadMes[$sNamekey])) {
                        // Si no existe inizializamos con creamos el arreglo en vacio
                        $aryDataProductividadMes[$sNamekey] = [
                            "nMonto"        => 0,
                            "nUnidades"     => 0,
                            "aryEmpleados"  => []
                        ];
                    }

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $aryDataProductividadMes[$sNamekey]['nMonto'] += $aryDetalle["nTotal"];

                        $aryDataProductividadMes[$sNamekey]['nUnidades'] += $aryDetalle["nCantidad"];

                        $aryDataProductividadMes[$sNamekey]['aryEmpleados'][] = $aryProspecto["nIdEmpleado"];

                        $aryDataProductividadMes[$sNamekey]['aryEmpleados'] = array_unique($aryDataProductividadMes[$sNamekey]['aryEmpleados']);
                    }
                }
            }


            $aryNewProductividadMes = [];

            if (fncValidateArray($aryDataProductividadMes)) {
                foreach ($aryDataProductividadMes as $sKey => $aryLoop) {
                    $nCantidadEmpleados = count($aryLoop["aryEmpleados"]);

                    $nProductividadUnidades = $nCantidadEmpleados > 0 ? $aryLoop["nUnidades"] / $nCantidadEmpleados  : 0;
                    $nProductividadMonto    = $nCantidadEmpleados > 0 ? nf($aryLoop["nMonto"] / $nCantidadEmpleados) : 0;

                    $aryNewProductividadMes[] = [
                        "sMes"                   => $sKey,
                        "nProductividadUnidades" => $nProductividadUnidades,
                        "nProductividadMonto"    => $nProductividadMonto,
                    ];
                }
            }

            // End Productividad

            // Report para catalogo por meses
            $aryDataReporteCatalogo = $this->prospecto->fncGetDataForReportCatalogo(
                $nIdNegocio,
                $nTipoItem,
                $arySupervisor,
                $aryAsesor,
                $dDesdeRango,
                $dHastaRango,
                $nIdEtapaCierre
            );

            $aryNewDataReporteCatalogo  = [];
            $aryMesesReporteCatalogo    = [];
            $aryDataSetReporteCatalogo  = [];

            if (fncValidateArray($aryDataReporteCatalogo)) {
                foreach ($aryDataReporteCatalogo as $aryLoop) {
                    $sNamekey = $aryLoop["nIdCatalogo"];
                    $sMes     = fncGetNameMesById($aryLoop["sIdMes"]) . " " . $aryLoop["sAnio"];

                    $aryMesesReporteCatalogo[] = $sMes;

                    if (!isset($aryDataSetReporteCatalogo[$sNamekey])) {
                        // Si no existe inizializamos con creamos el arreglo en vacio
                        $aryDataSetReporteCatalogo[$sNamekey] = [
                            "aryCantidad"  => [],
                            "sCatalogo"   => ""
                        ];
                    }

                    $aryDataSetReporteCatalogo[$sNamekey]["aryCantidad"][] = intval($aryLoop["nCantidad"]);
                    $aryDataSetReporteCatalogo[$sNamekey]["sCatalogo"]     = $aryLoop["sCatalogo"];
                }
            }

            $aryMesesReporteCatalogo = array_values(array_unique($aryMesesReporteCatalogo));

            $aryNewDataReporteCatalogo = [
                "aryMesesReporteCatalogo"    => $aryMesesReporteCatalogo,
                "aryDataSetReporteCatalogo"  => $aryDataSetReporteCatalogo
            ];


            // End Report para catalogo por meses


            // Report para venta por tipo de cliente por meses

            $aryDataReporteCliente = $this->prospecto->fncGetDataForReportCliente(
                $nIdNegocio,
                $nTipoItem,
                $arySupervisor,
                $aryAsesor,
                $dDesdeRango,
                $dHastaRango,
                $nIdEtapaCierre
            );

            $aryNewDataReporteCliente  = [];
            $aryMesesReporteCliente    = [];
            $aryDataSetReporteCliente  = [];

            if (fncValidateArray($aryDataReporteCliente)) {
                foreach ($aryDataReporteCliente as $aryLoop) {
                    $sNamekey = $aryLoop["nTipoCliente"];
                    $sMes     = fncGetNameMesById($aryLoop["sIdMes"]) . " " . $aryLoop["sAnio"];

                    $aryMesesReporteCliente[] = $sMes;

                    $sTipoCliente = $aryLoop["nTipoCliente"] == $nTipoClienteEmpresa ? 'EMPRESA' : 'PERSONA';

                    if (!isset($aryDataSetReporteCliente[$sNamekey])) {
                        // Si no existe inizializamos con creamos el arreglo en vacio
                        $aryDataSetReporteCliente[$sNamekey] = [
                            "aryCantidad"   => [],
                            "sTipoCliente"  => ""
                        ];
                    }

                    $aryDataSetReporteCliente[$sNamekey]["aryCantidad"][] = intval($aryLoop["nCantidad"]);
                    $aryDataSetReporteCliente[$sNamekey]["sTipoCliente"]  = $sTipoCliente;
                }
            }

            $aryMesesReporteCliente = array_values(array_unique($aryMesesReporteCliente));

            $aryNewDataReporteCliente = [
                "aryMesesReporteCliente"    => $aryMesesReporteCliente,
                "aryDataSetReporteCliente"  => $aryDataSetReporteCliente
            ];

            // Report para venta




            $aryData = [
                "aryIndicativos"            => $aryIndicativos,
                "aryDataCatalogoReport"     => $aryDataCatalogoReport,
                "aryNewProductividadMes"    => $aryNewProductividadMes,
                "aryNewDataReporteCatalogo" => $aryNewDataReporteCatalogo,
                "aryNewDataReporteCliente"  => $aryNewDataReporteCliente,
            ];



            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetReporteAsesor()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nTipoItem            = isset($_POST['nTipoItem']) ? $_POST['nTipoItem'] : null;
        $arySupervisor        = isset($_POST['arySupervisor']) ? $_POST['arySupervisor'] : null;
        $aryAsesor            = isset($_POST['aryAsesor']) ? $_POST['aryAsesor'] : null;
        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;

        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryProspectos    = [];

            $aryProspectos = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                null,
                null,
                null,
                null,
                null,
                null,
                $nTipoItem,
                null,
                null,
                $dDesde,
                $dHasta,
                $arySupervisor,
                $aryAsesor
            );


            $aryEmpleados  = [];
            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryLoop) {
                    $aryEmpleados[] = $aryLoop["nIdEmpleado"];
                }
            }


            $aryEmpleados = array_unique($aryEmpleados);

            $aryRows = [];
            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryEmpleados)) {
                foreach ($aryEmpleados as $nKey => $nIdEmpleado) {


                    $nAvance                     = 0;
                    $nRentaBasica                = 0;
                    $nTotalCierre                = 0;
                    $nCantidadProspectoOppActivo = 0;
                    $nTotal                      = 0;

                    $aryProspectosEmpleado  = $this->prospecto->fncGetProspectoAll(
                        $nIdNegocio,
                        $nIdEmpleado,
                        null,
                        null,
                        null,
                        null,
                        null,
                        $nTipoItem,
                        null,
                        null,
                        $dDesde,
                        $dHasta,
                        $arySupervisor,
                        $aryAsesor
                    );

                    $aryEmpleado = $this->empleado->fncObtenerDatosBasicos($nIdEmpleado);

                    if (fncValidateArray($aryProspectosEmpleado)) {
                        foreach ($aryProspectosEmpleado as $aryProspecto) {
                            $aryDetalle = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"], $nTipoItem);

                            if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                                $nTotalCierre++;
                            }

                            $nAvance       += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalle["nCantidad"] : 0;
                            $nRentaBasica  += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalle["nTotal"] : 0;
                            $nTotal        += $aryDetalle["nTotal"];


                            // Oportunidad Activa

                            if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                                $nCantidadProspectoOppActivo++;
                            }

                            // End  Oportunidad Activa
                        }
                    }

                    if ($aryEmpleado["nEstado"] == 1) {
                        $aryProspectosHoy  = $this->prospecto->fncGetProspectoAll($nIdNegocio, $nIdEmpleado, null, null, null, null, null, null, date("d/m/Y"));
                        $sColor            = '<div class="cuadrado fondo-' . strtolower($aryEmpleado["sColorSuperEmpleado"]) . '"></div>' . '<div style="visibility: hidden;" >' . strtolower($aryEmpleado["sColorSuperEmpleado"]) . '</div>';
                        $aryRows[] = [
                            "sColor"                      => $sColor,
                            "sColorNombre"                => strup($aryEmpleado["sColorSuperEmpleado"]),
                            "nAvance"                     => $nAvance,
                            "nRentaBasica"                => SIMBOLO_MONEDA .  nf($nRentaBasica),
                            "sEmpleado"                   => $aryEmpleado["sNombre"],
                            "nTotalProspectos"            => count($aryProspectosEmpleado),
                            "nCantidadProspectoOppActivo" => $nCantidadProspectoOppActivo,
                            "nProspectosHoy"              => count($aryProspectosHoy)
                        ];
                    }
                }
            }

            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryRows));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncGetReporteBasicoEmpleados()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nTipoEmpleado  = isset($_POST['nTipoEmpleado']) ? $_POST['nTipoEmpleado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryEmpleados = $this->empleado->fncGetEmpleados($nTipoEmpleado, $nIdNegocio, null, 1);

            $nIdSexoMasculino = $this->fncGetVarConfig("nIdSexoMasculino");
            $nIdSexoFemenino  = $this->fncGetVarConfig("nIdSexoFemenino");

            $aryHombres = [];
            $aryMujeres = [];

            $aryConExp = [];
            $arySinExp = [];


            $aryRangeEdad1 = [];
            $aryRangeEdad2 = [];
            $aryRangeEdad3 = [];
            $aryRangeEdad4 = [];


            $nIdEstadoCivilCasado       = $this->fncGetVarConfig("nIdEstadoCivilCasado");
            $nIdEstadoCivilSoltero      = $this->fncGetVarConfig("nIdEstadoCivilSoltero");
            $nIdEstadoCivilViudo        = $this->fncGetVarConfig("nIdEstadoCivilViudo");
            $nIdEstadoCivilDivorciado   = $this->fncGetVarConfig("nIdEstadoCivilDivorciado");
            $nIdEstadoCivilConviviente  = $this->fncGetVarConfig("nIdEstadoCivilConviviente");

            $aryCasados     = [];
            $arySoltero     = [];
            $aryViudo       = [];
            $aryDivorciado  = [];
            $aryConviviente = [];


            $aryConHijos = [];
            $arySinHijos = [];

            if (fncValidateArray($aryEmpleados)) {
                foreach ($aryEmpleados as $aryLoop) {


                    // Sexo de los empleados

                    switch ($aryLoop["nIdSexo"]) {

                        case $nIdSexoMasculino:
                            array_push($aryHombres, $aryLoop["nIdEmpleado"]);
                            break;

                        case $nIdSexoFemenino:
                            array_push($aryMujeres, $aryLoop["nIdEmpleado"]);
                            break;
                    }

                    // End Sexo de los empleados

                    // Experiencia en ventas

                    if ($aryLoop["nExperienciaVentas"] == 1) {
                        array_push($aryConExp, $aryLoop["nIdEmpleado"]);
                    } else {
                        array_push($arySinExp, $aryLoop["nIdEmpleado"]);
                    }
                    // End Experiencia en ventas
                    // Edades
                    $dFechaNacimiento = new DateTime($aryLoop["dFechaNacimiento"]);

                    $dHoy   = new DateTime("now");
                    $dDiff  = $dHoy->diff($dFechaNacimiento);

                    $nEdad = $dDiff->y;


                    if ($nEdad >= 18 && $nEdad <= 23) {
                        array_push($aryRangeEdad1, $aryLoop["nIdEmpleado"]);
                    } elseif ($nEdad >= 24 && $nEdad <= 29) {
                        array_push($aryRangeEdad2, $aryLoop["nIdEmpleado"]);
                    } elseif ($nEdad >= 30 && $nEdad <= 35) {
                        array_push($aryRangeEdad3, $aryLoop["nIdEmpleado"]);
                    } elseif ($nEdad >= 36) {
                        array_push($aryRangeEdad4, $aryLoop["nIdEmpleado"]);
                    }

                    // End Edades

                    // Estado civil

                    switch ($aryLoop["nIdEstadoCivil"]) {
                        case $nIdEstadoCivilCasado:
                            array_push($aryCasados, $aryLoop["nIdEmpleado"]);
                            break;
                        case $nIdEstadoCivilSoltero:
                            array_push($arySoltero, $aryLoop["nIdEmpleado"]);
                            break;
                        case $nIdEstadoCivilViudo:
                            array_push($aryViudo, $aryLoop["nIdEmpleado"]);
                            break;
                        case $nIdEstadoCivilDivorciado:
                            array_push($aryDivorciado, $aryLoop["nIdEmpleado"]);
                            break;
                        case $nIdEstadoCivilConviviente:
                            array_push($aryConviviente, $aryLoop["nIdEmpleado"]);
                            break;
                    }

                    //End Estado civil


                    // Cantidad de hijos o personas dependientes 

                    if ($aryLoop["nCantidadPersonasDependientes"] > 0) {
                        array_push($aryConHijos, $aryLoop["nIdEmpleado"]);
                    } else {
                        array_push($arySinHijos, $aryLoop["nIdEmpleado"]);
                    }
                }
            }

            // Sexo 

            $aryIndHombres = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryHombres);
            $aryIndMujeres = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryMujeres);

            // Con sin experiencia 

            $aryIndConExp  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryConExp);
            $aryIndSinExp  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $arySinExp);

            // Edades

            $aryIndRangeEdad1  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryRangeEdad1);
            $aryIndRangeEdad2  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryRangeEdad2);
            $aryIndRangeEdad3  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryRangeEdad3);
            $aryIndRangeEdad4  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryRangeEdad4);

            // Estado civil 

            $aryIndCasados      = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryCasados);
            $aryIndSolteros     = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $arySoltero);
            $aryIndViudos       = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryViudo);
            $aryIndDivorciado   = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryDivorciado);
            $aryIndConviviente  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryConviviente);

            // Personas dependientes

            $aryIndConHijos  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryConHijos);
            $aryIndSinHijos  = $this->fncObtenerAvanceByIdsEmpleados($nIdNegocio, $arySinHijos);



            // Seso );
            $sDataHombres = count($aryHombres) . " - " . $aryIndHombres["nTotalCierre"] . " - " .  ($aryIndHombres["nTotalCierre"] > 0  ? nf(count($aryHombres) / $aryIndHombres["nTotalCierre"]) : nf(0));

            $sDataMujeres = count($aryMujeres) . " - " . $aryIndMujeres["nTotalCierre"] . " - "  . ($aryIndMujeres["nTotalCierre"] > 0  ? nf(count($aryMujeres) / $aryIndMujeres["nTotalCierre"]) :   nf(0));

            // Con sin experiencia 

            $sDataConExpe = count($aryConExp) . " - " . $aryIndConExp["nTotalCierre"] . " - " . ($aryIndConExp["nTotalCierre"] > 0  ? nf(count($aryConExp) / $aryIndConExp["nTotalCierre"]) :  nf(0));
            $sDataSinExpe = count($arySinExp) . " - " . $aryIndSinExp["nTotalCierre"] . " - " . ($aryIndSinExp["nTotalCierre"] > 0  ? nf(count($arySinExp) / $aryIndSinExp["nTotalCierre"]) :  nf(0));

            // Edades

            $sDataRangoEdad1 = count($aryRangeEdad1) . " - " . $aryIndRangeEdad1["nTotalCierre"] . " - " . ($aryIndRangeEdad1["nTotalCierre"] > 0  ? nf(count($aryRangeEdad1) / $aryIndRangeEdad1["nTotalCierre"]) :  nf(0));
            $sDataRangoEdad2 = count($aryRangeEdad2) . " - " . $aryIndRangeEdad2["nTotalCierre"] . " - " . ($aryIndRangeEdad2["nTotalCierre"] > 0  ? nf(count($aryRangeEdad2) / $aryIndRangeEdad2["nTotalCierre"]) :  nf(0));
            $sDataRangoEdad3 = count($aryRangeEdad3) . " - " . $aryIndRangeEdad3["nTotalCierre"] . " - " . ($aryIndRangeEdad3["nTotalCierre"] > 0  ? nf(count($aryRangeEdad3) / $aryIndRangeEdad3["nTotalCierre"]) :  nf(0));
            $sDataRangoEdad4 = count($aryRangeEdad4) . " - " . $aryIndRangeEdad4["nTotalCierre"] . " - " . ($aryIndRangeEdad4["nTotalCierre"] > 0  ? nf(count($aryRangeEdad4) / $aryIndRangeEdad4["nTotalCierre"]) :  nf(0));

            // Estado civil 

            $sDataCasados       = count($aryCasados)     . " - " . $aryIndCasados["nTotalCierre"] . " - "  .  ($aryIndCasados["nTotalCierre"]     > 0  ? nf(count($aryCasados) / $aryIndCasados["nTotalCierre"]) : nf(0));
            $sDataSolteros      = count($arySoltero)     . " - " . $aryIndSolteros["nTotalCierre"] . " - "  .  ($aryIndSolteros["nTotalCierre"]    > 0  ? nf(count($arySoltero) / $aryIndSolteros["nTotalCierre"]) : nf(0));
            $sDataViudos        = count($aryViudo)       . " - " . $aryIndViudos["nTotalCierre"] . " - "  .  ($aryIndViudos["nTotalCierre"]      > 0  ? nf(count($aryViudo)  / $aryIndViudos["nTotalCierre"])  : nf(0));
            $sDataDivorciado    = count($aryDivorciado)  . " - " . $aryIndDivorciado["nTotalCierre"] . " - "  .  ($aryIndDivorciado["nTotalCierre"]  > 0  ? nf(count($aryDivorciado) / $aryIndDivorciado["nTotalCierre"]) : nf(0));
            $sDataConviviente   = count($aryConviviente) . " - " . $aryIndConviviente["nTotalCierre"] . " - "  .  ($aryIndConviviente["nTotalCierre"] > 0  ? nf(count($aryConviviente) / $aryIndConviviente["nTotalCierre"]) : nf(0));

            // Personas dependienres 

            $sDataConHijos   = count($aryConHijos) . " - " .  $aryIndConHijos["nTotalCierre"] . " - " . ($aryIndConHijos["nTotalCierre"] > 0  ? nf(count($aryConHijos) / $aryIndConHijos["nTotalCierre"]) : nf(0));
            $sDataSinHijos   = count($arySinHijos) . " - " .  $aryIndSinHijos["nTotalCierre"] . " - " . ($aryIndSinHijos["nTotalCierre"] > 0  ? nf(count($arySinHijos) / $aryIndSinHijos["nTotalCierre"]) : nf(0));


            $aryData = [
                "arySexo" => [
                    "sDataHombres" => $sDataHombres,
                    "sDataMujeres" => $sDataMujeres
                ],
                "aryExperienciaVentas" => [
                    "sDataConExpe" => $sDataConExpe,
                    "sDataSinExpe" => $sDataSinExpe
                ],
                "aryEdades" => [
                    "sDataRangoEdad1" => $sDataRangoEdad1,
                    "sDataRangoEdad2" => $sDataRangoEdad2,
                    "sDataRangoEdad3" => $sDataRangoEdad3,
                    "sDataRangoEdad4" => $sDataRangoEdad4,
                ],
                "aryEstadoCivil" => [
                    "sDataCasados"      => $sDataCasados,
                    "sDataSolteros"     => $sDataSolteros,
                    "sDataViudos"       => $sDataViudos,
                    "sDataDivorciado"   => $sDataDivorciado,
                    "sDataConviviente"  => $sDataConviviente,
                ],
                "aryPersonasDependientes" => [
                    "sDataConHijos" => $sDataConHijos,
                    "sDataSinHijos" => $sDataSinHijos,
                ]
            ];


            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncObtenerAvanceByIdsEmpleados($nIdNegocio, $aryAsesor)
    {

        try {
            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($aryAsesor)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                $nIdNegocio,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $aryAsesor
            );

            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;


            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {


                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    // Si es un prospecto combinado es decir que existen productos y servicios solo se suma los prospectos
                    $aryDetalleCatalogo = $this->fncGetDetalleCatalogoByIdProspecto($aryProspecto["nIdProspecto"]);

                    if (fncValidateArray($aryDetalleCatalogo)) {
                        $nAvance      += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nCantidad"] : 0;
                        $nRentaBasica += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryDetalleCatalogo["nTotal"] : 0;
                        $nTotal       += $aryDetalleCatalogo["nTotal"];
                    }
                }
            }


            $aryIndicativos = [
                "nAvance"        => $nAvance,
                "nRentaBasica"   => SIMBOLO_MONEDA . nf($nRentaBasica),
                "nTotalCierre"   => $nTotalCierre,
                "nTotal"         => $nTotal,
            ];

            return $aryIndicativos;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }




    public function fncActualizaEmpleadoProspecto()
    {
        $nIdProspecto               = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
        $nIdEmpleado                = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;

        try {

            $this->prospecto->fncActualizaEmpleadoProspecto(
                $nIdProspecto,
                $nIdEmpleado
            );

            $this->json(array("success" => 'Prospecto actualizado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
