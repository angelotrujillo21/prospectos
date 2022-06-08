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
use Application\Models\Usuarios;
use Application\Models\Entidades;
use Application\Models\Prospecto;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

class ProspectosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $users;
    public $prospecto;
    public $entidades;
    public $usuarios;
    public $clientes;
    public $catalogoTabla;
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->catalogoTabla = new CatalogoTabla();
        $this->prospecto     = new Prospecto();
        $this->clientes      = new Clientes();
        $this->usuarios      = new Usuarios();
        $this->entidades     = new Entidades();
        $this->session->init();
        $this->user = $this->session->get('user');
    }

    public function fncGetProspectos()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdUsuario           = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
        $sBuscador            = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
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

            $sMonedaNegocio = "";
            $aryDataMoneda  = $this->negocios->fncObtenerMoneda($nIdNegocio);

            if (fncValidateArray($aryDataMoneda)) {
                $sMonedaNegocio = $aryDataMoneda[0]["sMoneda"];
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"       => $nIdNegocio,
                    "nIdUsuario"       => $nIdUsuario,
                    "sBuscador"        => $sBuscador,
                    "nValidacionAdmin" => $nValidacionAdmin,
                    "nIdEtapa"         => $nIdEtapa,
                    "nIdSupervisor"    => $nIdSupervisor,
                    "dDesde"           => $dDesde,
                    "dHasta"           => $dHasta,
                ]
            );

            $nTotalUnidades = 0;
            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;
            $nOportunidad   = 0;

            $nIdEtapaCierre     = $this->fncGetVarConfig("nIdEtapaCierre");
            $nTipoActividadCita = $this->fncGetVarConfig("nTipoActividadCita");

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {

                    $aryEmpleado = ($this->usuarios->fncGetUsuarios(null, $nIdNegocio, $aryProspecto["nIdUsuario"], null));
                    $aryEmpleado = fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];

                    $aryUltimaCita = ($this->prospecto->fncGetProspectoActividadByIdProspecto($aryProspecto["nIdProspecto"], $nTipoActividadCita, null, null, " act.nIdActividad DESC ", 1));
                    $aryUltimaCita = fncValidateArray($aryUltimaCita) > 0 ? $aryUltimaCita[0] : [];

                    if (fncValidateArray($aryUltimaCita)) {
                        $aryUltimaCita["sColor"] = $this->fncObtenerColor($aryUltimaCita["sEstadoActividadCorta"], $aryUltimaCita["dtFechaEjecucion"]);
                    }

                    $aryCatalogo = $this->prospecto->fncGetAryProspectoCatalogo($aryProspecto["nIdProspecto"], $aryProspecto["sMoneda"]);

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    # Si es un prospecto combinado es decir que existen productos y servicios solo se suma los productos al prospecto 
                    $nTotalUnidades += $aryProspecto["nTotalUnidades"];
                    $nTotal         += $aryProspecto["nTotal"];

                    if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $nOportunidad++;
                    }

                    $aryData[] = [
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
            }

            $nTotalCantidadProspectos = count($aryData);

            $aryIndicativos = [
                "sMonedaNegocio"            => $sMonedaNegocio,
                "nAvance"                   => $nAvance,
                "nRentaBasica"              => $sMonedaNegocio . nf($nRentaBasica),
                "nCompra"                   => $sMonedaNegocio . ($nTotalCierre > 0 ?  nf($nRentaBasica / $nTotalCierre) : 0),
                "nTicket"                   => $nAvance > 0 ? $sMonedaNegocio . nf($nRentaBasica / $nAvance) : 0,
                "nEfectividad"              => $nTotalCantidadProspectos > 0 ? ((round(($nTotalCierre / $nTotalCantidadProspectos) * 100)) . "%")  : 0,
                "nTotalCierre"              => $nTotalCierre,
                "nOportunidad"              => $nOportunidad,
                "nTotal"                    => nf($nTotal),
                "nTotalCantidadProspectos"  => $nTotalCantidadProspectos,
                "nTotalUnidades"            => $nTotalUnidades
            ];

            $this->json(array("success" => true, "aryData" => $aryData, "aryIndicativos" => $aryIndicativos));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGetProspectosParaReporteVentas()
    {
        $nIdNegocio           = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdUsuario           = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
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
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"        => $nIdNegocio,
                    "nIdUsuario"        => $nIdUsuario,
                    "sBuscador"         => $sBuscador,
                    "nValidacionAdmin"  => $nValidacionAdmin,
                    "nIdEtapa"          => $nIdEtapa,
                    "nIdSupervisor"     => $nIdSupervisor,
                    "nTipoItem"         => $nIdTipoItem,
                    "dDesdeCierre"      => $dDesde,
                    "dHastaCierre"      => $dHasta,
                    "arySupervisor"     => $arySupervisor,
                    "aryAsesor"         => $aryAsesor,
                ]
            );


            $user         = $this->session->get("user");
            $bIsRolAdmin  = $user["nIdRol"] == $this->fncGetVarConfig("nIdRolAdmin") ? true : false;

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
                        "dFechaCierre"      => $aryProspecto["dFechaCierreD"],
                        "sCliente"          => !is_null($aryCliente) ? $aryCliente["sNombreoRazonSocial"] : $aryProspecto["sTitulo"],
                        "sTelefono"         => !is_null($aryCliente) ? $aryCliente["sTelefono"] :  "",
                        "sDocumento"        => !is_null($aryCliente) ? $aryCliente["sTipoDoc"] . "-" .  $aryCliente["sNumeroDocumento"] : "",
                        "sTipoItem"         => $aryDataDetalle["sTipoItem"],
                        "sDetalle"          => $aryDataDetalle["sDetalle"],
                        "nCantidad"         => $aryProspecto["nTotalUnidades"],
                        "nTotal"            => nf($aryProspecto["nTotal"]),
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

            $nIdUsuario         = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $aryCatalogos       = isset($_POST['aryCatalogos']) ? json_decode($_POST['aryCatalogos'], true)  : null;
            $arySegmentaciones  = isset($_POST['arySegmentaciones']) ? json_decode($_POST['arySegmentaciones'], true) : null;
            $aryActividades     = isset($_POST['aryActividades']) ? json_decode($_POST['aryActividades'], true) : null;
            $aryNotas           = isset($_POST['aryNotas']) ? json_decode($_POST['aryNotas'], true) : null;

            $aryCamposExtra      = isset($_POST['aryCamposExtra']) ? json_decode($_POST['aryCamposExtra'], true) : null;
            $nEstado             = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            $nIdMoneda               = isset($_POST['nIdMoneda']) ? $_POST['nIdMoneda'] : null;
            $nTotalUnidades          = isset($_POST['nTotalUnidades']) ? $_POST['nTotalUnidades'] : null;
            $nSubTotal               = isset($_POST['nSubTotal']) ? $_POST['nSubTotal'] : null;
            $nPorcentajeDsct         = isset($_POST['nPorcentajeDsct']) ? $_POST['nPorcentajeDsct'] : null;
            $nDsct                   = isset($_POST['nDsct']) ? $_POST['nDsct'] : null;
            $nNeto                   = isset($_POST['nNeto']) ? $_POST['nNeto'] : null;
            $nPorcentajeTributo      = isset($_POST['nPorcentajeTributo']) ? $_POST['nPorcentajeTributo'] : null;
            $nTributo                = isset($_POST['nTributo']) ? $_POST['nTributo'] : null;
            $nTotal                  = isset($_POST['nTotal']) ? $_POST['nTotal'] : null;
            $nIdEtapa                = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
            $nTipoProspecto          = isset($_POST['nTipoProspecto']) ? $_POST['nTipoProspecto'] : null;

            $objContrato             = isset($_FILES['objContrato']) ? $_FILES['objContrato'] : null;
            $aryObjOtros             = isset($_FILES['aryObjOtros']) ? $_FILES['aryObjOtros'] : null;
            $aryIdAdjuntos           = isset($_POST['aryIdAdjuntos']) ? json_decode($_POST['aryIdAdjuntos'], true) : null;
            $nValidacionAdmin        = isset($_POST['nValidacionAdmin']) ?  $_POST['nValidacionAdmin']  : 0;



            // var_dump($_POST);
            // exit;

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            if (is_null($nIdUsuario) || $nIdUsuario == '0' || $nIdUsuario == '') {
                $this->exception('Error. No ha enviado el asesor responsable . Por favor verifique o solicite asistencia.');
            }


            $nIdNewProspecto = null;

            $nTipoProspectoCorto    = $this->fncGetVarConfig("nTipoProspectoCorto");
            $nTipoProspectoLargo    = $this->fncGetVarConfig("nTipoProspectoLargo");
            $nIdEtapaCierre         = $this->fncGetVarConfig("nIdEtapaCierre");

            # Si se esta editando y cambia de etapa vamos a validar 
            if ($nIdRegistro != 0) {

                $aryCabecera = $this->prospecto->fncGetProspectoById($nIdRegistro);

                if (!fncValidateArray($aryCabecera)) {
                    $this->exception('Error. No se pudo ubicar el prospecto quizas se haya eliminado. Por favor verifique o solicite asistencia.');
                }

                $aryCabecera = $aryCabecera[0];

                # Si se ha cambiado de etapa 
                if ($aryCabecera["nIdEtapa"] != $nIdEtapa) {

                    # Validaciones al cambiar de etapa 
                    switch ($aryCabecera["nTipoProspecto"]) {
                        case $nTipoProspectoLargo:

                            # Si es propsecto largo
                            if ($nIdEtapa == $nIdEtapaCierre) {

                                # Para finalizar el prospecto primero ebemos verificar que hayan adjuntado el contrato
                                $aryContrato = $this->prospecto->fncObtenerAdjuntoContrato($nIdRegistro);

                                if (!fncValidateArray($aryContrato)) {
                                    $this->exception("Error. Para poder finalizar el prospecto primero debe de adjuntar el contrato .Por favor verifique");
                                }
                            }

                            break;
                        case $nTipoProspectoCorto:
                        default:
                            break;
                    }

                    # Guardar cambio de etapa y actualizar la etapa
                    $this->fncGuardarCambioEtapa($nIdRegistro, $nIdUsuario, $nIdEtapa);
                }
            }

            if ($nIdRegistro == 0) {

                # Etapa Inicial
                $nIdNewProspecto = $this->prospecto->fncGrabarProspecto(
                    $sTitulo,
                    $nIdCliente,
                    $nIdNegocio,
                    $nIdUsuario,
                    $nIdEtapa,
                    $nIdMoneda,
                    $nTotalUnidades,
                    $nSubTotal,
                    $nPorcentajeDsct,
                    $nDsct,
                    $nNeto,
                    $nPorcentajeTributo,
                    $nTributo,
                    $nTotal,
                    $nEstado,
                    $nTipoProspecto
                );

                $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $this->user["nIdUsuario"], null, "Se creo el prospecto - " . date("d/m/Y h:i:s"), $nEstado);
            } else {

                # Actualizar cabecera 
                $this->prospecto->fncActualizarProspecto(
                    $nIdRegistro,
                    $sTitulo,
                    $nIdCliente,
                    $nIdUsuario,
                    $nIdEtapa,
                    $nIdMoneda,
                    $nTotalUnidades,
                    $nSubTotal,
                    $nPorcentajeDsct,
                    $nDsct,
                    $nNeto,
                    $nPorcentajeTributo,
                    $nTributo,
                    $nTotal,
                    $nEstado,
                    $nValidacionAdmin
                );

                # Elimina el detalle del detalle de prospecto catalogo que se eliminaron en la vista
                $aryIds = [];
                $sIdList = "";
                if (fncValidateArray($aryCatalogos)) {
                    foreach ($aryCatalogos as $nKey => $aryItem) {
                        if ($aryItem['nIdProspectoCatalogo'] >= 1) {
                            $aryIds[] = $aryItem['nIdProspectoCatalogo'];
                        }
                    }

                    $sIdList = (count($aryIds) > 0 ? '( ' . implode(",", $aryIds) . ' )' : '');
                }

                # Contabilizar cuantos productos o servicios se eliminaron
                $aryEliminadosPC = $this->prospecto->fncObtenerItemsEliminadosPC($nIdRegistro, $sIdList);
                if (fncValidateArray($aryEliminadosPC)) {
                    $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $this->user["nIdUsuario"], null, "Se eliminaron " . count($aryEliminadosPC) . " producto(s) o servicio(s) del detalle del prospecto", 1);
                }

                # Ejecutar eliminacion 
                $this->prospecto->fncEliminarItemsPC($nIdRegistro, $sIdList);

                # Elimina el detalle de las citas que se eliminaron en la vista
                $aryIds = [];
                $sIdList = "";
                if (fncValidateArray($aryActividades)) {

                    foreach ($aryActividades as $nKey => $aryItem) {
                        if ($aryItem['nIdActividad'] >= 1) {
                            $aryIds[] = $aryItem['nIdActividad'];
                        }
                    }

                    $sIdList = (count($aryIds) > 0 ? '( ' . implode(",", $aryIds) . ' )' : '');
                }

                # Contabilizar citas que se han eliminado
                $aryEliminadosPA = $this->prospecto->fncObtenerEliminadosItemsPA($nIdRegistro, $sIdList);
                if (fncValidateArray($aryEliminadosPA)) {
                    $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $this->user["nIdUsuario"], null, "Se eliminaron " . count($aryEliminadosPA) . " cita(s).", 1);
                }

                # Ejecutar eliminacion
                $this->prospecto->fncEliminarItemsPA($nIdRegistro, $sIdList);

                # Elimina el detalle de las notas que se eliminaran 
                $aryIds = [];
                $sIdList = "";
                if (fncValidateArray($aryNotas)) {

                    foreach ($aryNotas as $nKey => $aryItem) {
                        if ($aryItem['nIdNota'] >= 1) {
                            $aryIds[] = $aryItem['nIdNota'];
                        }
                    }

                    $sIdList = (count($aryIds) > 0 ? '( ' . implode(",", $aryIds) . ' )' : '');
                }

                # Contabilizar cuantas notas se han eliminado
                $aryEliminadosNotas = $this->prospecto->fncObtenerNotasEliminadas($nIdRegistro, $sIdList);
                if (fncValidateArray($aryEliminadosNotas)) {
                    $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $this->user["nIdUsuario"], null, "Se eliminaron " . count($aryEliminadosNotas) . " nota(s).", 1);
                }

                # Ejecutar eliminacion 
                $this->prospecto->fncEliminarItemsNota($nIdRegistro, $sIdList);

                # Obtener los adjuntos que se han eliminado en la vista 
                $aryIds = [];
                $sIdList = "";

                if (fncValidateArray($aryIdAdjuntos)) {

                    foreach ($aryIdAdjuntos as $nKey => $nIdAdjunto) {
                        $aryIds[] = $nIdAdjunto;
                    }

                    $sIdList = (count($aryIds) > 0 ? '( ' . implode(",", $aryIds) . ' )' : '');
                }

                # Obtiene los adjuntos elimindos los elimina fisicamente y de la tabla
                $aryAdjuntosEliminados = $this->prospecto->fncObtenerItemsEliminadosProspectoAdjunto($nIdRegistro, $sIdList);

                if (fncValidateArray($aryAdjuntosEliminados)) {

                    $nCantidadAdjuntos = 0;
                    foreach ($aryAdjuntosEliminados as $nKey => $aryLoop) {

                        // Eliminar el archivo de forma fisica 
                        if (!empty($aryLoop['sNombreArchivo'])) {
                            fncEliminarArchivo(ROOTPATHRESOURCE . "/docs/" . $aryLoop['sNombreArchivo']);
                        }

                        $this->prospecto->fncEliminarProspectoAdjunto($aryLoop["nIdAdjunto"]);

                        if ($aryLoop["nContrato"] == 1) {
                            $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $this->user["nIdUsuario"], null, "Se elimino el contrato.", 1);
                        } else {
                            $nCantidadAdjuntos++;
                        }
                    }

                    # Contabiliza cuantos adjuntos se han eliminado
                    $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $this->user["nIdUsuario"], null, "Se eliminaron " . $nCantidadAdjuntos . " adjunto(s).", 1);
                }
            }

            $nIdProspectoCurrent = ($nIdRegistro == 0 ? $nIdNewProspecto : $nIdRegistro);

            $nNuevosItems = 0;
            $nNuevasNotas = 0;
            $nNuevaActividad = 0;

            # Grabar detalle o editar detalle de catalogo 
            if (fncValidateArray($aryCatalogos)) {
                foreach ($aryCatalogos as $aryCata) {
                    if ($aryCata["nIdProspectoCatalogo"] == '0') {
                        # Insertar Detalle prospecto catalogo 
                        $this->prospecto->fncGrabarProspectoCatalogo($nIdProspectoCurrent, $aryCata["nIdCatalogo"], $aryCata["nCantidad"], $aryCata["nPrecio"]);
                        $nNuevosItems++;
                    } else {
                        # Actualizar Prospecto catalogo
                        $this->prospecto->fncActualizaProspectoCatalogo($aryCata["nIdProspectoCatalogo"], $aryCata["nCantidad"], $aryCata["nPrecio"]);
                    }
                }
            }

            # Grabar detalle o editar detalle de las actividades 
            if (fncValidateArray($aryActividades)) {
                foreach ($aryActividades as $aryActi) {

                    if ($aryActi["nIdActividad"] == '0') {
                        # Insertar una nueva actividad
                        $this->prospecto->fncGrabarProspectoActividad(
                            $nIdProspectoCurrent,
                            $aryActi["nIdUsuario"],
                            $aryActi["nTipoActividad"],
                            $aryActi["nIdEstadoActividad"],
                            $aryActi["sFechaActividad"],
                            $aryActi["sHoraActividad"],
                            $aryActi["sNota"],
                            $aryActi["sLatitud"],
                            $aryActi["sLongitud"],
                            $aryActi["nEstado"]
                        );

                        $nNuevaActividad++;
                    } else {

                        # Actualizar propsecto actividad
                        $this->prospecto->fncActualizaProspectoActividad(
                            $aryActi["nIdActividad"],
                            $aryActi["nIdUsuario"],
                            $aryActi["nIdEstadoActividad"],
                            $aryActi["sFechaActividad"],
                            $aryActi["sHoraActividad"],
                            $aryActi["sNota"],
                            $aryActi["sLatitud"],
                            $aryActi["sLongitud"],
                            $aryActi["nEstado"]
                        );
                    }
                }
            }

            # Guardar y o actualizar notas
            if (fncValidateArray($aryNotas)) {
                foreach ($aryNotas as $aryLoop) {
                    if ($aryLoop["nIdNota"] == 0) {
                        # Insertar una nueva nota
                        $this->prospecto->fncGrabarProspectoNota($nIdProspectoCurrent, $this->user["nIdUsuario"], $aryLoop["sNota"], 1);
                        $nNuevasNotas++;
                    } else {
                        # Actualizar nota
                        $this->prospecto->fncActualizaProspectoNota($aryLoop["nIdNota"], $aryLoop["sNota"]);
                    }
                }
            }

            # Guardar y o actualiza los campos extras
            if (fncValidateArray($aryCamposExtra)) {
                foreach ($aryCamposExtra as $aryLoop) {

                    if ($aryLoop["nIdProspectoCampoExtra"] == '0') {
                        # Insertar una nueva actividad
                        $this->prospecto->fncGrabarProspectoCampoExtra($aryLoop["nIdWidget"], $nIdProspectoCurrent, $aryLoop["sValor"]);
                    } else {
                        # Actualizar el valor de un campo extra
                        $this->prospecto->fncActualizarProspectoCampoExtra($aryLoop["nIdProspectoCampoExtra"], $aryLoop["sValor"]);
                    }
                }
            }

            # Grabar o actualizar segmentaciones 
            if (fncValidateArray($arySegmentaciones)) {
                foreach ($arySegmentaciones as $aryLoop) {
                    if ($aryLoop["nIdProspectoSegmentacion"] == 0) {
                        # Guarda un nuevo registro
                        $this->prospecto->fncGrabarProspectoSegmentacion($nIdProspectoCurrent, $aryLoop["nIdSegmentacion"], $aryLoop["nIdDetalle"]);
                    } else {
                        # Actualizar
                        $this->prospecto->fncActualizaProspectoSegmentacion($aryLoop["nIdProspectoSegmentacion"], $aryLoop["nIdDetalle"]);
                    }
                }
            }

            # Adjuntos
            $sCustomName = "_PRT" . $nIdProspectoCurrent;

            # Grabrar contrato 
            if (isset($objContrato) && is_array($objContrato)) {

                $sNombreContrato = Upload::fncProccesCustomName($objContrato, 'docs', $sCustomName);

                $this->prospecto->fncGrabarProspectoAdjunto($nIdProspectoCurrent, $sNombreContrato, 1);

                $this->prospecto->fncGrabarCambioProspecto($nIdProspectoCurrent, $this->user["nIdUsuario"], null, "Se adjunto el contrato.", 1);
            }

            # Grabar Otros adjuntos
            if (fncValidateArray($aryObjOtros)) {
                $aryObjOtros = reArrayFiles($aryObjOtros);
                foreach ($aryObjOtros as $aryOtro) {
                    $sNombreArchivo = Upload::fncProccesCustomName($aryOtro, 'docs', $sCustomName);
                    $this->prospecto->fncGrabarProspectoAdjunto($nIdProspectoCurrent, $sNombreArchivo, 0);
                }

                $this->prospecto->fncGrabarCambioProspecto($nIdProspectoCurrent, $this->user["nIdUsuario"], null, "Se adjunto " . count($aryObjOtros) . " archivo(s) externos.", 1);
            }

            # Grabar nuevos items del detalle o nuevas notas al cambio del prospecto
            if ($nNuevosItems > 0 || $nNuevasNotas > 0 || $nNuevaActividad > 0 ) {

                if ($nNuevosItems > 0) {
                    $this->prospecto->fncGrabarCambioProspecto($nIdProspectoCurrent, $this->user["nIdUsuario"], null, "Se agregaron " . $nNuevosItems . " producto(s) o servicio(s) al detalle del prospecto.", 1);
                }

                if ($nNuevasNotas > 0) {
                    $this->prospecto->fncGrabarCambioProspecto($nIdProspectoCurrent, $this->user["nIdUsuario"], null, "Se agregaron " . $nNuevasNotas . " nota(s).", 1);
                }

                if ($nNuevaActividad > 0) {
                    $sCambio = ("Se creo " . $nNuevaActividad . ($nNuevaActividad == 1 ? " cita " : " citas "));
                    $this->prospecto->fncGrabarCambioProspecto($nIdProspectoCurrent, $this->user["nIdUsuario"], null, $sCambio, $nEstado);
                }
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
            $nIdUsuario         = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $sTitulo            = isset($_POST['sTitulo']) ? $_POST['sTitulo'] : null;

            $bExisteWidgetCitas = isset($_POST['bExisteWidgetCitas']) ? $_POST['bExisteWidgetCitas'] : null;

            $aryActi            = isset($_POST['aryActividades']) ? $_POST['aryActividades'] : null;
            $sNota              = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $nEstado            = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;
            $nIdMoneda          = isset($_POST['nIdMoneda']) ? $_POST['nIdMoneda'] : null;
            $nTipoProspecto     = isset($_POST['nTipoProspecto']) ? $_POST['nTipoProspecto'] : null;



            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // var_dump($aryActi);
            // exit;

            if ($nIdRegistro == 0) {
                $nIdEtapa        = $this->fncGetVarConfig("nIdEtapaProgramada");

                $nIdNewProspecto = $this->prospecto->fncGrabarProspecto($sTitulo, $nIdCliente, $nIdNegocio, $nIdUsuario, $nIdEtapa, $nIdMoneda, 0, 0, 0, 0, 0, 0, 0, 0, $nEstado, $nTipoProspecto);


                $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $this->user["nIdUsuario"], null, "Se creo el prospecto - " . date("d/m/Y h:i:s"), $nEstado);

                # Atraves de la vista paso la validacion si esque el widget de citas

                if ($bExisteWidgetCitas === 'true') {
                    $this->prospecto->fncGrabarProspectoActividad(
                        $nIdNewProspecto,
                        $aryActi["nIdUsuario"],
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
                    $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdUsuario, null, $sCambio, $nEstado);
                }

                if (!empty($sNota)) {
                    $this->prospecto->fncGrabarProspectoNota($nIdNewProspecto, $nIdUsuario, $sNota, 1);
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Prospecto simple registrado exitosamente...' : 'Prospecto simple actualizado exitosamente...';
            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
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

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData              = [];
            $aryProspecto         = $this->prospecto->fncGetProspectoAll(["nIdProspecto" =>  $nIdRegistro]);

            if (!fncValidateArray($aryProspecto)) {
                $this->exception('Error. No se pudo ubicar el prospecto , quizas se haya eliminado. Por favor verifique o solicite asistencia.');
            }

            $aryProspecto = $aryProspecto[0];
            $sArchivo = "CTZ_" . sp($aryProspecto["nIdProspecto"]) . ".pdf";

            # Obtener todas las citas 
            $aryActividad     = [];
            $aryDataActividad = $this->prospecto->fncGetProspectoActividadByIdProspecto($nIdRegistro, $this->fncGetVarConfig("nTipoActividadCita"));

            if (fncValidateArray($aryDataActividad)) {
                foreach ($aryDataActividad as $aryLoop) {
                    $aryActividad[] = [
                        "nIdActividad"            => $aryLoop["nIdActividad"],
                        "nIdProspecto"            => $aryLoop["nIdProspecto"],
                        "nIdUsuario"              => $aryLoop["nIdUsuario"],
                        "sEmpleado"               => $aryLoop["sEmpleado"],
                        "dFechaCreacion"          => $aryLoop["dFechaCreacion"],
                        "nIdEstadoActividad"      => $aryLoop["nIdEstadoActividad"],
                        "sEstadoActividadLarga"   => $aryLoop["sEstadoActividadLarga"],
                        "sEstadoActividadCorta"   => $aryLoop["sEstadoActividadCorta"],
                        "dtFechaEjecucion"        => $aryLoop["dtFechaEjecucion"],
                        "nTipoActividad"          => $aryLoop["nTipoActividad"],
                        "dFecha"                  => $aryLoop["dFecha"],
                        "sFecha"                  => $aryLoop["sFecha"],
                        "dHora"                   => $aryLoop["dHora"],
                        "sNota"                   => $aryLoop["sNota"],
                        "sLatitud"                => $aryLoop["sLatitud"],
                        "sLongitud"               => $aryLoop["sLongitud"],
                        "sColor"                  => $this->fncObtenerColor($aryLoop["sEstadoActividadCorta"], $aryLoop["dtFechaEjecucion"]),
                        "nEstado"                 => $aryLoop["nEstado"],
                    ];
                }
            }

            $aryData = [
                "aryProspecto"               => $aryProspecto,
                "sLinkWebCotizacion"         => file_exists(ROOTPATHRESOURCE . "/docs/" . $sArchivo) ? docs($sArchivo) : "",
                "aryProspectoSegmentacion"   => $this->prospecto->fncGetProspectoSegmentacionByIdProspecto($nIdRegistro),
                "aryProspectoCatalogo"       => $this->prospecto->fncGetProspectoCatalogoByIdProspecto($nIdRegistro),
                "aryActividad"               => $aryActividad,
                "aryNotas"                   => $this->prospecto->fncGetProspectoNotaByIdProspecto($nIdRegistro),
                "aryCamposExtras"            => $this->prospecto->fncObtenerProspectoCampoExtra(["nIdProspecto" => $nIdRegistro]),
                "aryCambios"                 => $this->prospecto->fncGetCambioProspectoByIdProspecto($nIdRegistro),
                "aryAdjuntos"                => $this->prospecto->fncObtenerProspectoAdjuntosByIdProspecto($nIdRegistro)
            ];

            # Solo si esta consultando un usuarios se actualiza si es el admin no actualiza
            $user           = $this->user;
            $nIdRolAsesor   = $this->fncGetVarConfig("nIdRolAsesor");

            if (isset($user["nIdRol"]) && $user["nIdRol"] == $nIdRolAsesor  && ($aryProspecto["nIdUsuario"] == $user["nIdUsuario"])) {
                $this->prospecto->fncActualizarFechaUltimoAccesoProspecto($nIdRegistro);
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
                $aryValidate = $this->prospecto->fncGetProspectoByName($sNombreDb, $nIdNegocio);

                if (fncValidateArray($aryValidate)) {
                    $this->exception('Error. El nombre del campo ya se encuentra utilizado. Por favor verifique.');
                }

                // Crear
                # Crea el widget
                $nIdWidget = $this->prospecto->fncGrabarWidgetProspecto($sNombreDb, $sNombre, $sValores, $nTipoWidget, $nTipoCampo, $nDefault, $nRequerido, $nEstado);

                # Crea la relacion prospecto widget
                $this->prospecto->fncGrabarConfigProspecto($nIdNegocio, $nIdWidget, $nEstado);
            } else {

                # Validar que no exista el nombre en otro registro
                $aryValidate = $this->prospecto->fncValidarWidgetProspectoByName($nIdRegistro, $sNombreDb, $nIdNegocio);

                if (fncValidateArray($aryValidate)) {
                    $this->exception('Error. El nombre del campo ya se encuentra utilizado. Por favor verifique.');
                }

                // Actualizar
                $aryWidget = $this->prospecto->fncGetWidgetProspectosById($nIdRegistro);
                $aryWidget = $aryWidget[0];
                $this->prospecto->fncActualizarWidgetProspecto($nIdRegistro, $sNombreDb, $sNombre, $sValores, $nTipoWidget, $nDefault, $nRequerido, $nEstado);
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
            if (is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncGetWidgetProspectosById($nIdRegistro);
            $aryData = $aryData[0];

            # Elimina de la configuracion de campos del prospecto 
            $this->prospecto->fncEliminarWidgetConfigProsepecto($nIdRegistro);

            # Elimina todos los valores de widget prospecto 
            $this->prospecto->fncEliminarCamposProspectoByWidget($nIdRegistro);

            # Elimina el registro de la tabla widget
            $this->prospecto->fncEliminarWidgetProspecto($nIdRegistro);

            $this->json(array("success" => 'Campo eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncGrabarCambioProspecto()
    {
        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdUsuario     = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;
        $sCambio        = isset($_POST['sCambio']) ? $_POST['sCambio'] : null;
        $nEstado        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $nIdUsuario, $nIdEtapa, $sCambio, $nEstado);;
            $this->json(array("success" => "Cambio agregado  correctamente."));
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

    public function fncProcesarPropuesta($nIdProspecto)
    {
        try {

            if (!is_numeric($nIdProspecto)) {
                $this->exception('Error. El ID del prospecto tiene un formato invalido. Por favor verifique o solicite asistencia.');
            }

            $aryProspecto = $this->prospecto->fncGetProspectoById($nIdProspecto);

            if (!fncValidateArray($aryProspecto)) {
                $this->exception('Error. El ID del prospecto es incorrecto o no existe. Por favor verifique o solicite asistencia.');
            }

            $aryProspecto = $aryProspecto[0];

            if ($aryProspecto["nIdEtapa"] == $this->fncGetVarConfig("nIdEtapaProgramada")) {
                if ($aryProspecto["nIdUsuario"] == 0) {
                    $this->exception('Error. No existe un asesor encargado para esta propuesta. Por favor verifique o solicite asistencia.');
                }

                if ($aryProspecto["nIdCliente"] == 0) {
                    $this->exception('Error. No existe un cliente para esta propuesta. Por favor verifique o solicite asistencia.');
                }

                $this->prospecto->fncActualizarEstadoProspecto($nIdProspecto, $this->fncGetVarConfig("nIdEtapaEnvioPropuesta"));

                # Actualizar a estado enviada 
                $this->fncGuardarCambioEtapa($nIdProspecto, $aryProspecto["nIdUsuario"], $this->fncGetVarConfig("nIdEtapaEnvioPropuesta"));
            }

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

            $this->view("admin/cotizacion-pdf", [
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

    public function fncGuardarCambioEtapa($nIdProspecto, $nIdUsuario, $nIdEtapa)
    {
        try {
            $aryEtapa = $this->prospecto->fncObtenerEtapaProspectoById($nIdEtapa);

            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdUsuario, $nIdEtapa, "Se cambio de etapa a " . $aryEtapa["sNombre"], 1);
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
            $aryProspectos  = $this->prospecto->fncGetProspectoAll(["nIdNegocio" => $nIdNegocio, "nIdCliente" => $nIdCliente]);

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $nKey => $aryProspecto) {
                    $aryEmpleado =  ($this->usuarios->fncGetUsuarios(null, $nIdNegocio, $aryProspecto["nIdUsuario"]));
                    $aryEmpleado =   fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];


                    $aryData[] = [
                        "nItem"                  => sp($nKey + 1, 4),
                        "sCliente"               => $aryProspecto["sCliente"],
                        "sEmpleado"              => $aryProspecto["sEmpleado"],
                        "sNombreEtapa"           => $aryProspecto["sNombreEtapa"],
                        "nTotal"                 => $aryProspecto["nTotal"],
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
            $nIdUsuario       = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $sBuscador        = isset($_POST['sBuscador']) ? $_POST['sBuscador'] : null;
            $nIdSupervisor    = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;

            $nCantidadCitasHoy = 0;
            $nCierreHoy        = 0;
            $nRentaBasica      = 0;
            $nAvance           = 0;

            $sMoneda   = $this->negocios->fncObtenerMoneda($nIdNegocio)[0]["sMoneda"];

            $aryProspectos  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"     => $nIdNegocio,
                    "nIdUsuario"     => $nIdUsuario,
                    "nIdEtapa"       => $this->fncGetVarConfig("nIdEtapaCierre"),
                    "nIdSupervisor"  => $nIdSupervisor,
                    "dFechaCierre"   => date("d/m/Y")
                ]
            );


            $nCierreHoy  = count($aryProspectos);

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {
                    $nAvance      +=  $aryProspecto["nTotalUnidades"];
                    $nRentaBasica +=  $aryProspecto["nTotal"];
                }
            }


            $aryCitas  = $this->prospecto->fncGetActividadesByProspecto(
                null,
                $this->fncGetVarConfig("nTipoActividadCita"),
                $this->fncGetVarConfig("nIdEstadoActividadPendiente"),
                $nIdUsuario,
                date("d/m/Y"),
                $nIdNegocio,
                $nIdSupervisor
            );

            $nCantidadCitasHoy = $aryCitas["nCantidad"];

            $aryProspectosHoy  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"     => $nIdNegocio,
                    "nIdUsuario"     => $nIdUsuario,
                    "nIdSupervisor"  => $nIdSupervisor,
                    "dFechaCreacion" => date("d/m/Y")
                ]
            );

            $aryEmpleadosHoy = [];

            if (fncValidateArray($aryProspectosHoy)) {
                foreach ($aryProspectosHoy as $aryLoop) {
                    array_push($aryEmpleadosHoy, $aryLoop["nIdUsuario"]);
                }
            }

            $aryEmpleadosHoy = array_unique($aryEmpleadosHoy);

            $aryData = [
                "nCierreHoy"            => $nCierreHoy,
                "nCantidadCitasHoy"     => $nCantidadCitasHoy,
                "nAvance"               => $nAvance,
                "nRentaBasica"          => $sMoneda . nf($nRentaBasica),
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
            $nIdUsuario  = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
            $nIdNegocio  = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

            // Valida valores del formulario
            if (is_null($nIdUsuario) || is_null($nIdNegocio)) {
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
                $nIdUsuario,
                null,
                null,
                $sEtapasNot,
                $nIdNegocio
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
        $nIdUsuario           = isset($_POST['nIdUsuario']) ? $_POST['nIdUsuario'] : null;
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


            $sMoneda   = $this->negocios->fncObtenerMoneda($nIdNegocio)[0]["sMoneda"];

            $aryData = [];
            $aryProspectosCerradosMesCurso  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"     => $nIdNegocio,
                    "nIdUsuario"     => $nIdUsuario,
                    "nIdSupervisor"  => $nIdSupervisor,
                    "dDesdeCierre"   => $dDesde,
                    "dHastaCierre"   => $dHasta
                ]
            );


            $nAvance        = 0;
            $nRentaBasica   = 0;

            $nTotalCierre   = 0;
            $nOportunidad   = 0;

            $aryIdEmpleados = [];


            $nIdEtapaEnvioPropuesta = $this->fncGetVarConfig("nIdEtapaEnvioPropuesta");
            $nIdEtapaNegociacion    = $this->fncGetVarConfig("nIdEtapaNegociacion");
            $nIdEtapaEnProceso      = $this->fncGetVarConfig("nIdEtapaEnProceso");

            $nIdEtapaCierre            = $this->fncGetVarConfig("nIdEtapaCierre");
            $nTiempoPromedioConversion = 0;
            $nTotalDias                = 0;

            if (fncValidateArray($aryProspectosCerradosMesCurso)) {
                foreach ($aryProspectosCerradosMesCurso as $aryProspecto) {

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;

                        $dFechaCreacion = DateTime::createFromFormat('d/m/Y', $aryProspecto['dFechaCreacionD']);
                        $dFechaCierre   = DateTime::createFromFormat('d/m/Y', $aryProspecto['dFechaCierreD']);
                        $diff           = $dFechaCierre->diff($dFechaCreacion);
                        $nTotalDias    += $diff->days;
                    }

                    $nAvance      += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotalUnidades"] : 0;
                    $nRentaBasica += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotal"] : 0;
                }
            }


            $nTiempoPromedioConversion = $nTotalCierre > 0 ? round(($nTotalDias / $nTotalCierre), 2)  : 0;

            # Obtener todas las oportunidades activas de todos los tiempos
            $sIdsOptActiva  = "$nIdEtapaEnvioPropuesta,$nIdEtapaNegociacion,$nIdEtapaEnProceso";
            $aryOptActivas  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"  => $nIdNegocio,
                    "sIdsEtapa"   => $sIdsOptActiva,
                ]
            );

            $nOportunidad = count($aryOptActivas);

            # Total cantidad de prospecto del mes en curso
            $aryProspectosMesActual  = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"     => $nIdNegocio,
                    "nIdUsuario"     => $nIdUsuario,
                    "nIdSupervisor"  => $nIdSupervisor,
                    "dDesde"         => $dDesde,
                    "dHasta"         => $dHasta
                ]
            );

            $nTotalCantidadProspectosMesActual = count($aryProspectosMesActual);

            if (fncValidateArray($aryProspectosMesActual)) {
                foreach ($aryProspectosMesActual as $aryProspecto) {
                    array_push($aryIdEmpleados, $aryProspecto["nIdUsuario"]);
                }
            }


            $aryIdEmpleados            = array_unique($aryIdEmpleados);
            $nCantidadEmpleadosEnElMes = count($aryIdEmpleados);

            $aryClientesNuevosEnElMes = $this->clientes->fncGetClientes($nIdNegocio, 1, null, null, $dDesde, $dHasta);
            $nClientesNuevosEnElMes   = count($aryClientesNuevosEnElMes);
            $nTasaCliente             = $nTotalCantidadProspectosMesActual > 0 ?  round(($nClientesNuevosEnElMes / $nTotalCantidadProspectosMesActual), 2) * 100 : 0;


            $nProductividadUnidades  = $nCantidadEmpleadosEnElMes > 0 ?  $nAvance / $nCantidadEmpleadosEnElMes : 0;
            $nProductividadMonto     = $nCantidadEmpleadosEnElMes > 0 ?  $nRentaBasica / $nCantidadEmpleadosEnElMes : 0;
            $sProductividad          = intval($nProductividadUnidades) . " - " .  $sMoneda .  nf($nProductividadMonto);


            # Vendedores activos son todos sin discriminar por fecha de creacion 
            $nIdRolAsesorVentas   = $this->fncGetVarConfig("nIdRolAsesor");
            $aryEmpleadosActivos  = $this->usuarios->fncGetUsuariosAll($nIdRolAsesorVentas, $nIdNegocio, $nIdUsuario, 1, null, null, $nIdSupervisor);

            $aryData = [
                "nAvance"                   => $nAvance,
                "nRentaBasica"              => $sMoneda . nf($nRentaBasica),
                "nCompra"                   => $sMoneda . ($nTotalCierre > 0 ?  nf($nRentaBasica / $nTotalCierre) : 0),
                "nTicket"                   => $nAvance > 0 ? $sMoneda . nf($nRentaBasica / $nAvance) : 0,
                "nEfectividad"              => $nTotalCantidadProspectosMesActual > 0 ? ((round(($nTotalCierre / $nTotalCantidadProspectosMesActual) * 100)) . "%")  : 0,
                "nTotalCierre"              => $nTotalCierre,
                "nOportunidad"              => $nOportunidad,
                "nTotalCantidadProspectos"  => $nTotalCantidadProspectosMesActual,
                "sProductividad"            => $sProductividad,
                "nTasaCliente"              => $nTasaCliente . "%", // Radio opp nuevos
                "nEmpleadosActivos"         => count($aryEmpleadosActivos),
                "nCantidadEmpleadosEnElMes" => $nCantidadEmpleadosEnElMes,
                "nClientesNuevosEnElMes"    => $nClientesNuevosEnElMes,
                "nTiempoPromedioConversion" => $nTiempoPromedioConversion
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
        $aryDpt               = isset($_POST['aryDpt']) ? $_POST['aryDpt'] : null;

        $dDesde               = isset($_POST['dDesde']) ? $_POST['dDesde'] : null;
        $dHasta               = isset($_POST['dHasta']) ? $_POST['dHasta'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos    = [];

            $sMoneda   = $this->negocios->fncObtenerMoneda($nIdNegocio)[0]["sMoneda"];

            $aryProspectos = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"    => $nIdNegocio,
                    "nTipoItem"     => $nTipoItem,
                    "dDesde"        => $dDesde,
                    "dHasta"        => $dHasta,
                    "arySupervisor" => $arySupervisor,
                    "aryAsesor"     => $aryAsesor,
                    "aryDpt"        => $aryDpt
                ]
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

                    array_push($aryIdEmpleados, $aryProspecto["nIdUsuario"]);
                    array_push($aryIdClientes, $aryProspecto["nIdCliente"]);

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                        $nTotalCierre++;
                    }

                    $nAvance       += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotalUnidades"] : 0;
                    $nRentaBasica  += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotal"] : 0;
                    $nTotal        += $aryProspecto["nTotal"];


                    // Oportunidad Activa

                    if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $nCantidadProspectoOppActivo++;

                        $nUnidadesProspectoOppActivo  += $aryProspecto["nTotalUnidades"];
                        $nTotalProspectoOppActivo     += $aryProspecto["nTotal"];
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
            $nCompraMonto    = $nTotalCierre > 0 ? $sMoneda . nf($nRentaBasica / $nTotalCierre)  : 0;

            $nProductividadUnidades  = $nCantidadEmpleadosDentroRango > 0 ?  $nAvance / $nCantidadEmpleadosDentroRango : 0;
            $nProductividadMonto     = $nCantidadEmpleadosDentroRango > 0 ?  $nRentaBasica / $nCantidadEmpleadosDentroRango : 0;
            $nTasaCliente            = $nTotalCantidadProspectos > 0 ?  $nCantidadClientesDentroRango / $nTotalCantidadProspectos : 0;


            $sAvance                        = $nAvance . " Unidades " . " - " .  $sMoneda . nf($nRentaBasica);
            $sTicket                        = $nAvance > 0 ? $sMoneda . nf($nRentaBasica / $nAvance) : 0;
            $sCompra                        = intval($nCompraUnidades) .  (intval($nCompraUnidades) == 1  ? " Unidad " : "Unidades") . " - " . $nCompraMonto;
            $sProspeccionPromedio           = intval(round($nProspeccionPromedio, 2));
            $sCantidadOppActiva             = intval($nCantidadProspectoOppActivo) . " Prospectos ";
            $sOppActiva                     = $nUnidadesProspectoOppActivo . " Unidades " . " - "  . ($nTotalProspectoOppActivo > 0 ? $sMoneda . nf($nTotalProspectoOppActivo) : 0);
            $sProductividad                 = intval($nProductividadUnidades) . " - " .  $sMoneda .  nf($nProductividadMonto);
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
                [
                    "nIdNegocio"    => $nIdNegocio,
                    "nTipoItem"     => $nTipoItem,
                    "dDesde"        => $dDesdeRango,
                    "dHasta"        => $dHastaRango,
                    "arySupervisor" => $arySupervisor,
                    "aryAsesor"     => $aryAsesor,
                    "sOrderBy"      => " p.dFechaCreacion ASC  "
                ]
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

                        $aryDataProductividadMes[$sNamekey]['aryEmpleados'][] = $aryProspecto["nIdUsuario"];

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

            $aryProspectos  = [];


            $sMoneda   = $this->negocios->fncObtenerMoneda($nIdNegocio)[0]["sMoneda"];

            $aryProspectos = $this->prospecto->fncGetProspectoAll(
                [
                    "nIdNegocio"    => $nIdNegocio,
                    "nTipoItem"     => $nTipoItem,
                    "dDesde"        => $dDesde,
                    "dHasta"        => $dHasta,
                    "arySupervisor" => $arySupervisor,
                    "aryAsesor"     => $aryAsesor
                ]
            );


            $aryEmpleados  = [];
            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryLoop) {
                    $aryEmpleados[] = $aryLoop["nIdUsuario"];
                }
            }


            $aryEmpleados = array_unique($aryEmpleados);

            $aryRows = [];
            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryEmpleados)) {
                foreach ($aryEmpleados as $nKey => $nIdUsuario) {
                    $nAvance                     = 0;
                    $nRentaBasica                = 0;
                    $nTotalCierre                = 0;
                    $nCantidadProspectoOppActivo = 0;
                    $nTotal                      = 0;

                    $aryProspectosEmpleado  = $this->prospecto->fncGetProspectoAll(
                        [
                            "nIdNegocio"    => $nIdNegocio,
                            "nIdUsuario"    => $nIdUsuario,
                            "nTipoItem"     => $nTipoItem,
                            "dDesde"        => $dDesde,
                            "dHasta"        => $dHasta,
                            "arySupervisor" => $arySupervisor,
                            "aryAsesor"     => $aryAsesor
                        ]
                    );



                    $aryEmpleado = $this->usuarios->fncObtenerDatosBasicos($nIdUsuario, $nIdNegocio);

                    if (fncValidateArray($aryProspectosEmpleado)) {
                        foreach ($aryProspectosEmpleado as $aryProspecto) {

                            if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) {
                                $nTotalCierre++;
                            }

                            $nAvance       += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotalUnidades"] : 0;
                            $nRentaBasica  += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryProspecto["nTotal"] : 0;
                            $nTotal        += $aryProspecto["nTotal"];


                            // Oportunidad Activa

                            if (($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                                $nCantidadProspectoOppActivo++;
                            }

                            // End  Oportunidad Activa
                        }
                    }

                    if ($aryEmpleado["nEstado"] == 1) {

                        $aryProspectosHoy  = $this->prospecto->fncGetProspectoAll(["nIdNegocio" => $nIdNegocio, "nIdUsuario" => $nIdUsuario, "dFechaCreacion" =>  date("d/m/Y")]);

                        $sColor            = '<div class="cuadrado fondo-' . strtolower($aryEmpleado["sColorSuperEmpleado"]) . ' cuadrado-reporte"></div>' . '<div style="visibility: hidden;" >' . strtolower($aryEmpleado["sColorSuperEmpleado"]) . '</div>';

                        $aryRows[] = [
                            "sColor"                      => $sColor,
                            "sColorNombre"                => strup($aryEmpleado["sColorSuperEmpleado"]),
                            "nAvance"                     => $nAvance,
                            "nRentaBasica"                => $sMoneda .  nf($nRentaBasica),
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

    public function fncGetReporteBasicoUsuarios()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdRol         = isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryEmpleados = $this->usuarios->fncGetUsuarios($nIdRol, $nIdNegocio, null, 1);

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


                    // Sexo de los usuarioss

                    switch ($aryLoop["nIdSexo"]) {

                        case $nIdSexoMasculino:
                            array_push($aryHombres, $aryLoop["nIdUsuario"]);
                            break;

                        case $nIdSexoFemenino:
                            array_push($aryMujeres, $aryLoop["nIdUsuario"]);
                            break;
                    }

                    // End Sexo de los usuarioss

                    // Experiencia en ventas

                    if ($aryLoop["nExperienciaVentas"] == 1) {
                        array_push($aryConExp, $aryLoop["nIdUsuario"]);
                    } else {
                        array_push($arySinExp, $aryLoop["nIdUsuario"]);
                    }
                    // End Experiencia en ventas
                    // Edades
                    $dFechaNacimiento = new DateTime($aryLoop["dFechaNacimiento"]);

                    $dHoy   = new DateTime("now");
                    $dDiff  = $dHoy->diff($dFechaNacimiento);

                    $nEdad = $dDiff->y;


                    if ($nEdad >= 18 && $nEdad <= 23) {
                        array_push($aryRangeEdad1, $aryLoop["nIdUsuario"]);
                    } elseif ($nEdad >= 24 && $nEdad <= 29) {
                        array_push($aryRangeEdad2, $aryLoop["nIdUsuario"]);
                    } elseif ($nEdad >= 30 && $nEdad <= 35) {
                        array_push($aryRangeEdad3, $aryLoop["nIdUsuario"]);
                    } elseif ($nEdad >= 36) {
                        array_push($aryRangeEdad4, $aryLoop["nIdUsuario"]);
                    }

                    // End Edades

                    // Estado civil

                    switch ($aryLoop["nIdEstadoCivil"]) {
                        case $nIdEstadoCivilCasado:
                            array_push($aryCasados, $aryLoop["nIdUsuario"]);
                            break;
                        case $nIdEstadoCivilSoltero:
                            array_push($arySoltero, $aryLoop["nIdUsuario"]);
                            break;
                        case $nIdEstadoCivilViudo:
                            array_push($aryViudo, $aryLoop["nIdUsuario"]);
                            break;
                        case $nIdEstadoCivilDivorciado:
                            array_push($aryDivorciado, $aryLoop["nIdUsuario"]);
                            break;
                        case $nIdEstadoCivilConviviente:
                            array_push($aryConviviente, $aryLoop["nIdUsuario"]);
                            break;
                    }

                    //End Estado civil


                    // Cantidad de hijos o personas dependientes

                    if ($aryLoop["nCantidadPersonasDependientes"] > 0) {
                        array_push($aryConHijos, $aryLoop["nIdUsuario"]);
                    } else {
                        array_push($arySinHijos, $aryLoop["nIdUsuario"]);
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


            $sMoneda   = $this->negocios->fncObtenerMoneda($nIdNegocio)[0]["sMoneda"];

            $aryProspectos  = $this->prospecto->fncGetProspectoAll(["nIdNegocio" => $nIdNegocio, "aryAsesor" => $aryAsesor]);

            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;

            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryProspectos) && fncValidateArray($aryAsesor)) {
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
                "nRentaBasica"   => $sMoneda . nf($nRentaBasica),
                "nTotalCierre"   => $nTotalCierre,
                "nTotal"         => $nTotal,
            ];

            return $aryIndicativos;
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
}
