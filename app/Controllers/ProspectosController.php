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
                    "titulo"                => "Configuracion de prospectos",
                    "menu"                  => true,
                    "user"                  => $this->session->get('user'),
                    'aryNotificaciones'     => $this->prospecto->fncObtenerCambiosForAdmin($nIdNegocio, 1),
                    'showNotificacion'      => true,
                    'nIdNegocio'            => $nIdNegocio,
                    'aryCamposClientes'     => $aryCamposClientes,
                    'aryCamposCatalogo'     => $aryCamposCatalogo,
                    'aryTipoCampos'         => $aryTipoCampos,
                ]
            );
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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

        try {
            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll($nIdNegocio, $nIdEmpleado, $sBuscador, $nValidacionAdmin, $nIdEtapa, $nIdSupervisor);

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

                    $aryEmpleado =  ($this->empleado->fncGetEmpleados(null, $nIdNegocio, $aryProspecto["nIdEmpleado"]));
                    $aryEmpleado =   fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];

                    $aryUltimaCita = ($this->prospecto->fncGetProspectoActividadByIdProspecto($aryProspecto["nIdProspecto"], $nTipoActividadCita, " act.nIdActividad DESC ", 1));
                    $aryUltimaCita = fncValidateArray($aryUltimaCita) > 0 ? $aryUltimaCita[0] : [];


                    if (fncValidateArray($aryUltimaCita)) {
                        $aryUltimaCita["sColor"] = $this->fncObtenerColor($aryUltimaCita["sEstadoActividadCorta"], $aryUltimaCita["dtFechaEjecucion"]);
                    }

                    $aryCatalogo = $this->prospecto->fncGetAryProspectoCatalogo($aryProspecto["nIdProspecto"], SIMBOLO_MONEDA);

                    if ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre) $nTotalCierre++;

                    if (fncValidateArray($aryCatalogo)) {
                        foreach ($aryCatalogo as $aryCat) {
                            $nAvance      += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryCat["nCantidad"] : 0;
                            $nRentaBasica += $aryProspecto["nIdEtapa"] == $nIdEtapaCierre ? $aryCat["nTotal"] : 0;
                            $nTotal       += $aryCat["nTotal"];
                        }
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
                            $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                        }
                    } else if ($sFiltro == 'CIERRES' && ($aryProspecto["nIdEtapa"] == $nIdEtapaCierre)) {
                        $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    } else if ($sFiltro == 'OPORTUNIDAD' && ($aryProspecto["nPorcentaje"] >= 25) && ($aryProspecto["nPorcentaje"] <= 90)) {
                        $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    }

                    if (is_null($sFiltro)) {
                        $aryData[] = $this->fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita);
                    }
                }
            }

            $aryIndicativos = [
                "nAvance"        => $nAvance,
                "nRentaBasica"   => SIMBOLO_MONEDA . nf($nRentaBasica),
                "nCompra"        => SIMBOLO_MONEDA . (count($aryProspectos) > 0 ?  nf($nRentaBasica / count($aryProspectos)) : 0),
                "nTicket"        => $nAvance > 0 ? intval($nRentaBasica / $nAvance) : 0,
                "nEfectividad"   => $nTotal > 0 ? ((round(($nRentaBasica / $nTotal) * 100)) . "%")  : 0,
                "nCitasCercanas" => $nCitasCercanas,
                "nTotalCierre"   => $nTotalCierre,
                "nOportunidad"   => $nOportunidad,
                "nTotal"         => $nTotal,
            ];

            $this->json(array("success" => true, "aryData" => $aryData, "aryIndicativos" => $aryIndicativos));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncBuilRowItemProspecto($aryProspecto, $aryEmpleado, $aryCatalogo, $aryUltimaCita)
    {
        return [
            "nIdProspecto"      => $aryProspecto["nIdProspecto"],
            "nIdEtapa"          => $aryProspecto["nIdEtapa"],
            "sEtapa"            => $aryProspecto["sNombreEtapa"],
            "sCliente"          => $aryProspecto["sCliente"],
            "aryEmpleado"       => $aryEmpleado,
            "aryCatalogo"       => $aryCatalogo,
            "aryUltimaCita"     => $aryUltimaCita,
            "sTimeUltimoAcceso" => fncSecondsToTime($aryProspecto["sTimeUltimoAcceso"])
        ];
    }



    public function fncGrabarProspecto()
    {
        try {
            $nIdRegistro        = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio         = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $nIdCliente         = isset($_POST['nIdCliente']) ? $_POST['nIdCliente'] : null;
            $nIdEmpleado        = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
            $aryCatalogos       = isset($_POST['aryCatalogos']) ? $_POST['aryCatalogos'] : null;
            $arySegmentaciones  = isset($_POST['arySegmentaciones']) ? $_POST['arySegmentaciones'] : null;
            $aryActividades     = isset($_POST['aryActividades']) ? $_POST['aryActividades'] : null;
            $sNota              = isset($_POST['sNota']) ? $_POST['sNota'] : null;
            $aryValueExtra      = isset($_POST['aryValueExtra']) ? $_POST['aryValueExtra'] : null;
            $nEstado            = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryValueExtra   = is_array($aryValueExtra) && count($aryValueExtra) > 0 ?  $this->fncBuildArrayValues($aryValueExtra) : [];

            if ($nIdRegistro == 0) {
                $nIdEtapa        = 1;
                $nIdNewProspecto = $this->prospecto->fncGrabarProspecto($nIdCliente, $nIdNegocio, $nIdEmpleado, $nIdEtapa, $nEstado, $aryValueExtra);

                $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, "Se creo el prospecto - " . date("d/m/Y h:i:s"), $nEstado);

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
                        $this->prospecto->fncGrabarProspectoActividad($nIdNewProspecto, $aryActi["nIdEmpleado"], $aryActi["nTipoActividad"], $aryActi["nIdEstadoActividad"], $aryActi["sFechaActividad"], $aryActi["sHoraActividad"], $aryActi["sNota"], $aryActi["nEstado"]);
                    }
                    $sCambio = ("Se creo " . count($aryActividades) . (count($aryActividades) == 1 ? " cita " : " citas "));
                    $this->prospecto->fncGrabarCambioProspecto($nIdNewProspecto, $nIdEmpleado, $sCambio, $nEstado);
                }

                if (!empty($sNota)) {
                    $this->prospecto->fncGrabarProspectoNota($nIdNewProspecto, $nIdEmpleado, $sNota, 1);
                }
            } else {
                // Actualizar
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Prospecto registrado exitosamente...' : 'Prospecto actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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

            $aryData = [
                "aryProspecto"              => $aryProspecto,
                "aryProspectoSegmentacion"  => $this->prospecto->fncGetProspectoSegmentacionByIdProspecto($nIdRegistro),
                "aryConfigExtra"            => $aryConfig
            ];

            $this->prospecto->fncActualizarFechaUltimoAccesoProspecto($nIdRegistro);
            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
                        "sColor"                  => $this->fncObtenerColor($aryActividad["sEstadoActividadCorta"], $aryActividad["dtFechaEjecucion"]),
                        "nEstado"                 => $aryActividad["nEstado"],
                    ];
                }
            }

            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
                    } else if ($df->h < 24) {
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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

            $sSuccess =  $nIdRegistro == 0 ? 'Producto o servicio registrado exitosamente...' : 'Producto o servicio exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
                    $nEstado
                );

                $sCambio =  "Se actualizo una nueva " .  $sActividad;
            }


            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdEmpleado, $sCambio, 1);

            // Validar 2 Citas Efectivas 
            $bChangeEstado = false;
            $nIdEtapaNegociacion = $this->fncGetVarConfig("nIdEtapaNegociacion");
            $aryData = $this->prospecto->fncGetActividadesByProspecto($nIdProspecto, $nTipoActividad, $this->fncGetVarConfig("nIdEstadoActividadEjecutado"));
            // Si existen mas de dos citas efectivas se actualiza el estado de prospecto a negociacion
            if ($aryData["nCantidad"] >= 2) {
                $this->prospecto->fncActualizarEstadoProspecto($nIdProspecto, $nIdEtapaNegociacion);
                $bChangeEstado = true;
            }
            // Fin de validacion 

            $sSuccess =  $nIdRegistro == 0 ?  $sActividad . ' registrado exitosamente...' :  $sActividad . ' actualizado exitosamente...';

            $this->json(array("success" => $sSuccess, "nIdEtapaNegociacion" => $nIdEtapaNegociacion, "bChangeEstado" => $bChangeEstado));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncGrabarProspectoNota()
    {
        try {
            $nIdRegistro           = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdProspecto          = isset($_POST['nIdProspecto']) ? $_POST['nIdProspecto'] : null;
            $nIdEmpleado           = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
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
                    $nIdEmpleado,
                    $sNota,
                    $nEstado
                );
                $sCambio = "Se creo una nueva nota";
            } else {

                $this->prospecto->fncActualizaProspectoNota(
                    $nIdRegistro,
                    $nIdProspecto,
                    $nIdEmpleado,
                    $sNota,
                    $nEstado
                );

                $sCambio = "Se actualizo una nota";
            }
            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdEmpleado, $sCambio, 1);

            $sSuccess =  $nIdRegistro == 0 ? 'Nota registrado exitosamente...' : 'Nota actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
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

            $sCambio = "Se hizo una actualizacion en el campo " . $sWidget;
            $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $nIdEmpleado, $sCambio, 1);
            $this->prospecto->fncActualizarControlExtra($nIdRegistro, $sCol, $sVal);
            $this->json(array("success" => 'Item actualizado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncGrabarCambioProspecto()
    {

        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEmpleado    = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;
        $sCambio        = isset($_POST['sCambio']) ? $_POST['sCambio'] : null;
        $nEstado        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncGrabarCambioProspecto($nIdRegistro, $nIdEmpleado, $sCambio, $nEstado);;
            $this->json(array("success" => "Cambio agregado  correctamente."));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncActualizarEstadoProspecto()
    {

        $nIdRegistro    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdEtapa       = isset($_POST['nIdEtapa']) ? $_POST['nIdEtapa'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) && is_null($nIdEtapa)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            // Si es envio de propuesta
            $sLinkArchivo = "";
            $bSend = false;
            if ($nIdEtapa  == $this->fncGetVarConfig("nIdEtapaEnvioPropuesta")) {
                $aryDataPropuesta = $this->fncEnviarPropuesta($nIdRegistro);
                $sLinkArchivo   = $aryDataPropuesta["sLinkArchivo"];
                $bSend          = $aryDataPropuesta["bSend"];
            }
            // Fin de envio de propueesta


            if ($nIdEtapa == $this->fncGetVarConfig("nIdEtapaCierre")) {
                $this->prospecto->fncActualizarProspectonValidacionAdmin(1);
                $sSucces = "Se actualizo el prospecto debe esperar la validacion del administrador";
            } else {
                $sSucces = "Actualizado estado del prospecto correctamente.";
                $this->prospecto->fncActualizarEstadoProspecto($nIdRegistro, $nIdEtapa);
            }

            $this->json(array("success" => $sSucces,  "sLinkArchivo" => $sLinkArchivo, "bSend" => $bSend));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncEnviarPropuesta($nIdProspecto)
    {

        try {
            $aryDataProspecto        = $this->prospecto->fncGetProspectoById($nIdProspecto);
            $aryDataProspectoDetalle = $this->prospecto->fncGetProspectoCatalogoByIdProspecto($nIdProspecto);
            $aryNegocio              = $this->negocios->fncGetNegocioById($aryDataProspecto[0]["nIdNegocio"]);
            $aryCliente              = $this->clientes->fncGetClienteById($aryDataProspecto[0]["nIdCliente"]);

            $aryData   = [
                "sTitulo"           => "Cotizacion",
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
            $mpdf->WriteHTML($html);
            $mpdf->Output($sPathArchivo);

            $aryCliente = $aryCliente[0];


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
                
                        <span style="font-size:14px">Para visualizar su cotización &nbsp; ingrese al siguiente
                        </span><b style="font-family:Arial;font-size:14px"><a href="' . $sLinkArchivo . '">link</a></b>
                    </p>
                    <p>
                        <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                    </p>
                </div>';

                if ($mail->send(['sFrom' => $aryNegocio["sNombre"], 'subject' => 'Envio de cotizacion', 'body' => $html, 'sCorreo' => $aryCliente["sCorreo"], 'sNombre' => $aryCliente["sNombreoRazonSocial"], 'sLinkArchivo' => $sPathArchivo])) {
                    return ["sLinkArchivo" => $sLinkArchivo, "bSend" => true];
                } else {
                    return ["sLinkArchivo" => $sLinkArchivo, "bSend" => false];
                }
            } else {
                return ["sLinkArchivo" => $sLinkArchivo, "bSend" => false];
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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


            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            if (fncValidateArray($aryOtros)) {
                $aryOtros = reArrayFiles($aryOtros);
            }

            $bChangeEstado = false;

            // var_dump($sContrato);
            // exit;

            // var_dump($nIdRegistro,$sContrato);

            // exit;
            if ($nIdRegistro == 0) {
                // Crear 

                if (isset($sContrato) && !is_null($sContrato)) {
                    $bChangeEstado = true;
                    $sNombreContrato = Upload::process($sContrato, 'docs');
                    $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreContrato, 1);
                }

                if (fncValidateArray($aryOtros)) {
                    foreach ($aryOtros as $aryOtro) {
                        $sNombreArchivo = Upload::process($aryOtro, 'docs');
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreArchivo, 0);
                    }
                }
            } else {
                // Actualizar

                if (isset($sContrato) && !is_null($sContrato)) {

                    if ($nIdAdjuntoContrato > 0) {

                        $aryDataContrato = $this->prospecto->fncObtenerProspectoAdjunto($nIdAdjuntoContrato);

                        if (fncValidateArray($aryDataContrato)) {
                            fncEliminarArchivo(ROOTPATHRESOURCE . 'docs/' . $aryDataContrato["sNombreArchivo"]);
                        }

                        // Si existe un adjunto
                        $bChangeEstado = true;
                        $sNombreContrato = Upload::process($sContrato, 'docs');
                        $this->prospecto->fncActualizaProspectoAdjunto($nIdAdjuntoContrato, $nIdProspecto, $sNombreContrato, 1);
                    } else {
                        // Si no existe pero se va a editar 
                        $sNombreContrato = Upload::process($sContrato, 'docs');
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreContrato, 1);
                    }
                }

                if (fncValidateArray($aryOtros)) {
                    foreach ($aryOtros as $aryOtro) {
                        $sNombreArchivo = Upload::process($aryOtro, 'docs');
                        $this->prospecto->fncGrabarProspectoAdjunto($nIdProspecto, $sNombreArchivo, 0);
                    }
                }
            }

            $nIdEtapaEnProceso = $this->fncGetVarConfig("nIdEtapaEnProceso");

            if ($bChangeEstado) {
                $this->prospecto->fncActualizarEstadoProspecto($nIdProspecto, $nIdEtapaEnProceso);;
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Adjuntos registrado exitosamente...' : 'Adjuntos actualizado exitosamente...';
            $this->json(array("success" => $sSuccess, "nIdEtapaEnProceso" => $nIdEtapaEnProceso, "bChangeEstado" => $bChangeEstado));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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

            $this->prospecto->fncEliminarProspectoAdjunto($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncObtenerProspectoAdjuntosByIdProspecto()
    {

        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->prospecto->fncObtenerProspectoAdjuntosByIdProspecto($nIdRegistro);
            $this->json(array("success" => "Mostrando resultados...", "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function fncActualizarEstadoCambiosProspecto()
    {

        $nIdNegocio = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nEstado    = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->prospecto->fncActualizarEstadoCambiosProspecto($nIdNegocio, $nEstado);
            $this->json(array("success" => "Actualizado cambios correctamente",));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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

            $this->prospecto->fncActualizarEstadoProspecto($nIdRegistro, $nIdEtapa);
            $this->json(array("success" => "Genial ! . Se termino el prospecto de forma correcta"));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
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
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
