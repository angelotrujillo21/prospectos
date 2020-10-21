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
        $sApellidos,
        $nIdColor,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $nIdSupervisor,
        $nEstado
    ) {

        $sSQL = "INSERT INTO empleados(
                    nIdNegocio,
                    nTipoEmpleado,
                    nTipoDocumento,
                    sNumeroDocumento,
                    sNombre,
                    sApellidos,
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
                    nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nTipoEmpleado) || empty($nTipoEmpleado) ? "NULL" : "$nTipoEmpleado") . " ,
                    " . (is_null($nTipoDocumento) || empty($nTipoDocumento) ? "NULL" : "$nTipoDocumento") . " ,
                    " . (is_null($sNumeroDocumento) || empty($sNumeroDocumento) ? "NULL" : "'$sNumeroDocumento'") . " ,
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . (is_null($sApellidos) || empty($sApellidos) ? "NULL" : "'$sApellidos'") . " ,
                    " . (is_null($nIdColor) || empty($nIdColor) ? "NULL" : "$nIdColor") . " ,
                    " . (is_null($dFechaNacimiento) || empty($dFechaNacimiento) ? "NULL" : " STR_TO_DATE('$dFechaNacimiento','%d/%m/%Y') ") . " ,
                    " . (is_null($nCantidadPersonasDependientes) || empty($nCantidadPersonasDependientes) ? "NULL" : "$nCantidadPersonasDependientes") . " ,
                    " . (is_null($nExperienciaVentas) || empty($nExperienciaVentas) ? "NULL" : "$nExperienciaVentas") . " ,
                    " . (is_null($sRubroExperiencia) || empty($sRubroExperiencia) ? "NULL" : "'$sRubroExperiencia'") . " ,
                    " . (is_null($nIdEstudios) || empty($nIdEstudios) ? "NULL" : "$nIdEstudios") . " ,
                    " . (is_null($nIdSituacionEstudios) || empty($nIdSituacionEstudios) ? "NULL" : "$nIdSituacionEstudios") . " ,
                    " . (is_null($sCarreraCiclo) || empty($sCarreraCiclo) ? "NULL" : "'$sCarreraCiclo'") . " ,
                    " . " NOW() " . ",
                    " . " NOW() " . ",
                    " . (is_null($nIdSupervisor) || empty($nIdSupervisor) ? "NULL" : "$nIdSupervisor") . " ,
                    " . (is_null($nEstado) || empty($nEstado) ? "NULL" : "$nEstado") . " 
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
        $sApellidos,
        $nIdColor,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $nIdSupervisor,
        $nEstado
    ) {

        $sSQL = "UPDATE empleados SET ";

        $sSQL .= (!is_null($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : '  ');

        $sSQL .= (!is_null($nTipoEmpleado) ? ", nTipoEmpleado = $nTipoEmpleado'" : " nTipoEmpleado = NULL ");

        $sSQL .= (!is_null($nTipoDocumento) ? ", nTipoDocumento = $nTipoDocumento " : " nTipoDocumento = NULL");

        $sSQL .= (!is_null($sNumeroDocumento) && !empty($sNumeroDocumento) ? ", sNumeroDocumento = '$sNumeroDocumento' " : ', sNumeroDocumento = NULL ');

        $sSQL .= (!is_null($sNombre) && !empty($sNombre) ? ", sNombre = '$sNombre' " : ', sNombre = NULL ');

        $sSQL .= (!is_null($sApellidos) && !empty($sApellidos) ? ", sApellidos = '$sApellidos' " : ', sApellidos = NULL ');

        $sSQL .= (!is_null($nIdColor) ? ", nIdColor = $nIdColor " : ", nIdColor = NULL");

        $sSQL .= (!is_null($dFechaNacimiento) ? ", dFechaNacimiento = STR_TO_DATE('$dFechaNacimiento','%d/%m/%Y') " : ", dFechaNacimiento = NULL");

        $sSQL .= " dFechaHoraUltimoAcceso = NOW(), ";

        $sSQL .= " dFechaHoraEdicion = NOW(), ";

        $sSQL .= (!is_null($nCantidadPersonasDependientes) ? ", nCantidadPersonasDependientes = $nCantidadPersonasDependientes " : ", nCantidadPersonasDependientes = NULL");

        $sSQL .= (!is_null($nExperienciaVentas) ? ", nExperienciaVentas = $nExperienciaVentas " : ", nExperienciaVentas = NULL");

        $sSQL .= (!is_null($sRubroExperiencia) ? ", sRubroExperiencia = '$sRubroExperiencia' " : ", sRubroExperiencia = NULL");

        $sSQL .= (!is_null($nIdEstudios) ? ", nIdEstudios = $nIdEstudios " : ", nIdEstudios = NULL");

        $sSQL .= (!is_null($nIdSupervisor) ? ", nIdSupervisor = $nIdSupervisor " : "");

        $sSQL .= (!is_null($nIdSituacionEstudios) ? ", nIdSituacionEstudios = $nIdSituacionEstudios " : ", nIdSituacionEstudios = NULL");

        $sSQL .= (!is_null($sCarreraCiclo) ? ", sCarreraCiclo = '$sCarreraCiclo " : ", nIdEstudios = NULL");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado" : ", nEstado = NULL ");

        $sSQL .= " WHERE nIdEmpleado = $nIdEmpleado ";

        return  $this->db->run($sSQL);
    }


    public function fncEliminarEmpleado($nIdEmpleado)
    {
        $sSQL = "DELETE FROM empleados WHERE nIdEmpleado = $nIdEmpleado ";
        $this->db->run($sSQL);
    }


    public function fncGetEmpleados($nTipoEmpleado,$nIdNegocio)
    {
        $sSQL = "SELECT emp.nIdEmpleado,
                        emp.nTipoEmpleado, 
                        IFNULL(cattipo.sDescripcionLargaItem,'') AS sTipoEmpleado, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        emp.sNombre,
                        emp.sApellidos,
                        emp.nIdColor,
                        emp.nIdSupervisor,
                        IFNULL(catsup.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                        IFNULL(catsupem.sDescripcionLargaItem,'') AS sColorSuperEmpleado,  -- Este join es cuando se lista los supervisores de los empleados
                        CONCAT(SUBSTRING(emp.sNombre, 1, 1), SUBSTRING(emp.sApellidos, 1, 1) ) AS sEmpleadoCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), emp.dFechaHoraUltimoAcceso)) AS sTime
                FROM empleados AS emp 
                INNER JOIN negocios AS neg ON emp.nIdNegocio = neg.nIdNegocio 
                LEFT JOIN empleados AS empSup ON emp.nIdSupervisor = empSup.nIdEmpleado
                LEFT JOIN catalogotabla AS cattipo  ON emp.nTipoEmpleado  = cattipo.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsup   ON emp.nIdColor = catsup.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS catsupem ON empSup.nIdColor = catsupem.nIdCatalogoTabla
                WHERE emp.nEstado = 1";

        $sSQL .=  is_null($nTipoEmpleado) ? "" : ' AND emp.nTipoEmpleado  = ' . $nTipoEmpleado;
        $sSQL .=  is_null($nIdNegocio) ? "" : ' AND emp.nIdNegocio  = ' . $nIdNegocio;

    
        return $this->db->run(trim($sSQL));
    }
}
