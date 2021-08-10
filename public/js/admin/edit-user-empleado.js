/********************** BOTON EDITAR **********************/

$(function() {

    // Boton Editar
    $("#btnEditarUsuarioEmpleado").on('click', function() {

        var nId = $(this).data("nid");

         if ($(this).data("srol") == "USER"){
            fncMostrarUsuarioEdit(nId);
        } else {
            
            fncMostrarEmpleadoE(nId);
    
        }
    });



 
});





/*  -------------------------------------- USER --------------------------------------  */

$(function() {
  
    $("#formUsuarioE").find('form').on('submit', function(event) {

        event.preventDefault();

        var nIdRegistro     = $("#formUsuarioE").data("nIdRegistro");
        var sNombre         = $("#sNombreUE").val().trim();
        var sApellidos      = $("#sApellidosUE").val().trim();
        var sEmail          = $("#sEmailUE").val().trim();
        var sLogin          = $("#sLoginUE").val().trim();
        var sClave          = $("#sClaveUE").val().trim();
        var sImagen         = $("#sImagenUE")[0].files[0];
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
        formData.append('sCorreo', sEmail);
        formData.append('sLogin', sLogin);
        formData.append('sClave', sClave);
        formData.append('sImagen', sImagen);
        formData.append('nIdRol', nIdRol);
        formData.append('nEstado', parseInt(nEstado));
    

        fncGrabarUsuarioE(formData, function(aryData) {
            if (aryData.success) {
                toastr.success(aryData.success);
                location.reload();
            } else {
                toastr.error(aryData.error);
            }
        });


    });
   
});



function fncMostrarUsuarioEdit(nIdRegistro) {

    $("#formUsuarioE").data("nIdRegistro",nIdRegistro);
  
    var jsnData = {
        nIdRegistro: nIdRegistro
    };
 
    fncMostrarUsuarioE(jsnData, function(aryResponse){
        
            if (aryResponse.success) {
                var aryData = aryResponse.aryData;

                $("#sNombreUE").val(aryData.sNombre);
                $("#sApellidosUE").val(aryData.sApellidos);
                $("#sEmailUE").val(aryData.sEmail);
                $("#sLoginUE").val(aryData.sLogin);
                $("#sClaveUE").val(aryData.sClave);

                if(aryData.sImagen.length> 0)$("#sImagenUE").parent().find(".custom-file-label").html(aryData.sImagen);

                $("#formUsuarioE").find(".modal-title").html('Editar Usuario');
                $("#formUsuarioE").modal("show");

            } else {
                toastr.error(aryData.error);
            }
    });

}

// Llamadas al servidor 

function fncGrabarUsuarioE(formData, fncCallback) {
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

function fncMostrarUsuarioE(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'admin/usuarios/fncMostrarUsuario',
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



/*  -------------------------------------- EMPLEADO --------------------------------------  */
window.sEntidadVendedor = '-3';

$(function() {

    fncDrawEmpleadoE(function(bEstatus) {
        console.log(bEstatus);
        if (bEstatus) {
            // Ya cargo el formulario


            // Si todo esta cooreecto agrergo los eventos

            $("#nIdEstudios" + sEntidadVendedor).on('change', function() {

                switch ($(this).val()) {
                    case '0':
                    case '602':
                    case '605':
                        // Educaccion Basica y ninguno
                        $("#content-nIdSituacionEstudios" + sEntidadVendedor).hide();
                        $("#content-sCarreraCiclo" + sEntidadVendedor).hide();
                        break;
                    case '604':
                    case '603':
                        // Educaccion Superior y teecnico
                        $("#content-nIdSituacionEstudios" + sEntidadVendedor).show();
                        $("#content-sCarreraCiclo" + sEntidadVendedor).show();
                        break;

                }

            });

            $("#nExperienciaVentas" + sEntidadVendedor).on('change', function() {
                if ($(this).val() == 1) {
                    $("#content-sRubroExperiencia" + sEntidadVendedor).show();
                } else {
                    $("#content-sRubroExperiencia" + sEntidadVendedor).hide();
                }
            });

            $("#nTipoDocumento" + sEntidadVendedor).change(function() {
                if ($(this).val() > 0) {
                    fncMaxLengthTypeDocument($(this).find('option:selected').text().trim().toUpperCase(), "#sNumeroDocumento" + sEntidadVendedor);
                }
            });

            $("#sNumeroDocumento" + sEntidadVendedor).on('keyup change', function() {

                switch ($("#nTipoDocumento" + sEntidadVendedor).find("option:selected").text()) {

                    case 'RUC':

                        if ($("#sNumeroDocumento" + sEntidadVendedor).val().length == 11) {

                            // Lanzamos el evento
                            var jsnData = {
                                sTipo: "ruc",
                                sNumeroDoc: $("#sNumeroDocumento" + sEntidadVendedor).val()
                            };

                            fncBuscarDocument(jsnData, function(aryData) {
                                if (aryData.success) {
                                    $("#sNombre" + sEntidadVendedor).val(aryData.success.razonSocial);
                                }
                            });

                        }

                        break;

                    case 'DNI':
                        if ($("#sNumeroDocumento" + sEntidadVendedor).val().length == 7 || $("#sNumeroDocumento" + sEntidadVendedor).val().length == 8) {

                            // Lanzamos el evento
                            var jsnData = {
                                sTipo: "dni",
                                sNumeroDoc: $("#sNumeroDocumento" + sEntidadVendedor).val()
                            };

                            fncBuscarDocument(jsnData, function(aryData) {
                                if (aryData.success) {
                                    $("#sNombre" + sEntidadVendedor).val(aryData.success.razonSocial);
                                }
                            });

                        }
                        break;

                }


            });

            $("#nIdSituacionEstudios" + sEntidadVendedor).on('change', function() {
                if ($(this).val() == '608') {
                    $("label[for='sCarreraCiclo" + sEntidadVendedor + "']").html("Carrera");
                } else {
                    $("label[for='sCarreraCiclo" + sEntidadVendedor + "']").html("Carrera y ciclo");
                }
            });

            $("#content-sCorreo" + sEntidadVendedor).removeClass("col-md-12");
            $("#content-sCorreo" + sEntidadVendedor).addClass("col-md-6");
            $("#nIdEstudios" + sEntidadVendedor).trigger("change");
            
            fncEventFile();
             
        }
    });

    $("#formEmpleadoE").find("form").on('submit', function(event) {

        event.preventDefault();
        
        var nIdRegistro                     = $("#formEmpleadoE").data("nIdRegistro");
        var nTipoDocumento                  = $("#nTipoDocumento" + sEntidadVendedor);
        var sNumeroDocumento                = $("#sNumeroDocumento" + sEntidadVendedor);
        var sNombre                         = $("#sNombre" + sEntidadVendedor);
        var sCorreo                         = $("#sCorreo" + sEntidadVendedor);
        var dFechaNacimiento                = $("#dFechaNacimiento" + sEntidadVendedor);
        var nCantidadPersonasDependientes   = $("#nCantidadPersonasDependientes" + sEntidadVendedor);
        var nIdEstudios                     = $("#nIdEstudios" + sEntidadVendedor);
        var nIdSituacionEstudios            = $("#nIdSituacionEstudios" + sEntidadVendedor);
        var sCarreraCiclo                   = $("#sCarreraCiclo" + sEntidadVendedor);

        var nIdNegocio                      = $("body").data("nidnegocio");
        var nExperienciaVentas              = $("#nExperienciaVentas" + sEntidadVendedor);
        var sRubroExperiencia               = $("#sRubroExperiencia" + sEntidadVendedor);
        var sImagen                         = $("#sImagen" + sEntidadVendedor).length > 0 ?  $("#sImagen" + sEntidadVendedor)[0].files[0] : null;
        var sClave                          = $("#sClave" + sEntidadVendedor);

        var nIdEstadoCivil                  = $("#nIdEstadoCivil" + sEntidadVendedor);
        var nIdSexo                         = $("#nIdSexo" + sEntidadVendedor);

        if (nTipoDocumento.length > 0 && nTipoDocumento.val() == '0') {
            toastr.error('Error. Seleccione un tipo de documento . Porfavor verifique');
            return;
        } else if (sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '') {
            toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
            return;
        } else if (sNombre.length > 0 && sNombre.val() == '') {
            toastr.error('Error. Ingrese un nombre . Porfavor verifique');
            return;
        } else if (sCorreo.length > 0 && (sCorreo.val() == '' || !fncValidateEmail(sCorreo.val()))) {
            toastr.error('Error. Ingrese un correo con el formato correcto. Porfavor verifique');
            return;
        } else if (dFechaNacimiento.length > 0 && dFechaNacimiento.val() == '') {
            toastr.error('Error. Ingrese un fecha. Porfavor verifique');
            return;
        } else if (nCantidadPersonasDependientes.length > 0 && nCantidadPersonasDependientes.val() == '' || isNaN(nCantidadPersonasDependientes.val()) || nCantidadPersonasDependientes.val() < 0 ) {
            toastr.error('Error. No ha ingresado la cantidad de personas dependientes o el valor no es correcto. Porfavor verifique');
            return;
        } else if (sClave.length > 0 && sClave.val() == '') {
            toastr.error('Error. Ingrese una contraseña. Porfavor verifique');
            return;
        } else if (nIdEstadoCivil.length > 0 && nIdEstadoCivil.val() == '0') {
            toastr.error('Error. Seleccione un estado civil. Porfavor verifique');
            return;
        } else if (nIdSexo.length > 0 && nIdSexo.val() == '0') {
            toastr.error('Error. Seleccione un tipo de sexo. Porfavor verifique');
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
        formData.append('nIdRegistro', nIdRegistro);
        formData.append('nIdNegocio', nIdNegocio);
        formData.append('nTipoDocumento', nTipoDocumento.length > 0 ? nTipoDocumento.val() : "");
        formData.append('sNumeroDocumento',sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : "");
        formData.append('sNombre', sNombre.length > 0 ? sNombre.val() : "");

        formData.append('sCorreo', sCorreo.length > 0 ? sCorreo.val() : "");
        formData.append('nIdSexo', nIdSexo.length > 0 ? nIdSexo.val() : "");

        formData.append('nIdEstadoCivil', nIdEstadoCivil.length > 0 ? nIdEstadoCivil.val() : "");
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
        
        fncGrabarEmpleadoE(formData, function(aryData) {
            if (aryData.success) {
                toastr.success(aryData.success);
                $("#formEmpleadoE").modal("hide");
                location.reload();
            } else {
                toastr.error(aryData.error);
            }
        });

    });
  
   
});


function fncDrawEmpleadoE(fncCallback) {
    console.log(1);
    if(typeof $('body').data('nidnegocio')  != "undefined" ){
        
        var jsnData = {
            nIdEntidad: 3,
            nIdNegocio: $('body').data('nidnegocio')
        };

        fncObtenerDataFormE(jsnData, function(aryData) {
            console.log(aryData);
            $("#content-empleado-edit").html(fncBuildForm(aryData));
            fncCallback(true);
        });

    } else { 
        fncCallback(false);
    }
}

function fncMostrarEmpleadoE(nIdRegistro) {

    var jsnData = {
        nIdRegistro: nIdRegistro
    };

    fncMostrarRegistroEmpleadoE(jsnData, function(aryData) {
        if (aryData.success) {
            var aryData = aryData.aryData;

            $("#formEmpleadoE").data("nIdRegistro", aryData.nIdEmpleado);

            if ($("#nTipoDocumento" + sEntidadVendedor).length > 0) $("#nTipoDocumento" + sEntidadVendedor).val(aryData.nTipoDocumento);
            if ($("#sNumeroDocumento" + sEntidadVendedor).length > 0) $("#sNumeroDocumento" + sEntidadVendedor).val(aryData.sNumeroDocumento);
            if ($("#sNombre" + sEntidadVendedor).length > 0) $("#sNombre" + sEntidadVendedor).val(aryData.sNombre);
            if ($("#sCorreo" + sEntidadVendedor).length > 0) $("#sCorreo" + sEntidadVendedor).val(aryData.sCorreo);
            if ($("#nIdSexo" + sEntidadVendedor ).length > 0 )  $( "#nIdSexo" + sEntidadVendedor ).val( aryData.nIdSexo ); 
            if ($("#nIdEstadoCivil" + sEntidadVendedor ).length > 0 )  $( "#nIdEstadoCivil" + sEntidadVendedor ).val( aryData.nIdEstadoCivil ); 
            if ($("#dFechaNacimiento" + sEntidadVendedor).length > 0) $("#dFechaNacimiento" + sEntidadVendedor).val(aryData.dFechaNacimiento);
            if ($("#nCantidadPersonasDependientes" + sEntidadVendedor).length > 0) $("#nCantidadPersonasDependientes" + sEntidadVendedor).val(aryData.nCantidadPersonasDependientes);
            if ($("#nExperienciaVentas" + sEntidadVendedor).length > 0) $("#nExperienciaVentas" + sEntidadVendedor).val(aryData.nExperienciaVentas);
            if ($("#sRubroExperiencia" + sEntidadVendedor).length > 0) $("#sRubroExperiencia" + sEntidadVendedor).val(aryData.sRubroExperiencia);
            if ($("#nIdEstudios" + sEntidadVendedor).length > 0) $("#nIdEstudios" + sEntidadVendedor).val(aryData.nIdEstudios);
            if ($("#nIdSituacionEstudios" + sEntidadVendedor).length > 0) $("#nIdSituacionEstudios" + sEntidadVendedor).val(aryData.nIdSituacionEstudios);
            if ($("#sCarreraCiclo" + sEntidadVendedor).length > 0) $("#sCarreraCiclo" + sEntidadVendedor).val(aryData.sCarreraCiclo);
            if ($("#nEstado" + sEntidadVendedor).length > 0) $("#nEstado" + sEntidadVendedor).val(aryData.nEstado);
            if ($("#sClave" + sEntidadVendedor).length > 0) $("#sClave" + sEntidadVendedor).val(aryData.sClave);
            
            $("#formEmpleadoE").modal("show");
        }
    });
}
//  Llamadas al servidor

function fncObtenerDataFormE(jsnData, fncCallback) {
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

function fncMostrarRegistroEmpleadoE(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'empleados/fncMostrarRegistro',
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

function fncGrabarEmpleadoE(formData, fncCallback) {
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
