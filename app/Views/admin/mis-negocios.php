<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body data-nrolprospectoadmin="<?= $nRolProspectoAdmin ?>"
>

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">

        <div class="row">


            <main class="main-content col-lg-12 col-md-9 col-sm-12 p-0">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-4">

                    <div class="container">
                        <div class="page-header row no-gutters py-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small">
                                    <div class="card-header border-bottom">
                                        <div class="d-flex align-items-center bd-highlight">
                                            <div class="flex-grow-1 bd-highlight">
                                                <h5 class="m-0">Seleccione su negocio :</h5>
                                            </div>
                                            <div class="bd-highlight">
                                                <button data-toggle="modal" id="btnCrearNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="row" id="list-negocios">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->

    <div class="modal fade" enctype="multipart/form-data" id="formNegocio" tabindex="-1" role="dialog" aria-labelledby="formNegocioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formNegocioLabel">Nuevo Negocio</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                            <div class="row">

                                <div class="col-12 mb-1">
                                    <span class="title-negocio">General</span>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sNombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="sNombre" autocomplete="off" name="sNombre">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="sDireccion" class="col-form-label">Direccion:</label>
                                        <input type="text" class="form-control" id="sDireccion" autocomplete="off" name="sDireccion">
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

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nTipoProspecto" class="col-form-label">Tipo De Prospecto:</label>
                                        <select class="form-control" name="nTipoProspecto" id="nTipoProspecto">
                                            <option value="0">Seleccionnar</option>
                                            <?php foreach ($aryTipoProspectos as $aryTipoProspecto) : ?>
                                                <option value="<?= $aryTipoProspecto['nIdCatalogoTabla'] ?>"><?= $aryTipoProspecto['sDescripcionLargaItem'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nEstado" class="col-form-label">Estado:</label>
                                        <select class="form-control" name="nEstado" id="nEstado">
                                            <option value="1">Activo</option>
                                            <option value="0">Desactivo</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-12 mb-1">
                                    <span class="title-negocio">Controles</span>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Cliente
                                            <a class="edit-controles" data-toggle="modal" data-target="#formCliente"><i class="fas fa-pen"></i></a></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Vendedores <a class="edit-controles" data-toggle="modal" data-target="#formVendedores"><i class="fas fa-pen"></i></a></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Productos o servicios <a class="edit-controles" data-toggle="modal" data-target="#formProductosoServicios"><i class="fas fa-pen"></i></a></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <span>Supervisores <a class="edit-controles" data-toggle="modal" data-target="#formSupervisores"><i class="fas fa-pen"></i></a></span>
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

    <div class="modal fade" id="formCliente" tabindex="-1" role="dialog" aria-labelledby="formClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formClienteLabel">Editar Control cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        

                            <div class="row  ml-content-custom-switch w-100">

                                <?php foreach ($aryConfigClientes as $aryConfigCliente) : ?>
                                    <!-- Ocultamos Tipo de documento y Apellidos -->
                                    <?php  $sClass = in_array($aryConfigCliente['nIdCampoEntidad'], [1, 5]) ? 'd-none' : ''; ?>
                                    <div class="col-12 col-md-6 my-2 <?= $sClass ?>">
                                        <div class="custom-control custom-switch ">
                                            <input type="checkbox" name="aryConfiguracionCliente[]" class="custom-control-input" id="chk<?= $aryConfigCliente['nIdCampoEntidad'] ?>" checked="checked" value="<?= $aryConfigCliente['nIdCampoEntidad'] ?>">
                                            <label class="custom-control-label" for="chk<?= $aryConfigCliente['nIdCampoEntidad'] ?>"><?= $aryConfigCliente['sNombreUsuario'] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach ?>


                            </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formVendedores" tabindex="-1" role="dialog" aria-labelledby="formVendedoresLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formVendedoresLabel">Editar Control Vendedor</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        

                            <div class="row  ml-content-custom-switch w-100">

                                <?php foreach ($aryConfigVendedores as $aryConfigVendedor) : ?>
                                    <?php $sClass = in_array($aryConfigVendedor['nIdCampoEntidad'], [16, 20]) ? 'd-none' : ''; ?>
                                    <div class="col-12 col-md-6 my-2 <?= $sClass ?>">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="aryConfiguracionVendedores[]" class="custom-control-input" id="chk<?= $aryConfigVendedor['nIdCampoEntidad'] ?>" checked="checked" value="<?= $aryConfigVendedor['nIdCampoEntidad'] ?>">
                                            <label class="custom-control-label" for="chk<?= $aryConfigVendedor['nIdCampoEntidad'] ?>"><?= $aryConfigVendedor['sNombreUsuario'] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach ?>


                            </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formProductosoServicios" tabindex="-1" role="dialog" aria-labelledby="formProductosoServiciosLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formProductosoServiciossLabel">Editar Control Productos</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        

                            <div class="row  ml-content-custom-switch w-100">

                                <?php foreach ($aryConfigCatalogos as $aryConfigCatalogo) : ?>
                                    <div class="col-12 col-md-6 my-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="aryConfiguracionCatalogo[]" class="custom-control-input" id="chk<?= $aryConfigCatalogo['nIdCampoEntidad'] ?>" checked="checked" value="<?= $aryConfigCatalogo['nIdCampoEntidad'] ?>">
                                            <label class="custom-control-label" for="chk<?= $aryConfigCatalogo['nIdCampoEntidad'] ?>"><?= $aryConfigCatalogo['sNombreUsuario'] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach ?>


                            </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formSupervisores" tabindex="-1" role="dialog" aria-labelledby="formSupervisoresLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formSupervisoresLabel">Editar Control Supervisor</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    

                            <div class="row  ml-content-custom-switch w-100">

                                <?php foreach ($aryConfigSupervisores as $aryConfigSupervisor) : ?>
                                    <?php $sClass = in_array($aryConfigSupervisor['nIdCampoEntidad'], [28, 31]) ? 'd-none' : ''; ?>
                                    <div class="col-12 col-md-6 my-2 <?= $sClass ?>">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="aryConfiguracionSupervisor[]" class="custom-control-input" id="chk<?= $aryConfigSupervisor['nIdCampoEntidad'] ?>" checked="checked" value="<?= $aryConfigSupervisor['nIdCampoEntidad'] ?>">
                                            <label class="custom-control-label" for="chk<?= $aryConfigSupervisor['nIdCampoEntidad'] ?>"><?= $aryConfigSupervisor['sNombreUsuario'] ?></label>
                                        </div>
                                    </div>
                                <?php endforeach ?>


                            </div>

                    
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formInvitarUsuario" tabindex="-1" role="dialog" aria-labelledby="formInvitarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formInvitarUsuarioLabel">Invitar usuario</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div id="content-nTipoUsuarioInvitar" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="nTipoUsuarioInvitar" class="col-form-label">Tipo de usuario a invitar</label>
                                    <select class="form-control" name="nTipoUsuarioInvitar" id="nTipoUsuarioInvitar">
                                        <option value="1">Existente</option>
                                        <option value="2">Nuevo</option>
                                    </select>
                                </div>
                            </div>


                            <div id="content-nIdUsuario" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="nEstado" class="col-form-label">Usuarios</label>
                                    <select class="form-control" name="nIdUsuario" id="nIdUsuario">
                                 
                                    </select>
                                </div>
                            </div>

                            <div id="content-sCorreoInvitacion" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="sCorreoInvitacion" class="col-form-label">Correo:</label>
                                    <input type="email" class="form-control" id="sCorreoInvitacion" autocomplete="off" name="sCorreoInvitacion">
                                </div>
                            </div>


                            <div id="content-nRol" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="nRol" class="col-form-label">Rol</label>
                                    <select class="form-control" name="nRol" id="nRol">
                                        <option value="2">Visitante</option>
                                        <option value="1">Administrador</option>
                                    </select>
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

<script>
    $(function() {

        // Formulario Negocios 

        // Esta funcion sirve para activar el hijo ejemplo si se activa nombre por ende tambien apellidos y viceversa
        //Clientes
        fncDrawNegocios();

        fncActDescCheck("#chk2","#chk1");
        fncActDescCheck("#chk4","#chk5");
        
        //Vendedores
        fncActDescCheck("#chk17","#chk16");
        fncActDescCheck("#chk19","#chk20");

        //Supervisores
        fncActDescCheck("#chk29","#chk28");
        fncActDescCheck("#chk30","#chk31");

        $("#btnCrearNegocio").on('click', function() {
            fncCleanAll();
            $("#formNegocio").find(".modal-title").html('Nuevo Negocio');
            $("#sNombre").data("nIdRegistro",0);
            $("#formNegocio").modal("show");
        });

        $("#formNegocio").find('form').on('submit', function(event) {
            
            event.preventDefault();

            var nIdRegistro                 = $("#sNombre").data("nIdRegistro");
            var sNombre                     = $("#sNombre").val().trim();
            var sDireccion                  = $("#sDireccion").val().trim();
            var sImagen                     = $("#sImagen")[0].files[0];
            var nTipoProspecto              = $("#nTipoProspecto").val().trim();
            var nEstado                     = $("#nEstado").val();

            var aryConfiguracionCliente     = fncGetAryCampos("input[name='aryConfiguracionCliente[]'");
            var aryConfiguracionCatalogo    = fncGetAryCampos("input[name='aryConfiguracionCatalogo[]'");
            var aryConfiguracionVendedores  = fncGetAryCampos("input[name='aryConfiguracionVendedores[]'");
            var aryConfiguracionSupervisor  = fncGetAryCampos("input[name='aryConfiguracionSupervisor[]'");


            if(sNombre == ''){
                toastr.error('Error. Debe ingresar el nombre del negocio.');
                return false;
            } else if(sDireccion == ''){
                toastr.error('Error. Debe ingresar el nombre del negocio.');
                return false;
            } else if(nTipoProspecto == '0'){
                toastr.error('Error. Debe seleccionar un tipo de prospecto del negocio.');
                return false;
            } 

            console.log(aryConfiguracionCliente);
            var formData = new FormData();
            formData.append('nIdRegistro', nIdRegistro);
            formData.append('sNombre', sNombre);
            formData.append('sDireccion',sDireccion);
            formData.append('sImagen',sImagen);
            formData.append('nTipoProspecto',nTipoProspecto);
            formData.append('nEstado', parseInt( nEstado ));
            formData.append('aryConfiguracionCliente'    , JSON.stringify(aryConfiguracionCliente));
            formData.append('aryConfiguracionCatalogo'   , JSON.stringify(aryConfiguracionCatalogo));
            formData.append('aryConfiguracionVendedores' , JSON.stringify(aryConfiguracionVendedores));
            formData.append('aryConfiguracionSupervisor' , JSON.stringify(aryConfiguracionSupervisor));

            fncGrabarNegocio(formData,function(aryData){
                if(aryData.success){
                    fncCleanAll();
                    fncDrawNegocios();
                    $("#formNegocio").modal("hide");
                    toastr.success(aryData.success);
                }else{
                    toastr.error(aryData.error);
                }
            });

            
        });

        // Fin de Formulario Negocios 

    });

    // Funciones de la tabla o layout Principal 

    function fncEliminarRegistro ( nIdRegistro ) {
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarEliminarRegistro( jsnData , function(aryData){

                if(aryData.success){
                    fncDrawNegocios();
                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncEliminarInvitacion ( nIdNegocio , nIdUsuario ) {
        if(confirm('Esta acción eliminará permanentemente la invitacion y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdNegocio : nIdNegocio,
                nIdUsuario : nIdUsuario
            };

            fncEjecutarEliminarUsuarioNegocio( jsnData , function(aryData){

                if(aryData.success){
                    fncDrawNegocios();
                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncMostrarRegistro(nIdRegistro) {

        $("#sNombre").data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro: nIdRegistro
        };
        console.log(0);

        fncBuscarRegistro(jsnData, function(aryResponse){
            
                if (aryResponse.success) {
                    var aryData = aryResponse.aryData;

                    $("#formNegocio").find(".modal-title").html('Editar Negocio');
                    $("#formNegocio").modal("show");
                
                    $("#sNombre").val(aryData.aryNegocio.sNombre);
                    $("#sDireccion").val(aryData.aryNegocio.sDireccion);
                    $("#nTipoProspecto").val(aryData.aryNegocio.nTipoProspecto);
                    $("#nEstado").val(aryData.aryNegocio.nEstado);
                    $("#sImagen").parent().find(".custom-file-label").html(aryData.aryNegocio.sImagen);

                    console.log(aryData);

                    fncActivarDescbyEntidades(aryData.aryConfigClientes);
                    fncActivarDescbyEntidades(aryData.aryConfigCatalogos);
                    fncActivarDescbyEntidades(aryData.aryConfigVendedores);
                    fncActivarDescbyEntidades(aryData.aryConfigSupervisores);

                } else {
                    toastr.error(aryData.error);
                }
        });

    }



    // Funciones Auxiliares

    function fncDrawNegocios(){
        fncGetNegocios({},function(aryData){
            if(aryData.success){
                var sHtmlTemplate = ``;
                $.each(aryData.aryData,function(nIndex,aryValue){

                    var isAdmin = $("body").data("nrolprospectoadmin") == aryValue.nRol  ? true : false;

                    sHtmlTemplate += `
                                        <figure class="col-md-4 text-center">
                                                    <div class="position-relative contenedor-negocio text-center">
                                                        <a href="${route('admin/home/' + aryValue.nIdNegocio )}">
                                                            <img alt="picture" src="${src( 'multi/' + aryValue.sImagen )}" class="img-fluid img-mis-negocios">
                                                            <!--<div class="overlay">
                                                                <div class="text-overlay"><i class="far fa-arrow-alt-circle-right"></i>
                                                                </div>
                                                            </div>-->
                                                            <figcaption class="figure-caption">${aryValue.sNombre}</figcaption>
                                                        </a>
                                                        <div class="actions-negocio">
                                                          ${isAdmin ? `<a href="javascript:;" onclick="fncInvitarUsario(${aryValue.nIdNegocio},'${aryValue.sNombre}');" title="Editar"><i class="material-icons">person_add</i> </a>` : ``}  
                                                          ${isAdmin ? `<a href="javascript:;" onclick="fncMostrarRegistro(${aryValue.nIdNegocio});" title="Editar"><i class="material-icons">edit</i> </a>` : ``}  
                                                          ${isAdmin ? `<a class="text-danger" href="javascript:;" onclick="fncEliminarRegistro(${aryValue.nIdNegocio});" title="Eliminar"><i class="material-icons">delete</i> </a>` :  ` <a  class="text-danger" href="javascript:;" onclick="fncEliminarInvitacion(${aryValue.nIdNegocio},${aryValue.nIdUsuario});" title="Eliminar Invitacion"><i class="material-icons">delete</i> </a> `}  
                                                        </div>
                                                    </div>
                                        </figure>
                    `;
                });

                $("#list-negocios").html(sHtmlTemplate);
            }
        });
    }


    

    function fncCleanAll(){
        fncClearInputs( $("#formNegocio").find("form") );
        fncClearInputs( $("#formCliente").find("form"), true );
        fncClearInputs( $("#formProductosoServicios").find("form") , true  );
        fncClearInputs( $("#formVendedores").find("form") , true );
        fncClearInputs( $("#formSupervisores").find("form"), true  );
    }

    function fncGetAryCampos(sHtmlTag){
        var ary = [];
        
        $(sHtmlTag).each(function (nIndex, objCheck) {

            ary.push({
                nIdCampoEntidad       : $(objCheck).val() , 
                nEstado               : $(objCheck).is(':checked') ? 1 :0 ,
                nIdConfiguracionCampo : $("#sNombre").data("nIdRegistro") == 0 ? 0 : $(objCheck).data("nIdConfiguracionCampo")
            });

        });

        return ary;
    }

    function fncActDescCheck(sHtmlTagPadre,sHtmlTagHijo){
        $(sHtmlTagPadre).click( function(){
            
            if( $(this).is(':checked') ) {
                $(sHtmlTagHijo).prop('checked', true);         
            } else {
                $(sHtmlTagHijo).prop('checked', false);
            }

        });
    }

    // Esta funcion sirtve cuando se edita y se activa o desactiva los checks
    function fncActivarDescbyEntidades(aryData){
        $.each(aryData,function(nIndex,aryItem){

            var sHtmlTag = '#chk' + aryItem.nIdCampoEntidad;

            if (parseInt(aryItem.nEstado) == 1) {
                $(sHtmlTag).prop('checked', true);         
            } else {
                $(sHtmlTag).prop('checked', false);         
            }

            $(sHtmlTag).data( "nIdConfiguracionCampo" , aryItem.nIdConfiguracionCampo );
       
        });
    }

    // Llamadas al servidor

    function fncGrabarNegocio(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/negocios/fncGrabarNegocio',
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

    function fncGetNegocios(jsnData = {}, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/negocios/fncGetNegocios',
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

    function fncEjecutarEliminarRegistro ( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/negocios/fncEliminarRegistro',
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

    function fncEjecutarEliminarUsuarioNegocio ( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/negocios/fncEliminarUsuarioNegocio',
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


    function fncBuscarRegistro(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'admin/negocios/fncMostrarRegistro',
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


    



</script>


<!-- Invitar Usuario -->
<script>
    $(function() {

        $("#nTipoUsuarioInvitar").on('change',function(){

            if( $(this).find("option:selected").val() == '1' ){
                
                // Existente 
                $("#content-nIdUsuario").show();
                $("#content-sCorreoInvitacion").hide();


            } else {

                // Invitar 
                $("#content-nIdUsuario").hide();
                $("#content-sCorreoInvitacion").show();

            }

        });

        $("#formInvitarUsuario").find('form').on('submit', function(event) {
            
            event.preventDefault();

            var nIdNegocio            = $("#formInvitarUsuario").data("nIdNegocio");
            var sNombre               = $("#formInvitarUsuario").data("sNombre");
            var nTipoUsuarioInvitar   = $("#nTipoUsuarioInvitar").find("option:selected").val();
            var nIdUsuario            = $("#nIdUsuario").find("option:selected").val();
            var sCorreoInvitacion     = $("#sCorreoInvitacion").val().trim();
            var nRol                  = $("#nRol").find("option:selected").val();

        
            if(nTipoUsuarioInvitar == '0'){
                toastr.error('Error. Debe seleccionar un tipo de usuario a invitar . Porfavor verifique');
                return;
            }  

            if(nTipoUsuarioInvitar == '1'){
                
                if(nIdUsuario == '0'){
                    toastr.error('Error. Debe seleccionar un usuario . Porfavor verifique');
                    return;
                }

            } else {

                if(sCorreoInvitacion == ''){
                    toastr.error('Error. Debe ingresar un correo para la invitacion del usuario . Porfavor verifique');
                    return;
                }

            }

            var jsnData = {
                nIdNegocio              : nIdNegocio,
                sNombre                 : sNombre,
                nTipoUsuarioInvitar     : nTipoUsuarioInvitar,
                nIdUsuario              : nIdUsuario,
                sCorreoInvitacion       : sCorreoInvitacion, 
                nRol                    : nRol
            };

            fncProcesarInvitacionNegocio(jsnData,function(aryData){
                
                if(aryData.success){     
                    
                    
                    $("#formInvitarUsuario").modal("hide");
                    toastr.success(aryData.success);
                
                } else {

                    toastr.error(aryData.error);
                
                }

            });

            
        });


    });

    // Funciones de la tabla o layout Principal 

  


    // Funciones Auxiliares

    window.fncDrawUsuariosInvitacion = (jsnData,sHtmlTag) => {
       
        fncGetUsuariosInvitacion(jsnData,(aryData)=>{
            if(aryData.success){
                var aryData = aryData.aryData ;

                var sHtml = ``;

                sHtml += `<option value="0" >Seleccionar</option>`; 

                if ( aryData.length > 0 ){
 
                    aryData.forEach(aryItem => {
                       sHtml += `<option value="${aryItem.nIdUsuario}" >${aryItem.sNombre + ' ' + aryItem.sApellidos}</option>`; 
                    });

                }

                $(sHtmlTag).html(sHtml);

            }else{
                toastr.error(aryData.error);
            }
        });

    }

    window.fncInvitarUsario = (nIdNegocio,sNombreNegocio) => {

        var jsnData = {
            nIdNegocio : nIdNegocio 
        };

        fncDrawUsuariosInvitacion(jsnData,"#nIdUsuario");

        $("#formInvitarUsuario").data("nIdNegocio",nIdNegocio);
        $("#formInvitarUsuario").data("sNombre",sNombreNegocio);

        $("#nTipoUsuarioInvitar").trigger("change");
        $("#formInvitarUsuario").modal("show");
    }

  

    // Llamadas al servidor

    function fncGetUsuariosInvitacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/negocios/fncGetUsuariosInvitacion',
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
    
    function fncProcesarInvitacionNegocio(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/negocios/fncProcesarInvitacionNegocio',
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
<!-- Invitar Usuario -->

</html>