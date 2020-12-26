<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\CatalogoTabla;
use Application\Core\Controller as Controller;
use Application\Models\Empleados;

class DashboardController extends Controller
{

    //model principal
    public $negocios;
    public $session;
    public $catalogoTabla;
    public $empleados;

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->session       = new Session();
        $this->negocios      = new Negocios();
        $this->catalogoTabla = new CatalogoTabla();
        $this->empleados     = new Empleados();
        $this->session->init();
        $this->authAdmin($this->session);
    }

    public function index($nIdNegocio)
    {
        try {
            $negocio = $this->negocios->fncGetNegocioById($nIdNegocio);

            if ($negocio != false) {
                $user = $this->session->get('user');
                $user["nIdNegocio"] = $nIdNegocio;
                $this->session->add("user", $user);

                $aryColores = $this->empleados->fncGetColoresEmpleados($nIdNegocio);
                $sColores   = is_array($aryColores) && count($aryColores) > 0 ? implode(",", array_column($aryColores, 'nIdColor')) : "0";

                $this->view(
                    'admin/home',
                    array(
                        'negocio'                 => $negocio,
                        'user'                    => $this->session->get('user'),
                        'menu'                    => true,
                        'titulo'                  => 'Home',
                        'showNotificacion'        => true,
                        'aryColores'              => $this->catalogoTabla->fncListado('COLORES', "nIdCatalogoTabla NOT IN($sColores)"),
                        'aryTipoEmpleados'        => $this->catalogoTabla->fncListado('TIPO_EMPLEADO'),
                        'arySupervisores'         => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoSupervisor"), $nIdNegocio),
                        'aryVendedores'           => $this->empleados->fncGetEmpleados($this->fncGetVarConfig("nTipoEmpleadoAsesorVentas"), $nIdNegocio),
                        'nTipoEmpleadoSupervisor' => $this->fncGetVarConfig("nTipoEmpleadoSupervisor")
                    )
                );
            } else {
                $this->redirect('admin/mis-negocios');
            }
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
