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

    public function fncGetCamposByEntidad($nIdEntidad,$nEstado = 1)
    {
        $results = $this->db->select("campos", "nIdEntidad = :nIdEntidad AND nEstado = :nEstado ORDER BY nOrden ASC", array(":nIdEntidad" => $nIdEntidad,   ":nEstado" => $nEstado));
        return $results;
    }
}
