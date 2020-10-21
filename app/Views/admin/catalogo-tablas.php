<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body>

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
                                                        <span class="title-prospectos">Mantenimiento de catalogo de
                                                            tablas</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin de Fila Cabecera -->

                                        <div class="row my-2">
                                            <div class="col-12">

                                                <div id="toolbar" class="btn-group toolbarCatalogoTabla noRefreshIcon">
                                                    <div class="col-md-6 sin-padding ">
                                                        <select class="form-control" id="cboNombreCatalogo" name="cboNombreCatalogo">
                                                            <option value="0">Seleccionar</option>
                                                            <?php foreach ($aryCatalogoPadre as $aryCtPadre) : ?>
                                                                <option value="<?= $aryCtPadre['sNombreCatalogo'] ?>"><?= $aryCtPadre['sNombreCatalogo'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 sin-padding container-buttons-table">

                                                        <button class="btn btn-gradient-primary-table" type="button" title="Crear Tabla" id="btnCrearTabla">
                                                            <i class="fas fa-folder-plus"></i>
                                                        </button>

                                                        <button class="btn btn-gradient-primary-table" type="button" title="Crear Items" id="btnCrearItem">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>

                                                        <button class="btn btn-gradient-primary-table" type="button" title="Imprimir" onclick="window.print();" id="btnprint">
                                                            <i class="fas fa-print"></i>
                                                        </button>


                                                    </div>
                                                </div>

                                                <table data-toggle="table" id="tblPrincipal" data-url="<?= route('admin/catalogoTabla/populate') ?>" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="sAcciones">
                                                                Acciones
                                                            </th>
                                                            <th data-field="nIdItem" data-sortable="true">ID Item</th>
                                                            <th data-field="sCatalogo" data-sortable="true">Tabla</th>
                                                            <th data-field="sCodigo" data-sortable="true">Código</th>
                                                            <th data-field="sLarga" data-sortable="true">Descripción
                                                                larga</th>
                                                            <th data-field="sCorta" data-sortable="true">Descripción
                                                                corta</th>
                                                            <th data-field="sTipo">Tipo</th>
                                                            <th data-field="sCliente">Ver Cliente</th>
                                                            <th data-field="sDefecto">Defecto</th>
                                                            <th data-field="sPadre">Tabla Padre</th>
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
                    </div>


                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->

    <!-- Modal de Crear Tabla -->
    <div class="modal fade" id="formTabla" tabindex="-1" role="dialog" aria-labelledby="formTablaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formTablaLabel">Crear Tabla</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-4 flex-center">
                            <label>Nombre Tabla</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="sNombreCatalogo" id="sNombreCatalogo" maxlength="100">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formItem" tabindex="-1" role="dialog" aria-labelledby="formItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formItemLabel">Crear Item</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Nombre Tabla</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" readonly name="TxtsNombreCatalogo" id="TxtsNombreCatalogo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Código Item</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="TxtsCodigoItem" id="TxtsCodigoItem" maxlength="10">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Descripción Larga</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="TxtsDescripcionLargaItem" id="TxtsDescripcionLargaItem" maxlength="300">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Descripción Corta</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="TxtsDescripcionCortaItem" id="TxtsDescripcionCortaItem" maxlength="20">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Tipo</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="sTipoItem" name="sTipoItem">
                                    <option value="2">Interno</option>
                                    <option value="1">Tributario</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <label>Mostrar a Cliente</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="sMostrarCliente" name="sMostrarCliente">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-2">
                                <label>Item x Defecto</label>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" id="sDefecto" name="sDefecto">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-2">
                                <label>Estado</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="sEstado" name="sEstado">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="ui-dialog-buttonset">
                            <button class="btn btn-gradient-primary" type="button" id="control-avanzados">Enlazar Padre</button>
                        </div>
                        <br>
                        <div id="tabs" style="display: none;">
                            <div class="">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label>Tabla Padre</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" id="cboNombreCatalogoPadre" name="cboNombreCatalogoPadre">
                                            <option value="0">[Seleccionar]</option>
                                            <?php foreach ($aryCatalogoPadre as $aryCatPad) : ?>
                                                <option value="<?= $aryCatPad['sNombreCatalogo'] ?>"><?= $aryCatPad['sNombreCatalogo'] ?> </option>
                                            <?php endforeach ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label>Item Padre</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="divItemPadre">
                                            <select class="form-control" id="cboNombreCatalogoItemPadre" name="cboNombreCatalogoItemPadre">
                                                <option value="0">[Seleccionar]</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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





    <!-- Fin de modales -->






</body>



<?php extend_view(['admin/common/scripts'], $data) ?>

<?php load_script(['admin/catalogotabla']);?>

</html>