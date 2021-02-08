<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body data-nidnegocio="<?= $nIdNegocio ?>" data-nrol="<?= $nRol ?>" class="bg-form-colaborador">

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">
        <div class="w-100 h-100  ">
            <div class="row flex-center">
                <div class="col-12 col-md-6 border-card bg-white  mt-0 mt-md-5 mb-5">

                    <form enctype="multipart/form-data" id="formUsuario">
                        <div class="row p-3" id="content-form">

                            <div id="title-formulario-empleado" class="col-12 text-center my-3">
                                <h3>Nuevo Usuario</h3>
                            </div>

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

                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                            </div>
                        </div>
                    </form>

                    <div class="row p-3" id="content-success" style="display: none;">
                        <div class="col-12 text-center">
                            <div>
                                <h3>Genial Registro Realizado!</h3>
                                <img class="img img-fluid img-check" src="<?= src('app/success.png') ?>" alt="">
                            </div>
                            <a class="link-ir-admin  color-azul" href="<?= route('admin') ?>" >
                                Ir al Administrador  
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>


<?php extend_view(['admin/common/scripts'], $data) ?>

<!-- Usuario -->
<script>
    $(function() {

        // Formulario Negocios 



        $("#formUsuario").on('submit', function(event) {

            event.preventDefault();

            var nIdRegistro     = 0;
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
                    
                    var jsnData = {
                        nIdUsuario : aryData.nIdUsuarioNew,
                        nIdNegocio : $("body").data("nidnegocio"),
                        nRol       : $("body").data("nrol"),
                    };

                    fncGrabarUsuarioNegocio(jsnData,(aryData)=>{
                      
                        if(aryData.success){

                            fncCleanAll();
                            $("#content-form").hide();
                            $("#content-success").show();

                        } else {
                            toastr.error(aryData.error);
                        }

                    });

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

    function fncGrabarUsuarioNegocio(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/negocios/fncGrabarUsuarioNegocio',
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
<!-- Usuario -->

</html>