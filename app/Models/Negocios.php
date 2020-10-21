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


    public function fncGetNegocios()
    {
        $results = $this->db->select("negocios", "nEstado = :nEstado", array(":nEstado" => 1));
        return $results;
    }



    public function fncGetNegocioById($nIdNegocio)
    {
        $results = $this->db->selectOne("negocios", "nIdNegocio = :nIdNegocio", array(":nIdNegocio" => $nIdNegocio));
        return $results;
    }


    public function fncGetNegociosByIdUsuario($idUsuario)
    {
        $resultIds = $this->db->run("SELECT IFNULL(GROUP_CONCAT(usuanego.nIdNegocio),0) as ids FROM usuariosnegocios as usuanego WHERE usuanego.nIdUsuario = $idUsuario");
        $results   = $this->db->run("SELECT * FROM negocios WHERE nIdNegocio IN (" . $resultIds[0]["ids"] . ")");
        return $results;
    }


    public function fncGrabarNegocio($sNombre, $sDireccion, $sImagen, $nTipoProspecto, $nEstado)
    {

        $sSQL = "INSERT INTO negocios(
                    sNombre,
                    sDireccion,
                    sImagen,
                    nTipoProspecto,
                    nEstado
                ) VALUES (
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . (is_null($sDireccion) || empty($sDireccion) ? "NULL" : "'$sDireccion'") . " ,
                    " . (is_null($sImagen) || empty($sImagen) ? "NULL" : "'$sImagen'") . " ,
                    " . (is_null($nTipoProspecto) || empty($nTipoProspecto) ? "NULL" : $nTipoProspecto) . " ,
                    " . (is_null($nEstado) || empty($nEstado) ? "NULL" : $nEstado) . " 
                )";


        return  $this->db->run($sSQL);
    }



    public function fncActualizarNegocio($sNombre, $sDireccion, $sImagen, $nTipoProspecto, $nEstado, $nIdNegocio)
    {

        $sSQL = "UPDATE negocios SET ";

        $sSQL .= (!is_null($sNombre) ? " sNombre = '$sNombre' " : ' sNombre = NULL ');

        $sSQL .= (!is_null($sDireccion) ? ", sDireccion = '$sDireccion'" : ', sDireccion = "" ');

        $sSQL .= (!is_null($sImagen) ? ", sImagen = '$sImagen'" : '');

        $sSQL .= (!is_null($nTipoProspecto) && !empty($nTipoProspecto) ? ", nTipoProspecto = $nTipoProspecto" : ', nTipoProspecto = NULL ');

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado" : ', nEstado = NULL ');

        $sSQL .= " WHERE nIdNegocio = $nIdNegocio ";

        return  $this->db->run($sSQL);
    }


    public function fncEliminarNegocio($nIdNegocio)
    {

        $sSQL = "DELETE FROM negocios WHERE nIdNegocio = $nIdNegocio ";
        $this->db->run($sSQL);
    }


    public function fncGrabarConfiguracionCampos($nIdNegocio, $nIdCampo, $nEstado)
    {

        $sSQL = "INSERT INTO configuracioncampos(
                    nIdNegocio,
                    nIdCampo,
                    nEstado
                    ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : $nIdNegocio) . " ,
                    " . (is_null($nIdCampo) || empty($nIdCampo) ? "NULL" : $nIdCampo) . " ,
                    " . $nEstado . " 
                )";

        return $this->db->run($sSQL);
    }

    public function fncActualizarConfiguracionCampos($nEstado, $nIdConfiguracionCampo)
    {

        $sSQL = "UPDATE configuracioncampos SET ";

        $sSQL .= (!is_null($nEstado) ? " nEstado = $nEstado" : ' nEstado = NULL ');

        $sSQL .= " WHERE nIdConfiguracionCampo = $nIdConfiguracionCampo ";

        return $this->db->run($sSQL);
    }

    public function fncGrabarUsuarioNegocio($nIdUsuario, $nIdNegocio)
    {
        $sSQL = "INSERT INTO usuariosnegocios(
                  nIdUsuario,
                  nIdNegocio
                ) VALUES (
                    " . (is_null($nIdUsuario) || empty($nIdUsuario) ? "NULL" : "$nIdUsuario") . " ,
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " 
                )";
        return  $this->db->run($sSQL);
    }



    public function fncGetConfiguracionCampo($nIdNegocio, $nIdEntidad, $nEstado  = null)
    {
        $sSQL = "SELECT 
                camp.sNombre,
                camp.sNombreUsuario,
                conf.nIdConfiguracionCampo,
                camp.nIdEntidad ,
                conf.nIdNegocio,
                conf.nIdCampo,
                conf.nEstado
                FROM configuracioncampos AS conf 
                INNER JOIN campos AS camp ON conf.nIdCampo  = camp.nIdCampo
                WHERE conf.nIdNegocio = $nIdNegocio AND camp.nIdEntidad = $nIdEntidad
                ORDER BY camp.nOrden ASC 
                ";

        $sSQL .=  is_null($nEstado) ? "" : ' AND conf.nEstado  = ' . $nEstado;
        return  $this->db->run($sSQL);
    }
}
