<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body data-nidnegocio="<?= $nIdNegocio ?>">

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['admin/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-4">
                    <!-- Tu contenido -->

              
                    <div class="container">
                        <div class="page-header row no-gutters py-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small">
                                    <div class="card-header border-bottom">
                                        <div class="d-flex align-items-center bd-highlight">
                                            <div class="flex-grow-1 bd-highlight">
                                                <h5 class="m-0">Prospectos :</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4 px-4">
                                        <!-- Tu contenido  --->

                                        <div class="row ">
                                            <div class="col-md-6 col-12 border-right">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="d-flex align-items-center bd-highlight">
                                                            <div class="flex-grow-1 bd-highlight">
                                                                <h4>Configuracion del formulario prospecto </h4>
                                                            </div>
                                                            <div class="bd-highlight">
                                                                <button data-toggle="modal" data-target="#formInputProspecto" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                    <i class="fas fa-plus-circle"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row  ml-content-custom-switch w-100">

                                                        <div class="col-12 col-md-6 my-2">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitches0">
                                                                <label class="custom-control-label" for="customSwitches0">Clientes</label>
                                                                <span>
                                                                    <a href="javascript:;" data-toggle="modal" data-target="#formClientes" title="Editar"><i class="material-icons">edit</i> </a>
                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="col-12 col-md-6 my-2">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitches1">
                                                                <label class="custom-control-label" for="customSwitches1">Productos o servicios</label>
                                                                <span>
                                                                    <a href="javascript:;" data-toggle="modal" data-target="#formProductos" title="Editar"><i class="material-icons">edit</i> </a>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6 my-2">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitches3">
                                                                <label class="custom-control-label" for="customSwitches3">Competencia
                                                                    <span>
                                                                        <a href="javascript:;" data-toggle="modal" data-target="#formCompentencia" title="Editar"><i class="material-icons">edit</i> </a>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6 my-2">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitches4">
                                                                <label class="custom-control-label" for="customSwitches4">Segmentacion
                                                                    <span>
                                                                        <a href="javascript:;" title="Editar"><i class="material-icons">edit</i> </a>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-6 my-2">
                                                            <!-- Default switch -->
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitches5">
                                                                <label class="custom-control-label" for="customSwitches5">Notas</label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <div id="sortable" class="col-12 col-md-6">

                                                <div class="my-2 p-2 border-card">
                                                    <div class="d-flex align-items-center bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <h6 class="m-0">Cliente</h6>
                                                        </div>
                                                        <div class="bd-highlight">
                                                            <button data-toggle="modal" data-target="#formNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                <i class="material-icons">open_with</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="my-2 p-2 border-card">
                                                    <div class="d-flex align-items-center bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <h6 class="m-0">Productos o servicios</h6>
                                                        </div>
                                                        <div class="bd-highlight">
                                                            <button data-toggle="modal" data-target="#formNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                <i class="material-icons">open_with</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="my-2 p-2 border-card">
                                                    <div class="d-flex align-items-center bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <h6 class="m-0">Competencia</h6>
                                                        </div>
                                                        <div class="bd-highlight">
                                                            <button data-toggle="modal" data-target="#formNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                <i class="material-icons">open_with</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="my-2 p-2 border-card">
                                                    <div class="d-flex align-items-center bd-highlight">
                                                        <div class="flex-grow-1 bd-highlight">
                                                            <h6 class="m-0">Segmentacion</h6>
                                                        </div>
                                                        <div class="bd-highlight">
                                                            <button data-toggle="modal" data-target="#formNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                <i class="material-icons">open_with</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-md-12 my-4 text-center">
                                                <button type="button" class="btn btn-gradient-primary btn-fw">Guardar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fin de tu contenido  --->

                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->

    <div class="modal fade" id="formCompentencia" tabindex="-1" role="dialog" aria-labelledby="formCompentenciaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formCompentenciaLabel">Nueva Competencia</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-gradient-primary button-form-control">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <table data-toggle="table" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre</th>
                                        <th>Valores</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 3; $i++) : ?>
                                        <tr>
                                            <td>
                                                <div class="content-acciones">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#formValorCompentencia" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                                    <a href="javascript:;" title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                                    <a href="javascript:;" title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                                </div>
                                            </td>
                                            <td>Competencia <?= $i ?></td>
                                            <td>
                                                <span class="w-100"> Valor1 </span> <br>
                                                <span class="w-100"> Valor2 </span> <br>
                                            </td>
                                        </tr>
                                    <?php endfor ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formValorCompentencia" tabindex="-1" role="dialog" aria-labelledby="formValorCompentenciaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formValorCompentenciaLabel">Nueva valor de competencia</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-gradient-primary button-form-control">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <table data-toggle="table" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 3; $i++) : ?>
                                        <tr>
                                            <td>
                                                <div class="content-acciones">
                                                    <a href="javascript:;" title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                                    <a href="javascript:;" title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                                </div>
                                            </td>
                                            <td>Valor de competencia <?= $i ?></td>
                                        </tr>
                                    <?php endfor ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formInputProspecto" tabindex="-1" role="dialog" aria-labelledby="formInputProspectoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formInputProspectoLabel">Nueva Campo</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tipo:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Texto</option>
                                        <option value="">Combo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Nombre:</label>
                                    <input type="text" name="" class="form-control" id="">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Valores:</label>
                                    <input type="text" name="" class="form-control" id="">
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Requerido:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Si</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12 col-12 text-right">
                                <div class="form-group">
                                    <button type="button" class="btn btn-gradient-primary button-form-control">Guardar</button>
                                </div>
                            </div>





                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formClientes" tabindex="-1" role="dialog" aria-labelledby="formClientesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formClientesLabel">Mantenimiento </h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <h5 class="m-0">Clientes :</h5>
                                </div>
                                <div class="bd-highlight">
                                    <button id="btnCrearCliente" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table data-toggle="table" id="tblClientes" data-url="<?= route('admin/cliente/fncPopulate/'.$nIdNegocio) ?>" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th data-field="sAcciones" data-sortable="true">Acciones</th>
                                        <?php if(is_array($aryCamposClientes) && count($aryCamposClientes) > 0) : ?>
                                            <?php foreach($aryCamposClientes as $aryCamposCliente): ?>
                                                <th data-field="<?= $aryCamposCliente['sNombre']?>" data-sortable="true"><?= $aryCamposCliente['sNombreUsuario'] ?></th>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formCECliente" tabindex="-1" role="dialog" aria-labelledby="formCEClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formCEClienteLabel">Nuevo Cliente</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a href="javascript:;" class="nav-item nav-link tab-form-custom active" id="btnViewFormEmpresa">Empresa</a>
                                <a href="javascript:;" class="nav-item nav-link tab-form-custom" id="btnViewFormPersona">Persona</a>
                            </div>
                        </nav>
                        <div class="w-100">
                            <div id="formCliente" class="row">
                                 
                            </div>  
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formProductos" tabindex="-1" role="dialog" aria-labelledby="formProductosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formProductosLabel"> Mantenimiento </h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <h5 class="m-0">Productos o servicios :</h5>
                                </div>
                                <div class="bd-highlight">
                                    <button id="btnCrearCatalogo" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <table data-toggle="table" data-url="<?= route('admin/catalogo/fncPopulate/'.$nIdNegocio) ?>" id="tblCatalogo" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th data-field="sAcciones" data-sortable="true">Acciones</th>
                                        <?php if(is_array($aryCamposCatalogo) && count($aryCamposCatalogo) > 0) : ?>
                                            <?php foreach($aryCamposCatalogo as $aryCampoCatalogo): ?>
                                                <th data-field="<?= $aryCampoCatalogo['sNombre']?>" data-sortable="true"><?= $aryCampoCatalogo['sNombreUsuario'] ?></th>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>

                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formCEProducto" tabindex="-1" role="dialog" aria-labelledby="formCEProductoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formCEProductoLabel">Nuevo Producto o Servicio</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="formProducto" class="row">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Fin de modales -->




</body>



<?php extend_view(['admin/common/scripts'], $data) ?>

<script>
    // Se pone asi para que no se repitan los ids 
    var sEntidadCliente  = '-1';
    var sEntidadCatalogo = '-2';

    $(function() {

        // Formulario Cliente

        $("#btnCrearCliente").on('click',function(){
            fncCleanAll();
            $("#formCECliente").find(".modal-title").html("Nuevo Cliente");
            $("#nTipoDocumento-1").data("nIdRegistro",0);
            $("#btnViewFormEmpresa").trigger("click");
            $("#formCECliente").modal("show");
        });

        fncDrawCliente(function(bStatus){
            if(bStatus){
                // El formulario de clientes ya cargo
                $("#btnViewFormEmpresa").on('click',function(){

                    $("#nTipoDocumento"+sEntidadCliente).data( "sForm" , "EMPRESA" );

                    fncCleanAll();
                    
                    $(this).addClass("active");
                    $("#btnViewFormPersona").removeClass("active");

                    $("#content-sCorreo-1").removeClass("col-md-6");
                    $("#content-sCorreo-1").addClass("col-md-12");

                    // Mostrar Controles del formulario de empresa 65 - RUC
                    $("#nTipoDocumento-1").val(65).trigger("change");
                    
                    // Visualizar controles 
                    $("#content-sContacto-1").show();
                    $("#content-nIdRelacionamiento-1").show();

                });

                $("#btnViewFormPersona").on('click',function(){
                    
                    fncCleanAll();
                    $("#nTipoDocumento" + sEntidadCliente).data( "sForm" , "PERSONA" );

                    $(this).addClass("active");
                    $("#btnViewFormEmpresa").removeClass("active");

                    $("#content-sCorreo-1").removeClass("col-md-12");
                    $("#content-sCorreo-1").addClass("col-md-6");

                    // Mostrar Controles del formulario de empresa 63 - DNI
                    $("#nTipoDocumento-1").val(63).trigger("change");

                    // Ocultar controles 
                    $("#content-sContacto-1").hide();
                    $("#content-nIdRelacionamiento-1").hide();

                });

                // Evento Dtp
                $("#nIdDepartamento-1").on('change',function(){
                    var jsnData = {
                        nIdDepartamento : $(this).val()
                    };

                    fncDrawProvincia("#nIdProvincia-1" , jsnData , null);
                });

                $("#nIdProvincia-1").on('change',function(){
                    var jsnData = {
                        nIdProvincia : $(this).val()
                    };
                    fncDrawDistrito("#nIdDistrito-1" , jsnData , null);
                });

                $("#nTipoDocumento-1").change(function() {
                    if( $(this).val() > 0 ) {
                        fncMaxLengthTypeDocument( $(this).find('option:selected').text().trim().toUpperCase() , "#sNumeroDocumento-1" );
                    }
                });

                $("#sNumeroDocumento-1").on('keyup keypress blur change',function(){
                    
                    switch( $("#nTipoDocumento-1").find("option:selected").text() ){
                        
                        case 'RUC':

                            if( $("#sNumeroDocumento-1").val().length  == 11 ){
                                // Lanzamos el evento
                            }

                        break;
                        
                        case 'DNI':
                            if( $("#sNumeroDocumento-1").val().length  == 7 || $("#sNumeroDocumento-1").val().length  == 8 ){
                                // Lanzamos el evento

                            }
                        break;

                    }
                  
                    
                });

            }
        });

        // Submit del formulario de Cliente
        $("#formCECliente").find(".btn-submit").on('click',function(){

            var nIdRegistro            = $("#nTipoDocumento" + sEntidadCliente ).data("nIdRegistro");
            var nIdNegocio             = $("body").data("nidnegocio");
            var sForm                  = $("#nTipoDocumento" + sEntidadCliente ).data("sForm");
            var nTipoDocumento         = $("#nTipoDocumento" + sEntidadCliente )
            var sNumeroDocumento       = $("#sNumeroDocumento" + sEntidadCliente );
            var sNombreoRazonSocial    = $("#sNombreoRazonSocial"  + sEntidadCliente);
            var sContacto              = $("#sContacto"  + sEntidadCliente);
            var sCorreo                = $("#sCorreo"  + sEntidadCliente);
            var nIdDepartamento        = $("#nIdDepartamento"  + sEntidadCliente);
            var nIdProvincia           = $("#nIdProvincia"  + sEntidadCliente);
            var nIdDistrito            = $("#nIdDistrito"  + sEntidadCliente);
            var nIdRelacionamiento     = $("#nIdRelacionamiento"  + sEntidadCliente);
            var sTelefono              = $("#sTelefono"  + sEntidadCliente);
            var nEstado                = $("#nEstado"  + sEntidadCliente);
            var nTipoCliente           = sForm == 'EMPRESA' ? 1 : 2;

            
            if (nTipoDocumento.length > 0 && nTipoDocumento.val() == '') {
                toastr.error('Error. Seleccione un tipo de documento. Porfavor verifique');
                return;
            } else if (sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '') {
                toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
                return;
            } else if (sNombreoRazonSocial.length > 0 && sNombreoRazonSocial.val() == '') {
                toastr.error('Error. Ingrese un nombre o razon social. Porfavor verifique');
                return;
            }  else if (sCorreo.length > 0 && sCorreo.val() == '') {
                toastr.error('Error. Ingrese un correo. Porfavor verifique');
                return;
            } else if (nIdDepartamento.length > 0 && nIdDepartamento.val() == '0') {
                toastr.error('Error. Seleccione un departamento. Porfavor verifique');
                return;
            } else if (nIdProvincia.length > 0 && nIdProvincia.val() == '0') {
                toastr.error('Error. Seleccione una provincia. Porfavor verifique');
                return;
            } else if (nIdDistrito.length > 0 && nIdDistrito.val() == '0') {
                toastr.error('Error. Seleccione un distrito. Porfavor verifique');
                return;
            } else if (sTelefono.length > 0 && sTelefono.val() == '') {
                toastr.error('Error. Ingrese un telefono. Porfavor verifique');
                return;
            }  

            if (sForm == 'EMPRESA') {
                if (sContacto.length > 0 && sContacto.val() == '') {
                    toastr.error('Error. Ingrese un contacto. Porfavor verifique');
                    return;
                } else if (nIdRelacionamiento.length > 0 && nIdRelacionamiento.val() == '0') {
                    toastr.error('Error. Seleccione un relacionamiento. Porfavor verifique');
                    return;
                } 
            }


            var jsnData = {
                nIdRegistro              : nIdRegistro,
                nIdNegocio               : nIdNegocio,
                nTipoCliente             : nTipoCliente,
                nTipoDocumento           : nTipoDocumento.length > 0 ? nTipoDocumento.val() : null,
                sNumeroDocumento         : sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : null,
                sNombreoRazonSocial      : sNombreoRazonSocial.length > 0 ? sNombreoRazonSocial.val() : null,
                sCorreo                  : sCorreo.length > 0 ? sCorreo.val() : null,
                nIdDepartamento          : nIdDepartamento.length > 0 ? nIdDepartamento.val() : null,
                nIdProvincia             : nIdProvincia.length > 0 ? nIdProvincia.val() : null,
                nIdDistrito              : nIdDistrito.length > 0 ? nIdDistrito.val() : null,
                sTelefono                : sTelefono.length > 0 ? sTelefono.val() : null,
                nIdRelacionamiento       : nIdRelacionamiento.length > 0 ? nIdRelacionamiento.val() : null,
                sContacto                : sContacto.length > 0 ? sContacto.val() : null,
                nEstado                  : nEstado.length > 0 ? nEstado.val() : null,
            };

            fncGrabarCliente(jsnData, function(aryData){
                if(aryData.success){
                    fncCleanAll();
                    $("#formCECliente").modal("hide");
                    $("#tblClientes").bootstrapTable('refresh');
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });

        // Fin de formulario cliente



        // Formulario Catalogo
        fncDrawCatalogo(function(bStatus){
            if(bStatus){
                // Ya se cargo el formulario
            }
        });

        $("#btnCrearCatalogo").on('click',function(){
            
            // Limpiamso los inputs del formulario 
            fncCleanAll();

            // Ponemos el titulo y removemos el disabled de los inputs en caso tuvieran
            $("#formCEProducto").find(".modal-dialog").find(".modal-title").html('Nuevo Producto o Servicio');

            $("#sNombre" + sEntidadCatalogo).data("nIdRegistro",0);
            $("#formCEProducto").modal("show");
            
        });

        // Submit del formulario de catalogo (Productos o servicios)
        $("#formCEProducto").find(".btn-submit").on('click',function(){


            var nIdRegistro   = $("#sNombre" + sEntidadCatalogo ).data("nIdRegistro");
            var nIdNegocio    = $("body").data("nidnegocio");
            var sNombre       = $("#sNombre"  + sEntidadCatalogo);
            var nTipoItem     = $("#nTipoItem" + sEntidadCatalogo);
            var nPrecio       = $("#nPrecio"  + sEntidadCatalogo );
            var sDescripcion  = $("#sDescripcion" + sEntidadCatalogo);
            var nEstado       = $("#nEstado" + sEntidadCatalogo);

            if (sNombre.length > 0 && sNombre.val() == '') {
                toastr.error('Error. Ingrese un nombre de item. Porfavor verifique');
                return;
            } else if (nTipoItem.length > 0 && nTipoItem.val() == '0') {
                toastr.error('Error. Seleccione un tipo de item. Porfavor verifique');
                return;
            } else if (nPrecio.length > 0 && (nPrecio.val() == ''  || nPrecio.val() == '0' )) {
                toastr.error('Error. Ingrese un precio de item. Porfavor verifique');
                return;
            } 


            var jsnData = {
                nIdRegistro   : nIdRegistro,
                nIdNegocio    : nIdNegocio,
                sNombre       : sNombre.length > 0 ? sNombre.val() : null,
                nTipoItem     : nTipoItem.length > 0 ? nTipoItem.val() : null,
                nPrecio       : nPrecio.length > 0 ? nPrecio.val() : null,
                sDescripcion  : sDescripcion.length > 0 ? sDescripcion.val() : null,
                nEstado       : nEstado.length > 0 ? nEstado.val() : null,
            };

            fncGrabarCatalogo(jsnData, function(aryData){
                if(aryData.success){
                    fncCleanAll();
                    $("#formCEProducto").modal("hide");
                    $("#tblCatalogo").bootstrapTable('refresh');
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });

        // Fin de formulario catalogo





        $("#sortable").sortable();
    });

 
    function fncCleanAll(){

        fncClearInputs($("#formCEProducto").find("form"));
        fncRemoveDisabled("#formCEProducto");

        fncClearInputs($("#formCECliente").find("form"));
        fncRemoveDisabled("#formCECliente");
    }

    // Funciones de la tabla Catalogo

    function fncEliminarCatalogo(nIdRegistro) {
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarEliminarCatalogo( jsnData , function(aryData){

                if(aryData.success){
                    $("#tblCatalogo").bootstrapTable('refresh');
                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncMostrarCatalogo(nIdRegistro , sOpcion ) {

        $( "#sNombre" + sEntidadCatalogo ).data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro: nIdRegistro
        };

        fncBuscarRegistroCatalogo(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var aryData = aryResponse.aryData;

                    $("#sNombre" + sEntidadCatalogo ).val(aryData.sNombre);
                    $("#nTipoItem" + sEntidadCatalogo ).val(aryData.nTipoItem);
                    $("#nPrecio" + sEntidadCatalogo ).val(aryData.nPrecio);
                    $("#nEstado" + sEntidadCatalogo ).val(aryData.nEstado);
                    $("#sDescripcion" + sEntidadCatalogo ).val(aryData.sDescripcion);

                    if(sOpcion == 'ver'){
                        fncViewForm("#formCEProducto" , "Ver Producto o Servicio");
                    } else {
                        fncEditForm("#formCEProducto" , "Editar Producto o Servicio");
                    }

                    $("#formCEProducto").modal("show");


                } else {
                    toastr.error(aryData.error);
                }
        });

    }

    function fncDrawCatalogo(fncCallback) {

        var jsnData = {
            nIdEntidad : 2,
            nIdNegocio : $('body').data('nidnegocio')
        };

        fncObtenerDataForm(jsnData,function(aryData){
            $("#formProducto").html(fncBuildForm(aryData));
            fncCallback(true);
        });

    }

    // Fin de tabla catalogo





    // Funciones de la tabla Cliente

    function fncEliminarCliente(nIdRegistro) {
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarEliminarCliente( jsnData , function(aryData){

                if(aryData.success){
                    $("#tblClientes").bootstrapTable('refresh');
                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncMostrarCliente(nIdRegistro , sOpcion ) {

        $( "#nTipoDocumento" + sEntidadCliente ).data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro: nIdRegistro
        };

        fncBuscarRegistroCliente(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var aryData = aryResponse.aryData;

                    if( aryData.nTipoCliente == 1 ){
                        $("#btnViewFormEmpresa").trigger("click");
                    } else {
                        $("#btnViewFormEmpresa").trigger("click");
                    }

                    $("#nTipoDocumento" + sEntidadCliente ).val(aryData.nTipoDocumento);
                    $("#sNumeroDocumento" + sEntidadCliente ).val(aryData.sNumeroDocumento);
                    $("#sNombreoRazonSocial" + sEntidadCliente ).val(aryData.sNombreoRazonSocial);
                    $("#sContacto" + sEntidadCliente ).val(aryData.sContacto);
                    $("#sCorreo" + sEntidadCliente ).val(aryData.sCorreo);

                    $("#nIdDepartamento" + sEntidadCliente ).val(aryData.nIdDepartamento);

                    var jsnData = { nIdDepartamento : aryData.nIdDepartamento};
                    fncDrawProvincia( "#nIdProvincia" + sEntidadCliente  , jsnData , aryData.nIdProvincia);

                    var jsnData = { nIdProvincia : aryData.nIdProvincia};
                    fncDrawDistrito(  "#nIdDistrito" + sEntidadCliente  , jsnData , aryData.nIdDistrito);

                    $("#nIdRelacionamiento" + sEntidadCliente ).val(aryData.nIdRelacionamiento);
                    $("#sTelefono" + sEntidadCliente ).val(aryData.sTelefono);
                    $("#nEstado" + sEntidadCliente ).val(aryData.nEstado);

                    if(sOpcion == 'ver'){
                        fncViewForm("#formCECliente" , "Ver Cliente");
                    } else {
                        fncEditForm("#formCECliente" , "Editar Cliente");
                    }

            
                    $("#formCECliente").modal("show");

                } else {
                    toastr.error(aryData.error);
                }
        });

    }

    function fncDrawCliente(fncCallback) {

        var jsnData = {
            nIdEntidad : 1,
            nIdNegocio : $('body').data('nidnegocio')
        };

        fncObtenerDataForm(jsnData,function(aryData){
            $("#formCliente").html(fncBuildForm(aryData));
            fncCallback(true);
        });

    }

    function fncDrawProvincia(sHtmlTag , jsnData , nIdProvincia = null){
        
        fncObtenerProvincias(jsnData,function(aryData){

            let sOptions = ``;
            
            if(aryData.success){
                
                sOptions += `<option value="0">SELECCIONAR</option>`;
                
                aryData.aryData.forEach(aryElement => {
                    sOptions += `<option value="${aryElement.nIdProvincia}">${aryElement.sNombre}</option>`;
                });
            
                $(sHtmlTag).html(sOptions);

                if(nIdProvincia != null){
                    $(sHtmlTag).val(nIdProvincia);
                }
            }

        });

    }

    function fncDrawDistrito(sHtmlTag , jsnData , nIdDistrito = null){
        
        fncObtenerDistrito(jsnData,function(aryData){
            
            let sOptions = ``;
            
            if(aryData.success){
                
                sOptions += `<option value="0">SELECCIONAR</option>`;
                
                aryData.aryData.forEach(aryElement => {
                    sOptions += `<option value="${aryElement.nIdDistrito}">${aryElement.sNombre}</option>`;
                });
            
                $(sHtmlTag).html(sOptions);

                if(nIdDistrito != null){
                    $(sHtmlTag).val(nIdDistrito);
                }
            }

        });

    }

    // Fin de tabla cliente



    // llamadas al servidor 

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

    function fncObtenerProvincias(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'ubigeo/fncObtenerProvincias',
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

    function fncObtenerDistrito(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'ubigeo/fncObtenerDistrito',
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


    // Catalogo 

    function fncGrabarCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/catalogo/fncGrabarCatalogo',
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

    function fncBuscarRegistroCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'admin/catalogo/fncMostrarRegistro',
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

    function fncEjecutarEliminarCatalogo( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/catalogo/fncEliminarRegistro',
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

    // Fin de catalogo 


    // Cliente 

    function fncGrabarCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncGrabarCliente',
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

    function fncBuscarRegistroCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'admin/cliente/fncMostrarRegistro',
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

    function fncEjecutarEliminarCliente( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/cliente/fncEliminarRegistro',
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

    // Fin de cliente 

    // Fin de llamadas al servidor 


  


</script>

</html>