<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Ubigeo
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncObtenerDepartamentos()
    {
        $sSQL = "SELECT * FROM departamentos";
        return  $this->db->run($sSQL);
    }

    public function fncObtenerProvincia($nIdDepartamento)
    {
        $sSQL = "SELECT * FROM provincia WHERE nIdDepartamento = $nIdDepartamento";
        return  $this->db->run($sSQL);
    }

    public function fncObtenerDistrito($nIdProvincia)
    {
        $sSQL = "SELECT * FROM distrito WHERE nIdProvincia = $nIdProvincia";
        return  $this->db->run($sSQL);
    }
}
