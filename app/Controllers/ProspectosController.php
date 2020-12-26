<?php

namespace Application\Controllers;

use DateTime;
use Exception;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Empleados;
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
    public $empleado;
    public $catalogoTabla;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->catalogoTabla = new CatalogoTabla();
        $this->prospecto     = new Prospecto();
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
        $nIdNegocio  = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdEmpleado = isset($_POST['nIdEmpleado']) ? $_POST['nIdEmpleado'] : null;

        try {
            // Valida valores del formulario
            if ($nIdNegocio == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = [];
            $aryProspectos  = $this->prospecto->fncGetProspectoAll($nIdNegocio, $nIdEmpleado);

            $nAvance        = 0;
            $nRentaBasica   = 0;
            $nRentaBasica   = 0;
            $nTotal         = 0;
            $nTotalCierre   = 0;

            $nIdEtapaCierre = $this->fncGetVarConfig("nIdEtapaCierre");

            if (fncValidateArray($aryProspectos)) {
                foreach ($aryProspectos as $aryProspecto) {

                    $aryEmpleado =  ($this->empleado->fncGetEmpleados(null, $nIdNegocio, $aryProspecto["nIdEmpleado"]));
                    $aryEmpleado =   fncValidateArray($aryEmpleado) > 0 ? $aryEmpleado[0] : [];

                    $aryUltimaCita = ($this->prospecto->fncGetProspectoActividadByIdProspecto($aryProspecto["nIdProspecto"], 1, " act.nIdActividad DESC ", 1));
                    $aryUltimaCita = fncValidateArray($aryUltimaCita) > 0 ? $aryUltimaCita[0] : [];

                    $aryCatalogo = $this->prospecto->fncGetAryProspectoCatalogo($aryProspecto["nIdProspecto"], SIMBOLO_MONEDA);


                    if ($aryProspecto == $nIdEtapaCierre) $nTotalCierre++;

                    if (fncValidateArray($aryCatalogo)) {
                        foreach ($aryCatalogo as $aryCat) {
                            $nAvance      += $aryCat["nCantidad"];
                            $nRentaBasica += $aryProspecto == $nIdEtapaCierre ? $aryCat["nTotal"] : 0;
                            $nTotal       += $aryCat["nTotal"];
                        }
                    }


                    $aryData[] = [
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

                $aryIndicativos = [

                    "nAvance"       => $nAvance,
                    "nRentaBasica"  => SIMBOLO_MONEDA . nf($nRentaBasica),
                    "nCompra"       => SIMBOLO_MONEDA . nf($nRentaBasica / count($aryProspectos)),
                    "nTicket"       => intval($nRentaBasica / $nAvance),
                    "nEfectividad"  => intval($nTotal / count($aryProspectos)) . "%",
                    "nTotalCierre"  => $nTotalCierre,

                ];
            }

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
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

            $sNombreDb = fncSanitizeDb($sNombre);
            $nSize     = 250;

            if ($nIdRegistro == 0) {
                $aryValidate = $this->prospecto->fncGetProspectoByName($sNombreDb);

                if (is_array($aryValidate) && count($aryValidate)) {
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

                $sCambio = "Se agrego una nueva " . ($nTipoActividad == "1" ? "actividad" : "");
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

                $sCambio =  "Se actualizo una nueva " . ($nTipoActividad == "1" ? "actividad" : "");
            }


            $this->prospecto->fncGrabarCambioProspecto($nIdProspecto, $nIdEmpleado, $sCambio, 1);

            $sSuccess =  $nIdRegistro == 0 ? 'Cita registrado exitosamente...' : 'Cita actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
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
        $z       = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) && is_null($nIdEtapa)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            // Si es envio de propuesta
            if ($nIdEtapa  == $this->fncGetVarConfig("nIdEtapaEnvioPropuesta")) {
            }

            $this->prospecto->fncActualizarEstadoProspecto($nIdRegistro, $nIdEtapa);;
            $this->json(array("success" => "Actualizado estado del prospecto correctamente."));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncEnviarPropuesta($nIdPropsecto){
        $aryDataProspecto        = $this->prospecto->fncGetProspectoById($nIdPropsecto);
        $aryDataProspectoDetalle = $this->prospecto->fncGetProspectoCatalogoByIdProspecto($nIdPropsecto);
    }
}
