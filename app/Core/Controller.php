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
        throw new Exception($sMessage, 1);
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
        if (file_exists(VIEWS_PATH . $view . '.php')) {
            // Set each index of data to its named variable.
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    $$key = $value;
                }
            }
            require_once VIEWS_PATH . $view . '.php';
        } else {
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
            $this->redirect('admin/acceso');
        }
    }

    protected function authEmpleado($session)
    {
        if ($session->getStatus() === 1 || empty($session->get('userEmpleado'))) {
            $this->redirect('acceso');
        }
    }
}
