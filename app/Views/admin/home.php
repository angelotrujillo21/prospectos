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

                <div class="main-content-container container-fluid px-2">

                    <div id="preloader" class="preloader">
                        <div class="lds-ripple">
                            <div></div>
                            <div></div>
                        </div>
                    </div>

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
                                                        <div class="cuadrado color-rojo"></div>
                                                        <div class="cuadrado color-amarillo"></div>
                                                        <div class="cuadrado color-verde"></div>
                                                    </div>
                                                    <div class="d-flex align-items-center ml-auto p-2">
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                                            <span>AT</span>
                                                        </div>
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                                            <span>AB</span>
                                                        </div>
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                                            <span>AC</span>
                                                        </div>
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                                            <span>ZZ</span>
                                                        </div>
                                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                                            <span>AB</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end p-2">
                                                        <a href="javascript:;" data-toggle="modal" data-target="#modalColaboradores">Ver Todo</a>
                                                    </div>
                                                    <div class="d-flex d-flex align-items-center p-2">
                                                        <button data-toggle="modal" data-target="#formColaborador" class="btn btn-invitar">Invitar</button>
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
                                    <label for="" class="col-form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" autocomplete="off" name="">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tipo:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Seleccionar</option>
                                        <option value="">Supervisor</option>
                                        <option value="">Vendedor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Color:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Seleccionar</option>
                                        <option value="">Rojo</option>
                                        <option value="">Verde</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary btn-fw">Invitar</button>
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


                    <div class=" row">

                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                            <span>AT</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span>Angelo Trujillo Orozco</span>
                                        <div class="w-100"></div>
                                        <span class="font-14">Asesora de ventas</span>
                                        <div class="w-100"></div>
                                        <span class="font-13">QWAY</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-rojo"></div>
                                        <span class="activo-hace">Activo hace 5h</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                            <span>AT</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span>Angelo Trujillo Orozco</span>
                                        <div class="w-100"></div>
                                        <span class="font-14">Asesora de ventas</span>
                                        <div class="w-100"></div>
                                        <span class="font-13">QWAY</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-amarillo"></div>
                                        <span class="activo-hace">Activo hace 5h</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="Angelo trujillo">
                                            <span>AT</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span>Angelo Trujillo Orozco</span>
                                        <div class="w-100"></div>
                                        <span class="font-14">Asesora de ventas</span>
                                        <div class="w-100"></div>
                                        <span class="font-13">QWAY</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-amarillo"></div>
                                        <span class="activo-hace">Activo hace 5h</span>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>



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
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</html>