<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['empleado/common/head'], $data) ?>
</head>

<body>

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-start align-items-md-center auth py-md-auto px-md-auto px-0 py-0">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <?php if (isset($error) && !empty($error)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $error ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="auth-form-light text-center p-5">
                            <div class="brand-logo">
                                <img class="img img-fluid" style="max-width: 100px;margin: 15px 0px;" src="<?= src('app/qway.png') ?>">
                            </div>
                            <h4>¡Hola! empecemos</h4>
                            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
                            <form id="formulario-login" method="post"  class="pt-3">

                                <div class="form-group">
                                    <input type="text" name="sUsuario" class="form-control form-control-lg" id="sUsuario" placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <div class="input-group content-password">
                                        <input type="password" placeholder="Clave" class="form-control form-control-lg input-password" name="sClave" id="sClave" aria-label="Password" required>
                                        <div data-visible="true" class="input-group-append btnToggleVisible cursor-pointer">
                                            <span class="input-group-text"> <i style="display: none;" class="far fa-eye icon-view"></i> <i class="far fa-eye-slash icon-slash"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Ingresar</button>
                                </div>
                                <div class="mt-3">
                                    <a id="btnRecuperar" href="javascript:;">Recuperar Contraseña</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!--Modales -->

    <div class="modal fade" id="formRecuperar" tabindex="-1" role="dialog" aria-labelledby="formRecuperarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-recuperar">
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-recuperar" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4>Recuperar contraseña</h4>
                                <p class="d-block">Ingresa tu email y te enviaremos tu contraseña</p>
                                <div class="form-group">
                                    <input type="text" name="sEmail" class="form-control form-control-lg" id="sEmail" placeholder="Email">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient-primary btn-md">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formNegociosUsuario" tabindex="-1" role="dialog" aria-labelledby="formNegociosUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 style="font-size: 16px;" class="modal-title" id="formNegociosUsuarioLabel">Listar usuarios</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <div id="lista-negocios" class="row flex-center">
                    
                    </div> 
                </div>
            </div>
        </div>
    </div>


    <!-- Fin de modales -->

</body>

<?php extend_view(['empleado/common/scripts'], $data) ?>

<!-- Recuperar -->
<script>
    $(function() {



        // Formulario Negocios 

        $("#btnRecuperar").on('click', function() {
            fncCleanAll();
            $("#formRecuperar").modal("show");
        });


        $("#formRecuperar").find('form').on('submit', function(event) {

            event.preventDefault();


            var sEmail = $("#sEmail").val().trim();

            if (sEmail == '') {
                toastr.error('Error. Debe ingresar el email del usuario.');
                return false;
            }


            var jsnData = {
                sEmail: sEmail
            };

            fncRecuperarClave(jsnData, function(aryData) {
                if (aryData.success) {

                    fncCleanAll();
                    $("#formRecuperar").modal("hide");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });

        // Fin de Formulario Negocios 

    });

    // Funciones de la tabla o layout Principal 

    function fncCleanAll() {
        fncClearInputs($("#formRecuperar").find("form"));
    }


    // Llamadas al servidor
    function fncRecuperarClave(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'fncRecuperarClave',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
</script>
<!-- Recuperar -->


<!-- Login -->
<script>
    $(function() {


        $("#formulario-login").on('submit', function(event) {

            event.preventDefault();

            var sUsuario = $("#sUsuario").val().trim();
            var sClave   = $("#sClave").val().trim();

            if (sUsuario == '') {
                toastr.error('Error. Debe ingresar se usuario.Porfavor verifique');
                return false;
            }else if(sClave == '') {
                toastr.error('Error. Debe ingresar una clavev.Porfavor verifique');
                return false;
            }


            var jsnData = {
                sUsuario  : sUsuario,
                sClave    : sClave

            };

            accesoAjax(jsnData, function(aryData) {
                if (aryData.success) {
                    toastr.success(aryData.sMensaje);

                    if (typeof aryData.aryListaNegocios !== 'undefined') {
                        // your code here
                        if(aryData.aryListaNegocios.length > 0){
                            
                            var sHtml = ``;

                            aryData.aryListaNegocios.forEach(element => {
                                sHtml += `
                                
                                    <div onclick="fncIrAlNegocio(${element.nIdNegocio});"  class="card my-2 p-2 w-100 mx-4 cursor-pointer">
                                        <div class="d-flex flex-center">
                                            <div>${element.sNombre}</div>
                                            <div class="ml-auto"></div>
                                            <div class="mx-2"><a href="javascript:;" class="text-primery font-18" title="Ingresar"><i class="material-icons">login</i></a></div>
                                        </div>
                                    </div>
                            
                                `;

                            });

                            $("#formNegociosUsuario").find(".modal-title").html(aryData.sMensaje);
                            $("#formNegociosUsuario").modal("show");
                            $("#lista-negocios").html(sHtml);

                        } else {
                            toastr.error("Ocurrio un error al encontrar al usuario .Porfavor solicite asistencia");
                        }
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(aryData.sMensaje);
                }
            });

        });

        // Fin de Formulario Negocios 

    });

    // Funciones de la tabla o layout Principal 
    function fncIrAlNegocio(nIdNegocio){
        
        var sUsuario = $("#sUsuario").val().trim();
        var sClave   = $("#sClave").val().trim();

        if (sUsuario == '') {
            toastr.error('Error. Debe ingresar se usuario.Porfavor verifique');
            return false;
        }else if(sClave == '') {
            toastr.error('Error. Debe ingresar una clavev.Porfavor verifique');
            return false;
        }

        var jsnData =  {
            sUsuario   : sUsuario,
            sClave     : sClave,
            nIdNegocio : nIdNegocio
        };
        
        accesoMultipleNegocioUsuario(jsnData, function(aryData) {
            if (aryData.success) {
                toastr.success(aryData.sMensaje);
                location.reload();                
            } else {
                toastr.error(aryData.error);
            }
        });
    }

    // Llamadas al servidor
    function accesoAjax(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'accesoAjax',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function accesoMultipleNegocioUsuario(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'accesoMultipleNegocioUsuario',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
</script>
<!-- Login -->



</html>