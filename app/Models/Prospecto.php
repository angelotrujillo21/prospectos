<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Prospecto
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function fncGrabarWidgetProspecto(
        $sNombre,
        $sNombreUsuario,
        $sValores,
        $nTipoWidget,
        $nTipoCampo,
        $nDefault,
        $nRequerido,
        $nEstado
    ) {
        $sSQL = "INSERT INTO widgetprospectos(
                        sNombre,
                        sNombreUsuario,
                        sValores,
                        nTipoWidget,
                        nTipoCampo,
                        nDefault,
                        nRequerido,
                        nEstado
                ) VALUES (
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . (is_null($sNombreUsuario) || empty($sNombreUsuario) ? "NULL" : "'$sNombreUsuario'") . " ,
                    " . (is_null($sValores) || empty($sValores) ? "NULL" : "'$sValores'") . " ,
                    " . (is_null($nTipoWidget) || empty($nTipoWidget) ? "NULL" : "$nTipoWidget") . " ,
                    " . (is_null($nTipoCampo) || empty($nTipoCampo) ? "NULL" : "$nTipoCampo") . " ,
                    " . (is_null($nDefault) ? "NULL" : "$nDefault") . ",
                    " . (is_null($nRequerido) ? "NULL" : "$nRequerido") . ",
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";
        return  $this->db->run($sSQL);
    }

    public function fncActualizarWidgetProspecto(
        $nIdWidget,
        $sNombre,
        $sNombreUsuario,
        $sValores,
        $nTipoWidget,
        $nDefault,
        $nRequerido,
        $nEstado
    ) {
        $sSQL = "UPDATE widgetprospectos SET ";

        $sSQL .= (!is_null($sNombre) && !empty($sNombre) ? " sNombre = '$sNombre' " : ' sNombre = NULL ');

        $sSQL .= (!is_null($sNombreUsuario) && !empty($sNombreUsuario) ? ", sNombreUsuario = '$sNombreUsuario' " : ', sNombreUsuario = NULL ');

        $sSQL .= (!is_null($sValores) && !empty($sValores) ? ", sValores = '$sValores' " : ', sValores = NULL ');

        $sSQL .= (!is_null($nTipoWidget) && !empty($nTipoWidget) ? ", nTipoWidget = $nTipoWidget " : ', nTipoWidget = NULL ');

        $sSQL .= (!is_null($nDefault) ? ", nDefault = $nDefault" : ", nDefault = NULL ");

        $sSQL .= (!is_null($nDefault) ? ", nDefault = $nDefault" : ", nDefault = NULL ");

        $sSQL .= (!is_null($nRequerido) ? ", nRequerido = $nRequerido" : ", nRequerido = NULL ");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado" : "");

        $sSQL .= " WHERE nIdWidget = $nIdWidget ";

        return  $this->db->run($sSQL);
    }


    public function fncEliminarWidgetProspecto($nIdWidget)
    {
        $sSQL = "DELETE FROM widgetprospectos WHERE nIdWidget = $nIdWidget ";
        $this->db->run($sSQL);
    }


    public function fncGetWidgetProspectos()
    {
        $sSQL = "SELECT nIdWidget, sNombre, sNombreUsuario, sValores, nTipoWidget, nDefault, nEstado FROM widgetprospectos";
        return $this->db->run(trim($sSQL));
    }

    public function fncGetWidgetProspectosById($nIdWidget)
    {
        $sSQL = "SELECT nIdWidget, sNombre, sNombreUsuario, sValores, nTipoWidget, nDefault , nTipoCampo , nRequerido, nEstado FROM widgetprospectos WHERE nIdWidget = $nIdWidget";
        return $this->db->run(trim($sSQL));
    }

    public function fncGetProspectoByName($sNombre)
    {
        $sSQL = "SELECT nIdWidget, sNombre, sNombreUsuario, sValores, nTipoWidget, nDefault , nTipoCampo , nRequerido, nEstado FROM widgetprospectos WHERE sNombre = '$sNombre'";
        return $this->db->run(trim($sSQL));
    }


    public function fncGrabarProspecto(
        $nIdCliente,
        $nIdNegocio,
        $nIdEmpleado,
        $nIdEtapa,
        $nEstado,
        $aryValueExtra
    ) {
        $sSQL = "INSERT INTO prospectos(
                        nIdCliente,
                        nIdNegocio,
                        dFechaCreacion,
                        dFechaHoraUltimoAcceso,
                        nIdEmpleado,
                        nIdEtapa,
                        nEstado";

        $sSQL .=   is_array($aryValueExtra) && count($aryValueExtra) > 0 ? "," . implode(' , ', array_keys($aryValueExtra)) : "";

        $sSQL .=   ")";

        $sSQL .=   " VALUES (
                    " . (is_null($nIdCliente) || empty($nIdCliente) ? "NULL" : "$nIdCliente") . " ,
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . " NOW(), " . "
                    " . " NOW(), " . "
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($nIdEtapa) || $nIdEtapa == '' ? "NULL" : "$nIdEtapa") . " ,
                    " . (is_null($nEstado) || $nEstado == '' ? "NULL" : "$nEstado");

        $sSQL .=   is_array($aryValueExtra) && count($aryValueExtra) > 0 ? (",'" . implode("' , '", array_values($aryValueExtra)) . "'") : "";
        $sSQL .=   ")";

        return $this->db->run($sSQL);
    }

    public function fncGetEtapaProspecto($sIds = null)
    {
        $sSQL = "SELECT nIdEtapa, sNombre,sNombreVendedor, nPorcentaje, nEstado FROM etapaprospecto WHERE nEstado = 1";
        $sSQL .= !is_null($sIds) ? " AND  nPorcentaje IN ( $sIds )" : "";
        $sSQL .= " ORDER BY nIdEtapa ASC ";
        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoAll($nIdNegocio, $nIdEmpleado = null, $sBuscador = null, $nValidacionAdmin = null, $nIdEtapa = null, $nIdSupervisor = null, $nIdCliente = null, $nTipoItem = null, $dFechaCrecion = null, $dFechaCierre = null)
    {
        $sSQL = "SELECT DISTINCT 
                        p.nIdProspecto, 
                        p.nIdNegocio, 
                        p.nIdCliente, 
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, 
                        IFNULL(emp.sNombre,'') AS sEmpleado, 
                        TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y' ), '' ) AS dFecha,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
                        IFNULL( DATE_FORMAT( p.dFechaHoraUltimoAcceso , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaHoraUltimoAcceso,
                        p.nIdEmpleado, 
                        p.nIdEtapa,
                        etp.sNombre AS sNombreEtapa , 
                        etp.nPorcentaje, 
                        p.nEstado
        FROM prospectos AS p
        LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
        LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
        LEFT JOIN etapaprospecto AS etp ON p.nIdEtapa = etp.nIdEtapa ";

        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " INNER JOIN prospectocatalogo AS pc ON p.nIdProspecto = pc.nIdProspecto  " : "";
        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " INNER JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo  " : "";


        $sSQL .= " WHERE p.nIdNegocio  = $nIdNegocio ";

        $sSQL .= !is_null($nIdEmpleado) && !empty($nIdEmpleado) ? " AND p.nIdEmpleado = $nIdEmpleado " : "";
        $sSQL .= !is_null($sBuscador)  && !empty($sBuscador) ?  " AND concat_ws( ' ' , cli.sNombreoRazonSocial,' ', etp.sNombre ,' ', emp.sNombre , DATE_FORMAT( DATE(p.dFechaCreacion) , '%d/%m/%Y' )  ) LIKE '%$sBuscador%' " : "";
        $sSQL .= !is_null($nValidacionAdmin) ? " AND p.nValidacionAdmin = $nValidacionAdmin " : "";
        $sSQL .= !is_null($nIdEtapa) && !empty($nIdEtapa) ? " AND p.nIdEtapa = $nIdEtapa " : "";
        $sSQL .= !is_null($nIdSupervisor)  && !empty($nIdSupervisor) ? " AND emp.nIdSupervisor = $nIdSupervisor " : "";
        $sSQL .= !is_null($nIdCliente)  && !empty($nIdCliente) ? " AND p.nIdCliente = $nIdCliente " : "";
        $sSQL .= !is_null($nTipoItem)  && !empty($nTipoItem) ? " AND cat.nTipoItem = $nTipoItem " : "";
        $sSQL .= !is_null($dFechaCrecion)  && !empty($dFechaCrecion) ? " AND p.dFechaCrecion = STR_TO_DATE( '$dFechaCrecion', '%d/%m/%Y' ) " : "";
        $sSQL .= !is_null($dFechaCierre)  && !empty($dFechaCierre) ? " AND p.dFechaCierre = STR_TO_DATE( '$dFechaCierre', '%d/%m/%Y' ) " : "";

        $sSQL .= "ORDER BY p.dFechaCreacion DESC";
        // echo $sSQL;
        // exit;
        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoById($nIdProspecto, $nIdNegocio = null, $aryExtra = [])
    {
        $sSQL = "SELECT p.nIdProspecto, p.nIdNegocio, p.nIdCliente, IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, IFNULL(emp.sNombre,'') AS sEmpleado,
        TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso, p.nIdEmpleado, p.nIdEtapa , etp.sNombre AS sNombreEtapa , etp.nPorcentaje, p.nEstado ";

        $sSQL .= is_array($aryExtra) && count($aryExtra) > 0 ? ",p." . implode(",p.", $aryExtra) : "";

        $sSQL .= " FROM prospectos AS p
        LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
        LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
        LEFT JOIN etapaprospecto AS etp ON p.nIdEtapa = etp.nIdEtapa
        WHERE p.nIdProspecto  = $nIdProspecto ";

        $sSQL .= !is_null($nIdNegocio) ? " AND p.nIdNegocio = $nIdNegocio " : "";


        return $this->db->run($sSQL);
    }


    public function fncActualizarProspecto(
        $nIdProspecto,
        $nIdCliente,
        $nIdNegocio,
        $nIdEmpleado,
        $nIdEtapa,
        $nEstado,
        $aryValueExtra
    ) {
        $sSQL = "UPDATE prospectos SET ";

        $sSQL .= (!is_null($nIdCliente) ? ", nIdCliente = $nIdCliente" : "");

        $sSQL .= (!is_null($nIdNegocio) ? ", nIdNegocio = $nIdNegocio" : "");

        $sSQL .= (!is_null($nIdEmpleado) ? ", nIdEmpleado = $nIdEmpleado" : "");

        $sSQL .= " ,dFechaActualizacion = NOW() ";

        $sSQL .= (!is_null($nIdEtapa) ? ", nIdEtapa = $nIdEtapa" : ", nIdEtapa = NULL ");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado" : ", nEstado = NULL ");

        if (is_array($aryValueExtra) && count($aryValueExtra)) {
            foreach ($aryValueExtra as $sKey => $sValue) {
                $sSQL .= " , $sKey = '$sValue' ";
            }
        }

        $sSQL .= " WHERE nIdProspecto = $nIdProspecto ";

        return  $this->db->run($sSQL);
    }

    public function fncEliminarProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM prospectos WHERE nIdProspecto = $nIdProspecto ";
        $this->db->run($sSQL);
    }


    public function fncObtenerWidgetProspecto($nDefault = null, $nEstado = null)
    {
        $sSQL  = "SELECT wp.nIdWidget, wp.sNombre, wp.sNombreUsuario, wp.sValores, wp.nTipoWidget, wp.nDefault, wp.nEstado FROM widgetprospectos AS wp WHERE ";

        $sSQL .=  is_null($nEstado) ? "" : ' wp.nEstado  = ' . $nEstado;
        $sSQL .=  is_null($nDefault) ? "" : ' AND wp.nDefault  = ' . $nDefault;

        return  $this->db->run($sSQL);
    }

    public function fncGrabarConfigProspecto(
        $nIdNegocio,
        $nIdWidget,
        $nEstado
    ) {
        $sSQL = "INSERT INTO configprospecto(
                        nIdNegocio,
                        nIdWidget,
                        nOrden,
                        nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nIdWidget) || empty($nIdWidget) ? "NULL" : "$nIdWidget") . " ,
                    " . "(SELECT IFNULL(MAX(cp.nOrden),0) FROM configprospecto AS cp WHERE cp.nIdNegocio = $nIdNegocio) + 1" . ",
                    " . $nEstado . "
                )";


        return $this->db->run($sSQL);
    }

    public function fncActualizarConfigProspecto(
        $nIdConfigProspecto,
        $nIdNegocio,
        $nIdWidget,
        $nOrden,
        $nEstado
    ) {
        $sSQL = "UPDATE configprospecto SET ";

        $sCOL = (!is_null($nIdNegocio) && !empty($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : "");

        $sCOL .= (!is_null($nIdWidget) && !empty($nIdWidget) ? (strlen($sCOL) > 0  ? "," : "") . " nIdWidget = $nIdWidget " : "");

        $sCOL .= (!is_null($nOrden) ? (strlen($sCOL) > 0  ? "," : "") . " nOrden = $nOrden" : "");

        $sCOL  .= (!is_null($nEstado) ? (strlen($sCOL) > 0  ? "," : "") . " nEstado = $nEstado" : "");

        $sWhere = " WHERE nIdConfigProspecto= $nIdConfigProspecto ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;


        return $this->db->run($sSQL);
    }


    public function fncEliminarConfigProspecto($nIdConfigProspecto)
    {
        $sSQL = "DELETE FROM configprospecto WHERE nIdConfigProspecto = $nIdConfigProspecto ";
        $this->db->run($sSQL);
    }

    public function fncObtenerConfigProspecto($nIdNegocio, $nEstado = null, $nDefault = null)
    {
        $sSQL = "SELECT confpros.nIdConfigProspecto, confpros.nIdNegocio, confpros.nIdWidget, wp.sNombre as sWidgetSystem, 
                wp.sNombreUsuario AS sWidget, wp.nEdit, wp.nDefault , wp.sValores,  wp.nTamano, wp.nRequerido , wp.nTipoWidget, 
                tc.sNombre AS sTipoCampoSystem,
                confpros.nEstado
                FROM configprospecto AS confpros 
                INNER JOIN widgetprospectos AS wp ON confpros.nIdWidget = wp.nIdWidget
                LEFT JOIN tiposcampos AS tc on wp.nTipoCampo = tc.nTipoCampo
                WHERE confpros.nIdNegocio = $nIdNegocio ";

        $sSQL .= !is_null($nEstado) ? " AND confpros.nEstado = $nEstado " : "";
        $sSQL .= !is_null($nDefault) ? " AND wp.nDefault = $nDefault " : "";
        $sSQL .= " ORDER BY confpros.nOrden ASC ";
        return $this->db->run($sSQL);
    }

    public function fncGrabarColumnaProspecto($sColumn, $nSize)
    {
        $sSQL = "ALTER TABLE prospectos ADD COLUMN $sColumn VARCHAR($nSize) NULL";
        return $this->db->run($sSQL);
    }

    public function fncActualizarColumnaProspecto($sOldColName, $sNewColName, $nSize)
    {
        $sSQL = "ALTER TABLE prospectos CHANGE $sOldColName $sNewColName VARCHAR($nSize)";
        return $this->db->run($sSQL);
    }

    public function fncEliminarColumnaProspecto($sColumn)
    {
        $sSQL = "ALTER TABLE prospectos DROP COLUMN $sColumn";
        return $this->db->run($sSQL);
    }

    public function fncGrabarProspectoCatalogo(
        $nIdProspecto,
        $nIdCatalogo,
        $nCantidad,
        $nPrecio
    ) {
        $sSQL = "INSERT INTO prospectocatalogo(
                        nIdProspecto,
                        nIdCatalogo,
                        nCantidad,
                        nPrecio
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdCatalogo) || empty($nIdCatalogo) ? "NULL" : "$nIdCatalogo") . " ,
                    " . (is_null($nCantidad) || empty($nCantidad) ? "NULL" : "$nCantidad") . " ,
                    " . (is_null($nPrecio) || empty($nPrecio) ? "NULL" : "$nPrecio") . " 
                )";

        return $this->db->run($sSQL);
    }

    public function fncActualizaProspectoCatalogo(
        $nIdProspectoCatalogo,
        $nIdProspecto,
        $nIdCatalogo,
        $nCantidad,
        $nPrecio
    ) {
        $sSQL = "UPDATE prospectocatalogo SET ";

        $sCOL  = (!is_null($nIdProspecto) && !empty($nIdProspecto) ? " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($nIdCatalogo) && !empty($nIdCatalogo) ? (strlen($sCOL) > 0  ? "," : "") . " nIdCatalogo = $nIdCatalogo " : "");

        $sCOL .= (!is_null($nCantidad) ? (strlen($sCOL) > 0  ? "," : "") . " nCantidad = $nCantidad" : "");

        $sCOL .= (!is_null($nPrecio) ? (strlen($sCOL) > 0  ? "," : "") . " nPrecio = $nPrecio " : "");

        $sWhere = " WHERE nIdProspectoCatalogo = $nIdProspectoCatalogo ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }

    public function fncGetProspectoCatalogoByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT 
            pc.nIdProspectoCatalogo,
            pc.nIdProspecto,
            pc.nIdCatalogo,
            pc.nCantidad,
            tipoitem.sDescripcionLargaItem AS sTipoItem,
            cat.sNombre AS sNombreCatalogo,
            pc.nPrecio
         FROM prospectocatalogo AS pc 
         INNER JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
         INNER JOIN catalogotabla AS tipoitem ON cat.nTipoItem = tipoitem.nIdCatalogoTabla 
         WHERE pc.nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }


    public function fncGetAryProspectoCatalogo($nIdProspecto, $sTipoMoneda, $nTipoItem = null)
    {
        $sSQL = "SELECT 
                CONCAT( SUM(pc.nCantidad), ' ', catTabla.sDescripcionLargaItem, (IF( SUM(pc.nCantidad) > 1 , 'S', '')),    ' - ', '$sTipoMoneda',    SUM(pc.nCantidad * pc.nPrecio) ) AS sItemCantidadPrecio,
                SUM(pc.nCantidad) AS nCantidad,
                SUM(pc.nCantidad * pc.nPrecio) AS nTotal
                FROM prospectocatalogo AS pc
                INNER JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
                INNER JOIN catalogotabla AS catTabla ON cat.nTipoItem = catTabla.nIdCatalogoTabla
                WHERE pc.nIdProspecto = $nIdProspecto";

        $sSQL .= !is_null($nTipoItem) ? " AND cat.nTipoItem = $nTipoItem " : "";

        $sSQL .= " GROUP BY cat.nTipoItem ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoCatalogoByIdProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM prospectocatalogo WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoCatalogo($nIdProspectoCatalogo)
    {
        $sSQL = "DELETE FROM prospectocatalogo WHERE nIdProspectoCatalogo = $nIdProspectoCatalogo ";
        return $this->db->run($sSQL);
    }


    public function fncGrabarProspectoSegmentacion(
        $nIdProspecto,
        $nIdSegmentacion,
        $nIdDetalleSegmentacion
    ) {
        $sSQL = "INSERT INTO prospectosegmentacion(
                            nIdProspecto,
                            nIdSegmentacion,
                            nIdDetalleSegmentacion
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdSegmentacion) || empty($nIdSegmentacion) ? "NULL" : "$nIdSegmentacion") . " ,
                    " . (is_null($nIdDetalleSegmentacion) || empty($nIdDetalleSegmentacion) ? "NULL" : "$nIdDetalleSegmentacion") . " 
                )";

        return $this->db->run($sSQL);
    }


    public function fncActualizaProspectoSegmentacion(
        $nIdProspectoSegmentacion,
        $nIdProspecto,
        $nIdSegmentacion,
        $nIdDetalleSegmentacion
    ) {
        $sSQL = "UPDATE prospectosegmentacion SET ";

        $sCOL  = (!is_null($nIdProspecto) && !empty($nIdProspecto) ? " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($nIdSegmentacion) && !empty($nIdSegmentacion) ? (strlen($sCOL) > 0  ? "," : "") . " nIdSegmentacion = $nIdSegmentacion " : "");

        $sCOL .= (!is_null($nIdDetalleSegmentacion) ? (strlen($sCOL) > 0  ? "," : "") . " nIdDetalleSegmentacion = $nIdDetalleSegmentacion" : "");

        $sWhere = " WHERE nIdProspectoSegmentacion = $nIdProspectoSegmentacion ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }

    public function fncGetProspectoSegmentacionByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT 
                    ps.nIdProspectoSegmentacion,
                    ps.nIdProspecto,
                    ps.nIdSegmentacion,
                    ps.nIdDetalleSegmentacion
                FROM prospectosegmentacion AS ps WHERE ps.nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoSegmentacionByIdProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM prospectosegmentacion WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoSegmentacion($nIdProspectoSegmentacion)
    {
        $sSQL = "DELETE FROM prospectosegmentacion WHERE nIdProspectoSegmentacion = $nIdProspectoSegmentacion ";
        return $this->db->run($sSQL);
    }

    public function fncGrabarProspectoActividad(
        $nIdProspecto,
        $nIdEmpleado,
        $nTipoActividad,
        $nIdEstadoActividad,
        $dFecha,
        $dHora,
        $sNota,
        $sLatitud,
        $sLongitud,
        $nEstado
    ) {
        $sSQL = "INSERT INTO actividades(
                       nIdProspecto,
                       nIdEmpleado,
                       nTipoActividad,
                       dFechaCreacion,
                       nIdEstadoActividad,
                       dFecha,
                       dHora,
                       sNota,
                       sLatitud,
                       sLongitud,
                       nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($nTipoActividad) || empty($nTipoActividad) ? "NULL" : "$nTipoActividad") . " ,
                    " . " NOW() " . " ,
                    " . (is_null($nIdEstadoActividad) || empty($nIdEstadoActividad) ? "NULL" : "$nIdEstadoActividad") . " ,
                    " . (is_null($dFecha) || empty($dFecha) ? "NULL" : "'$dFecha'") . " ,
                    " . (is_null($dHora) || empty($dHora) ? "NULL" : "'$dHora'") . " ,
                    " . (is_null($sNota) || empty($sNota) ? "NULL" : "'$sNota'") . " ,
                    " . (is_null($sNota) || empty($sLatitud) ? "NULL" : "'$sLatitud'") . " ,
                    " . (is_null($sNota) || empty($sLongitud) ? "NULL" : "'$sLongitud'") . " ,
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        return $this->db->run($sSQL);
    }


    public function fncActualizaProspectoActividad(
        $nIdActividad,
        $nIdProspecto,
        $nIdEmpleado,
        $nTipoActividad,
        $nIdEstadoActividad,
        $dFecha,
        $dHora,
        $sNota,
        $sLatitud,
        $sLongitud,
        $nEstado
    ) {
        $sSQL = "UPDATE actividades SET ";

        $sCOL  = (!is_null($nIdActividad) && !empty($nIdActividad) ? " nIdActividad = $nIdActividad " : "");

        $sCOL .= (!is_null($nIdProspecto) && !empty($nIdProspecto) ? (strlen($sCOL) > 0  ? "," : "") . " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($nIdEmpleado) && !empty($nIdEmpleado) ? (strlen($sCOL) > 0  ? "," : "") . " nIdEmpleado = $nIdEmpleado " : "");

        $sCOL .= (!is_null($nTipoActividad) && !empty($nTipoActividad) ? (strlen($sCOL) > 0  ? "," : "") . " nTipoActividad = $nTipoActividad " : "");

        $sCOL .= (!is_null($nIdEstadoActividad) && !empty($nIdEstadoActividad) ? (strlen($sCOL) > 0  ? "," : "") . " nIdEstadoActividad = $nIdEstadoActividad " : "");

        $sCOL .= (!is_null($dFecha) && !empty($dFecha) ? (strlen($sCOL) > 0  ? "," : "") . " dFecha = '$dFecha' " : "");

        $sCOL .= (!is_null($dHora) && !empty($dHora) ? (strlen($sCOL) > 0  ? "," : "") . " dHora = '$dHora' " : "");

        $sCOL .= (!is_null($sNota) && !empty($sNota) ? (strlen($sCOL) > 0  ? "," : "") . " sNota = '$sNota' " : "");

        $sCOL .= (!is_null($sLatitud) && !empty($sLatitud) ? (strlen($sCOL) > 0  ? "," : "") . " sLatitud = '$sLatitud' " : "");

        $sCOL .= (!is_null($sLongitud) && !empty($sLongitud) ? (strlen($sCOL) > 0  ? "," : "") . " sLongitud = '$sLongitud' " : "");

        $sCOL .= (!is_null($nEstado) ? (strlen($sCOL) > 0  ? "," : "") . " nEstado = $nEstado " : "");

        $sWhere = " WHERE nIdActividad = $nIdActividad ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }




    public function fncGetProspectoActividadByIdProspecto($nIdProspecto = null, $nTipoActividad = null, $nIdEstadoActividad = null, $nIdEmpleado = null,  $sOrderBy = null, $sLimit = null)
    {
        $sSQL = "SELECT 
                act.nIdActividad,
                act.nIdEmpleado,
                act.nIdProspecto,
                act.nIdEstadoActividad,
                IFNULL( cli.sNombreoRazonSocial , '' ) AS sCliente,
                IFNULL( DATE_FORMAT( act.dFechaCreacion, '%d/%m/%Y' ), '' ) AS dFechaCreacion,
                IFNULL(emp.sNombre ,'') AS sEmpleado,
                IFNULL(tipoestado.sDescripcionLargaItem,'') AS sEstadoActividadLarga,
                IFNULL(tipoestado.sDescripcionCortaItem,'') AS sEstadoActividadCorta,
                CONCAT(act.dFecha ,' ',act.dHora) as dtFechaEjecucion,
                IFNULL(act.sLatitud ,'') AS sLatitud,
                IFNULL(act.sLongitud ,'') AS sLongitud,
                act.nTipoActividad,
                act.dFecha,
                act.dHora,
                act.sNota,
                act.nEstado
         FROM actividades AS act 
         INNER JOIN prospectos AS p ON act.nIdProspecto = p.nIdProspecto 
         INNER JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
         INNER JOIN empleados AS emp ON act.nIdEmpleado = emp.nIdEmpleado 
         INNER JOIN catalogotabla AS tipoestado ON act.nIdEstadoActividad = tipoestado.nIdCatalogoTabla 
        ";

        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad ");

        $sWhere .= (is_null($nIdEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEmpleado = $nIdEmpleado ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= !is_null($sOrderBy) ? " ORDER BY $sOrderBy  " : "";

        $sSQL   .= !is_null($sLimit) ? " LIMIT $sLimit " : "";

        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoActividadByIdProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM actividades WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoActividad($nIdActividad)
    {
        $sSQL = "DELETE FROM actividades WHERE nIdActividad = $nIdActividad ";
        return $this->db->run($sSQL);
    }

    public function fncGrabarCambioProspecto(
        $nIdProspecto,
        $nIdEmpleado,
        $sCambio,
        $nEstado
    ) {
        $sSQL = "INSERT INTO cambiosprospecto(
                    nIdProspecto,
                    nIdEmpleado,
                    sCambio,
                    dFechaCreacion,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($sCambio) || empty($sCambio) ? "NULL" : "'$sCambio'") . " ,
                    " . "NOW()" . " ,
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        return $this->db->run($sSQL);
    }

    public function fncActualizarCambioProspecto($nIdCambio, $nEstado)
    {
        $sSQL   = "UPDATE cambiosprospecto SET ";
        $sCOL   = "";
        $sCOL  .= (!is_null($nEstado) ? (strlen($sCOL) > 0  ? "," : "") . " nEstado = $nEstado " : "");
        $sWhere = " WHERE nIdCambio = $nIdCambio ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;
        return $this->db->run($sSQL);
    }

    public function fncGetCambioProspectoByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT 
                    cp.nIdCambio,                    
                    cp.nIdEmpleado,
                    emp.sNombre AS sNombreEmpleado,
                    cp.nIdProspecto,
                    cp.sCambio,
                    DATE(cp.dFechaCreacion) AS dFechaCreacion ,
                    cp.nEstado
                FROM cambiosprospecto AS cp 
                INNER JOIN empleados AS emp ON cp.nIdEmpleado = emp.nIdEmpleado
                WHERE cp.nIdProspecto = $nIdProspecto";
        return $this->db->run($sSQL);
    }


    public function fncGetActividadesByProspecto($nIdProspecto = null, $nTipoActividad = null, $nIdEstadoActividad = null, $nIdEmpleado = null, $dFecha = null,$nIdNegocio = null)
    {

        $sSQL = "SELECT  IFNULL(COUNT(*),0) AS nCantidad FROM actividades AS act ";

        $sSQL .= (is_null($nIdEmpleado) && is_null($nIdNegocio)  ? "" : " INNER JOIN prospectos AS p ON p.nIdProspecto = act.nIdProspecto ");

        
        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad  ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad  ");

        $sWhere .= (is_null($dFecha) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.dFecha = STR_TO_DATE( '$dFecha', '%d/%m/%Y' )   ");

        $sWhere .= (is_null($nIdEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEmpleado = $nIdEmpleado ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        // echo $sSQL;
        // exit;

        return $this->db->run($sSQL)[0];
    }

    public function fncGrabarProspectoNota(
        $nIdProspecto,
        $nIdEmpleado,
        $sNota,
        $nEstado
    ) {
        $sSQL = "INSERT INTO notas(
                        nIdProspecto,
                        nIdEmpleado,
                        sNota,
                        dFechaCreacion,
                        dFechaActualizacion,
                        nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($sNota) || empty($sNota) ? "NULL" : "'$sNota'") . " ,
                    " . " NOW() " . " ,
                    " . " NOW() " . " ,
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        return $this->db->run($sSQL);
    }

    public function fncActualizaProspectoNota(
        $nIdNota,
        $nIdProspecto,
        $nIdEmpleado,
        $sNota,
        $nEstado
    ) {
        $sSQL = "UPDATE notas SET ";

        $sCOL  = (!is_null($nIdProspecto) && !empty($nIdProspecto) ?   " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($nIdEmpleado) && !empty($nIdEmpleado) ? (strlen($sCOL) > 0  ? "," : "") . " nIdEmpleado = $nIdEmpleado " : "");

        $sCOL .= (!is_null($sNota) && !empty($sNota) ? (strlen($sCOL) > 0  ? "," : "") . " sNota = '$sNota' " : "");

        $sCOL .=  " , dFechaActualizacion = NOW() ";

        $sCOL .= (!is_null($nEstado) ? (strlen($sCOL) > 0  ? "," : "") . " nEstado = $nEstado " : "");

        $sWhere = " WHERE nIdNota = $nIdNota ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }

    public function fncGetProspectoNotaByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT  
                nt.nIdNota,
                nt.nIdProspecto,
                nt.nIdEmpleado,
                emp.sNombre AS sNombreEmpleado,
                nt.sNota,
                nt.dFechaCreacion,
                DATE(nt.dFechaActualizacion) AS dFechaActualizacion ,
                nt.nEstado 
        FROM notas  AS nt 
        INNER JOIN empleados AS emp ON nt.nIdEmpleado = emp.nIdEmpleado
        WHERE nt.nIdProspecto = $nIdProspecto";
        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }


    public function fncEliminarProspectoNotaByIdProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM notas WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoNota($nIdNota)
    {
        $sSQL = "DELETE FROM notas WHERE nIdNota = $nIdNota ";
        return $this->db->run($sSQL);
    }

    public function fncActualizarFechaUltimoAccesoProspecto($nIdProspecto)
    {
        $sSQL = "UPDATE prospectos SET dFechaHoraUltimoAcceso = NOW() WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }


    public function fncActualizarControlExtra($nIdProspecto, $sCol, $sValue)
    {
        $sSQL = "UPDATE prospectos SET $sCol = '$sValue' WHERE nIdProspecto = $nIdProspecto ";
        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }


    public function fncActualizarEstadoProspecto($nIdProspecto, $nIdEtapa)
    {
        $sSQL = "UPDATE prospectos SET nIdEtapa = '$nIdEtapa' WHERE nIdProspecto = $nIdProspecto ";
        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }

    public function fncActualizarCierreProspecto($nIdProspecto)
    {
        $sSQL = "UPDATE prospectos SET dFechaCierre = NOW() WHERE nIdProspecto = $nIdProspecto ";
        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }



    public function fncGrabarProspectoAdjunto(
        $nIdProspecto,
        $sNombreArchivo,
        $nContrato
    ) {
        $sSQL = "INSERT INTO prospectoadjunto(
                        nIdProspecto,
                        sNombreArchivo,
                        dFechaCreacion,
                        nContrato
                ) VALUES (
                    " . (is_null($nIdProspecto)  ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($sNombreArchivo) || empty($sNombreArchivo) ? "NULL" : "'$sNombreArchivo'") . " ,
                    " . " CURDATE() " . " ,
                    " . (is_null($nContrato) ? "NULL" : "$nContrato") . " 
                )";
        return $this->db->run($sSQL);
    }


    public function fncObtenerProspectoAdjunto($nIdAdjunto)
    {
        $sSQL = "SELECT 
                    pa.nIdAdjunto,
                    pa.nIdProspecto,
                    pa.sNombreArchivo,
                    pa.dFechaCreacion,
                    pa.nContrato
                FROM prospectoadjunto AS pa 
                WHERE pa.nIdAdjunto = $nIdAdjunto";
        return $this->db->run($sSQL)[0];
    }

    public function fncObtenerProspectoAdjuntosByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT 
                    pa.nIdAdjunto,
                    pa.nIdProspecto,
                    pa.sNombreArchivo,
                    pa.dFechaCreacion,
                    pa.nContrato
                FROM prospectoadjunto AS pa 
                WHERE pa.nIdProspecto = $nIdProspecto";
        return $this->db->run($sSQL);
    }



    public function fncActualizaProspectoAdjunto(
        $nIdAdjunto,
        $nIdProspecto,
        $sNombreArchivo,
        $nContrato
    ) {
        $sSQL = "UPDATE prospectoadjunto SET ";

        $sCOL  = (!is_null($nIdProspecto) && !empty($nIdProspecto) ?   " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($sNombreArchivo) && !empty($sNombreArchivo) ? (strlen($sCOL) > 0  ? "," : "") . " sNombreArchivo = '$sNombreArchivo' " : "");

        $sCOL .= (!is_null($nContrato) ? (strlen($sCOL) > 0  ? "," : "") . " nContrato = $nContrato " : "");

        $sWhere = " WHERE nIdAdjunto = $nIdAdjunto ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoAdjunto($nIdAdjunto)
    {
        $sSQL = "DELETE FROM prospectoadjunto WHERE nIdAdjunto = $nIdAdjunto ";
        return $this->db->run($sSQL);
    }

    public function fncEliminarProspectoAdjuntoByProspecto($nIdProspecto)
    {
        $sSQL = "DELETE FROM prospectoadjunto WHERE nIdProspecto = $nIdProspecto ";
        return $this->db->run($sSQL);
    }



    public function fncActualizarProspectonValidacionAdmin($nValidacionAdmin)
    {
        $sSQL = "UPDATE  prospectos SET nValidacionAdmin  = $nValidacionAdmin ";
        return $this->db->run($sSQL);
    }



    public function fncObtenerCambiosForAdmin($nIdNegocio, $nEstado)
    {
        $sSQL = "SELECT cp.nIdCambio,
                        cp.nIdProspecto, 
                        cp.nIdEmpleado, cp.sCambio, cp.dFechaCreacion, 
                        cp.nEstado,
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente,
                        IFNULL(emp.sNombre,'') AS sEmpleado FROM
                        cambiosprospecto AS cp 
                 INNER JOIN prospectos AS p ON p.nIdProspecto  = cp.nIdProspecto 
                 INNER JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
                 INNER JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
                 WHERE p.nIdNegocio  = $nIdNegocio  AND cp.nEstado = $nEstado  
                 ORDER BY cp.nIdCambio DESC
                 ";
        return $this->db->run(trim($sSQL));
    }

    public function fncActualizarEstadoCambiosProspecto($nIdNegocio, $nEstado)
    {
        $sSQL = "UPDATE cambiosprospecto  AS cp INNER JOIN  prospectos AS p ON p.nIdProspecto = cp.nIdProspecto SET cp.nEstado = $nEstado  WHERE p.nIdNegocio = $nIdNegocio";
        return $this->db->run($sSQL);
    }


    public function fncObtenerDetalleProspecto($nIdProspecto, $nTipoItem)
    {
        $sSQL = "SELECT IFNULL(catTabla.sDescripcionLargaItem, '') AS sTipoItem, pc.nIdProspecto, pc.nIdCatalogo, pc.nCantidad, pc.nPrecio
                FROM prospectocatalogo AS pc 
                INNER JOIN catalogo AS cat ON cat.nIdCatalogo = pc.nIdCatalogo 
                LEFT JOIN catalogotabla AS catTabla ON cat.nTipoItem = catTabla.nIdCatalogoTabla
                WHERE pc.nIdProspecto = $nIdProspecto";
        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " AND cat.nTipoItem = $nTipoItem " : "";
        // echo $sSQL;
        // exit;
        return $this->db->run(trim($sSQL));
    }
}
