$(function() {

    $('#tblPrincipal').on('refresh.bs.table', function (params) {
        $("#cboNombreCatalogo").val(0);
    });

    $('#cboNombreCatalogo').on('change', function() {
        var jsnData = {
            sOpcion: $(this).val()
        };

        fncPopulate(jsnData, function(aryData) {
            $("#tblPrincipal").bootstrapTable('load', aryData);
        });

    });


    // Form Tabla 

    $("#btnCrearTabla").on("click", function() {
        $("#formTabla").find(".modal-title").html("Mantenimiento: Crear Tabla");
        $("#formTabla").modal("show");
    });

    $("#formTabla").find(".btn-submit").on("click", function() {

        var sNombreCatalogo = encodeURIComponent($("#sNombreCatalogo").val().trim().toUpperCase());

        var jsnData = {
            sNombreCatalogo: sNombreCatalogo
        };

        if (sNombreCatalogo == '') {
            toastr.error('Error. Debe ingresar el nombre de la tabla.');
            return false;
        }

        fncGrabarTabla(jsnData, function(aryData) {
            if (aryData.success) {
                $("#tblPrincipal").bootstrapTable('refresh');
                $("#formTabla").modal('hide');
                toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }
        });

    });

    // End Form Tabla



    // Form Item
    $("#control-avanzados").click(function(event) {
        $( "#tabs" ).fadeToggle( "slow", "linear" );
        $("#cboNombreCatalogoPadre option[value='"+$("#TxtsNombreCatalogo").val()+"']").remove();
    });

    $("#formItem").find(".btn-submit").on("click", function() {

        var nIdCatalogoTabla        = $("#TxtsNombreCatalogo").data("nIdCatalogoTabla"),
            sNombreCatalogo         = $("#TxtsNombreCatalogo").val(),
            sCodigoItem             = $("#TxtsCodigoItem").val().trim(),
            sDescripcionCortaItem   = $("#TxtsDescripcionCortaItem").val().trim(),
            sDescripcionLargaItem   = $("#TxtsDescripcionLargaItem").val().trim(),
            sTipoItem               = $("#sTipoItem").val(),
            sMostrarCliente         = $("#sMostrarCliente").val(),
            sDefecto                = $("#sDefecto").val(),
            sEstado                 = $("#sEstado").val(),
            sNombreCatalogoPadre    = $("#cboNombreCatalogoPadre option:selected").text(),
            nIdCatalogoTablaPadre   = $("#cboNombreCatalogoItemPadre").val();

        if (sCodigoItem == '') {
            toastr.error("Error. Debe ingresar el código del ítem. Verifique.");
            return false;
        }
        if (sDescripcionLargaItem == '') {
            toastr.error("Error. Debe ingresar la descripción larga. Verifique.");
            return false;
        }
        if (sDescripcionCortaItem == '') {
            toastr.error("Error. Debe ingresar la descripción corta. Verifique.");
            return false;
        }

        var jsnData = {
            nIdCatalogoTabla        : nIdCatalogoTabla,
            sNombreCatalogo         : sNombreCatalogo.toUpperCase(),
            sCodigoItem             : encodeURIComponent(sCodigoItem.toUpperCase()),
            sDescripcionCortaItem   : encodeURIComponent(sDescripcionCortaItem.toUpperCase()),
            sDescripcionLargaItem   : encodeURIComponent(sDescripcionLargaItem.toUpperCase()),
            sTipoItem               : sTipoItem,
            sMostrarCliente         : sMostrarCliente,
            sDefecto                : sDefecto,
            sEstado                 : sEstado,
            sNombreCatalogoPadre    : sNombreCatalogoPadre.toUpperCase(),
            nIdCatalogoTablaPadre   : nIdCatalogoTablaPadre
        };

        fncGrabaCatalogoItem(jsnData,function(aryData){
            if (aryData.success) {
                $("#formItem").modal('hide');
                
                if($("#cboNombreCatalogo").val() == 0){
                    $("#tblPrincipal").bootstrapTable("refresh");
                } else {
                    $("#cboNombreCatalogo").trigger("change");
                }

                toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }
        });

    });

    $("#btnCrearItem").button().on("click", function() {

        if ($('#cboNombreCatalogo').val() == '0') {
            toastr.error('Error. Debe elegir una tabla del listado.');
            return;
        }

        $('#TxtsNombreCatalogo').val($('#cboNombreCatalogo').val());
        $("#TxtsNombreCatalogo").data("nIdCatalogoTabla",0);
        $("#control-avanzados").attr('disabled', true);
        $("#control-avanzados").css('display', 'none');
        $("#formItem").find(".modal-title").html("Mantenimiento: Crear Item");
        $("#formItem").modal("show");
    });


    $('#cboNombreCatalogoPadre').on('change', function () {
        var sNombreCatalogo = $(this).val();
        var jsnData = {
            sNombreCatalogo : sNombreCatalogo
        };
        fncListadoItemsPadre(jsnData, function(aryData){
            if(aryData.success){

                $('#cboNombreCatalogoItemPadre').html('<option value"0">Seleccionar</option>');

                $.each(aryData.data,function(nIndex,aryItem){
                    $("#cboNombreCatalogoItemPadre").append('<option value"'+aryItem.nIdCatalogoTabla+'">'+aryItem.sDescripcionLargaItem+'</option>');
                });

                $("#cboNombreCatalogoItemPadre").val($("#nIdCatalogoTablaPadre").val());
            }
         
        });
    });
    // End Form Item


});

// Funciones Tabla
 

function fncMostrarRegistro(nIdRegistro) {

    $("#TxtsNombreCatalogo").data("nIdCatalogoTabla",nIdRegistro);
    $("#control-avanzados").attr('disabled', false);
    $("#control-avanzados").css('display', 'block' );

    var jsnData = {
        nIdCatalogoTabla: nIdRegistro
    };

    fncBuscarRegistro(jsnData, function(aryData){

            if (aryData.success) {
                $("#formItem").find(".modal-title").html( 'Mantenimiento: Modificar Item');
                $("#formItem").modal("show");
            
                $("#TxtsNombreCatalogo").val(aryData.data.sNombreCatalogo);
                $("#TxtsCodigoItem").val(aryData.data.sCodigoItem);
                $("#TxtsDescripcionCortaItem").val(aryData.data.sDescripcionCortaItem);
                $("#TxtsDescripcionLargaItem").val(aryData.data.sDescripcionLargaItem);
                $("#sTipoItem").val(aryData.data.sTipoItem);
                $("#sMostrarCliente").val(aryData.data.sMostrarCliente);
                $("#sDefecto").val(aryData.data.sDefecto);
                $("#sEstado").val(aryData.data.sEstado);
                $("#nIdCatalogoTablaPadre").val(aryData.data.nIdCatalogoTablaPadre);
                $("#cboNombreCatalogoPadre").val(aryData.data.sNombreCatalogoPadre);
                $("#cboNombreCatalogoPadre").trigger('change');
            } else {
                toastr.error(aryData.error);
            }
    });

}

// Funcion que invoca a la función que cambia el estado del registro
function fncCambiarEstado ( nIdRegistro, sNuevoEstado ) {

    var sEstado = sNuevoEstado == '1' ? 'mostrará' : 'ocultará';

    if(confirm('Esta acción ' + sEstado + ' el registro en todo el sistema. ¿ Esta seguro de continuar ?')){
        var jsnData = {
            nIdRegistro  : nIdRegistro , 
            sNuevoEstado : sNuevoEstado
        }
        fncEjecutarCambiarEstado( jsnData, function(aryData){
            if(aryData.success){

                if($("#cboNombreCatalogo").val() == 0){
                    $("#tblPrincipal").bootstrapTable("refresh");
                } else {
                    $("#cboNombreCatalogo").trigger("change");
                }

                toastr.success( aryData.success );
            }else{
                toastr.success( aryData.error );
            }
         
        }); 
    }

}

// Funcion que invoca a la función que elimina permanentemente el registro
function fncEliminarRegistro ( nIdRegistro ) {
    if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
        
        var jsnData = {
            nIdRegistro : nIdRegistro
        };

        fncEjecutarEliminarRegistro( jsnData , function(aryData){
            
            if(aryData.success){
                
                if($("#cboNombreCatalogo").val() == 0){
                    $("#tblPrincipal").bootstrapTable("refresh");
                } else {
                    $("#cboNombreCatalogo").trigger("change");
                }

                toastr.success( aryData.success );
            } else {
                toastr.error( aryData.error );
            }

        }); 
    }
}


// LLamadas al servidor 
function fncPopulate(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        url: web_root + 'admin/catalogoTabla/populate',
        data: jsnData,
        dataType: 'json',
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

function fncGrabarTabla(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'admin/catalogoTabla/fncGrabaCatalogo',
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

function fncGrabaCatalogoItem(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root + 'admin/catalogoTabla/fncGrabaCatalogoItem',
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

function fncBuscarRegistro(jsnData, fncCallback) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: web_root +  'admin/catalogoTabla/fncMostrarRegistro',
        data: jsnData ,
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

function fncListadoItemsPadre(jsnData, fncCallback){
    $.ajax({
            type: 'post',
            url:  web_root+'admin/catalogoTabla/fncListadoItemsPadre',
            data: jsnData,
            dataType: 'json',
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

function fncEjecutarCambiarEstado ( jsnData, fncCallback ) {

    $.ajax({
        type: 'post',
        url: web_root + 'admin/catalogoTabla/fncCambiarEstado',
        data: jsnData,
        dataType: 'json',
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function( data ) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }
    }); 

}

// Funcion que elimina permanentemente el registro
function fncEjecutarEliminarRegistro ( jsnData , fncCallback ) {

    $.ajax({
        type: 'post',
        url: web_root + 'admin/catalogoTabla/fncEliminarRegistro',
        data: jsnData,
        dataType: 'json',
        beforeSend: function () {
            fncMostrarLoader();
        },
        success: function( data ) {
            fncCallback(data);
        },
        complete: function () {
            fncOcultarLoader();
        }

    });
}
