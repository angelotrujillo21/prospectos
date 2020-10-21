<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

class CatalogoTablaController extends Controller
{
    //model principal
    public $session;
    public $catalogoTablas;
    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->catalogoTablas = new CatalogoTabla();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function index()
    {
        try {
            $this->view(
                'admin/catalogo-tablas',
                array(
                    'user'               => $this->session->get('user'),
                    'menu'               => true,
                    'titulo'             => 'Mantenimiento de catalogo tablas',
                    'showNotificacion'   => false,
                    'aryCatalogo'        => $this->catalogoTablas->fncListaCatalogo(),
                    'aryCatalogoPadre'   => $this->catalogoTablas->fncListaCatalogoPadre(),

                )
            );
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function fncPopulate()
    {
        try {
            $sOpcion = isset($_REQUEST['sOpcion']) ? $_REQUEST['sOpcion'] : null;

            $aryResultado = $this->catalogoTablas->fncListarItemsCatalogo($sOpcion);
            $aryRows = [];

            if ($aryResultado != false) {
                foreach ($aryResultado as $aryLoop) {
                    $sNewState = $aryLoop['sEstado'] == '1' ? '0' : '1';

                    $sLinkEdit   = 'fncMostrarRegistro( ' . $aryLoop['nIdCatalogoTabla'] . ' )';
                    $sLinkState  = 'fncCambiarEstado( ' . $aryLoop['nIdCatalogoTabla'] . ", '" . $sNewState . "' )";
                    $sLinkDelete = 'fncEliminarRegistro( ' . $aryLoop['nIdCatalogoTabla'] . ' )';

                    $sIconState  = $aryLoop['sEstado'] == '1' ? 'fas fa-check'  : 'fas fa-ban';
                    $sTitleState = $aryLoop['sEstado'] == '1' ? 'Desactivar' : 'Activar';

                    $sActions = '<center>
                        <a onclick="' . $sLinkEdit . '" class="action-table far fa-edit" data-toggle="tooltip" data-placement="bottom" title="Editar"></a>
                        <a onclick="' . $sLinkState . '" class="action-table ' . $sIconState . '" data-toggle="tooltip" data-placement="bottom" title="' . $sTitleState . '"></a>
                        <a onclick="' . $sLinkDelete . '" class="action-table far fa-trash-alt" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></a>                      
                            </center>';

                    $aryRows[] = array(
                        'sAcciones' => $sActions,
                        'nIdItem'   => $aryLoop['nIdCatalogoTabla'],
                        'sCatalogo' => $aryLoop['sNombreCatalogo'],
                        'sCodigo'   => $aryLoop['sCodigoItem'],
                        'sLarga'    => $aryLoop['sDescripcionLargaItem'],
                        'sCorta'    => $aryLoop['sDescripcionCortaItem'],
                        'sTipo'     => $aryLoop['sTipoItem'] == '1' ? 'TRIBUTARIO' : 'INTERNO',
                        'sCliente'  => $aryLoop['sMostrarCliente'] == '1' ? '<a onclick="#" class="fas fa-check action-table" data-toggle="tooltip" data-placement="bottom" title="Mostrar documento al Cliente"></a>' : '',
                        'sDefecto'  => $aryLoop['sDefecto'] == '1' ? '<a onclick="#" class="fas fa-check action-table" data-toggle="tooltip" data-placement="bottom" title="Mostra este item por defecto"></a>' : '',
                        'sEstado'   => $aryLoop['sEstado'] == '1' ? 'ACTIVO' : 'INACTIVO',
                        'sPadre'    => $aryLoop['sNombreCatalogoPadre'] == null ? '' : $aryLoop['sNombreCatalogoPadre']
                    );
                }
            }

            $this->json($aryRows);
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function fncGrabaCatalogo()
    {

        // Recibe los valores del formulario
        $sNombreCatalogo = isset($_POST['sNombreCatalogo']) ? urldecode($_POST['sNombreCatalogo']) : null;

        try {

            // Valida los valores del fomulario
            if ($sNombreCatalogo == null) {
                $this->exception('Error. El nombre de la tabla no puede ser nulo. Por favor verifique.');
            }

            if ($this->catalogoTablas->fncVerficiarSiExisteCatalogo($sNombreCatalogo)) {
                $this->exception('Error. El nombre de la tabla ya existe. Por favor verifique.');
            }

            $rsSql = $this->catalogoTablas->fncRegistrarCatalogo($sNombreCatalogo);
            if (!$rsSql) {
                $this->exception('Error. No se ha registrado la tabla por un error en el servidor. Por favor verifique');
            }

            $this->json(array('success' => 'Tabla ' . stripslashes($sNombreCatalogo) . ' registrada exitosamente...'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncGrabaCatalogoItem()
    {

        // Recibe los valores del formulario
        $nIdCatalogoTabla           = isset($_POST['nIdCatalogoTabla']) ? $_POST['nIdCatalogoTabla'] : null;
        $nIdCatalogoTablaPadre      = isset($_POST['nIdCatalogoTablaPadre']) ? $_POST['nIdCatalogoTablaPadre'] : null;
        $sNombreCatalogo            = isset($_POST['sNombreCatalogo']) ? strtoupper($_POST['sNombreCatalogo']) : null;
        $sCodigoItem                = isset($_POST['sCodigoItem']) ? urldecode($_POST['sCodigoItem']) : null;
        $sDescripcionCortaItem      = isset($_POST['sDescripcionCortaItem']) ? urldecode($_POST['sDescripcionCortaItem']) : null;
        $sDescripcionLargaItem      = isset($_POST['sDescripcionLargaItem']) ? urldecode($_POST['sDescripcionLargaItem']) : null;
        $sTipoItem                  = isset($_POST['sTipoItem']) ? $_POST['sTipoItem'] : null;
        $sMostrarCliente            = isset($_POST['sMostrarCliente']) ? $_POST['sMostrarCliente'] : null;
        $sDefecto                   = isset($_POST['sDefecto']) ? $_POST['sDefecto'] : null;
        $sEstado                    = isset($_POST['sEstado']) ? $_POST['sEstado'] : null;

        try {

            // Valida los valores del fomulario
            if ($nIdCatalogoTabla == null || $sNombreCatalogo == null || $sCodigoItem == null || $sDescripcionCortaItem == null || $sDescripcionLargaItem == null || $sTipoItem == null || $sMostrarCliente == null || $sDefecto == null || $sEstado == null) {
                $this->exception('Error. Existe datos del item con valores nulos. Por favor verifique.');
            }

            // Escapa los caracteres especiales permitidos
            $sDescripcionLargaItem  = $this->fncSlash($sDescripcionLargaItem);
            $sDescripcionCortaItem  = $this->fncSlash($sDescripcionCortaItem);
            $sCodigoItem            = $this->fncSlash($sCodigoItem);

            // Item de tabla existente
            if ($nIdCatalogoTabla != 0) {
                $lSQL = $this->catalogoTablas->fncVerficarSiExisteItem($nIdCatalogoTabla, $sNombreCatalogo, $sCodigoItem, $sDescripcionLargaItem);

                if ($lSQL) {
                    $this->exception('Error. El código o descripción larga que esta actualizando ya está registrado. Por favor verifique.');
                }

                $this->catalogoTablas->fncActualizarCatalogoItem($nIdCatalogoTabla, $sCodigoItem, $sDescripcionCortaItem, $sDescripcionLargaItem, $sTipoItem, $sMostrarCliente, $sDefecto, $sEstado, $nIdCatalogoTablaPadre);

                // Nuevo item de tabla
            } else {
                $lSQL = $this->catalogoTablas->fncVerficarSiExisteItem($nIdCatalogoTabla, $sNombreCatalogo, $sCodigoItem, $sDescripcionLargaItem);

                if ($lSQL) {
                    $this->exception('Error. El código o descripción larga ya está registrado. Por favor verifique.');
                }

                $this->catalogoTablas->fncRegistrarCatalogoItem($sNombreCatalogo, $sCodigoItem, $sDescripcionCortaItem, $sDescripcionLargaItem, $sTipoItem, $sMostrarCliente, $sDefecto, $sEstado);
            }

            $sSuccess =  $nIdCatalogoTabla == 0 ? 'Item de tabla registrado exitosamente...' : 'Item de tabla actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncMostrarRegistro()
    {

        // Recibe los valores del formulario
        $nIdCatalogoTabla   = isset($_POST['nIdCatalogoTabla']) ? $_POST['nIdCatalogoTabla'] : null;

        try {
            // Valida los valores del fomulario
            if ($nIdCatalogoTabla == null) {
                $this->exception('Error. Existe datos del item con valores nulos. Por favor verifique.');
            }

            $aryData = $this->catalogoTablas->fncMostrarRegistro($nIdCatalogoTabla);

            $this->json(array("success" => true, "data" => $aryData[0]));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }



    public function fncListadoItemsPadre()
    {
        $sNombreCatalogo    = isset($_POST['sNombreCatalogo']) ? strtoupper($_POST['sNombreCatalogo']) : null;

        try {

            // Valida los valores del fomulario
            if ($sNombreCatalogo == null) {
                $this->exception('Error. Existe datos del item con valores nulos. Por favor verifique.');
            }

            $aryResultados = $this->catalogoTablas->fncListadoItemsPadre($sNombreCatalogo);

            $this->json(array("success" => true, "data" => $aryResultados));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncCambiarEstado()
    {
        // Recibe valores del formulario
        $nIdRegistro  = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $sNuevoEstado = isset($_POST['sNuevoEstado']) ? $_POST['sNuevoEstado'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null || $sNuevoEstado == null) {
                $this->exception('Error. El código de identificación del registro y/o el nuevo estado no son correctos. Por favor verifique.');
            }

            $lSQL = $this->catalogoTablas->fncCambiarEstado($nIdRegistro, $sNuevoEstado);

            if (!$lSQL) {
                $this->exception('Error. El estado del registro no ha sido actualizado. Por favor verifique.');
            }

            $this->json(array("success" => 'El registro se actualizo correctamente'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncEliminarRegistro()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $rsSql = $this->catalogoTablas->fncEliminarRegistro($nIdRegistro);

            if (!$rsSql) {
                $this->exception('Error. El registro no ha sido eliminado. Es posible que este siendo usado. Por favor verifique.');
            }

            $this->json(array("success" => 'Registro eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
