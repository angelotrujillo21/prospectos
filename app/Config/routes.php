<?php


// Home 

$router->any('admin/empleados/fncSendEmailEmpleado', 'EmpleadosController@fncSendEmailEmpleado');
$router->any('formulario-empleado/:id/:id/:id', 'EmpleadosController@fncFormularioEmpleado');
$router->any('empleados/fncGrabarEmpleado', 'EmpleadosController@fncGrabarEmpleado');
$router->any('formularios/fncBuildForm', 'BuildFormController@fncBuildForm');




// Fin de home 

// Ubigeo 
$router->any('ubigeo/fncObtenerProvincias', 'UbigeoController@fncObtenerProvincias');
$router->any('ubigeo/fncObtenerDistrito', 'UbigeoController@fncObtenerDistrito');
// Fin de ubigeo


// Mantenimiento Cliente
$router->any('admin/cliente/fncPopulate/:id', 'ClientesController@fncPopulate');
$router->any('admin/cliente/fncGrabarCliente', 'ClientesController@fncGrabarCliente');
$router->any('admin/cliente/fncMostrarRegistro', 'ClientesController@fncMostrarRegistro');
$router->any('admin/cliente/fncEliminarRegistro', 'ClientesController@fncEliminarRegistro');
// Fin del cliente

// Mantenimiento Catalogo
$router->any('admin/catalogo/fncPopulate/:id', 'CatalogoController@fncPopulate');
$router->any('admin/catalogo/fncGrabarCatalogo', 'CatalogoController@fncGrabarCatalogo');
$router->any('admin/catalogo/fncMostrarRegistro', 'CatalogoController@fncMostrarRegistro');
$router->any('admin/catalogo/fncEliminarRegistro', 'CatalogoController@fncEliminarRegistro');
// Fin del Catalogo

// Mantenimiento Negocios
$router->any('admin/negocios/fncGetNegocios', 'NegociosController@fncGetNegocios');
$router->any('admin/negocios/fncGrabarNegocio', 'NegociosController@fncGrabarNegocio');
$router->any('admin/negocios/fncMostrarRegistro', 'NegociosController@fncMostrarRegistro');
$router->any('admin/negocios/fncEliminarRegistro', 'NegociosController@fncEliminarRegistro');
// Fin del Negocios


// Mantenimiento Catalogo Tabla
$router->get('admin/catalogo-tablas', 'CatalogoTablaController@index');
$router->any('admin/catalogoTabla/populate', 'CatalogoTablaController@fncPopulate');
$router->any('admin/catalogoTabla/fncGrabaCatalogo', 'CatalogoTablaController@fncGrabaCatalogo');
$router->any('admin/catalogoTabla/fncGrabaCatalogoItem', 'CatalogoTablaController@fncGrabaCatalogoItem');
$router->any('admin/catalogoTabla/fncMostrarRegistro', 'CatalogoTablaController@fncMostrarRegistro');
$router->any('admin/catalogoTabla/fncListadoItemsPadre', 'CatalogoTablaController@fncListadoItemsPadre');
$router->any('admin/catalogoTabla/fncCambiarEstado', 'CatalogoTablaController@fncCambiarEstado');
$router->any('admin/catalogoTabla/fncEliminarRegistro', 'CatalogoTablaController@fncEliminarRegistro');
// Fin del Mantenimiento


$router->get('admin/configuracion/prospecto/:id', 'ProspectosController@index');
$router->get('admin/home/:id', 'DashboardController@index');
$router->get('admin/mis-negocios', 'NegociosController@misNegocios');
$router->any('admin/acceso', 'LoginAdminController@acceso');
$router->get('admin/salir', 'LoginAdminController@salir');
$router->get('admin', 'LoginAdminController@acceso');

$router->run();