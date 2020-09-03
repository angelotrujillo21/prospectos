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


    public function getUser($id)
    {
        $results = $this->db->selectOne("usuarios", "idUsuario = :id", array(':id' => $id));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function acceso($usuario, $clave)
    {
        $results = $this->db->selectOne("usuarios", "loginUsuario = :usuario AND claveUsuario = :clave", array('usuario' => $usuario, 'clave' => $clave));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return (int) $results["idUsuario"];
    }
}
