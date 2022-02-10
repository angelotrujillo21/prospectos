/********************** BOTON EDITAR **********************/
sEntidadEmpleado = '';
nIdIdRolEmpleado = '';

$(function () {

    // Boton Editar
    $("#btnEditarUsuarioEmpleado").on('click', function () {

        var nIdNegocio = $(this).data("nidnegocio");
        var nIdRol = $(this).data("nidrol");
        var nId = $(this).data("nid"); // id usuario
        // Esto valida que sea administrador en el negocio o que este en la parte de mis negocios 
        if (nIdNegocio == 0 && nIdRol == 0 || nIdNegocio > 0 && nIdRol == 1) {
            fncMostrarUsuarioEdit(nId);
        } else {
            sEntidadEmpleado = '-' + nIdRol;
            nIdIdRolEmpleado = nIdRol;

            if (nIdRol == 3) {
                $("#formEmpleadoE").find("h4").html("Editar Asesor de ventas");
            } else if (nIdRol == 4) {
                $("#formEmpleadoE").find("h4").html("Editar Supervisor");
            } else {
                alert("No se pudo ubicar un rol definido ..");
                return;
            }

            fncLoadEmpleado((bStatus)=>{
                fncMostrarEmpleadoE(nId);
            });

        }
    });

});





/*  -------------------------------------- USER --------------------------------------  */

$(function () {

    $("#formUsuarioE").find('form').on('submit', function (event) {

        event.preventDefault();

        var nIdRegistro = $("#formUsuarioE").data("nIdRegistro");
        var sNombre = $("#sNombreUE").val().toUpperCase().trim();
        var sCorreo = $("#sEmailUE").val().trim();
        var sLogin = $("#sLoginUE").val().trim();
        var sClave = $("#sClaveUE").val().trim();
        var sImagen = $("#sImagenUE")[0].files[0];
        var nIdRol = 1;
        var nEstado = 1;


        if (sNombre == '') {
            toastr.error('Error. Debe ingresar el nombre del usuario.');
            return false;
        } else if (sCorreo == '') {
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
        formData.append('sCorreo', sCorreo);
        formData.append('sLogin', sLogin);
        formData.append('sClave', sClave);
        formData.append('sImagen', sImagen);
        formData.append('nIdRol', nIdRol);
        formData.append('nEstado', parseInt(nEstado));


        fncGrabarUsuarioE(formData, function (aryData) {
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

    $("#formUsuarioE").data("nIdRegistro", nIdRegistro);

    var jsnData = {
        nIdRegistro: nIdRegistro
    };

    fncMostrarUsuarioE(jsnData, function (aryResponse) {

        if (aryResponse.success) {
            var aryData = aryResponse.aryData;

            $("#sNombreUE").val(aryData.sNombre);
            $("#sEmailUE").val(aryData.sCorreo);
            $("#sLoginUE").val(aryData.sLogin);
            $("#sClaveUE").val(aryData.sClave);

            if (aryData.sImagen.length > 0) $("#sImagenUE").parent().find(".custom-file-label").html(aryData.sImagen);

            $("#formEmpleadoE").find(".modal-title").html('Editar Usuario');
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
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function (data) {
            fncCallback(data);
        },
        complete: function () {
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
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function (data) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }
    });
}



/*  -------------------------------------- EMPLEADO --------------------------------------  */

$(function () {



    $("#formEmpleadoE").find("form").on('submit', function (event) {

        event.preventDefault();
        console.log(sEntidadEmpleado);
        var nIdRegistro = $("#formEmpleadoE").data("nIdRegistro");
        var nTipoDocumento = $("#formEmpleadoE").find("#nTipoDocumento" + sEntidadEmpleado);
        var sNumeroDocumento = $("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado);
        var sNombre = $("#formEmpleadoE").find("#sNombre" + sEntidadEmpleado);
        var sCorreo = $("#formEmpleadoE").find("#sCorreo" + sEntidadEmpleado);
        var dFechaNacimiento = $("#formEmpleadoE").find("#dFechaNacimiento" + sEntidadEmpleado);
        var nCantidadPersonasDependientes = $("#formEmpleadoE").find("#nCantidadPersonasDependientes" + sEntidadEmpleado);
        var nIdEstudios = $("#formEmpleadoE").find("#nIdEstudios" + sEntidadEmpleado);
        var nIdSituacionEstudios = $("#formEmpleadoE").find("#nIdSituacionEstudios" + sEntidadEmpleado);
        var sCarreraCiclo = $("#formEmpleadoE").find("#sCarreraCiclo" + sEntidadEmpleado);

        var nIdNegocio = $("body").data("nidnegocio");
        var nExperienciaVentas = $("#formEmpleadoE").find("#nExperienciaVentas" + sEntidadEmpleado);
        var sRubroExperiencia = $("#formEmpleadoE").find("#sRubroExperiencia" + sEntidadEmpleado);
        var sImagen = $("#formEmpleadoE").find("#sImagen" + sEntidadEmpleado).length > 0 ? $("#sImagen" + sEntidadEmpleado)[0].files[0] : null;
        var sClave = $("#formEmpleadoE").find("#sClave" + sEntidadEmpleado);

        var nIdEstadoCivil = $("#formEmpleadoE").find("#nIdEstadoCivil" + sEntidadEmpleado);
        var nIdSexo = $("#formEmpleadoE").find("#nIdSexo" + sEntidadEmpleado);

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
        } else if (nCantidadPersonasDependientes.length > 0 && nCantidadPersonasDependientes.val() == '' || isNaN(nCantidadPersonasDependientes.val()) || nCantidadPersonasDependientes.val() < 0) {
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
        formData.append('sNumeroDocumento', sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : "");
        formData.append('sNombre', sNombre.length > 0 ? sNombre.val() : "");

        formData.append('sCorreo', sCorreo.length > 0 ? sCorreo.val() : "");
        formData.append('nIdSexo', nIdSexo.length > 0 ? nIdSexo.val() : "");

        formData.append('nIdEstadoCivil', nIdEstadoCivil.length > 0 ? nIdEstadoCivil.val() : "");
        formData.append('dFechaNacimiento', dFechaNacimiento.length > 0 ? dFechaNacimiento.val() : "");
        formData.append('nCantidadPersonasDependientes', nCantidadPersonasDependientes.length > 0 ? nCantidadPersonasDependientes.val() : 0);
        formData.append('nExperienciaVentas', nExperienciaVentas.length > 0 ? nExperienciaVentas.val() : "");
        formData.append('sRubroExperiencia', sRubroExperiencia.length > 0 ? sRubroExperiencia.val() : "");
        formData.append('nIdEstudios', nIdEstudios.length > 0 ? nIdEstudios.val() : "");
        formData.append('nIdSituacionEstudios', nIdSituacionEstudios.length > 0 ? nIdSituacionEstudios.val() : "");
        formData.append('sCarreraCiclo', sCarreraCiclo.length > 0 ? sCarreraCiclo.val() : "");
        formData.append('sClave', sClave.length > 0 ? sClave.val() : "");
        formData.append('sImagen', sImagen);
        formData.append('nIdRol', nIdIdRolEmpleado);
        formData.append('nEstado', 1);

        fncGrabarUsuarioE(formData, function (aryData) {
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

function fncLoadEmpleado(fncLoad =null) {
    fncDrawEmpleadoE(function (bEstatus) {
        console.log(bEstatus);
        if (bEstatus) {
            // Ya cargo el formulario


            // Si todo esta cooreecto agrergo los eventos

            $("#formEmpleadoE").find("#nIdEstudios" + sEntidadEmpleado).on('change', function () {

                switch ($(this).val()) {
                    case '0':
                    case '602':
                    case '605':
                        // Educaccion Basica y ninguno
                        $("#formEmpleadoE").find("#content-nIdSituacionEstudios" + sEntidadEmpleado).hide();
                        $("#formEmpleadoE").find("#content-sCarreraCiclo" + sEntidadEmpleado).hide();
                        break;
                    case '604':
                    case '603':
                        // Educaccion Superior y teecnico
                        $("#formEmpleadoE").find("#content-nIdSituacionEstudios" + sEntidadEmpleado).show();
                        $("#formEmpleadoE").find("#content-sCarreraCiclo" + sEntidadEmpleado).show();
                        break;

                }

            });

            $("#formEmpleadoE").find("#nExperienciaVentas" + sEntidadEmpleado).on('change', function () {
                if ($(this).val() == 1) {
                    $("#formEmpleadoE").find("#content-sRubroExperiencia" + sEntidadEmpleado).show();
                } else {
                    $("#formEmpleadoE").find("#content-sRubroExperiencia" + sEntidadEmpleado).hide();
                }
            });

            $("#formEmpleadoE").find("#nTipoDocumento" + sEntidadEmpleado).change(function () {
                if ($(this).val() > 0) {
                    fncMaxLengthTypeDocument($(this).find('option:selected').text().trim().toUpperCase(), "#sNumeroDocumento" + sEntidadEmpleado);
                }
            });

            $("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado).on('keyup change', function () {

                switch ($("#formEmpleadoE").find("#nTipoDocumento" + sEntidadEmpleado).find("option:selected").text()) {

                    case 'RUC':

                        if ($("#sNumeroDocumento" + sEntidadEmpleado).val().length == 11) {

                            // Lanzamos el evento
                            var jsnData = {
                                sTipo: "ruc",
                                sNumeroDoc: $("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado).val()
                            };

                            fncBuscarDocumentE(jsnData, function (aryData) {
                                if (aryData.success) {
                                    $("#formEmpleadoE").find("#sNombre" + sEntidadEmpleado).val(aryData.success.razonSocial);
                                }
                            });

                        }

                        break;

                    case 'DNI':
                        if ($("#sNumeroDocumento" + sEntidadEmpleado).val().length == 7 || $("#sNumeroDocumento" + sEntidadEmpleado).val().length == 8) {

                            // Lanzamos el evento
                            var jsnData = {
                                sTipo: "dni",
                                sNumeroDoc: $("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado).val()
                            };

                            fncBuscarDocumentE(jsnData, function (aryData) {
                                if (aryData.success) {
                                    $("#formEmpleadoE").find("#sNombre" + sEntidadEmpleado).val(aryData.success.razonSocial);
                                }
                            });

                        }
                        break;

                }


            });

            $("#nIdSituacionEstudios" + sEntidadEmpleado).on('change', function () {
                if ($(this).val() == '608') {
                    $("#formEmpleadoE").find("label[for='sCarreraCiclo" + sEntidadEmpleado + "']").html("Carrera");
                } else {
                    $("#formEmpleadoE").find("label[for='sCarreraCiclo" + sEntidadEmpleado + "']").html("Carrera y ciclo");
                }
            });

            $("#formEmpleadoE").find("#content-sCorreo" + sEntidadEmpleado).removeClass("col-md-12");
            $("#formEmpleadoE").find("#content-sCorreo" + sEntidadEmpleado).addClass("col-md-6");
            $("#formEmpleadoE").find("#nIdEstudios" + sEntidadEmpleado).trigger("change");

            fncEventFile();

            if( fncLoad != null){
                fncLoad(true);
            }

        }
    });
}

function fncDrawEmpleadoE(fncCallback) {
    if (typeof $('body').data('nidnegocio') != "undefined") {

        var jsnData = {
            nIdEntidad: nIdIdRolEmpleado,
            nIdNegocio: $('body').data('nidnegocio')
        };

        fncObtenerDataFormE(jsnData, function (aryData) {
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

    fncMostrarRegistroEmpleadoE(jsnData, function (aryData) {
        if (aryData.success) {
            var aryData = aryData.aryData;

            $("#formEmpleadoE").data("nIdRegistro", aryData.nIdUsuario);

            if ($("#formEmpleadoE").find("#nTipoDocumento" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nTipoDocumento" + sEntidadEmpleado).val(aryData.nTipoDocumento);
            if ($("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sNumeroDocumento" + sEntidadEmpleado).val(aryData.sNumeroDocumento);
            if ($("#formEmpleadoE").find("#sNombre" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sNombre" + sEntidadEmpleado).val(aryData.sNombre);
            if ($("#formEmpleadoE").find("#sCorreo" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sCorreo" + sEntidadEmpleado).val(aryData.sCorreo);
            if ($("#formEmpleadoE").find("#nIdSexo" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nIdSexo" + sEntidadEmpleado).val(aryData.nIdSexo);
            if ($("#formEmpleadoE").find("#nIdEstadoCivil" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nIdEstadoCivil" + sEntidadEmpleado).val(aryData.nIdEstadoCivil);
            if ($("#formEmpleadoE").find("#dFechaNacimiento" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#dFechaNacimiento" + sEntidadEmpleado).val(aryData.dFechaNacimiento);
            if ($("#formEmpleadoE").find("#nCantidadPersonasDependientes" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nCantidadPersonasDependientes" + sEntidadEmpleado).val(aryData.nCantidadPersonasDependientes);
            if ($("#formEmpleadoE").find("#nExperienciaVentas" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nExperienciaVentas" + sEntidadEmpleado).val(aryData.nExperienciaVentas);
            if ($("#formEmpleadoE").find("#sRubroExperiencia" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sRubroExperiencia" + sEntidadEmpleado).val(aryData.sRubroExperiencia);
            if ($("#formEmpleadoE").find("#nIdEstudios" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nIdEstudios" + sEntidadEmpleado).val(aryData.nIdEstudios);
            if ($("#formEmpleadoE").find("#nIdSituacionEstudios" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nIdSituacionEstudios" + sEntidadEmpleado).val(aryData.nIdSituacionEstudios);
            if ($("#formEmpleadoE").find("#sCarreraCiclo" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sCarreraCiclo" + sEntidadEmpleado).val(aryData.sCarreraCiclo);
            if ($("#formEmpleadoE").find("#nEstado" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#nEstado" + sEntidadEmpleado).val(aryData.nEstado);
            if ($("#formEmpleadoE").find("#sClave" + sEntidadEmpleado).length > 0) $("#formEmpleadoE").find("#sClave" + sEntidadEmpleado).val(aryData.sClave);

            $("#formEmpleadoE").modal("show");
        }
    });
}

//Llamadas al servidor
function fncObtenerDataFormE(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'formularios/fncBuildForm',
        data: jsnData,
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function (data) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }
    });
}

function fncMostrarRegistroEmpleadoE(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'usuarios/fncMostrarRegistro',
        data: jsnData,
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function (data) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }
    });
}

function fncBuscarDocumentE(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'api/' + jsnData.sTipo + '/' + jsnData.sNumeroDoc,
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function (data) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }
    });
}