<?php

namespace Application\Models;

use Application\Core\Database as Database;
use Application\Core\Model;

class Segmentacion
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function fncGetSegmentacion($nIdNegocio, $nTipoSegmento = null, $nEstado = null)
    {
        $sSQL  = "SELECT seg.nIdSegmentacion, seg.nIdNegocio, seg.nTipoSegmento, seg.sNombre, seg.nEstado FROM segmentacion AS seg WHERE seg.nIdNegocio = $nIdNegocio ";
        $sSQL .=  is_null($nTipoSegmento) ? "" : ' AND seg.nTipoSegmento  = ' . $nTipoSegmento;
        $sSQL .=  is_null($nEstado) ? "" : ' AND seg.nEstado  = ' . $nEstado;

        return $this->db->run(trim($sSQL));
    }


    public function fncGetSegmentacionById($nIdSegmentacion)
    {
        $sSQL = "SELECT seg.nIdSegmentacion, seg.nIdNegocio, seg.nTipoSegmento, seg.sNombre, seg.nEstado FROM segmentacion AS seg WHERE seg.nIdSegmentacion = $nIdSegmentacion";
        return $this->db->run(trim($sSQL));
    }

    public function fncGetDetalleSegmentacion($nIdSegmentacion, $nEstado = null)
    {
        $sSQL  = "SELECT detSeg.nIdDetalleSegmentacion, detSeg.nIdSegmentacion, detSeg.sNombre, detSeg.nEstado FROM detallesegmentacion AS detSeg WHERE detSeg.nIdSegmentacion = $nIdSegmentacion ";
        $sSQL .=  is_null($nEstado) ? "" : ' AND seg.nEstado  = ' . $nEstado;

        // echo $sSQL;
        // exit;
        return $this->db->run(trim($sSQL));
    }

    public function fncGetDetalleSegmentacionById($nIdDetalleSegmentacion)
    {
        $sSQL = "SELECT detSeg.nIdDetalleSegmentacion, detSeg.nIdSegmentacion, detSeg.sNombre, detSeg.nEstado FROM detallesegmentacion AS detSeg WHERE detSeg.nIdDetalleSegmentacion = $nIdDetalleSegmentacion ";
        return $this->db->run(trim($sSQL));
    }


    public function fncGrabarSegmentacion($nIdNegocio, $nTipoSegmento, $sNombre, $nEstado)
    {
        $sSQL = "INSERT INTO segmentacion(
                    nIdNegocio,
                    nTipoSegmento,
                    sNombre,
                    nEstado
                ) VALUES (
                    " . (is_null($nIdNegocio) || empty($nIdNegocio) ? "NULL" : "$nIdNegocio") . " ,
                    " . (is_null($nTipoSegmento) || empty($nTipoSegmento) ? "NULL" : "$nTipoSegmento") . " ,
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . $nEstado . " 
                )";
        return  $this->db->run($sSQL);
    }

    public function fncActualizarSegmentacion($nIdSegmentacion, $nIdNegocio, $nTipoSegmento, $sNombre, $nEstado)
    {

        $sSQL = "UPDATE segmentacion SET ";

        $sSQL .= (!is_null($nIdNegocio) ? " nIdNegocio = $nIdNegocio " : "");

        $sSQL .= (!is_null($nTipoSegmento) ? ", nTipoSegmento = $nTipoSegmento " : "");

        $sSQL .= (!is_null($sNombre) ? ", sNombre = '$sNombre' " : " sNombre = NULL");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado " : "");

        $sSQL .= " WHERE nIdSegmentacion = $nIdSegmentacion ";

        return  $this->db->run($sSQL);
    }

    public function fncEliminarSegmentacion($nIdSegmentacion)
    {
        $sSQL = "DELETE FROM segmentacion WHERE nIdSegmentacion = $nIdSegmentacion ";
        $this->db->run($sSQL);
    }

    public function fncGrabarDetalleSegmentacion($nIdSegmentacion, $sNombre, $nEstado)
    {
        $sSQL = "INSERT INTO detallesegmentacion(
                     nIdSegmentacion,
                     sNombre,
                     nEstado
                ) VALUES (
                    " . (is_null($nIdSegmentacion) || empty($nIdSegmentacion) ? "NULL" : "$nIdSegmentacion") . " ,
                    " . (is_null($sNombre) || empty($sNombre) ? "NULL" : "'$sNombre'") . " ,
                    " . $nEstado . " 
                )";

        return  $this->db->run($sSQL);
    }


    public function fncActualizarDetalleSegmentacion($nIdDetalleSegmentacion, $nIdSegmentacion, $sNombre, $nEstado)
    {

        $sSQL = "UPDATE detallesegmentacion SET ";

        $sSQL .= (!is_null($nIdSegmentacion) ? " nIdSegmentacion = $nIdSegmentacion " : "");

        $sSQL .= (!is_null($sNombre) ? ", sNombre = '$sNombre' " : " sNombre = NULL");

        $sSQL .= (!is_null($nEstado) ? ", nEstado = $nEstado " : "");

        $sSQL .= " WHERE nIdDetalleSegmentacion = $nIdDetalleSegmentacion ";

        return  $this->db->run($sSQL);
    }

    public function fncEliminarDetalleSegmentacion($nIdDetalleSegmentacion)
    {
        $sSQL = "DELETE FROM detallesegmentacion WHERE nIdDetalleSegmentacion = $nIdDetalleSegmentacion ";
        $this->db->run($sSQL);
    }
}
