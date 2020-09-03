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
                                                <h5 class="m-0">Clientes :</h5>
                                            </div>
                                            <div class="bd-highlight">
                                                <button data-toggle="modal" data-target="#formClientes" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4">
                                        <!-- Tu contenido  --->


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


                                        <!-- Fin de tu contenido  --->

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

    <div class="modal fade" id="formClientes" tabindex="-1" role="dialog" aria-labelledby="formClientesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formClientesLabel">Nuevo Cliente</h5>
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





    <!-- Fin de modales -->






</body>

<script>
    const web_root = '<?= WEB_ROOT ?>';
    const simbolo_moneda = '<?= SIMBOLO_MONEDA ?>';
</script>

<?php extend_view(['admin/common/scripts'], $data) ?>

</html>