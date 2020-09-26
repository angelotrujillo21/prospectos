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
                                                <button data-toggle="modal" data-target="#formNegocio"
                                                    class="btn btn-gradient-primary btn-rounded btn-icon">
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
                                                            src="<?= src('multi/' . $negocio['imagenNegocio']) ?>"
                                                            class="img-fluid">
                                                        <!--<div class="overlay">
                                                                <div class="text-overlay"><i class="far fa-arrow-alt-circle-right"></i>
                                                                </div>
                                                            </div>-->
                                                        <figcaption class="figure-caption">
                                                            <?= $negocio["nombreNegocio"] ?></figcaption>
                                                    </a>
                                                    <div class="actions-negocio">
                                                        <a href="javascript:;" title="Editar"><i
                                                                class="material-icons">edit</i> </a>
                                                    </div>
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

    <div class="modal fade" id="formNegocio" tabindex="-1" role="dialog" aria-labelledby="formNegocioLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formNegocioLabel">Nuevo Negocio</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-12 mb-1">
                                <span class="title-negocio">General</span>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nombreNegocio" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreNegocio" autocomplete="off"
                                        name="nombreNegocio">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="direccionNegocio" class="col-form-label">Direccion:</label>
                                    <input type="text" class="form-control" id="direccionNegocio" autocomplete="off"
                                        name="direccionNegocio">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="imagenNegocio" class="col-form-label">Imagen:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imagenNegocio"
                                                accept="image/*" lang="es" name="imagenNegocio">
                                            <label class="custom-file-label" for="imagenNegocio">Elija el
                                                archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="" class="col-form-label">Tipo De Prospecto:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Seleccionnar</option>
                                        <option value="">Corto</option>
                                        <option value="">Normal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-1">
                                <span class="title-negocio">Controles</span>
                            </div>


                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <span>Cliente
                                        <a class="edit-controles" data-toggle="modal" data-target="#formCliente"><i
                                                class="fas fa-pen"></i></a></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <span>Vendedores <a class="edit-controles" data-toggle="modal" data-target="#formVendedores"><i
                                                class="fas fa-pen"></i></a></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <span>Productos o servicios <a class="edit-controles" data-toggle="modal"
                                            data-target="#formProductosoServicios"><i class="fas fa-pen"></i></a></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <span>Supervisores <a class="edit-controles" data-toggle="modal" data-target="#formSupervisores"><i
                                                class="fas fa-pen"></i></a></span>
                                </div>
                            </div>




                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <div class="modal fade" id="formCliente" tabindex="-1" role="dialog" aria-labelledby="formClienteLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formClienteLabel">Editar Control cliente</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    
                        <div class="row  ml-content-custom-switch w-100">

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="rrssCheck">
                                    <label class="custom-control-label" for="rrssCheck">RRSS</label>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="rucCheck">
                                    <label class="custom-control-label" for="rucCheck">RUC</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="contactoCheck">
                                    <label class="custom-control-label" for="contactoCheck">Contacto
                                    
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="telefonocheck">
                                    <label class="custom-control-label" for="telefonocheck">Telefono
                                        
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="correoCheck">
                                    <label class="custom-control-label" for="correoCheck">Correo</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="relacionamientoCheck">
                                    <label class="custom-control-label" for="relacionamientoCheck">Relacionamiento</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="distritoCheck">
                                    <label class="custom-control-label" for="distritoCheck">Distrito</label>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
             
            </div>
        </div>
    </div>


    <div class="modal fade" id="formVendedores" tabindex="-1" role="dialog" aria-labelledby="formVendedoresLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formVendedoresLabel">Editar Control Vendedor</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    
                        <div class="row  ml-content-custom-switch w-100">

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="numerodeDocumentoCheck">
                                    <label class="custom-control-label" for="numerodeDocumentoCheck">Numero de Documento</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="nombreCheck">
                                    <label class="custom-control-label" for="nombreCheck">Nombre</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="estadoCivilCheck">
                                    <label class="custom-control-label" for="estadoCivilCheck">Estado Civil</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="fechaNacimientoCheck">
                                    <label class="custom-control-label" for="fechaNacimientoCheck">Fecha Nacimiento
                                    
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="candidaddePersonasDependientescheck">
                                    <label class="custom-control-label" for="candidaddePersonasDependientescheck">Cantidad de Personas Dependientes
                                        
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="experienciaenVentasVendedorCheck">
                                    <label class="custom-control-label" for="experienciaenVentasVendedorCheckk">Experencia en Ventas</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="estudiosCheck">
                                    <label class="custom-control-label" for="estudiosCheck">Estudios</label>
                                </div>
                            </div>
                          

                        </div>

                    </form>
                </div>
               
            </div>
        </div>
    </div>

        <div class="modal fade" id="formProductosoServicios" tabindex="-1" role="dialog" aria-labelledby="formProductosoServiciosLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formProductosoServiciossLabel">Editar Control Productos</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    
                        <div class="row  ml-content-custom-switch w-100">

                         
                            <div class="col-12 col-md-4 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="nombreProductoCheck">
                                    <label class="custom-control-label" for="nombreProductoCheck">Nombre</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="precioCheck">
                                    <label class="custom-control-label" for="precioCheck">Precio</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="descripcionCheck">
                                    <label class="custom-control-label" for="descripcionCheck">Descripcion
                                    
                                    </label>
                                </div>
                            </div>


                        </div>

                    </form>
                </div>
              
            </div>
        </div>
    </div>

    <div class="modal fade" id="formSupervisores" tabindex="-1" role="dialog" aria-labelledby="formSupervisoresLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formSupervisoresLabel">Editar Control Supervisor</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0"
                        data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    
                        <div class="row  ml-content-custom-switch w-100">

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="numerodeDocumentoSupervisorCheck">
                                    <label class="custom-control-label" for="numerodeDocumentoSupervisorCheck">Numero de Documento</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="nombreSupervisorCheck">
                                    <label class="custom-control-label" for="nombreSupervisorCheck">Nombre</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="estadoCivilSupervisorCheck">
                                    <label class="custom-control-label" for="estadoCivilSupervisorCheck">Estado Civil</label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="fechaNacimientoSupervisorCheck">
                                    <label class="custom-control-label" for="fechaNacimientoSupervisorCheck">Fecha Nacimiento
                                    
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="candidaddePersonasDependientesSupervisorcheck">
                                    <label class="custom-control-label" for="candidaddePersonasDependientesSupervisorcheck">Cantidad de Personas Dependientes
                                        
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="experienciaenVentasSupervisorCheck">
                                    <label class="custom-control-label" for="experienciaenVentasSupervisorCheck">Experencia en Ventas</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="estudiosSupervisorCheck">
                                    <label class="custom-control-label" for="estudiosSupervisorCheck">Estudios</label>
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

<script>
const web_root = '<?= WEB_ROOT ?>';
const simbolo_moneda = '<?= SIMBOLO_MONEDA ?>';
</script>

<?php extend_view(['admin/common/scripts'], $data) ?>

</html>