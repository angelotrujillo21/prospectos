<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class CatalogoTabla
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncMostrarRegistro($xIdRegistro)
    {
        $sql = "SELECT c.*,(SELECT DISTINCT b.sNombreCatalogo 
                            FROM catalogotabla a
                            JOIN catalogotabla b 
                            ON b.nIdCatalogoTabla = a.nIdCatalogoTablaPadre
                            WHERE a.sNombreCatalogo=c.sNombreCatalogo 
                            )  AS sNombreCatalogoPadre
                FROM  catalogotabla c                 
                WHERE c.nIdCatalogoTabla = '$xIdRegistro' ";
        return $this->db->run($sql);
    }



    public function fncListarItemsCatalogo($sNombreCatalogo = '')
    {

        $sql = "SELECT ct.nIdCatalogoTabla, ct.nIdCatalogoTablaPadre, ct.sNombreCatalogo, ct.sCodigoItem, ct.sDescripcionCortaItem, ct.sDescripcionLargaItem, ct.sTipoItem, ct.sMostrarCliente, ct.sDefecto, ct.sEstado,  IFNULL( CONCAT( cp.sNombreCatalogo, '->', cp.sDescripcionLargaItem ), '' ) AS sNombreCatalogoPadre FROM catalogotabla ct LEFT JOIN catalogotabla cp ON ct.nIdCatalogoTablaPadre = cp.nIdCatalogoTabla";
        $sql .= ($sNombreCatalogo == '' ? '' : " WHERE ct.sNombreCatalogo = '$sNombreCatalogo'");
        $sql .= " ORDER BY ct.sNombreCatalogo, ct.sCodigoItem";
        return $this->db->run($sql);
    }

    public function fncListarItemsCatalogoDetalle($nIdCatalogoTablaPadre)
    {

        $sql = "SELECT *
                FROM  catalogotabla                
                WHERE nIdCatalogoTablaPadre = '$nIdCatalogoTablaPadre'
                ORDER BY 3";

        return $this->db->run($sql);
    }

    public function datosCatalogoItem($nIdCatalogoTabla)
    {
        $sql = "SELECT c.*,(SELECT DISTINCT b.sNombreCatalogo 
                            FROM catalogotabla a
                            JOIN catalogotabla b 
                            ON b.nIdCatalogoTabla = a.nIdCatalogoTablaPadre
                            WHERE a.sNombreCatalogo=c.sNombreCatalogo 
                            ) sNombreCatalogoPadre
                FROM  catalogotabla c                 
                WHERE c.nIdCatalogoTabla = '$nIdCatalogoTabla' ";

        return $this->db->run($sql);
    }


    public function fncCambiarEstado($xIdRegistro, $sNuevoEstado)
    {
        $sql = "UPDATE catalogotabla
                SET sEstado = '$sNuevoEstado'
                WHERE nIdCatalogoTabla = $xIdRegistro";

        return $this->db->run($sql);
    }

    public function fncEliminarRegistro($xIdRegistro)
    {
        $sql = "DELETE FROM catalogotabla
                WHERE nIdCatalogoTabla = $xIdRegistro";

        return $this->db->run($sql);
    }

    public function fncActualizarCatalogoItem($nIdCatalogoTabla, $sCodigoItem, $sDescripcionCortaItem, $sDescripcionLargaItem, $sTipoItem, $sMostrarCliente, $sDefecto, $sEstado, $nIdCatalogoTablaPadre)
    {

        $sql = "UPDATE catalogotabla
                SET sCodigoItem = '$sCodigoItem',
                    sDescripcionCortaItem = '$sDescripcionCortaItem', 
                    sDescripcionLargaItem = '$sDescripcionLargaItem', 
                    sTipoItem = '$sTipoItem',
                    sMostrarCliente = '$sMostrarCliente',
                    sDefecto = '$sDefecto',
                    sEstado = '$sEstado',
                    nIdCatalogoTablaPadre = ";

        $sql .= ($nIdCatalogoTablaPadre == '' || $nIdCatalogoTablaPadre == 0 ? 'NULL' : $nIdCatalogoTablaPadre);
        $sql .= " WHERE nIdCatalogoTabla = $nIdCatalogoTabla ";

        return $this->db->run($sql);
    }


    # 
    # Version actualizada de fncActualizarCatalogoItem
    # Considera valores nulos para insertar los valores por defecto
    # Added by rrq on Apr, 23, 2020
    #
    public function fncActualizarItem(
        $nIdCatalogoTabla,
        $sCodigoItem,
        $sDescripcionCortaItem,
        $sDescripcionLargaItem,
        $sTipoItem,
        $sMostrarCliente,
        $sDefecto,
        $sDetalleItem,
        $sEstado,
        $nIdCatalogoTablaPadre,
        $nOrden
    ) {

        $sSQL = "UPDATE catalogotabla
                SET sCodigoItem = " . (is_null($sCodigoItem) ? '' : "'$sCodigoItem'") . ",
                    sDescripcionCortaItem = " . (is_null($sDescripcionCortaItem) || $sDescripcionCortaItem == '' ? 'NULL' : "'$sDescripcionCortaItem'") . ",
                    sDescripcionLargaItem = '$sDescripcionLargaItem', 
                    sTipoItem = " . (is_null($sTipoItem) || $sTipoItem == '' ? "'2'" : "'$sTipoItem'") . ",
                    sMostrarCliente = " . (is_null($sMostrarCliente) || $sMostrarCliente == '' ? "'0'" : "'$sMostrarCliente'") . ",
                    sDefecto = " . (is_null($sDefecto) || $sDefecto == '' ? "'0'" : "'$sDefecto'") . ",
                    sDetalleItem = " . (is_null($sDetalleItem) || $sDetalleItem == '' ? 'NULL' : "'$sDetalleItem'") . ",
                    nOrden = " . (is_null($nOrden) || $nOrden == '' ? 'NULL' : "'$nOrden'") . ",
                    sEstado = " . (is_null($sEstado) || $sEstado == '' ? "'1'" : "'$sEstado'") . ",
                    nIdCatalogoTablaPadre = ";

        $sSQL .= (is_null($nIdCatalogoTablaPadre) || $nIdCatalogoTablaPadre == '' || $nIdCatalogoTablaPadre == 0 ? 'NULL' : $nIdCatalogoTablaPadre);
        $sSQL .= " WHERE nIdCatalogoTabla = $nIdCatalogoTabla";


        return $this->db->run($sSQL);
    }


    // Codigo by RRQ
    public function fncRegistrarCatalogo($sNombreCatalogo)
    {

        $sql = "INSERT INTO catalogotabla(sNombreCatalogo, sCodigoItem, sDescripcionCortaItem, sDescripcionLargaItem, sTipoItem, sMostrarCliente, sDefecto, sEstado) VALUES( '$sNombreCatalogo', '00', 'XXX', 'XXXXXXXXXX', '2', '0', '0', '1')";
        return $this->db->run($sql);
    }


    //  Angelo: al final le agrege nIdCatalogopadre en caso no le pasen el parametro lo tomara como nulo
    public function fncRegistrarCatalogoItem($sNombreCatalogo, $sCodigoItem, $sDescripcionCortaItem, $sDescripcionLargaItem, $sTipoItem, $sMostrarCliente, $sDefecto, $sEstado, $nIdCatalogoTablaPadre = '')
    {


        $sql = "INSERT INTO catalogotabla( sNombreCatalogo, sCodigoItem, sDescripcionCortaItem, sDescripcionLargaItem,
                    sTipoItem, sMostrarCliente, sDefecto, sEstado, nIdCatalogoTablaPadre )
                VALUES ( '$sNombreCatalogo', '$sCodigoItem', '$sDescripcionCortaItem', '$sDescripcionLargaItem', '$sTipoItem',
                    '$sMostrarCliente', '$sDefecto', '$sEstado', ";

        $sql .= ($nIdCatalogoTablaPadre == '' || $nIdCatalogoTablaPadre == 0 ? 'NULL' : $nIdCatalogoTablaPadre);
        $sql .= ")";

        return $this->db->run($sql);
    }



    # 
    # Version actualizada de fncRegistrarCatalogoItem
    # Considera valores nulos para insertar los valores por defecto
    # Added by rrq on Apr, 23, 2020
    #
    public function fncRegistrarItem(
        $sNombreCatalogo,
        $sCodigoItem,
        $sDescripcionCortaItem,
        $sDescripcionLargaItem,
        $sTipoItem,
        $sMostrarCliente,
        $sDefecto,
        $sDetalleItem,
        $sEstado,
        $nIdCatalogoTablaPadre = null,
        $nOrden = null
    ) {

        # Crea la sentencia para sCodigoItem cuyo valor toma importancia cuando se registra items
        # de tablas de SUNAT que es poco probable que se actualice aqui
        # Si no tene valor se calcula automáticamente incrementando en 1 para cada registro nuevo

        $sCodigo = '';
        if (is_null($sCodigoItem) || $sCodigoItem == '') {

            $sCodigo = "LPAD( IFNULL((SELECT MAX(CAST(mx.sCodigoItem AS INT)) FROM catalogotabla mx WHERE mx.sNombreCatalogo = '$sNombreCatalogo'), 0) + 1, 3, '0' )";
        } else {

            $sCodigo = "'$sCodigoItem'";
        }


        $sSQL = "INSERT INTO catalogotabla( sNombreCatalogo, sCodigoItem, sDescripcionCortaItem, sDescripcionLargaItem,
                    sTipoItem, sMostrarCliente, sDefecto, sDetalleItem, sEstado, nIdCatalogoTablaPadre, nOrden )
                VALUES ( '$sNombreCatalogo', $sCodigo, " . (is_null($sDescripcionCortaItem) || $sDescripcionCortaItem == ''  ? "NULL" : "'$sDescripcionCortaItem'") . " , '$sDescripcionLargaItem', " .
            (is_null($sTipoItem) || $sTipoItem == '' ? "'2'" : "'$sTipoItem'") . ", " .
            (is_null($sMostrarCliente) || $sMostrarCliente == '' ? "'0'" : "'$sMostrarCliente'") . ", " .
            (is_null($sDefecto) || $sDefecto == '' ? "'0'" : "'$sDefecto'") . ", " .
            (is_null($sDetalleItem) || $sDetalleItem == '' ? 'NULL' : "'$sDetalleItem'") . ", " .
            (is_null($sEstado) || $sEstado == '' ? "'1'" : "'$sEstado'") . ", " .
            (is_null($nIdCatalogoTablaPadre) || $nIdCatalogoTablaPadre == '' || $nIdCatalogoTablaPadre == 0 ? 'NULL' : $nIdCatalogoTablaPadre) . ", " .
            (is_null($nOrden) || $nOrden == '' || $nOrden == 0 ? 'NULL' : $nOrden) . ' )';

        // print_r($sSQL);
        // exit();

        return $this->db->run($sSQL);
    }




    // Nueva versión del 25/06/2018
    public function fncListaItems($nIdCatalogoTablaPadre, $sNombreCatalogo, $sDescripcionCorta = NULL, $sIds = NULL, $nOrden = null)
    {
        /*
       - Funcion que devuelve todas las columnas y registros según los parametros
       - $nIdCatalogoTablaPadre = Tipo numerico y es el ID del catalogo del elemento contenedor o padre
       - $sNombreCatalogo = Tipo string y es el nombre de la tabla del catalogo y es obligatorio
       - $sDescripcionCorta = Tipo string y es una cadena conteniendo las descripciones cortas de los items
       - $sIds = Tipo string y es una cadena conteniendo los id de los items (4 digitos de longitud) con ceros(0) a la izquierda
         Tanto la descripcion corta como los id son opcionales y sus valores propios deben estar separados por "|"
       - $nOrder = Columna por el cual se ordernará el resultado del run. Por defecto es nulo
       */

        $sql = "SELECT nIdCatalogoTabla, nIdCatalogoTablaPadre, sNombreCatalogo, sCodigoItem, sDescripcionCortaItem,
                   sDescripcionLargaItem, sTipoItem, sMostrarCliente, sDefecto, sDetalleItem, sEstado, nOrden
               FROM catalogotabla
               WHERE sEstado = '1'";

        $sql .= ($nIdCatalogoTablaPadre == 0 ? '' : " And nIdCatalogoTablaPadre = $nIdCatalogoTablaPadre");
        $sql .= ($sNombreCatalogo == '' ? '' : " And LOCATE( sNombreCatalogo, '$sNombreCatalogo' )");
        $sql .= ($sDescripcionCorta == '' ? '' : " And LOCATE( sDescripcionCortaItem, '$sDescripcionCorta' )");
        // $sql .= ( $sIds == '' ? '' : " And LOCATE( nIdCatalogoTabla, '$sIds' )" );
        $sql .= ($sIds == '' ? '' : " And nIdCatalogoTabla IN( '$sIds' )");
        $sql .= " ORDER BY ";
        #$sql .= (is_null($sOrden) || $sOrden = '' || $sOrden == '0' ? 'sDescripcionLargaItem' : 'nOrden');
        $sql .= (is_null($nOrden) || $nOrden == '' || $nOrden == '0' ? 'sDescripcionLargaItem' : 'nOrden');



        return $this->db->run($sql);
    }


    # 
    # Variacion de fncListaItems con más cobertura
    # Added by rrq on Apr, 23, 2020
    # 
    public function fncListarItems2($nIdCatalogoTablaPadre, $sNombreCatalogo, $sDescripcionCorta = null, $sIds = null, $nOrden = null)
    {


        $sCorta = (is_null($sDescripcionCorta) || $sDescripcionCorta == '' ? ''  : (strpos($sDescripcionCorta, '|') > 0 ? str_replace('|', "', '", $sDescripcionCorta) : $sDescripcionCorta));

        # Fin mejora Mar, 23, 2019


        $sql = "SELECT nIdCatalogoTabla, nIdCatalogoTablaPadre, sNombreCatalogo, sCodigoItem, sDescripcionCortaItem,
                   sDescripcionLargaItem, sTipoItem, sMostrarCliente, sDefecto, sEstado
               FROM catalogotabla
               WHERE sEstado = '1'";

        $sql .= (is_null($nIdCatalogoTablaPadre) || $nIdCatalogoTablaPadre == 0 || $nIdCatalogoTablaPadre == '' ? '' : " And nIdCatalogoTablaPadre = $nIdCatalogoTablaPadre");
        $sql .= ($sNombreCatalogo == '' ? '' : " And LOCATE( sNombreCatalogo, '$sNombreCatalogo' )");
        #$sql .= ( $sDescripcionCorta == '' ? '' : " And LOCATE( sDescripcionCortaItem, '$sDescripcionCorta' )" ); # Obsoleto
        $sql .= ($sCorta == '' ? '' : " And sDescripcionCortaItem IN ( '$sCorta' )");
        #$sql .= ( $sIds == '' ? '' : " And LOCATE( LPAD( nIdCatalogoTabla, 4, '0' ), '$sIds' )" ); # Obsoleto primero
        # $sql .= ( is_null($sIds) || $sIds == '' ? '' : " And LOCATE( LPAD( nIdCatalogoTabla, 4, '0' ), '$sIds' )" ); # Obsolet segundo
        $sql .= (is_null($sIds) || $sIds == '' ? '' : " And nIdCatalogoTabla IN( '$sIds' )");
        # $sql .= " ORDER BY sDescripcionLargaItem"; # Obsoleto
        $sql .= ((is_null($nOrden) || $nOrden = '' || $nOrden == 0) ? " ORDER BY sDescripcionLargaItem" : " ORDER BY nOrden");

        return $this->db->run($sql);
    }


    public function fncListaItemsByShortDescription($nIdCatalogoTablaPadre, $sNombreCatalogo, $sIds, $nOrden = null)
    {
        /*
       - Funcion que devuelve todas las columnas y registros según los parametros
       - $nIdCatalogoTablaPadre = Tipo numerico y es el ID del catalogo del elemento contenedor o padre
       - $sNombreCatalogo = Tipo string y es el nombre de la tabla del catalogo y es obligatorio
       - $sDescripcionCorta = Tipo string y es una cadena conteniendo las descripciones cortas de los items
       - $sIds = Tipo string y es una cadena conteniendo los id de los items (4 digitos de longitud) con ceros(0) a la izquierda
         Tanto la descripcion corta como los id son opcionales y sus valores propios deben estar separados por "|"
       - $nOrder = Columna por el cual se ordernará el resultado del run. Por defecto es nulo
       */

        $sql = "SELECT nIdCatalogoTabla, nIdCatalogoTablaPadre, sNombreCatalogo, sCodigoItem, sDescripcionCortaItem,
                   sDescripcionLargaItem, sTipoItem, sMostrarCliente, sDefecto, sEstado
               FROM catalogotabla
               WHERE sEstado = '1'";

        $sql .= ($nIdCatalogoTablaPadre == 0 ? '' : " And nIdCatalogoTablaPadre = $nIdCatalogoTablaPadre");
        $sql .= ($sNombreCatalogo == '' ? '' : " And LOCATE( sNombreCatalogo, '$sNombreCatalogo' )");
        $sql .= ($sIds == '' ? '' : " And sDescripcionLargaItem IN( $sIds )");
        #$sql .= ($nOrder == null ? " ORDER BY sDescripcionLargaItem" : " ORDER BY $nOrder"); # Comentado por RRQ on Apr, 23, 2020
        $sql .= (is_null($nOrden) ? " ORDER BY sDescripcionLargaItem" : " ORDER BY nOrden"); # Comentado por RRQ on Apr, 23, 2020

        return $this->db->run($sql);
    }

    public function fncBuscarRegistro($nIdCatalogo)
    {

        $sql = "SELECT *
        FROM catalogotabla
        WHERE sEstado = '1' And nIdCatalogoTabla = $nIdCatalogo";
        return $this->db->run($sql);
    }

    // End by RRQ

    //added by Cesar
    public function fncObtenerDefecto($tabla)
    {
        $sql = "SELECT      nIdCatalogoTabla,
                            sNombreCatalogo,
                            sCodigoItem,
                            sDescripcionCortaItem,
                            sDescripcionLargaItem,
                            sDefecto, ## Added by Cesar
                            sEstado

                 FROM catalogotabla WHERE sEstado='1' AND sNombreCatalogo = '$tabla' AND sDefecto = 1;";

        $resultado = $this->db->run($sql);
        return $resultado;
    }


    // Added by hinojoza 26/03/2019

    public function fncListarItemsHijo($nIdCatalogoTablaPadre)
    {

        $sql = "SELECT *
                FROM  catalogotabla                
                WHERE nIdCatalogoTablaPadre = '$nIdCatalogoTablaPadre'
                ORDER BY nIdCatalogoTabla ASC";

        return $this->db->run($sql);
    }


    public function fncListaCatalogo()
    {
        $sql = "SELECT distinct sNombreCatalogo FROM catalogotabla ";
        $resultado = $this->db->run($sql);

        return $resultado;
    }

    public function fncListaCatalogoPadre()
    {
        $sql = "SELECT distinct sNombreCatalogo FROM catalogotabla WHERE nIdCatalogoTablaPadre is null";
        $resultado = $this->db->run($sql);
        return $resultado;
    }

    public function fncVerficiarSiExisteCatalogo($sNombreCatalogo)
    {
        $sql = "SELECT sNombreCatalogo FROM catalogotabla WHERE sNombreCatalogo = '$sNombreCatalogo' ";
        return $this->db->run($sql);
    }

    public function fncVerficarSiExisteItem($nValor1, $sValor1, $sValor2, $sValor3)
    {
        $sql = "SELECT nIdCatalogoTabla FROM catalogotabla WHERE nIdCatalogoTabla <> $nValor1 AND sNombreCatalogo = '$sValor1' AND ( sCodigoItem = '$sValor2' OR sDescripcionLargaItem = '$sValor3' )";
        return $this->db->run($sql);
    }
    
    public function fncListadoItemsPadre($sNombreCatalogo)
    {
        $sql = "SELECT *
                FROM  catalogotabla
                WHERE sNombreCatalogo = '$sNombreCatalogo'";
        return $this->db->run($sql);
    }

    public function fncListado($tabla , $sWhere = null)
    {

        $sql = '';

        if ($tabla == 'TIPO_COMPROBANTE') {
            $sql = "SELECT      nIdCatalogoTabla,
                            sNombreCatalogo,
                            sCodigoItem,
                            sDescripcionCortaItem,
                            sDescripcionLargaItem,
                            sEstado

                 FROM catalogotabla WHERE sEstado='1' AND sNombreCatalogo = '$tabla' AND
                  nIdCatalogotabla NOT IN (5,7);";
        } else if ($tabla == 'TIPO_DOCUMENTO_IDENTIDAD') {
            $sql = "SELECT  nIdCatalogoTabla,
                            sNombreCatalogo,
                            sCodigoItem,
                            sDescripcionCortaItem,
                            sDescripcionLargaItem,
                            sEstado
                 FROM catalogotabla WHERE sEstado='1' AND sNombreCatalogo = '$tabla';";
        } else {
            $sql = "SELECT      nIdCatalogoTabla,
                            sNombreCatalogo,
                            sCodigoItem,
                            sDescripcionCortaItem,
                            sDescripcionLargaItem,
                            sDefecto, ## Added by Cesar
                            sEstado
                 FROM catalogotabla WHERE sEstado='1' AND sNombreCatalogo = '$tabla'";            
            $sql .= !is_null($sWhere) ? " AND $sWhere " :"";  
            $sql .= "ORDER BY nIdCatalogoTabla ASC";
        }


        return $this->db->run($sql);

    }

}
