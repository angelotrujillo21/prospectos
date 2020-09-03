<?php

namespace Application\Models;

use Application\Entity\User;
use Application\Core\Database as Database;
use Application\Core\Model;

class Negocios
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getNegocios()
    {
        $results = $this->db->select("negocios", "estadoNegocio = :estado", array(":estado" => 1));
        return $results;
    }



    public function getNegocioById($idNegocio)
    {
        $results = $this->db->selectOne("negocios", "idNegocio = :idNegocio", array(":idNegocio" => $idNegocio));
        return $results;
    }


    public function getNegociosByIdUsuario($idUsuario)
    {
        $resultIds = $this->db->run("SELECT IFNULL(GROUP_CONCAT(usuanego.idNegocio),0) as ids FROM usuariosnegocios as usuanego WHERE usuanego.idUsuario = $idUsuario");
        $results   = $this->db->run("SELECT * FROM negocios WHERE idNegocio IN (" . $resultIds[0]["ids"] . ")");
        return $results;
    }
}
