<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />
</head>

<body 
    data-nidnegocio="<?= $nIdNegocio ?>" 
    data-nrol="<?= $user["nRol"] ?>"
    data-ntipoitemcatalogoproducto="<?=$nTipoItemCatalogoProducto?>"
    data-ntipoitemcatalogoservicio="<?=$nTipoItemCatalogoServicio?>"
    data-ntipoempleadosupervisor="<?=$nTipoEmpleadoSupervisor?>"
    data-ntipoempleadoasesorventas = "<?=$nTipoEmpleadoAsesorVentas?>"
    >


    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>


    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['admin/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-0">

                    <div class="container-fluid px-0">
                        <div class="page-header row no-gutters pb-4">


                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small">
                                    <div class="card-body pt-0 pb-5">

                                        <div class="row flex-center">
                                            <div class="col-12 col-md-12 card my-0">

                                                <div class="row m-1">
                                                    <div class="col-12 col-md-3 px-0 px-md-1">

                                                        <div class="card p-2">
                                                            
                                                            <div class="row">
                                                                <div class="col-12 col-md-12 d-flex justify-content-between  ">
                                                                    <div class="d-flex justify-content-center">
                                                                        <h5 class="mb-0">
                                                                            R.Ventas
                                                                            <a id="btnCleanFiltrosRV" class="font-15" href="javascript:;"> <i class="fas fa-sync"></i> </a>
                                                                        </h5>
                                                                    </div>

                                                                    <div class="">
                                                                        <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="Reporte Basico Empleado"  id="btnReporteBasicoEmpleado" type="button" class="btn-icon-cabecera color-azul"><span class="material-icons">table_chart</span></a>
                                                                        <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="Reporte Consultor"  id="btnReporteConsultor" type="button" class="btn-icon-cabecera color-verde-admin"><span class="material-icons">how_to_reg</span></a>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-12 col-md-12">
                                                                    <form id="form-reporte" method="post">
                                                                        <div class="row">

                                                                            <div class="col-12 col-md-12">
                                                                                <div class="mb-1">
                                                                                    <label for="nTipoItemCatalogo" class="col-form-label">Tipo Item:</label>
                                                                                    <select class="form-control" name="nTipoItemCatalogo" id="nTipoItemCatalogo">
                                                                                        <option value="0">TODOS</option>
                                                                                        <?php if (is_array($aryTipoItem)  && count($aryTipoItem) > 0) : ?>
                                                                                            <?php foreach ($aryTipoItem as $aryTipo) : ?>
                                                                                                <option value="<?= $aryTipo['nIdCatalogoTabla'] ?>"><?= $aryTipo['sDescripcionLargaItem'] ?></option>
                                                                                            <?php endforeach ?>
                                                                                        <?php endif ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-md-6">
                                                                                <div class="mb-1">
                                                                                    <label for="nIdEmpleadoSupervisor" class="col-form-label">Supervisor:</label>
                                                                                    <select multiple class="form-control select2" name="nIdEmpleadoSupervisor" id="nIdEmpleadoSupervisor">
                                                                                        <?php if (fncValidateArray($arySupervisores)) : ?>
                                                                                            <?php foreach ($arySupervisores as $arySuper) : ?>
                                                                                                <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= $arySuper['sNombre'] ?></option>
                                                                                            <?php endforeach ?>
                                                                                        <?php endif ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-md-6">
                                                                                <div class="mb-1">
                                                                                    <label for="nIdEmpleadoAsesor" class="col-form-label">Asesor:</label>
                                                                                    <select multiple class="form-control select2" name="nIdEmpleadoAsesor" id="nIdEmpleadoAsesor">
                                                                                        <?php if (fncValidateArray($aryVendedores)) : ?>
                                                                                            <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                                                                <option value="<?= $aryVendedor['nIdEmpleado'] ?>"><?= $aryVendedor['sNombre'] ?></option>
                                                                                            <?php endforeach ?>
                                                                                        <?php endif ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-12 col-md-6">
                                                                                <div class="mb-1">
                                                                                    <label for="dDesde" class="col-form-label">Desde:</label>
                                                                                    <input type="text" class="form-control datepicker" id="dDesde" autocomplete="off" name="dDesde">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-6">
                                                                                <div class="mb-1">
                                                                                    <label for="dHasta" class="col-form-label">Hasta:</label>
                                                                                    <input type="text" class="form-control datepicker" id="dHasta" autocomplete="off" name="dHasta">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12 col-md-12">
                                                                                <div class="mb-1">
                                                                                    <button  type="submit" style="padding: 10px 0px 10px 0px;margin: 10px 0px;font-size: 16px;" class="btn btn-gradient-primary btn-block btn-submit">Buscar</button>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-1">

                                                            <div class="col-12 col-md-12"  style="font-size: 14px; " >
                                                                <div class="card card-small ">
                                                                    
                                                                    <div class="card-header border-bottom d-none">
                                                                        <h6 class="m-0">Indicativos</h6>
                                                                    </div>

                                                                    <div class="card-body px-md-2">

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Avance :
                                                                                </div>
                                                                                <div class="col-7 col-md-7  p-0">
                                                                                    <span id="sAvance"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Ticket :
                                                                                </div>
                                                                                <div class="col-7 col-md-7  p-0">
                                                                                    <span id="sTicket"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Compra :
                                                                                </div>
                                                                                <div class="col-7 col-md-7  p-0">
                                                                                    <span id="sCompra"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Prosp. Prom :
                                                                                </div>
                                                                                <div class="col-7 col-md-7  p-0">
                                                                                    <span id="sProspeccionPromedio"> </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Cant OPP. Activa :
                                                                                </div>
                                                                                <div class="col-7 col-md-7 p-0">
                                                                                    <span id="sCantidadOppActiva"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    OPP. Activa :
                                                                                </div>
                                                                                <div class="col-7 col-md-7  p-0">
                                                                                    <span id="sOppActiva"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Productividad :
                                                                                </div>
                                                                                <div class="col-7 col-md-7 p-0">
                                                                                    <span id="sProductividad"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-5 col-md-5 bold p-0">
                                                                                    Tasa de clientes :
                                                                                </div>
                                                                                <div class="col-7 col-md-7 p-0">
                                                                                    <span id="sTasaCliente"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                     <div class="col-12 col-md-9 px-0 px-md-1">
                                                        <div class="row">

                                                        
                                                            <div class="col-12 col-md-6 mb-1">
                                                                <div class="card card-small">
                                                                    <div class="card-header border-bottom">
                                                                        <h6 class="m-0">Grafico Cliente - Catalogo</h6>
                                                                    </div>
                                                                    <div class="card-body pt-0" style="height: auto;">


                                                                        <div id="cr1" class="carousel slide box-shadow-none" data-ride="carousel">

                                                                            <div class="carousel-inner">
                                                                                
                                                                                <div id="content-chartServEmpresa" class="carousel-item">
                                                                                    <canvas id="chartServEmpresa" class="chart" height="130"></canvas>
                                                                                </div>
                                                                                
                                                                                <div id="content-chartServPersona" class="carousel-item">
                                                                                    <canvas id="chartServPersona" class="chart" height="130"></canvas>
                                                                                </div>

                                                                                <div id="content-chartProdEmpresa" class="carousel-item">
                                                                                    <canvas id="chartProdEmpresa" class="chart" height="130"></canvas>
                                                                                </div>
                                                                            
                                                                                <div id="content-chartProdPersona" class="carousel-item">
                                                                                    <canvas id="chartProdPersona" class="chart" height="130"></canvas>
                                                                                </div>

                                                                            </div>
                                                                            <a class="carousel-control-prev" href="#cr1" role="button" data-slide="prev">
                                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                <span class="sr-only">Previous</span>
                                                                            </a>
                                                                            <a class="carousel-control-next" href="#cr1" role="button" data-slide="next">
                                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                <span class="sr-only">Next</span>
                                                                            </a>

                                                                        </div>

                                                   

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-1">

                                                                <div class="card card-small">
                                                                    <div class="card-header border-bottom">
                                                                        <h6 class="m-0">Productividad</h6>
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <canvas id="chartPrdt" class="chart" height="auto"></canvas>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-12 col-md-6 mb-1">

                                                                <div class="card card-small">
                                                                    <div class="card-header border-bottom">
                                                                        <h6 class="m-0">Venta por catalogo</h6>
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <canvas id="chartCatalogo" class="chart" height="130"></canvas>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-12 col-md-6 mb-1">

                                                                <div class="card card-small">
                                                                    <div class="card-header border-bottom">
                                                                        <h6 class="m-0">Venta por cliente</h6>
                                                                    </div>
                                                                    <div class="card-body pt-0">
                                                                        <canvas id="chartCliente" class="chart" height="130"></canvas>
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
                    </div>


                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->


    <?php extend_view(['admin/common/modales-editar'], $data) ?>

    <div class="modal fade modal-full-screen" id="formReporteConsultor" tabindex="-1" role="dialog" aria-labelledby="formReporteConsultorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formReporteConsultorLabel">Reporte Consultor</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll">

                    <form id="form-reporte-consultor" method="post">

                        <div class="row  py-2">

                            <div class="col-12 flex-center">
                                <h5>
                                    Reporte de Consultor
                                    <a id="btnCleanFiltrosRC" class="font-15" href="javascript:;"> <i class="fas fa-sync"></i> </a>
                                </h5>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="nTipoItemCatalogoRC" class="col-form-label">Tipo Item:</label>
                                    <select class="form-control" name="nTipoItemCatalogoRC" id="nTipoItemCatalogoRC">
                                        <option value="0">TODOS</option>
                                        <?php if (is_array($aryTipoItem)  && count($aryTipoItem) > 0) : ?>
                                            <?php foreach ($aryTipoItem as $aryTipo) : ?>
                                                <option value="<?= $aryTipo['nIdCatalogoTabla'] ?>"><?= $aryTipo['sDescripcionLargaItem'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="nIdEmpleadoSupervisorRC" class="col-form-label">Supervisor:</label>
                                    <select multiple class="form-control select2" name="nIdEmpleadoSupervisorRC" id="nIdEmpleadoSupervisorRC">
                                        <?php if (fncValidateArray($arySupervisores)) : ?>
                                            <?php foreach ($arySupervisores as $arySuper) : ?>
                                                <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= $arySuper['sNombre'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3 col-12  ">
                                <div class="form-group">
                                    <label for="nIdEmpleadoAsesorRC" class="col-form-label">Asesor:</label>
                                    <select multiple class="form-control select2" name="nIdEmpleadoAsesorRC" id="nIdEmpleadoAsesorRC">
                                        <?php if (fncValidateArray($aryVendedores)) : ?>
                                            <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                <option value="<?= $aryVendedor['nIdEmpleado'] ?>"><?= $aryVendedor['sNombre'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2 col-12  ">
                                <div class="form-group">
                                    <label for="dDesdeRC" class="col-form-label">Desde:</label>
                                    <input type="text" class="form-control datepicker" id="dDesdeRC" autocomplete="off" name="dDesdeRC">
                                </div>
                            </div>

                            <div class="col-md-2 col-12 ">
                                <div class="form-group">
                                    <label for="dHastaRC" class="col-form-label">Hasta:</label>
                                    <input type="text" class="form-control datepicker" id="dHastaRC" autocomplete="off" name="dHastaRC">
                                </div>
                            </div>

                            <div class="col-12  flex-center">
                                <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Buscar</button>
                            </div>


                        </div>
                    </form>



                    <div id="toolbarRC"></div>

                    <div class="table-responsive">

                        <table data-toggle="table" id="tblReporteConsultor" data-card-view="false" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarRC" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-field="sColor">Color</th>
                                    <th data-sortable="true" data-field="sEmpleado">Consultor</th>
                                    <th data-sortable="true" data-field="nAvance">Avance Cantidad</th>
                                    <th data-sortable="true" data-field="nRentaBasica">Avance Soles</th>
                                    <th data-sortable="true" data-field="nProspectosHoy">Prospecto del dia</th>
                                    <th data-sortable="true" data-field="nTotalProspectos">Prospecto Totales</th>
                                    <th data-sortable="true" data-field="nCantidadProspectoOppActivo">OPP Activa</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>


                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formReporteBasicoEmpleado" tabindex="-1" role="dialog" aria-labelledby="formReporteBasicoEmpleadoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formReporteBasicoEmpleadoLabel">Reporte Basicos Consultor</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll">

                    <div class="row">
 
                     
                    <div class="col-12">
                        <table id="table-emplead-sexo" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th colspan="2"> Sexo Asesores (Cantidad - T-Cierres - Efect)</th>
                               </tr>
                                <tr>
                                    <th scope="col">Hombres</th>
                                    <th scope="col">Mujeres</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="sDataHombres">0</td>
                                    <td id="sDataMujeres">0</td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-12">
                        <table id="table-empleado-experiencia" class="table table-bordered text-center" >
                            <thead>
                                <tr>
                                    <th colspan="2" scope="col">Experiencia en ventas (Cantidad - T-Cierres - Efect)</th>
                                 </tr>
                                <tr>
                                    <th scope="col">Con Experiencia</th>
                                    <th scope="col">Sin Experiencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="sDataConExpe">0</td>
                                    <td id="sDataSinExpe">0</td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  
                    <div class="col-12">
                         <table id="table-empleado-edades" class="table table-bordered text-center" >
                                <thead>
                                    <tr>
                                        <th scope="col"colspan="4">Edades (Cantidad - T-Cierres - Efect)</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">18 - 23</th>
                                        <th scope="col">24 - 29</th>
                                        <th scope="col">30 - 35</th>
                                        <th scope="col">36 - +</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="sDataRangoEdad1">0</td>
                                        <td id="sDataRangoEdad2">0</td>
                                        <td id="sDataRangoEdad3">0</td>
                                        <td id="sDataRangoEdad4">0</td>
                                    </tr>
                                </tbody>
                         </table>
                    </div>

                    <div class="col-12">
                        <table id="table-empleado-estado-civil" class="table table-bordered text-center" >
                                <thead>
                                    <tr>
                                        <th scope="col"colspan="5">Estado civil (Cantidad - T-Cierres - Efect)</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Casado</th>
                                        <th scope="col">Soltero</th>
                                        <th scope="col">Viudo</th>
                                        <th scope="col">Divorciado</th>
                                        <th scope="col">Coviviente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="sDataCasados">0</td>
                                        <td id="sDataSolteros">0</td>
                                        <td id="sDataViudos">0</td>
                                        <td id="sDataDivorciado">0</td>
                                        <td id="sDataConviviente">0</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>

                    <div class="col-12">
                        <table id="table-empleado-personas-dependientes" class="table table-bordered text-center" >
                            <thead>
                                <tr>
                                    <th scope="col"colspan="2"> Hijos (Cantidad - T-Cierres - Efect)</th>
                                </tr>
                                <tr>
                                    <th scope="col">Con Hijos</th>
                                    <th scope="col">Sin Hijos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="sDataConHijos">0</td>
                                    <td id="sDataSinHijos">0</td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                                                
                    </div>
 

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>



    <!-- Fin de modales -->


</body>


<?php extend_view(['admin/common/scripts'], $data) ?>


<script>
    window.chartServEmpresa = null;
    window.chartProdEmpresa = null;
    window.chartServPersona = null;
    window.chartProdPersona = null;
    window.chartPrdt        = null;
    window.chartCatalogo    = null;
    window.chartCliente     = null;

    
    $(function() {

        $("#cr1").hide();
        
        // $('.carousel').carousel({
        //     interval: 5000,
        // });

        // $('.carousel').carousel('cycle');
        //$("#btn-toogle-desktop").trigger("click");
        fncOcultarAside();
        
        setTimeout(() => {
            $("#nIdEmpleadoAsesor,#nIdEmpleadoSupervisor").select2({
                placeholder: "TODOS"
            });
        }, 500);
       

        

        $("#form-reporte").on("submit",function(event){
            
            event.preventDefault();

            var nIdTipoItem      = $("#nTipoItemCatalogo").val(); 
            var dDesde           = $("#dDesde").datepicker('getDate');
            var dHasta           = $("#dHasta").datepicker('getDate');
            var arySupervisor    = $("#nIdEmpleadoSupervisor :selected").map(function(nIndex, item) { return $(item).val(); }).get();
            var aryAsesor        = $("#nIdEmpleadoAsesor :selected").map(function(nIndex, item) { return $(item).val(); }).get();

            if ((dDesde != null && dHasta == null) || (dDesde == null && dHasta != null)) {
                toastr.error('Error. Si va a especificar fechas, debe ingresar la inicio y fin. Por favor verificar.');
                return;
            }

            if (dHasta < dDesde) {
                toastr.error('Error. La fecha de fin debe ser mayor o igual que la fecha de inicio. Por favor verificar.');
                return;
            } 

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdTipoItem     : nIdTipoItem,
                dDesde          : $('#dDesde').val(),
                dHasta          : $('#dHasta').val(),
                arySupervisor   : arySupervisor,
                aryAsesor       : aryAsesor
            };

            fncGetReporteProspectos(jsnData,(aryData)=>{
                if(aryData.success){

                    toastr.success(aryData.success);

                    var aryData = aryData.aryData;

                    var aryIndicativos        = aryData.aryIndicativos;
                    var aryDataCatalogoReport = aryData.aryDataCatalogoReport;

                    var aryDataCatalogoEmpresaProducto = aryDataCatalogoReport.aryDataCatalogoEmpresaProducto;
                    var aryDataCatalogoPersonaProducto = aryDataCatalogoReport.aryDataCatalogoPersonaProducto;
                    var aryDataCatalogoEmpresaServicio = aryDataCatalogoReport.aryDataCatalogoEmpresaServicio;
                    var aryDataCatalogoPersonaServicio = aryDataCatalogoReport.aryDataCatalogoPersonaServicio;


                    var aryNewProductividadMes    = aryData.aryNewProductividadMes;
                    var aryNewDataReporteCatalogo = aryData.aryNewDataReporteCatalogo;
                    var aryNewDataReporteCliente  = aryData.aryNewDataReporteCliente;

                    // Pintar Indicativos 

                    $("#sAvance").html(aryIndicativos.sAvance);
                    $("#sTicket").html(aryIndicativos.sTicket);
                    $("#sCompra").html(aryIndicativos.sCompra);
                    $("#sProspeccionPromedio").html(aryIndicativos.sProspeccionPromedio);
                    $("#sCantidadOppActiva").html(aryIndicativos.sCantidadOppActiva);
                    $("#sOppActiva").html(aryIndicativos.sOppActiva);
                    $("#sProductividad").html(aryIndicativos.sProductividad);
                    $("#sTasaCliente").html(aryIndicativos.sTasaCliente);

                    // Reporte de catalogo por cliente

                    $("#content-chartProdEmpresa").removeClass("carousel-item").show().removeClass("active");
                    $("#content-chartProdPersona").removeClass("carousel-item").show().removeClass("active");
                    $("#content-chartServEmpresa").removeClass("carousel-item").show().removeClass("active");
                    $("#content-chartServPersona").removeClass("carousel-item").show().removeClass("active");

                    
                    switch(parseInt(nIdTipoItem)){
                        
                        case $("body").data("ntipoitemcatalogoservicio") : 

                            $("#content-chartServEmpresa").addClass("carousel-item");
                            $("#content-chartServPersona").addClass("carousel-item");


                            $("#content-chartProdEmpresa").hide();
                            $("#content-chartProdPersona").hide();
 
                               
                        break;
                        
                        case $("body").data("ntipoitemcatalogoproducto") : 

                            $("#content-chartProdEmpresa").addClass("carousel-item");
                            $("#content-chartProdPersona").addClass("carousel-item");

                            $("#content-chartServEmpresa").hide();
                            $("#content-chartServPersona").hide();
 
                         break;
                        
                        default:

                            $("#content-chartProdEmpresa").addClass("carousel-item");
                            $("#content-chartProdPersona").addClass("carousel-item");
                             
                            $("#content-chartServEmpresa").addClass("carousel-item");
                            $("#content-chartServPersona").addClass("carousel-item");

  
                        break;
                    }


                    setTimeout(() => {

                        var jsnDataCatalogoEmpresaProducto = fncGetJsnDataByReportCatalogoCliente(aryDataCatalogoEmpresaProducto);
                        var jsnDataCatalogoPersonaProducto = fncGetJsnDataByReportCatalogoCliente(aryDataCatalogoPersonaProducto);

                        var jsnDataCatalogoEmpresaServicio = fncGetJsnDataByReportCatalogoCliente(aryDataCatalogoEmpresaServicio);
                        var jsnDataCatalogoPersonaServicio = fncGetJsnDataByReportCatalogoCliente(aryDataCatalogoPersonaServicio);


                       if(aryDataCatalogoEmpresaProducto.length > 0) {
                           fncDwarChart2("chartProdEmpresa", "pie", jsnDataCatalogoEmpresaProducto, "REPORTE DE PRODUCTO POR EMPRESA")
                        } else {
                            $("#content-chartProdEmpresa").removeClass("carousel-item").hide();
                        }


                       if(aryDataCatalogoPersonaProducto.length > 0){ 
                           fncDwarChart4("chartProdPersona", "pie", jsnDataCatalogoPersonaProducto, "REPORTE DE PRODUCTO POR PERSONA");
                        } else {
                            $("#content-chartProdPersona").removeClass("carousel-item").hide();
                        } 

                       if(aryDataCatalogoEmpresaServicio.length > 0) {
                          fncDwarChart1("chartServEmpresa", "pie", jsnDataCatalogoEmpresaServicio, "REPORTE DE SERVICIO POR EMPRESA");
                       } else {
                          $("#content-chartServEmpresa").removeClass("carousel-item").hide();
                       }


                       if(aryDataCatalogoPersonaServicio.length > 0) {
                           fncDwarChart3("chartServPersona", "pie", jsnDataCatalogoPersonaServicio, "REPORTE DE SERVICIO POR PERSONA");
                       } else {
                          $("#content-chartServPersona").removeClass("carousel-item").hide();
                       }    

                       $("#cr1").find(".carousel-inner").find(".carousel-item").first().addClass("active"); 
            
                       $("#cr1").show();

                    }, 700);


                    // Productividad 

                    var aryMesesProdtv = [];
                    var aryUnidades    = [];
                    var aryMontos      = [];
 
                    if( aryNewProductividadMes.length > 0 ){

                        aryNewProductividadMes.forEach(element => {

                            aryMesesProdtv.push(element.sMes);
                            aryUnidades.push(parseFloat(element.nProductividadUnidades));
                            aryMontos.push(parseFloat(element.nProductividadMonto).toFixed(2));
                       
                        });
                      
                    }
                    

                    var jsnData  = {
                        aryMeses         : aryMesesProdtv,
                        // Unidades 
                        sLabelUnidades   : 'Unidades' ,
                        aryUnidades      : aryUnidades,
                        sColorUnidades   : fncGetRandomColor(),
                        // Monto
                        sLabelMonto      : 'Monto' ,
                        aryMontos        : aryMontos,
                        sColorMonto      : fncGetRandomColor()
                    };
                    
                    fncDwarChart5("chartPrdt", "line", jsnData) ;


                    // Reporte Catalogo 

                    var aryMesesCatalogo            = aryNewDataReporteCatalogo.aryMesesReporteCatalogo;
                    var aryDataSetReporteCatalogo   = aryNewDataReporteCatalogo.aryDataSetReporteCatalogo;

                    var aryDataSetCatalogo          = [];
                     
                     if( Object.values(aryMesesCatalogo).length > 0 && Object.values(aryDataSetReporteCatalogo).length > 0 ){

                        $.each(aryDataSetReporteCatalogo , function(nIndex, element) {
                            
                            aryDataSetCatalogo.push({
                                label           : element.sCatalogo,
                                data            : element.aryCantidad,
                                backgroundColor : fncGetRandomColor(),
                                borderWidth     : 0,
                            });
                            
                        });

                    }

                    var jsnDataReportCatalogo = {
                        label    : aryMesesCatalogo,
                        datasets : aryDataSetCatalogo 
                    };
           
                    fncDrawChart6("chartCatalogo", "bar", jsnDataReportCatalogo);

                    // Reporte Cliente 

                    var aryMesesCliente            = aryNewDataReporteCliente.aryMesesReporteCliente;
                    var aryDataSetReporteCliente   = aryNewDataReporteCliente.aryDataSetReporteCliente;

                    var aryDataSetCliente          = [];
                     
                     if( Object.values(aryMesesCliente).length > 0 && Object.values(aryDataSetReporteCliente).length > 0 ){

                        $.each(aryDataSetReporteCliente , function(nIndex, element) {
                            
                            aryDataSetCliente.push({
                                label           : element.sTipoCliente,
                                data            : element.aryCantidad,
                                backgroundColor : fncGetRandomColor(),
                                borderWidth     : 0,
                            });
                            
                        });

                    }

                    var jsnDataReportCliente = {
                        label    : aryMesesCliente,
                        datasets : aryDataSetCliente 
                    };

                    //console.log(jsnDataReportCliente);
           
                    fncDrawChart7("chartCliente", "bar", jsnDataReportCliente);

 
                } else {
                    toastr.error(aryData.error);
                }

            });
        });


        $("#btnCleanFiltrosRV").on("click",function(){

            $("#nTipoItemCatalogo").val(0);
            $("#nIdEmpleadoSupervisor").val([]).trigger("change");
            $("#nIdEmpleadoAsesor").val([]).trigger("change");
            $("#dDesde").val('');
            $("#dHasta").val('');

            setTimeout(() => {
                $("#form-reporte").trigger("submit");
            }, 200);

        });



    });

    var fncGetJsnDataByReportCatalogoCliente = function(aryData){

        var jsnData  ={};

        var label      = [];
        var valores     = [];
        var background  = [];

        if( aryData.length > 0 ){

            aryData.forEach(element => {
                label.push(element.sCatalogo);
                valores.push(element.nCantidad);
                background.push(fncGetRandomColor());
            }); 
        }

        jsnData = {
            label       : label,
            valores     : valores,
            background  : background
        };
 
        return jsnData;
    }


    let fncDwarChart1 = (sHtmlTag, sType, jsnData, sTitleGrafic) => {

        var config = fncBuildOptionsChart(sHtmlTag, sType, jsnData, sTitleGrafic);

        var ctx = document.getElementById(sHtmlTag).getContext("2d");

        if (chartServEmpresa != undefined) chartServEmpresa.destroy();

        chartServEmpresa = new Chart(ctx, config);
    };

    let fncDwarChart2 = (sHtmlTag, sType, jsnData, sTitleGrafic) => {

        var config = fncBuildOptionsChart(sHtmlTag, sType, jsnData, sTitleGrafic);

        var ctx = document.getElementById(sHtmlTag).getContext("2d");

        if (chartProdEmpresa != undefined) chartProdEmpresa.destroy();

        chartProdEmpresa = new Chart(ctx, config);
    }

    let fncDwarChart3 = (sHtmlTag, sType, jsnData, sTitleGrafic) => {

        var config = fncBuildOptionsChart(sHtmlTag, sType, jsnData, sTitleGrafic);

        var ctx = document.getElementById(sHtmlTag).getContext("2d");

        if (chartServPersona != undefined) chartServPersona.destroy();

        chartServPersona = new Chart(ctx, config);
    }

    let fncDwarChart4 = (sHtmlTag, sType, jsnData, sTitleGrafic) => {

        var config = fncBuildOptionsChart(sHtmlTag, sType, jsnData, sTitleGrafic);

        var ctx = document.getElementById(sHtmlTag).getContext("2d");

        if (chartProdPersona != undefined) chartProdPersona.destroy();

        chartProdPersona = new Chart(ctx, config);
    }

    let fncDwarChart5 = (sHtmlTag, sType, jsnData) => {

        var ctx = document.getElementById(sHtmlTag).getContext("2d");

        var config = {
            type: sType,
            data: {
                datasets: [{
                    label: jsnData.sLabelUnidades,
                    data: jsnData.aryUnidades,
                    backgroundColor: jsnData.sColorUnidades,
                    borderColor: jsnData.sColorUnidades,
                    fill: false,
                }, {
                    label: jsnData.sLabelMonto,
                    data:  jsnData.aryMontos,
                    backgroundColor: jsnData.sColorMonto,
                    borderColor: jsnData.sColorMonto,
                    // Changes this dataset to become a line
                    type: 'line',
                    fill: false,

                }],
                labels: jsnData.aryMeses
            },
            options: {

            }
        };

        if (chartPrdt != undefined) chartPrdt.destroy();

        chartPrdt = new Chart(ctx, config);
    }

    let fncDrawChart6 = (sHtmlTag, sType, jsnData) => {

        var ctx = document.getElementById(sHtmlTag).getContext("2d");
 
        var data = {
            labels   : jsnData.label,
            datasets : jsnData.datasets, 
        };
 
        var config = {
            type: sType,
            data: data,
        };


        if (chartCatalogo != undefined) chartCatalogo.destroy();

        chartCatalogo = new Chart(ctx, config);
    }

    let fncDrawChart7 = (sHtmlTag, sType, jsnData) => {

        var ctx = document.getElementById(sHtmlTag).getContext("2d");
 
        var data = {
            labels   : jsnData.label,
            datasets : jsnData.datasets, 
        };
 
        var config = {
            type: sType,
            data: data,
        };


        if (chartCliente != undefined) chartCliente.destroy();

        chartCliente = new Chart(ctx, config);

    };

    var fncBuildOptionsChart = (sHtmlTag, sType, jsnData, sTitleGrafic) => {
        var config = {
            // The type of chart we want to create
            type: sType,
            // The data for our dataset
            data: {
                labels: jsnData.label,
                datasets: [{
                    label: sTitleGrafic,
                    backgroundColor: jsnData.background,
                    borderColor: jsnData.background,
                    data: jsnData.valores,
                    fill: false,
                }, ],
            },
            options: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: sTitleGrafic
                }
            },
        };

        return config;
    }

    function fncGetRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }


    // llamadas al servidor 
    function fncGetReporteProspectos(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetReporteProspectos',
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


<!-- Reporte Consultor -->
<script>

    $(document).ready(function() {

  
        $("#btnReporteConsultor").on('click', function() {
            fncOcultarAside();
            $("#formReporteConsultor").modal("show");
            $("#tblReporteConsultor").bootstrapTable("load",[]);
        });

        $("#form-reporte-consultor").on("submit",function(event){
            
            event.preventDefault();

            var nIdTipoItem      = $("#nTipoItemCatalogoRC").val(); 
            var dDesde           = $("#dDesdeRC").datepicker('getDate');
            var dHasta           = $("#dHastaRC").datepicker('getDate');
            var arySupervisor    = $("#nIdEmpleadoSupervisorRC :selected").map(function(nIndex, item) { return $(item).val(); }).get();
            var aryAsesor        = $("#nIdEmpleadoAsesorRC :selected").map(function(nIndex, item) { return $(item).val(); }).get();

            if ((dDesde != null && dHasta == null) || (dDesde == null && dHasta != null)) {
                toastr.error('Error. Si va a especificar fechas, debe ingresar la inicio y fin. Por favor verificar.');
                return;
            }

            if (dHasta < dDesde) {
                toastr.error('Error. La fecha de fin debe ser mayor o igual que la fecha de inicio. Por favor verificar.');
                return;
            } 

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdTipoItem     : nIdTipoItem,
                dDesde          : $('#dDesdeRC').val(),
                dHasta          : $('#dHastaRC').val(),
                arySupervisor   : arySupervisor,
                aryAsesor       : aryAsesor
            };

            fncGetReporteAsesor(jsnData,(aryData)=>{
                if(aryData.success){

                    toastr.success(aryData.success);

                    var aryData = aryData.aryData;

                    $("#tblReporteConsultor").bootstrapTable("load",aryData);
 
                } else {
                    toastr.error(aryData.error);
                }

            });
        });

        
        $("#btnCleanFiltrosRC").on("click",function(){

            $("#nTipoItemCatalogoRC").val(0);
            $("#nIdEmpleadoSupervisorRC").val([]).trigger("change");
            $("#nIdEmpleadoAsesorRC").val([]).trigger("change");
            $("#dDesdeRC").val('');
            $("#dHastaRC").val('');

            setTimeout(() => {
                $("#form-reporte-consultor").trigger("submit");
            }, 200);

        });

     
        
        
    });

    // Funciones Auxiliares

   
    // llamadas al servidor 
    function fncGetReporteAsesor(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetReporteAsesor',
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
<!-- Reporte Consultor -->




<!-- Reporte Empleado Basico -->
<script>

    $(document).ready(function() {

  
        $("#btnReporteBasicoEmpleado").on('click', function() {
        
            fncOcultarAside();

            var jsnData = {
                nIdNegocio    : $("body").data("nidnegocio"), 
                nTipoEmpleado : $("body").data("ntipoempleadoasesorventas"),
            };

            fncDrawReporteBasicoEmpleado(jsnData);
            $("#formReporteBasicoEmpleado").modal("show");

        });
 
        
    });

    // Funciones Auxiliares

    function fncDrawReporteBasicoEmpleado(jsnData){
        fncGetReporteBasicoEmpleados(jsnData,(aryData)=>{
            if(aryData.success){

                toastr.success(aryData.success);

                var aryData = aryData.aryData;

                var arySexo                 = aryData.arySexo;
                var aryExperienciaVentas    = aryData.aryExperienciaVentas;
                var aryEdades               = aryData.aryEdades;
                var aryEstadoCivil          = aryData.aryEstadoCivil;
                var aryPersonasDependientes = aryData.aryPersonasDependientes;

                 
                
                // Sexo 
                $("#sDataHombres").html(arySexo.sDataHombres);
                $("#sDataMujeres").html(arySexo.sDataMujeres);

                // Experiencia 
                $("#sDataConExpe").html(aryExperienciaVentas.sDataConExpe);
                $("#sDataSinExpe").html(aryExperienciaVentas.sDataSinExpe);

                // Edades 
                $("#sDataRangoEdad1").html(aryEdades.sDataRangoEdad1);
                $("#sDataRangoEdad2").html(aryEdades.sDataRangoEdad2);
                $("#sDataRangoEdad3").html(aryEdades.sDataRangoEdad3);
                $("#sDataRangoEdad4").html(aryEdades.sDataRangoEdad4);
                
                // Estado civil
                $("#sDataCasados").html(aryEstadoCivil.sDataCasados);
                $("#sDataSolteros").html(aryEstadoCivil.sDataSolteros);
                $("#sDataViudos").html(aryEstadoCivil.sDataViudos);
                $("#sDataDivorciado").html(aryEstadoCivil.sDataDivorciado);
                $("#sDataConviviente").html(aryEstadoCivil.sDataConviviente);

                // Personas dependeintes
                $("#sDataConHijos").html(aryPersonasDependientes.sDataConHijos);
                $("#sDataSinHijos").html(aryPersonasDependientes.sDataSinHijos);

            } else {
                toastr.error(aryData.error);
            }

        });
    }

   
    // llamadas al servidor 
    function fncGetReporteBasicoEmpleados(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetReporteBasicoEmpleados',
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
<!-- Reporte Empleado Basico -->


<!-- querys -->
<script>
    $(document).ready(function(){

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const query = urlParams.get('query');

        // console.log(query);

        if(query != null){
            switch(query){
                case 'rBasicoEmpleado' :
                    $("#btnReporteBasicoEmpleado").trigger("click");
                break;
 
            }
        }


    });
</script>
<!-- querys -->




</html>