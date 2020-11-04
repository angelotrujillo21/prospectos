<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Clientes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function fncGrabarCliente(
        $nIdNegocio,
        $nTipoCliente,
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombreoRazonSocial,
        $sContacto,
        $sCorreo,
        $nIdDepartamento,
        $nIdProvincia,
        $nIdDistrito,
        $sTelefono,
        $nIdRelacionamiento,
        $nEstado
    ) {

        $sSQL = "INSERT INTO clientes(
                    nIdNegocio,
                    nTipoCliente,
                    nTipoDocumento,
                    sNumeroDocumento,
                    sNombreoRazonSocial,
                    sContacto,
                    sCorreo,
                    nIdDepartamento,
                    nIdProvincia,
                    nIdDistrito,
                    sTelefono,
                    nIdRelacionamiento,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nTipoCliente) || empty($nTipoCliente) ? "NULL" : "$nTipoCliente") . " ,
                    " . (is_null($nTipoDocumento) || empty($nTipoDocumento) ? "NULL" : "$nTipoDocumento") . " ,
                    " . (is_null($sNumeroDocumento) || empty($sNumeroDocumento) ? "NULL" : "'$sNumeroDocumento'") . " ,
                    " . (is_null($sNombreoRazonSocial) || empty($sNombreoRazonSocial) ? "NULL" : "'$sNombreoRazonSocial'") . " ,
                    " . (is_null($sContacto) || empty($sContacto) ? "NULL" : "'$sContacto'") . " ,
                    " . (is_null($sCorreo) || empty($sCorreo) ? "NULL" : "'$sCorreo'") . " ,
                    " . (is_null($nIdDepartamento) || empty($nIdDepartamento) ? "NULL" : "$nIdDepartamento") . " ,
                    " . (is_null($nIdProvincia) || empty($nIdProvincia) ? "NULL" : "$nIdProvincia") . " ,
                    " . (is_null($nIdDistrito) || empty($nIdDistrito) ? "NULL" : "$nIdDistrito") . " ,
                    " . (is_null($sTelefono) || empty($sTelefono) ? "NULL" : "'$sTelefono'") . " ,
                    " . (is_null($nIdRelacionamiento) || empty($nIdRelacionamiento) ? "NULL" : "$nIdRelacionamiento") . " ,
                    " . (is_null($nEstado) || empty($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        return  $this->db->run($sSQL);
    }





    public function fncActualizarEmpleado(
        $nIdCliente,
        $nIdNegocio,
        $nTipoCliente,
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombreoRazonSocial,
        $sContacto,
        $sCorreo,
        $nIdDepartamento,
        $nIdProvincia,
        $nIdDistrito,
        $sTelefono,
        $nIdRelacionamiento,
        $nEstado
    ) {

        $sSQL = "UPDATE clientes SET ";

        $sSQL .= (!is_null($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : '  ');

        $sSQL .= (!is_null($nTipoCliente) ? ", nTipoCliente = $nTipoCliente " : " nTipoCliente = NULL ");

        $sSQL .= (!is_null($nTipoDocumento) ? ", nTipoDocumento = $nTipoDocumento " : " nTipoDocumento = NULL");

        $sSQL .= (!is_null($sNumeroDocumento) && !empty($sNumeroDocumento) ? ", sNumeroDocumento = '$sNumeroDocumento' " : ', sNumeroDocumento = NULL ');

        $sSQL .= (!is_null($sNombreoRazonSocial) && !empty($sNombreoRazonSocial) ? ", sNombreoRazonSocial = '$sNombreoRazonSocial' " : ', sNombreoRazonSocial = NULL ');

        $sSQL .= (!is_null($sContacto) && !empty($sContacto) ? ", sContacto = '$sContacto' " : ', sContacto = NULL ');

        $sSQL .= (!is_null($sCorreo) && !empty($sCorreo) ? ", sCorreo = '$sCorreo' " : ', sCorreo = NULL ');

        $sSQL .= (!is_null($nIdDepartamento) ? ", nIdDepartamento = $nIdDepartamento " : ", nIdDepartamento = NULL");

        $sSQL .= (!is_null($nIdProvincia) ? ", nIdProvincia = $nIdProvincia " : ", nIdProvincia = NULL");

        $sSQL .= (!is_null($nIdDistrito) ? ", nIdDistrito = $nIdDistrito " : ", nIdDistrito = NULL");

        $sSQL .= (!is_null($sTelefono) ? ", sTelefono = '$sTelefono' " : ", nIdDistrito = NULL");

        $sSQL .= (!is_null($nIdRelacionamiento) ? ", nIdRelacionamiento = '$nIdRelacionamiento' " : ", nIdRelacionamiento = NULL");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = '$nEstado' " : ", nEstado = NULL");

        $sSQL .= " WHERE nIdCliente = $nIdCliente ";

     
        return  $this->db->run($sSQL);
    }


    public function fncEliminarCliente($nIdCliente)
    {
        $sSQL = "DELETE FROM clientes WHERE nIdCliente = $nIdCliente ";
        $this->db->run($sSQL);
    }


    public function fncGetClientes($nIdNegocio, $nEstado = null)
    {
        $sSQL = "SELECT  
                   cli.nIdCliente,
                   cli.nIdNegocio,
                   cli.nTipoCliente,
                   IFNULL(tipodoc.sDescripcionCortaItem,'') AS sTipoDoc, 
                   IFNULL(relac.sDescripcionLargaItem,'') AS sRelacionamiento,                    
                   cli.nTipoDocumento,
                   cli.sNumeroDocumento,
                   cli.sNombreoRazonSocial,
                   cli.sContacto,
                   cli.sCorreo,
                   cli.nIdDepartamento,
                   cli.nIdProvincia,
                   cli.nIdDistrito,
                   cli.sTelefono,
                   cli.nIdRelacionamiento,
                   dpt.sNombre as sDpt ,
                   prov.sNombre as sProvincia ,
                   dist.sNombre as sDistrito ,
                   cli.nEstado
                FROM clientes AS cli 
                LEFT JOIN departamentos AS dpt ON cli.nIdDepartamento = dpt.nIdDepartamento
                LEFT JOIN provincia AS prov ON cli.nIdProvincia = prov.nIdProvincia
                LEFT JOIN distrito AS dist ON cli.nIdDistrito = dist.nIdDistrito
                LEFT JOIN catalogoTabla AS relac ON cli.nIdRelacionamiento = relac.nIdCatalogoTabla
                LEFT JOIN catalogoTabla AS tipodoc ON cli.nTipoDocumento = tipodoc.nIdCatalogoTabla
                WHERE cli.nIdNegocio  = $nIdNegocio";
        $sSQL .=  is_null($nEstado) ? "" : ' AND cli.nEstado  = ' . $nEstado;
        // echo $sSQL;
        // exit;

        return $this->db->run(trim($sSQL));
    }

    public function fncGetClienteById($nIdCliente)
    {
        $sSQL = "SELECT  
                   cli.nIdCliente,
                   cli.nIdNegocio,
                   cli.nTipoCliente,
                   IFNULL(tipodoc.sDescripcionCortaItem,'') AS sTipoDoc, 
                   IFNULL(relac.sDescripcionLargaItem,'') AS sRelacionamiento,                    
                   cli.nTipoDocumento,
                   cli.sNumeroDocumento,
                   cli.sNombreoRazonSocial,
                   cli.sContacto,
                   cli.sCorreo,
                   cli.nIdDepartamento,
                   cli.nIdProvincia,
                   cli.nIdDistrito,
                   cli.sTelefono,
                   cli.nIdRelacionamiento,
                   dpt.sNombre as sDpt ,
                   prov.sNombre as sProvincia ,
                   dist.sNombre as sDistrito ,
                   cli.nEstado
                FROM clientes AS cli 
                LEFT JOIN departamentos AS dpt ON cli.nIdDepartamento = dpt.nIdDepartamento
                LEFT JOIN provincia AS prov ON cli.nIdProvincia = prov.nIdProvincia
                LEFT JOIN distrito AS dist ON cli.nIdDistrito = dist.nIdDistrito
                LEFT JOIN catalogoTabla AS relac ON cli.nIdRelacionamiento = relac.nIdCatalogoTabla
                LEFT JOIN catalogoTabla AS tipodoc ON cli.nTipoDocumento = tipodoc.nIdCatalogoTabla
                WHERE cli.nIdCliente  = $nIdCliente";
   
        return $this->db->run(trim($sSQL));
    }
}
