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
                                                <h5 class="m-0">Home - <?= uc($negocio["nombreNegocio"]) ?></h5>
                                            </div>
                                            <div class="bd-highlight">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="row">

                                            <div class="col-md-4 col-12 mb-2">
                                                <div class="row border-card mx-3 card-dashboard card-dash-color-1">
                                                    <div class="col-12 text-center">
                                                        <h4 class="title-dashcoard-card">Citas</h4>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <i class="far fa-calendar-alt icon-card-dashboard"></i>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 cant-dashbaord">10</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-12 mb-2">
                                                <div class="row border-card mx-3 card-dashboard card-dash-color-2">
                                                    <div class="col-12 text-center">
                                                        <h4 class="title-dashcoard-card">Cierres</h4>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <i class="fas fa-clipboard-check icon-card-dashboard"></i>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 cant-dashbaord">10</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-12 mb-2">
                                                <div class="row border-card mx-3 card-dashboard card-dash-color-3">
                                                    <div class="col-12 text-center">
                                                        <h4 class="title-dashcoard-card">Oportunidad</h4>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <i class="fas fa-clipboard-check icon-card-dashboard"></i>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 cant-dashbaord">10</p>
                                                    </div>
                                                </div>
                                            </div>







                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 my-4">

                                                <div id="toolbar">
                                                  
                                                </div>


                                                <table data-toggle="table" data-show-export="true" data-show-refresh="false" id="tblPrincipal" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="true" data-pagination="true" data-toolbar="#toolbar" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                                    <thead>
                                                        <tr>
                                                            <th>Id prospecto</th>
                                                            <th>Cliente</th>
                                                            <th>Vendedor</th>
                                                            <th>Cant Producto o servicio </th>
                                                            <th>Total</th>
                                                            <th>Cantidad de citas</th>
                                                            <th>Ultima Cita</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php for ($i = 0; $i < 10; $i++) : ?>
                                                            <tr>
                                                    
                                                                <th>00000<?= $i ?></th>
                                                                <th>Angelo Trujillo</th>
                                                                <th>Mario Gomez</th>
                                                                <th>1 Servicio </th>
                                                                <th>1000.00</th>
                                                                <th>1</th>
                                                                <th>04/09/2020</th>
                                                                <th>1% - Progrmada</th>

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
                    </div>


                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->





    <!-- Fin de modales -->






</body>

<script>
    const web_root = '<?= WEB_ROOT ?>';
    const simbolo_moneda = '<?= SIMBOLO_MONEDA ?>';
</script>

<?php extend_view(['admin/common/scripts'], $data) ?>

</html>