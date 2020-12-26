<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['empleado/common/head'], $data) ?>
</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-start align-items-md-center auth py-md-auto px-md-auto px-0 py-0">
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
                                <img class="img img-fluid" style="max-width: 100px;margin: 15px 0px;" src="<?= src('app/qway.png') ?>">
                            </div>
                            <h4>¡Hola! empecemos</h4>
                            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
                            <form method="post" action="<?= route('acceso') ?>" class="pt-3">

                                <div class="form-group">
                                    <input type="text" name="sUsuario" class="form-control form-control-lg" id="sUsuario" placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="sClave" class="form-control form-control-lg" id="sClave" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Ingresar</button>
                                </div>
                                <div class="mt-3">
                                    <a id="btnRecuperarClave" href="javascript:;">Recuperar Contraseña</a>
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

    <!--Modales -->

    <div class="modal fade" id="formRecuperar" tabindex="-1" role="dialog" aria-labelledby="formRecuperarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-recuperar">
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-recuperar" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4>Recuperar contraseña</h4>
                                <p class="d-block">Ingresa tu email y te enviaremos tu contraseña</p>
                                <div class="form-group">
                                    <input type="text" name="sEmail" class="form-control form-control-lg" id="sEmail" placeholder="Email">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient-primary btn-md">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Fin de modales -->

</body>

<?php extend_view(['empleado/common/scripts'], $data) ?>

<script>
$(document).ready(() => {
    $("#btnRecuperarClave").on("click",function(){
        $("#formRecuperar").modal("show");
    });
});

</script>

</html>