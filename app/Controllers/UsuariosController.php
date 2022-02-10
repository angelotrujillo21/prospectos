<?php

namespace Application\Controllers;

use Exception;
use Application\Libs\Mail;
use Application\Libs\Upload;
use Application\Libs\Session;
use Application\Models\Negocios;
use Application\Models\Usuarios;
use Application\Core\Controller as Controller;
use Application\Models\CatalogoTabla;

class UsuariosController extends Controller
{

    //model principal
    public $session;
    public $negocios;
    public $usuarios;
    public $sMsg = "";
    public $catalogoTabla;

    public function __construct()
    {
        parent::__construct();
        $this->session  = new Session();
        $this->negocios = new Negocios();
        $this->usuarios    = new Usuarios();
        $this->catalogoTabla    = new CatalogoTabla();

        $this->session->init();
    }


    # Regitrstar un usuario
    # --- apartir de ahora en el sistema se podra registrar usuarios en general que peuden ser administrador , visitante, supervisor , asesor de ventas
    public function fncGrabarUsuario()
    {
        $nIdRegistro                    = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nIdNegocio                     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nTipoDocumento                 = isset($_POST['nTipoDocumento']) ? $_POST['nTipoDocumento'] : null;
        $sNumeroDocumento               = isset($_POST['sNumeroDocumento']) ? $_POST['sNumeroDocumento'] : null;
        $sNombre                        = isset($_POST['sNombre']) ? $_POST['sNombre'] : null;
        $sCorreo                        = isset($_POST['sCorreo']) ? $_POST['sCorreo'] : null;

        $nIdSexo                        = isset($_POST['nIdSexo']) ? $_POST['nIdSexo'] : null;
        $nIdEstadoCivil                 = isset($_POST['nIdEstadoCivil']) ? $_POST['nIdEstadoCivil'] : null;

        $nIdColor                       = isset($_POST['nIdColor']) ? $_POST['nIdColor'] : null;
        $dFechaNacimiento               = isset($_POST['dFechaNacimiento']) ? $_POST['dFechaNacimiento'] : null;
        $nCantidadPersonasDependientes  = isset($_POST['nCantidadPersonasDependientes']) ? $_POST['nCantidadPersonasDependientes'] : null;
        $nExperienciaVentas             = isset($_POST['nExperienciaVentas']) ? $_POST['nExperienciaVentas'] : null;
        $sRubroExperiencia              = isset($_POST['sRubroExperiencia']) ? $_POST['sRubroExperiencia'] : null;
        $nIdEstudios                    = isset($_POST['nIdEstudios']) ? $_POST['nIdEstudios'] : null;
        $nIdSituacionEstudios           = isset($_POST['nIdSituacionEstudios']) ? $_POST['nIdSituacionEstudios'] : null;
        $sCarreraCiclo                  = isset($_POST['sCarreraCiclo']) ? $_POST['sCarreraCiclo'] : null;
        $nIdSupervisor                  = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;

        $sLogin                         = isset($_POST['sLogin']) ? $_POST['sLogin'] : null;

        $sClave                         = isset($_POST['sClave']) ? $_POST['sClave'] : null;
        $sImagen                        = isset($_FILES['sImagen']) ? $_FILES['sImagen'] : null;
        $nIdRol                         = isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null;
        $nCrearNegocio                  = isset($_POST['nCrearNegocio']) ? $_POST['nCrearNegocio'] : 0;


        $nEstado                        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;


        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            // $nIdRolAdmin        = $this->fncGetVarConfig("nIdRolAdmin");
            // $nIdRolVisitante    = $this->fncGetVarConfig("nIdRolVisitante");
            // $nIdRolAsesor       = $this->fncGetVarConfig("nIdRolAsesor");
            // $nIdRolSupervisor   = $this->fncGetVarConfig("nIdRolSupervisor");

            // Crear
            if ($nIdRegistro == 0) {
                if (isset($sCorreo) && !is_null($sCorreo)) {
                    $aryUsuario = $this->usuarios->fncBuscarUsuarioPorCorreoOrLogin($sCorreo, $sLogin);

                    if (fncValidateArray($aryUsuario)) {
                        $this->exception("Error.Ya existe un usuario con este correo o el login ya se encuentra asignado en el sistema . Porfavor verifique");
                    }
                }


                if (isset($sImagen) && !is_null($sImagen)) {
                    $sImagen = Upload::process($sImagen, 'images/multi');
                }

                $nIdNewUsuario = $this->usuarios->fncGrabarUsuario(
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
                );

                # Registrar usuario por negocio
                if (!is_null($nIdNegocio) && $nIdNewUsuario > 0) {
                    # Grabar relacion usuario negocio
                    $this->usuarios->fncGrabarUsuarioNegocio($nIdNewUsuario, $nIdNegocio, $nIdColor, $nIdRol);
                }

                # Registrar relacion supervisor - vendedor
                if (!is_null($nIdNegocio) && !is_null($nIdSupervisor) && $nIdNewUsuario > 0) {
                    # Grabar relacion usuario negocio
                    $this->usuarios->fncGrabarSupervisorVendedor($nIdNegocio, $nIdSupervisor, $nIdNewUsuario);
                }
            } else {

                # Si existe la imgen la buscamos y la borramos fisicamente
                if (isset($sImagen) && !is_null($sImagen)) {
                    $aryUser = ($this->usuarios->fncGetUsuarioById($nIdRegistro, $nIdNegocio))[0];

                    if (!empty($aryUser["sImagen"])) {
                        fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryUser['sImagen']);
                    }

                    $sImagen = Upload::process($sImagen, 'images/multi');
                }

                # Vamos a eliminar la relacion de supervisor - vendedor
                if (!is_null($nIdNegocio) && !is_null($nIdSupervisor) && $nIdRegistro > 0) {
                    $this->usuarios->fncEliminarSupervisorVendedor($nIdSupervisor, $nIdRegistro);
                }

                # Vamos e aeliminar la relacion usuuario negocio
                if (!is_null($nIdNegocio) && $nIdRegistro > 0) {
                    $this->usuarios->fncEliminarUsuarioNegocio($nIdRegistro, $nIdNegocio);
                }

                # Registrar relacion supervisor - vendedor siempre y cuando tengo un supervisor
                if (!is_null($nIdNegocio) && !is_null($nIdSupervisor) && $nIdRegistro > 0) {
                    $this->usuarios->fncGrabarSupervisorVendedor($nIdNegocio, $nIdSupervisor, $nIdRegistro);
                }

                # Registrar usuario por negocio
                if (!is_null($nIdNegocio) && $nIdRegistro > 0) {
                    # Grabar relacion usuario negocio
                    $this->usuarios->fncGrabarUsuarioNegocio($nIdRegistro, $nIdNegocio, $nIdColor, $nIdRol);
                }

                # Actualizar
                $this->usuarios->fncActualizarUsuario(
                    $nIdRegistro,
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
                );

                $user = $this->session->get("user");

                if( !is_null($user) && ($user["nIdUsuario"] == $nIdRegistro) ){

                    // Actualizamos la sesion del usuario
                    $aryUser  = $this->usuarios->fncGetUsuarioById($nIdRegistro, $nIdNegocio);
                    $aryUser  = fncValidateArray($aryUser) ? $aryUser[0] : null;
                    if (fncValidateArray($aryUser)) {
                        $this->session->add('user', $aryUser);
                    }
                }
            }

            $sSuccess =  $nIdRegistro == 0 ? 'Usuario registrado exitosamente...' : 'Usuario actualizado exitosamente...';

            $this->json(array("success" => $sSuccess));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncEliminarUsuario()
    {
        // Recibe valores del formulario
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }


            $aryData = $this->usuarios->getUser($nIdRegistro);

            // Eliminar la imagen
            if (!empty($aryData['sImagen'])) {
                fncEliminarArchivo(ROOTPATHRESOURCE . "/images/multi/" . $aryData['sImagen']);
            }

            $this->usuarios->fncEliminarUsuario($nIdRegistro);

            $this->json(array("success" => 'Usuario eliminado exitosamente.'));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncMostrarUsuario()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->usuarios->getUser($nIdRegistro);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncRecuperarClave()
    {
        try {
            $sEmail = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;

            // Valida valores del formulario
            if (is_null($sEmail)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryData = $this->usuarios->fncBuscarUsuarioPorCorreo($sEmail);
            $mail = new Mail();

            if (fncValidateArray($aryData)) {
                $aryData = $aryData[0];

                $aryUser = $this->usuarios->getUser($aryData["nIdUsuario"]);


                $sHtml = '
                <div>
                    <p>
                        <b><span style="font-size:14px;font-family:Arial">
                                Estimados señor(a): </span></b>
                        <span style="font-size:14px;font-family:Arial">' . uc($aryUser["sNombre"]) . '</span>
                    </p>
                    <p>
                        <span style="font-size:14px;font-family:Arial">Por medio de la presente y de acuerdo a su
                            solicitud, sometemos a brindarle la informacion para el acceso  a la plataforma de prospectos <br> <b>Porfavor no comparta su informacion con nadie</b> </span>
                    </p>

                    <p>
                       <span style="font-size:14px;font-family:Arial"><b>Login :</b> ' . $aryUser["sLogin"] . '  </span>
                    </p>

                    <p>
                        <span style="font-size:14px;font-family:Arial"><b>Clave :</b> ' . $aryUser["sClave"] . '  </span>
                    </p>
                  
                    <p>
                        <span style="font-size:14px;font-family:Arial">Saludos</span><br> 
                    </p>
                </div>';

                if ($mail->send(['sFrom' => 'Auth', 'subject' => 'Recuperacion de acceso', 'body' => $sHtml, 'sCorreo' => $aryUser["sCorreo"], 'sNombre' => $aryUser["sNombre"]])) {
                    $this->json(array("success" => "Genial!.Enviamos los datos de acceso al correo " . $aryUser["sCorreo"]  . ". Porfavor verifique."));
                } else {
                    $this->exception("Error. Se encontro al usuario pero no se pudo enviar el correo . Intentelo mas tarde porfavor");
                }
            } else {
                $this->exception("Error. No se encontro ningun usuario del sistema con este correo. Porfavor verifique");
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncPopulate()
    {

        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdRol         = isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null;
        $nEstado        = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;
        $sOrderBy       = isset($_POST['sOrderBy']) ? $_POST['sOrderBy'] : null;
        $sLimit         = isset($_POST['sLimit']) ? $_POST['sLimit'] : null;

        try {


            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $aryRows      = [];
            $aryEmpleados  = $this->usuarios->fncGetUsuariosAll(
                $nIdRol,
                $nIdNegocio,
                null,
                $nEstado,
                $sOrderBy,
                $sLimit
            );

            $bIsSupervisor = $nIdRol == $this->fncGetVarConfig("nIdRolSupervisor") ? true : false;
            $bIsAsesor     = $nIdRol == $this->fncGetVarConfig("nIdRolAsesor") ? true : false;

            $user          = $this->session->get("user");
            $bIsRolAdmin   = $user["nIdRol"] == $this->fncGetVarConfig("nIdRolAdmin") ? true : false;

            if (fncValidateArray($aryEmpleados)) {
                foreach ($aryEmpleados as $aryEmpleado) {
                    $sNewState = $aryEmpleado['nEstado'] == '1' ? '0' : '1';

                    $sActionState      = 'fncCambiarEstadoEmpleado( ' . "'" . $aryEmpleado['nIdUsuario'] . "', " . $sNewState . ' )';
                    $sActionMetricas   = 'fncVerEmpleado(' . $aryEmpleado['nIdUsuario'] . ')';

                    $sIconState     = $aryEmpleado['nEstado'] == '1'  ? 'power_settings_new' : 'check';
                    $sTitleState    = $aryEmpleado['nEstado'] == '1' ? 'Desactivar' : 'Activar';

                    $sActionVer       = "fncMostrarEmpleado(" . $aryEmpleado['nIdUsuario'] . ", 'ver' );";
                    $sActionEdit      = "fncMostrarEmpleado(" . $aryEmpleado['nIdUsuario'] . ", 'editar' );";

                    $sAcciones = '<div class="content-acciones">
                                    <a onclick="' . $sActionVer . '" href="javascript:;"  title="Ver" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                    ' .  ($bIsAsesor ? '<a href="javascript:;" onclick="' . $sActionMetricas . '" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="Ver Metricas"><i class="material-icons">moving</i></a></a>' : '') . '
                                    ' .  ($bIsRolAdmin ? '<a href="javascript:;" onclick="' . $sActionState . '" class="text-primary" data-toggle="tooltip" data-placement="bottom" title="' . $sTitleState . '"><i class="material-icons">' . $sIconState . '</i></a></a>' : '') . '
                                    ' . ($bIsRolAdmin ? '<a onclick="' . $sActionEdit . '" href="javascript:;"   title="Editar" class="text-primary"><i class="material-icons">edit</i></a>'  : '') . '
                                </div>';


                    $sNombreColor   = $bIsSupervisor ? strtolower($aryEmpleado["sColorSuper"]) : strtolower($aryEmpleado["sColorSuperEmpleado"]);
                    $sCuadradoSuper = '<div class="cuadrado cuadrado-reporte fondo-' . $sNombreColor . '"></div>';

                    $aryRows[] = [
                        "sAcciones"                         => $sAcciones,
                        "nIdUsuario"                       => $aryEmpleado["nIdUsuario"],
                        "sUsuarioCorto"                    => $aryEmpleado["sUsuarioCorto"],
                        "sRol"                              => $aryEmpleado["sRol"],
                        "sNombreNegocio"                    => $aryEmpleado["sNombreNegocio"],
                        "sColorSuper"                       => $aryEmpleado["sColorSuper"],
                        "sColorSuperEmpleado"               => $aryEmpleado["sColorSuperEmpleado"],
                        "nTipoDocumento"                    => $aryEmpleado["sTipoDoc"],
                        "sNumeroDocumento"                  => $aryEmpleado["sNumeroDocumento"],
                        "sColor"                            => $sCuadradoSuper,
                        "sNombreColor"                      => strtoupper($sNombreColor),
                        "sNombre"                           => $aryEmpleado["sNombre"],
                        "sCorreo"                           => $aryEmpleado["sCorreo"],
                        "nExperienciaVentas"                => $aryEmpleado["nExperienciaVentas"] == 1 ? "SI" : "NO",
                        "sRubroExperiencia"                 => $aryEmpleado["sRubroExperiencia"],
                        "dFechaNacimiento"                  => $aryEmpleado["dFechaNacimiento"],
                        "nCantidadPersonasDependientes"     => $aryEmpleado["nCantidadPersonasDependientes"],
                        "nIdEstudios"                       => $aryEmpleado["sEstudio"],
                        "nIdSituacionEstudios"              => $aryEmpleado["sSituacionEstudio"],
                        "nIdSexo"                           => $aryEmpleado["sSexo"],
                        "nIdEstadoCivil"                    => $aryEmpleado["sEstadoCivil"],
                        "sCarreraCiclo"                     => $aryEmpleado["sCarreraCiclo"],
                        "sClave"                            => $aryEmpleado["sClave"],
                        "sUltimoAcceso"                     => fncSecondsToTime($aryEmpleado["sTimeUltimoAcceso"]),
                        'sImagen'                           => !empty($aryEmpleado['sImagen']) ? '<img class="user-avatar rounded-circle  img-usuario" src="' . src('multi/' . $aryEmpleado['sImagen'])  . '" alt="' . $aryEmpleado['sImagen'] . '">' : '',
                        "nEstado"                           => $aryEmpleado["nEstado"] == 1 ? "ACTIVO" : "DESACTIVO",

                    ];
                }
            }

            $this->json(array("success" => true, "aryData" => $aryRows));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function fncMostrarRegistro()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            $user = $this->session->get("user");

            // Valida valores del formulario
            if ($nIdRegistro == null) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryData = $this->usuarios->fncGetUsuarioById($nIdRegistro, isset($user["nIdNegocio"]) ? $user["nIdNegocio"] : null);

            $this->json(array("success" => true, "aryData" => $aryData[0]));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncMostrarRegistroCard()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;

        try {

            $user = $this->session->get("user");

            if (!isset($user["nIdNegocio"]) || is_null($nIdRegistro)) {
                $this->exception('Error. El código de identificación del registro no es el correcto o no se encuentra el id del negocio. Por favor verifique.');
            }


            $aryData = $this->usuarios->fncMostrarRegistroCard($nIdRegistro, $user["nIdNegocio"]);
            $aryData["sUltimoAcceso"] = fncSecondsToTime($aryData["sTimeUltimoAcceso"]);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function fncSendEmailEmpleado()
    {
        try {
            $sEmail              = isset($_POST['sEmail']) ? $_POST['sEmail'] : null;
            $nIdRol              =  isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null; # El tipo empleado es el rol puede ser 3 asesor 4 supervisor
            $nIdColor            = isset($_POST['nIdColor']) ? $_POST['nIdColor'] : null;
            $nIdSupervisor       = isset($_POST['nIdSupervisor']) ? $_POST['nIdSupervisor'] : null;

            // Valida valores del formulario
            if (is_null($sEmail) || is_null($nIdRol)) {
                $this->exception('Error. Existen valores vacios. Por favor verifique.');
            }

            $bSend = false;
            $sUrl  = "";

            $user = $this->session->get('user');

            # Vamos a validar si esque el usuario existe
            $aryUser = $this->usuarios->fncBuscarUsuarioPorCorreo($sEmail);
            $nExisteUsuario = false;

            if (fncValidateArray($aryUser)) {
                $nExisteUsuario = true;

                $aryUser = $aryUser[0];
                # Si esque exsite el usuario vamos a validar si esta en el negocio
                $aryUsuarioNegocio  = $this->negocios->fncGetNegociosByIdUsuario($aryUser["nIdUsuario"], $user["nIdNegocio"]);

                if (fncValidateArray($aryUsuarioNegocio)) {
                    $this->sMsg = "El usuario " .  $aryUser["sNombre"] . " ya se encuentra registrado en el negocio . Porfavor verifique";
                } else {
                    # Si no existe en negocio pero si existe en el sistema vamos  a registrarlo
                    # Reegistra la relacion usuario - negocio
                    $this->usuarios->fncGrabarUsuarioNegocio($aryUser["nIdUsuario"], $user["nIdNegocio"], $nIdColor, $nIdRol);

                    if ($nIdRol == $this->fncGetVarConfig("nIdRolSupervisor")) {
                        $this->sMsg = "Este usuario ya existe asi que, Se registro el supervisor de forma automatica .Porfavor actualize para que pueda visualizarlo";
                    } elseif ($nIdRol == $this->fncGetVarConfig("nIdRolAsesor")) {
                        # Reegistra la relacion supervisor - vendedor
                        $this->usuarios->fncGrabarSupervisorVendedor($user["nIdNegocio"], $nIdSupervisor, $aryUser["nIdUsuario"]);
                        $this->sMsg = "Este usuario ya existe asi que Se registro el asesor de ventas de forma automatica .Porfavor actualize para que pueda visualizarlo";
                    }
                }
            } else {
                $nExisteUsuario = false;

                // Si el tipo de emepleado es supervisro traeme el color
                $nIdSupervisoroColor = $nIdRol == $this->fncGetVarConfig("nIdRolSupervisor") ? $nIdColor : $nIdSupervisor;
                $sUrl                = route("formulario-empleado/" . $user["nIdNegocio"] . "/" . $nIdRol . "/" . $nIdSupervisoroColor . "");

                $aryNegocio  = $this->negocios->fncGetNegocioById($user["nIdNegocio"]);
                $mail        = new Mail();

                $aryData     = array(
                    "sImagen"        => $aryNegocio["sImagen"],
                    "sNombreNegocio" => $aryNegocio["sNombre"],
                    "sUrl"           => $sUrl
                );

                ob_start();
                $this->view('admin/invitacion-prospectos-email', array('aryData' => $aryData));
                $html = ob_get_contents();
                ob_end_clean();

                if ($mail->send(['sFrom' =>  $aryNegocio["sNombre"], 'subject' => 'Invitacion', 'body' => $html, 'sCorreo' => $sEmail, 'sNombre' => 'Colaborador'])) {
                    $bSend = true;
                    $this->sMsg = "Genial se envio el mensaje de forma existosa";
                } else {
                    $this->sMsg = "Upds.. no se pudo enviar el mensaje  por medio del correo , aqui te adjuntamos el link para que puedas registrarte gracias.";
                    $bSend = false;
                }
            }

            $this->json(array("success" => true, "sMsg" => $this->sMsg,  "sUrl" => $sUrl, "bSend" => $bSend, "nExisteUsuario" => $nExisteUsuario));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncObtenerCamposUsuarios()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;
        $nIdRol         = isset($_POST['nIdRol']) ? $_POST['nIdRol'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)  || is_null($nIdRol)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $nEntidad = 0;

            if ($nIdRol == $this->fncGetVarConfig("nIdRolSupervisor")) {
                $nEntidad = $this->fncGetVarConfig("nIdSupervisor");
            } else {
                $nEntidad = $this->fncGetVarConfig("nIdEntidadVendedor");
            }

            $aryData = $this->negocios->fncGetConfiguracionCampo($nIdNegocio, $nEntidad, 1, true);

            $this->json(array("success" => true, "aryData" => $aryData));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncObtenerColores()
    {
        $nIdNegocio     = isset($_POST['nIdNegocio']) ? $_POST['nIdNegocio'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdNegocio)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $aryColores = $this->usuarios->fncGetColoresEmpleados($nIdNegocio);
            $sColores   = fncValidateArray($aryColores) ? implode(",", array_column($aryColores, 'nIdColor')) : "0";
            $aryColores = $this->catalogoTabla->fncListado('COLORES', "nIdCatalogoTabla NOT IN($sColores)");

            $this->json(array("success" => true, "aryData" => $aryColores));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function fncCambiarEstado()
    {
        $nIdRegistro = isset($_POST['nIdRegistro']) ? $_POST['nIdRegistro'] : null;
        $nEstado     = isset($_POST['nEstado']) ? $_POST['nEstado'] : null;

        try {

            // Valida valores del formulario
            if (is_null($nIdRegistro) || is_null($nEstado)) {
                $this->exception('Error. El código de identificación del registro no es el correcto. Por favor verifique.');
            }

            $this->usuarios->fncCambiarEstado($nIdRegistro, $nEstado);
            $this->json(array("success" => "Genial se realizo el cambio de estado exitosamente."));
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
