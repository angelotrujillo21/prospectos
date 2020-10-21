<?php


// Home 

$router->any('admin/empleados/fncSendEmailEmpleado', 'EmpleadosController@fncSendEmailEmpleado');
$router->any('formulario-empleado/:id/:id/:id', 'EmpleadosController@fncFormularioEmpleado');
$router->any('empleados/fncGrabarEmpleado', 'EmpleadosController@fncGrabarEmpleado');



// Fin de home 


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