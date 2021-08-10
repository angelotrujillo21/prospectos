<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body data-snombre="<?=$user['sNombre']?>" 
      data-nestadopendiente ="<?= $nIdEstadoActividadPen ?>" 
      data-nestadoejecutado = "<?= $nIdEstadoActividadEjecutado ?>"
      data-nidempleado ="<?= $user['nIdEmpleado'] ?>"
      data-nidnegocio ="<?= $user['nIdNegocio'] ?>"
      data-ntipoactividadcita = "<?=$nTipoActividadCita?>"
      data-nidetapaenproceso = "<?=$nIdEtapaEnProceso?>"
      data-nidetaparechazado = "<?=$nIdEtapaRechazado?>"
      data-nidetapanegociacion = "<?=$nIdEtapaNegociacion?>"
      data-nidetapacierre = "<?= $nIdEtapaCierre ?>"
      data-nidetapaenviopropuesta="<?=$nIdEtapaEnvioPropuesta?>"
      data-ntipoentidadnotaempleado = "<?= $nTipoEntidadNotaEmpleado ?>"
      >

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['empleado/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['empleado/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid py-1 px-md-1 px-0 mb-5">

                    <div class="container-fluid">

                        <div class="row flex-center">


                            <div class="col-12 col-md-12 mb-4 px-2">

                                <!-- <a class="d-flex header-toggle collapse show" data-toggle="collapse" href="#content-prospectos-empleados" role="button" aria-expanded="false" aria-controls="content-prospectos-empleados"> 
                                    <div class="p-2">Contenido Prospectos</div>
                                    <div class="ml-auto p-2"> <i class="fas fa-sort-up icon-up"></i>  </div>
                                </a>-->

                                <div id="content-prospectos-empleados" class="border-card px-1 content-prospectos-empleados">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-md-12 text-center">
                                            
                                            <div class="d-flex align-items-center p-1">

                                                <div>
                                                    <p class="title-indicativos">
                                                        Prospectos
                                                    </p>
                                                </div>

                                                <div class="ml-auto">
                                                    <a id="btn-borrar-filtros" class="font-15" href="javascript:;"> <i class="fas fa-sync"></i> </a>
                                                </div>
                                            </div>
                                        </div>

                                      

                                        <div class="col-12">
                                            <div class="input-group">
                                                <input class="form-control py-2 border-right-0 border" type="search" value="" placeholder="Buscar por cliente , empleado , etapa o fecha de creacion del prospecto ..."  autocomplete="off" name="buscador-prospectos" id="buscador-prospectos">
                                                <span id="btnBuscar" class="input-group-append fondo-azul">
                                                    <div class="input-group-text bg-transparent text-white"><i class="fa fa-search"></i></div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="list-prospectos mx-1 my-2 my-md-4">
                                                <div id="content-card-prospectos" class="row m-0 content  pr-card-prospecto-vendedor">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>

                </div>
                <?php extend_view(['empleado/common/footer'], $data) ?>
            </main>


        </div>
    </div>


    <!--Modales -->

    <div class="modal fade" id="formEmpleado" tabindex="-1" role="dialog" aria-labelledby="formEmpleadoLabel" aria-hidden="true">
        <div class="modal-dialog m-1 m-md-auto" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header  modal-header-recuperar">
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-app-prospecto" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row flex-center">
                                <h4>Editar Vendedor</h4>
                            </div>
                            <div id="content-empleado" class="row">

                                

                            </div>
                            <div class="row flex-center">
                                <div class="col-12 flex-center">
                                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formProspecto" tabindex="-1" role="dialog" aria-labelledby="formProspectoLabel" aria-hidden="true">
        <div class="modal-dialog m-0 m-md-auto" role="document">
            <div class="modal-content" style="height: 100vh !important;">
                <form>
                    <div class="modal-header  modal-header-recuperar">
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-app-prospecto" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 90vh;overflow-y: auto;">
                    
                            <div class="row flex-center">
                                <p id="title-prospectos" class="title-indicativos">Crear Prospecto</p>
                            </div>

                            <div id="content-etapa-prospecto" class="row">
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">Etapa Prospecto</p>
                                                </div>

                                                <div class="bd-highlight font-18">
                                                    <a id="btnDescargarPdfProspecto" class="text-danger icon-pdf-etapa" target="_blank" href="javascript:;"><i class="far fa-file-pdf"></i></a>
                                                    <a id="btnVerAdjuntos" href="javascript:;"> <i class="fas fa-paperclip"></i> </a>
                                                </div>

                                                <div class="ml-auto">
                                                    <a class="color-azul link-drop" data-toggle="collapse" href="#cllEP" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="cllEP" class="col-12 my-2 collapse show">
                                            <div class="dropdown">
                                                <a class="btn dropdown-toggle menu-etapa" href="javascript:;" role="button" id="dropdownEtapa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Seleccionar
                                                </a>
                                                <div class="dropdown-menu w-100 dropdown-menu-etapa" aria-labelledby="dropdownEtapa">
                                                    <?php if(fncValidateArray($aryEtapaProspecto)): ?>
                                                        <?php foreach($aryEtapaProspecto as $aryEtapa): ?>
                                                        <?php $bIsDisabled = ( $nTipoProspecto == $nTipoProspectoLargo && $aryEtapa["nIdEtapa"] == $nIdEtapaNegociacion ) ? true : false; ?>
                                                            <a id="nIdEtapa-<?= $aryEtapa["nIdEtapa"] ?>" class="dropdown-item <?= $bIsDisabled  ? 'disabled'  : "" ?>" <?= $bIsDisabled  ? ' data-disabled="true" '  : "" ?> data-value="<?= $aryEtapa["nIdEtapa"] ?>" href="javascript:;">
                                                                <?= $aryEtapa["sNombreVendedor"] ?>
                                                            </a>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="content-titulo" class="row no-gutters border-card p-2 mb-4">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <p class="m-0 font-16">Titulo  :</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a class="color-azul link-drop" data-toggle="collapse" href="#cTP" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="cTP" class="col-12 my-2 collapse show">
                                    <input type="text" placeholder="" id="sTituloProspecto" name="sTituloProspecto" class="form-control" autocomplete="off" data-nrequerido="0">
                                </div>
                            </div>
                           

                            <div id="content-ce-prospecto" class="row"></div>

                            <div id="content-historico-prospecto" class="row">
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">Historico</p>
                                                </div>
                                                <div class="ml-auto">
                                                    <a class="color-azul link-drop" data-toggle="collapse" href="#content-cambios" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="content-cambios" class="row no-gutters my-2 content collapse show">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row flex-center mt-2 mb-1">
                                <div class="col-12 flex-center">
                                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                                </div>
                            </div>

                            <div id="content-cambio-consultor" class="row no-gutters border-card p-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <p class="m-0 font-16">Cambiar de consultor  :</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a class="color-azul link-drop" data-toggle="collapse" href="#cCC" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="cCC" class="col-12 my-2 collapse show">
                                    <select class="form-control" name="nCambioConsultor" id="nCambioConsultor">
                                            <option value="0">Seleccionar</option>
                                            <?php if(fncValidateArray($aryEmpleados)): ?>
                                                <?php foreach($aryEmpleados as $aryLoop): ?>
                                                    <option value="<?=$aryLoop["nIdEmpleado"]?>"><?=$aryLoop["sNombre"]?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                    </select>
                                </div>
                            </div>
                           
                    </div>
                </form>
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

    <div class="modal fade" id="formCECatalogo" tabindex="-1" role="dialog" aria-labelledby="formCECatalogoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCECatalogoLabel">Agregar Producto</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nIdCatalogo" class="col-form-label">Producto o servicio</label>
                                        <select class="form-control" name="nIdCatalogo" id="nIdCatalogo">
                                            <option value="0">SELECCIONAR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nCostoUnitario" class="col-form-label">C.Unitario</label>
                                        <input id="nCostoUnitario" name="nCostoUnitario" type="number" min="0.00" max="9999999.99" step="0.01" value="0.00" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nCantidad" class="col-form-label">Cantidad</label>
                                        <input name="nCantidad" id="nCantidad" type="number" value="1" min="1" max="9999999" step="1" autocomplete="off" class="form-control">
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

    <div class="modal fade" id="formCEActividad" tabindex="-1" role="dialog" aria-labelledby="formCEActividadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEActividadLabel">Crear Cita</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                            
                            <div id="content-cumplio-actividad" class="row mx-5">

                                <div class="col-6 flex-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nCumplioActividad" id="nCumplioActividad1" value="1" >
                                        <label class="form-check-label" for="nCumplioActividad1">Si</label>
                                    </div>
                                </div>

                                <div class="col-6 flex-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nCumplioActividad" id="nCumplioActividad0" value="0" >
                                        <label class="form-check-label" for="nCumplioActividad0">No</label>
                                    </div>
                                </div>
                                
                            </div>
                
                            <div id="content-actividad" class="row my-1">

                                <div id="content-reprogramar" class="col-12">
                                    <div class="form-group mb-0">
                                        <p class="m-0 font-16">Reprogramar  :</p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sFechaActividad" class="col-form-label">Fecha</label>
                                        <input  id="sFechaActividad" name="sFechaActividad" type="date" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sHoraActividad" class="col-form-label">Hora</label>
                                        <input id="sHoraActividad" name="sHoraActividad" type="time"  autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nCantidad" class="col-form-label">Nota</label>
                                        <textarea class="form-control d-block my-2" placeholder="Escribe una nota.." name="sNotaActividad" id="sNotaActividad" cols="2" rows="2"></textarea>
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

    <div class="modal fade" id="formCEAdjunto" tabindex="-1" role="dialog" aria-labelledby="formCEAdjuntoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEAdjuntoLabel">Adjuntos</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="form-group">

                                    <div class="d-flex align-items-center">

                                        <label for="sImagen" class="col-form-label">Contrato:</label>
                                        
                                        <div class="ml-auto dw-contrato">
                                            <a id="btnDescargarContrato" href="javascript:;" class="color-icon-download-contrato" title="Descargar">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>

                                        <div class="mx-2 dw-contrato">
                                            <a id="btnEliminarContrato" href="javascript:;" class="text-danger font-18" title="Eliminar">
                                            <i class="material-icons">delete</i></a>
                                        </div>

                                    </div>
                                    

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sContrato" lang="es" name="sContrato">
                                            <label class="custom-file-label" for="sContrato">Elija el archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="sImagen" class="col-form-label">Otros:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="aryOtros" lang="es" name="aryOtros" multiple>
                                            <label class="custom-file-label" for="aryOtros">Seleccione los archivos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="content-adjuntos" class="col-md-12 col-12">


                               

                                                        


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

    <div class="modal fade" id="formHistorialCliente" tabindex="-1" role="dialog" aria-labelledby="formHistorialClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formHistorialClienteLabel">Historial</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="toolbarHistorial"></div>

                        <div class="table-responsive">

                            <table data-toggle="table" id="tblHistorial" data-card-view="true" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarHistorial" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                    <thead>
                                        <tr>
                                            <th data-field="nItem" data-sortable="true">Item</th>
                                            <th data-field="sCliente" data-sortable="true">Cliente</th>
                                            <th data-field="sEmpleado" data-sortable="true">Empleado</th>
                                            <th data-field="sNombreEtapa" data-sortable="true">Etapa</th>
                                            <th data-field="nTotal" data-sortable="true">Total</th>
                                            <th data-field="dFechaCreacion" data-sortable="true">Fec. Creacion</th>
                                            <th data-field="dFechaHoraUltimoAcceso" data-sortable="true">Ult. Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
 
    <div class="modal fade" id="modalErrorActividadNoCumplida" tabindex="-1" role="dialog" aria-labelledby="modalErrorActividadNoCumplidaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalErrorActividadNoCumplidaLabel"> Citas No Cumplidas</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center">
                              <img src="<?=src('app/error.png')?>" alt="Error">
                            </div>
                            <div class="col-12 px-4">
                                <p class="mb-1 text-justify">Existen citas que ya se cumplieron con la fecha de programacion porfavor verifica,si ya la cumpliste terminala ,de caso contrario porfavor reprograma la cita, si no haces estas observaciones el sistema se bloqueara gracias.</p>
                                <span class="font-weight-bold"> Detalle :</span>
                                <p id="errorDetalle">
                                </p>
                            </div>
                            <div class="col-12 text-center mb-5">
                                <button  data-dismiss="modal" aria-label="Close" class="btn btn-danger">OK</button>
                            </div>
                        </div>                          
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetalleCliente" tabindex="-1" role="dialog" aria-labelledby="modalDetalleClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetalleClienteLabel">Detalle Cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">

                            <table class="table table-bordered">

                                <tr>
                                    <th>T. Cliente</th>
                                    <td id="sTipoClienteDetalle"></td>
                                </tr>

                                <tr>
                                    <th>T. Docum. </th>
                                    <td id="sTipoDocDetalle"></td>
                                </tr>

                                <tr>
                                    <th>N° Docum. </th>
                                    <td id="sNumeroDocumentoDetalle"></td>
                                </tr>

                                <tr>
                                    <th>Nombre</th>
                                    <td id="sNombreoRazonSocialDetalle"></td>
                                </tr>

                                <tr>
                                    <th>Distrito</th>
                                    <td id="sDistritoDetalle" ></td>
                                </tr>

                                
                                <tr>
                                    <th>Direccion</th>
                                    <td id="sDireccionDetalle" ></td>
                                </tr>

                                <tr>
                                    <th>Contacto</th>
                                    <td id="sContactoDetalle"></td>
                                </tr>


                                <tr>
                                    <th>Relacion.</th>
                                    <td id="sRelacionamientoDetalle"></td>
                                </tr>

                            
                                <tr>
                                    <th>Telefono</th>
                                    <td id="sTelefonoDetalle" ></td>
                                </tr>

                                <tr>
                                    <th>Correo</th>
                                    <td id="sCorreoDetalle"></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="content-buttons-detalle-cliente text-center" id="content-buttons" >
                                    
                                    </td>
                                </tr>
                                                
                            </table>

                        </div>
                                               
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="formIndi" tabindex="-1" role="dialog" aria-labelledby="formIndiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formIndiLabel">Indicativos</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                    
                    
                        <div class="col-12 col-md-6">

                            <!-- <a class="d-flex header-toggle collapse show" data-toggle="collapse" href="#card-colaborador" role="button" aria-expanded="false" aria-controls="card-colaborador"> 
                                <div class="p-2">Asesor de ventas</div>
                                <div class="ml-auto p-2"> <i  class="fas fa-sort-up icon-up"></i>  </div>
                            </a> -->

                            <div id="card-colaborador" class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $user['sNombre']?>">
                                            <span><?= strtoupper($user['sEmpleadoCorto']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span><?= uc($user['sNombre']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-14"><?= uc($user['sTipoEmpleado']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-13"><?= uc($user['sNombreNegocio']) ?></span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-<?= strtolower($user['sColorSuperEmpleado'])?>"></div>
                                        <span class="activo-hace">Activo hace <?= fncSecondsToTime($user['sTimeUltimoAcceso']) ?></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-12 col-md-6 my-2">

                            <!-- <a class="d-flex header-toggle collapse show" data-toggle="collapse" href="#card-indicativos" role="button" aria-expanded="false" aria-controls="card-indicativos"> 
                                <div class="p-2">Indicativos</div>
                                <div class="ml-auto p-2"> <i class="fas fa-sort-up icon-up"></i>  </div>
                            </a> -->

                            <div id="card-indicativos" class="card-colaborador">


                                <div class="row no-gutters">
                                    <div class="col-12 col-md-12 text-center">
                                        <p id="titulo-indi" class="title-indicativos">
                                         Indicativos
                                        </p>
                                    </div>

                                    <div class="col-6 col-md-7 flex-center">
                                        <div class="border-card mx-1 card-indicativo-1">
                                            <p class="title">Avance</p>
                                            <p id="nAvance">0</p>
                                            <p class="title">Renta Básica</p>
                                            <p id="nRentaBasica">0</p>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-5 flex-center">
                                        <div class="w-100 border-card mx-1 card-indicativo-2">
                                            <div class="row no-gutters flex-center p-1">
                                                <div class="col-6 title">Compra</div>
                                                <div  id="nCompra" class="col-6 value">0</div>
                                            </div>

                                            <div class="row no-gutters flex-center p-1">
                                                <div class="col-6 title">Ticket</div>
                                                <div id="nTicket" class="col-6 value">0</div>
                                            </div>

                                            <div class="row no-gutters flex-center p-1">
                                                <div class="col-6 title">Efectividad</div>
                                                <div id="nEfectividad" class="col-6 value">0%</div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 text-center mt-2">
                                        <p class="title-indicativos">Indicativos Prospectos</p>
                                    </div>

                                    <div class="col-4 col-md-4 text-center mt-2">
                                        <div data-sfiltro="CITAS" class="border-card content-indi-pros content-citas mx-1">
                                            <div class="row no-gutters">
                                                <div class="col-12 mb-1">
                                                    <span class="title">Citas</span>
                                                </div>
                                                <div class="col-6">
                                                    <i class="far fa-calendar-alt font-icon-indi"></i>
                                                </div>
                                                <div class="col-6 flex-center">
                                                    <span id="nCitasCercanas" class="title">10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 col-md-4 text-center mt-2">
                                        <div data-sfiltro="CIERRES" class="border-card content-indi-pros content-cierres mx-1">
                                            <div class="row no-gutters">
                                                <div class="col-12 mb-1">
                                                    <span class="title">Cierres</span>
                                                </div>
                                                <div class="col-6">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                                <div class="col-6 flex-center">
                                                    <span id="nTotalCierre" class="title">10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 col-md-4 text-center mt-2">
                                        <div data-sfiltro="OPORTUNIDAD" class="border-card content-indi-pros content-oportunidad mx-1">
                                            <div class="row no-gutters">
                                                <div class="col-12 mb-1">
                                                    <span class="title">Oportunidad</span>
                                                </div>
                                                <div class="col-6">
                                                    <i class="fas fa-rocket"></i>
                                                </div>
                                                <div class="col-6 flex-center">
                                                    <span id="nOportunidad" class="title">10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                                                            
                                                            
                                                            
                </div>
                <div class="modal-footer">
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="formFilter" tabindex="-1" role="dialog" aria-labelledby="formFilterLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formIndiLabel">Filtrar</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 row">
                             
                             <div class="col-6 pr-0">
                                 <div class="form-group">
                                     <label for="dDesde" class="col-form-label">Desde</label>
                                     <input type="date" autocomplete="off" placeholder="dd/mm/yyyy" class="form-control" name="dDesde" id="dDesde">
                                 </div>
                             </div>

                             <div class="col-6 pr-0">
                                 <div class="form-group">
                                     <label for="dHasta" class="col-form-label">Hasta</label>
                                     <input type="date" autocomplete="off" placeholder="dd/mm/yyyy" class="form-control" name="dHasta" id="dHasta">
                                 </div>
                             </div>
                             
                        </div>
                    </div>
                                                                                    
                                                            
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Filtar</button>
                </div> 
            </div>
        </div>
    </div>
    <!-- Fin de modales -->





</body>


<?php extend_view(['empleado/common/scripts'], $data) ?>

<!-- Prospecto -->
<script>


    $(document).ready(function() {

        $("#dDesde").val(moment().startOf('month').format('YYYY-MM-DD'));
        $("#dHasta").val(moment().format('YYYY-MM-DD'));

        // $('a[href="#card-colaborador"]').trigger("click");
        // $('a[href="#card-indicativos"]').trigger("click");

        fncValidateActividadesNoCumplidas();

        var jsnData = {
            nIdNegocio  : $("body").data("nidnegocio"),
            nIdEmpleado : $("body").data("nidempleado"),
            // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
            // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
        };

        fncDrawCardProspecto(jsnData,"#content-card-prospectos");
        
        $("#btnCrearProspecto").on("click", function() { 

            window.fncTriggerDrawProspecto((bStatus)=>{

                $("#content-etapa-prospecto").hide();
                $("#content-historico-prospecto").hide();  
                $("#content-cambio-consultor").hide();

                $("#formProspecto").data("sAccion","crear");
                $("#title-prospectos").html("Crear Prospecto");
                $("#formProspecto").data("nIdRegistro", 0);  
                $("#formProspecto").modal("show");
            
            });        
        
        });

        
        window.fncTriggerDrawProspecto(()=>{

        });

        $("#formProspecto").find("form").on("submit",function(event){
            event.preventDefault();

           // Items Default 
           var nIdRegistro       = $("#formProspecto").data("nIdRegistro");
           var nIdCliente        = $("#nIdCliente");
           var sTitulo           = $("#sTituloProspecto");
           var arySegmentaciones = [];
           var aryCatalogos      = [];
           var aryActividades    = [];
           var sNota             = $("#sNota");
           var nEstado           = $("#nEstado");

           var aryServicios = fncGetDataTableCatalogo("#table-servicios");
           var aryProductos = fncGetDataTableCatalogo("#table-productos");

           aryCatalogos = aryServicios.concat(aryProductos);
            
            if($(".content-segmetacion").length>0){
                $(".content-segmetacion").each(function(nIndex,element){
                        var sLabel              = $(this).find("label").html();
                        var nIdSegmentacion     = $(this).find("label").data("nidsegmentacion");
                        var nRequerido          = $(this).find("select").data("nrequerido");
                        var nIdDetalle          = $(this).find("select").find("option:selected").val();

                        if(nRequerido == 1){
                            if(nIdDetalle == 0){
                                toastr.error("Error.Debe de seleccionar "+ sLabel +".Porfavor verifique");
                                return;
                            }
                        }

                        arySegmentaciones.push({
                            nIdSegmentacion : nIdSegmentacion,
                            nIdDetalle      : nIdDetalle
                        });
                });
            }

            if($(".content-actividades").length>0){
                $(".content-actividades").find(".content-actividad").each(function(nIndex,element){
                        var jsnDataItem = $(this).data("jsndata");
                        aryActividades.push(jsnDataItem);
                });
            }


            // if(nIdCliente.length>0 && nIdCliente.val()==0){
            //     toastr.error("Error.Debe de seleccionar un cliente .Porfavor verifique");
            //     return;
            // }

            if($("#table-servicios").length>0 && $("#table-productos").length>0 && aryCatalogos.length == 0){
                toastr.error("Error.Debe de seleccionar un producto o servicio .Porfavor verifique");
                return;
            } if(nIdRegistro == 0 && $(".content-actividades").length>0  && aryActividades.length == 0 ){
                toastr.error("Error.Debe de ingresar una cita para el prospecto .Porfavor verifique");
                return;
            }
           

            var jsnData = {
                nIdRegistro         : nIdRegistro, 
                nIdCliente          : nIdCliente.length > 0 ? nIdCliente.val() : null,
                sTitulo             : sTitulo.length>0 ? sTitulo.val()  : null,
                nIdNegocio          : $("body").data("nidnegocio"),
                nIdEmpleado         : $("body").data("nidempleado"),
                aryCatalogos        : aryCatalogos,
                arySegmentaciones   : arySegmentaciones,
                aryActividades      : aryActividades,
                sNota               : sNota.length > 0 ? sNota.val() : null,
                nTipoEntidadNota    : $("body").data("ntipoentidadnotaempleado"),
                nEstado             : nIdRegistro == 0 ? 1 : nEstado.val()
            };
            
            // Data extra 
            var aryDataExtra  = $("#formProspecto").data("aryDataExtra");
            var aryValueExtra = [];
            
            if(aryDataExtra.length>0){

                $.each(aryDataExtra, function( nIndex, aryItem ) {

                    var sWidgetSystem     = aryItem.sWidgetSystem;
                    var sTipoCampoSystem  = aryItem.sTipoCampoSystem;
                    var sWidget           = aryItem.sWidget;
                    var nRequerido        = aryItem.nRequerido;

                    switch (sTipoCampoSystem) {

                        case "text":
                        case "tel":
                        case "textarea":
                        case "date":

                            var sVal  = $("#" + sWidgetSystem).val();
                            if(nRequerido == 1){
                                if(sVal == ''){
                                    toastr.error("Error.Debe de ingresar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem] : sVal,
                            });
                            

                            break;
                        case "select":
                            var sVal = $("#" + sWidgetSystem).find("option:selected").val();

                            if(nRequerido == 1){
                                if(sVal == '0'){
                                    toastr.error("Error.Debe de seleccionar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem] : sVal
                            });
                            break;

                        case "radio":
                            var sVal = $('input:radio[name='+sWidgetSystem+']:checked').val();

                            if(nRequerido == 1){
                                if(sVal === undefined){
                                    toastr.error("Error.Debe de seleccionar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem]  : sVal != undefined ? sVal : null 
                            });

                            break;
                    }
                });

                jsnData = Object.assign({ aryValueExtra : aryValueExtra }, jsnData);

            }
           
            fncGrabarProspecto(jsnData,function(aryData){
                //alert(JSON.stringify(aryData));
                if(aryData.success){

                    $("#formProspecto").modal("hide");
                    
                    // var jsnData = {
                    //     nIdNegocio  : $("body").data("nidnegocio"),
                    //     nIdEmpleado : $("body").data("nidempleado"),
                    //     // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                    //     // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
                    // };

                    fncDrawProspectosForState();
                    
                    //window.fncDrawCardProspecto(jsnData,"#content-card-prospectos");
                    toastr.success(aryData.success);

                }else{
                    toastr.error(aryData.error);
                }
            });

        });


        $('#formProspecto').on('hidden.bs.modal', function () {
            fncClearInputs($("#formProspecto").find("form"));

            $("#content-actividades").html("");
            $("#content-notas").html("");
            $("#formProspecto").find("table").find("tbody").html("");
            $("#nIdCliente").prop("disabled",false);
            $("#btnCrearCliente").show();
            $('#formProspecto').find("table").find("tfoot").find(".cantidad-total").html("0");
            $('#formProspecto').find("table").find("tfoot").find(".total").html("0");
            $("#formProspecto").find(".btn-submit").show();

            // Si se ha editado actualizamos todos los prospectos 
            
            if( $("#formProspecto").data("sAccion") == "editar" ) {
            
                // La lista de prospectos se ven por varios filtros desde el buscador o atraves del filtros citas o oportunidades o cierres o tambien se puede listar todos los prospectos es por esto que analizamos en que situacion esta el usuario
                fncDrawProspectosForState();
             
            }
           
        });

        $("#buscador-prospectos").on("keyup search",function(event){
           
            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                sBuscador   : $(this).val(),
                // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
            };

            fncDrawCardProspecto(jsnData,"#content-card-prospectos",false);
            $("body").data("sFilterProspectos","BUSCADOR");

        });

        $("#btnBuscar").on("click",function(){
            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                sBuscador   : $(this).val(),
                dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
            };

            fncDrawCardProspecto(jsnData,"#content-card-prospectos",true);
            $("body").data("sFilterProspectos","BUSCADOR");
        });

        // Filtros
        $(".btn-filtro").on('click',function(){
            
            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                sFiltro     : $(this).data("sfiltro"),
                // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
            };

            document.querySelector("#content-prospectos-empleados").scrollIntoView({ behavior: 'smooth', block: 'center' });
            fncDrawCardProspecto(jsnData,"#content-card-prospectos");

            $("body").data("sFilterProspectos","FILTROS");
            $("body").data("sFiltro", jsnData.sFiltro );
        });

        $(".btnVerInicio").on('click',function(){
            $("#card-colaborador").parent().show();
            $("#card-indicativos").parent().show();
            $("#content-prospectos-empleados").parent().show();
        });

        // $(".btnVerprospectos").on('click',function(){
        //     $("#card-colaborador").parent().hide();
        //     $("#card-indicativos").parent().hide();
        //     $("#content-prospectos-empleados").parent().show();
        //     $("html, body").animate({ scrollTop: 0 }, "slow");

        //     var jsnData = {
        //         nIdNegocio  : $("body").data("nidnegocio"),
        //         nIdEmpleado : $("body").data("nidempleado"),
        //         // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
        //         // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
        //     };

        //     fncDrawCardProspecto(jsnData,"#content-card-prospectos");
        //     $("body").data("sFilterProspectos","TODOS");
        // });

        $("#btn-borrar-filtros").on('click',function(){
          
            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
            };

            fncDrawCardProspecto(jsnData,"#content-card-prospectos");
            $("body").data("sFilterProspectos","TODOS");
        });

        $("#btnVerAdjuntos").on("click",function(){
            $("#nIdEtapa-"+$("body").data("nidetapaenproceso")).trigger("click");
        });

    });

    window.fncToggleFullScreen = () => {
        
        var doc               = window.document;
        var docEl             = doc.documentElement;

        var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
        var cancelFullScreen  = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

        if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
            requestFullScreen.call(docEl);
        } else {
            cancelFullScreen.call(doc);
        }
        
    }

    window.fncDrawProspectosForState =  () =>{

        if( $("body").data("sFilterProspectos") == 'BUSCADOR' &&  $("#buscador-prospectos").val().length > 0 ){

            $("#buscador-prospectos").trigger("keyup");
            console.log("buscador");

        } else if ( $("body").data("sFilterProspectos") == 'FILTROS' && $("body").data("sFiltro").length > 0 ) {

            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                sFiltro     : $("body").data("sFiltro"),
                // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),

            };

            fncDrawCardProspecto(jsnData,"#content-card-prospectos");
            console.log("FILTROS");

        } else {

            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEmpleado : $("body").data("nidempleado"),
                // dDesde      : $("#dDesde").val() == '' ? '' : moment($("#dDesde").val()).format('DD/MM/YYYY'),
                // dHasta      : $("#dHasta").val() == '' ? '' : moment($("#dHasta").val()).format('DD/MM/YYYY'),
            };

            window.fncDrawCardProspecto(jsnData,"#content-card-prospectos");
            console.log("todos");

        }

    } 

    window.fncValidateActividadesNoCumplidas = function(){

        var jsnData = {
            nIdEmpleado : $("body").data("nidempleado")
        };

        fncGetActividadesNoCumplidas(jsnData,(aryData)=>{

            if(aryData.success){
                var aryData = aryData.aryData;

                if(aryData.bExistenNoCumplidas){
                    var sTitulo = aryData.nCantidadActividad == 1 ? '1 Cita No Cumplida' : aryData.nCantidadActividad + ' Citas No Cumplidas';
                    $("#modalErrorActividadNoCumplida").find(".modal-title").html(sTitulo);                    
                    $("#errorDetalle").html(aryData.sDetalle);
                    $("#modalErrorActividadNoCumplida").modal("show");
                }

                console.log(aryData);


            } else {
                aryData.error(aryData.error);
            }

        });
     
    }

    window.fncDrawCardProspecto = function(jsnData,sHtmlTag,bShowLoader = true){

        // var dDesde = jsnData.dDesde;
        // var dHasta = jsnData.dHasta;

        // if ((dDesde != "" && dHasta == "") || (dDesde == "" && dHasta != "")) {
        //     toastr.error('Error. Si va a especificar fechas, debe ingresar la de inicio y fin. Por favor verificar.');
        //     return;
        // }
        
        // if (fncCompareDate(dDesde,dHasta) === 1) {
        //     toastr.error('Error. La fecha de fin debe ser mayor o igual que la fecha de inicio. Por favor verificar.');
        //     return;
        // }

        var sHtml = ``;

        fncGetProspectos(jsnData, bShowLoader , function(aryData){
            if(aryData.success){
                
                $.each(aryData.aryData, function (nKeyItem, aryItem) {
                    sHtml += `<div class="col-12 col-md-4 px-0 px-md-2 items">
                                <div class="card-prospecto border-top-pr border-left-pr etapa-${aryItem.nIdEtapa}-border-left border-top-${aryItem.aryEmpleado.sColorSuperEmpleado.toLowerCase()} mb-3">
                                        
                                        <div class="row no-gutters mb-1">
                                            <div class="col-10">
                                                <span class="pr-cliente">
                                                   
                                                    ${ aryItem.sCliente.length > 0 ? `Cliente: ${fncUc(fncCutText(aryItem.sCliente))}` : `Titulo : ${fncUc(fncCutText(aryItem.sTitulo))}`  }
                                                    
                                                </span>
                                                ${ is_admin == true ? ` <div class="w-100"></div> <span class="pr-vendedor">Vend: ${fncUc(fncCutText(aryItem.aryEmpleado.sNombre))}</span> `:``}
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                                ${ aryItem.nIdEtapa == $("body").data("nidetapacierre") || aryItem.nIdEtapa == $("body").data("nidetaparechazado") ? `` : ` <a class="pr-icon-edit" href="javascript:;" onclick="fncEditarProspecto(${aryItem.nIdProspecto});"><i class="far fa-edit"></i></a>`}   
                                            </div>
                                        </div>

                                        <div class="row no-gutters">
                                            <div class="col-6">`;

                                            $.each(aryItem.aryCatalogo, function (nKeyCat, aryItemCat) {
                                                sHtml += ` <span class="font-14 d-block"> ${fncUc(aryItemCat.sItemCantidadPrecio)}</span>` ;
                                            });
                                            
                     sHtml +=          `</div>
                                            <div class="col-6 text-right d-flex justify-content-end align-items-center">
                                                ${ (typeof aryItem.aryUltimaCita === 'object') && Object.values(aryItem.aryUltimaCita).length > 0  && aryItem.aryUltimaCita.sColor != '' && aryItem.aryUltimaCita.dFecha != '' ? `<span class="ult-cita color-text-${aryItem.aryUltimaCita.sColor}"> Ult.Cita ${moment( aryItem.aryUltimaCita.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY')} ${ moment(aryItem.aryUltimaCita.dHora,'HH:mm').format("HH:mm") } </span>` : ``  } 
                                            </div>
                                        </div>

                                        <div class="row no-gutters mb-1">
                                            <div class="col-7">
                                                <span class="font-14 etapa-${aryItem.nIdEtapa}-color">${aryItem.sEtapa}</span>
                                            </div>
                                            <div class="col-5 text-right">
                                              ${aryItem.sTimeUltimoAcceso.length>0 ? `<span class="ult-ingreso color-text-verde">Ingreso hace ${aryItem.sTimeUltimoAcceso} </span>` : `` }  
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    `;
                });

                var sNameIdShowMore       = "btnShowMoreProspectos";
                var sHtmlTagShowMore      = "#" +sNameIdShowMore ;
                var sActionAnterior       = typeof $(sHtmlTagShowMore).data("action") == 'undefined' ? 'show' : $(sHtmlTagShowMore).data("action");
                var sTextActionAnterior   = typeof $(sHtmlTagShowMore).data("action") == 'undefined' ? 'Ver Todo' : 'Ver Menos';

                sHtml += `<div class="col-12 my-1 text-right"><a id="${sNameIdShowMore}" href="javascript:;" data-action='${sActionAnterior}' class="ShowMore">${sTextActionAnterior}</a></div>`;

                $(sHtmlTag).html(sHtml);

                fncEventListenerShowMoreLess();
                 
                 // Indicativos 
                 var aryIndicativos = aryData.aryIndicativos;
                 
                 $("#nAvance").html(aryIndicativos.nAvance);
                 $("#nRentaBasica").html(aryIndicativos.nRentaBasica);
                 $("#nCompra").html(aryIndicativos.nCompra);
                 $("#nTicket").html(aryIndicativos.nTicket);
                 $("#nEfectividad").html(aryIndicativos.nEfectividad);
                 $("#nCitasCercanas").html(aryIndicativos.nCitasCercanas);
                 $("#nTotalCierre").html(aryIndicativos.nTotalCierre);
                 $("#nOportunidad").html(aryIndicativos.nOportunidad);

                if(dDesde != "" && dHasta !="" ){
                    $("#titulo-indi").html(
                            `Indicativos  
                            <a onclick="$('#formFilter').modal('show');" class="font-15 color-plomo" href="javascript:;"> <i class="fas fa-filter"></i> </a>
                            <br/> <span style='font-size:15px;'>${dDesde +  " - " + dHasta}"</span>
                            `);
                } else {
                    $("#titulo-indi").html("Indicativos");
                }

                 // Fin de indicativos

            }
        });
    }

    window.fncEditarProspecto = function(nIdProspecto){
       
        var jsnData = {
            nIdRegistro  : nIdProspecto,
            nIdNegocio   : $("body").data("nidnegocio")
        };

        $("#btnDescargarPdfProspecto").hide();
        $("#btnVerAdjuntos").hide();
    
        fncMostrarProspecto(jsnData , function(aryData){
            if(aryData.success){
               
                $("#content-etapa-prospecto").show();
                $("#content-historico-prospecto").show();  
                $("#content-cambio-consultor").show();  

                $("#title-prospectos").html("Editar Prospecto");
                $("#formProspecto").data("nIdRegistro",nIdProspecto);
                $("#formProspecto").data("sAccion","editar");
                
                var aryProspecto             = aryData.aryData.aryProspecto ;
                var aryProspectoSegmentacion = aryData.aryData.aryProspectoSegmentacion ;
                var aryConfigExtra           = aryData.aryData.aryConfigExtra ;
                var sLinkWebCotizacion       = aryData.aryData.sLinkWebCotizacion ;
              
                // Si ya exsite un link de una cotiazacion web

                $("#nCambioConsultor").val(aryProspecto.nIdEmpleado);
              
                if(
                    aryProspecto.nIdEtapa == $("body").data("nidetapaenviopropuesta") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapanegociacion") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapaenproceso") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapacierre") 
                ){
                    $("#btnDescargarPdfProspecto").attr("href",route( 'admin/prospecto/fncDownloadPropuesta/' + nIdProspecto ) );
                    $("#btnDescargarPdfProspecto").show();
                }

                
                if( aryProspecto.nIdEtapa == $("body").data("nidetapaenproceso") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapacierre")  || 
                    aryProspecto.nIdEtapa == $("body").data("nidetapanegociacion") 
                ){
                    $("#btnVerAdjuntos").show();
                }
                
                // Data default

                // Etapa Propsecto 

                fncSetEtapa(aryProspecto.nIdEtapa);

                // Cliente
                if($("#nIdCliente").length>0){
                    
                    $("#nIdCliente").val(aryProspecto.nIdCliente);

                    if(aryProspecto.nIdCliente == 0 || aryProspecto.nIdCliente == ''){
                        
                        $("#btnCrearCliente").show();
                        
                        $('#nIdCliente').prop('disabled', false);
                        $("#nIdCliente").attr("onblur","fncActualizarCliente($(this));");


                    } else {
                        $("#btnCrearCliente").hide();
                        $('#nIdCliente').prop('disabled', true);
                    }
                   
                }

                if($("#sTituloProspecto").length>0){
                    $("#sTituloProspecto").val(aryProspecto.sTitulo);
                    $("#sTituloProspecto").data("sTituloOld",aryProspecto.sTitulo);
                    $("#sTituloProspecto").attr("onblur","fncActualizarTitulo($(this));");
                }

            
                // Catalogo
                if($("#table-servicios").length >0 && $("#table-productos").length > 0 ){
                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro")
                    };

                    fncListarCatalogo(jsnData);
                }

                // Segmentacion 
                if(aryProspectoSegmentacion.length>0){
                    aryProspectoSegmentacion.forEach((element) => {
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).val(element.nIdDetalleSegmentacion);
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).data("nIdProspectoSegmentacion",element.nIdProspectoSegmentacion);
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).attr('onchange',`fncActualizarSegmentacion(${element.nIdSegmentacion},this);`);
                    });
                }

            
                // Actividades
                var jsnData = {
                    nIdRegistro     : $("#formProspecto").data("nIdRegistro"),
                    nTipoActividad  :  1
                };

                fncListarActividades(jsnData);
                // Notas

                $("#sNota").attr("onblur","fncGrabarNota(0,this);");
               
                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };

                fncListarNota(jsnData);
               

                fncListarCambios(jsnData);
              
                // Data default
               
                // Data Extra 
                if(aryConfigExtra.length>0){
                    aryConfigExtra.forEach((element) => {
                       
                        var sTipoCampoSystem = element.sTipoCampoSystem;
                        var sWidgetSystem    = element.sWidgetSystem;
                        var sValue           = aryProspecto[element.sWidgetSystem];
                        var sWidget          = element.sWidget;

                        
                        switch (sTipoCampoSystem) {
                            case "text":
                            case "tel":
                            case "date":
                            case "textarea":

                                    $("#"+sWidgetSystem).val(sValue);
                                    $("#"+sWidgetSystem).off();
                                    $("#"+sWidgetSystem).on('blur',function(){

                                        if($(this).val() == '') {return false;}

                                        var jsnData = {
                                            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                            nIdEmpleado : $("body").data("nidempleado"),
                                            sWidget     : sWidget,
                                            sCol        : $(this).attr('name'),
                                            sVal        : $(this).val()
                                        };


                                        fncActualizarControlExtra(jsnData,function(aryData){
                                            if(aryData.success){
                                                toastr.success(aryData.success);
                                            } else {
                                                toastr.error(aryData.error);
                                            }
                                        });

                                    });

                                break;
                            case "select":

                                $("#"+sWidgetSystem).val(sValue);
                                $("#"+sWidgetSystem).off();

                                $("#"+sWidgetSystem).on('change',function(){

                                    if($(this).find("option:selected").val() == 0) {return false;}

                                    var jsnData = {
                                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                        nIdEmpleado : $("body").data("nidempleado"),
                                        sWidget     : sWidget,
                                        sCol        : $(this).attr('name'),
                                        sVal        : $(this).find("option:selected").val()
                                    };

                                    fncActualizarControlExtra(jsnData,function(aryData){
                                        if(aryData.success){
                                            toastr.success(aryData.success);
                                        } else {
                                            toastr.error(aryData.error);
                                        }
                                    });

                                });

                            break;
                            case "radio":
                                
                                $('input:radio[name='+sWidgetSystem+']').val([sValue]);

                                $('input:radio[name='+sWidgetSystem+']').off();

                                $('input[type=radio][name='+sWidgetSystem+']').change(function() {

                                    var jsnData= {
                                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                        nIdEmpleado : $("body").data("nidempleado"),
                                        sWidget     : sWidget,
                                        sCol        : $(this).attr('name'),
                                        sVal        : $(this).val()
                                    };

                                    fncActualizarControlExtra(jsnData,function(aryData){
                                        if(aryData.success){
                                            toastr.success(aryData.success);
                                        } else {
                                            toastr.error(aryData.error);
                                        }
                                    });


                                });

                            break;
                        }
                    });
                }

               
                $("#formProspecto").find(".btn-submit").hide();
                $("#formProspecto").modal("show");
                toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }
        });
    }

    window.fncActualizarCliente = function(element){

        if( typeof $("#formProspecto").data("nIdRegistro") != "undefined" && $("#formProspecto").data("nIdRegistro") > 0){

            var nIdCliente = element.val().trim();

            if(nIdCliente != 0){

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    nIdEmpleado : $("body").data("nidempleado"),
                    sCol        : 'nIdCliente',
                    sVal        :  nIdCliente
                };

                fncActualizarControlExtra(jsnData,function(aryData){
                    if(aryData.success){
                        toastr.success(aryData.success);
                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }

        }
    }   

    window.fncActualizarTitulo = function(element){

        if( typeof $("#formProspecto").data("nIdRegistro") != "undefined" && $("#formProspecto").data("nIdRegistro") > 0){
        
            var sTituloOld = element.data("sTituloOld");
            var sTitulo    = element.val().trim();

            if(sTituloOld != sTitulo){

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    nIdEmpleado : $("body").data("nidempleado"),
                    sCol        : 'sTitulo',
                    sVal        :  sTitulo
                };

                fncActualizarControlExtra(jsnData,function(aryData){
                    if(aryData.success){
                        toastr.success(aryData.success);
                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }

        }
    }

    window.fncDrawNotas = function(jsnData){

        var isPropietario =  jsnData.nIdTipoEntidad == $("body").data("nidempleado") ? true: false; 
       
        var sHtml = `
                 <div class="col-12 my-1 items">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <p class="m-0 font-14">${jsnData.dFechaActualizacion} - ${fncUc(jsnData.sAutor)}</p>
                        </div>
                        <div class="bd-highlight">
                             ${ isPropietario ? `<a href="javascript:;" class="text-danger btn-delete-actividad" onclick="fncEliminarNota(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">delete</i> <div></div></a>` : ``}
                        </div>
                    </div>
                    <div class="form-group mb-1">
                     <textarea ${ isPropietario ? `` : `readonly` } data-stext="${jsnData.sNota.replace(/"/g, '&quot;')}" onblur="fncGrabarNota(${jsnData.nIdRegistro},this);" class="form-control d-block" placeholder="Escribe una nota.."  cols="1" rows="1">${jsnData.sNota}</textarea>
                    </div>
                </div>`;
        
        return sHtml;
    
    }

    window.fncDrawCardCambios = function(jsnData){
        var sHtml = `
                 <div class="col-12 border-card p-2 my-1 items">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <p class="m-0 font-16">${jsnData.sFecha} - ${fncUc(jsnData.sNombreEmpleado)}</p>
                        </div>
                    </div>
                    <div class="d-block mb-1">
                        <p class="mb-0">${jsnData.sCambio}</p>
                    </div>
                </div>`;
        return sHtml;
    }

    window.fncCleanAll = function(){
        fncClearInputs($("#formCEActividad").find("form"));
        fncClearInputs($("#formCECliente").find("form"));
        fncClearInputs($("#formCECatalogo").find("form"));
        fncClearInputs($("#formCEAdjunto").find("form"));
    }

    window.fncBuscarDocument = function(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'api/' + jsnData.sTipo + '/' + jsnData.sNumeroDoc,
            beforeSend: function() {
                // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //  fncOcultarLoader();
            }
        });
    }

    window.fncActualizarSegmentacion = function(nIdSegmentacion,element){
        
        var nIdDetalleSegmentacion   = $(element).find("option:selected").val();
        var nIdProspectoSegmentacion = $(element).data("nIdProspectoSegmentacion");

        if(nIdProspectoSegmentacion == '0'){ return false; }

        var jsnData = {
            nIdProspectoSegmentacion  : nIdProspectoSegmentacion,
            nIdProspecto              : $("#formProspecto").data("nIdRegistro"),
            nIdSegmentacion           : nIdSegmentacion,
            nIdDetalleSegmentacion    : nIdDetalleSegmentacion
        };

        fncActualizaProspectoSegmentacion(jsnData,function(aryData){
            if(aryData.success){
                var sCambio  = "Se hizo una actualizacion en el campo " +$(element).parent().find("label").text();
                fncGuardarCambio(sCambio);
                toastr.success(aryData.success);
            }
        });

    }

    window.fncTriggerDrawProspecto = function(fncCallback = null){

        $("#content-ce-prospecto").html("");

        var jsnData = {
            nIdNegocio      : $("body").data("nidnegocio"),
            nEstadoCliente  : 1 // como aqui solo vamos a agregar los clientes tenemos que traer solo los activos
        };

        fncDrawProspecto(function(bStatus) {
            if(bStatus){
              window.fncEventListenerProspecto();
              fncCallback(true);
            }
        });
    }
    // Eventoss de formulario de prospecto
    window.fncEventListenerProspecto = function(){

        $("#btnCrearActividad").off();
        $("#btnAgregarCatalogo").off();
        $(".dropdown-menu-etapa a").off();
        $("#btnVerHistorial").off();
        $("#btnVerDetallesCliente").off();
        $("#nCambioConsultor").off();
        
        $("#btnCrearActividad").on("click", function() {
            window.fncCleanAll();
            window.sLatitudActividad = null;
            window.sLongitudActividad = null;
            $("#formCEActividad").data("nIdRegistro",0);
            $("#formCEActividad").find(".modal-title").html("Crear Cita");
            $("#content-cumplio-actividad").hide();
            $("#content-reprogramar").hide();
            $("#content-actividad").show();
            $("#formCEActividad").modal("show");
        });

        $("#btnAgregarCatalogo").on("click", function() {
            window.fncCleanAll();
            $("#formCECatalogo").data("nIdRegistro", 0);
            $("#formCECatalogo").modal("show");
        });

        $("#btnCrearCliente").on('click',function(){
            window.fncCleanAll();
            $("#formCECliente").find(".modal-title").html("Nuevo Cliente");
            $("#formCECliente").data("nIdRegistro",0);
            $("#btnViewFormEmpresa").trigger("click");
            $("#formCECliente").modal("show");
        });

        $(".dropdown-menu-etapa a").click(function(){

            $("#dropdownEtapa").text($(this).text());
            $("#dropdownEtapa").val($(this).text());

            var nIdEtapa = $(this).data("value");

            if( nIdEtapa == 0 ) { return false; }

            if( $("#formProspecto").data("nIdRegistro") != 0 ){ 

                if(nIdEtapa == $("body").data("nidetapaenproceso")){

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    };

                    fncDrawAdjuntos(jsnData);

                } else {

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                        nIdEmpleado : $("body").data("nidempleado"),
                        nIdNegocio  : $("body").data("nidnegocio"),
                        nIdEtapa    : nIdEtapa
                    };

                    fncActualizarEstadoProspecto(jsnData,function(aryData){
                       
                        if(aryData.success){
                        

                            switch(nIdEtapa){
                                case $("body").data("nidetaparechazado") : 

                                    alert("Ups.Se rechazo el prospecto porfavor indica una nota porque se rechazo.");

                                    var sNota = document.getElementById("sNota"); 
                                    sNota.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                
                                break;
                                case $("body").data("nidetapaenviopropuesta"):

                                    $("#btnDescargarPdfProspecto").attr("href",route( 'admin/prospecto/fncDownloadPropuesta/' + $("#formProspecto").data("nIdRegistro") ) );
                                    $("#btnDescargarPdfProspecto").show();
                                
                                break;
                            }

                         


                            
 

                            toastr.success(aryData.success);

                        } else {
                            alert(aryData.error);
                        }

                    });

                }
            }


        });

        $("#btnVerHistorial").on('click',function(){
            
            
            var nIdCliente  = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdCliente : nIdCliente,
                nIdNegocio : $("body").data("nidnegocio")
            };

            fncPopulateHistorialCliente(jsnData,(aryData)=>{

                if(aryData.success){
                    $("#tblHistorial").bootstrapTable("load",aryData.aryData);
                    $("#formHistorialCliente").modal("show");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }

            });

        });

        $("#btnVerDetallesCliente").on('click',function(){
            
            
            var nIdCliente = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdRegistro : nIdCliente,
             };

            fncMostrarCliente(jsnData,(aryData)=>{

                if(aryData.success){

                    console.log(aryData);
                    var aryData = aryData.aryData;

                    $("#sTipoClienteDetalle").html(aryData.sTipoCliente);
                    $("#sTipoDocDetalle").html(aryData.sTipoDoc);
                    $("#sNumeroDocumentoDetalle").html(aryData.sNumeroDocumento);
                    $("#sNombreoRazonSocialDetalle").html(aryData.sNombreoRazonSocial);
                    $("#sTipoClienteDetalle").html(aryData.sTipoCliente);
                    $("#sDistritoDetalle").html( aryData.sDpt + ' - ' + aryData.sProvincia + ' - ' + aryData.sDistrito );
                    $("#sDireccionDetalle").html(aryData.sDireccion);
                    $("#sContactoDetalle").html(aryData.sContacto);
                    $("#sRelacionamientoDetalle").html(aryData.sRelacionamiento);
                    $("#sTelefonoDetalle").html(aryData.sTelefono);
                    $("#sCorreoDetalle").html(aryData.sCorreo);


                    var sButtons = `
                        ${ aryData.sTelefono.length > 6 ? `<a target="_blank" class="wp" href="https://api.whatsapp.com/send?phone=+51${aryData.sTelefono}&text=Hola%20"><i class="fab fa-whatsapp"></i></a>`: ``} 
                        ${ aryData.sCorreo.length > 0 ? `<a target="_blank" class="mail" href="mailto:${aryData.sCorreo}"><i class="far fa-envelope-open"></i></a>`: ``} 
                        ${ aryData.sTelefono.length > 0 ? `<a target="_blank" class="phone" href="tel:${aryData.sTelefono}"><i class="fas fa-phone"></i></a>`: ``} 
                    `;

                    $("#content-buttons").html(sButtons);

                    $("#modalDetalleCliente").modal("show");

                 } else {
                    toastr.error(aryData.error);
                }

            });

        });

        $("#btnEditarCliente").on('click',function(){
            
            
            var nIdCliente  = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdRegistro : nIdCliente,
            };

            var sOpcion = 'editar';

            $("#formCECliente").data("nIdRegistro",nIdCliente);

            fncMostrarCliente(jsnData,(aryData)=>{

                if(aryData.success){
                   
                    var aryData = aryData.aryData;

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
                    $("#sDireccion" + sEntidadCliente ).val(aryData.sDireccion);
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

        });

        $("#nCambioConsultor").on("change",function(){
            
            if($(this).val() == 0) return;

            var jsnData = {
                nIdProspecto : $("#formProspecto").data("nIdRegistro"),
                nIdEmpleado  : $(this).val().trim()
            };

            fncActualizaEmpleadoProspecto(jsnData,(aryData)=>{
                if(aryData.success){
                    //alert("Al cambiar el prospecto a otro asesor de ventas ud ya no podra ver este prospecto e");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });




    }

    window.fncDrawProspecto = function(fncCallback) {

        var jsnData = {
            nIdNegocio: $('body').data('nidnegocio')
        };

        fncBuildFormProspecto(jsnData, function(aryData) {
            $("#formProspecto").data("aryDataForm",aryData.aryData);
            $("#content-ce-prospecto").html(fncBuildFormPro(aryData.aryData));
            fncCallback(true);
        });
    }

    window.fncGetDataTableCatalogo = function(sTable){
        var aryData = [];
        
        $(sTable).find("tbody").find("tr").each(function(){

            var nIdCatalogo = $(this).find("td").eq(0).html();
            var nCostoItem  = $(this).find("td").eq(3).find(".costo-unitario").val();
            var nCantidad   = $(this).find("td").eq(4).find(".cantidad").val();

            aryData.push({
                nIdCatalogo : nIdCatalogo,
                nPrecio     : nCostoItem,
                nCantidad   : nCantidad    
            });

        });

        return aryData;
    }

    window.fncGrabarNota  = function(nIdRegistro,element){
        
        var sNota         = $(element).val().trim();
        var sNotaAnterior = $(element).data("stext").trim();

        // Si la nota es igual o vacia no lo actualiza 
        if(sNota == '' || sNotaAnterior == sNota ) { return false;}

        var jsnData = {
            nIdRegistro      : nIdRegistro,
            nIdProspecto     : $("#formProspecto").data("nIdRegistro"),
            nIdTipoEntidad   : $("body").data("nidempleado"),
            nTipoEntidad     : $("body").data("ntipoentidadnotaempleado"),
            sNota            : sNota,
            nEstado          : 1
        };

        fncGrabarProspectoNota(jsnData,function(aryData){
           
            if(aryData.success){

                toastr.success(aryData.success);

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };

                fncListarNota(jsnData);
                if(nIdRegistro == 0) {$("#sNota").val("");}
            } else {
                toastr.error(aryData.error);
            }

        });
    }
    
    window.fncEliminarNota  = function(nIdRegistro,element){
        
        if(confirm("¿Estas seguro de eliminar este item?")){

            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEliminarProspectoNota(jsnData, function(aryData){

                if(aryData.success){
                    
                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro")
                    };

                    fncListarNota(jsnData);
                    fncGuardarCambio("Se elimino una nota");

                    toastr.success(aryData.success);
            
                } else {
                    toastr.error(aryData.error);
                }

            });
        }
    }

    window.fncGuardarCambio = function(sCambio,nIdEtapa = ''){

        var jsnData = {
            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
            nIdEmpleado : $("body").data("nidempleado"),
            sCambio     : sCambio,
            nIdEtapa    : nIdEtapa,
            nEstado     : 1
        };

        fncGrabarCambioProspecto(jsnData ,function(aryData){
            if(aryData.success){

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };
                
                fncListarCambios(jsnData);
                
                //toastr.success(aryData.success);

            } else {
                toastr.error(aryData.error);
            }
        });

    }

    window.fncListarNota  = function(jsnData){
        
        $("#content-notas").html("");

        fncGetProspectoNotaByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length>0){

                    aryData.aryData.forEach((element) => {

                        var jsnNota = {
                            nIdRegistro         : element.nIdNota,
                            sAutor              : element.sAutor,
                            nIdTipoEntidad      : element.nIdTipoEntidad,
                            dFechaActualizacion : moment(element.dFechaActualizacion,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sNota               : element.sNota
                        };

                        sHtml += fncDrawNotas(jsnNota);
                    });

                    sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action="show" class="ShowMore">Ver Todo</a></div>`;
                    
                    $("#content-notas").html(sHtml);
                    fncEventListenerShowMoreLess();
            
                }

                //toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncListarActividades = function(jsnData){
        
        $("#content-actividades").html("");

        fncGetActividadByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length>0){

                    aryData.aryData.forEach((element) => {

                        var jsnCard = {
                            nIdRegistro     : element.nIdActividad,
                            jsnData         : null,
                            nEdit           : 0,
                            event           : `fncValidarActividad(${element.nIdActividad});`,
                            sColor          : element.sColor,
                            sNombreEmpleado : element.sEmpleado,
                            sFechaCreacion  : element.dFechaCreacion,
                            sFechaActividad : moment(element.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sHoraActividad  : element.dHora,
                            sEstado         : element.sEstadoActividadLarga
                        };

                        sHtml += fncDrawCardActividad(jsnCard);
                    });

                    $("#content-actividades").html(sHtml);
            
                }

                //toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncListarCambios  = function(jsnData){
        
        $("#content-cambios").html("");

        fncGetCambioProspectoByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length>0){

                    aryData.aryData.forEach((element) => {

                        var jsnNota = {
                            sNombreEmpleado : element.sNombreEmpleado,
                            sFecha          : moment(element.dFechaCreacion,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sCambio         : element.sCambio
                        };

                        sHtml += fncDrawCardCambios(jsnNota);
                    });

                    sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action='show' class="ShowMore">Ver Todo</a></div>`;

                    $("#content-cambios").html(sHtml);
                    fncEventListenerShowMoreLess();
                }

               // toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncDrawAdjuntos = function(jsnData , bShow= true){
        
        fncClearInputs($("#formCEAdjunto").find("form"));
        $("#content-adjuntos").html(``);

        fncObtenerProspectoAdjuntosByIdProspecto(jsnData,function(aryData){
            if(aryData.success){

                $("#btnDescargarContrato").attr("href","javascript:;");
                $("#btnDescargarContrato").attr("download","");
                $("#btnEliminarContrato").attr("onclick","");
                $("#sContrato").data( "nIdAdjunto",0);
                $(".dw-contrato").hide();

                var aryData = aryData.aryData;
                
                $("#formCEAdjunto").data("nIdRegistro",0); //  Se va a crear nuevos adjuntos

                if(aryData.length>0){

                    $("#formCEAdjunto").data("nIdRegistro",1); //  Se van a editar nuevos adjuntos
                    
                    fncClearInputs($("#formCEAdjunto").find("form"));

                    var sHtml = `<p id="titulo-adjuntos" class="mb-0">Adjuntos: </p>`;
                    var nExistenAdjuntosOtros = false;

                    aryData.forEach(aryElement => {

                        if(aryElement.nContrato == 1){
                            
                            $("#sContrato").data( "nIdAdjunto", aryElement.nIdAdjunto );
                            
                            $("label[for='sContrato']").html( aryElement.sNombreArchivo );

                            $("#btnDescargarContrato").attr("href",docs(aryElement.sNombreArchivo));
                            $("#btnDescargarContrato").attr("download",aryElement.sNombreArchivo);
                            $("#btnEliminarContrato").attr("onclick","fncEliminarAdjunto(" + aryElement.nIdAdjunto + ");");

                            $(".dw-contrato").show();

                        } else {

                            nExistenAdjuntosOtros = true;
                                
                            var jsnData = {
                                nIdAdjunto      : aryElement.nIdAdjunto, 
                                sLinkArchivo    : docs(aryElement.sNombreArchivo),
                                sNombreArchivo  : aryElement.sNombreArchivo
                            };

                            sHtml += fncDrawItemAdjunto(jsnData);
                            
                        }

                    });

                    $("#content-adjuntos").html(sHtml);
                    setTimeout(() => {
                        
                        if(nExistenAdjuntosOtros){
                            $("#titulo-adjuntos").show();
                        } else {
                            $("#titulo-adjuntos").hide();
                        }
                    }, 200);
                    
               
                }
                if(bShow) {
                    $("#formCEAdjunto").modal("show");
                }

            } else {
                toastr.error(error);
            }

        });

    }

    window.fncSetEtapa = function(nIdEtapa){
       var sEtapa =  $("#nIdEtapa-"+nIdEtapa).text();
       $("#dropdownEtapa").text(sEtapa);
    }

    window.fncCompareDate = function(dateTimeA, dateTimeB) {
        var momentA = moment(dateTimeA,"DD/MM/YYYY");
        var momentB = moment(dateTimeB,"DD/MM/YYYY");
        if (momentA > momentB) return 1;
        else if (momentA < momentB) return -1;
        else return 0;
    }

    // llamadas al servidor

    function fncBuildFormProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'formularios/fncBuildFormProspecto',
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

    function fncGrabarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            } ,
            error :function(error){
                alert(JSON.stringify(error));
            }
        });
    }

    function fncMostrarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncMostrarRegistro',
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

    function fncGetProspectos(jsnData, bShowLoader = true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectos',
            data: jsnData,
            beforeSend: function() {
                if(bShowLoader)fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader)fncOcultarLoader();
            }
        });
    }

    function fncActualizaProspectoSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizaProspectoSegmentacion',
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

    function fncGetProspectoNotaByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectoNotaByIdProspecto',
            data: jsnData,
            beforeSend: function() {
               // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //fncOcultarLoader();
            }
        });
    }
    
    function fncGrabarProspectoNota(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoNota',
            data: jsnData,
            beforeSend: function() {
                //fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //fncOcultarLoader();
            }
        });
    }

    function fncEliminarProspectoNota(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoNota',
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

    function fncActualizarControlExtra(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizarControlExtra',
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

    function fncGetCambioProspectoByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetCambioProspectoByIdProspecto',
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

    function fncGrabarCambioProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarCambioProspecto',
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

    function fncActualizarEstadoProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizarEstadoProspecto',
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

    function fncPopulateHistorialCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncPopulateHistorialCliente',
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

    function fncGetActividadesNoCumplidas(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetActividadesNoCumplidas',
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

    function fncMostrarCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncMostrarRegistro',
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

    function fncActualizaEmpleadoProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizaEmpleadoProspecto',
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
<!-- Prospecto -->



<!-- Empleado -->
<script>
    
    window.sEntidadVendedor = '-3';

    $(document).ready(function() {
        fncDrawEmpleado(function(bEstatus) {
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
                fncMostrarEmpleado();
            }
        });


        $("#formEmpleado").find("form").on('submit', function(event) {

            event.preventDefault();
            
            var nIdRegistro                     = $("#formEmpleado").data("nIdRegistro");
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
            
            fncGrabarEmpleado(formData, function(aryData) {
                if (aryData.success) {
                    toastr.success(aryData.success);
                    $("#formEmpleado").modal("hide");
                    location.reload();
                } else {
                    toastr.error(aryData.error);
                }
            });

        });

        $("#btnEditarEmpleado").on("click", function() {
            $("#formEmpleado").modal("show");
        });

    });

    function fncDrawEmpleado(fncCallback) {

        var jsnData = {
            nIdEntidad: 3,
            nIdNegocio: $('body').data('nidnegocio')
        };

        fncObtenerDataForm(jsnData, function(aryData) {
            $("#content-empleado").html(fncBuildForm(aryData));
            fncCallback(true);
        });

    }

    function fncMostrarEmpleado() {

        var jsnData = {
            nIdRegistro: $("body").data("nidempleado")
        };

        fncMostrarRegistroEmpleado(jsnData, function(aryData) {
            if (aryData.success) {
                var aryData = aryData.aryData;

                $("#formEmpleado").data("nIdRegistro", aryData.nIdEmpleado);

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

            }
        });
    }

    // LLamadas al servidor
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

    function fncMostrarRegistroEmpleado(jsnData, fncCallback) {
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

   
</script>
<!-- Empleado -->



<!-- Cliente -->
<script>
    window.sEntidadCliente = '-1';
    $(document).ready(function() {
        


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
            } 
            
            // if (nIdDepartamento.length > 0 && nIdDepartamento.val() == '0') {
            //     toastr.error('Error. Seleccione un departamento. Porfavor verifique');
            //     return;
            // } else if (nIdProvincia.length > 0 && nIdProvincia.val() == '0') {
            //     toastr.error('Error. Seleccione una provincia. Porfavor verifique');
            //     return;
            // } else if (nIdDistrito.length > 0 && nIdDistrito.val() == '0') {
            //     toastr.error('Error. Seleccione un distrito. Porfavor verifique');
            //     return;
            // } 

            var bExisteCorreo   = false ;
            var bExisteTelefono = false ;

            if(sCorreo.length > 0  && sCorreo.val().trim().length > 0) bExisteCorreo = true;
            if(sTelefono.length > 0  && sTelefono.val().trim().length > 0) bExisteTelefono = true;

            if(!bExisteCorreo){
                if (sTelefono.length > 0 && sTelefono.val() == '') {
                    toastr.error('Error. Ingrese un telefono. Porfavor verifique');
                    return;
                }
            }

            if(!bExisteTelefono){
                if (sCorreo.length > 0 && sCorreo.val() == '') {
                    toastr.error('Error. Ingrese un correo. Porfavor verifique');
                    return;
                }
            }
          

            if (sForm == 'EMPRESA') {
                // if (sContacto.length > 0 && sContacto.val() == '') {
                //     toastr.error('Error. Ingrese un contacto. Porfavor verifique');
                //     return;
                // } else if (nIdRelacionamiento.length > 0 && nIdRelacionamiento.val() == '0') {
                //     toastr.error('Error. Seleccione un relacionamiento. Porfavor verifique');
                //     return;
                // } 
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

                    var jsnData ={
                        nIdNegocio : nIdNegocio
                    };

                    fncGetClientes(jsnData,function(aryDataLista){
                        if(aryDataLista.success){

                            var aryLista = aryDataLista.aryData;
                            var sOption  = ``;
                            
                            sOption += `<option value="0">Seleccionar</option>`;
                            
                            aryLista.forEach(function (element, nIndex) {
                                sOption += `<option value="${element.nIdCliente}">${element.sNombreoRazonSocial}</option>`;
                            });

                            $("#nIdCliente").html(sOption);

                            setTimeout(() => {
                                $("#nIdCliente").val(aryData.nIdClienteNew).trigger("change");
                            }, 200);

                        }
                    });


                    $("#formCECliente").modal("hide");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });


    });

   


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

    function fncGetClientes(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncGetClientes',
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
<!-- Cliente -->


<!-- Catalogo -->
<script>

    $(document).ready(function() {

        $("#nIdCatalogo").on('change',function(){

            if( parseInt( $(this).find("option:selected").val() ) === 0) {$("#nCostoUnitario").val(0); return false;}
            
            var nPrecio = $(this).find("option:selected").data("nprecio");

            $("#nCostoUnitario").val( fncNf(nPrecio) );
        });
        

        // Submit del formulario de Cliente
        $("#formCECatalogo").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro            = $("#formCECatalogo").data("nIdRegistro");
            var nIdCatalogo            = $("#nIdCatalogo").find("option:selected").val();
            var sCatalogo              = $("#nIdCatalogo").find("option:selected").text();
            var nPrecio                = $("#nIdCatalogo").find("option:selected").data("nprecio");
            var sTipoItem              = $("#nIdCatalogo").find("option:selected").data("ntipoitem");
            var nCantidad              = $("#nCantidad").val();
            var nTotal                 = parseFloat(nPrecio) * parseFloat(nCantidad);
            var sTable                 = sTipoItem == "PRODUCTO" ? "#table-productos" : "#table-servicios";
        
            if (nIdCatalogo == 0) {
                toastr.error('Error. Seleccione un producto o servicio. Porfavor verifique');
                return;
            } else if(nPrecio <= 0){
                toastr.error('Error. Ingrese un precio de producto o servicio. Porfavor verifique');
                return;
            } else if(nCantidad <= 0){
                toastr.error('Error. Ingrese una cantidad. Porfavor verifique');
                return;
            }
     
            var jsnData = {
                    nIdRegistro     : nIdRegistro,
                    nIdProspecto    : $("#formProspecto").data("sAccion") == 'crear' ? 0 : $("#formProspecto").data("nIdRegistro"),
                    nIdCatalogo     : nIdCatalogo,
                    sTable          : sTable,
                    sCatalogo       : sCatalogo,
                    nPrecio         : nPrecio,
                    nCantidad       : nCantidad,
                    nTotal          : nTotal
                };

            if( $("#formProspecto").data("sAccion") == 'crear') {
                $(sTable).find("tbody").append(fncDrawFilaCatalogo(jsnData));
                
                setTimeout(()=>{ 
                    fncTotales(null, sTable); 
                }, 1000);

            } else {

                fncGrabarProspectoCatalogo(jsnData,function(aryData){
                    if (aryData.success) {

                        var jsnData = {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarCatalogo(jsnData);

                    } else {
                        toastr.error(aryData.error);
                    }
                });

            } 
            
            $("#formCECatalogo").modal("hide");

        });


    });

    window.fncDrawFilaCatalogo = function(jsnData){   
        var sHtml = ``;  
        sHtml = `<tr> 
                    <td class="d-none">${jsnData.nIdCatalogo}</td>
                    <td><div><a href="javascript:;" class="text-danger font-18" onclick="fncEliminarItem(${jsnData.nIdCatalogo},'${jsnData.sTable}',this);" title="Eliminar"><i class="material-icons">delete</i></a></div></td>
                    <td><div>${jsnData.sCatalogo}</div></td>
                    <td class="cont-number"><div><input onblur="fncTotales(${jsnData.nIdCatalogo},'${jsnData.sTable}',event);" onkeyup="fncTotales('${jsnData.sTable}',event);" type="number" min="0.00" max="9999999.99" step="0.01" value="${jsnData.nPrecio}" autocomplete="off" class="form-control font-12 costo-unitario text-center"></div></td>
                    <td class="cont-number"><div><input onblur="fncTotales(${jsnData.nIdCatalogo},'${jsnData.sTable}',event);" onkeyup="fncTotales('${jsnData.sTable}',event);" type="number" value="${jsnData.nCantidad}" min="1" max="9999999" step="1" autocomplete="off" class="form-control font-12 cantidad text-center"></div></td>
                    <td><div>${fncNf(jsnData.nTotal)}</div></td>
                </tr>`;
        return sHtml;
    }

    window.fncListarCatalogo = function(jsnData){

        fncGetProspectoCatalogoByIdProspecto(jsnData,function(aryDataList){

            if(aryDataList.success){

                $('#table-productos').find("tbody").html("");
                $('#table-servicios').find("tbody").html("");

                var aryDataList = aryDataList.aryData;
                var bExistsProd = false;
                var bExistsServ = false;

                $("#table-productos").hide();
                $("#table-servicios").hide();

                $.each(aryDataList, function (nKeyItem, element) {

                    var sTable = element.sTipoItem == 'PRODUCTO' ? '#table-productos' : '#table-servicios';

                    if(element.sTipoItem == 'PRODUCTO') bExistsProd = true;
                    if(element.sTipoItem == 'SERVICIO') bExistsServ = true;

                    var jsnDataFilas = {
                            nIdCatalogo     : element.nIdProspectoCatalogo,
                            sTable          : sTable,
                            sCatalogo       : element.sNombreCatalogo,
                            nPrecio         : element.nPrecio,
                            nCantidad       : element.nCantidad,
                            nTotal          : parseFloat(element.nPrecio) * parseFloat(element.nCantidad)
                    };

                    $(sTable).find("tbody").append(fncDrawFilaCatalogo(jsnDataFilas));

                });

                if(bExistsProd) $("#table-productos").show();
                if(bExistsServ) $("#table-servicios").show();

                setTimeout(()=>{ 
                    fncTotales(null,'#table-productos'); 
                    fncTotales(null,'#table-servicios');
                }, 1000);

            } else {
                toastr.error(aryDataList.error);
            }
        });

    }

    window.fncEliminarItem  = function(nIdCatalogo,sTable,element){
        
        if(confirm("¿Estas seguro de eliminar este item?")){

            if($("#formProspecto").data("sAccion") == 'crear'){
                $(element).parent().parent().parent().remove();
            } else {

                var jsnData = {
                    nIdRegistro : nIdCatalogo
                };

                fncEliminarProspectoCatalogo(jsnData, function(aryData){

                    if(aryData.success){
                        
                        var jsnData= {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarCatalogo(jsnData);
                        fncGuardarCambio("Se elimino un producto o servicio");
                        //toastr.success(aryData.success);
                    
                    } else {
                        toastr.error(aryData.error);
                    }

                });

            }
            
            setTimeout(()=>{ fncTotales(sTable); }, 500);
        }
    }

    window.fncTotales = function(nIdCatalogo,sTable,event = null){

        var nTotal         = 0;
        var nCantidadTotal = 0;

        $(sTable).find("tbody").find("tr").each(function(){

            var nCostoItem = $(this).find("td").eq(3).find(".costo-unitario").val();
            var nCantidad  = $(this).find("td").eq(4).find(".cantidad").val();
            var nTotalItem = parseFloat(nCostoItem) * parseFloat(nCantidad);

            $(this).find("td").eq(5).find("div").html( fncNf(nTotalItem) );
            
            if(event != null && event.type == "blur"){

                $(this).find("td").eq(3).find(".costo-unitario").val( fncNf(nCostoItem) );

                if( $("#formProspecto").data("sAccion") == 'editar' ){
                    
                    var jsnData = {
                        nIdRegistro   : nIdCatalogo ,
                        nIdProspecto  : $("#formProspecto" ).data("nIdRegistro"),
                        nPrecio       : nCostoItem,
                        nCantidad     : nCantidad
                    };

                    fncGrabarProspectoCatalogo(jsnData,function(aryData){
                        if(aryData.success){
                            //toastr.success(aryData.success);
                        }else{
                            toastr.error(aryData.error);
                        }
                    });

                }

            }

            nTotal          += nTotalItem;
            nCantidadTotal  += parseInt(nCantidad);
        });
        
        $(sTable).find(".total").html(fncNf(nTotal));
        $(sTable).find(".cantidad-total").html(nCantidadTotal);
    }

    // LLamadas al servidor 

    function fncGrabarProspectoCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoCatalogo',
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

    function fncGetProspectoCatalogoByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectoCatalogoByIdProspecto',
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

    function fncEliminarProspectoCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoCatalogo',
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
<!-- Catalogo -->

<!-- Actividad -->
<script>

    window.sLatitudActividad = null;
    window.sLongitudActividad = null;

    $(document).ready(function() {
        
        
        $("#formCEActividad").data("nIdItem",0);
        $("#sFechaActividad").attr("min", moment().format('YYYY-MM-DD'));

        // Submit del formulario de Cliente
        $("#formCEActividad").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro         = $("#formCEActividad").data("nIdRegistro");
            var sFechaActividad     = $("#sFechaActividad").val();
            var sHoraActividad      = $("#sHoraActividad").val();
            var sNota               = $("#sNotaActividad").val();
            var nCumplioActividad   = $('input[name=nCumplioActividad]:checked').val();

            console.log(nCumplioActividad);

            if ( nCumplioActividad != '1' ) {
                if (sFechaActividad == "") {
                    toastr.error('Error. Seleccione un fecha de la cita. Porfavor verifique');
                    return;
                } else if (sHoraActividad == "") {
                    toastr.error('Error. Seleccione una hora de la cita. Porfavor verifique');
                    return;
                }
            }


            // nTipoActividad - 1 Cita
            var jsnData = {
                nIdRegistro         : nIdRegistro,
                nIdEmpleado         : $("body").data("nidempleado"),
                nIdEstadoActividad  : nCumplioActividad  == 1 ?  $("body").data("nestadoejecutado") : $("body").data("nestadopendiente"),
                nIdProspecto        : $("#formProspecto").data("sAccion") == 'crear' ? 0 : $("#formProspecto").data("nIdRegistro"),
                nTipoActividad      : $("body").data("ntipoactividadcita"),
                sFechaActividad     : sFechaActividad,
                sHoraActividad      : sHoraActividad,
                sLatitud            : sLatitudActividad,
                sLongitud           : sLongitudActividad,
                sNota               : sNota,
                nEstado             : 1
            };

            if($("#formProspecto").data("sAccion") == 'crear'){

                if(nIdRegistro == 0){
                    

                    var nIdRegistro = 0 ;

                    $('.content-actividades').find('.content-actividad').each(function () {
                        nIdRegistro ++ ;
                    });

                    nIdRegistro += 1; 

                    $("#formCEActividad").data( "nIdRegistro" , nIdRegistro ); 

                    var jsnCard = {
                        nIdRegistro     : nIdRegistro,
                        jsnData         : jsnData,
                        event           : '',
                        sColor          : "verde",
                        sNombreEmpleado : $("body").data("snombre"),
                        sFechaCreacion  : moment().format('DD/MM/YYYY'),
                        sFechaActividad : moment(sFechaActividad,'YYYY-MM-DD').format('DD/MM/YYYY'),
                        nEdit           : 1,
                        sHoraActividad  : sHoraActividad,
                        sEstado         : "Pendiente"
                    };

                    console.log(jsnCard);

                    $("#content-actividades").append(fncDrawCardActividad(jsnCard));
                    
                } else {
                    console.log(nIdRegistro , 'editar');

                    $("#content-actividad-"+nIdRegistro).data("jsndata",jsnData);
                    $("#content-actividad-"+nIdRegistro).find(".f-creacion").html( "Fecha creacion : "+ moment().format('DD/MM/YYYY') );
                    $("#content-actividad-"+nIdRegistro).find(".f-ejecucion").html( "Fecha ejecucion : " + moment(sFechaActividad,'YYYY-MM-DD').format('DD/MM/YYYY') );
                    $("#content-actividad-"+nIdRegistro).find(".h-ejecucion").html( "Hora ejecucion : " + sHoraActividad );
                }

            } else {

                fncGrabarProspectoActividad(jsnData,function(aryData){

                        if(aryData.success){
                            
                            var jsnData = {
                                nIdRegistro  : $("#formProspecto").data("nIdRegistro"),
                                nIdActividad : $("body").data("ntipoactividadcita"), 
                            };

                            fncListarActividades(jsnData);

                            if(aryData.bChangeEstado){
                                $("#btnVerAdjuntos").show();
                                fncSetEtapa(aryData.nIdEtapaNegociacion);
                             }

                            toastr.success(aryData.success);
                        } else {
                            toastr.error(aryData.error);
                        }

                });

                
            }
           
            $("#formCEActividad").modal("hide");
           
        });

        $('input[type=radio][name=nCumplioActividad]').change(function() {
            if (this.value == '1') {
                fncMostrarLoader();
                fncGetLocation();
                $("#content-actividad").hide();
            } else if (this.value == '0') {
                window.sLatitudActividad   = null;
                window.sLongitudActividad  = null;
                $("#content-actividad").show();
            }
        });
 

       
        
    });

    window.fncValidarActividad = function(nIdRegistro){
        fncCleanAll();
        $("#formCEActividad").data( "nIdRegistro" , nIdRegistro );
        $("#formCEActividad").find(".modal-title").html("¿Cumplio la Cita?");
        $("#content-cumplio-actividad").show();
        $("#content-actividad").hide();
        $("#formCEActividad").modal("show");
    } 

    window.fncDrawCardActividad = function(jsnData){
        var sHtml = `
                    <div id="content-actividad-${jsnData.nIdRegistro}" data-nidregistro="${jsnData.nIdRegistro}" data-jsndata='${JSON.stringify(jsnData.jsnData)}' class="border-card p-2 content-actividad border-left-pr color-border-left-${jsnData.sColor} mb-2">
                        <div class="row">
                            <div onclick="${jsnData.event}" class="col-9">
                                <p class="titulo">Cita - ${jsnData.sNombreEmpleado} </p>
                                <p class="f-creacion">Fecha creacion  : ${jsnData.sFechaCreacion}</p>
                                <p class="f-ejecucion">Fecha ejecucion : ${jsnData.sFechaActividad}</p>
                                <p class="h-ejecucion">Hora ejecucion  : ${jsnData.sHoraActividad}</p>
                                <p>Estado : ${jsnData.sEstado}</p>
                            </div>
                            <div class="col-3 text-right">
                                ${jsnData.nEdit == '1' ? `<a href="javascript:;" class="text-primary btn-delete-actividad" onclick="fncEditarActividad(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">edit</i> </a>` : ''}
                                <a href="javascript:;" class="text-danger btn-delete-actividad"  onclick="fncEliminarActividad(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">delete</i> </a>
                            </div>
                        </div>
                    </div>
                `;

        return sHtml;
    }


    window.fncSuccessHandler = function (position) {
        toastr.success("Genial!. Ubicacion obtenida exitosamente.");
        window.sLatitudActividad  = position.coords.latitude;
        window.sLongitudActividad = position.coords.longitude;
        console.log(window.sLatitudActividad ,  window.sLongitudActividad );
        fncOcultarLoader();
    };

    window.fncErrorHandler = function (error) {
        
        switch (error.code) {
            case error.PERMISSION_DENIED:
                //La usuario denegó la solicitud de geolocalización.
                alert("Para una mejor experiencia te pedimos que actives tu ubicacion.");
                 break;
            case error.POSITION_UNAVAILABLE:
                //La información de ubicación no está disponible
                break;
            case error.TIMEOUT:
                //Se agotó el tiempo de espera de la solicitud para obtener la ubicación del usuario.
                break;
            case error.UNKNOWN_ERROR:
                console.log("error no esperado");
                break;
        }

        fncOcultarLoader();
    };

    window.fncGetLocation = function() {
        try {
            
            navigator.geolocation.getCurrentPosition(fncSuccessHandler, fncErrorHandler, {
                timeout: 0,
                enableHighAccuracy: true,
                maximumAge: 0,
            });

        } catch (error) {
            console.log(error);
        }
    }



    function fncEditarActividad(nIdRegistro,element){
            var jsnData  = $("#content-actividad-" + nIdRegistro).data("jsndata");
            $("#formCEActividad").data("nIdRegistro",nIdRegistro);
            $("#sFechaActividad").val(jsnData.sFechaActividad);
            $("#sHoraActividad").val(jsnData.sHoraActividad);
            $("#sNotaActividad").val(jsnData.sNota);
            $("#formCEActividad").modal("show");
    }

    function fncEliminarActividad(nIdItem,element){

        if(confirm("¿Estas seguro de eliminar este item?")){

            if($("#formProspecto").data("sAccion") == 'crear'){
                $("#content-actividad-" + nIdItem).remove();
            } else {

                var jsnData = {
                    nIdRegistro : nIdItem
                };

                fncEliminarProspectoActividad(jsnData, function(aryData){
                    if(aryData.success){
                        
                        var jsnData= {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarActividades(jsnData);
                        fncGuardarCambio("Se elimino una cita");

                        toastr.success(aryData.success);

                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }
        }

    }

    // LLamadas al servidor 

    function fncGrabarProspectoActividad(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoActividad',
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

    function fncEliminarProspectoActividad(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoActividad',
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

    function fncGetActividadByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetActividadByIdProspecto',
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
<!-- Actividad -->


<!-- Adjuntos -->
<script>

    $(document).ready(function() {

  

        // Submit del formulario de Cliente
        $("#formCEAdjunto").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro         = typeof $("#formCEAdjunto").data("nIdRegistro") ==='undefined' ? 0 : $("#formCEAdjunto").data("nIdRegistro")  ;
            var nIdProspecto        = $("#formProspecto").data("nIdRegistro");
            var sContrato           = $("#sContrato")[0].files[0];
            var nIdAdjuntoContrato  = typeof $("#sContrato").data("nIdAdjunto") ==='undefined' ? 0 : $("#sContrato").data("nIdAdjunto")  ;

            var formData = new FormData();
            formData.append('nIdRegistro', nIdRegistro);
            formData.append('nIdProspecto', nIdProspecto);
            formData.append('nIdEmpleado', $("body").data("nidempleado"));
            formData.append('nIdAdjuntoContrato',nIdAdjuntoContrato);
            formData.append('sContrato',sContrato);

            $.each($('#aryOtros')[0].files,function(key,input){
                formData.append('aryOtros[]', input);
            });

            // console.log(nIdAdjuntoContrato);

          
            fncGrabarProspectoAdjunto(formData,(aryData)=>{
                if(aryData.success){

                    if(aryData.bChangeEstado){
                        fncSetEtapa(aryData.nIdEtapaEnProceso);
                     }

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    };


                    if( sContrato != null ){
                        fncGuardarCambio("Se "+ (nIdRegistro == 0 ? "agrego" : "actualizo")  +" el contrato");
                    } 

                    if( $('#aryOtros')[0].files != null &&  $('#aryOtros')[0].files.length > 0 ){
                        fncGuardarCambio("Se agrego "+$('#aryOtros')[0].files.length+" Adjuntos");
                    }



                    fncDrawAdjuntos(jsnData,false);

                    toastr.success(aryData.success);
                }else{
                    alert(aryData.error);
                    //toastr.error(aryData.error);
                }
            });
            
            
           
        });

       
        
    });

    // Funciones Auxiliares

    function fncDrawItemAdjunto(jsnData){

        var sHtml = `
                <div class="card my-2 p-2">
                    <div class="d-flex flex-center">
                        <div><a href="${jsnData.sLinkArchivo}" download="${jsnData.sNombreArchivo}">${jsnData.sNombreArchivo}</a></div>
                        <div class="ml-auto"><a class="color-black" href="${jsnData.sLinkArchivo}" download="${jsnData.sNombreArchivo}"><i class="fas fa-download"></i></a></div>
                        <div class="mx-2"><a href="javascript:;" class="text-danger font-18" onclick="fncEliminarAdjunto(${jsnData.nIdAdjunto});" title="Eliminar"><i class="material-icons">delete</i></a></div>
                    </div>
                </div>
        `;

        return sHtml;
    }

    // Funciones Auxiliares 

    window.fncEliminarAdjunto = function(nIdRegistro){

        if(confirm("¿Estas seguro de eliminar este item?")){

                var jsnData = {
                    nIdRegistro : nIdRegistro
                };

                fncEliminarProspectoAdjunto(jsnData, function(aryData){
                    if(aryData.success){
                        
                        var jsnData = {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                        };

                        fncDrawAdjuntos(jsnData,false);
                        fncGuardarCambio("Se elimino un adjunto");

                        // En caso se haya eliminado el contrato el prospecto regresa ala etapa anterior 
                        if(aryData.bChangeEstado){
                            fncSetEtapa( $("body").data("nidetapanegociacion") );
                        }


                        toastr.success(aryData.success);

                    } else {
                        toastr.error(aryData.error);
                    }
                });
        }
        
    }


 
    // LLamadas al servidor 

    function fncGrabarProspectoAdjunto(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoAdjunto',
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

    function fncObtenerProspectoAdjuntosByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncObtenerProspectoAdjuntosByIdProspecto',
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

    function fncEliminarProspectoAdjunto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoAdjunto',
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
<!-- Adjuntos -->


<script>

// $(".btnIndi").on("click",function(){
//     $("#formIndi").modal("show");
// });

// $("#btn-ver-filtros,#btn-ver-filtros2").on("click",function(){

//     $("#formFilter").modal("show");
// });


</script>

</html>