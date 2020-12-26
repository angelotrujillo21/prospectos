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
                    " . $nEstado . " 
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
                    nIdCampoEntidad,
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

        $sSQL .= (!is_null($nEstado) ? " nEstado = $nEstado " : ' nEstado = NULL ');

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



    public function fncGetConfiguracionCampo($nIdNegocio, $nIdEntidad, $nEstado  = null, $nOrdenTable = false)
    {
        $sSQL = "SELECT 
                    conf.nIdConfiguracionCampo AS nIdConfiguracionCampo ,
                    campent.nIdCampoEntidad AS nIdCampoEntidad,
                    camp.nIdCampo,
                    camp.sNombre,
                    camp.sNombreUsuario,
                    camp.sPlaceHolder,
                    camp.nTipoCampo,
                    tipocam.sNombre AS sNombreTipoCampo,
                    camp.sNombreConfig,
                    camp.nTamano,
                    conf.nEstado
                FROM configuracioncampos AS conf 
                INNER JOIN camposentidades AS campent ON conf.nIdCampoEntidad = campent.nIdCampoEntidad
                INNER JOIN campos AS camp ON campent.nIdCampo = camp.nIdCampo
                INNER JOIN tiposcampos AS tipocam ON camp.nTipoCampo = tipocam.nTipoCampo
                WHERE conf.nIdNegocio = $nIdNegocio AND campent.nIdEntidad = $nIdEntidad
                ";
                
        $sSQL .= is_null($nEstado) ? "" : ' AND conf.nEstado  = ' . $nEstado;
        $sSQL .= $nOrdenTable ? " ORDER BY campent.nOrdenTabla ASC " : " ORDER BY campent.nOrden ASC ";

        return  $this->db->run($sSQL);
    }
}
