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


    public function getUserEmpleado($nIdEmpleado)
    {
        $results = $this->db->selectOne("empleados", "nIdEmpleado = :nIdEmpleado", array(':nIdEmpleado' => $nIdEmpleado));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function fncAccesoEmpleado($sCorreo, $sClave)
    {
        $results = $this->db->run("SELECT * FROM empleados WHERE sCorreo = '$sCorreo' AND sClave = '$sClave'");
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */

        if (count($results) == 0 || $results === false) {
            return 0;
        }
        return (int) $results[0]["nIdEmpleado"];
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
        $sSQL = "INSERT INTO usuarios(
                    sNombre,
                    sApellidos,
                    sEmail,
                    sLogin,
                    sClave,
                    sImagen,
                    nIdRol,
                    nestado
                ) VALUES (
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . (is_null($sApellidos) || empty($sApellidos) ? "NULL" : "'$sApellidos'") . " ,
                    " . (is_null($sEmail) || empty($sEmail) ? "NULL" : "'$sEmail'") . " ,
                    " . (is_null($sLogin) || empty($sLogin) ? "NULL" : "'$sLogin'") . " ,
                    " . (is_null($sClave) || empty($sClave) ? "NULL" : "'$sClave'") . " ,
                    " . (is_null($sImagen) || empty($sImagen) ? "NULL" : "'$sImagen'") . " ,
                    " . (is_null($nIdRol) || empty($nIdRol) ? "NULL" : "'$nIdRol'") . " ,
                    " . $nestado . " 
                )";

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
        $sSQL = "UPDATE negocios SET ";

        $sSQL .= (!is_null($sNombre) ? " sNombre = '$sNombre' " : ' sNombre = NULL ');

        $sSQL .= (!is_null($sApellidos) ? " sApellidos = '$sApellidos' " : ' sApellidos = NULL ');

        $sSQL .= (!is_null($sEmail) ? " sEmail = '$sEmail' " : ' sEmail = NULL ');

        $sSQL .= (!is_null($sLogin) ? " sLogin = '$sLogin' " : ' sLogin = NULL ');

        $sSQL .= (!is_null($sClave) ? " sClave = '$sClave' " : ' sClave = NULL ');

        $sSQL .= (!is_null($sImagen) ? ", sImagen = '$sImagen'" : '');

        $sSQL .= (!is_null($nIdRol)  ? ", nIdRol = $nIdRol" : ', nIdRol = NULL ');

        $sSQL .= (!is_null($nestado) ? ", nestado = $nestado" : ', nestado = NULL ');

        $sSQL .= " WHERE nIdUsuario = $nIdUsuario ";

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

    public function fncBuscarUsuarioPorCorreoOLogin($sEmail,$sLogin)
    {
        $sSQL = "SELECT nIdUsuario FROM usuarios WHERE sEmail = '$sEmail' AND sLogin = '$sLogin'";
        return $this->db->run($sSQL);
    }



}
