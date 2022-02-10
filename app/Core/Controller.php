<?php

namespace Application\Core;

use Application\Models\VariblesConfiguracion;
use Exception;

class Controller
{
    public function __construct()
    {
        $this->load_helper(['view']);
    }

    /**
     * @param $model
     * @return object|bool
     *
     * Load specified Model if the file exists.
     */



    protected function json($data)
    {
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); //Técnologia
    }

    protected function exception($sMessage)
    {
        throw new Exception(json_encode(["error" => $sMessage]), 1);
    }

    // Escapa los caracteres
    public function fncSlash($sString)
    {
        return (addcslashes($sString, "\/'\"\|\$\&\`\´\@"));
    }


    public function fncGetVarConfig($sNombre, $sField = "sValorPrincipal")
    {
        $config  =  new VariblesConfiguracion();
        $aryData = $config->fncGetVarConfig($sNombre, $sField);
        if (is_array($aryData) && count($aryData) > 0) {
            return $aryData[0][$sField];
        }
        return false;
    }

    /**
     * @param $view
     * @param array $data
     * @return bool
     *
     * Load specified View if the file exists.
     * The values of $data are available to the View as are the
     * index of each $data as it's own variable.
     */
    protected function view($view, $data = [])
    {
        if (file_exists(VIEWS_PATH . $view . '.phtml')) {
            // Set each index of data to its named variable.
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    $$key = $value;
                }
            }
            require_once VIEWS_PATH . $view . '.phtml';
        } else {
            $this->exception("Error No se pudo encontrar la vista");
            return false;
        }
    }





    /**
     * @param array $files
     *
     * Load Helper files.
     *
     */


    /**
     * @param array $files
     *
     * Load Helper files.
     *
     */
    protected function load_helper($files = [])
    {
        foreach ($files as $file) {
            require_once HELPERS_PATH . $file . '.php';
        }
    }

    protected function redirect($path)
    {
        header("location:" . WEB_ROOT . $path);
    }

    protected function authAdmin($session)
    {
        if ($session->getStatus() === 1 || empty($session->get('user'))) {
            $this->redirect('acceso');
        }
    }

    // protected function fncGetRoles($session)
    // {
    //     $user      = $session->get('user');
    //     $sRolUser  = $this->fncGetVarConfig("sRolUser");
    //     $sRolEmp   = $this->fncGetVarConfig("sRolEmp");

    //     return [
    //         "isUser"     =>  $user["sRol"] == $sRolUser,
    //         "isEmpleado" =>  $user["sRol"] == $sRolEmp,
    //     ];
    // }

    protected function fncGetModulos($session)
    {
        $user =  $session->get('user');

        if (!isset($user["nIdRol"])) {
            $this->redirect("mis-negocios");
        }

        $nIdRolAdmin            = $this->fncGetVarConfig("nIdRolAdmin");
        $nIdRolVisitante        = $this->fncGetVarConfig("nIdRolVisitante");
        $nIdRolAsesor           = $this->fncGetVarConfig("nIdRolAsesor");
        $nIdRolSupervisor       = $this->fncGetVarConfig("nIdRolSupervisor");

        $isAdmin         = $user["nIdRol"] == $nIdRolAdmin;
        $isVistante      = $user["nIdRol"] == $nIdRolVisitante;
        $isAsesor        = $user["nIdRol"] == $nIdRolAsesor;
        $isSupervisor    = $user["nIdRol"] == $nIdRolSupervisor;

        $aryModulos = [];

        if ($isAsesor || $isSupervisor) {
            if (!isset($user["nIdNegocio"])) {
                $this->redirect("mis-negocios");
                return;
            }
        }

        if ($isAdmin || $isVistante) {
            $aryModulos  = [
                [
                    "sNombre"      => "Home",
                    "sIcono"       => "dashboard",
                    "sUrl"         => route('home/' . $user["nIdNegocio"] . "/" . $user["nIdRol"]),
                    "arySubModulo" => []
                ],
                [
                    "sNombre"      => "Reportes",
                    "sUrl"         => "#",
                    "sIcono"       => "trending_up",
                    "arySubModulo" => [
                        [
                            "sNombre" => "Reporte de ventas",
                            "sUrl"    => route('reporte-ventas/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],
                        [
                            "sNombre" => "Reporte por consultor",
                            "sUrl"    => route('reporte-consultor/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Analisis de venta",
                            "sUrl"    => route('reporte-grafico/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Reporte Basico Empleado",
                            "sUrl"    => route('reporte-grafico/' . $user["nIdNegocio"] . "?query=rBasicoEmpleado"),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Base de datos cliente",
                            "sUrl"    => route('reporte-cliente/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],


                    ]
                ],
                [
                    "sNombre"      => "Configuracion",
                    "sUrl"         => "#",
                    "sIcono"       => "settings",
                    "arySubModulo" => [
                        [
                            "sNombre" => "Prospectos",
                            "sUrl"    => route('configuracion/prospecto/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],
                        [
                            "sNombre" => "Base de empleados",
                            "sUrl"    => route('listado-empleados/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],
                    ]
                ],
                [
                    "sNombre"      => "Salir",
                    "sIcono"       => "&#xE879;",
                    "sUrl"         => route('salir'),
                    "arySubModulo" => []
                ],
            ];
        } elseif ($isSupervisor) {


            $aryModulos  = [
                [
                    "sNombre"      => "Home",
                    "sIcono"       => "dashboard",
                    "sUrl"         => route('home/' . $user["nIdNegocio"] . "/" . $user["nIdRol"]),
                    "arySubModulo" => []
                ],
                [
                    "sNombre"      => "Reportes",
                    "sUrl"         => "#",
                    "sIcono"       => "trending_up",
                    "arySubModulo" => [
                        [
                            "sNombre" => "Reporte de ventas",
                            "sUrl"    => route('reporte-ventas/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],
                        [
                            "sNombre" => "Reporte por consultor",
                            "sUrl"    => route('reporte-consultor/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Analisis de venta",
                            "sUrl"    => route('reporte-grafico/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Reporte Basico Empleado",
                            "sUrl"    => route('reporte-grafico/' . $user["nIdNegocio"] . "?query=rBasicoEmpleado"),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Base de datos cliente",
                            "sUrl"    => route('reporte-cliente/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],


                    ]
                ],

                [
                    "sNombre"      => "Salir",
                    "sIcono"       => "&#xE879;",
                    "sUrl"         => route('salir'),
                    "arySubModulo" => []
                ],
            ];
        } elseif ($isAsesor) {
            $aryModulos  = [
                [
                    "sNombre"      => "Home",
                    "sIcono"       => "dashboard",
                    "sUrl"         => route('home/' . $user["nIdNegocio"] . "/" . $user["nIdRol"]),
                    "arySubModulo" => []
                ],
                [
                    "sNombre"      => "Reportes",
                    "sUrl"         => "#",
                    "sIcono"       => "trending_up",
                    "arySubModulo" => [
                        [
                            "sNombre" => "Reporte de ventas",
                            "sUrl"    => route('reporte-ventas/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],

                        [
                            "sNombre" => "Base de datos cliente",
                            "sUrl"    => route('reporte-cliente/' . $user["nIdNegocio"]),
                            "sIcono"  => "chevron_right"
                        ],


                    ]
                ],

                [
                    "sNombre"      => "Salir",
                    "sIcono"       => "&#xE879;",
                    "sUrl"         => route('salir'),
                    "arySubModulo" => []
                ],
            ];
        }

        return $aryModulos;
    }
}
