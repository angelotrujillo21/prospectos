<?php

namespace Application\Models;

use Application\Core\Database as Database;

class Usuarios
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUser($nIdUsuario)
    {
        $results = $this->db->selectOne("usuarios", "nIdUsuario = :nIdUsuario", array(':nIdUsuario' => $nIdUsuario));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function acceso($sLogin, $sClave)
    {
        $results = $this->db->selectOne(
            "usuarios",
            "sClave = :sClave AND ( sLogin = :sLogin OR sCorreo = :sCorreo ) AND nEstado = 1",
            array('sLogin' => $sLogin, 'sCorreo' => $sLogin, 'sClave' => $sClave)
        );
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        return $results;
    }


    public function getUserEmpleado($nIdUsuario)
    {
        $results = $this->db->selectOne("usuarios", "nIdUsuario = :nIdUsuario", array(':nIdUsuario' => $nIdUsuario));
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        if ($results === false) {
            return 0;
        }
        return $results;
    }

    public function fncAccesoEmpleado($nIdNegocio, $sCorreo, $sClave)
    {
        $results = $this->db->run("SELECT * FROM usuarios WHERE nIdNegocio = $nIdNegocio AND sCorreo = '$sCorreo' AND sClave = '$sClave' AND nEstado = 1");
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */

        if (count($results) == 0 || $results === false) {
            return 0;
        }
        return (int) $results[0]["nIdUsuario"];
    }

    public function fncAccesosEmpleado($sCorreo, $sClave)
    {
        $results = $this->db->run("SELECT * FROM usuarios WHERE sCorreo = '$sCorreo' AND sClave = '$sClave' AND nEstado = 1");
        /* si el resultado esta vacio o empty el metodo Select One devuelve false */
        return $results;
    }

    public function fncGrabarUsuario(
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombre,
        $sCorreo,
        $nIdSexo,
        $nIdEstadoCivil,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $sLogin,
        $sClave,
        $sImagen,
        $nCrearNegocio,
        $nEstado
    ) {
        $sSQL =  $this->db->generateSQLInsert("usuarios", [

            "nTipoDocumento"                     => $nTipoDocumento,
            "sNumeroDocumento"                   => $sNumeroDocumento,
            "sNombre"                            => $sNombre,
            "sCorreo"                            => $sCorreo,
            "nIdSexo"                            => $nIdSexo,
            "nIdEstadoCivil"                     => $nIdEstadoCivil,
            "dFechaNacimiento"                   => $dFechaNacimiento,
            "nCantidadPersonasDependientes"      => $nCantidadPersonasDependientes,
            "nExperienciaVentas"                 => $nExperienciaVentas,
            "sRubroExperiencia"                  => $sRubroExperiencia,
            "nIdEstudios"                        => $nIdEstudios,
            "nIdSituacionEstudios"               => $nIdSituacionEstudios,
            "sCarreraCiclo"                      => $sCarreraCiclo,
            "dFechaHoraRegistro"                 => "NOW()",
            "dFechaHoraUltimoAcceso"             => "NOW()",
            "sLogin"                             => $sLogin,
            "sClave"                             => $sClave,
            "sImagen"                            => $sImagen,
            "nCrearNegocio"                      => $nCrearNegocio,
            "nEstado"                            => $nEstado
        ]);

        return  $this->db->run($sSQL);
    }

    public function fncActualizarUsuario(
        $nIdUsuario,
        $nTipoDocumento,
        $sNumeroDocumento,
        $sNombre,
        $sCorreo,
        $nIdSexo,
        $nIdEstadoCivil,
        $dFechaNacimiento,
        $nCantidadPersonasDependientes,
        $nExperienciaVentas,
        $sRubroExperiencia,
        $nIdEstudios,
        $nIdSituacionEstudios,
        $sCarreraCiclo,
        $sLogin,
        $sClave,
        $sImagen,
        $nCrearNegocio,
        $nEstado
    ) {
        $sSQL =  $this->db->generateSQLUpdate("usuarios", [

            "nTipoDocumento"                     => $nTipoDocumento,
            "sNumeroDocumento"                   => $sNumeroDocumento,
            "sNombre"                            => $sNombre,
            "sCorreo"                            => $sCorreo,
            "nIdSexo"                            => $nIdSexo,
            "nIdEstadoCivil"                     => $nIdEstadoCivil,
            "dFechaNacimiento"                   => $dFechaNacimiento,
            "nCantidadPersonasDependientes"      => $nCantidadPersonasDependientes,
            "nExperienciaVentas"                 => $nExperienciaVentas,
            "sRubroExperiencia"                  => $sRubroExperiencia,
            "nIdEstudios"                        => $nIdEstudios,
            "nIdSituacionEstudios"               => $nIdSituacionEstudios,
            "sCarreraCiclo"                      => $sCarreraCiclo,
            "dFechaHoraRegistro"                 => "NOW()",
            "dFechaHoraEdicion"                  => "NOW()",
            "sLogin"                             => $sLogin,

            "sClave"                             => $sClave,
            "sImagen"                            => $sImagen,

            "nCrearNegocio"                      => $nCrearNegocio,
            "nEstado"                            => $nEstado

        ], "nIdUsuario = $nIdUsuario");

        return  $this->db->run($sSQL);
    }

    public function fncGrabarUsuarioNegocio(
        $nIdUsuario,
        $nIdNegocio,
        $nIdColor,
        $nIdRol
    ) {
        $sSQL = $this->db->generateSQLInsert("usuariosnegocios", [
            "nIdUsuario"        => $nIdUsuario,
            "nIdNegocio"        => $nIdNegocio,
            "nIdColor"          => $nIdColor,
            "nIdRol"            => $nIdRol
        ]);
        return $this->db->run($sSQL);
    }

    public function fncGrabarSupervisorVendedor(
        $nIdNegocio,
        $nIdSupervisor,
        $nIdVendedor
    ) {

        $sSQL = $this->db->generateSQLInsert("supervisoresvendedores", [
            "nIdNegocio"      => $nIdNegocio,
            "nIdSupervisor"   => $nIdSupervisor,
            "nIdVendedor"     => $nIdVendedor
        ]);

        return $this->db->run($sSQL);
    }

    public function fncEliminarSupervisorVendedor($nIdSupervisor, $nIdVendedor)
    {
        $sSQL = "DELETE FROM supervisoresvendedores WHERE nIdSupervisor = $nIdSupervisor AND nIdVendedor = $nIdVendedor ";
        $this->db->run($sSQL);
    }

    public function fncEliminarUsuarioNegocio($nIdUsuario, $nIdNegocio)
    {
        $sSQL = "DELETE FROM usuariosnegocios WHERE nIdUsuario = $nIdUsuario AND nIdNegocio = $nIdNegocio ";
        $this->db->run($sSQL);
    }



    public function fncEliminarUsuario($nIdUsuario)
    {
        $sSQL = "DELETE FROM usuarios WHERE nIdUsuario = $nIdUsuario ";
        $this->db->run($sSQL);
    }

    public function fncBuscarUsuarioPorCorreoOrLogin($sCorreo, $sLogin)
    {
        $sSQL = "SELECT nIdUsuario FROM usuarios WHERE sCorreo = '$sCorreo' OR sLogin = '$sLogin' ";
        return $this->db->run($sSQL);
    }

    public function fncBuscarUsuarioPorCorreo($sCorreo)
    {
        $sSQL = "SELECT nIdUsuario , sNombre FROM usuarios WHERE sCorreo = '$sCorreo'  ";
        return $this->db->run($sSQL);
    }


    public function fncActualizarHoraAcceso($nIdUsuario)
    {
        $sSQL = "UPDATE usuarios SET dFechaHoraUltimoAcceso = NOW() WHERE nIdUsuario = $nIdUsuario";
        return $this->db->run($sSQL);
    }

    // fncGetEmpleadoById fncUsuarioById
    public function fncGetUsuarioById($nIdUsuario, $nIdNegocio)
    {
        $sSQL = "SELECT     
                    us.nIdUsuario,
                    IFNULL(us.nTipoDocumento , 0) AS nTipoDocumento ,
                    us.sNumeroDocumento,
                    us.sNombre,
                    us.sCorreo,
                    IFNULL(us.nIdSexo , 0) AS nIdSexo ,
                    IFNULL(us.nIdEstadoCivil , 0) AS nIdEstadoCivil ,
                    IFNULL((SELECT nIdColor FROM usuariosnegocios WHERE nIdUsuario = $nIdUsuario AND nIdNegocio = ". ( is_null($nIdNegocio) ? 0 : $nIdNegocio )." LIMIT 1) ,0) AS nIdColor,
                    us.dFechaNacimiento,
                    us.nCantidadPersonasDependientes,
                    IFNULL(us.nExperienciaVentas , 0) AS nExperienciaVentas ,
                    us.sRubroExperiencia,
                    IFNULL(us.nIdEstudios , 0) AS nIdEstudios ,
                    IFNULL(us.nIdSituacionEstudios , 0) AS nIdSituacionEstudios ,
                    us.sCarreraCiclo,
                    IFNULL((SELECT nIdSupervisor FROM supervisoresvendedores WHERE nIdVendedor = us.nIdUsuario AND nIdNegocio = ". ( is_null($nIdNegocio) ? 0 : $nIdNegocio )." LIMIT 1) , 0) AS nIdSupervisor,
                    us.sClave,
                    us.sImagen,
                    usneg.nIdRol,
                    us.nCrearNegocio,
                    IFNULL(colorsuper.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                    us.nEstado
                FROM usuarios AS us
                LEFT JOIN usuariosnegocios AS usneg ON us.nIdUsuario = usneg.nIdUsuario
                LEFT JOIN catalogotabla AS colorsuper ON usneg.nIdColor = colorsuper.nIdCatalogoTabla
                WHERE us.nIdUsuario = $nIdUsuario ";
        $sSQL .= is_null($nIdNegocio) ? " "  : " AND  usneg.nIdNegocio = $nIdNegocio ";

        return $this->db->run(trim($sSQL));
    }

    public function fncMostrarRegistroCard($nIdUsuario, $nIdNegocio)
    {
        $sSQL = "SELECT us.nIdUsuario,
                        IFNULL(rol.sNombreRol,'') AS sRol, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        us.sNombre,
                        usneg.nIdNegocio,
                        IFNULL((SELECT nIdSupervisor FROM supervisoresvendedores WHERE nIdVendedor = us.nIdUsuario AND nIdNegocio = $nIdNegocio LIMIT 1) , 0) AS nIdSupervisor,
                        IFNULL((
                            SELECT color.sDescripcionLargaItem FROM supervisoresvendedores AS sv
                            INNER JOIN usuarios AS uss ON sv.nIdSupervisor = uss.nIdUsuario
                            INNER JOIN usuariosnegocios AS usnegs ON sv.nIdSupervisor = usnegs.nIdUsuario
                            INNER JOIN catalogotabla AS color ON usnegs.nIdColor = color.nIdCatalogoTabla
                            WHERE sv.nIdVendedor = us.nIdUsuario AND usnegs.nIdNegocio = $nIdNegocio LIMIT 1) , '') AS sColorSuperEmpleado,
                        CONCAT(SUBSTRING(us.sNombre, 1, 3)) AS sUsuarioCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), us.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM usuarios AS us 
                INNER JOIN usuariosnegocios AS usneg ON us.nIdUsuario = usneg.nIdUsuario
                INNER JOIN roles AS rol ON usneg.nIdRol = rol.nIdRol
                INNER JOIN negocios AS neg ON usneg.nIdNegocio = neg.nIdNegocio 
                WHERE us.nIdUsuario = $nIdUsuario AND usneg.nIdNegocio = $nIdNegocio AND us.nEstado = 1";
        return $this->db->run(trim($sSQL))[0];
    }

    public function fncGetUsuarios(
        $nIdRol = null,
        $nIdNegocio = null,
        $nIdUsuario = null,
        $nEstado = 1,
        $sOrderBy = null,
        $sLimit = null
    ) {
        $sSQL = "SELECT us.nIdUsuario,
                        usneg.nIdRol, 
                        IFNULL(rol.sNombreRol,'') AS sRol, 
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        IFNULL(us.nExperienciaVentas,0) AS nExperienciaVentas,
                        UPPER(us.sNombre) AS sNombre ,
                        usneg.nIdNegocio,
                        usneg.nIdColor,
                        us.nIdSexo,
                        us.nIdEstadoCivil,
                        us.nCantidadPersonasDependientes,
                        us.dFechaNacimiento,
                        IFNULL((SELECT nIdSupervisor FROM supervisoresvendedores WHERE nIdVendedor = us.nIdUsuario AND nIdNegocio = $nIdNegocio LIMIT 1) , 0) AS nIdSupervisor,
                        IFNULL(us.sImagen,'') AS sImagen, 
                        IFNULL(colorsuper.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores
                        
                        IFNULL((
                            SELECT color.sDescripcionLargaItem FROM supervisoresvendedores AS sv
                            INNER JOIN usuarios AS uss ON sv.nIdSupervisor = uss.nIdUsuario
                            INNER JOIN usuariosnegocios AS usnegs ON sv.nIdSupervisor = usnegs.nIdUsuario
                            INNER JOIN catalogotabla AS color ON usnegs.nIdColor = color.nIdCatalogoTabla
                            WHERE sv.nIdVendedor = us.nIdUsuario AND usnegs.nIdNegocio = $nIdNegocio LIMIT 1) , '') AS sColorSuperEmpleado,

                        CONCAT(SUBSTRING(us.sNombre, 1, 3)) AS sUsuarioCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), us.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM usuarios AS us 
                INNER JOIN usuariosnegocios AS usneg ON usneg.nIdUsuario = us.nIdUsuario
                INNER JOIN roles AS rol ON usneg.nIdRol = rol.nIdRol
                INNER JOIN negocios AS neg ON usneg.nIdNegocio = neg.nIdNegocio 
                LEFT JOIN catalogotabla AS colorsuper ON usneg.nIdColor = colorsuper.nIdCatalogoTabla";

        $sWhere = "";

        $sWhere .= (is_null($nIdRol) || empty($nIdRol) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " usneg.nIdRol = $nIdRol ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " usneg.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nIdUsuario) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " us.nIdUsuario = $nIdUsuario ");

        $sWhere .= (is_null($nEstado) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " us.nEstado = $nEstado ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL   .= (is_null($sOrderBy)  ? "" : " ORDER BY $sOrderBy ");

        $sSQL   .= (is_null($sLimit)  ? "" : " LIMIT $sLimit ");

        // echo $sSQL;
        // // exit;

        return $this->db->run(trim($sSQL));
    }

    public function fncGetColoresEmpleados($nIdNegocio)
    {
        $sSQL = "SELECT DISTINCT usn.nIdColor FROM usuariosnegocios AS usn WHERE usn.nIdNegocio = $nIdNegocio AND usn.nIdColor IS NOT NULL";
        return $this->db->run(trim($sSQL));
    }

    public function fncBuscarEmpleadoPorCorreo($sCorreo)
    {
        $sSQL = "SELECT nIdUsuario FROM usuarios WHERE sCorreo = '$sCorreo'";
        return $this->db->run($sSQL);
    }


    public function fncGetUsuariosAll(
        $nIdRol = null,
        $nIdNegocio = null,
        $nIdUsuario = null,
        $nEstado = null,
        $sOrderBy = null,
        $sLimit = null,
        $nIdSupervisor = null
    ) {
        $sSQL = "SELECT 
                        us.nIdUsuario,
                        usneg.nIdRol,
                        IFNULL(rol.sNombreRol,'') AS sRol,
                        IFNULL(tipodoc.sDescripcionCortaItem,'') AS sTipoDoc,
                        IFNULL(neg.sNombre,'') AS sNombreNegocio, 
                        us.sNumeroDocumento,
                        UPPER(us.sNombre) AS sNombre,
                        us.sCorreo,
                        usneg.nIdNegocio,
                        usneg.nIdColor,
                        IFNULL( DATE_FORMAT( us.dFechaNacimiento, '%d/%m/%Y' ), '' ) AS dFechaNacimiento,
                        IFNULL( DATE_FORMAT( us.dFechaHoraRegistro, '%d/%m/%Y' ), '' ) AS dFechaHoraRegistro,
                        us.nCantidadPersonasDependientes,
                        us.nExperienciaVentas,
                        us.sRubroExperiencia,
                        IFNULL(estudio.sDescripcionLargaItem,'') AS sEstudio, 
                        IFNULL(situacionestudio.sDescripcionLargaItem,'') AS sSituacionEstudio, 
                        IFNULL(sexo.sDescripcionLargaItem,'') AS sSexo, 
                        IFNULL(estadocivil.sDescripcionLargaItem,'') AS sEstadoCivil, 
                        us.sCarreraCiclo,
                        IFNULL((SELECT nIdSupervisor FROM supervisoresvendedores WHERE nIdVendedor = us.nIdUsuario AND nIdNegocio = $nIdNegocio LIMIT 1) , 0) AS nIdSupervisor,
                        us.sClave ,
                        us.nEstado ,
                        IFNULL(us.sImagen,'') AS sImagen, 
                        IFNULL(colorsuper.sDescripcionLargaItem,'') AS sColorSuper, -- Este join es cuando se lista los supersiores

                        IFNULL((
                            SELECT color.sDescripcionLargaItem FROM supervisoresvendedores AS sv
                            INNER JOIN usuarios AS uss ON sv.nIdSupervisor = uss.nIdUsuario
                            INNER JOIN usuariosnegocios AS usnegs ON sv.nIdSupervisor = usnegs.nIdUsuario
                            INNER JOIN catalogotabla AS color ON usnegs.nIdColor = color.nIdCatalogoTabla
                            WHERE sv.nIdVendedor = us.nIdUsuario AND usnegs.nIdNegocio = $nIdNegocio LIMIT 1) , '') AS sColorSuperEmpleado,
                        

                        CONCAT(SUBSTRING(us.sNombre, 1, 3)) AS sUsuarioCorto,
                        TIME_TO_SEC(TIMEDIFF(NOW(), us.dFechaHoraUltimoAcceso)) AS sTimeUltimoAcceso
                FROM usuarios AS us
                INNER JOIN usuariosnegocios AS usneg ON us.nIdUsuario = usneg.nIdUsuario
                INNER JOIN roles AS rol ON usneg.nIdRol = rol.nIdRol
                INNER JOIN negocios AS neg ON usneg.nIdNegocio = neg.nIdNegocio 

                LEFT JOIN catalogotabla AS colorsuper ON usneg.nIdColor = colorsuper.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS tipodoc ON us.nTipoDocumento = tipodoc.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS estudio ON us.nIdEstudios = estudio.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS situacionestudio ON us.nIdSituacionEstudios = situacionestudio.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS sexo ON us.nIdSexo = sexo.nIdCatalogoTabla
                LEFT JOIN catalogotabla AS estadocivil ON us.nIdEstadoCivil = estadocivil.nIdCatalogoTabla";

        # Obtiene los empleados de un supervisor 
        $sSQL .=  is_null($nIdSupervisor) || $nIdSupervisor == 0  ? "" : " INNER JOIN supervisoresvendedores AS svv ON svv.nIdNegocio = usneg.nIdNegocio AND svv.nIdVendedor = us.nIdUsuario ";

        $sWhere = "";

        $sWhere .= (is_null($nEstado) || $nEstado == 0  ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " us.nEstado = $nEstado ");

        $sWhere .= (is_null($nIdRol) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " usneg.nIdRol = $nIdRol ");

        $sWhere .= (is_null($nIdNegocio) ? '' : (strlen($sWhere) > 0 ? " AND " : '') . "usneg.nIdNegocio = $nIdNegocio ");

        $sWhere .= (is_null($nIdUsuario) || ($nIdUsuario) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " us.nIdUsuario = $nIdUsuario ");

        $sWhere .= (is_null($nIdSupervisor) || ($nIdSupervisor) == 0 ? '' : (strlen($sWhere) > 0 ? " AND " : '') . " svv.nIdSupervisor = $nIdSupervisor ");

        $sSQL   .= (strlen($sWhere) > 0 ? ' WHERE ' : '') . $sWhere;

        $sSQL .= (is_null($sOrderBy) ? 'ORDER BY us.sNombre ASC ' : "  ORDER BY $sOrderBy ");

        $sSQL .= (is_null($sLimit) ? '' : "  LIMIT  $sLimit ");

        // echo $sSQL;
        // exit;
        return $this->db->run(trim($sSQL));
    }


    public function fncVerificarExisteColorSupervisor($nIdNegocio, $nIdColor)
    {
        $sSQL = "SELECT usuneg.nIdColor FROM usuariosnegocios AS usuneg WHERE usuneg.nIdNegocio = $nIdNegocio AND usuneg.nIdColor = $nIdColor";
        return $this->db->run(trim($sSQL));
    }

    public function fncCambiarEstado($nIdUsuario, $nEstado)
    {
        $sSQL = "UPDATE usuarios SET nEstado = $nEstado WHERE nIdUsuario = $nIdUsuario ";
        return $this->db->run(trim($sSQL));
    }


    public function fncObtenerDatosBasicos($nIdUsuario, $nIdNegocio)
    {
        $sSQL = "SELECT 
                    us.sNombre,
                    us.nEstado,
                     IFNULL((
                            SELECT color.sDescripcionLargaItem FROM supervisoresvendedores AS sv
                            INNER JOIN usuarios AS uss ON sv.nIdSupervisor = uss.nIdUsuario
                            INNER JOIN usuariosnegocios AS usnegs ON sv.nIdSupervisor = usnegs.nIdUsuario
                            INNER JOIN catalogotabla AS color ON usnegs.nIdColor = color.nIdCatalogoTabla
                            WHERE sv.nIdVendedor = us.nIdUsuario AND usnegs.nIdNegocio = $nIdNegocio LIMIT 1) , '') AS sColorSuperEmpleado
                 FROM usuarios AS us 
                INNER JOIN usuariosnegocios AS usneg ON us.nIdUsuario = usneg.nIdUsuario
                WHERE us.nIdUsuario = $nIdUsuario";
        return $this->db->run(trim($sSQL))[0];
    }
}
