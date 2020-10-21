<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body data-nidnegocio="<?=$nIdNegocio?>" data-nidtipoempleado="<?= $nIdTipoEmpleado ?>" data-nidsupervisorocolor="<?=$nIdSupervisoroColor?>" class="bg-form-colaborador">

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">
        <div class="w-100 h-100  ">
            <div class="row flex-center">
                <div class="col-12 col-md-6 border-card bg-white  mt-0 mt-md-5 mb-5">
                   
                    <div class="row p-3" id="content-form">

                        <div class="col-12 text-center my-3">
                            <h3><?= $sTitle ?></h3>
                        </div>

                        <?php if (is_array($aryConfTemplate)  && count($aryConfTemplate) > 0) : ?>
                            <?php foreach ($aryConfTemplate as $aryConf) : ?>
                                <div id="content-<?= $aryConf['sNombre'] ?>" class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="<?= $aryConf['sNombre'] ?>" class="col-form-label"><?= $aryConf['sNombreUsuario'] ?></label>

                                        <?php if ($aryConf['sNombre'] == 'nTipoDocumento' ||  $aryConf['sNombre'] == 'nIdEstudios' || $aryConf['sNombre'] == 'nIdSituacionEstudios' ) : ?>
                                            <?php $aryLista = [] ; ?>
                                            <?php if($aryConf['sNombre'] == 'nTipoDocumento')       $aryLista = $aryTipoDocumento; ?>
                                            <?php if($aryConf['sNombre'] == 'nIdEstudios')          $aryLista = $aryNivelEducacion; ?>
                                            <?php if($aryConf['sNombre'] == 'nIdSituacionEstudios') $aryLista = $arySituacionEstudio; ?>
                                            <select class="form-control" name="<?= $aryConf['sNombre'] ?>" id="<?= $aryConf['sNombre'] ?>">
                                                <option value="0">SELECCIONAR</option>
                                                <?php if (is_array($aryLista)  && count($aryLista) > 0) : ?>
                                                    <?php foreach ($aryLista as $ary) : ?>
                                                        <option value="<?= $ary['nIdCatalogoTabla'] ?>"><?= $aryConf['sNombre'] == 'nTipoDocumento' ? $ary['sDescripcionCortaItem']: $ary['sDescripcionLargaItem']  ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        <?php elseif  ($aryConf['sNombre'] == 'nExperienciaVentas') : ?>
                                            <select class="form-control" name="<?= $aryConf['sNombre'] ?>" id="<?= $aryConf['sNombre'] ?>">
                                                <option value="1">SI</option>
                                                <option value="0">NO</option>
                                            </select>
                                        <?php elseif ($aryConf['sNombre'] == 'dFechaNacimiento') : ?>
                                            <input type="text" placeholder="dd/mm/YYYY" class="form-control" name="<?= $aryConf['sNombre'] ?>" id="<?= $aryConf['sNombre'] ?>">
                                        <?php else : ?>
                                            <input type="text" class="form-control" name="<?= $aryConf['sNombre'] ?>" id="<?= $aryConf['sNombre'] ?>">
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                        </div>
                    </div>
                    <div class="row p-3" id="content-success" style="display: none;">
                        <div class="col-12 text-center">
                            <div>
                                <h3>Genial Registro Realizado!</h3>
                                <img class="img img-fluid img-check" src="<?=src('app/success.png')?>" alt="">
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
    $(function() {
        

        $("#dFechaNacimiento").datepicker({
            changeMonth: true,
            changeYear: true
        });

        $(".btn-submit").on('click', function() {

            var nTipoDocumento                  = $("#nTipoDocumento");
            var sNumeroDocumento                = $("#sNumeroDocumento");
            var sNombre                         = $("#sNombre");
            var sApellidos                      = $("#sApellidos");
            var dFechaNacimiento                = $("#dFechaNacimiento");
            var nCantidadPersonasDependientes   = $("#nCantidadPersonasDependientes");
            var nIdEstudios                     = $("#nIdEstudios");
            var nIdSituacionEstudios            = $("#nIdSituacionEstudios");
            var sCarreraCiclo                   = $("#sCarreraCiclo");

            var nIdNegocio                      = $("body").data("nidnegocio");
            var nIdTipoEmpleado                 = $("body").data("nidtipoempleado");
            var nidsupervisorocolor             = $("body").data("nidsupervisorocolor");

            var nExperienciaVentas              = $("#nExperienciaVentas");
            var sRubroExperiencia               = $("#sRubroExperiencia");


            if( nTipoDocumento.length > 0 && nTipoDocumento.val() == '0' ){
                toastr.error('Error. Seleccione un tipo de documento . Porfavor verifique');
                return;
            } else if( sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '' ){
                toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
                return;
            } else if( sNombre.length > 0 && sNombre.val() == '' ){
                toastr.error('Error. Ingrese un nombre . Porfavor verifique');
                return;
            } else if( sApellidos.length > 0 && sApellidos.val() == '' ){
                toastr.error('Error. Ingrese un apellidos. Porfavor verifique');
            } else if( dFechaNacimiento.length > 0 && dFechaNacimiento.val() == '' ){
                toastr.error('Error. Ingrese un fecha. Porfavor verifique');
            } else if( nCantidadPersonasDependientes.length > 0 && nCantidadPersonasDependientes.val() == '' ){
                toastr.error('Error. Ingrese la cantidad de personas dependientes. Porfavor verifique');
            } 
            
            if( nIdEstudios.length > 0 && nIdEstudios.val() == '1' ){

                if( nIdSituacionEstudios.length > 0 && nIdSituacionEstudios.val() == '0' ){
                    toastr.error('Error. Seleccione situacion de estudios . Porfavor verifique');
                } else if( sCarreraCiclo.length > 0 && sCarreraCiclo.val() == '' ){
                    toastr.error('Error. Ingrese situacion de estudios . Porfavor verifique');
                }

            }


            if ( nExperienciaVentas.length > 0  && nExperienciaVentas.val() == '1' ){
                if( sRubroExperiencia.length > 0 && sRubroExperiencia.val() == '' ){
                    toastr.error('Error. Ingrese su rubro de experiencia. Porfavor verifique');
                }
            }


            var jsnData = {
                nIdRegistro                    : 0,  
                nIdNegocio                     : nIdNegocio,
                nIdTipoEmpleado                : nIdTipoEmpleado,
                nTipoDocumento                 : nTipoDocumento.length > 0 ?  nTipoDocumento.val()  : null,
                sNumeroDocumento               : sNumeroDocumento.length > 0 ?  sNumeroDocumento.val()  : null,
                sNombre                        : sNombre.length > 0 ?  sNombre.val()  : null,
                sApellidos                     : sApellidos.length > 0 ?  sApellidos.val()  : null,
                dFechaNacimiento               : dFechaNacimiento.length > 0 ?  dFechaNacimiento.val()  : null,
                nCantidadPersonasDependientes  : nCantidadPersonasDependientes.length > 0 ?  nCantidadPersonasDependientes.val()  : null,
                nExperienciaVentas             : nExperienciaVentas.length > 0 ? nExperienciaVentas.val() : null ,
                sRubroExperiencia              : sRubroExperiencia.length > 0 ? sRubroExperiencia.val() : null,
                nIdEstudios                    : nIdEstudios.length > 0 ?  nIdEstudios.val()  : null,
                nIdSituacionEstudios           : nIdSituacionEstudios.length > 0 ?  nIdSituacionEstudios.val()  : null,
                sCarreraCiclo                  : sCarreraCiclo.length > 0 ?  sCarreraCiclo.val()  : null,
                nEstado                        : 1
            };

            if (nIdTipoEmpleado == '588') {
                // Supervisores
                var jsnData = Object.assign(jsnData, {
                    nIdColor : nidsupervisorocolor
                });
            } else {
                var jsnData = Object.assign(jsnData, {
                    nIdSupervisor : nidsupervisorocolor
                });
            }

            console.log(jsnData);
            fncGrabarEmpleado(jsnData, function(aryData){
                if(aryData.success){
                    $("#content-form").fadeOut();
                    $("#content-success").fadeIn();
                } else {
                    toastr.error(aryData.error);
                }
            });


        });

        $("#nIdEstudios").on('change',function(){
           

            switch ($(this).val()) {
                case '0':   
                case '602':
                case '605':   
                    // Educaccion Basica y ninguno
                    $("#content-nIdSituacionEstudios").hide();
                    $("#content-sCarreraCiclo").hide();
                    break;
                case '604':
                case '603':
                    // Educaccion Superior y teecnico
                    $("#content-nIdSituacionEstudios").show();
                    $("#content-sCarreraCiclo").show();
                    break;
                
            }
            
        });

        $("#nExperienciaVentas").on('change',function(){
            if ($(this).val() == 1) {
                $("#content-sRubroExperiencia").show();
            }else{
                $("#content-sRubroExperiencia").hide();
            }
        });


        $("#nIdEstudios").trigger("change");

    });



    // Llamadas al servidor 
    function fncGrabarEmpleado(jsnData, fncCallback) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: web_root + 'empleados/fncGrabarEmpleado',
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

</html>