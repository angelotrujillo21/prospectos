<div class="modal fade" id="formEmpleadoE" tabindex="-1" role="dialog" aria-labelledby="formEmpleadoELabel" aria-hidden="true">
    <div class="modal-dialog m-1 m-md-auto" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header  modal-header-recuperar">
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-app-prospecto" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row flex-center">
                        <h4>Editar Vendedor</h4>
                    </div>
                    <div id="content-empleado-edit" class="row">



                    </div>
                    <div class="row flex-center">
                        <div class="col-12 flex-center">
                            <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="formUsuarioE" tabindex="-1" role="dialog" aria-labelledby="formUsuarioELabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="formUsuarioELabel">Nuevo Usuario</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="sNombreUE" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="sNombreUE" autocomplete="off" name="sNombreUE">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="sApellidosUE" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="sApellidosUE" autocomplete="off" name="sApellidosUE">
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="sEmailUE" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="sEmailUE" autocomplete="off" name="sEmailUE">
                            </div>
                        </div>


                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="sLoginUE" class="col-form-label">Login:</label>
                                <input type="text" class="form-control" id="sLoginUE" autocomplete="off" name="sLoginUE">
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="sClaveUE" class="col-form-label">Clave:</label>
                                <input type="text" class="form-control" id="sClaveUE" autocomplete="off" name="sClaveUE">
                            </div>
                        </div>


                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="sImagenUE" class="col-form-label">Imagen:</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="sImagenUE" accept="image/*" lang="es" name="sImagenUE">
                                        <label class="custom-file-label" for="sImagenUE">Elija el archivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>