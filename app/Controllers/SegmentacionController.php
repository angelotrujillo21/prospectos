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
    public $session;

    public function __construct()
    {
        parent::__construct();
        $this->segmentacion     = new Segmentacion();
        $this->session          = new Session();
        $this->session->init();
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


            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nIdRol"] == $this->fncGetVarConfig("nIdRolAdmin") ? true : false;

            if (is_array($arySegmentaciones) && count($arySegmentaciones) > 0) {

                foreach ($arySegmentaciones as $arySegmentacion) {

                    $aryDetalle       = [];

                    $sNewState        = $arySegmentacion['nEstado'] == '1' ? '0' : '1';
                    
                    $sActionState     = 'fncCambiarEstadoSegmentacion(' . "'" . $arySegmentacion['nIdSegmentacion'] . "'," . $sNewState  . "," . $arySegmentacion['nTipoSegmento'] . " )";
                    $sActionVer       = "fncDetalleSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . " , '" . $arySegmentacion['sNombre'] . "' );";
                    $sActionEdit      = "fncMostrarSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . ");";
                    $sActionEliminar  = "fncEliminarSegmentacion(" . $arySegmentacion['nIdSegmentacion'] . "," . $arySegmentacion['nTipoSegmento'] . ");";

                    $sIconState     = $arySegmentacion['nEstado'] == '1'  ? 'power_settings_new' : 'check';
                    $sTitleState    = $arySegmentacion['nEstado'] == '1' ? 'Desactivar' : 'Activar';

                    $sLinkEdit      = $bIsRolAdmin ? '<a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>' : '';
                    $sLinkEliminar  = $bIsRolAdmin ? '<a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>' : '';
                    $sLinkState     = $bIsRolAdmin ? '<a onclick="' . $sActionState . '"  href="javascript:;"  class="text-primary" title="' . $sTitleState . '"><i class="material-icons">' . $sIconState . '</i></a></a>' : '';

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    ' . $sLinkEdit . '
                                    '. $sLinkState  .'
                                    ' . $sLinkEliminar . '
                                </div>';

                    $aryDetalle = $this->segmentacion->fncGetDetalleSegmentacion($arySegmentacion['nIdSegmentacion'],1);
                    $aryDetalle = is_array($aryDetalle) && count($aryDetalle) > 0 ? array_column($aryDetalle, 'sNombre') : [];

                    $aryRows[] = [
                        "sAcciones"  => $sAcciones,
                        "sNombre"    => $arySegmentacion["sNombre"],
                        "sValores"   => is_array($aryDetalle) && count($aryDetalle) > 0 ? implode(" , ", $aryDetalle) : "",
                        "nEstado"    => $arySegmentacion["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",
                    ];
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
             echo $ex->getMessage();
        }
    }


    public function fncGetSegmentacionAll($nIdNegocio, $nTipoSegmento, $nEstado)
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
                    $aryDetalle = $this->segmentacion->fncGetDetalleSegmentacion($arySegmentacion['nIdSegmentacion'],$nEstado);

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
             echo $ex->getMessage();
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


            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nIdRol"] == $this->fncGetVarConfig("nIdRolAdmin") ? true : false;


            if (is_array($arySegmentaciones) && count($arySegmentaciones) > 0) {

                foreach ($arySegmentaciones as $arySegmentacion) {

                    
                    $sNewState        = $arySegmentacion['nEstado'] == '1' ? '0' : '1';
                    
                    $sActionState     = 'fncCambiarEstadoDetalleSegmentacion(' . "'" . $arySegmentacion['nIdDetalleSegmentacion'] . "'," . $sNewState  . "," . $arySegmentacion['nIdSegmentacion'] . " )";
                    $sActionEdit      = "fncMostrarItemSegmentacion(" . $arySegmentacion['nIdDetalleSegmentacion'] . "," . $arySegmentacion['nIdSegmentacion'] . ");";
                    $sActionEliminar  = "fncEliminarDetalleSegmentacion(" . $arySegmentacion['nIdDetalleSegmentacion'] . "," . $arySegmentacion['nIdSegmentacion'] . ");";


                    $sIconState     = $arySegmentacion['nEstado'] == '1'  ? 'power_settings_new' : 'check';
                    $sTitleState    = $arySegmentacion['nEstado'] == '1' ? 'Desactivar' : 'Activar';

                    $sLinkEdit      = $bIsRolAdmin ? '<a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>' : '';
                    $sLinkEliminar  = $bIsRolAdmin ? '<a onclick="' . $sActionEliminar . '" href="javascript:;"  title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>' : '';
                    $sLinkState     = $bIsRolAdmin ? '<a onclick="' . $sActionState . '"  href="javascript:;"  class="text-primary" title="' . $sTitleState . '"><i class="material-icons">' . $sIconState . '</i></a></a>' : '';

                    $sAcciones = '<div class="content-acciones">
                                    ' . $sLinkEdit . '
                                    ' . $sLinkState . '
                                    ' . $sLinkEliminar . '
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
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
             echo $ex->getMessage();
        }
    }

            
    public function fncCambiarEstadoDetalle()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nEstado     = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nEstado)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->segmentacion->fncCambiarEstadoDetalle($nIdRegistro, $nEstado);
            $this->json(array("success" => "Genial se realizo el cambio de estado exitosamente."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
