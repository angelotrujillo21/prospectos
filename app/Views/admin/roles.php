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
                                                <h5 class="m-0">Roles :</h5>
                                            </div>
                                            <div class="bd-highlight">
                                                <button data-toggle="modal" data-target="#formRoles" class="btn btn-gradient-primary btn-rounded btn-icon">
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
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="content-acciones">
                                                                <a href="javascript:;" title="" class="text-primary"><i class="material-icons">remove_red_eye</i> </a>
                                                                <a href="javascript:;" title="Editar" class="text-primary"><i class="material-icons">edit</i> </a>
                                                                <a href="javascript:;" title="Eliminar" class="text-danger"><i class="material-icons">delete</i> </a>
                                                            </div>
                                                        </td>
                                                        <td><?= $i ?></td>
                                                        <td>Administrador </td>
                                                    </tr>
                                                <?php endfor ?>
                                            </tbody>
                                        </table>



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

    <div class="modal fade" id="formRoles" tabindex="-1" role="dialog" aria-labelledby="formRolesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formRolesLabel">Nuevo Rol</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="" autocomplete="off" name="">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">

                                <div class="row  ml-content-custom-switch w-100">

                                    <div class="col-12 col-md-6 my-2">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches0">
                                            <label class="custom-control-label" for="customSwitches0">Dashboard</label>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6 my-2">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches1">
                                            <label class="custom-control-label" for="customSwitches1">Configuracion</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 my-2">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitches3">
                                            <label class="custom-control-label" for="customSwitches3">Mantenimientos

                                            </label>
                                        </div>
                                    </div>

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

</html>