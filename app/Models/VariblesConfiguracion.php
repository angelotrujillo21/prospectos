<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class VariblesConfiguracion
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncGetVarConfig($sNombre , $sField = "sValorPrincipal" )
    {
        $results = $this->db->run("SELECT $sField FROM variblesconfiguracion WHERE sNombre = '$sNombre' ");   
        return $results;
    }

    





}
