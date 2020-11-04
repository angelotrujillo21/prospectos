<?php

namespace Application\Controllers;

use Exception;
use Application\Core\Controller as Controller;
use Application\Models\Ubigeo;

class UbigeoController extends Controller
{

    //model principal
    public $session;
    public $ubigeo;

    public function __construct()
    {
        parent::__construct();
        $this->ubigeo = new Ubigeo();
    }

    public function fncObtenerProvincias()
    {
        try {

            $nIdDepartamento = isset($_POST['nIdDepartamento']) ? $_POST['nIdDepartamento'] : null;

            // Valida valores del formulario
            if (is_null($nIdDepartamento)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryData = $this->ubigeo->fncObtenerProvincia($nIdDepartamento);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }

    public function fncObtenerDistrito()
    {
        try {

            $nIdProvincia = isset($_POST['nIdProvincia']) ? $_POST['nIdProvincia'] : null;

            // Valida valores del formulario
            if (is_null($nIdProvincia)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryData = $this->ubigeo->fncObtenerDistrito($nIdProvincia);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            $this->json(array("error" => $ex->getMessage()));
        }
    }
}
