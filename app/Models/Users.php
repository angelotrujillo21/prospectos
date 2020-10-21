<?php

namespace Application\Models;

use Application\Entity\User;
use Application\Core\Database as Database;
use Application\Core\Model;

class Users
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getUser($nIdUsuario)
    {
        $results = $this->db->selectOne("usuarios", "nIdUsuario = :nIdUsuario", array(':nIdUsuario' => $nIdUsuario));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function acceso($sLogin, $sClave)
    {
        $results = $this->db->selectOne("usuarios", "sLogin = :sLogin AND sClave = :sClave", array('sLogin' => $sLogin, 'sClave' => $sClave));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return (int) $results["nIdUsuario"];
    }
}
