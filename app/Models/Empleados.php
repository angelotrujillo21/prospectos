<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Empleados
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function fncGrabarEmpleado(
        $nIdNegocio,
        $nTipoEmpleado,
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombre,
        $sCorreo,
        $nIdColor,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $nIdSupervisor,
        $sClave,
        $sImagen,
        $nEstado
    ) {

        $sSQL = "INSERT INTO empleados(
                    nIdNegocio,
                    nTipoEmpleado,
                    nTipoDocumento,
                    sNumeroDocumento,
                    sNombre,
                    sCorreo,
                    nIdColor,
                    dFechaNacimiento,
                    nCantidadPersonasDependientes,
                    nExperienciaVentas,
                    sRubroExperiencia,
                    nIdEstudios,
                    nIdSituacionEstudios,
                    sCarreraCiclo,
                    dFechaHoraRegistro,
                    dFechaHoraUltimoAcceso,
                    nIdSupervisor,
                    sClave,
                    sImagen,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nTipoEmpleado) || empty($nTipoEmpleado) ? "NULL" : "$nTipoEmpleado") . " ,
                    " . (is_null($nTipoDocumento) || empty($nTipoDocumento) ? "NULL" : "$nTipoDocumento") . " ,
                    " . (is_null($sNumeroDocumento) || empty($sNumeroDocumento) ? "NULL" : "'$sNumeroDocumento'") . " ,
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . (is_null($sCorreo) || empty($sCorreo) ? "NULL" : "'$sCorreo'") . " ,
                    " . (is_null($nIdColor) || empty($nIdColor) ? "NULL" : "$nIdColor") . " ,
                    " . (is_null($dFechaNacimiento) || empty($dFechaNacimiento) ? "NULL" : " '$dFechaNacimiento' ") . " ,
                    " . (is_null($nCantidadPersonasDependientes) || $nCantidadPersonasDependientes == ''  ? "NULL" : "$nCantidadPersonasDependientes") . " ,
                    " . (is_null($nExperienciaVentas) || $nExperienciaVentas == ''  ? "NULL" : "$nExperienciaVentas") . " ,
                    " . (is_null($sRubroExperiencia) || empty($sRubroExperiencia) ? "NULL" : "'$sRubroExperiencia'") . " ,
                    " . (is_null($nIdEstudios) || empty($nIdEstudios) ? "NULL" : "$nIdEstudios") . " ,
                    " . (is_null($nIdSituacionEstudios) || empty($nIdSituacionEstudios) ? "NULL" : "$nIdSituacionEstudios") . " ,
                    " . (is_null($sCarreraCiclo) || empty($sCarreraCiclo) ? "NULL" : "'$sCarreraCiclo'") . " ,
                    " . " NOW() " . ",
                    " . " NOW() " . ",
                    " . (is_null($nIdSupervisor) || empty($nIdSupervisor) ? "NULL" : "$nIdSupervisor") . " ,
                    " . (is_null($sClave) || empty($sClave) ? "NULL" : "'$sClave'") . " ,
                    " . (is_null($sImagen) || empty($sImagen) ? "NULL" : "'$sImagen'") . " ,
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";


        return  $this->db->run($sSQL);
    }





    public function fncActualizarEmpleado(
        $nIdEmpleado,
        $nIdNegocio,
        $nTipoEmpleado,
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombre,
        $sCorreo,
        $nIdColor,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $nIdSupervisor,
        $sClave,
        $sImagen,
        $nEstado
    ) {

        $sSQL = "UPDATE empleados SET ";

        $sSQL .= (!is_null($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : "");

        $sSQL .= (!is_null($nTipoEmpleado) ? ", nTipoEmpleado = $nTipoEmpleado " : "");

        $sSQL .= (!is_null($nTipoDocumento) ? ", nTipoDocumento = $nTipoDocumento " : "");

        $sSQL .= (!is_null($sNumeroDocumento) && !empty($sNumeroDocumento) ? ", sNumeroDocumento = '$sNumeroDocumento' " : '');

        $sSQL .= (!is_null($sNombre) && !empty($sNombre) ? ", sNombre = '$sNombre' " : ', sNombre = NULL ');

        $sSQL .= (!is_null($sCorreo) && !empty($sCorreo) ? ", sCorreo = '$sCorreo' " : ', sCorreo = NULL ');

        $sSQL .= (!is_null($nIdColor) ? ", nIdColor = $nIdColor " : "");

        $sSQL .= (!is_null($dFechaNacimiento) ? ", dFechaNacimiento = '$dFechaNacimiento' " : "");

        $sSQL .= ", dFechaHoraUltimoAcceso = NOW() ";

        $sSQL .= ", dFechaHoraEdicion = NOW() ";

        $sSQL .= (!is_null($nCantidadPersonasDependientes) && $nCantidadPersonasDependientes != '' ? ", nCantidadPersonasDependientes = $nCantidadPersonasDependientes " : "");

        $sSQL .= (!is_null($nExperienciaVentas)  && $nExperienciaVentas != '' ? ", nExperienciaVentas = $nExperienciaVentas " : "");

        $sSQL .= (!is_null($sRubroExperiencia) && $sRubroExperiencia != ''  ? ", sRubroExperiencia = '$sRubroExperiencia' " : "");

        $sSQL .= (!is_null($nIdEstudios) ? ", nIdEstudios = $nIdEstudios " : "");

        $sSQL .= (!is_null($nIdSupervisor) ? ", nIdSupervisor = $nIdSupervisor " : "");

        $sSQL .= (!is_null($nIdSituacionEstudios) && !empty($nIdSituacionEstudios) ? ", nIdSituacionEstudios = $nIdSituacionEstudios " : "");

        $sSQL .= (!is_null($sCarreraCiclo) && !empty($sCarreraCiclo)  ? ", sCarreraCiclo = '$sCarreraCiclo' " : "");

        $sSQL .= (!is_null($sClave) && !empty($sClave) ? ", sClave = '$sClave' " : "");

        $sSQL .= (!is_null($sImagen) && !empty($sImagen) ? ", sImagen = '$sImagen' " : "");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado" : "");

        $sSQL .= " WHERE nIdEmpleado = $nIdEmpleado ";
        // echo $sSQL;
        // exit;

        return  $this->db->run($sSQL);
    }


    public function fncEliminarEmpleado($nIdEmpleado)
    {
        $sSQL = "DELETE FROM empleados WHERE nIdEmpleado = $nIdEmpleado ";
        $this->db->run($sSQL);
    }

    public function fncActualizarHoraAcceso($nIdEmpleado)
    {
        $sSQL = "UPDATE empleados SET dFechaHoraUltimoAcceso = NOW() WHERE nIdEmpleado = $nIdEmpleado";
        return $this->db->run($sSQL);
    }


    public function fncGetEmpleadoById($nIdEmpleado)
    {
        $sSQL = "SELECT     
                    emp.nIdEmpleado,
                    emp.nIdNegocio,
                    emp.nTipoEmpleado,
                    emp.nTipoDocumento,
                    emp.sNumeroDocumento,
                    emp.sNombre,
                    emp.sCorreo,
                    emp.nIdColor,
                    emp.dFechaNacimiento,
                    emp.nCantidadPersonasDependientes,
                    emp.nExperienciaVentas,
                    emp.sRubroExperiencia,
                    emp.nIdEstudios,
                    emp.nIdSituacionEstudios,
                    emp.sCarreraCiclo,
                    emp.nIdSupervisor,
                    emp.sClave,
                    emp.sImagen,
                    IFNULL(catsup.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                    emp.nEstado
                FROM empleados AS emp
                LEFT JOIN catalogotabla AS catsup ON emp.nIdColor = catsup.nIdCatalogoTabla
                WHERE nIdEmpleado = $nIdEmpleado
                
                 ";
        return $this->db->run(trim($sSQL));
    }

    public function fncMostrarRegistroCard($nIdEmpleado)
    {
        $sSQL = "SELECT emp.nIdEmpleado,
                        emp.nTipoEmpleado, 
                        IFNULL(cattipo.sDescripcionLargaItem,'') AS sTipoEmpleado, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        emp.sNombre,
                        emp.nIdNegocio,
                        emp.nIdColor,
                        emp.nIdSupervisor,
                        IFNULL(catsup.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                        IFNULL(catsupem.sDescripcionLargaItem,'') AS sColorSuperEmpleado,  -- Este join es cuando se lista los supervisores de los empleados
                        CONCAT(SUBSTRING(emp.sNombre, 1, 3)) AS sEmpleadoCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), emp.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM empleados AS emp 
                INNER JOIN negocios AS neg ON emp.nIdNegocio = neg.nIdNegocio 
                LEFT JOIN empleados AS empSup ON emp.nIdSupervisor = empSup.nIdEmpleado
                LEFT JOIN catalogotabla AS cattipo  ON emp.nTipoEmpleado  = cattipo.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsup   ON emp.nIdColor = catsup.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsupem ON empSup.nIdColor = catsupem.nIdCatalogoTabla
                WHERE emp.nEstado = 1 AND  emp.nIdEmpleado = $nIdEmpleado";
        return $this->db->run(trim($sSQL))[0];
    }

    public function fncGetEmpleados($nTipoEmpleado = null, $nIdNegocio = null, $nIdEmpleado = null, $nEstado = 1)
    {
        $sSQL = "SELECT emp.nIdEmpleado,
                        emp.nTipoEmpleado, 
                        IFNULL(cattipo.sDescripcionLargaItem,'') AS sTipoEmpleado, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        emp.sNombre,
                        emp.nIdNegocio,
                        emp.nIdColor,
                        emp.nIdSupervisor,
                        IFNULL(emp.sImagen,'') AS sImagen, 
                        IFNULL(catsup.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                        IFNULL(catsupem.sDescripcionLargaItem,'') AS sColorSuperEmpleado,  -- Este join es cuando se lista los supervisores de los empleados
                        CONCAT(SUBSTRING(emp.sNombre, 1, 3)) AS sEmpleadoCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), emp.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM empleados AS emp 
                INNER JOIN negocios AS neg ON emp.nIdNegocio = neg.nIdNegocio 
                LEFT JOIN empleados AS empSup ON emp.nIdSupervisor = empSup.nIdEmpleado
                LEFT JOIN catalogotabla AS cattipo  ON emp.nTipoEmpleado  = cattipo.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsup   ON emp.nIdColor = catsup.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsupem ON empSup.nIdColor = catsupem.nIdCatalogoTabla
               ";

        $sWhere = "";

        $sWhere .= (is_null($nEstado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nEstado = $nEstado ");

        $sWhere .= (is_null($nTipoEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nTipoEmpleado = $nTipoEmpleado ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nIdEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdEmpleado = $nIdEmpleado ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        // echo $sSQL;
        // exit;

        return $this->db->run(trim($sSQL));
    }

    public function fncGetColoresEmpleados($nIdNegocio)
    {
        $sSQL = "SELECT DISTINCT nIdColor FROM empleados WHERE nIdNegocio = $nIdNegocio AND nIdColor IS NOT NULL";
        return $this->db->run(trim($sSQL));
    }

    public function fncBuscarEmpleadoPorCorreo($sCorreo)
    {
        $sSQL = "SELECT nIdEmpleado FROM empleados WHERE sCorreo = '$sCorreo'";

        return $this->db->run($sSQL);
    }

    public function fncGetEmpleadosAll($nTipoEmpleado = null, $nIdNegocio = null, $nIdEmpleado = null, $nEstado = null)
    {
        $sSQL = "SELECT emp.nIdEmpleado,
                        emp.nTipoEmpleado, 
                        IFNULL(tipodoc.sDescripcionCortaItem,'') AS sTipoDoc, 
                        IFNULL(cattipo.sDescripcionLargaItem,'') AS sTipoEmpleado, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        emp.sNumeroDocumento,
                        emp.sNombre,
                        emp.sCorreo,
                        emp.nIdNegocio,
                        emp.nIdColor,
                        IFNULL( DATE_FORMAT( emp.dFechaNacimiento, '%d/%m/%Y' ), '' ) AS dFechaNacimiento,
                        IFNULL( DATE_FORMAT( emp.dFechaHoraRegistro, '%d/%m/%Y' ), '' ) AS dFechaHoraRegistro,
                        emp.nCantidadPersonasDependientes,
                        emp.nExperienciaVentas,
                        emp.sRubroExperiencia,
                        IFNULL(estudio.sDescripcionLargaItem,'') AS sEstudio, 
                        IFNULL(situacionestudio.sDescripcionLargaItem,'') AS sSituacionEstudio, 
                        emp.sCarreraCiclo,
                        emp.nIdSupervisor,
                        emp.sClave ,
                        emp.nEstado ,
                        IFNULL(emp.sImagen,'') AS sImagen, 
                        IFNULL(catsup.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                        IFNULL(catsupem.sDescripcionLargaItem,'') AS sColorSuperEmpleado,  -- Este join es cuando se lista los supervisores de los empleados
                        CONCAT(SUBSTRING(emp.sNombre, 1, 3)) AS sEmpleadoCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), emp.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM empleados AS emp 
                INNER JOIN negocios AS neg ON emp.nIdNegocio = neg.nIdNegocio 
                LEFT JOIN empleados AS empSup ON emp.nIdSupervisor = empSup.nIdEmpleado
                LEFT JOIN catalogotabla AS cattipo  ON emp.nTipoEmpleado  = cattipo.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsup   ON emp.nIdColor = catsup.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsupem ON empSup.nIdColor = catsupem.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS tipodoc ON emp.nTipoDocumento = tipodoc.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS estudio ON emp.nIdEstudios = estudio.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS situacionestudio ON emp.nIdSituacionEstudios = situacionestudio.nIdCatalogoTabla
               ";

        $sWhere = "";

        $sWhere .= (is_null($nEstado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nEstado = $nEstado ");

        $sWhere .= (is_null($nTipoEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nTipoEmpleado = $nTipoEmpleado ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nIdEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdEmpleado = $nIdEmpleado ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        return $this->db->run(trim($sSQL));
    }



}
