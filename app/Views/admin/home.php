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
                                                        <span class="title-prospectos">Prospectos</span>
                                                    </div>
                                                    <div class="d-flex align-items-center p-2">

                                                    <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                        <?php foreach ($arySupervisores as $arySuper) : ?>
                                                            <div data-nidempleado="<?=$arySuper['nIdEmpleado']?>" class="cuadrado fondo-<?= strtolower($arySuper['sColorSuper'])?>"></div>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                        
                                
                                                    </div>
                                                    <div class="d-flex align-items-center ml-auto p-2">

                                                    <?php if (is_array($aryVendedores)  && count($aryVendedores) > 0) : ?>
                                                        <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                            
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre'] . ' ' . $aryVendedor['sApellidos']) ?>">
                                                            <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                                        </div>

                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                            
                                
                                                    </div>
                                                    <div class="d-flex align-items-end p-2">
                                                        <a href="javascript:;" data-toggle="modal" data-target="#modalColaboradores">Ver Todo</a>
                                                    </div>
                                                    <div class="d-flex d-flex align-items-center p-2">
                                                        <button id="btnCrearInvitacion" class="btn btn-invitar">Invitar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin de Fila Cabecera -->

                                        <div class="row my-2">
                                            <div class="col-12">

                                                <div class="pr-scroll-x">

                                                    <div class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">1% -
                                                                    Prospecto</span>
                                                            </div>
                                                            <div class="ml-auto p-2">
                                                                <a class="link-ver-todo" href="#">Ver Todo</a>
                                                            </div>
                                                        </div>

                                                        <div class="list-prospectos my-2">

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-1-border-left border-top-rojo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-1-color"> 1% -
                                                                            Programada
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-1-border-left border-top-amarillo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-1-color"> 1% -
                                                                            Programada
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">25% - Envio de
                                                                    propuesto</span>
                                                            </div>
                                                            <div class="ml-auto p-2">
                                                                <a class="link-ver-todo" href="#">Ver Todo</a>
                                                            </div>
                                                        </div>

                                                        <div class="list-prospectos my-2">

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-2-border-left border-top-verde mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 25% - Envio
                                                                            de propuesto
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-2-border-left border-top-rojo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 25% - Envio
                                                                            de propuesto
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">50% -
                                                                    Negociacion</span>
                                                            </div>
                                                            <div class="ml-auto p-2">
                                                                <a class="link-ver-todo" href="#">Ver Todo</a>
                                                            </div>
                                                        </div>

                                                        <div class="list-prospectos my-2">

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-2-border-left border-top-verde mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 50% -
                                                                            Negociacion
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-2-border-left border-top-verde mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 50% -
                                                                            Negociacion
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-2-border-left border-top-verde mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 50% -
                                                                            Negociacion
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">90% -
                                                                    En Proceso</span>
                                                            </div>
                                                            <div class="ml-auto p-2">
                                                                <a class="link-ver-todo" href="#">Ver Todo</a>
                                                            </div>
                                                        </div>

                                                        <div class="list-prospectos my-2">

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-4-border-left border-top-amarillo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-2-color"> 50% -
                                                                            En Proceso
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>

                                                    <div class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">100% -
                                                                    Cierre</span>
                                                            </div>
                                                            <div class="ml-auto p-2">
                                                                <a class="link-ver-todo" href="#">Ver Todo</a>
                                                            </div>
                                                        </div>

                                                        <div class="list-prospectos my-2">

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-5-border-left border-top-rojo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-5-color"> 100% -
                                                                            Cierre
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-prospecto border-top-pr border-left-pr etapa-5-border-left border-top-rojo mb-3">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-10">
                                                                        <span class="pr-cliente">Cliente: Angelo
                                                                            Trujillo
                                                                            Orozco</span>
                                                                        <div class="w-100"></div>
                                                                        <span class="pr-vendedor">Vend: Juan Perez
                                                                            Gomez</span>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-end">
                                                                        <a class="pr-icon-edit" href="#">
                                                                            <i class="far fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <span class="font-14"> 1 Servicio - S./ 1000.00
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-cita"> Ult.Cita 31/08/20 17:30
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col-6">
                                                                        <span class="font-14 etapa-5-color"> 100% -
                                                                            Cierre
                                                                        </span>
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <span class="ult-ingreso color-text-verde">
                                                                            Ingreso
                                                                            hace 1 min </span>
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


    <div class="modal fade" id="formColaborador" tabindex="-1" role="dialog" aria-labelledby="formColaboradorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formColaboradorLabel">Invitar Colaborador</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="sEmail" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="sEmail" autocomplete="off" name="sEmail">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tipo:</label>
                                    <select class="form-control" name="nTipoEmpleado" id="nTipoEmpleado">
                                        <option value="0">Seleccionar</option>
                                        <?php if (is_array($aryTipoEmpleados)  && count($aryTipoEmpleados) > 0) : ?>
                                            <?php foreach ($aryTipoEmpleados as $aryTipoEmpleado) : ?>
                                                <option value="<?= $aryTipoEmpleado['nIdCatalogoTabla'] ?>"><?= $aryTipoEmpleado['sDescripcionLargaItem'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                    </select>
                                </div>
                            </div>

                            <div id="container-color" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Color:</label>
                                    <select class="form-control" name="nIdColor" id="nIdColor">
                                        <option value="0">Seleccionar</option>
                                        <?php if (is_array($aryColores)  && count($aryColores) > 0) : ?>
                                            <?php foreach ($aryColores as $aryColor) : ?>
                                                <option value="<?= $aryColor['nIdCatalogoTabla'] ?>"><?= $aryColor['sDescripcionLargaItem'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>


                            <div id="container-supervisor" class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Supervisor:</label>

                                    <select class="form-control" name="nIdSupervisor" id="nIdSupervisor">
                                        <option value="0">Seleccionar</option>
                                        <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                            <?php foreach ($arySupervisores as $arySuper) : ?>
                                                <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= uc($arySuper['sNombre'] . ' ' . $arySuper['sApellidos']) ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>



                        </div>

                        <div id="content-link-copy" class="row flex-center">
                            <div class="col-8">
                                <p class="mb-2 color-azul">Si no llego el correo puede utiliza este link para el registro del colaborador.</p>
                                <div class="input-group mb-3">
                                    <input type="text" id="sLinkCopy" readonly class="form-control" placeholder="Copia el link.." aria-label="Copia el link.." aria-describedby="basic-copy">
                                    <div id="btnCopyLink" class="input-group-append cursor-pointer" >
                                        <span class="input-group-text" id="basic-copy"><i class="far fa-copy"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw btn-submit">Invitar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalColaboradores" tabindex="-1" role="dialog" aria-labelledby="modalColaboradoresLabel" aria-hidden="true">
        <div class="modal-dialog dialog-colaborador" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalColaboradoresLabel">Lista de Colaboradores</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">
                    <?php if (is_array($aryVendedores)  && count($aryVendedores) > 0) : ?>
                        <?php foreach ($aryVendedores as $aryVendedor) : ?>
                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre'] . ' ' . $aryVendedor['sApellidos']) ?>">
                                            <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span><?= uc($aryVendedor['sNombre'] . ' ' . $aryVendedor['sApellidos']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-14"><?= uc($aryVendedor['sTipoEmpleado']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-13"><?= strtoupper($aryVendedor['sNombreNegocio']) ?></span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-<?= strtolower($aryVendedor['sColorSuperEmpleado'])?>"></div>
                                        <span class="activo-hace">Activo hace <?= secondsToTime($aryVendedor['sTimeUltimoAcceso']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php endif ?>
                        



                    </div>



                </div>

            </div>
        </div>
    </div>



    <!-- Fin de modales -->






</body>


<?php extend_view(['admin/common/scripts'], $data) ?>


<script>
    $(function() {

        // Formulario Invitar

        
        $("#btnCopyLink").on('click', function() {
            copyToClipboard('sLinkCopy');
            toastr.success("Genial!. Link copiado en portapeles");
        });

        $("#btnCrearInvitacion").on('click', function() {
            $("#content-link-copy").hide();
            $("#container-color").hide();
            $("#container-supervisor").hide();
            $("#formColaborador").modal("show");
        });

        $("#nTipoEmpleado").on('change', function() {
            if ($(this).val() != 0) {
                if ($(this).val() == '588') {
                    //Supervisor
                    $("#container-color").show();
                    $("#container-supervisor").hide();

                } else {

                    $("#container-color").hide();
                    $("#container-supervisor").show();
                }
            } else {
                $("#container-color").hide();
                $("#container-supervisor").hide();
            }
        });

        $('#formColaborador').on('hidden.bs.modal', function() {
            fncClearInputs($("#formColaborador").find("form"));
        });

        $("#formColaborador").find('.btn-submit').on('click', function() {

            var sEmail          = $("#sEmail").val().trim();
            var nTipoEmpleado   = $("#nTipoEmpleado").val().trim();
            var nIdColor        = $("#nIdColor").val().trim();
            var nIdSupervisor   = $("#nIdSupervisor").val();

            if(sEmail == ''){
                toastr.error('Error. Debe ingresar el correo del colaborador.');
                return false;
            } if(nTipoEmpleado == 0){
                toastr.error('Error. Debe seleccionar el tipo de empleado.');
                return false;
            } 
            
            if (nTipoEmpleado == '588') {
                if(nIdColor == 0){
                    toastr.error('Error. Debe seleccionar el color del supervisor.');
                    return false;
                }
            } else {
                if(nIdSupervisor == 0){
                    toastr.error('Error. Debe seleccionar un supervisor.');
                    return false;
                }
            }

            var jsnData =  {
                sEmail          : sEmail,
                nTipoEmpleado   : nTipoEmpleado,
                nIdColor        : nIdColor,
                nIdSupervisor   : nIdSupervisor
            };
           
            fncSendEmailEmpleado(jsnData, function(aryData){
               
                if(aryData.success){
                    toastr.success("Genial!.Se envio el correo correctamente.");
                } else {
                    toastr.error("Upss!. Hubo un error al enviar el correo.");
                }

                $("#content-link-copy").fadeIn();
                $("#sLinkCopy").val(aryData.sUrl);
            });

        });


    });

    // Funciones de la tabla o layout Principal 


    // Funciones Auxiliares




    // Llamadas al servidor
    function fncSendEmailEmpleado(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/empleados/fncSendEmailEmpleado',
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



</html>