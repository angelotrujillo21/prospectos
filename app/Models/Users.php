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
        $results = $this->db->selectOne("usuarios", "sLogin = :sLogin AND sClave = :sClave AND nEstado = 1", array('sLogin' => $sLogin, 'sClave' => $sClave));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        return $results;
    }


    public function getUserEmpleado($nIdEmpleado)
    {
        $results = $this->db->selectOne("empleados", "nIdEmpleado = :nIdEmpleado", array(':nIdEmpleado' => $nIdEmpleado));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function fncAccesoEmpleado($nIdNegocio, $sCorreo, $sClave)
    {
        $results = $this->db->run("SELECT * FROM empleados WHERE nIdNegocio = $nIdNegocio AND sCorreo = '$sCorreo' AND sClave = '$sClave' AND nEstado = 1");
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */

        if (count($results) == 0 || $results === false) {
            return 0;
        }
        return (int) $results[0]["nIdEmpleado"];
    }

    public function fncAccesosEmpleado($sCorreo, $sClave)
    {
        $results = $this->db->run("SELECT * FROM empleados WHERE sCorreo = '$sCorreo' AND sClave = '$sClave' AND nEstado = 1");
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        return $results;
    }

    public function fncGrabarUsuario(
        $sNombre,
        $sApellidos,
        $sEmail,
        $sLogin,
        $sClave,
        $sImagen,
        $nIdRol,
        $nestado
    ) {
        $sSQL =  $this->db->generateSQLInsert("usuarios", [
            "sNombre"    => $sNombre,
            "sApellidos" => $sApellidos,
            "sEmail"     => $sEmail,
            "sLogin"     => $sLogin,
            "sClave"     => $sClave,
            "nIdRol"     => $nIdRol,
            "sImagen"    => $sImagen,
            "nestado"    => $nestado
        ]);

        return  $this->db->run($sSQL);
    }

    public function fncActualizarUsuario(
        $nIdUsuario,
        $sNombre,
        $sApellidos,
        $sEmail,
        $sLogin,
        $sClave,
        $sImagen,
        $nIdRol,
        $nestado
    ) {


        $sSQL =  $this->db->generateSQLUpdate("usuarios", [
            "sNombre"    => $sNombre,
            "sApellidos" => $sApellidos,
            "sEmail"     => $sEmail,
            "sLogin"     => $sLogin,
            "sClave"     => $sClave,
            "nIdRol"     => $nIdRol,
            "sImagen"    => $sImagen,
            "nestado"    => $nestado
        ], "nIdUsuario = $nIdUsuario");

        return  $this->db->run($sSQL);
    }


    public function fncEliminarUsuario($nIdUsuario)
    {
        $sSQL = "DELETE FROM usuarios WHERE nIdUsuario = $nIdUsuario ";
        $this->db->run($sSQL);
    }

    public function fncBuscarUsuarioPorCorreo($sEmail)
    {
        $sSQL = "SELECT nIdUsuario FROM usuarios WHERE sEmail = '$sEmail'";
        return $this->db->run($sSQL);
    }

    public function fncBuscarUsuarioPorCorreoOLogin($sEmail, $sLogin)
    {
        $sSQL = "SELECT nIdUsuario FROM usuarios WHERE sEmail = '$sEmail' AND sLogin = '$sLogin'";
        return $this->db->run($sSQL);
    }

  
}
