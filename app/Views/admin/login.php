<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>

</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth fondo-login">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <?php if (isset($error) && !empty($error)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $error ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <div class="auth-form-light text-center p-5">
                            <div class="brand-logo">
                                <img class="img img-fluid" style="max-width: 100px;margin: 15px 0px;"
                                    src="<?= src('app/qway.png') ?>">
                            </div>
                            <h4>¡Hola! empecemos</h4>
                            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
                            <form method="post" action="<?= route('admin/acceso') ?>" class="pt-3">
                            
                                <div class="form-group">
                                    <input type="text" name="usuario" class="form-control form-control-lg" id="usuario"
                                        placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="clave" class="form-control form-control-lg" id="clave"
                                        placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>


</body>

<?php extend_view(['admin/common/scripts'], $data) ?>

</html>