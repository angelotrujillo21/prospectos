<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body>

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth fondo-login p-0 h-100vh">
                <div class="row flex-grow h-100vh">
                    <div class="col-12 col-lg-5 h-100vh p-0">
                       
                        <div class="auth-form-light text-center p-5 h-100vh " style="overflow-y: auto;">
                            <div class="brand-logo">
                                <img class="img img-fluid" style="max-width: 100px;margin: 15px 0px;" src="<?= src('app/qway.png') ?>">
                            </div>
                            <h4>¡Hola! empecemos</h4>
                            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
                            <form id="form-auth" method="post" class="pt-3">

                                <div class="form-group mx-md-5 mx-0">
                                    <input type="text" name="sUsuario" class="form-control form-control-lg" id="sUsuario" placeholder="Usuario" required>
                                </div>
                                <div class="form-group mx-md-5 mx-0">
                                    <div class="input-group content-password">
                                        <input type="password" placeholder="Clave" class="form-control form-control-lg input-password"  name="sClave"  id="sClave" aria-label="Password" required>
                                        <div data-visible="true" class="input-group-append btnToggleVisible cursor-pointer">
                                            <span class="input-group-text"> <i style="display: none;" class="far fa-eye icon-view"></i>  <i class="far fa-eye-slash icon-slash"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right  mx-md-5 mx-0">
                                    <div class="col-12">
                                        <a id="btnRecuperar" class="link-registrar" href="javascript:;">¿Olvidaste tu constraseña?</a>
                                    </div>
                                </div>
                                <div class="mt-3  mx-md-5 mx-0">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Ingresar</button>
                                </div>
                            </form>

                            <div class="row mt-4  mx-md-5 mx-0">
                                <div class="col-12">
                                    <a id="btnRegistrar" class="link-registrar" href="javascript:;">Registrarse</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-7 h-100vh p-0">

                        <div id="carousel" class="carousel slide  h-100vh" data-ride="carousel">
                            <div class="carousel-inner  h-100vh">
                                <div class="carousel-item active h-100vh">
                                    <img class="d-block w-100 h-100vh" style="object-fit: fill;" src="<?=src('app/slider-login/s1.jpg')?>" alt="First slide">
                                </div>
                                <div class="carousel-item h-100vh">
                                    <img class="d-block w-100 h-100vh" style="object-fit: fill;"  src="<?=src('app/slider-login/s2.jpg')?>" alt="Second slide">
                                </div>
                               
                            </div>
                            <a class="carousel-control-prev d-none" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next d-none" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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
                                    <input type="email" name="sEmail" class="form-control form-control-lg" id="sEmail" placeholder="Email">
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



    <div class="modal fade"  id="formUsuario" tabindex="-1" role="dialog" aria-labelledby="formUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUsuarioLabel">Nuevo Usuario</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sNombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="sNombre" autocomplete="off" name="sNombre">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sApellidos" class="col-form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="sApellidos" autocomplete="off" name="sApellidos">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="sEmailSave" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="sEmailSave" autocomplete="off" name="sEmailSave">
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sLogin" class="col-form-label">Login:</label>
                                    <input type="text" class="form-control" id="sLogin" autocomplete="off" name="sLogin">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="sClaveSave" class="col-form-label">Clave:</label>
                                    <input type="text" class="form-control" id="sClaveSave" autocomplete="off" name="sClaveSave">
                                </div>
                            </div>


                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="sImagen" class="col-form-label">Imagen:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sImagen" accept="image/*" lang="es" name="sImagen">
                                            <label class="custom-file-label" for="sImagen">Elija el archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Fin de modales -->



</body>

<?php extend_view(['admin/common/scripts'], $data) ?>


<!-- Login -->
<script>
    $(function() {

        

        $("#form-auth").on('submit', function(event) {

            event.preventDefault();

            var sUsuario     = $("#sUsuario").val();
            var sClave       = $("#sClave").val();

            var jsnData = {
                sUsuario : sUsuario,
                sClave   : sClave
            };
             

            accesoAjax(jsnData, function(aryData) {
                if (aryData.success) {
                    
                    toastr.success(aryData.msg);
                    
                    location.reload();

                } else {
                    toastr.error(aryData.msg);
                }
            });

        });

 
    });

   


    // Llamadas al servidor

    function accesoAjax(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'accesoAjax',
            data: formData,
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



<!-- Usuario -->
<script>
    $(function() {

        // Formulario Negocios 
        $('#carousel').carousel({
            interval: 2000
        });

        $("#btnRegistrar").on('click', function() {
            fncCleanAll();
            $("#formUsuario").find(".modal-title").html('Nuevo Usuario');
            $("#formUsuario").data("nIdRegistro", 0);
            $("#formUsuario").modal("show");
        });

    

        $("#formUsuario").find('form').on('submit', function(event) {

            event.preventDefault();

            var nIdRegistro     = $("#formUsuario").data("nIdRegistro");
            var sNombre         = $("#sNombre").val().trim();
            var sApellidos      = $("#sApellidos").val().trim();
            var sEmail          = $("#sEmailSave").val().trim();
            var sLogin          = $("#sLogin").val().trim();
            var sClave          = $("#sClaveSave").val().trim();
            var sImagen         = $("#sImagen")[0].files[0];
            var nIdRol          = 1;
            var nEstado         = 1;


            if (sNombre == '') {
                toastr.error('Error. Debe ingresar el nombre del usuario.');
                return false;
            } else if (sApellidos == '') {
                toastr.error('Error. Debe ingresar el apellido del usuario.');
                return false;
            } else if (sEmail == '') {
                toastr.error('Error. Debe ingresar el email del usuario.');
                return false;
            } else if (sLogin == '') {
                toastr.error('Error. Debe ingresar el login del usuario.');
                return false;
            } else if (sClave == '') {
                toastr.error('Error. Debe ingresar la clave del usuario.');
                return false;
            }

            var formData = new FormData();
          
            formData.append('nIdRegistro', nIdRegistro);
            formData.append('sNombre', sNombre);
            formData.append('sApellidos', sApellidos);
            formData.append('sEmail', sEmail);
            formData.append('sLogin', sLogin);
            formData.append('sClave', sClave);
            formData.append('sImagen', sImagen);
            formData.append('nIdRol', nIdRol);
            formData.append('nEstado', parseInt(nEstado));
        

            fncGrabarUsuario(formData, function(aryData) {
                if (aryData.success) {
                    
                    fncCleanAll();
                    $("#formNegocio").modal("hide");
                    toastr.success(aryData.success);

                    $("#sUsuario").val(sLogin);
                    $("#sClave").val(sClave);
                    $("#form-auth").trigger("submit");
                  
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
        fncClearInputs($("#formUsuario").find("form"));
    }

    // Funciones Auxiliares


    // Llamadas al servidor

    function fncGrabarUsuario(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/usuarios/fncGrabarUsuario',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
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
<!-- Usuario -->



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


            var sEmail  = $("#sEmail").val().trim();
         
            if (sEmail == '') {
                toastr.error('Error. Debe ingresar el email del usuario.');
                return false;
            } 

           
            var jsnData = {
                sEmail : sEmail
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




    // Llamadas al servidor
    function fncRecuperarClave(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/usuarios/fncRecuperarClave',
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

</html>