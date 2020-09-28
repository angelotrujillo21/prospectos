<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

<body>



    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['admin/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-4">
                    <!-- Tu contenido -->

                    <div id="preloader" class="preloader">
                        <div class="lds-ripple">
                            <div></div>
                            <div></div>
                        </div>
                    </div>

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
                                    <button data-toggle="modal" data-target="#formCECliente" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <table data-toggle="table" id="tblPrincipal" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Tipo Cliente</th>
                                        <th>Tipo Documento</th>
                                        <th>Numero Documento</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Distrito</th>
                                        <th>Telefono</th>
                                        <th>Relacionamiento</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <tr>
                                            <th>
                                                <div class="content-acciones">
                                                    <a href="javascript:;" title="" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                                    <a href="javascript:;" title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                                    <a href="javascript:;" title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                                </div>
                                            </th>
                                            <th>Empresa</th>
                                            <th>RUC</th>
                                            <th>75348133</th>
                                            <th>QWAY SOL</th>
                                            <th>contacto@wway.com</th>
                                            <th>Lima-Lima-Breña</th>
                                            <th>9988552</th>
                                            <th>Gerente</th>
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
                                <a class="nav-item nav-link tab-form-custom active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Empresa</a>
                                <a class="nav-item nav-link tab-form-custom" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Persona</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row p-2">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="clienteRss" class="col-form-label">RRSS:</label>
                                            <input type="text" class="form-control" id="clienteRss" autocomplete="off" name="clienteRss">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Ruc:</label>
                                            <input type="text" class="form-control" id="rucCliente" autocomplete="off" name="rucCliente">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="clienteRss" class="col-form-label">Contacto:</label>
                                            <input type="text" class="form-control" id="contacto" autocomplete="off" name="contacto">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Telefono:</label>
                                            <input type="text" class="form-control" id="telefono" autocomplete="off" name="telefono">
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Correo:</label>
                                            <input type="text" class="form-control" id="telefono" autocomplete="off" name="telefono">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Relacionamiento:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Departamento:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Provincia:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="rucCliente" class="col-form-label">Distrito:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Seleccionar</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw">Guardar</button>
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
                                    <button data-toggle="modal" data-target="#formCEProducto" class="btn btn-gradient-primary btn-rounded btn-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <table data-toggle="table" id="tblPrincipal" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php for ($i = 0; $i < 10; $i++) : ?>
                                        <tr>
                                            <th>
                                                <div class="content-acciones">
                                                    <a href="javascript:;" title="" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                                    <a href="javascript:;" title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                                    <a href="javascript:;" title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                                </div>
                                            </th>
                                            <th>Producto 1</th>
                                            <th>20.00</th>
                                            <th>Este es una descripcion de un producto x</th>
                                            <th>Activo</th>
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
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clienteRss" class="col-form-label">Tipo:</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="">Producto</option>
                                        <option value="">Servicio</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clienteRss" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="clienteRss" autocomplete="off" name="clienteRss">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="rucCliente" class="col-form-label">Precio:</label>
                                    <input type="text" class="form-control" id="rucCliente" autocomplete="off" name="rucCliente">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clienteRss" class="col-form-label">Estado:</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="">Activo</option>
                                        <option value="">Descativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="clienteRss" class="col-form-label">Descripcion:</label>
                                    <textarea name="" id="" cols="20" rows="5" class="form-control" autocomplete="off"></textarea>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw">Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Fin de modales -->




</body>

<script>
    const web_root = '<?= WEB_ROOT ?>';
    const simbolo_moneda = '<?= SIMBOLO_MONEDA ?>';
</script>

<?php extend_view(['admin/common/scripts'], $data) ?>

<script>
    $(function() {
        $("#sortable").sortable();
    });
</script>

</html>