<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;
use Application\Models\Segmentacion;

class SegmentacionController extends Controller
{

    //model principal
    public $segmentacion;


    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->segmentacion   = new Segmentacion();
    }


    public function fncPopulateSegmentacion($nIdNegocio, $nTipoSegmento)
    {
        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nTipoSegmento)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows            = [];
            $arySegmentaciones  = $this->segmentacion->fncGetSegmentacion($nIdNegocio, $nTipoSegmento);

            if (is_array($arySegmentaciones) && count($arySegmentaciones) > 0) {

                foreach ($arySegmentaciones as $arySegmentacion) {
                    $aryDetalle       = [];
                    $sActionVer       = "fncDetalleSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . " , '" . $arySegmentacion['sNombre'] . "' );";
                    $sActionEdit      = "fncMostrarSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . ");";
                    $sActionEliminar  = "fncEliminarSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . ");";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    <a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                    <a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                </div>';

                    $aryDetalle = $this->segmentacion->fncGetDetalleSegmentacion($arySegmentacion['nIdSegmentacion']);
                    $aryDetalle = is_array($aryDetalle) && count($aryDetalle) > 0 ? array_column($aryDetalle, 'sNombre') : [];

                    $aryRows[] = [
                        "sAcciones"  => $sAcciones,
                        "sNombre"    => $arySegmentacion["sNombre"],
                        "sValores"   => is_array($aryDetalle) && count($aryDetalle) > 0 ? implode("<br>", $aryDetalle) : "",
                        "nEstado"    => $arySegmentacion["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncGetSegmentacionAll($nIdNegocio, $nTipoSegmento ,$nEstado)
    {
        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio) || is_null($nTipoSegmento)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows            = [];
            $arySegmentaciones  = $this->segmentacion->fncGetSegmentacion($nIdNegocio, $nTipoSegmento, $nEstado);

            if (is_array($arySegmentaciones) && count($arySegmentaciones) > 0) {
                foreach ($arySegmentaciones as $arySegmentacion) {

                    $aryDetalle = [];
                    $aryDetalle = $this->segmentacion->fncGetDetalleSegmentacion($arySegmentacion['nIdSegmentacion']);

                    $aryRows[] = [
                        "nIdSegmentacion" => $arySegmentacion["nIdSegmentacion"],
                        "sNombre"         => $arySegmentacion["sNombre"],
                        "aryDetalle"      => $aryDetalle,
                        "nEstado"         => $arySegmentacion["nEstado"],
                    ];
                }
            }

            return $aryRows;
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncPopulateDetalleSegmentacion()
    {
        try {

            $nIdSegmentacion = isset($_POST['nIdSegmentacion']) ? $_POST['nIdSegmentacion'] : null;

            // Valida valores del formulario
            if (is_null($nIdSegmentacion)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows            = [];
            $arySegmentaciones  = $this->segmentacion->fncGetDetalleSegmentacion($nIdSegmentacion);

            if (is_array($arySegmentaciones) && count($arySegmentaciones) > 0) {

                foreach ($arySegmentaciones as $arySegmentacion) {

                    $sActionEdit      = "fncMostrarItemSegmentacion(" . $arySegmentacion['nIdDetalleSegmentacion'] . "," . $arySegmentacion['nIdSegmentacion'] . ");";
                    $sActionEliminar  = "fncEliminarDetalleSegmentacion(" . $arySegmentacion['nIdDetalleSegmentacion'] . "," . $arySegmentacion['nIdSegmentacion'] . ");";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                    <a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                </div>';

                    $aryRows[] = [
                        "sAcciones"  => $sAcciones,
                        "sNombre"    => $arySegmentacion["sNombre"],
                        "nEstado"    => $arySegmentacion["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncGrabarSegmentacion()
    {
        try {

            $nIdRegistro                    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdNegocio                     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
            $sNombre                        = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $nTipoSegmento                  = isset($_POST['nTipoSegmento']) ? $_POST['nTipoSegmento'] : null;
            $nEstado                        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdNegocio) || is_null($nTipoSegmento)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // Crear 
            if ($nIdRegistro == 0) {

                $this->segmentacion->fncGrabarSegmentacion($nIdNegocio, $nTipoSegmento, $sNombre, $nEstado);
            } else {
                //Actualizar 
                $this->segmentacion->fncActualizarSegmentacion($nIdRegistro, $nIdNegocio, $nTipoSegmento, $sNombre, $nEstado);
            }

            $sTipo    = $nTipoSegmento == 1 ? 'Segmentacion' : 'Competencia';
            $sSuccess = $nIdRegistro == 0 ? $sTipo . ' registrado exitosamente...' : $sTipo . ' actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncMostrarSegmentacion()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->segmentacion->fncGetSegmentacionById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncEliminarSegmentacion()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->segmentacion->fncEliminarSegmentacion($nIdRegistro);

            $this->json(array("success" => 'Segmentacion eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncGrabarDetalleSegmentacion()
    {
        try {

            $nIdRegistro                    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $nIdSegmentacion                = isset($_POST['nIdSegmentacion']) ? $_POST['nIdSegmentacion'] : null;
            $sNombre                        = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $nEstado                        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nIdSegmentacion)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // Crear 
            if ($nIdRegistro == 0) {

                $this->segmentacion->fncGrabarDetalleSegmentacion($nIdSegmentacion, $sNombre, $nEstado);
            } else {
                //Actualizar 
                $this->segmentacion->fncActualizarDetalleSegmentacion($nIdRegistro, $nIdSegmentacion, $sNombre, $nEstado);
            }

            $sSuccess = $nIdRegistro == 0 ? 'Item registrado exitosamente...' : 'Item actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncMostrarDetalleSegmentacion()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->segmentacion->fncGetDetalleSegmentacionById($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncEliminarDetalleSegmentacion()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->segmentacion->fncEliminarDetalleSegmentacion($nIdRegistro);

            $this->json(array("success" => 'Item eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
