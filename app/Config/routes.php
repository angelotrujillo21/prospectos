<?php

// App Vendedor

$router->get('/', 'LoginEmpleadoController@acceso');
$router->any('home/:id', 'AppProspectoController@home');
$router->any('acceso', 'LoginEmpleadoController@acceso');
$router->get('salir', 'LoginEmpleadoController@salir');
// Fin de App de vendedor



// Home 

$router->any('admin/empleados/fncSendEmailEmpleado', 'EmpleadosController@fncSendEmailEmpleado');
$router->any('formulario-empleado/:id/:id/:id', 'EmpleadosController@fncFormularioEmpleado');
$router->any('empleados/fncGrabarEmpleado', 'EmpleadosController@fncGrabarEmpleado');
$router->any('empleados/fncMostrarRegistro', 'EmpleadosController@fncMostrarRegistro');


$router->any('formularios/fncBuildForm', 'BuildFormController@fncBuildForm');
$router->any('formularios/fncBuildFormProspecto', 'BuildFormController@fncBuildFormProspecto');



$router->any('api/dni/:id', 'ApisController@dni');
$router->any('api/ruc/:id', 'ApisController@ruc');



// Prospectos 

$router->any('admin/prospecto/fncGrabarProspectoCatalogo', 'ProspectosController@fncGrabarProspectoCatalogo');
$router->any('admin/prospecto/fncGetProspectoCatalogoByIdProspecto', 'ProspectosController@fncGetProspectoCatalogoByIdProspecto');
$router->any('admin/prospecto/fncEliminarProspectoCatalogo', 'ProspectosController@fncEliminarProspectoCatalogo');

$router->any('admin/prospecto/fncActualizaProspectoSegmentacion', 'ProspectosController@fncActualizaProspectoSegmentacion');
$router->any('admin/prospecto/fncGrabarProspectoActividad', 'ProspectosController@fncGrabarProspectoActividad');
$router->any('admin/prospecto/fncEliminarProspectoActividad', 'ProspectosController@fncEliminarProspectoActividad');
$router->any('admin/prospecto/fncGetActividadByIdProspecto', 'ProspectosController@fncGetActividadByIdProspecto');


$router->any('admin/prospecto/fncGrabarProspectoNota', 'ProspectosController@fncGrabarProspectoNota');
$router->any('admin/prospecto/fncEliminarProspectoNota', 'ProspectosController@fncEliminarProspectoNota');
$router->any('admin/prospecto/fncGetProspectoNotaByIdProspecto', 'ProspectosController@fncGetProspectoNotaByIdProspecto');
$router->any('admin/prospecto/fncActualizarControlExtra', 'ProspectosController@fncActualizarControlExtra');
$router->any('admin/prospecto/fncGetCambioProspectoByIdProspecto', 'ProspectosController@fncGetCambioProspectoByIdProspecto');
$router->any('admin/prospecto/fncGrabarCambioProspecto', 'ProspectosController@fncGrabarCambioProspecto');
$router->any('admin/prospecto/fncActualizarEstadoProspecto', 'ProspectosController@fncActualizarEstadoProspecto');




$router->any('admin/prospecto/fncGetProspectos', 'ProspectosController@fncGetProspectos');
$router->any('admin/prospecto/fncGrabarProspecto', 'ProspectosController@fncGrabarProspecto');
$router->any('admin/prospecto/fncMostrarRegistro', 'ProspectosController@fncMostrarRegistro');



$router->any('admin/prospecto/fncGrabarWidgetProspecto', 'ProspectosController@fncGrabarWidgetProspecto');
$router->any('admin/prospecto/fncObtenerConfigProspecto', 'ProspectosController@fncObtenerConfigProspecto');
$router->any('admin/prospecto/fncActualizarConfigProspecto', 'ProspectosController@fncActualizarConfigProspecto');
$router->any('admin/prospecto/fncMostrarWidget', 'ProspectosController@fncMostrarWidget');
$router->any('admin/prospecto/fncEliminarWidget', 'ProspectosController@fncEliminarWidget');




// Fin de prospectos


// Ubigeo 
$router->any('ubigeo/fncObtenerProvincias', 'UbigeoController@fncObtenerProvincias');
$router->any('ubigeo/fncObtenerDistrito', 'UbigeoController@fncObtenerDistrito');
// Fin de ubigeo


// Mantenimientos Segmentacion 
$router->any('admin/segmentacion/fncPopulateSegmentacion/:id/:id', 'SegmentacionController@fncPopulateSegmentacion');
$router->any('admin/segmentacion/fncGrabarSegmentacion', 'SegmentacionController@fncGrabarSegmentacion');
$router->any('admin/segmentacion/fncMostrarSegmentacion', 'SegmentacionController@fncMostrarSegmentacion');
$router->any('admin/segmentacion/fncEliminarSegmentacion', 'SegmentacionController@fncEliminarSegmentacion');

// Detalle 
$router->any('admin/segmentacion/fncPopulateDetalleSegmentacion', 'SegmentacionController@fncPopulateDetalleSegmentacion');
$router->any('admin/segmentacion/fncGrabarDetalleSegmentacion', 'SegmentacionController@fncGrabarDetalleSegmentacion');
$router->any('admin/segmentacion/fncMostrarDetalleSegmentacion', 'SegmentacionController@fncMostrarDetalleSegmentacion');
$router->any('admin/segmentacion/fncEliminarDetalleSegmentacion', 'SegmentacionController@fncEliminarDetalleSegmentacion');

// Fin del Segmentacion

// Mantenimiento Cliente
$router->any('admin/cliente/fncPopulate/:id', 'ClientesController@fncPopulate');
$router->any('admin/cliente/fncGrabarCliente', 'ClientesController@fncGrabarCliente');
$router->any('admin/cliente/fncMostrarRegistro', 'ClientesController@fncMostrarRegistro');
$router->any('admin/cliente/fncEliminarRegistro', 'ClientesController@fncEliminarRegistro');
$router->any('admin/cliente/fncGetClientes', 'ClientesController@fncGetClientes');



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