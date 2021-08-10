<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Catalogo
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncGetCatalogoById($nIdCatalogo)
    {
        $results = $this->db->selectOne("catalogo", "nIdCatalogo = :nIdCatalogo", array(":nIdCatalogo" => $nIdCatalogo));
        return $results;
    }

    public function fncGrabarCatalogo(
        $nIdNegocio,
        $sNombre,
        $nTipoItem,
        $nPrecio,
        $sDescripcion,
        $sImagen,
        $nEstado
    ) {
        $sSQL = $this->db->generateSQLInsert("catalogo", [
            "nIdNegocio"    => $nIdNegocio,
            "sNombre"       => $sNombre,
            "nTipoItem"     => $nTipoItem,
            "nPrecio"       => $nPrecio,
            "sDescripcion"  => $sDescripcion,
            "sImagen"       => $sImagen,
            "nEstado"       => $nEstado
        ]);

        return $this->db->run($sSQL);
    }


    public function fncActualizarCatalogo(
        $nIdCatalogo,
        $nIdNegocio,
        $sNombre,
        $nTipoItem,
        $nPrecio,
        $sDescripcion,
        $sImagen,
        $nEstado
    ) {

        $sSQL = $this->db->generateSQLUpdate("catalogo", [
            "nIdNegocio"    => $nIdNegocio,
            "sNombre"       => $sNombre,
            "nTipoItem"     => $nTipoItem,
            "nPrecio"       => $nPrecio,
            "sDescripcion"  => $sDescripcion,
            "sImagen"       => $sImagen,
            "nEstado"       => $nEstado
        ],"nIdCatalogo = $nIdCatalogo");
    
        return  $this->db->run($sSQL);
    }


    public function fncEliminarCatalogo($nIdCatalogo)
    {
        $sSQL = "DELETE FROM catalogo WHERE nIdCatalogo = $nIdCatalogo ";
        $this->db->run($sSQL);
    }


    public function fncGetCatalogos($nIdNegocio, $nEstado = null)
    {
        $sSQL = "SELECT cat.nIdCatalogo, 
                        cat.nIdNegocio, 
                        catTabla.sDescripcionLargaItem AS nTipoItem ,
                        cat.sNombre, 
                        cat.nPrecio, 
                        cat.sDescripcion,
                        cat.sImagen,
                        cat.nEstado
                FROM catalogo AS cat 
                INNER JOIN catalogotabla AS catTabla ON cat.nTipoItem = catTabla.nIdCatalogoTabla
                WHERE";

        $sSQL .=  is_null($nIdNegocio) ? "" : ' cat.nIdNegocio  = ' . $nIdNegocio;
        $sSQL .=  is_null($nEstado) ? "" : ' AND cat.nEstado  = ' . $nEstado;

        return $this->db->run(trim($sSQL));
    }

    public function fncObtenerProductosCatalogo($nPrecio1, $nPrecio2)

    {
        $sSQL = "SELECT * FROM catalogo WHERE nPrecio >= $nPrecio1 AND nPrecio <= $nPrecio2";
        return $this->db->run(trim($sSQL));
    }
    public function fncObtenerLista($sFiltro)

    {
        $sSQL = "SELECT * FROM catalogo WHERE sNombre LIKE '%$sFiltro%'";
        return $this->db->run(trim($sSQL));
    }


    public function fncCambiarEstado($nIdCatalogo, $nEstado)
    {
        $sSQL = "UPDATE catalogo SET nEstado = $nEstado  WHERE nIdCatalogo = $nIdCatalogo ";
        return $this->db->run(trim($sSQL));
    }
}
