<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Entidades
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncGetCamposByEntidad($nIdEntidad, $nEstado = 1)
    {
        $sSQL = "SELECT campent.nIdCampoEntidad , camp.* FROM camposentidades AS campent
                INNER JOIN campos AS camp ON campent.nIdCampo = camp.nIdCampo
                WHERE campent.nIdEntidad = $nIdEntidad AND campent.nEstado = $nEstado
                ORDER BY campent.nOrden ASC";
        return $this->db->run($sSQL);
    }
}
