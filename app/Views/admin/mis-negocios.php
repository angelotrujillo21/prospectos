<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body>



    <div class="container-fluid">

        <div class="row">


            <main class="main-content col-lg-12 col-md-9 col-sm-12 p-0">

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
                                                <h5 class="m-0">Seleccione su negocio :</h5>
                                            </div>
                                            <div class="bd-highlight">
                                                <button data-toggle="modal" data-target="#formNegocio" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="row">
                                            <?php foreach ($negocios  as $negocio) : ?>
                                                <figure class="col-md-4 text-center">
                                                    <div class="position-relative contenedor-negocio text-center">
                                                        <a href="<?= route('admin/home/' . $negocio["idNegocio"]) ?>">
                                                            <img alt="picture" 
                                                            style=" width: 100px; height: 100px; max-width: 100px; max-height: 100px;"
                                                            src="<?= src('multi/' . $negocio['imagenNegocio']) ?>" class="img-fluid">
                                                            <div class="overlay">
                                                                <div class="text-overlay"><i class="far fa-arrow-alt-circle-right"></i>
                                                                </div>
                                                            </div>
                                                            <figcaption class="figure-caption">
                                                                <?= $negocio["nombreNegocio"] ?></figcaption>
                                                        </a>
                                                    </div>
                                                </figure>
                                            <?php endforeach; ?>
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

    <div class="modal fade" id="formNegocio" tabindex="-1" role="dialog" aria-labelledby="formNegocioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formNegocioLabel">Nuevo Negocio</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nombreNegocio" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreNegocio" autocomplete="off" name="nombreNegocio">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="direccionNegocio" class="col-form-label">Direccion:</label>
                                    <input type="text" class="form-control" id="direccionNegocio" autocomplete="off" name="direccionNegocio">
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="imagenNegocio" class="col-form-label">Imagen:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  id="imagenNegocio" accept="image/*" lang="es" name="imagenNegocio">
                                            <label class="custom-file-label" for="imagenNegocio">Elija el archivo</label>
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