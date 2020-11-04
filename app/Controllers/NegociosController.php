<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Entidades;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;

class NegociosController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $entidades;
    public $catalogoTabla;
    public $users;

    public function __construct()
    {
        parent::__construct();

        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->entidades     = new Entidades();
        $this->catalogoTabla = new CatalogoTabla();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function misNegocios()
    {
        try {
            // El usuario 1 es el administrador general del sistema
            $user = $this->session->get('user');
            if (isset($user["nIdUsuario"]) && !empty($user["nIdUsuario"])) {

                $aryConfigClientes        = $this->entidades->fncGetCamposByEntidad(1);
                $aryConfigCatalogos       = $this->entidades->fncGetCamposByEntidad(2);
                $aryConfigVendedores      = $this->entidades->fncGetCamposByEntidad(3);
                $aryConfigSupervisores    = $this->entidades->fncGetCamposByEntidad(4);
                $aryTipoProspectos        = $this->catalogoTabla->fncListado('TIPO_PROSPECTO');

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
                        'aryTipoProspectos'      => $aryTipoProspectos
                    )
                );
            } else {
                $this->session->close();
                $this->redirect('admin/acceso');
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncGrabarNegocio()
    {
        try {

            $nIdRegistro                = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
            $sNombre                    = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
            $sDireccion                 = isset($_POST['sDireccion']) ? $_POST['sDireccion'] : null;
            $sImagen                    = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
            $nTipoProspecto             = isset($_POST['nTipoProspecto']) ? $_POST['nTipoProspecto'] : null;
            $nEstado                    = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;
            $aryConfiguracionCliente    = isset($_POST['aryConfiguracionCliente']) ? $_POST['aryConfiguracionCliente'] : null;
            $aryConfiguracionCatalogo   = isset($_POST['aryConfiguracionCatalogo']) ? $_POST['aryConfiguracionCatalogo'] : null;
            $aryConfiguracionVendedores = isset($_POST['aryConfiguracionVendedores']) ? $_POST['aryConfiguracionVendedores'] : null;
            $aryConfiguracionSupervisor = isset($_POST['aryConfiguracionSupervisor']) ? $_POST['aryConfiguracionSupervisor'] : null;

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($sNombre) || is_null($sDireccion) || is_null($nTipoProspecto) || is_null($nEstado)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryConfiguracionCliente     = json_decode($aryConfiguracionCliente);
            $aryConfiguracionCatalogo    = json_decode($aryConfiguracionCatalogo);
            $aryConfiguracionVendedores  = json_decode($aryConfiguracionVendedores);
            $aryConfiguracionSupervisor  = json_decode($aryConfiguracionSupervisor);


            $sNombreImagen = null;
            $user          = $this->session->get('user');

            if (isset($sImagen) && !is_null($sImagen)) {
                $sNombreImagen = Upload::process($sImagen, 'multi');
            }

            // Crear 
            if ($nIdRegistro == 0) {

                $nIdNegocio = $this->negocios->fncGrabarNegocio($sNombre, $sDireccion, $sNombreImagen, $nTipoProspecto, $nEstado);

                $this->negocios->fncGrabarUsuarioNegocio($user['nIdUsuario'], $nIdNegocio);

                if (count($aryConfiguracionCliente) > 0) {
                    foreach ($aryConfiguracionCliente as $aryCliente) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryCliente->nIdCampoEntidad,  $aryCliente->nEstado);
                    }
                }

                if (count($aryConfiguracionCatalogo) > 0) {
                    foreach ($aryConfiguracionCatalogo as $aryCatalogo) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryCatalogo->nIdCampoEntidad,  $aryCatalogo->nEstado);
                    }
                }

                if (count($aryConfiguracionVendedores) > 0) {
                    foreach ($aryConfiguracionVendedores as $aryVendedor) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $aryVendedor->nIdCampoEntidad,  $aryVendedor->nEstado);
                    }
                }

                if (count($aryConfiguracionSupervisor) > 0) {
                    foreach ($aryConfiguracionSupervisor as $arySupervisor) {
                        $this->negocios->fncGrabarConfiguracionCampos($nIdNegocio, $arySupervisor->nIdCampoEntidad,  $arySupervisor->nEstado);
                    }
                }
            } else {
                //Actualizar 
                $this->negocios->fncActualizarNegocio($sNombre, $sDireccion, $sNombreImagen, $nTipoProspecto, $nEstado, $nIdRegistro);

                if (count($aryConfiguracionCliente) > 0) {
                    foreach ($aryConfiguracionCliente as $aryCliente) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryCliente->nEstado, $aryCliente->nIdConfiguracionCampo);
                    }
                }

                if (count($aryConfiguracionCatalogo) > 0) {
                    foreach ($aryConfiguracionCatalogo as $aryCatalogo) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryCatalogo->nEstado, $aryCatalogo->nIdConfiguracionCampo);
                    }
                }


                if (count($aryConfiguracionVendedores) > 0) {
                    foreach ($aryConfiguracionVendedores as $aryVendedor) {
                        $this->negocios->fncActualizarConfiguracionCampos($aryVendedor->nEstado, $aryVendedor->nIdConfiguracionCampo);
                    }
                }

                if (count($aryConfiguracionSupervisor) > 0) {
                    foreach ($aryConfiguracionSupervisor as $arySupervisor) {
                        $this->negocios->fncActualizarConfiguracionCampos($arySupervisor->nEstado, $arySupervisor->nIdConfiguracionCampo);
                    }
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Negocio registrado exitosamente...' : 'Negocio actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }


    public function fncGetNegocios()
    {
        try {
            //El usuario 1 es el administrador general del sistema
            $user = $this->session->get('user');
            $aryNegocios = $user["nIdUsuario"] == '1' ? $this->negocios->fncGetNegocios() :   $this->negocios->fncGetNegociosByIdUsuario($user["nIdUsuario"]);
            $this->json(array("success" => true, "aryData" => $aryNegocios));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncMostrarRegistro()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData     = [];
            $aryNegocios = $this->negocios->fncGetNegocioById($nIdRegistro);


            $aryConfigClientes        = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, 1);
            $aryConfigCatalogos       = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, 2);
            $aryConfigVendedores      = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, 3);
            $aryConfigSupervisores    = $this->negocios->fncGetConfiguracionCampo($nIdRegistro, 4);

            $aryData = [
                "aryNegocio"             => $aryNegocios,
                "aryConfigClientes"      => $aryConfigClientes,
                "aryConfigCatalogos"     => $aryConfigCatalogos,
                "aryConfigVendedores"    => $aryConfigVendedores,
                "aryConfigSupervisores"  => $aryConfigSupervisores
            ];

            $this->json(array("success" => true, "aryData" => $aryData));
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

            $aryNegocio = $this->negocios->fncGetNegocioById($nIdRegistro);

            // Eliminar la imagen 
            fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryNegocio['sImagen']);

            $this->negocios->fncEliminarNegocio($nIdRegistro);

            $this->json(array("success" => 'Negocio eliminado exitosamente.'));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
