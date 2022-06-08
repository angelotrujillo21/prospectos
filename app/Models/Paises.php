<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Paises
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncObtenerPaises($aryInput)
    {

        $aryAllFilters = [
            "sOrderBy"    => " p.sNombre ASC ",
            "sLimit"      => null,
            "nIdPais"     => null,
            "nEstado"     => null,
         ];

        $ary = $this->db->filterArray($aryInput, $aryAllFilters);

        $sSQL = "SELECT   
                    p.nIdPais,
                    p.sIso,
                    p.sNombre,
                    p.nEstado 
                FROM paises AS p";

     
        $sWhere = "";

        $sWhere .= ($this->db->isNull($ary["nIdPais"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdPais = {$this->db->quote($ary['nIdPais'])}  ");

        $sWhere .= ($this->db->isNull($ary["nEstado"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nEstado = {$this->db->quote($ary['nEstado'])}  ");
    
        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;
 
        $sSQL   .= ($this->db->isNull($ary["sOrderBy"]) ? "" : " ORDER BY " . $ary["sOrderBy"]);

        $sSQL   .= ($this->db->isNull($ary["sLimit"]) ? "" : " LIMIT " . $ary["sLimit"]);

        // echo $sSQL; 
        // exit; 
        return $this->db->run(trim($sSQL));
    }


  
}
