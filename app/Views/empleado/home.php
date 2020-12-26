<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body data-snombre="<?=$user['sNombre']?>" 
      data-nestadopendiente ="<?= $nIdEstadoActividadPen ?>" 
      data-nestadoejecutado = "<?= $nIdEstadoActividadEjecutado ?>"
      data-nidempleado ="<?= $user['nIdEmpleado'] ?>"
      data-nidnegocio ="<?= $user['nIdNegocio'] ?>">

    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>

    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['empleado/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['empleado/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid  py-4 px-md-2 px-0 mb-5">

                    <div class="container-fluid">

                        <div class="row flex-center">

                            <div class="col-12 col-md-6">
                                <div class="card-colaborador">
                                    <div class="row no-gutters">
                                        <div class="col-3 flex-center">
                                            <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $user['sNombre']?>">
                                                <span><?= strtoupper($user['sEmpleadoCorto']) ?></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span><?= $user['sNombre']?></span>
                                            <div class="w-100"></div>
                                            <span class="font-14"><?= uc($user['sTipoEmpleado']) ?></span>
                                            <div class="w-100"></div>
                                            <span class="font-13"><?= strtoupper($user['sNombreNegocio']) ?></span>
                                        </div>
                                        <div class="col-3">
                                            <div class="cuadraro-supervisor fondo-<?= strtolower($user['sColorSuperEmpleado'])?>"></div>
                                            <span class="activo-hace">Activo hace <?= fncSecondsToTime($user['sTimeUltimoAcceso']) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="card-colaborador">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-md-12 text-center">
                                            <p class="title-indicativos">Indicativos</p>
                                        </div>

                                        <div class="col-6 col-md-7 flex-center">
                                            <div class="border-card mx-1 card-indicativo-1">
                                                <p class="title">Avance</p>
                                                <p>1000</p>
                                                <p class="title">Renta Basica</p>
                                                <p>S./1000.00</p>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-5 flex-center">
                                            <div class="w-100 border-card mx-1 card-indicativo-2">
                                                <div class="row no-gutters flex-center p-1">
                                                    <div class="col-6 title">Compra</div>
                                                    <div class="col-6 value">S./1000.00</div>
                                                </div>

                                                <div class="row no-gutters flex-center p-1">
                                                    <div class="col-6 title">Ticket</div>
                                                    <div class="col-6 value">1</div>
                                                </div>

                                                <div class="row no-gutters flex-center p-1">
                                                    <div class="col-6 title">Efectividad</div>
                                                    <div class="col-6 value">10%</div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 text-center mt-2">
                                            <p class="title-indicativos">Indicativos Prospectos</p>
                                        </div>

                                        <div class="col-4 col-md-4 text-center mt-2">
                                            <div class="border-card content-indi-pros content-citas mx-1">
                                                <div class="row no-gutters">
                                                    <div class="col-12 mb-1">
                                                        <span class="title">Citas</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <i class="far fa-calendar-alt font-icon-indi"></i>
                                                    </div>
                                                    <div class="col-6 flex-center">
                                                        <span class="title">10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 col-md-4 text-center mt-2">
                                            <div class="border-card content-indi-pros content-cierres mx-1">
                                                <div class="row no-gutters">
                                                    <div class="col-12 mb-1">
                                                        <span class="title">Cierres</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </div>
                                                    <div class="col-6 flex-center">
                                                        <span class="title">10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4 col-md-4 text-center mt-2">
                                            <div class="border-card content-indi-pros content-oportunidad mx-1">
                                                <div class="row no-gutters">
                                                    <div class="col-12 mb-1">
                                                        <span class="title">Oportunidad</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <i class="fas fa-rocket"></i>
                                                    </div>
                                                    <div class="col-6 flex-center">
                                                        <span class="title">10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 mb-4">
                                <div class="border-card mx-1 px-1 content-prospectos-empleados">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-md-12 text-center">
                                            <p class="title-indicativos">Prospectos</p>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input class="form-control py-2 border-right-0 border" type="search" value="" placeholder="Buscar..." id="example-search-input">
                                                <span class="input-group-append">
                                                    <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="list-prospectos mx-1 my-2 my-md-4">
                                                <div id="content-card-prospectos" class="row m-0 content">
                                                  
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
        <div class="modal-dialog m-1 m-md-auto" role="document">
            <div class="modal-content">
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


    <!-- Fin de modales -->





</body>


<?php extend_view(['empleado/common/scripts'], $data) ?>

<!-- Prospecto -->
<script>

    window.sParentSelector    = "div.content";
    window.sShowItemsSelector = ".items:gt(2)";
    window.sShowLessSelector  = ".ShowMore,.ShowLess";

    $(document).ready(function() {
      
        
        var jsnData = {
            nIdNegocio  : $("body").data("nidnegocio"),
            nIdEmpleado : $("body").data("nidempleado")
        };

        fncDrawCardProspecto(jsnData,"#content-card-prospectos");
        
        $("#btnCrearProspecto").on("click", function() { 

            $("#content-ce-prospecto").html(fncBuildFormPro($("#formProspecto").data("aryDataForm")));
            window.fncEventListenerProspecto(); 

            $("#content-etapa-prospecto").hide();
            $("#content-historico-prospecto").hide();  

            $("#formProspecto").data("sAccion","crear");
            $("#title-prospectos").html("Crear Prospecto");
            $("#formProspecto").data("nIdRegistro", 0);  
            $("#formProspecto").modal("show");
        });

        
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

                var jsnData = {
                    nIdNegocio  : $("body").data("nidnegocio"),
                    nIdEmpleado : $("body").data("nidempleado")
                };

                window.fncDrawCardProspecto(jsnData,"#content-card-prospectos");

             }
           
        });


    });

    window.fncEventListenerShowMoreLess = function(){
        $(sParentSelector).each(fncShowItemsHandler);
        $(sShowLessSelector).off();
        $(sShowLessSelector).on('click', showHideHandler);
    }

    window.showHideHandler = function() {

        if ($(this).data('action') === 'show') {
            $(this).text("Ver Menos");
            $(this).data('action','hide');
            $(this).closest(sParentSelector).children('.items').show();
        } else {
            $(this).text("Ver Todo");
            $(this).data('action','show');
            fncShowItemsHandler.bind($(this).closest(sParentSelector))();
        }

    }

    window.fncShowItemsHandler = function() {
        $(this).children(sShowItemsSelector).hide();
    }

    window.fncDrawCardProspecto = function(jsnData,sHtmlTag){
    
        var sHtml = ``;

        fncGetProspectos(jsnData, function(aryData){
            if(aryData.success){
                
                $.each(aryData.aryData, function (nKeyItem, aryItem) {
                    sHtml += `<div class="col-12 col-md-4 px-0 px-md-2 items">
                                <div class="card-prospecto border-top-pr border-left-pr etapa-${aryItem.nIdEtapa}-border-left border-top-${aryItem.aryEmpleado.sColorSuperEmpleado.toLowerCase()} mb-3">
                                        
                                        <div class="row no-gutters mb-1">
                                            <div class="col-10">
                                                <span class="pr-cliente">Cliente: ${fncUc(aryItem.sCliente)}</span>
                                                <div class="w-100"></div>
                                                <span class="pr-vendedor">Vend: ${fncUc(aryItem.aryEmpleado.sNombre)}</span>
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                                <a class="pr-icon-edit" href="javascript:;" onclick="fncEditarProspecto(${aryItem.nIdProspecto});">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row no-gutters">
                                            <div class="col-6">`;

                                            $.each(aryItem.aryCatalogo, function (nKeyCat, aryItemCat) {
                                                sHtml += ` <span class="font-14 d-block"> ${fncUc(aryItemCat.sItemCantidadPrecio)}</span>` ;
                                            });
                                            
                     sHtml +=          `</div>
                                            <div class="col-6 text-right d-flex justify-content-end align-items-center">
                                                <span class="ult-cita"> Ult.Cita ${moment( aryItem.aryUltimaCita.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY')} ${ moment(aryItem.aryUltimaCita.dHora,'HH:mm').format("HH:mm") } </span>
                                            </div>
                                        </div>

                                        <div class="row no-gutters mb-1">
                                            <div class="col-7">
                                                <span class="font-14 etapa-${aryItem.nIdEtapa}-color">${aryItem.sEtapa}</span>
                                            </div>
                                            <div class="col-5 text-right">
                                                <span class="ult-ingreso color-text-verde">Ingreso hace ${aryItem.sTimeUltimoAcceso} </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    `;
                });

                sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action='show' class="ShowMore">Ver Todo</a></div>`;

                $(sHtmlTag).html(sHtml);
                
                fncEventListenerShowMoreLess();
            }
        });
    }

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
        fncClearInputs($("#formCECliente").find("form"));
        fncClearInputs($("#formCECatalogo").find("form"));
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

        $("#nIdEtapa").on('change',function(){

            var nIdEtapa = $(this).find("option:selected").val();

            if(nIdEtapa == 0) { return false; }
   
            if( $("#formProspecto").data("nIdRegistro") != 0 ){ 

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    nIdEtapa    : nIdEtapa
                };

                fncActualizarEstadoProspecto(jsnData,function(aryData){
                    if(aryData.success){
                        toastr.success(aryData.success);
                    } else {
                        toastr.error(aryData.error);
                    }
                });

            }

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

                toastr.success(aryData.success);
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
                            sFechaActividad : element.dFecha,
                            sHoraActividad  : element.dHora,
                            sEstado         : element.sEstadoActividadLarga
                        };

                        sHtml += fncDrawCardActividad(jsnCard);
                    });

                    $("#content-actividades").html(sHtml);
            
                }

                toastr.success(aryData.success);
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

                toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
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

    function fncGetProspectos(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectos',
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
            var sClave                          = $("#sClave" + sEntidadVendedor);


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


            var jsnData = {
                nIdRegistro                     : nIdRegistro,
                nIdNegocio                      : nIdNegocio,
                nTipoDocumento                  : nTipoDocumento.length > 0 ? nTipoDocumento.val() : null,
                sNumeroDocumento                : sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : null,
                sNombre                         : sNombre.length > 0 ? sNombre.val() : null,
                sCorreo                         : sCorreo.length > 0 ? sCorreo.val() : null,
                dFechaNacimiento                : dFechaNacimiento.length > 0 ? dFechaNacimiento.val() : null,
                nCantidadPersonasDependientes   : nCantidadPersonasDependientes.length > 0 ? nCantidadPersonasDependientes.val() : null,
                nExperienciaVentas              : nExperienciaVentas.length > 0 ? nExperienciaVentas.val() : null,
                sRubroExperiencia               : sRubroExperiencia.length > 0 ? sRubroExperiencia.val() : null,
                nIdEstudios                     : nIdEstudios.length > 0 ? nIdEstudios.val() : null,
                nIdSituacionEstudios            : nIdSituacionEstudios.length > 0 ? nIdSituacionEstudios.val() : null,
                sCarreraCiclo                   : sCarreraCiclo.length > 0 ? sCarreraCiclo.val() : null,
                sClave                          : sClave.length > 0 ? sClave.val() : null,
            };


            fncGrabarEmpleado(jsnData, function(aryData) {
                if (aryData.success) {
                    toastr.success(aryData.success);
                    fncMostrarEmpleado();
                    $("#formEmpleado").modal("hide");
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
                nTipoActividad      : 1,
                sFechaActividad     : sFechaActividad,
                sHoraActividad      : sHoraActividad,
                sNota               : sNota,
                nEstado             : 1
            };

            if($("#formProspecto").data("sAccion") == 'crear'){

                if(nIdRegistro == 0){

                    nIdRegistro =  $("#formCEActividad").data( "nIdRegistro");
                    $("#formCEActividad").data( "nIdRegistro" , nIdRegistro + 1 );

                    var jsnCard = {
                        nIdRegistro     : nIdRegistro,
                        jsnData         : jsnData,
                        event           : '',
                        sColor          : "verde",
                        sNombreEmpleado : $("body").data("snombre"),
                        sFechaCreacion  : moment().format('DD/MM/YYYY'),
                        sFechaActividad : sFechaActividad,
                        nEdit           : 1,
                        sHoraActividad  : sHoraActividad,
                        sEstado         : "Pendiente"
                    };

                    $("#content-actividades").append(fncDrawCardActividad(jsnCard));
                    
                } else {
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
                                nIdActividad : 1 
                            };

                            fncListarActividades(jsnData);

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

    window.fncValidarActividad= function(nIdRegistro){
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
            console.log(nIdRegistro);
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


</html>