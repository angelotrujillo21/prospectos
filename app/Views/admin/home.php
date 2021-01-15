<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body data-ntipoempleadosupervisor="<?=$nTipoEmpleadoSupervisor?>" 
      data-nidnegocio="<?=$nIdNegocio?>" 
      data-nidestadopendiente="<?=$nIdEstadoPendiente?>"
      data-setapas ="<?=$sEtapas?>"
      data-ntipoprospecto="<?=$aryNegocio["nTipoProspecto"]?>"
      data-ntipoprospectolargo = "<?=$nTipoProspectoLargo?>"
      data-nidetapaprogramada="<?=$nIdEtapaProgramada?>"
      data-nidetapaenviopropuesta="<?=$nIdEtapaEnvioPropuesta?>"
      data-nidetapanegociacion="<?=$nIdEtapaNegociacion?>"
      data-nidetapaenproceso="<?=$nIdEtapaEnProceso?>"
      data-nidetapacierre="<?=$nIdEtapaCierre?>"
      data-ntipoactividadcita = "<?=$nTipoActividadCita?>"
      data-nestadopendiente ="<?= $nIdEstadoActividadPen ?>" 
      data-nestadoejecutado = "<?= $nIdEstadoActividadEjecutado ?>"
      data-nidetaparechazado = "<?=$nIdEtapaRechazado?>"
      >

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>


    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['admin/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-2">

                    <div class="container-fluid">
                        <div class="page-header row no-gutters py-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small">
                                    <div class="card-body pt-1 pb-5">

                                        <!-- Fila Cabecera -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex ">
                                                    <div class="d-flex align-items-center p-2">
                                                        <span id="btnCleanFiltros" class="title-prospectos">Prospectos</span>
                                                    </div>
                                                    <div class="d-flex align-items-center p-2">

                                                    <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                        <?php foreach ($arySupervisores as $arySuper) : ?>
                                                            <div data-nidempleado="<?=$arySuper['nIdEmpleado']?>" class="cuadrado fondo-<?= strtolower($arySuper['sColorSuper'])?> super"></div>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                        
                                
                                                    </div>
                                                    <div class="d-flex align-items-center ml-auto p-2">

                                                    <?php if (is_array($aryVendedores)  && count($aryVendedores) > 0) : ?>
                                                        <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                            
                                                        <div data-nidempleado="<?=$aryVendedor['nIdEmpleado']?>" class="circulo-vendedor emp-indi" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre']) ?>">
                                                            <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                                        </div>

                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                            
                                
                                                    </div>
                                                    <div class="d-flex align-items-end p-2">
                                                        <a href="javascript:;" data-toggle="modal" data-target="#modalColaboradores">Ver Todo</a>
                                                    </div>

                                                    <div class="d-flex d-flex align-items-center p-2">
                                                        <button id="btnPendiente" class="btn btn-pendiente">Pendiente</button>
                                                    </div>

                                                    <div class="d-flex d-flex align-items-center p-2">
                                                        <button id="btnCrearInvitacion" class="btn btn-invitar">Invitar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin de Fila Cabecera -->

                                        <div class="row my-2">
                                            <div class="col-12">

                                                <div class="pr-scroll-x">

                                                    <div id="content-<?=$nIdEtapaProgramada?>"  class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Prospecto</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="list-p-<?=$nIdEtapaProgramada?>" class="content list-prospectos my-2">


                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaEnvioPropuesta?>" class="container-list-prospectos ">
                                                       
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Envio de propuesto</span>
                                                            </div>
                                                        </div>

                                                        <div  id="list-p-<?=$nIdEtapaEnvioPropuesta?>" class="list-prospectos my-2">

                                                         

                                                        </div>
                                                    </div>

                                                    <div  id="content-<?=$nIdEtapaNegociacion?>"  class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Negociacion</span>
                                                            </div>
                                                            
                                                        </div>

                                                        <div id="list-p-<?=$nIdEtapaNegociacion?>" class="list-prospectos my-2 content">

                                                  
                                                        </div>
                                                    </div>

                                                    <div  id="content-<?=$nIdEtapaEnProceso?>" class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">En Proceso</span>
                                                            </div>
                                                            
                                                        </div>

                                                        <div  id="list-p-<?=$nIdEtapaEnProceso?>" class="list-prospectos my-2">

                                                           


                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaCierre?>" class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Cierre</span>
                                                            </div>
                                                        </div>
                                                        <div id="list-p-<?=$nIdEtapaCierre?>" class="list-prospectos my-2">

                                                         

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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


    <div class="modal fade" id="formColaborador" tabindex="-1" role="dialog" aria-labelledby="formColaboradorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formColaboradorLabel">Invitar Colaborador</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="sEmail" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="sEmail" autocomplete="off" name="sEmail">
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Tipo:</label>
                                        <select class="form-control" name="nTipoEmpleado" id="nTipoEmpleado">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($aryTipoEmpleados)  && count($aryTipoEmpleados) > 0) : ?>
                                                <?php foreach ($aryTipoEmpleados as $aryTipoEmpleado) : ?>
                                                    <option value="<?= $aryTipoEmpleado['nIdCatalogoTabla'] ?>"><?= $aryTipoEmpleado['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>

                                        </select>
                                    </div>
                                </div>

                                <div id="container-color" class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Color:</label>
                                        <select class="form-control" name="nIdColor" id="nIdColor">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($aryColores)  && count($aryColores) > 0) : ?>
                                                <?php foreach ($aryColores as $aryColor) : ?>
                                                    <option value="<?= $aryColor['nIdCatalogoTabla'] ?>"><?= $aryColor['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>


                                <div id="container-supervisor" class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Supervisor:</label>

                                        <select class="form-control" name="nIdSupervisor" id="nIdSupervisor">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                <?php foreach ($arySupervisores as $arySuper) : ?>
                                                    <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= uc($arySuper['sNombre']) ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div id="content-link-copy" class="row flex-center">
                                <div class="col-8">
                                    <p class="mb-2 color-azul">Si no llego el correo puede utiliza este link para el registro del colaborador.</p>
                                    <div class="input-group mb-3">
                                        <input type="text" id="sLinkCopy" readonly class="form-control" placeholder="Copia el link.." aria-label="Copia el link.." aria-describedby="basic-copy">
                                        <div id="btnCopyLink" class="input-group-append cursor-pointer" >
                                            <span class="input-group-text" id="basic-copy"><i class="far fa-copy"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                    
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Invitar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalColaboradores" tabindex="-1" role="dialog" aria-labelledby="modalColaboradoresLabel" aria-hidden="true">
        <div class="modal-dialog dialog-colaborador" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalColaboradoresLabel">Lista de Colaboradores</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">
                    <?php if (is_array($aryVendedores)  && count($aryVendedores) > 0) : ?>
                        <?php foreach ($aryVendedores as $aryVendedor) : ?>
                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre']) ?>">
                                            <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span><?= uc($aryVendedor['sNombre']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-14"><?= uc($aryVendedor['sTipoEmpleado']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-13"><?= strtoupper($aryVendedor['sNombreNegocio']) ?></span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-<?= strtolower($aryVendedor['sColorSuperEmpleado'])?>"></div>
                                        <span class="activo-hace">Activo hace <?= fncSecondsToTime($aryVendedor['sTimeUltimoAcceso']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php endif ?>
                        



                    </div>



                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="modalPendientes" tabindex="-1" role="dialog" aria-labelledby="modalPendientesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPendientesLabel">Lista de prospectos pendientes</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row px-2" id="content-pendientes" >
                   


                    </div>
                </div>
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
                                            </div>
                                        </div>
                                        <div class="col-12 my-2">
                                            <select name="nIdEtapa" class="form-control control-extra" id="nIdEtapa">
                                                <option value="0">Seleccionar</option>
                                                <?php if(fncValidateArray($aryEtapaProspecto)): ?>
                                                    <?php foreach($aryEtapaProspecto as $aryEtapa): ?>
                                                        <option <?= ( $nTipoProspecto == $nTipoProspectoLargo && $aryEtapa["nIdEtapa"] == $nIdEtapaNegociacion ) ? 'disabled="disabled"' : "" ?> value="<?= $aryEtapa["nIdEtapa"] ?>"><?= $aryEtapa["sNombreVendedor"] ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
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
                                            </div>
                                        </div>
                                        <div id="content-cambios" class="row no-gutters my-2 content">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row flex-center mt-2 mb-4">
                                <div class="col-12 flex-center">
                                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                                </div>
                            </div>
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
                                        <a id="btnDescargarContrato" href="javascript:;" class="color-icon-download-contrato" title="Eliminar">
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

    <div class="modal fade" id="formIndicativos" tabindex="-1" role="dialog" aria-labelledby="formIndicativosLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    <div class="modal-header modal-header-recuperar">
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-recuperar" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                        
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 my-2">

                                <div class="col-12 col-md-12 text-center mt-2">
                                    <h5>Informacion del asesor de ventas</h5>
                                </div>

                                <div class="card-colaborador">
                                    <div class="row no-gutters">
                                        <div class="col-3 flex-center">
                                            <div id="circuloIndi" class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span id="sNombreEmpIndi"></span>
                                            <div  class="w-100"></div>
                                            <span id="sTipoEmpleado" class="font-14"></span>
                                            <div class="w-100"></div>
                                            <span id="sNegocioEmpIndi" class="font-13"></span>
                                        </div>
                                        <div class="col-3">
                                            <div id="cuadradoIndi" class="cuadraro-supervisor"></div>
                                            <span class="activo-hace">Activo hace <span id="sActivoHaceIndi"></span> </span>
                                        </div>
                                    </div>
                                </div>

                                    <div id="card-indicativos" class="card-colaborador">
                                        <div class="row no-gutters">
                                                <div class="col-12 col-md-12 text-center">
                                                    <p class="title-indicativos">Indicativos</p>
                                                </div>

                                                <div class="col-6 col-md-7 flex-center">
                                                    <div class="border-card mx-1 card-indicativo-1">
                                                        <p class="title">Avance</p>
                                                        <p id="nAvance">0</p>
                                                        <p class="title">Renta Basica</p>
                                                        <p id="nRentaBasica">S./0.00</p>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-md-5 flex-center">
                                                    <div class="w-100 border-card mx-1 card-indicativo-2">
                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Compra</div>
                                                            <div  id="nCompra" class="col-6 value">S./0.00</div>
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
                                                    <div data-sfiltro="CITAS" class="border-card content-indi-pros content-citas mx-1 btn-filtro">
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
                                                    <div data-sfiltro="CIERRES" class="border-card content-indi-pros content-cierres mx-1 btn-filtro">
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
                                                    <div data-sfiltro="OPORTUNIDAD" class="border-card content-indi-pros content-oportunidad mx-1 btn-filtro">
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
        </div>
        </div> 
    </div>

    <div class="modal fade" id="formHistorialCliente" tabindex="-1" role="dialog" aria-labelledby="formHistorialClienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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

                            <table data-toggle="table" id="tblHistorial" data-card-view="false" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarHistorial" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
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


    <!-- Fin de modales -->






</body>


<?php extend_view(['admin/common/scripts'], $data) ?>


<script>
  
    $(function() {


        $("#btn-toogle-desktop").trigger("click");
        
        fncGetProspectosForEtapas();
        fncEventListenerShowMoreLess();
        // Formulario Invitar
        
        $("#btnCopyLink").on('click', function() {
            copyToClipboard('sLinkCopy');
            toastr.success("Genial!. Link copiado en portapeles");
        });

        $("#btnCrearInvitacion").on('click', function() {
            $("#content-link-copy").hide();
            $("#container-color").hide();
            $("#container-supervisor").hide();
            $("#formColaborador").modal("show");
        });

        $("#nTipoEmpleado").on('change', function() {
            if ($(this).val() != 0) {
                if ($(this).val() == $("body").data("ntipoempleadosupervisor")) {
                    //Supervisor
                    $("#container-color").show();
                    $("#container-supervisor").hide();

                } else {

                    $("#container-color").hide();
                    $("#container-supervisor").show();
                }
            } else {
                $("#container-color").hide();
                $("#container-supervisor").hide();
            }
        });

        $('#formColaborador').on('hidden.bs.modal', function() {
            fncClearInputs($("#formColaborador").find("form"));
        });

        $("#formColaborador").find('form').on('submit', function(event) {
            event.preventDefault();

            var sEmail          = $("#sEmail").val().trim();
            var nTipoEmpleado   = $("#nTipoEmpleado").val().trim();
            var nIdColor        = $("#nIdColor").val().trim();
            var nIdSupervisor   = $("#nIdSupervisor").val();

            if(sEmail == '' || !fncValidateEmail(sEmail)){
                toastr.error('Error. Debe ingresar un correo con un formato correcto . Porfavor verifique.');
                return false;
            } if(nTipoEmpleado == 0){
                toastr.error('Error. Debe seleccionar el tipo de empleado.');
                return false;
            } 

    
            if (nTipoEmpleado == $("body").data("ntipoempleadosupervisor")) {
                if(nIdColor == 0){
                    toastr.error('Error. Debe seleccionar el color del supervisor.');
                    return false;
                }
            } else {
                if(nIdSupervisor == 0){
                    toastr.error('Error. Debe seleccionar un supervisor.');
                    return false;
                }
            }

            var jsnData =  {
                sEmail          : sEmail,
                nTipoEmpleado   : nTipoEmpleado,
                nIdColor        : nIdColor,
                nIdSupervisor   : nIdSupervisor
            };
           
            fncSendEmailEmpleado(jsnData, function(aryData){
               
                if(aryData.success){
                    toastr.success("Genial!.Se envio el correo correctamente.");
                } else {
                    toastr.error("Upss!. Hubo un error al enviar el correo.");
                }

                $("#content-link-copy").fadeIn();
                $("#sLinkCopy").val(aryData.sUrl);
            });

        });

        $(".super").on("click",function(){

         fncGetProspectosForEtapas($(this).data("nidempleado"));

        });

        $("#btnCleanFiltros").on('click',function(){
            fncGetProspectosForEtapas(null);
        });

        $(".emp-indi").on('click',function(){
           
           var nIdEmpleado = $(this).data("nidempleado");
           
           var jsnData = {
               nIdRegistro : nIdEmpleado,
           };

           fncMostrarRegistroCard(jsnData,true,(aryData)=>{
            if(aryData.success){
                var aryData= aryData.aryData ; 

                $("#circuloIndi").html(aryData.sEmpleadoCorto);
                $("#circuloIndi").attr("data-original-title",aryData.sNombre);
                $("#sNombreEmpIndi").html(aryData.sNombre);
                $("#sTipoEmpleado").html(aryData.sTipoEmpleado);
                $("#sNegocioEmpIndi").html(aryData.sNombreNegocio);
                $("#cuadradoIndi").addClass("fondo-"+aryData.sColorSuperEmpleado.toLowerCase());
                $("#sActivoHaceIndi").html(aryData.sUltimoAcceso);

                var jsnData = {
                    nIdNegocio  : $("body").data("nidnegocio"),
                    nIdEmpleado : nIdEmpleado
                };

                fncGetProspectos(jsnData,true,(aryData)=>{

                    var aryIndicativos = aryData.aryIndicativos;
                 
                    $("#nAvance").html(aryIndicativos.nAvance);
                    $("#nRentaBasica").html(aryIndicativos.nRentaBasica);
                    $("#nCompra").html(aryIndicativos.nCompra);
                    $("#nTicket").html(aryIndicativos.nTicket);
                    $("#nEfectividad").html(aryIndicativos.nEfectividad);
                    $("#nCitasCercanas").html(aryIndicativos.nCitasCercanas);
                    $("#nTotalCierre").html(aryIndicativos.nTotalCierre);
                    $("#nOportunidad").html(aryIndicativos.nOportunidad);
                    $("#formIndicativos").modal("show");
                });
            }else{
                toastr.error(aryData.error);
            }

           });

        });
        
        

    });

    // Funciones de la tabla o layout Principal 

    window.fncGetProspectosForEtapas = function(nIdSupervisor = null){

        if($("body").data("ntipoprospecto") == $("body").data("ntipoprospectolargo")){
            // Prospecto largo
            console.log("largo");
            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaprogramada"),
                nIdSupervisor   : nIdSupervisor
            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaenviopropuesta"),
                nIdSupervisor   : nIdSupervisor

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);


            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapanegociacion"),
                nIdSupervisor   : nIdSupervisor

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaenproceso"),
                nIdSupervisor   : nIdSupervisor

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapacierre"),
                nIdSupervisor   : nIdSupervisor

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);


        }else{

            //Prospecto Corto
            console.log("corta");

            $("#content-"+ $("body").data("nidetapaenviopropuesta")).hide();
            $("#content-"+ $("body").data("nidetapanegociacion")).hide();
            $("#content-"+ $("body").data("nidetapaenproceso")).hide();

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaprogramada"),
                nIdSupervisor   : nIdSupervisor
            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);


            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapacierre"),
                nIdSupervisor   : nIdSupervisor
            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false ,true);
        }

    }


    window.fncDrawCardProspecto = function(jsnData,sHtmlTag,bPendiente = true, bSowMore = true , bShowLoader = true ){
        
        var sHtml = ``;

        fncGetProspectos(jsnData, bShowLoader , function(aryData){
            if(aryData.success){

                $.each(aryData.aryData, function (nKeyItem, aryItem) {
                    sHtml += `<div class="col-12 col-md-12 px-0 px-md-0 items">
                                <div class="card-prospecto border-top-pr border-left-pr etapa-${aryItem.nIdEtapa}-border-left border-top-${aryItem.aryEmpleado.sColorSuperEmpleado.toLowerCase()} mb-3">
                                        
                                        <div class="row no-gutters mb-1">
                                            <div class="col-10">
                                                <span class="pr-cliente">${fncUc(aryItem.sCliente)}</span>
                                                <div class="w-100"></div>
                                                <span class="pr-vendedor">${fncUc(aryItem.aryEmpleado.sNombre)}</span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                                ${bPendiente ? `<a class="pr-icon-edit" href="javascript:;" onclick="fncTerminarProspecto(${aryItem.nIdProspecto});"><i class="far fa-check-circle"></i></a>`  : `<a class="pr-icon-edit" href="javascript:;" onclick="fncEditarProspecto(${aryItem.nIdProspecto});"><i class="far fa-edit"></i></a>`}
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-6">`;

                                            $.each(aryItem.aryCatalogo, function (nKeyCat, aryItemCat) {
                                                sHtml += ` <span class="font-14 d-block"> ${fncUc(aryItemCat.sItemCantidadPrecio)}</span>` ;
                                            });
                                            
                    sHtml +=          `</div>
                                            <div class="col-6 text-right d-flex justify-content-end align-items-center">
                                                <span class="ult-cita color-text-${aryItem.aryUltimaCita.sColor}"> Ult.Cita ${moment( aryItem.aryUltimaCita.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY')} ${ moment(aryItem.aryUltimaCita.dHora,'HH:mm').format("HH:mm") } </span>
                                            </div>
                                        </div>

                                        <div class="row no-gutters mb-1">
                                            <div class="col-7">
                                                <span class="font-14 etapa-${aryItem.nIdEtapa}-color">${aryItem.sEtapa}</span>
                                            </div>
                                            <div class="col-5 text-right">
                                                <span class="ult-ingreso color-text-verde break-spaces">Ingreso hace ${aryItem.sTimeUltimoAcceso} </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    `;
                });

                if(bSowMore){
                    if(aryData.aryData.length >0){
                        sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action='show' class="ShowMore">Ver Todo</a></div>`;
                    }
                }

                $(sHtmlTag).html(sHtml);

                if(bSowMore){
                    setTimeout(() => {
                        fncEventListenerShowMoreLess();
                    }, 500);
                }

              
            }
        });
    }

    // Llamadas al servidor
    function fncSendEmailEmpleado(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/empleados/fncSendEmailEmpleado',
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
 
    function fncGetProspectos(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectos',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            }
        });
    }

    function fncMostrarRegistroCard(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncMostrarRegistroCard',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            }
        });
    }
  
    
</script>

<!-- Pendientes -->
<script>
  
    $(function() {

        // Formulario Pendientes
        
        $("#btnPendiente").on('click', function() {
            
            var jsnData = {
                nIdNegocio : $("body").data("nidnegocio"),
                nIdEtapa   : $("body").data("nidestadopendiente")
            };

            fncDrawCardProspecto(jsnData,"#content-pendientes",true,false);
            $("#modalPendientes").modal("show");
        });

      
        $("#formColaborador").find('form').on('submit', function(event) {
            event.preventDefault();

            var sEmail          = $("#sEmail").val().trim();
            var nTipoEmpleado   = $("#nTipoEmpleado").val().trim();
            var nIdColor        = $("#nIdColor").val().trim();
            var nIdSupervisor   = $("#nIdSupervisor").val();

            if(sEmail == '' || !fncValidateEmail(sEmail)){
                toastr.error('Error. Debe ingresar un correo con un formato correcto . Porfavor verifique.');
                return false;
            } if(nTipoEmpleado == 0){
                toastr.error('Error. Debe seleccionar el tipo de empleado.');
                return false;
            } 

    
            if (nTipoEmpleado == $("body").data("ntipoempleadosupervisor")) {
                if(nIdColor == 0){
                    toastr.error('Error. Debe seleccionar el color del supervisor.');
                    return false;
                }
            } else {
                if(nIdSupervisor == 0){
                    toastr.error('Error. Debe seleccionar un supervisor.');
                    return false;
                }
            }

            var jsnData =  {
                sEmail          : sEmail,
                nTipoEmpleado   : nTipoEmpleado,
                nIdColor        : nIdColor,
                nIdSupervisor   : nIdSupervisor
            };
           
            fncSendEmailEmpleado(jsnData, function(aryData){
               
                if(aryData.success){
                    toastr.success("Genial!.Se envio el correo correctamente.");
                } else {
                    toastr.error("Upss!. Hubo un error al enviar el correo.");
                }

                $("#content-link-copy").fadeIn();
                $("#sLinkCopy").val(aryData.sUrl);
            });

        });
        
    });

    // Funciones de la tabla o layout Principal 

    function fncTerminarProspecto(nIdProspecto){

        if(confirm("¿Estas seguro de validar este prospecto?")){

            var jsnData = {
                nIdRegistro : nIdProspecto,
                nIdEtapa    : $("body").data("nidetapacierre")
            };

            fncEjecutarTerminarProspecto(jsnData,function(aryData){
                if(aryData.success){

                    var jsnData = {
                        nIdNegocio : $("body").data("nidnegocio"),
                        nIdEtapa   : $("body").data("nidestadopendiente")
                     };

                    fncDrawCardProspecto(jsnData,"#content-pendientes",true,false);
                    fncGetProspectosForEtapas();
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });
        }
    }


    // Llamadas al servidor
    function fncEjecutarTerminarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncTerminarProspecto',
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
<!-- Pendientes -->

<!-- Prospecto -->
<script>


    $(document).ready(function() {


    
        window.fncTriggerDrawProspecto();

        $("#formProspecto").find("form").on("submit",function(event){
            event.preventDefault();

           // Items Default 
           var nIdRegistro       = $("#formProspecto").data("nIdRegistro");
           var nIdCliente        = $("#nIdCliente");
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


            if(nIdCliente.length>0 && nIdCliente.val()==0){
                toastr.error("Error.Debe de seleccionar un cliente .Porfavor verifique");
                return;
            } else if($("#table-servicios").length>0 && $("#table-productos").length>0 && aryCatalogos.length == 0){
                toastr.error("Error.Debe de seleccionar un producto o servicio .Porfavor verifique");
                return;
            } else if(nIdRegistro == 0 && $(".content-actividades").length>0  && aryActividades.length == 0 ){
                toastr.error("Error.Debe de ingresar una cita para el prospecto .Porfavor verifique");
                return;
            }
           

            var jsnData = {
                nIdRegistro         : nIdRegistro, 
                nIdCliente          : nIdCliente.length > 0 ? nIdCliente.val() : null,
                nIdNegocio          : $("body").data("nidnegocio"),
                nIdEmpleado         : $("body").data("nidempleado"),
                aryCatalogos        : aryCatalogos,
                arySegmentaciones   : arySegmentaciones,
                aryActividades      : aryActividades,
                sNota               : sNota.length > 0 ? sNota.val() : null,
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
                if(aryData.success){

                    $("#formProspecto").modal("hide");
                    
                    var jsnData = {
                        nIdNegocio  : $("body").data("nidnegocio"),
                        nIdEmpleado : $("body").data("nidempleado")
                    };
                    
                    window.fncDrawCardProspecto(jsnData,"#content-card-prospectos");
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
            // Si 
            if($("#formProspecto").data("sAccion") == "editar") {

                fncGetProspectosForEtapas();

             }
           
        });

    
    });


    window.fncEditarProspecto = function(nIdProspecto){

        var jsnData = {
            nIdRegistro  : nIdProspecto,
            nIdNegocio   : $("body").data("nidnegocio")
        };
        
        fncMostrarProspecto(jsnData , function(aryData){
            if(aryData.success){

                $("#content-etapa-prospecto").show();
                $("#content-historico-prospecto").show();  

                $("#title-prospectos").html("Editar Prospecto");
                $("#formProspecto").data("nIdRegistro",nIdProspecto);
                $("#formProspecto").data("sAccion","editar");
                
                var aryProspecto             = aryData.aryData.aryProspecto ;
                var aryProspectoSegmentacion = aryData.aryData.aryProspectoSegmentacion ;
                var aryConfigExtra           = aryData.aryData.aryConfigExtra ;


                $("body").data("nidempleado",aryProspecto.nIdEmpleado);
                
                // Data default

                // Etapa Propsecto 
                $("#nIdEtapa").val(aryProspecto.nIdEtapa);

                // Cliente
                if($("#nIdCliente").length>0){
                    $("#nIdCliente").val(aryProspecto.nIdCliente);
                    $("#btnCrearCliente").hide();
                    $('#nIdCliente').prop('disabled', true);
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

    window.fncDrawNotas = function(jsnData){
        var sHtml = `
                 <div class="col-12 my-1 items">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <p class="m-0 font-14">${jsnData.dFechaActualizacion} - ${fncUc(jsnData.sNombreEmpleado)}</p>
                        </div>
                        <div class="bd-highlight">
                            <a href="javascript:;" class="text-danger btn-delete-actividad" onclick="fncEliminarNota(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">delete</i> <div></div></a>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                     <textarea onblur="fncGrabarNota(${jsnData.nIdRegistro},this);" class="form-control d-block" placeholder="Escribe una nota.."  cols="1" rows="1">${jsnData.sNota}</textarea>
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

    window.fncTriggerDrawProspecto = function(){

        $("#content-ce-prospecto").html("");

        var jsnData = {
            nIdNegocio: $("body").data("nidnegocio")
        };

        fncDrawProspecto(function(bStatus) {
            if(bStatus){
              window.fncEventListenerProspecto();
            }
        });
    }

    window.fncEventListenerProspecto = function(){

        $("#btnCrearActividad").on("click", function() {
            window.fncCleanAll();
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


        var nIdEtapaAnterior= null;
        $("#nIdEtapa").on({
            focus: function () {
                nIdEtapaAnterior = $(this).find("option:selected").val();
                $(this).val(0);
                
            },
            change: function () {
              
                console.log( $(this).val() );
                nIdEtapa = $(this).val();
              
                this.blur();
                setTimeout(function () {
                    
                if(nIdEtapa == 0) { return false; }

                if( $("#formProspecto").data("nIdRegistro") != 0 ){ 

                        if(nIdEtapa == $("body").data("nidetapaenproceso")){

                            var jsnData = {
                                nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                            };

                            fncDrawAdjuntos(jsnData);

                        } else {

                            var jsnData = {
                                nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                nIdEtapa    : nIdEtapa
                            };

                            fncActualizarEstadoProspecto(jsnData,function(aryData){
                                if(aryData.success){

                                    if( aryData.bSend === false && aryData.sLinkArchivo.length > 0){
                                        Object.assign(document.createElement('a'), { target: '_blank', href: aryData.sLinkArchivo }).click();
                                    }
                                    
                                    toastr.success(aryData.success);

                                    // Verificar si es rechazado
                                    if(nIdEtapa == $("body").data("nidetaparechazado")){
                                        
                                        alert("Ups.Se rechazo el prospecto porfavor indica una nota porque se rechazo.");

                                        var sNota = document.getElementById("sNota"); 
                                        sNota.scrollIntoView({ behavior: 'smooth', block: 'center' });

                                    }


                                } else {
                                    toastr.error(aryData.error);
                                }
                            });

                        }
                }
               
                }, 0);  
                
                
            },
            blur: function () {
                if ( $(this).val() == 0) {
                    $(this).val(nIdEtapaAnterior);
                }
            },
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
        
        var sNota = $(element).val();

        if(sNota == '') { return false;}

        var jsnData = {
            nIdRegistro     : nIdRegistro,
            nIdEmpleado     : $("body").data("nidempleado"),
            nIdProspecto    : $("#formProspecto").data("nIdRegistro"),
            sNota           : sNota,
            nEstado         : 1
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

    window.fncGuardarCambio = function(sCambio){

        var jsnData = {
            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
            nIdEmpleado : $("body").data("nidempleado"),
            sCambio     : sCambio,
            nEstado     : 1
        };

        fncGrabarCambioProspecto(jsnData ,function(aryData){
            if(aryData.success){

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };
                
                fncListarCambios(jsnData);
                
                toastr.success(aryData.success);

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
                            sNombreEmpleado     : element.sNombreEmpleado,
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
    
    function fncGrabarProspectoNota(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoNota',
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
</script>
<!-- Prospecto -->




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

                $.each(aryDataList, function (nKeyItem, element) {

                    var sTable = element.sTipoItem == 'PRODUCTO' ? '#table-productos' : '#table-servicios';

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
                        toastr.success(aryData.success);
                    
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
                            toastr.success(aryData.success);
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
          
            if (nCumplioActividad !== undefined && nCumplioActividad !== '1') {
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
                        sFechaActividad :  moment(sFechaActividad,'YYYY-MM-DD').format('DD/MM/YYYY'),
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
                                $("#nIdEtapa").val(aryData.nIdEtapaNegociacion);
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
                $("#content-actividad").hide();
            } else if (this.value == '0') {
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
            formData.append('nIdAdjuntoContrato',nIdAdjuntoContrato);
            formData.append('sContrato',sContrato);
            $.each($('#aryOtros')[0].files,function(key,input){
                formData.append('aryOtros[]', input);
            });

            // console.log(nIdAdjuntoContrato);

            if( sContrato != null ){
                fncGuardarCambio("Se "+ (nIdRegistro == 0 ? "agrego" : "actualizo")  +" el contrato");
            } 

            if( $('#aryOtros')[0].files != null &&  $('#aryOtros')[0].files.length > 0 ){
                fncGuardarCambio("Se agrego "+$('#aryOtros')[0].files.length+" Adjuntos");
            }

            fncGrabarProspectoAdjunto(formData,(aryData)=>{
                if(aryData.success){
                    if(aryData.bChangeEstado){
                        $("#nIdEtapaEnProceso").val(aryData.nIdEtapaEnProceso).trigger("change");
                    }

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    };

                    fncDrawAdjuntos(jsnData,false);

                    toastr.success(aryData.success);
                }else{
                    toastr.error(aryData.error);
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
                        <div class="ml-auto"><i class="fas fa-download"></i></div>
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

</html>