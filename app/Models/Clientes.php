<?php

namespace Application\Models;

use PDO;
use Application\Core\Model;
use Application\Core\Database as Database;

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
        $sDireccion,
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
                    sDireccion,
                    sTelefono,
                    dFechaCreacion,
                    nIdRelacionamiento,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nTipoCliente) || empty($nTipoCliente) ? "NULL" : "$nTipoCliente") . " ,
                    " . (is_null($nTipoDocumento) || empty($nTipoDocumento) ? "NULL" : "$nTipoDocumento") . " ,
                    " . (is_null($sNumeroDocumento) || empty($sNumeroDocumento) ? "NULL" : $this->db->quote($sNumeroDocumento)) . " ,
                    " . (is_null($sNombreoRazonSocial) || empty($sNombreoRazonSocial) ? "NULL" : $this->db->quote($sNombreoRazonSocial)) . " ,
                    " . (is_null($sContacto) || empty($sContacto) ? "NULL" : $this->db->quote($sContacto)) . " ,
                    " . (is_null($sCorreo) || empty($sCorreo) ? "NULL" : $this->db->quote($sCorreo)) . " ,
                    " . (is_null($nIdDepartamento) || empty($nIdDepartamento) ? "NULL" : "'$nIdDepartamento'") . " ,
                    " . (is_null($nIdProvincia) || empty($nIdProvincia) ? "NULL" : "'$nIdProvincia'") . " ,
                    " . (is_null($nIdDistrito) || empty($nIdDistrito) ? "NULL" : "'$nIdDistrito'") . " ,
                    " . (is_null($sDireccion) || empty($sDireccion) ? "NULL" : $this->db->quote($sDireccion)) . " ,
                    " . (is_null($sTelefono) || empty($sTelefono) ? "NULL" : $this->db->quote($sTelefono)) . " ,
                    " . " NOW() " . " ,
                    " . (is_null($nIdRelacionamiento) || empty($nIdRelacionamiento) ? "NULL" : "$nIdRelacionamiento") . " ,
                    " . (is_null($nEstado) || empty($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        return  $this->db->run($sSQL);
    }


    public function fncActualizarClientes(
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
        $sDireccion,
        $sTelefono,
        $nIdRelacionamiento,
        $nEstado
    ) {

        $sSQL = "UPDATE clientes SET ";

        $sSQL .= (!is_null($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : '  ');

        $sSQL .= (!is_null($nTipoCliente) ? ", nTipoCliente = $nTipoCliente " : " nTipoCliente = NULL ");

        $sSQL .= (!is_null($nTipoDocumento) ? ", nTipoDocumento = $nTipoDocumento " : " nTipoDocumento = NULL");

        $sSQL .= (!is_null($sNumeroDocumento) && !empty($sNumeroDocumento) ? ", sNumeroDocumento =  {$this->db->quote($sNumeroDocumento)} " : ', sNumeroDocumento = NULL ');

        $sSQL .= (!is_null($sNombreoRazonSocial) && !empty($sNombreoRazonSocial) ? ", sNombreoRazonSocial = {$this->db->quote($sNombreoRazonSocial)} "  : ', sNombreoRazonSocial = NULL ');

        $sSQL .= (!is_null($sContacto) && !empty($sContacto) ? ", sContacto = {$this->db->quote($sContacto)} " : ', sContacto = NULL ');

        $sSQL .= (!is_null($sCorreo) && !empty($sCorreo) ? ", sCorreo = {$this->db->quote($sCorreo)} " : ', sCorreo = NULL ');

        $sSQL .= (!is_null($nIdDepartamento) ? ", nIdDepartamento = '$nIdDepartamento' " : ", nIdDepartamento = NULL");

        $sSQL .= (!is_null($nIdProvincia) ? ", nIdProvincia = '$nIdProvincia' " : ", nIdProvincia = NULL");

        $sSQL .= (!is_null($nIdDistrito) ? ", nIdDistrito = '$nIdDistrito' " : ", nIdDistrito = NULL");

        $sSQL .= (!is_null($sDireccion) ? ", sDireccion = {$this->db->quote($sDireccion)} " : ", sDireccion = NULL");

        $sSQL .= (!is_null($sTelefono) ? ", sTelefono = {$this->db->quote($sTelefono)} " : ", sTelefono = NULL");

        $sSQL .= (!is_null($nIdRelacionamiento) ? ", nIdRelacionamiento = '$nIdRelacionamiento' " : ", nIdRelacionamiento = NULL");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = '$nEstado' " : ", nEstado = NULL");

        $sSQL .= " WHERE nIdCliente = $nIdCliente ";

        // echo $sSQL;
        // exit;

        return  $this->db->run($sSQL);
    }


    public function fncEliminarCliente($nIdCliente)
    {
        $sSQL = "DELETE FROM clientes WHERE nIdCliente = $nIdCliente ";
        $this->db->run($sSQL);
    }


    public function fncGetClientes($nIdNegocio, $nEstado = null, $nTipoCliente = null, $sOrderBy = null)
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
                   cli.sDireccion,
                   cli.sTelefono,
                   cli.nIdRelacionamiento,
                   dpt.sNombre as sDpt ,
                   prov.sNombre as sProvincia ,
                   dist.sNombre as sDistrito ,
                   IFNULL( DATE_FORMAT( cli.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
                   TIME_TO_SEC(TIMEDIFF(NOW(), cli.dFechaCreacion)) AS sTimeFechaCreacion,
                   cli.nEstado
                FROM clientes AS cli 
                LEFT JOIN departamentos AS dpt ON cli.nIdDepartamento = dpt.nIdDepartamento
                LEFT JOIN provincia AS prov ON cli.nIdProvincia = prov.nIdProvincia
                LEFT JOIN distrito AS dist ON cli.nIdDistrito = dist.nIdDistrito
                LEFT JOIN catalogotabla AS relac ON cli.nIdRelacionamiento = relac.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS tipodoc ON cli.nTipoDocumento = tipodoc.nIdCatalogoTabla
               ";


        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cli.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nEstado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cli.nEstado = $nEstado ");

        $sWhere .= (is_null($nTipoCliente)  || empty($nTipoCliente)   ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cli.nTipoCliente = $nTipoCliente ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= !is_null($sOrderBy) ? " ORDER BY $sOrderBy  " : "";


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
                   (CASE WHEN cli.nTipoCliente = 1 THEN 'Empresa' ELSE 'Persona' END) AS sTipoCliente,
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
                   cli.sDireccion,
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
                LEFT JOIN catalogotabla AS relac ON cli.nIdRelacionamiento = relac.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS tipodoc ON cli.nTipoDocumento = tipodoc.nIdCatalogoTabla
                WHERE cli.nIdCliente  = $nIdCliente";

        return $this->db->run(trim($sSQL));
    }


    public function fncGetClienteByNumDoc($nIdNegocio, $nTipoDocumento, $sNumeroDocumento)
    {
        $sSQL = "SELECT  
                   *
                FROM clientes AS cli 
                WHERE cli.nIdNegocio = $nIdNegocio AND cli.nTipoDocumento = '$nTipoDocumento' AND cli.sNumeroDocumento = {$this->db->quote($sNumeroDocumento)} ";

        return $this->db->run(trim($sSQL));
    }

    
    public function fncGetClienteByNombre($nIdNegocio, $sNombreoRazonSocial)
    {
        $sSQL = "SELECT  
                   *
                FROM clientes AS cli 
                WHERE cli.nIdNegocio = $nIdNegocio AND cli.sNombreoRazonSocial =  {$this->db->quote($sNombreoRazonSocial)} ";

        return $this->db->run(trim($sSQL));
    }

    public function fncCambiarEstado($nIdCliente, $nEstado)
    {
        $sSQL = "UPDATE clientes SET nEstado = $nEstado WHERE nIdCliente  = $nIdCliente";
        return $this->db->run(trim($sSQL));
    }
}
