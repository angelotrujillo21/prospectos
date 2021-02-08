<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body data-nidnegocio="<?= $nIdNegocio ?>"
      data-nrol="<?=$user["nRol"]?>"
      data-nrolprospectoadmin = "<?=$nRolProspectoAdmin?>"
>

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
                                                                <button id="btnCrearWidgetProspecto" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                                    <i class="fas fa-plus-circle"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="content-controles-prospecto" class="row  ml-content-custom-switch w-100">
                                                    </div>

                                                </div>
                                            </div>

                                            <div id="sortable" class="col-12 col-md-6">   
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

    <div class="modal fade" id="formSegmentacion" tabindex="-1" role="dialog" aria-labelledby="formSegmentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formCompentenciaLabel">Mantenimiento</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <h5 id="title-segmentacion" class="m-0"> Compentencia : </h5>
                                </div>
                                <div class="bd-highlight">
                                    <button id="btnCrearSegmentacion" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table id="tblSegmentacion" data-toggle="table" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th data-field="sAcciones" data-sortable="true">Acciones</th>
                                        <th data-field="sNombre" data-sortable="true">Nombre</th>
                                        <th data-field="sValores" data-sortable="true">Valores</th>
                                        <th data-field="nEstado" data-sortable="true">Estado</th>
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

    <div class="modal fade" id="formCESegmentacion" tabindex="-1" role="dialog" aria-labelledby="formCESegmentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCESegmentacionLabel">Nueva Compentecia</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="sNombreSegmentacion" class="col-form-label">Nombre</label>
                                            <input type="text" autocomplete="off" placeholder="" class="form-control" name="sNombreSegmentacion" id="sNombreSegmentacion">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="nEstadoSegmentacion" class="col-form-label">Estado</label>
                                            <select class="form-control" name="nEstadoSegmentacion" id="nEstadoSegmentacion">
                                                <option value="1">ACTIVO</option>
                                                <option value="0">DESACTIVO</option>
                                            </select>
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

    <div class="modal fade" id="formDetalleSegmentacion" tabindex="-1" role="dialog" aria-labelledby="formDetalleSegmentacionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formDetalleSegmentacionLabel">Nueva valor de competencia</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="col-12">
                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <h5 id="title-item-segmentacion" class="m-0"> Item Segmentacion : </h5>
                                </div>
                                <div class="bd-highlight">
                                    <button id="btnCrearItemSegmentacion" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-12">
                            <table id="tblDetalleSegmentacion" data-toggle="table" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th id="sAccionesDetalleSeg" data-field="sAcciones" data-sortable="true">Acciones</th>
                                        <th data-field="sNombre" data-sortable="true">Nombre</th>
                                        <th data-field="nEstado" data-sortable="true">Estado</th>
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

    <div class="modal fade" id="formInputProspecto" tabindex="-1" role="dialog" aria-labelledby="formInputProspectoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formInputProspectoLabel">Nueva Campo</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row">

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Tipo:</label>
                                        <select class="form-control" name="nTipoCampo" id="nTipoCampo">
                                            <option value="0">Seleccionar</option>
                                            <?php if(is_array($aryTipoCampos) && count($aryTipoCampos)>0 ): ?>
                                                <?php foreach($aryTipoCampos as $aryTipoCampo) : ?>
                                                    <option value="<?= $aryTipoCampo["nTipoCampo"] ?>"><?= $aryTipoCampo["sNombreUsuario"] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="sNombreWidget" class="col-form-label">Nombre:</label>
                                        <input type="text" name="sNombreWidget" class="form-control" id="sNombreWidget">
                                    </div>
                                </div>


                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="nRequerido" class="col-form-label">Requerido:</label>
                                        <select class="form-control" name="nRequerido" id="nRequerido">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="content-sValores" class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="sValores" class="col-form-label">Valores:</label>
                                        <input type="text" placeholder="valor1,valor2,valor3" name="sValores" class="form-control" id="sValores">
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
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEClienteLabel">Nuevo Cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
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
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
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
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEProductoLabel">Nuevo Producto o Servicio</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div id="formProducto" class="row">

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
    // Se pone asi para que no se repitan los ids 
    var sEntidadCliente  = '-1';
    var sEntidadCatalogo = '-2';

    $(function() {
        fncValidarRol();
        // Prospecto 
        fncEventListenerShowMoreLess();
        fncDrawProspecto();

      

        $("#nTipoCampo").on('change',function(){
            switch($(this).val()){
                case '2':
                case '3':
                    $("#content-sValores").show();
                break;
                default:
                    $("#content-sValores").hide();
                break;
            }
        });

        $("#btnCrearWidgetProspecto").on('click',function(){
            fncCleanAll();
            $("#nTipoCampo").trigger("change");
            $("#formInputProspecto").find(".modal-title").html("Nuevo Campo");
            $("#nTipoCampo").data("nIdRegistro",0);
            $("#formInputProspecto").modal("show");
        });


        $("#formInputProspecto").find("form").on('submit',function(event){
            event.preventDefault();

            var nIdRegistro  = $("#nTipoCampo").data("nIdRegistro");
            var nTipoCampo   = $("#nTipoCampo").val();
            var sNombre      = $("#sNombreWidget").val();
            var nRequerido   = $("#nRequerido").val();
            var sValores     = $("#sValores").val();
            var nIdNegocio   = $("body").data("nidnegocio");
            var nTipoWidget  = 2;
            var nDefault     = 0;


            if (nTipoCampo == '0'){
                toastr.error('Error. Ingrese un tipo de campo . Porfavor verifique');
                return;
            } else if (sNombre == '') {
                toastr.error('Error. Ingrese un nombre . Porfavor verifique');
                return;
            }


            if (nTipoCampo == '2' || nTipoCampo == '3') {
                if(sValores == ''){
                    toastr.error('Error. Ingrese los valores . Porfavor verifique');
                    return;
                }
            } 

            var jsnData = {
                nIdRegistro : nIdRegistro,
                nIdNegocio  : nIdNegocio,
                nTipoCampo  : nTipoCampo,
                sNombre     : sNombre,
                nRequerido  : nRequerido,
                nTipoWidget : nTipoWidget,
                nDefault    : nDefault,
                sValores    : sValores,
                nEstado     : nIdRegistro == 0 ? 1 : $("#content-orden-"+nIdRegistro).data("nestado")
            };

            fncGrabarWidgetProspecto(jsnData,function(aryData){
                if(aryData.success){
                    $("#formInputProspecto").modal("hide");
                    fncDrawProspecto();
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

            
        });

     

        $("#nTipoCampo").trigger("change");

        // Fin de prospecto

        // Formulario Segmentaicon
        // Data Default
        $("#formCESegmentacion").data("sEntidad","SEGMENTACION");

      
        $("#btnCrearSegmentacion").on('click',function(){
            fncCleanAll();
            $("#formCESegmentacion").find(".modal-title").html("Nueva " + ($("#tblSegmentacion").data("nTipoSegmento") == '1' ? 'Segmentacion' : 'Competencia'));
            $("#sNombreSegmentacion").data("nIdRegistro",0);
            $("#formCESegmentacion").modal("show");
        });

        $("#btnCrearItemSegmentacion").on('click',function(){
            fncCleanAll();
            $("#formCESegmentacion").find(".modal-title").html("Nuevo Item");
            $("#sNombreSegmentacion").data("nIdRegistro",0);
            $("#formCESegmentacion").modal("show");
        });

        // Submit del formulario 
        $("#formCESegmentacion").find("form").on('submit',function(event){
                event.preventDefault();

                var nIdRegistro            = $("#sNombreSegmentacion").data("nIdRegistro");
                var nIdNegocio             = $("body").data("nidnegocio");
                var nTipoSegmento          = $("#tblSegmentacion").data("nTipoSegmento");
                var sNombreSegmentacion    = $("#sNombreSegmentacion");               
                var nEstado                = $("#nEstadoSegmentacion");
                var sTable                 = nTipoSegmento == '1' ? 'segmentacion' : 'competencia';
                var sEntidad               = $("#formCESegmentacion").data("sEntidad");

                if (sNombreSegmentacion.length > 0 && sNombreSegmentacion.val() == '') {
                    toastr.error('Error. Ingrese un nombre de '+ sTable +'. Porfavor verifique');
                    return;
                } 

                      
                var jsnData = {
                        nIdRegistro     : nIdRegistro,
                        nIdNegocio      : nIdNegocio,
                        nTipoSegmento   : nTipoSegmento,
                        nIdSegmentacion : sEntidad == 'SEGMENTACION'  ? null : $( "#tblSegmentacion").data("nIdSegmentacion"), 
                        sNombre         : sNombreSegmentacion.length > 0 ? sNombreSegmentacion.val() : null,
                        nEstado         : nEstado.length > 0 ? nEstado.val() : null,
                };

                
                if(sEntidad == 'SEGMENTACION'){

                    fncGrabarSegmentacion(jsnData, function(aryData){
                        if(aryData.success){
                            
                            fncCleanAll();
                            
                            $("#formCESegmentacion").modal("hide");

                            var jsnData = {
                                nIdNegocio    : nIdNegocio,
                                nTipoSegmento : nTipoSegmento
                            };
                
                            fncPopulateSegmentacion(jsnData,function(aryDataSeg){
                                $("#tblSegmentacion").bootstrapTable("load" , aryDataSeg);
                            });

                            toastr.success(aryData.success);
                        } else {
                            toastr.error(aryData.error);
                        }
                    });

                } else {

                    fncGrabarDetalleSegmentacion(jsnData, function(aryData){
                        if(aryData.success){
                            
                            fncCleanAll();
                            
                            $("#formCESegmentacion").modal("hide");
                            
                            var jsnData = {
                                nIdSegmentacion : $("#tblSegmentacion").data("nIdSegmentacion")
                            };
                            
                            fncPopulateDetalleSegmentacion(jsnData,function(aryDataSeg){
                                $("#tblDetalleSegmentacion").bootstrapTable("load" , aryDataSeg);
                            });
                            
                            var jsnData = {
                                nIdNegocio    : nIdNegocio,
                                nTipoSegmento : nTipoSegmento
                            };
                
                            fncPopulateSegmentacion(jsnData,function(aryDataSeg){
                                $("#tblSegmentacion").bootstrapTable("load" , aryDataSeg);
                            });

                            toastr.success(aryData.success);

                        } else {
                            toastr.error(aryData.error);
                        }
                    });

                }
        });


        $('#formDetalleSegmentacion').on('hidden.bs.modal', function () {
           
            $("#formCESegmentacion").data("sEntidad","SEGMENTACION");  
           
            var jsnData = {
                nIdNegocio    : $("body").data("nidnegocio"),
                nTipoSegmento : $("#tblSegmentacion").data("nTipoSegmento")
            };

           fncPopulateSegmentacion(jsnData,function(aryDataSeg){
               $("#tblSegmentacion").bootstrapTable("load" , aryDataSeg);
           });

        });

        // Fin de formulario competencia


        // Formulario Cliente

        $("#btnCrearCliente").on('click',function(){
            fncCleanAll();
            $("#formCECliente").find(".modal-title").html("Nuevo Cliente");
            $("#formCECliente").data("nIdRegistro",0);
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

                $("#sNumeroDocumento-1").on('keyup change',function(){
                    
                    switch( $("#nTipoDocumento-1").find("option:selected").text() ){
                        
                        case 'RUC':

                            if( $("#sNumeroDocumento-1").val().length  == 11 ){
                                 
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "ruc",
                                    sNumeroDoc   : $("#sNumeroDocumento-1").val()
                                };

                                fncBuscarDocument( jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombreoRazonSocial-1").val(aryData.success.razonSocial);
                                    }
                                });

                            }

                        break;
                        
                        case 'DNI':
                            if( $("#sNumeroDocumento-1").val().length  == 7 || $("#sNumeroDocumento-1").val().length  == 8 ){
                                
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "dni",
                                    sNumeroDoc   : $("#sNumeroDocumento-1").val()
                                };

                                fncBuscarDocument(jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombreoRazonSocial-1").val(aryData.success.razonSocial);
                                        $("#sDireccion-1").val(aryData.success.direccion);
                                    }
                                });

                            }
                        break;

                    }
                  
                    
                });

            }
        });

        // Submit del formulario de Cliente
        $("#formCECliente").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro            = $("#formCECliente").data("nIdRegistro");
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
            var sDireccion             = $("#sDireccion"  + sEntidadCliente);
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
            }  else if (nIdDepartamento.length > 0 && nIdDepartamento.val() == '0') {
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


            // else if (sCorreo.length > 0 && sCorreo.val() == '') {
            //     toastr.error('Error. Ingrese un correo. Porfavor verifique');
            //     return;
            // }

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
                sDireccion               : sDireccion.length > 0 ? sDireccion.val() : null,
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
        $("#formCEProducto").find("form").on('submit',function(event){

            event.preventDefault();
            
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
            } else if (nPrecio.length > 0 && (nPrecio.val() == ''  || nPrecio.val() == '0' || isNaN(nPrecio.val()) )) {
                toastr.error('Error. Ingrese un precio o ingrese un precio de forma correcta. Porfavor verifique');
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


  

    });

 
    window.fncValidarRol = () => {

        if( $("body").data("nrol")  == $("body").data("nrolprospectoadmin") ) {
            
            // Admin 
            $("#btnCrearWidgetProspecto").show();
            $("#btnCrearCliente").show();
            $("#btnCrearSegmentacion").show();
            $("#btnCrearItemSegmentacion").show();
            $("#sAccionesDetalleSeg").show();
            $("#tblDetalleSegmentacion").bootstrapTable('showColumn', 'sAcciones');

            $("#sortable").sortable({
                cursor: "move",
                update: function(event, ui) {
                    fncGrabarProspecto();
                }
            });

        } else {

            // Visitante 
            $("#btnCrearWidgetProspecto").hide();
            $("#btnCrearCliente").hide();
            $("#btnCrearSegmentacion").hide();
            $("#btnCrearItemSegmentacion").hide();
            $("#tblDetalleSegmentacion").bootstrapTable('hideColumn', 'sAcciones');

            $("#formCECliente").find(".modal-footer").hide();

            $("#content-controles-prospecto")
            .find(":input")
            .each(function () {
                console.log(1);
                $(this).attr("disabled", "disabled");
            });

            $("#content-controles-prospecto")
            .find("a.text-danger")
            .each(function () {
                 $(this).attr("onclick", "");
                 $(this).find("i").html("block");
            });

            
        }

    }



    function fncCleanAll(){

        fncClearInputs($("#formCEProducto").find("form"));
        fncRemoveDisabled("#formCEProducto");

        fncClearInputs($("#formCECliente").find("form"));
        fncRemoveDisabled("#formCECliente");

        fncClearInputs($("#formCESegmentacion").find("form"));
        fncRemoveDisabled("#formCESegmentacion");
        
        fncClearInputs($("#formInputProspecto").find("form"));
        fncRemoveDisabled("#formInputProspecto");

    }


    // Funciones de Prospecto
    function fncDrawProspecto(){
        
        var jsnData = {
            nIdNegocio : $("body").data("nidnegocio")
        };

        fncObtenerConfigProspecto(jsnData,function(aryData){
            if(aryData.success){

                var aryData    = aryData.aryData;
                var sHtml      = ``;
                var sHtmlOrden = ``;
                var isRolAdmin = $("body").data("nrol") == $("body").data("nrolprospectoadmin") ? true : false;

                aryData.forEach(aryElement => {

                    sHtml += `
                    <div class="col-12 col-md-6 my-2">

                      <div class="custom-control custom-switch">
                          <input type="checkbox" ${aryElement.nEstado == '1' ? 'checked':''}  value="${aryElement.nIdConfigProspecto}" class="custom-control-input check-box-prospecto" id="customSwitches${aryElement.nIdConfigProspecto}">
                          <label class="custom-control-label" for="customSwitches${aryElement.nIdConfigProspecto}">${aryElement.sWidget}</label>
                          <span>`

                              if(aryElement.nEdit == 1 || aryElement.nTipoWidget == 2){
                                sHtml += `<a href="javascript:;" onclick="fncWidget(${aryElement.nIdWidget},${aryElement.nTipoWidget},${aryElement.nDefault},${aryElement.nIdConfigProspecto});" title="Editar">
                                   ${isRolAdmin ? ` <i class="material-icons">edit</i> `: ` <i class="material-icons">remove_red_eye</i>  ` } 
                                </a>`;
                              }

                              if(aryElement.nTipoWidget == 2){
                                sHtml += `<a href="javascript:;" class="text-danger" onclick="fncEliminarWidget(${aryElement.nIdWidget});" title="Eliminar"><i class="material-icons">delete</i> </a>`;
                              }
                          
                       sHtml += `</span>
                                    </div>
                                </div>`;

                                
                        sHtmlOrden += `
                          <div style="display:${ aryElement.nEstado == 1 ? 'block' : 'none' };" id="content-orden-${aryElement.nIdConfigProspecto}" class="my-2 p-2 border-card content-orden" data-nestado="${aryElement.nEstado}" data-nidconfig="${aryElement.nIdConfigProspecto}">
                              <div class="d-flex align-items-center bd-highlight">
                                  <div class="flex-grow-1 bd-highlight">
                                      <h6 class="m-0">${aryElement.sWidget}</h6>
                                  </div>
                                  <div class="bd-highlight">
                                      <button data-toggle="modal" class="btn btn-gradient-primary btn-rounded btn-icon">
                                          <i class="material-icons">open_with</i>
                                      </button>
                                  </div>
                              </div>
                          </div>`;
                      
                });

                $("#content-controles-prospecto").html(sHtml);
                $("#sortable").html(sHtmlOrden);
                fncListenEvents();

                setTimeout(() => {
                    fncValidarRol();
                }, 700 );
               

            }else{
                toastr.success(aryData.error);
            }
        });

    }

    function fncWidget(nIdWidget,nTipoWidget,nDefault,nIdConfigProspecto){


        if(nTipoWidget == 1 && nDefault == 1){

            switch(nIdWidget){
                case 1: 
                    // Cliente
                    $("#formClientes").modal("show");
                 break;
                 case 2: 
                    //Catalogo
                    $("#formProductos").modal("show");
                 break;
                 case 3: 
                    //Compentecia
                    
                    $("#title-segmentacion").html("Competencia");
                    $("#tblSegmentacion").data("nTipoSegmento",2);

                    var jsnData = {
                        nIdNegocio    : $("body").data("nidnegocio"),
                        nTipoSegmento : $("#tblSegmentacion").data("nTipoSegmento")
                    };

                    fncPopulateSegmentacion(jsnData,function(aryData){
                        $("#tblSegmentacion").bootstrapTable("load",aryData);
                        $("#formSegmentacion").modal("show");
                    });

                 break; 
                 case 4: 
                    // Segmentacion
                 
                    $("#title-segmentacion").html("Segmetacion");
                    $("#tblSegmentacion").data("nTipoSegmento",1);
                    
                    var jsnData = {
                        nIdNegocio    : $("body").data("nidnegocio"),
                        nTipoSegmento : $("#tblSegmentacion").data("nTipoSegmento")
                    };

                    fncPopulateSegmentacion(jsnData,function(aryData){
                        $("#tblSegmentacion").bootstrapTable("load",aryData);
                        $("#formSegmentacion").modal("show");
                    });

                 break;
                 
            }
        } else {

            $("#nTipoCampo").data("nIdRegistro",nIdWidget);

            var jsnData = {
                nIdRegistro : nIdWidget
            };

            fncMostrarWidget(jsnData,function(aryData){

                if(aryData.success){

                    var aryData = aryData.aryData;
                    
                    var isRolAdmin  = $("body").data("nrol") == $("body").data("nrolprospectoadmin") ? true : false;
                    var sTitle      = isRolAdmin ? "Editar Campo" : "Ver Campo";

                    if(isRolAdmin){
                        fncEditForm( "#formInputProspecto" , sTitle  );
                    } else {
                        fncViewForm( "#formInputProspecto" , sTitle  );
                    }

                    $("#nTipoCampo").val(aryData.nTipoCampo).trigger("change");
                    $("#sNombreWidget").val(aryData.sNombreUsuario);
                    $("#nRequerido").val(aryData.nRequerido);
                    $("#sValores").val(aryData.sValores);
                    $("#formInputProspecto").modal("show");
                
                } else { 
                    toastr.error(aryData.error);
                }

            });
        }
        
    }

    function fncListenEvents(){

        $(".check-box-prospecto").change(function(){

            var nIdConfigProspecto = $(this).val();
            var sHtmlTag           = "#content-orden-" + nIdConfigProspecto;

            if($(this).is(':checked')){
                $(sHtmlTag).data("nestado",1);
                $(sHtmlTag).show();
            } else {
                $(sHtmlTag).data("nestado",0);
                $(sHtmlTag).hide();
            }

            fncGrabarProspecto();
        });

    }

    function fncEliminarWidget(nIdRegistro){
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarEliminarWidget( jsnData , function(aryData){

                if(aryData.success){
                    fncDrawProspecto();
                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncGrabarProspecto(){

        var aryWidgets  = $("#sortable .content-orden");
        var aryData     = [];
        var nDesactivos = 0;

        $.each(aryWidgets, function( nIndex, aryItem ) {
            
            aryData.push({
                nOrden              : nIndex,
                nIdConfigProspecto  : $(this).data("nidconfig"),
                nEstado             : $(this).data("nestado")
            });

            if($(this).data("nestado") == 0) nDesactivos++;
        
        });

         console.log(aryData);
        // // return;

        if(aryData.length == nDesactivos){
            toastr.error("Error. Debe tener al menos un campo activo. Porfavor verifique");
            return;
        }

        var jsnData = {
            aryData : aryData
        };

        fncActualizarConfigProspecto(jsnData,function(aryData){
            if(aryData.success){
                fncDrawProspecto();
                toastr.success(aryData.success);
            } else {
                toastr.error("Error. porfavor solicite asistencia o vuelva a intentarlo.");
            }
        });

    }

    // Fin de prospecto


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



    // Funciones de la tabla Segmentacion

    function fncEliminarSegmentacion(nIdRegistro,nTipoSegmento) {
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarEliminarSegmentacion( jsnData , function(aryData){
                if(aryData.success){

                    var jsnData = {
                        nIdNegocio    : $("body").data("nidnegocio"),
                        nTipoSegmento : nTipoSegmento
                    };
                    
                    fncPopulateSegmentacion(jsnData,function(aryDataSeg){
                        $("#tblSegmentacion").bootstrapTable("load" , aryDataSeg);
                    });

                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncEliminarDetalleSegmentacion(nIdRegistro,nIdSegmentacion) {
        if(confirm('Esta acción eliminará permanentemente el registro y no podrá deshacerse. ¿ Esta seguro de continuar ?')){
            
            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEjecutarDetalleEliminarSegmentacion( jsnData , function(aryData){
                if(aryData.success){

                    var jsnData = {
                        nIdSegmentacion : nIdSegmentacion  
                    };
                    
                    fncPopulateDetalleSegmentacion(jsnData,function(aryDataSeg){
                        $("#tblDetalleSegmentacion").bootstrapTable("load" , aryDataSeg);
                    });

                    toastr.success( aryData.success );
                } else {
                    toastr.error( aryData.error );
                }

            }); 
        }
    }

    function fncMostrarSegmentacion(nIdRegistro,nTipoSegmento) {

        $( "#sNombreSegmentacion").data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro : nIdRegistro
        };

        fncBuscarSegmentacion(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var aryData = aryResponse.aryData;

                    $("#formCESegmentacion").find(".modal-title").html("Editar " + (nTipoSegmento == 1 ? 'Segmentacion' : 'Compentencia'));
                    $("#sNombreSegmentacion").val(aryData.sNombre);                  
                    $("#nEstadoSegmentacion").val(aryData.nEstado);
                    $("#formCESegmentacion").modal("show");
            
                } else {
                    toastr.error(aryData.error);
                }
        });

    }

    function fncMostrarItemSegmentacion(nIdRegistro,nIdSegmentacion){

        $( "#sNombreSegmentacion").data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro : nIdRegistro
        };

        fncMostrarDetalleSegmentacion(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var aryData = aryResponse.aryData;

                    $("#formCESegmentacion").find(".modal-title").html("Editar Item");
                    $("#sNombreSegmentacion").val(aryData.sNombre);                  
                    $("#nEstadoSegmentacion").val(aryData.nEstado);
                    $("#formCESegmentacion").modal("show");
            
                } else {
                    toastr.error(aryData.error);
                }
        });

    }

    function fncDetalleSegmentacion(nIdSegmentacion,nTipoSegmento,sNombre) {
        $("#formCESegmentacion").data("sEntidad","ITEM_SEGMENTACION");
        $( "#tblSegmentacion").data("nIdSegmentacion",nIdSegmentacion);

        var jsnData = {
            nIdSegmentacion : nIdSegmentacion
        };

        fncPopulateDetalleSegmentacion(jsnData, function(aryData){
            $("#formDetalleSegmentacion").find(".modal-title").html(`Detalles de ${(nTipoSegmento == 1 ? 'Segmento': 'Competencia')} (${sNombre})` );
            $("#tblDetalleSegmentacion").bootstrapTable("load",aryData);
            $("#formDetalleSegmentacion").modal("show");
        });
    }
    // Fin de tabla Segmentacion





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

        $( "#formCECliente" ).data("nIdRegistro",nIdRegistro);
      
        var jsnData = {
            nIdRegistro: nIdRegistro
        };

        fncBuscarRegistroCliente(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var aryData = aryResponse.aryData;

                    if( aryData.nTipoCliente == 1 ){
                        $("#btnViewFormEmpresa").trigger("click");
                    } else {
                        $("#btnViewFormPersona").trigger("click");
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

    // Prospecto

    function fncGrabarWidgetProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarWidgetProspecto',
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

    function fncObtenerConfigProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncObtenerConfigProspecto',
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

    function fncActualizarConfigProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizarConfigProspecto',
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

    function fncMostrarWidget(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncMostrarWidget',
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

    function fncEjecutarEliminarWidget( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/prospecto/fncEliminarWidget',
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

    

    // Fin de prospecto


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

    function fncBuscarDocument(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'api/'+ jsnData.sTipo +'/' + jsnData.sNumeroDoc ,
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

    // Fin de cliente 




    // Segmentacion 

    function fncPopulateSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: web_root + 'admin/segmentacion/fncPopulateSegmentacion/' + jsnData.nIdNegocio + '/' + jsnData.nTipoSegmento ,
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

    function fncGrabarSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/segmentacion/fncGrabarSegmentacion',
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

    function fncBuscarSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'admin/segmentacion/fncMostrarSegmentacion',
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

    function fncEjecutarEliminarSegmentacion( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/segmentacion/fncEliminarSegmentacion',
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

    function fncPopulateDetalleSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root +  'admin/segmentacion/fncPopulateDetalleSegmentacion',
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

    function fncGrabarDetalleSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/segmentacion/fncGrabarDetalleSegmentacion',
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

    function fncMostrarDetalleSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/segmentacion/fncMostrarDetalleSegmentacion',
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

    function fncEjecutarDetalleEliminarSegmentacion( jsnData , fncCallback ) {    
        $.ajax({
            type: 'post',
            url: web_root + 'admin/segmentacion/fncEliminarDetalleSegmentacion',
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