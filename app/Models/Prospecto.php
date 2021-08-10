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
        $sTitulo,
        $nIdCliente,
        $nIdNegocio,
        $nIdEmpleado,
        $nIdEtapa,
        $nEstado,
        $aryValueExtra
    ) {

        // En este caso especial vamos a sanitizar los valores extras que vienen del front 

        if (is_array($aryValueExtra) && count($aryValueExtra) > 0) {
            foreach ($aryValueExtra as $sKey => $sValue) {
                $aryValueExtra[$sKey] = $this->db->quote($sValue);
            }
        }


        $sSQL = "INSERT INTO prospectos(
                        nIdCliente,
                        nIdNegocio,
                        sTitulo,
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
                    " . (is_null($sTitulo) || empty($sTitulo) ? "NULL" : $this->db->quote($sTitulo)) . " ,

                    " . " NOW(), " . "
                    " . " NOW(), " . "
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($nIdEtapa) || $nIdEtapa == '' ? "NULL" : "$nIdEtapa") . " ,
                    " . (is_null($nEstado) || $nEstado == '' ? "NULL" : "$nEstado");

        $sSQL .=   is_array($aryValueExtra) && count($aryValueExtra) > 0 ? ("," . implode(" , ", array_values($aryValueExtra))) : "";
        $sSQL .=   ")";

        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }

    public function fncGetEtapaProspecto($sIds = null)
    {
        $sSQL = "SELECT nIdEtapa, sNombre, sNombreVendedor, nPorcentaje, nEstado FROM etapaprospecto WHERE nEstado = 1";
        $sSQL .= !is_null($sIds) ? " AND  nPorcentaje IN ( $sIds )" : "";
        $sSQL .= " ORDER BY nIdEtapa ASC ";
        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoAll(
        $nIdNegocio,
        $nIdEmpleado = null,
        $sBuscador = null,
        $nValidacionAdmin = null,
        $nIdEtapa = null,
        $nIdSupervisor = null,
        $nIdCliente = null,
        $nTipoItem = null,
        $dFechaCreacion = null,
        $dFechaCierre = null,
        $dDesde = null,
        $dHasta = null,
        $arySupervisor = null,
        $aryAsesor = null,
        $dFechaMayor = null,
        $sOrderBy =  " p.dFechaCreacion DESC "
    ) {
        $sSQL = "SELECT   
                        p.nIdProspecto, 
                        p.nIdNegocio, 
                        p.nIdCliente, 
                        IFNULL(p.sTitulo,'') AS sTitulo,
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, 
                        IFNULL(emp.sNombre,'') AS sEmpleado, 
                        TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y' ), '' ) AS dFecha,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
                        IFNULL( DATE_FORMAT( p.dFechaHoraUltimoAcceso , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaHoraUltimoAcceso,
                        YEAR(p.dFechaCreacion) AS sAnio,
                        MONTH(p.dFechaCreacion) AS sMes,
                        p.nIdEmpleado, 
                        p.nIdEtapa,
                        etp.sNombre AS sNombreEtapa , 
                        etp.nPorcentaje, 
                        p.nEstado
        FROM prospectos AS p
        LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
        LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
        LEFT JOIN empleados AS super ON emp.nIdSupervisor = super.nIdEmpleado
        LEFT JOIN etapaprospecto AS etp ON p.nIdEtapa = etp.nIdEtapa ";

        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " INNER JOIN prospectocatalogo AS pc ON p.nIdProspecto = pc.nIdProspecto  " : "";
        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " INNER JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo  " : "";


        $sSQL .= " WHERE p.nIdNegocio  = $nIdNegocio ";

        $sSQL .= !is_null($nIdEmpleado) && !empty($nIdEmpleado) && ($nIdEmpleado) > 0 ? " AND p.nIdEmpleado = $nIdEmpleado " : "";
        $sSQL .= !is_null($sBuscador)  && !empty($sBuscador) ?  " AND concat_ws( ' ' , cli.sNombreoRazonSocial,' ', super.sNombre , ' ' , emp.sNombre , ' ' , etp.sNombre ,' ', DATE_FORMAT( DATE(p.dFechaCreacion) , '%d/%m/%Y' )  ) LIKE '%$sBuscador%' " : "";
        $sSQL .= !is_null($nValidacionAdmin) ? " AND p.nValidacionAdmin = $nValidacionAdmin " : "";
        $sSQL .= !is_null($nIdEtapa) && !empty($nIdEtapa) ? " AND p.nIdEtapa = $nIdEtapa " : "";
        $sSQL .= !is_null($nIdSupervisor)  && !empty($nIdSupervisor) ? " AND emp.nIdSupervisor = $nIdSupervisor " : "";
        $sSQL .= !is_null($nIdCliente)  && !empty($nIdCliente) ? " AND p.nIdCliente = $nIdCliente " : "";
        $sSQL .= !is_null($nTipoItem)  && !empty($nTipoItem) && ($nTipoItem) > 0  ? " AND cat.nTipoItem = $nTipoItem " : "";
        $sSQL .= !is_null($dFechaCreacion)  && !empty($dFechaCreacion) ? " AND DATE(p.dFechaCreacion) = STR_TO_DATE( '$dFechaCreacion', '%d/%m/%Y' ) " : "";
        $sSQL .= !is_null($dFechaCierre)  && !empty($dFechaCierre) ? " AND DATE(p.dFechaCierre) = STR_TO_DATE( '$dFechaCierre', '%d/%m/%Y' ) " : "";
        $sSQL .= !empty($dDesde) && !empty($dHasta) ? " AND p.dFechaCreacion  BETWEEN STR_TO_DATE( '$dDesde 00:00:00', '%d/%m/%Y %H:%i:%s' ) AND STR_TO_DATE( '$dHasta 23:59:59', '%d/%m/%Y %H:%i:%s' ) "  : "";
        $sSQL .= !is_null($arySupervisor) && is_array($arySupervisor) && count($arySupervisor) > 0 ? " AND emp.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") " : "";
        $sSQL .= !is_null($aryAsesor) && is_array($aryAsesor) && count($aryAsesor) > 0 ? " AND p.nIdEmpleado IN (" . implode(",", $aryAsesor) . ") " : "";
        $sSQL .= !empty($dFechaMayor) && !empty($dFechaMayor) ? " AND  DATE(p.dFechaCreacion)  >  STR_TO_DATE( '$dFechaMayor' , '%d/%m/%Y' )   "  : "";

        $sSQL .=  "  GROUP BY p.nIdProspecto ";

        $sSQL .= " ORDER BY $sOrderBy ";

        // echo $sSQL; 
        // exit;

        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoById($nIdProspecto, $nIdNegocio = null, $aryExtra = [])
    {
        $sSQL = "SELECT p.nIdProspecto,
                        p.nIdNegocio, 
                        IFNULL(p.nIdCliente, '0') AS nIdCliente,
                        IFNULL(p.sTitulo, '') AS sTitulo,
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, 
                        IFNULL(emp.sNombre,'') AS sEmpleado,
                        TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso, 
                        p.nIdEmpleado, 
                        p.nIdEtapa , 
                        etp.sNombre AS sNombreEtapa,
                        etp.sNombreVendedor AS sNombreEtapaVendedor,
                        etp.nPorcentaje, 
                        p.nEstado";

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


    public function fncExistWidgetInConfigProspecto($nIdNegocio, $nIdWidget, $nEstado)
    {
        $sSQL = "SELECT cp.nIdConfigProspecto FROM  configprospecto AS cp WHERE cp.nIdNegocio = $nIdNegocio AND cp.nIdWidget = $nIdWidget AND cp.nEstado = $nEstado ";
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
                wp.sNombreUsuario AS sWidget, wp.nEdit, wp.nDefault , IFNULL(wp.nDisabled,0) AS nDisabled , wp.sValores,  wp.nTamano, wp.nRequerido , wp.nTipoWidget, 
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
            IFNULL(cat.sImagen,'') AS sImagenCatalogo,
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
                    IFNULL(ps.nIdProspecto,0) AS nIdProspecto,
                    IFNULL(ps.nIdSegmentacion,0) AS nIdSegmentacion,
                    IFNULL(ps.nIdDetalleSegmentacion,0) AS nIdDetalleSegmentacion
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
                    " . (is_null($sNota) ? "NULL" : $this->db->quote($sNota)) . " ,
                    " . (is_null($sLatitud) || empty($sLatitud) ? "NULL" : "'$sLatitud'") . " ,
                    " . (is_null($sLongitud) || empty($sLongitud) ? "NULL" : "'$sLongitud'") . " ,
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

        $sCOL .= (!is_null($sNota) && !empty($sNota) ? (strlen($sCOL) > 0  ? "," : "") . " sNota = {$this->db->quote($sNota)} " : "");

        $sCOL .= (!is_null($sLatitud) && !empty($sLatitud) ? (strlen($sCOL) > 0  ? "," : "") . " sLatitud = '$sLatitud' " : "");

        $sCOL .= (!is_null($sLongitud) && !empty($sLongitud) ? (strlen($sCOL) > 0  ? "," : "") . " sLongitud = '$sLongitud' " : "");

        $sCOL .= (!is_null($nEstado) ? (strlen($sCOL) > 0  ? "," : "") . " nEstado = $nEstado " : "");

        $sWhere = " WHERE nIdActividad = $nIdActividad ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }




    public function fncGetProspectoActividadByIdProspecto(
        $nIdProspecto = null,
        $nTipoActividad = null,
        $nIdEstadoActividad = null,
        $nIdEmpleado = null,
        $sOrderBy = null,
        $sLimit = null,
        $sEtapasNot = null // Traera las actividades diferentes de la etapa rechazado ni en cierre 
    ) {
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
         LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
         LEFT JOIN empleados AS emp ON act.nIdEmpleado = emp.nIdEmpleado 
         LEFT JOIN catalogotabla AS tipoestado ON act.nIdEstadoActividad = tipoestado.nIdCatalogoTabla 
        ";

        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad ");

        $sWhere .= (is_null($nIdEmpleado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEmpleado = $nIdEmpleado ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad ");

        $sWhere .= (is_null($sEtapasNot) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa NOT IN ( $sEtapasNot ) ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= !is_null($sOrderBy) ? " ORDER BY $sOrderBy  " : "";

        $sSQL   .= !is_null($sLimit) ? " LIMIT $sLimit " : "";

        // echo $sSQL;
        // exit;

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
        $nIdEtapa,
        $sCambio,
        $nEstado
    ) {
        $sSQL = "INSERT INTO cambiosprospecto(
                    nIdProspecto,
                    nIdEmpleado,
                    nIdEtapa,
                    sCambio,
                    dFechaCreacion,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdEmpleado) || empty($nIdEmpleado) ? "NULL" : "$nIdEmpleado") . " ,
                    " . (is_null($nIdEtapa) || empty($nIdEtapa) ? "NULL" : "$nIdEtapa") . " ,
                    " . (is_null($sCambio) || empty($sCambio) ? "NULL" : "'$sCambio'") . " ,
                    " . " NOW() " . " ,
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


    public function fncGetActividadesByProspecto(
        $nIdProspecto = null,
        $nTipoActividad = null,
        $nIdEstadoActividad = null,
        $nIdEmpleado = null,
        $dFecha = null,
        $nIdNegocio = null,
        $nIdSupervisor = null
    ) {

        $sSQL = "SELECT  IFNULL(COUNT(*),0) AS nCantidad FROM actividades AS act ";

        $sSQL .= (is_null($nIdEmpleado) && is_null($nIdNegocio)  ? "" : " INNER JOIN prospectos AS p ON p.nIdProspecto = act.nIdProspecto ");

        $sSQL .= (is_null($nIdSupervisor) || strlen($nIdSupervisor) == 0  ? "" :
            " LEFT JOIN prospectos AS p1 ON p1.nIdProspecto = act.nIdProspecto 
          LEFT JOIN empleados AS emp1 ON p1.nIdEmpleado = emp1.nIdEmpleado 
        ");


        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad  ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad  ");

        $sWhere .= (is_null($dFecha) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.dFecha = STR_TO_DATE( '$dFecha', '%d/%m/%Y' )   ");

        $sWhere .= (is_null($nIdEmpleado) || strlen($nIdEmpleado) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEmpleado = $nIdEmpleado ");

        $sWhere .= (is_null($nIdSupervisor) || strlen($nIdSupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp1.nIdSupervisor = $nIdSupervisor ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        // echo $sSQL;
        // exit;

        return $this->db->run($sSQL)[0];
    }

    public function fncGrabarProspectoNota(
        $nIdProspecto,
        $nIdTipoEntidad,
        $nTipoEntidad,
        $sNota,
        $nEstado
    ) {
        $sSQL = "INSERT INTO notas(
                        nIdProspecto,
                        nIdTipoEntidad,
                        nTipoEntidad,
                        sNota,
                        dFechaCreacion,
                        dFechaActualizacion,
                        nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : $nIdProspecto) . " ,
                    " . (is_null($nIdTipoEntidad) || empty($nIdTipoEntidad) ? "NULL" : $nIdTipoEntidad) . " ,
                    " . (is_null($nTipoEntidad) || empty($nTipoEntidad) ? "NULL" : $nTipoEntidad) . " ,
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
        $nIdTipoEntidad,
        $nTipoEntidad,
        $sNota,
        $nEstado
    ) {
        $sSQL = "UPDATE notas SET ";

        $sCOL  = (!is_null($nIdProspecto) && !empty($nIdProspecto) ?   " nIdProspecto = $nIdProspecto " : "");

        $sCOL .= (!is_null($nIdTipoEntidad) && !empty($nIdTipoEntidad) ? (strlen($sCOL) > 0  ? "," : "") . " nIdTipoEntidad = $nIdTipoEntidad " : "");

        $sCOL .= (!is_null($nTipoEntidad) && !empty($nTipoEntidad) ? (strlen($sCOL) > 0  ? "," : "") . " nTipoEntidad = $nTipoEntidad " : "");

        $sCOL .= (!is_null($sNota) && !empty($sNota) ? (strlen($sCOL) > 0  ? "," : "") . " sNota = {$this->db->quote($sNota)}  " : "");

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
                nt.nIdTipoEntidad,
                nt.nTipoEntidad,
                CONCAT( IFNULL(emp.sNombre , '') ,  IFNULL(CONCAT(usu.sNombre,' ',usu.sApellidos),'') ) AS sAutor,
                nt.sNota,
                nt.dFechaCreacion,
                DATE(nt.dFechaActualizacion) AS dFechaActualizacion ,
                nt.nEstado 
        FROM notas AS nt 
        LEFT JOIN empleados AS emp ON nt.nIdTipoEntidad = emp.nIdEmpleado
        LEFT JOIN usuarios AS usu ON nt.nIdTipoEntidad = usu.nIdUsuario
        WHERE nt.nIdProspecto = $nIdProspecto ORDER BY nt.nIdNota DESC";
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
        $sSQL = "UPDATE prospectos SET $sCol = " . $this->db->quote($sValue) . " WHERE nIdProspecto = $nIdProspecto ";
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



    public function fncActualizarProspectonValidacionAdmin($nIdProspecto, $nValidacionAdmin)
    {
        $sSQL = "UPDATE  prospectos SET nValidacionAdmin  = $nValidacionAdmin  WHERE nIdProspecto = $nIdProspecto";
        return $this->db->run($sSQL);
    }



    public function fncObtenerCambiosForAdmin($nIdNegocio, $nEstado)
    {
        $sSQL = "SELECT cp.nIdCambio,
                        cp.nIdProspecto, 
                        cp.nIdEmpleado,
                        cp.sCambio, 
                        IFNULL( DATE_FORMAT( cp.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
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

    public function fncActualizarEstadoCambiosProspecto($nIdCambio, $nEstado)
    {
        $sSQL = "UPDATE cambiosprospecto SET nEstado = $nEstado WHERE nIdCambio = $nIdCambio";
        return $this->db->run($sSQL);
    }


    public function fncObtenerDetalleProspecto($nIdProspecto, $nTipoItem)
    {
        $sSQL = "SELECT IFNULL(catTabla.sDescripcionLargaItem, '') AS sTipoItem, 
                        IFNULL(cat.sNombre, '') AS sCatalogo, 
                        pc.nIdProspecto, 
                        pc.nIdCatalogo, 
                        pc.nCantidad, 
                        cat.nTipoItem AS nTipoItem,
                        pc.nPrecio
                FROM prospectocatalogo AS pc 
                INNER JOIN catalogo AS cat ON cat.nIdCatalogo = pc.nIdCatalogo 
                LEFT JOIN catalogotabla AS catTabla ON cat.nTipoItem = catTabla.nIdCatalogoTabla
                WHERE pc.nIdProspecto = $nIdProspecto";
        $sSQL .= !is_null($nTipoItem) && !empty($nTipoItem) ? " AND cat.nTipoItem = $nTipoItem " : "";
        // echo $sSQL;
        // exit;
        return $this->db->run(trim($sSQL));
    }


    public function fncObtenerEtapaProspectoById($nIdEtapa)
    {
        $sSQL = "SELECT ep.nIdEtapa, ep.sNombre, ep.sNombreVendedor, ep.nPorcentaje, ep.nEstado FROM etapaprospecto AS ep WHERE ep.nIdEtapa = $nIdEtapa";

        return $this->db->run(trim($sSQL))[0];
    }


    public function fncEliminarProspectoCerrado($nIdProspecto, $nIdEtapa)
    {
        $sSQL = "UPDATE prospectos SET nIdEtapa = '$nIdEtapa' , dFechaCierre = NULL WHERE nIdProspecto = $nIdProspecto ";
        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }

    public function fncObtenerAdjuntoContrato($nIdProspecto)
    {
        $sSQL = "SELECT 
                    pa.nIdAdjunto,
                    pa.nIdProspecto,
                    pa.sNombreArchivo,
                    pa.dFechaCreacion,
                    pa.nContrato
                FROM prospectoadjunto AS pa 
                WHERE pa.nIdProspecto = $nIdProspecto AND pa.nContrato = 1";
        return $this->db->run($sSQL);
    }


    public function fncGetNegocioByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT nIdNegocio FROM prospectos WHERE nIdProspecto = $nIdProspecto";
        return $this->db->run($sSQL)[0];
    }


    // Este metodo trae la inforacion de los cambios del prospecto y vamos a verificar porque etapas a pasado 
    public function fncVerificarProspectoEtapaByIdProspecto($nIdProspecto, $sEtapasIn = null, $sEtapasNot = null)
    {
        $sSQL = "SELECT  cp.nIdProspecto FROM cambiosprospecto AS cp  WHERE cp.nIdProspecto = $nIdProspecto  ";

        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cp.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($sEtapasIn) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "   cp.nIdEtapa IN ($sEtapasIn) ");

        $sWhere .= (is_null($sEtapasNot) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cp.nIdEtapa NOT IN ($sEtapasNot) ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        return $this->db->run($sSQL);
    }



    public function fncGetDataForReportClienteCatalogo(
        $nIdNegocio  = null,
        $nTipoCliente = null,
        $nTipoItem = null,
        $arySupervisor = null,
        $aryAsesor = null,
        $dDesde = null,
        $dHasta = null,
        $nIdEtapa = null
    ) {
        $sSQL = "SELECT 
                cat.sNombre AS sCatalogo,
                SUM(pc.nCantidad) AS nCantidad
                FROM prospectos AS p 
                INNER JOIN prospectocatalogo AS pc ON pc.nIdProspecto = p.nIdProspecto
                LEFT JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
                LEFT JOIN clientes AS cli ON cli.nIdCliente = p.nIdCliente
                LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
                LEFT JOIN empleados AS super ON emp.nIdSupervisor = super.nIdEmpleado";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoCliente) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  cli.nTipoCliente = $nTipoCliente  ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEmpleado IN (" . implode(",", $aryAsesor) . ") ");

        $sWhere .=  ((is_null($dDesde) && is_null($dHasta)) || (empty($dDesde) && empty($dHasta)) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  p.dFechaCreacion  BETWEEN STR_TO_DATE( '$dDesde 00:00:00', '%d/%m/%Y %H:%i:%s' ) AND STR_TO_DATE( '$dHasta 23:59:59', '%d/%m/%Y %H:%i:%s' ) ");

        $sWhere .= (is_null($nIdEtapa) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa  = $nIdEtapa ");

        $sSQL  .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere . "  GROUP BY pc.nIdCatalogo   ";


        // echo $sSQL."\n";

        return $this->db->run($sSQL);
    }



    public function fncGetDataForReportCatalogo(
        $nIdNegocio  = null,
        $nTipoItem = null,
        $arySupervisor = null,
        $aryAsesor = null,
        $dDesde = null,
        $dHasta = null,
        $nIdEtapa = null

    ) {
        $sSQL = "SELECT 
                cat.nIdCatalogo ,
                cat.sNombre AS sCatalogo,
                YEAR(p.dFechaCreacion) AS sAnio,
                MONTH(p.dFechaCreacion) AS sIdMes,
                SUM(pc.nCantidad) AS nCantidad
                FROM prospectos AS p 
                INNER JOIN prospectocatalogo AS pc ON pc.nIdProspecto = p.nIdProspecto
                LEFT JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
                LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
                LEFT JOIN empleados AS super ON emp.nIdSupervisor = super.nIdEmpleado";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEmpleado IN (" . implode(",", $aryAsesor) . ") ");

        $sWhere .=  ((is_null($dDesde) && is_null($dHasta)) || (empty($dDesde) && empty($dHasta)) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  p.dFechaCreacion  BETWEEN STR_TO_DATE( '$dDesde 00:00:00', '%d/%m/%Y %H:%i:%s' ) AND STR_TO_DATE( '$dHasta 23:59:59', '%d/%m/%Y %H:%i:%s' ) ");

        $sWhere .= (is_null($nIdEtapa) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa  = $nIdEtapa ");

        $sSQL  .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere . "  GROUP BY MONTH(p.dFechaCreacion)  , cat.nIdCatalogo ";


        // echo $sSQL;
        // exit;

        return $this->db->run($sSQL);
    }


    public function fncGetDataForReportCliente(
        $nIdNegocio  = null,
        $nTipoItem = null,
        $arySupervisor = null,
        $aryAsesor = null,
        $dDesde = null,
        $dHasta = null,
        $nIdEtapa = null
    ) {
        $sSQL = "SELECT 
                    cli.nTipoCliente,
                    MONTH(p.dFechaCreacion) AS sIdMes,
                    YEAR(p.dFechaCreacion) AS sAnio,           
                    SUM(pc.nCantidad) AS nCantidad
                    FROM prospectos AS p 
                    INNER JOIN prospectocatalogo AS pc ON pc.nIdProspecto = p.nIdProspecto
                    LEFT JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
                    LEFT JOIN clientes AS cli ON cli.nIdCliente = p.nIdCliente
                    LEFT JOIN empleados AS emp ON p.nIdEmpleado = emp.nIdEmpleado
                    LEFT JOIN empleados AS super ON emp.nIdSupervisor = super.nIdEmpleado";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " emp.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEmpleado IN (" . implode(",", $aryAsesor) . ") ");

        $sWhere .=  ((is_null($dDesde) && is_null($dHasta)) || (empty($dDesde) && empty($dHasta)) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  p.dFechaCreacion  BETWEEN STR_TO_DATE( '$dDesde 00:00:00', '%d/%m/%Y %H:%i:%s' ) AND STR_TO_DATE( '$dHasta 23:59:59', '%d/%m/%Y %H:%i:%s' ) ");

        $sWhere .= (is_null($nIdEtapa) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa  = $nIdEtapa ");

        $sSQL  .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere . "  GROUP BY MONTH(p.dFechaCreacion) , cli.nTipoCliente   ";

        return $this->db->run($sSQL);
    }


    public function fncActualizaEmpleadoProspecto(
        $nIdProspecto,
        $nIdEmpleado
    ) {
        $sSQL = $this->db->generateSQLUpdate("prospectos",[
            "nIdEmpleado" => $nIdEmpleado
        ],"nIdProspecto = $nIdProspecto");
        return $this->db->run($sSQL);
    }
}
