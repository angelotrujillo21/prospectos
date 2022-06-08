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
        return  $this->db->run($sSQL);
    }

    public function fncEliminarWidgetConfigProsepecto($nIdWidget)
    {
        $sSQL = "DELETE FROM configprospecto WHERE nIdWidget = $nIdWidget";
        return $this->db->run($sSQL);
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

    public function fncGetProspectoByName($sNombre, $nIdNegocio)
    {
        $sSQL = "SELECT wp.nIdWidget FROM widgetprospectos AS wp 
                INNER JOIN configprospecto AS cp ON cp.nIdWidget = wp.nIdWidget
                WHERE wp.sNombre = '$sNombre' AND cp.nIdNegocio = $nIdNegocio ";
        return $this->db->run(trim($sSQL));
    }

    public function fncValidarWidgetProspectoByName($nIdWidget, $sNombre, $nIdNegocio)
    {
        $sSQL = "SELECT wp.nIdWidget FROM widgetprospectos AS wp 
                INNER JOIN configprospecto AS cp ON cp.nIdWidget = wp.nIdWidget
                WHERE wp.nIdWidget <> $nIdWidget AND wp.sNombre = '$sNombre' AND cp.nIdNegocio = $nIdNegocio ";

        return $this->db->run(trim($sSQL));
    }

    public function fncGrabarProspecto(
        $sTitulo,
        $nIdCliente,
        $nIdNegocio,
        $nIdUsuario,
        $nIdEtapa,
        $nIdMoneda,
        $nTotalUnidades,
        $nSubTotal,
        $nPorcentajeDsct,
        $nDsct,
        $nNeto,
        $nPorcentajeTributo,
        $nTributo,
        $nTotal,
        $nEstado,
        $nTipoProspecto
    ) {

        $sSQL = $this->db->generateSQLInsert("prospectos", [
            "nIdCliente"               => (empty($nIdCliente) ? null : $nIdCliente),
            "nIdNegocio"               => $nIdNegocio,
            "sTitulo"                  => $sTitulo,
            "dFechaCreacion"           => "NOW()",
            "dFechaHoraUltimoAcceso"   => "NOW()",
            "nIdUsuario"               => $nIdUsuario,
            "nIdEtapa"                 => $nIdEtapa,
            "nIdMoneda"                => $nIdMoneda,
            "nTotalUnidades"           => $nTotalUnidades,
            "nSubTotal"                => $nSubTotal,
            "nPorcentajeDsct"          => $nPorcentajeDsct,
            "nDsct"                    => $nDsct,
            "nNeto"                    => $nNeto,
            "nPorcentajeTributo"       => $nPorcentajeTributo,
            "nTributo"                 => $nTributo,
            "nTotal"                   => $nTotal,
            "nEstado"                  => $nEstado,
            "nTipoProspecto"           => $nTipoProspecto,
        ]);

        return $this->db->run($sSQL);
    }


    public function fncActualizarProspecto(
        $nIdProspecto,
        $sTitulo,
        $nIdCliente,
        $nIdUsuario,
        $nIdEtapa,
        $nIdMoneda,
        $nTotalUnidades,
        $nSubTotal,
        $nPorcentajeDsct,
        $nDsct,
        $nNeto,
        $nPorcentajeTributo,
        $nTributo,
        $nTotal,
        $nEstado,
        $nValidacionAdmin
    ) {


        $sSQL = $this->db->generateSQLUpdate("prospectos", [
            "nIdCliente"               => $nIdCliente,
            "sTitulo"                  => $sTitulo,
            "dFechaActualizacion"      => "NOW()",
            "nIdUsuario"               => $nIdUsuario,
            "nIdEtapa"                 => $nIdEtapa,
            "nIdMoneda"                => $nIdMoneda,
            "nTotalUnidades"           => $nTotalUnidades,
            "nSubTotal"                => $nSubTotal,
            "nPorcentajeDsct"          => $nPorcentajeDsct,
            "nDsct"                    => $nDsct,
            "nNeto"                    => $nNeto,
            "nPorcentajeTributo"       => $nPorcentajeTributo,
            "nTributo"                 => $nTributo,
            "nTotal"                   => $nTotal,
            "nEstado"                  => $nEstado,
            "nValidacionAdmin"         => $nValidacionAdmin
        ], "nIdProspecto = $nIdProspecto");

        return $this->db->run($sSQL);
    }

    public function fncGetEtapaProspecto($sIds = null)
    {
        $sSQL = "SELECT nIdEtapa, sNombre, sNombreVendedor, nPorcentaje, nEstado FROM etapaprospecto WHERE nEstado = 1";
        $sSQL .= !is_null($sIds) ? " AND  nPorcentaje IN ( $sIds )" : "";
        $sSQL .= " ORDER BY nIdEtapa ASC ";
        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoAll($aryInput)
    {


        $aryAllFilters = [
            "sOrderBy"           => " p.dFechaCreacion DESC ",
            "sLimit"             => null,
            "nIdProspecto"       => null,
            "nIdNegocio"         => null,
            "nIdUsuario"         => null,
            "sBuscador"          => null,
            "nValidacionAdmin"   => null,
            "nIdEtapa"           => null,
            "nIdSupervisor"      => null,
            "nIdCliente"         => null,
            "nTipoItem"          => null,
            "dFechaCreacion"     => null,
            "dFechaCierre"       => null,
            "dDesde"             => null,
            "dHasta"             => null,
            "arySupervisor"      => null,
            "aryAsesor"          => null,
            "dFechaMayor"        => null,
            "dDesdeCierre"       => null,
            "dHastaCierre"       => null,
            "aryDpt"             => null,
            "sIdsEtapa"          => null
        ];

        $ary = $this->db->filterArray($aryInput, $aryAllFilters);

        $sSQL = "SELECT   
                        p.nIdProspecto, 
                        p.nIdNegocio, 
                        p.nIdCliente, 
                        IFNULL(p.sTitulo,'') AS sTitulo,
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, 
                        IFNULL(us.sNombre,'') AS sEmpleado, 
                        TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y' ), '' ) AS dFecha,
                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
                        IFNULL( DATE_FORMAT( p.dFechaCierre , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCierre,
                        IFNULL( DATE_FORMAT( p.dFechaHoraUltimoAcceso , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaHoraUltimoAcceso,

                        IFNULL( DATE_FORMAT( p.dFechaCreacion , '%d/%m/%Y' ), '' ) as dFechaCreacionD,
                        IFNULL( DATE_FORMAT( p.dFechaCierre , '%d/%m/%Y' ), '' ) as dFechaCierreD,

                        YEAR(p.dFechaCreacion) AS sAnio,
                        MONTH(p.dFechaCreacion) AS sMes,
                        p.nIdUsuario, 
                        p.nIdEtapa,
                        etp.sNombre AS sNombreEtapa , 
                        etp.nPorcentaje, 
                        p.nEstado,
                        IFNULL(p.nIdMoneda,0) AS nIdMoneda,
                        IFNULL(moneda.sDescripcionCortaItem,'') AS sMoneda,
                        IFNULL(p.nTotalUnidades,0) AS nTotalUnidades,
                        IFNULL(p.nSubTotal,0) AS nSubTotal,
                        IFNULL(p.nPorcentajeDsct,0) AS nPorcentajeDsct,
                        IFNULL(p.nDsct,0) AS nDsct,
                        IFNULL(p.nNeto,0) AS nNeto,
                        IFNULL(p.nPorcentajeTributo,0) AS nPorcentajeTributo,
                        IFNULL(p.nTributo,0) AS nTributo,
                        IFNULL(p.nTotal,0) AS nTotal,
                        IFNULL(p.nTipoProspecto,0) AS nTipoProspecto
        FROM prospectos AS p
        LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
        LEFT JOIN usuarios AS us  ON p.nIdUsuario = us.nIdUsuario
        LEFT JOIN etapaprospecto AS etp ON p.nIdEtapa = etp.nIdEtapa
        LEFT JOIN catalogotabla AS moneda ON moneda.nIdCatalogoTabla = p.nIdMoneda

        ";

        $sSQL .= $this->db->isNull($ary["nTipoItem"]) || empty($ary["nTipoItem"]) ? "" : " INNER JOIN prospectocatalogo AS pc ON p.nIdProspecto = pc.nIdProspecto  ";
        $sSQL .= $this->db->isNull($ary["nTipoItem"]) || empty($ary["nTipoItem"]) ? "" : " INNER JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo  ";

        $sSQL .= ((!$this->db->isNull($ary["nIdSupervisor"]) && $ary["nIdSupervisor"] > 0) || (!$this->db->isNull($ary["arySupervisor"]) && count($ary["arySupervisor"]) > 0))  ? " INNER JOIN supervisoresvendedores AS sv ON p.nIdUsuario = sv.nIdVendedor  " : "";

        $sWhere = "";


        $sWhere .= ($this->db->isNull($ary["nIdProspecto"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdProspecto = {$this->db->quote($ary['nIdProspecto'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdNegocio"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdNegocio = {$this->db->quote($ary['nIdNegocio'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdUsuario"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdUsuario = {$this->db->quote($ary['nIdUsuario'])}  ");
        $sWhere .= ($this->db->isNull($ary["sBuscador"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " CONCAT_WS( IFNULL( cli.sNombreoRazonSocial ,'' ) ,' ', us.sNombre , ' ' , etp.sNombre ,' ', DATE_FORMAT( DATE(p.dFechaCreacion) , '%d/%m/%Y' )  ,  ' ' , IFNULL( p.sTitulo , '' )  ) LIKE '%" . $ary['sBuscador'] . "%' ");
        $sWhere .= ($this->db->isNull($ary["nValidacionAdmin"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nValidacionAdmin = {$this->db->quote($ary['nValidacionAdmin'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdEtapa"]) || $ary["nIdEtapa"] == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdEtapa = {$this->db->quote($ary['nIdEtapa'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdSupervisor"]) || $ary["nIdSupervisor"] == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " sv.nIdSupervisor = {$this->db->quote($ary['nIdSupervisor'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdCliente"]) || $ary["nIdCliente"] == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdCliente = {$this->db->quote($ary['nIdCliente'])}  ");
        $sWhere .= ($this->db->isNull($ary["nTipoItem"]) || empty($ary["nTipoItem"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " cat.nTipoItem = {$this->db->quote($ary['nTipoItem'])}  ");
        $sWhere .= ($this->db->isNull($ary["dFechaCreacion"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " DATE(p.dFechaCreacion) = STR_TO_DATE( '" . $ary["dFechaCreacion"] . "', '%d/%m/%Y' ) ");
        $sWhere .= ($this->db->isNull($ary["dFechaCierre"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . "  DATE(p.dFechaCierre) = STR_TO_DATE( '" . $ary["dFechaCierre"] . "', '%d/%m/%Y' ) ");

        $sWhere .= ($this->db->isNull($ary['dDesde']) && $this->db->isNull($ary['dHasta'])  ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " DATE(p.dFechaCreacion)  BETWEEN STR_TO_DATE( '" . $ary['dDesde'] . "', '%d/%m/%Y' ) AND STR_TO_DATE( '" . $ary['dHasta'] . "', '%d/%m/%Y' )");
        $sWhere .= ($this->db->isNull($ary["arySupervisor"]) && !is_array($ary["arySupervisor"])) ? "" : ((strlen($sWhere) > 0 ? " AND " : '') . ' sv.nIdSupervisor IN (' . implode(",", $ary['arySupervisor']) . ')');
        $sWhere .= ($this->db->isNull($ary["aryAsesor"]) && !is_array($ary["aryAsesor"])) ? "" : ((strlen($sWhere) > 0 ? " AND " : '') . ' p.nIdUsuario IN (' . implode(",", $ary['aryAsesor']) . ')');
        $sWhere .= ($this->db->isNull($ary["dFechaMayor"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . "  DATE(p.dFechaCreacion) > STR_TO_DATE( '" . $ary["dFechaMayor"] . "', '%d/%m/%Y' ) ");
        $sWhere .= ($this->db->isNull($ary['dDesdeCierre']) && $this->db->isNull($ary['dHastaCierre'])  ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " DATE(p.dFechaCierre)  BETWEEN STR_TO_DATE( '" . $ary['dDesdeCierre'] . "', '%d/%m/%Y' ) AND STR_TO_DATE( '" . $ary['dHastaCierre'] . "', '%d/%m/%Y' )");
        $sWhere .= ($this->db->isNull($ary["sIdsEtapa"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " p.nIdEtapa IN (" . $ary["sIdsEtapa"] . ")  ");
        $sWhere .= ($this->db->isNull($ary["aryDpt"]) && !is_array($ary["aryDpt"])) ? "" : ((strlen($sWhere) > 0 ? " AND " : '') . ' cli.nIdDepartamento IN (' . implode(",", $ary['aryDpt']) . ')');



        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= " GROUP BY p.nIdProspecto ";

        $sSQL   .= ($this->db->isNull($ary["sOrderBy"]) ? "" : " ORDER BY " . $ary["sOrderBy"]);

        $sSQL   .= ($this->db->isNull($ary["sLimit"]) ? "" : " LIMIT " . $ary["sLimit"]);

        // echo $sSQL; 
        // exit; 
        return $this->db->run(trim($sSQL));
    }


    public function fncGetProspectoById($nIdProspecto, $nIdNegocio = null)
    {
        $sSQL = "SELECT 
                    p.nIdProspecto,
                    p.nIdNegocio, 
                    IFNULL(p.nIdCliente, '0') AS nIdCliente,
                    IFNULL(p.sTitulo, '') AS sTitulo,
                    IFNULL(cli.sNombreoRazonSocial,'') AS sCliente, 
                    IFNULL(UPPER(us.sNombre),'') AS sEmpleado,
                    TIME_TO_SEC(TIMEDIFF(NOW(), p.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso, 
                    p.nIdUsuario, 
                    p.nIdEtapa , 
                    etp.sNombre AS sNombreEtapa,
                    etp.sNombreVendedor AS sNombreEtapaVendedor,
                    etp.nPorcentaje, 
                    p.nEstado,
                    IFNULL(p.nIdMoneda,0) AS nIdMoneda,
                    IFNULL(moneda.sDescripcionCortaItem,'') AS sMoneda,
                    IFNULL(moneda.sDescripcionLargaItem,'') AS sMonedaLarga,
                    IFNULL(p.nTotalUnidades,0) AS nTotalUnidades,
                    IFNULL(p.nSubTotal,0) AS nSubTotal,
                    IFNULL(p.nPorcentajeDsct,0) AS nPorcentajeDsct,
                    IFNULL(p.nDsct,0) AS nDsct,
                    IFNULL(p.nNeto,0) AS nNeto,
                    IFNULL(p.nPorcentajeTributo,0) AS nPorcentajeTributo,
                    IFNULL(p.nTributo,0) AS nTributo,
                    IFNULL(p.nTotal,0) AS nTotal,
                    IFNULL(p.nTipoProspecto,0) AS nTipoProspecto
        FROM prospectos AS p
        LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
        LEFT JOIN usuarios AS us ON p.nIdUsuario = us.nIdUsuario
        LEFT JOIN etapaprospecto AS etp ON p.nIdEtapa = etp.nIdEtapa
        LEFT JOIN catalogotabla AS moneda ON moneda.nIdCatalogoTabla = p.nIdMoneda
        WHERE p.nIdProspecto  = $nIdProspecto ";

        $sSQL .= !is_null($nIdNegocio) ? " AND p.nIdNegocio = $nIdNegocio " : "";

        return $this->db->run($sSQL);
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

    public function fncEliminarCamposProspectoByWidget($nIdWidget)
    {
        $sSQL = "DELETE FROM prospectocamposextra WHERE nIdWidget = $nIdWidget ";
        return $this->db->run($sSQL);
    }

    public function fncGrabarProspectoCampoExtra(
        $nIdWidget,
        $nIdProspecto,
        $sValor
    ) {

        $sSQL =   $this->db->generateSQLInsert("prospectocamposextra", [
            "nIdWidget"     => $nIdWidget,
            "nIdProspecto"  => $nIdProspecto,
            "sValor"        => $sValor,
        ]);

        return $this->db->run($sSQL);
    }


    public function fncActualizarProspectoCampoExtra(
        $nIdProspectoCampoExtra,
        $sValor
    ) {

        $sSQL =   $this->db->generateSQLUpdate("prospectocamposextra", [
            "sValor"        => $sValor,
        ], "nIdProspectoCampoExtra = $nIdProspectoCampoExtra");

        return $this->db->run($sSQL);
    }


    public function fncObtenerProspectoCampoExtra($aryInput = [])
    {
        $aryAllFilters = [
            "sOrderBy"                     => " pc.nIdProspectoCampoExtra ASC ",
            "sLimit"                       => null,
            "nIdProspectoCampoExtra"       => null,
            "nIdProspecto"                 => null,
        ];

        $ary = $this->db->filterArray($aryInput, $aryAllFilters);

        $sSQL = "SELECT   
                    pc.nIdProspectoCampoExtra,
                    pc.nIdWidget,
                    pc.nIdProspecto,
                    pc.sValor,
                    wp.sNombre AS sWidgetSystem,
                    tc.sNombre AS sTipoCampoSystem
        FROM prospectocamposextra AS pc
        INNER JOIN widgetprospectos AS wp ON pc.nIdWidget = wp.nIdWidget
        INNER JOIN tiposcampos AS tc ON wp.nTipoCampo = tc.nTipoCampo
        ";

        $sWhere = "";

        $sWhere .= ($this->db->isNull($ary["nIdProspectoCampoExtra"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " pc.nIdProspectoCampoExtra = {$this->db->quote($ary['nIdProspectoCampoExtra'])}  ");
        $sWhere .= ($this->db->isNull($ary["nIdProspecto"]) ? '' : (strlen($sWhere) > 0 ? " AND " : "") . " pc.nIdProspecto = {$this->db->quote($ary['nIdProspecto'])}  ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= ($this->db->isNull($ary["sOrderBy"]) ? "" : " ORDER BY " . $ary["sOrderBy"]);

        $sSQL   .= ($this->db->isNull($ary["sLimit"]) ? "" : " LIMIT " . $ary["sLimit"]);

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
        $nCantidad,
        $nPrecio
    ) {
        $sSQL = "UPDATE prospectocatalogo SET ";

        $sCOL  = "";

        $sCOL .= (!is_null($nCantidad) ? (strlen($sCOL) > 0  ? "," : "") . " nCantidad = $nCantidad" : "");

        $sCOL .= (!is_null($nPrecio) ? (strlen($sCOL) > 0  ? "," : "") . " nPrecio = $nPrecio " : "");

        $sWhere = " WHERE nIdProspectoCatalogo = $nIdProspectoCatalogo ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }





    public function fncEliminarItemsPC($nIdProspecto, $sIdLIst)
    {
        $sSQL = "DELETE FROM prospectocatalogo  WHERE ";

        $sSQL .= ($sIdLIst == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdProspectoCatalogo NOT IN $sIdLIst");

        // echo $sSQL;
        // exit;
         
        return $this->db->run($sSQL);
    }

    
    public function fncObtenerItemsEliminadosPC($nIdProspecto, $sIdLIst)
    {
        $sSQL = "SELECT * FROM prospectocatalogo  WHERE ";

        $sSQL .= ($sIdLIst == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdProspectoCatalogo NOT IN $sIdLIst");
         
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
            IFNULL(cat.sDescripcion,'') AS sDescripcionCatalogo,
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


        $sSQL = $this->db->generateSQLInsert("prospectosegmentacion", [
            "nIdProspecto"            => $nIdProspecto,
            "nIdSegmentacion"         => $nIdSegmentacion,
            "nIdDetalleSegmentacion"  => $nIdDetalleSegmentacion == 0 ? null : $nIdDetalleSegmentacion,
        ]);

        return $this->db->run($sSQL);
    }


    public function fncActualizaProspectoSegmentacion(
        $nIdProspectoSegmentacion,
        $nIdDetalleSegmentacion
    ) {


        $sSQL =   $this->db->generateSQLUpdate("prospectosegmentacion", [
            "nIdDetalleSegmentacion" => $nIdDetalleSegmentacion,
        ], "nIdProspectoSegmentacion = $nIdProspectoSegmentacion");



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
        $nIdUsuario,
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
                       nIdUsuario,
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
                    " . (is_null($nIdUsuario) || empty($nIdUsuario) ? "NULL" : "$nIdUsuario") . " ,
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
        $nIdUsuario,
        $nIdEstadoActividad,
        $dFecha,
        $dHora,
        $sNota,
        $sLatitud,
        $sLongitud,
        $nEstado
    ) {
        $sSQL = "UPDATE actividades SET ";

        $sCOL  = "";
        $sCOL  .= (!is_null($nIdUsuario) && !empty($nIdUsuario) ? (strlen($sCOL) > 0  ? "," : "") . " nIdUsuario = $nIdUsuario " : "");

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

    public function fncEliminarItemsPA($nIdProspecto, $sIdLIst)
    {
        $sSQL = "DELETE FROM actividades WHERE ";

        $sSQL .= ($sIdLIst == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdActividad NOT IN $sIdLIst");

        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }

    public function fncObtenerEliminadosItemsPA($nIdProspecto, $sIdList)
    {
        $sSQL = "SELECT * FROM actividades WHERE ";

        $sSQL .= ($sIdList == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdActividad NOT IN $sIdList");

        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }



    public function fncGetProspectoActividadByIdProspecto(
        $nIdProspecto = null,
        $nTipoActividad = null,
        $nIdEstadoActividad = null,
        $nIdUsuario = null,
        $sOrderBy = null,
        $sLimit = null,
        $sEtapasNot = null, // Traera las actividades diferentes de la etapa rechazado ni en cierre ,
        $nIdNegocio = null
    ) {
        $sSQL = "SELECT 
                    act.nIdActividad,
                    act.nIdUsuario,
                    act.nIdProspecto,
                    act.nIdEstadoActividad,
                    IFNULL( cli.sNombreoRazonSocial , '' ) AS sCliente,
                    IFNULL( DATE_FORMAT( act.dFechaCreacion, '%d/%m/%Y' ), '' ) AS dFechaCreacion,
                    IFNULL(us.sNombre ,'') AS sEmpleado,
                    IFNULL(tipoestado.sDescripcionLargaItem,'') AS sEstadoActividadLarga,
                    IFNULL(tipoestado.sDescripcionCortaItem,'') AS sEstadoActividadCorta,
                    CONCAT(act.dFecha ,' ',act.dHora) as dtFechaEjecucion,
                    IFNULL(act.sLatitud ,'') AS sLatitud,
                    IFNULL(act.sLongitud ,'') AS sLongitud,
                    act.nTipoActividad,
                    act.dFecha,
                    IFNULL( DATE_FORMAT( act.dFecha, '%d/%m/%Y' ), '' ) AS sFecha,
                    act.dHora,
                    act.sNota,
                    act.nEstado
         FROM actividades AS act 
         INNER JOIN prospectos AS p ON act.nIdProspecto = p.nIdProspecto 
         INNER JOIN usuarios AS us ON act.nIdUsuario = us.nIdUsuario 
         INNER JOIN usuariosnegocios AS usn ON us.nIdUsuario = usn.nIdUsuario
         LEFT JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
         LEFT JOIN catalogotabla AS tipoestado ON act.nIdEstadoActividad = tipoestado.nIdCatalogoTabla";

        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad ");

        $sWhere .= (is_null($nIdUsuario) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdUsuario = $nIdUsuario ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad ");

        $sWhere .= (is_null($sEtapasNot) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa NOT IN ( $sEtapasNot ) ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " usn.nIdNegocio = $nIdNegocio ");


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
        $nIdUsuario,
        $nIdEtapa,
        $sCambio,
        $nEstado
    ) {
        $sSQL = "INSERT INTO cambiosprospecto(
                    nIdProspecto,
                    nIdUsuario,
                    nIdEtapa,
                    sCambio,
                    dFechaCreacion,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : "$nIdProspecto") . " ,
                    " . (is_null($nIdUsuario) || empty($nIdUsuario) ? "NULL" : "$nIdUsuario") . " ,
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
                    cp.nIdUsuario,
                    UPPER(us.sNombre) AS sNombreEmpleado,
                    cp.nIdProspecto,
                    cp.sCambio,
                    DATE(cp.dFechaCreacion) AS dFechaCreacion ,
                    IFNULL( DATE_FORMAT( cp.dFechaCreacion, '%d/%m/%Y' ), '' ) AS sFechaCreacion,
                    cp.nEstado
                FROM cambiosprospecto AS cp 
                INNER JOIN usuarios AS us ON cp.nIdUsuario = us.nIdUsuario
                WHERE cp.nIdProspecto = $nIdProspecto ORDER BY cp.nIdCambio DESC" ;
        return $this->db->run($sSQL);
    }


    public function fncGetActividadesByProspecto(
        $nIdProspecto = null,
        $nTipoActividad = null,
        $nIdEstadoActividad = null,
        $nIdUsuario = null,
        $dFecha = null,
        $nIdNegocio = null,
        $nIdSupervisor = null
    ) {

        $sSQL = "SELECT  IFNULL(COUNT(*),0) AS nCantidad FROM actividades AS act ";

        $sSQL .= (is_null($nIdUsuario) && is_null($nIdNegocio)  ? "" : " INNER JOIN prospectos AS p ON p.nIdProspecto = act.nIdProspecto ");

        $sSQL .= (is_null($nIdSupervisor) || strlen($nIdSupervisor) == 0  ? "" :
            " INNER JOIN prospectos AS p1 ON p1.nIdProspecto = act.nIdProspecto 
              INNER JOIN supervisoresvendedores AS spv ON spv.nIdNegocio = p1.nIdNegocio
              ");


        $sWhere = "";

        $sWhere .= (is_null($nIdProspecto) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdProspecto = $nIdProspecto ");

        $sWhere .= (is_null($nTipoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nTipoActividad = $nTipoActividad  ");

        $sWhere .= (is_null($nIdEstadoActividad) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.nIdEstadoActividad = $nIdEstadoActividad  ");

        $sWhere .= (is_null($dFecha) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " act.dFecha = STR_TO_DATE( '$dFecha', '%d/%m/%Y' )   ");

        $sWhere .= (is_null($nIdUsuario) || strlen($nIdUsuario) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdUsuario = $nIdUsuario ");

        $sWhere .= (is_null($nIdSupervisor) || strlen($nIdSupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " spv.nIdSupervisor = $nIdSupervisor ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        // echo $sSQL;
        // exit;

        return $this->db->run($sSQL)[0];
    }

    public function fncGrabarProspectoNota(
        $nIdProspecto,
        $nIdUsuario,
        $sNota,
        $nEstado
    ) {
        $sSQL = "INSERT INTO notas(
                        nIdProspecto,
                        nIdUsuario,
                        sNota,
                        dFechaCreacion,
                        dFechaActualizacion,
                        nEstado
                ) VALUES (
                    " . (is_null($nIdProspecto) || empty($nIdProspecto) ? "NULL" : $nIdProspecto) . " ,
                    " . (is_null($nIdUsuario) || empty($nIdUsuario) ? "NULL" : $nIdUsuario) . " ,
                     " . (is_null($sNota) || empty($sNota) ? "NULL" : "'$sNota'") . " ,
                    " . " NOW() " . " ,
                    " . " NOW() " . " ,
                    " . (is_null($nEstado) ? "NULL" : "$nEstado") . " 
                )";

        // echo $sSQL;
        // exit;

        return $this->db->run($sSQL);
    }

    public function fncActualizaProspectoNota(
        $nIdNota,
        $sNota
    ) {
        $sSQL = "UPDATE notas SET ";

        $sCOL  = "";

        $sCOL .= (!is_null($sNota) && !empty($sNota) ? (strlen($sCOL) > 0  ? "," : "") . " sNota = {$this->db->quote($sNota)}  " : "");

        $sCOL .=  " , dFechaActualizacion = NOW() ";

        $sWhere = " WHERE nIdNota = $nIdNota ";

        $sSQL  =  $sSQL . $sCOL . $sWhere;

        return $this->db->run($sSQL);
    }



    public function fncEliminarItemsNota($nIdProspecto, $sIdLIst)
    {
        $sSQL = "DELETE FROM notas WHERE ";

        $sSQL .= ($sIdLIst == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdNota NOT IN $sIdLIst");

        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }

    public function fncObtenerNotasEliminadas($nIdProspecto, $sIdLIst)
    {
        $sSQL = "SELECT * FROM notas WHERE ";

        $sSQL .= ($sIdLIst == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdNota NOT IN $sIdLIst");

        // echo $sSQL;
        // exit;
        return $this->db->run($sSQL);
    }





    public function fncGetProspectoNotaByIdProspecto($nIdProspecto)
    {
        $sSQL = "SELECT  
                    nt.nIdNota,
                    nt.nIdProspecto,
                    nt.nIdUsuario,
                    UPPER(us.sNombre) AS sAutor,
                    IFNULL(nt.sNota,'') AS sNota,
                    nt.dFechaCreacion,
                    DATE(nt.dFechaActualizacion) AS dFechaActualizacion,
                    nt.nEstado 
                FROM notas AS nt 
                INNER JOIN usuarios AS us ON nt.nIdUsuario = us.nIdUsuario
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


    public function fncObtenerItemsEliminadosProspectoAdjunto($nIdProspecto, $sIdList)
    {
        $sSQL = "SELECT * FROM prospectoadjunto WHERE ";

        $sSQL .= ($sIdList == '' ? " nIdProspecto = $nIdProspecto " : " nIdProspecto = $nIdProspecto AND nIdAdjunto NOT IN $sIdList");
        // echo $sSQL;
        // exit;
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
                        cp.nIdUsuario,
                        cp.sCambio, 
                        IFNULL( DATE_FORMAT( cp.dFechaCreacion , '%d/%m/%Y %H:%i:%s' ), '' ) as dFechaCreacion,
                        cp.nEstado,
                        IFNULL(cli.sNombreoRazonSocial,'') AS sCliente,
                        IFNULL(us.sNombre,'') AS sEmpleado FROM
                        cambiosprospecto AS cp 
                 INNER JOIN prospectos AS p ON p.nIdProspecto  = cp.nIdProspecto 
                 INNER JOIN clientes AS cli ON p.nIdCliente = cli.nIdCliente
                 INNER JOIN usuarios AS us ON p.nIdUsuario = us.nIdUsuario
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
                LEFT JOIN usuarios AS us ON p.nIdUsuario = us.nIdUsuario
                LEFT JOIN supervisoresvendedores AS sv ON p.nIdUsuario = sv.nIdVendedor";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoCliente) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  cli.nTipoCliente = $nTipoCliente  ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " sv.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdUsuario IN (" . implode(",", $aryAsesor) . ") ");

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
                    cat.nIdCatalogo,
                    cat.sNombre AS sCatalogo,
                    YEAR(p.dFechaCreacion) AS sAnio,
                    MONTH(p.dFechaCreacion) AS sIdMes,
                    SUM(pc.nCantidad) AS nCantidad
                FROM prospectos AS p 
                INNER JOIN prospectocatalogo AS pc ON pc.nIdProspecto = p.nIdProspecto
                LEFT JOIN catalogo AS cat ON pc.nIdCatalogo = cat.nIdCatalogo
                LEFT JOIN usuarios AS us ON p.nIdUsuario = us.nIdUsuario
                LEFT JOIN supervisoresvendedores AS sv ON p.nIdUsuario = sv.nIdVendedor";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " sv.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdUsuario IN (" . implode(",", $aryAsesor) . ") ");

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
                    LEFT JOIN usuarios AS us ON p.nIdUsuario = us.nIdUsuario
                    LEFT JOIN supervisoresvendedores AS sv ON p.nIdUsuario = sv.nIdVendedor";

        $sWhere = "";

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nTipoItem) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " cat.nTipoItem  = $nTipoItem ");

        $sWhere  .= (is_null($arySupervisor) || count($arySupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " sv.nIdSupervisor IN (" . implode(",", $arySupervisor) . ") ");

        $sWhere  .= (is_null($aryAsesor) || count($aryAsesor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdUsuario IN (" . implode(",", $aryAsesor) . ") ");

        $sWhere .=  ((is_null($dDesde) && is_null($dHasta)) || (empty($dDesde) && empty($dHasta)) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "  p.dFechaCreacion  BETWEEN STR_TO_DATE( '$dDesde 00:00:00', '%d/%m/%Y %H:%i:%s' ) AND STR_TO_DATE( '$dHasta 23:59:59', '%d/%m/%Y %H:%i:%s' ) ");

        $sWhere .= (is_null($nIdEtapa) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " p.nIdEtapa  = $nIdEtapa ");

        $sSQL  .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere . "  GROUP BY MONTH(p.dFechaCreacion) , cli.nTipoCliente   ";

        return $this->db->run($sSQL);
    }


    public function fncActualizaEmpleadoProspecto(
        $nIdProspecto,
        $nIdUsuario
    ) {
        $sSQL = $this->db->generateSQLUpdate("prospectos", [
            "nIdUsuario" => $nIdUsuario
        ], "nIdProspecto = $nIdProspecto");
        return $this->db->run($sSQL);
    }

    public function fncObtenerProspectosByIdCliente($nIdCliente)
    {
        $sSQL = "SELECT p.nIdProspecto FROM prospectos AS p  WHERE p.nIdCliente = $nIdCliente";
        return $this->db->run($sSQL);
    }
}
