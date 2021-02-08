<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body data-nidentidad="<?= $nIdEntidad ?>" 
      data-nidnegocio="<?= $nIdNegocio ?>" 
      data-nidtipoempleado="<?= $nIdTipoEmpleado ?>" 
      data-nidsupervisorocolor="<?= $nIdSupervisoroColor ?>" 
      data-ntipoempleadosupervisor="<?= $nTipoEmpleadoSupervisor ?>"
      class="bg-form-colaborador">

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">
        <div class="w-100 h-100  ">
            <div class="row flex-center">
                <div class="col-12 col-md-6 border-card bg-white  mt-0 mt-md-5 mb-5">

                    <form enctype="multipart/form-data" id="form-empleado">
                        <div class="row p-3" id="content-form">

                            <div id="title-formulario-empleado" class="col-12 text-center my-3">
                                <h3><?= $sTitle ?></h3>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>


<?php extend_view(['admin/common/scripts'], $data) ?>

<script>
    
    var sEntidad = "-" + $("body").data("nidentidad");

    $(function() {

        // llamamos ala funcion draw Empleado
        fncDrawEmpleado((bStatus)=>{

            if(bStatus){
                
                // Ocultamos el estado ya que no tiene sentido que el usuario lo ingrese 
                $("#content-nEstado"+sEntidad).hide();
                // Si todo esta cooreecto agrergo los eventos
                
                $("#nIdEstudios" + sEntidad).on('change', function() {
                    
                    switch ($(this).val()) {
                        case '0':
                        case '602':
                        case '605':
                            // Educaccion Basica y ninguno
                            $("#content-nIdSituacionEstudios"+ sEntidad).hide();
                            $("#content-sCarreraCiclo"+ sEntidad).hide();
                            break;
                        case '604':
                        case '603':
                            // Educaccion Superior y teecnico
                            $("#content-nIdSituacionEstudios" + sEntidad).show();
                            $("#content-sCarreraCiclo"+ sEntidad).show();
                            break;

                    }

                });

                $("#nExperienciaVentas" + sEntidad).on('change', function() {
                    if ($(this).val() == 1) {
                        $("#content-sRubroExperiencia" + sEntidad).show();
                    } else {
                        $("#content-sRubroExperiencia" + sEntidad).hide();
                    }
                });

                $("#nTipoDocumento" + sEntidad ).change(function() {
                  
                    if( $(this).val() > 0 ) {
                        fncMaxLengthTypeDocument( $(this).find('option:selected').text().trim().toUpperCase() , "#sNumeroDocumento"+sEntidad );
                    }

                    $("#sNumeroDocumento"+sEntidad).val("").trigger("keyup");

                });

                $("#sNumeroDocumento" + sEntidad ).on('keyup change',function(){
                    
                    switch( $("#nTipoDocumento"+sEntidad).find("option:selected").text() ){
                        
                        case 'RUC':

                            if( $("#sNumeroDocumento"+sEntidad).val().length  == 11 ){
                                 
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "ruc",
                                    sNumeroDoc   : $("#sNumeroDocumento"+sEntidad).val()
                                };

                                fncBuscarDocument( jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombre"+sEntidad).val(aryData.success.razonSocial);
                                    }
                                });

                            }

                        break;
                        
                        case 'DNI':
                            if( $("#sNumeroDocumento"+sEntidad).val().length  == 7 || $("#sNumeroDocumento"+sEntidad).val().length  == 8 ){
                                
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "dni",
                                    sNumeroDoc   : $("#sNumeroDocumento"+sEntidad).val()
                                };

                                fncBuscarDocument(jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombre"+sEntidad).val(aryData.success.razonSocial);
                                    }
                                });

                            }
                        break;

                    }
                  
                    
                });

                $("#nIdSituacionEstudios"+sEntidad).on('change',function(){
                    if( $(this).val() == '608' ){
                        $("label[for='sCarreraCiclo" + sEntidad +"']").html("Carrera");
                    } else {
                        $("label[for='sCarreraCiclo" + sEntidad +"']").html("Carrera y ciclo");
                    }
                });

                $("#content-sCorreo" + sEntidad).removeClass("col-md-12");
                $("#content-sCorreo" + sEntidad).addClass("col-md-6");

                $("#nIdEstudios" + sEntidad).trigger("change");
            }

          
        });

      

        $("#form-empleado").on('submit', function(event) {
            
            event.preventDefault();

            var nTipoDocumento                  = $("#nTipoDocumento" + sEntidad);
            var sNumeroDocumento                = $("#sNumeroDocumento" + sEntidad);
            var sNombre                         = $("#sNombre"+ sEntidad);
            var sCorreo                         = $("#sCorreo" + sEntidad);
            var dFechaNacimiento                = $("#dFechaNacimiento" + sEntidad);
            var nCantidadPersonasDependientes   = $("#nCantidadPersonasDependientes" + sEntidad);
            var nIdEstudios                     = $("#nIdEstudios" + sEntidad);
            var nIdSituacionEstudios            = $("#nIdSituacionEstudios" + sEntidad);
            var sCarreraCiclo                   = $("#sCarreraCiclo" + sEntidad);

            var nIdNegocio                      = $("body").data("nidnegocio");
            var nIdTipoEmpleado                 = $("body").data("nidtipoempleado");
            var nidsupervisorocolor             = $("body").data("nidsupervisorocolor");

            var nExperienciaVentas              = $("#nExperienciaVentas" + sEntidad);
            var sRubroExperiencia               = $("#sRubroExperiencia" + sEntidad);

            var sImagen                        = $("#sImagen" + sEntidad).length > 0 ?  $("#sImagen" + sEntidad)[0].files[0] : null;
            var sClave                         = $("#sClave" + sEntidad);


            if (nTipoDocumento.length > 0 && nTipoDocumento.val() == '0') {
                toastr.error('Error. Seleccione un tipo de documento . Porfavor verifique');
                return;
            } else if (sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '') {
                toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
                return;
            } else if (sNombre.length > 0 && sNombre.val() == '') {
                toastr.error('Error. Ingrese un nombre . Porfavor verifique');
                return;
            } else if (sCorreo.length > 0 && (sCorreo.val() == '' || !fncValidateEmail(sCorreo.val()) ) ) {
                toastr.error('Error. Ingrese un correo con el formato correcto. Porfavor verifique');
                return;
            } else if (dFechaNacimiento.length > 0 && dFechaNacimiento.val() == '') {
                toastr.error('Error. Ingrese un fecha. Porfavor verifique');
                return;
            } else if (nCantidadPersonasDependientes.length > 0 && nCantidadPersonasDependientes.val() == '') {
                toastr.error('Error. Ingrese la cantidad de personas dependientes. Porfavor verifique');
                return;
            } else if (sClave.length > 0 && sClave.val() == '') {
                toastr.error('Error. Ingrese una contraseña. Porfavor verifique');
                return;
            }

            if (nIdEstudios.length > 0 && nIdEstudios.val() == '1') {

                if (nIdSituacionEstudios.length > 0 && nIdSituacionEstudios.val() == '0') {
                    toastr.error('Error. Seleccione situacion de estudios . Porfavor verifique');
                    return;
                } else if (sCarreraCiclo.length > 0 && sCarreraCiclo.val() == '') {
                    toastr.error('Error. Ingrese situacion de estudios . Porfavor verifique');
                    return;
                }

            }


            if (nExperienciaVentas.length > 0 && nExperienciaVentas.val() == '1') {
                if (sRubroExperiencia.length > 0 && sRubroExperiencia.val() == '') {
                    toastr.error('Error. Ingrese su rubro de experiencia. Porfavor verifique');
                    return;
                }
            }

            var formData = new FormData();
            formData.append('nIdRegistro', 0);
            formData.append('nIdNegocio', nIdNegocio);
            formData.append('nIdTipoEmpleado', nIdTipoEmpleado);
            formData.append('nTipoDocumento', nTipoDocumento.length > 0 ? nTipoDocumento.val() : "");
            formData.append('sNumeroDocumento',sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : "");
            formData.append('sNombre', sNombre.length > 0 ? sNombre.val() : "");
            formData.append('sCorreo', sCorreo.length > 0 ? sCorreo.val() : "");
            formData.append('dFechaNacimiento', dFechaNacimiento.length > 0 ? dFechaNacimiento.val() : "");
            formData.append('nCantidadPersonasDependientes', nCantidadPersonasDependientes.length > 0 ? nCantidadPersonasDependientes.val() : 0);
            formData.append('nExperienciaVentas', nExperienciaVentas.length > 0 ? nExperienciaVentas.val() : "");
            formData.append('sRubroExperiencia', sRubroExperiencia.length > 0 ? sRubroExperiencia.val() : "");
            formData.append('nIdEstudios',nIdEstudios.length > 0 ? nIdEstudios.val() : "");
            formData.append('nIdSituacionEstudios', nIdSituacionEstudios.length > 0 ? nIdSituacionEstudios.val() : "");
            formData.append('sCarreraCiclo', sCarreraCiclo.length > 0 ? sCarreraCiclo.val() : "");
            formData.append('sClave', sClave.length > 0 ? sClave.val() : "");
            formData.append('sImagen', sImagen);
            formData.append('nEstado', 1);

           
            if (nIdTipoEmpleado == $("body").data("ntipoempleadosupervisor") ) {
                // Supervisores
                formData.append('nIdColor', nidsupervisorocolor);
            } else {

                formData.append('nIdSupervisor', nidsupervisorocolor);
            }

            fncGrabarEmpleado(formData, function(aryData) {
                if (aryData.success) {
                    $("#content-form").fadeOut();
                    $("#content-success").fadeIn();
                } else {
                    toastr.error(aryData.error);
                }
            });


        });

    

    });


    function fncDrawEmpleado(fncCallback) {

        var jsnData = {
            nIdEntidad : $('body').data('nidentidad'),
            nIdNegocio : $('body').data('nidnegocio')
        };

        fncObtenerDataForm(jsnData,function(aryData){
          $("#title-formulario-empleado").after(fncBuildForm(aryData));
          fncCallback(true);
        });

    }

    // Llamadas al servidor 
    function fncGrabarEmpleado(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncGrabarEmpleado',
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

    function fncObtenerDataForm(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'formularios/fncBuildForm',
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

    function fncBuscarDocument(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'api/'+ jsnData.sTipo +'/' + jsnData.sNumeroDoc ,
            beforeSend: function () {
               // fncMostrarLoader();
            },
            success: function (data) {
                fncCallback(data);
            },
            complete: function () {
              //  fncOcultarLoader();
            }
        });
    }

</script>

</html>