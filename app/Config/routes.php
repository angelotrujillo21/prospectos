<?php

// App Vendedor

$router->get('/', 'AuthController@acceso');
$router->any('home/:id', 'AppProspectoController@home');
$router->any('fncRecuperarClave', 'AuthController@fncRecuperarClave');
$router->any('acceso', 'AuthController@acceso');
$router->any('accesoAjax', 'AuthController@accesoAjax');
$router->get('salir', 'AuthController@salir');
// Fin de App de vendedor



// Home 
$router->any('socket', 'ProspectosController@fncSocket');

$router->any('admin/usuarios/fncSendEmailEmpleado', 'UsuariosController@fncSendEmailEmpleado');
$router->any('usuarios/fncMostrarRegistro', 'UsuariosController@fncMostrarRegistro');
$router->any('usuarios/fncMostrarRegistroCard', 'UsuariosController@fncMostrarRegistroCard');
$router->any('usuarios/fncObtenerCamposEmpleados', 'UsuariosController@fncObtenerCamposEmpleados');
$router->any('usuarios/fncPopulate', 'UsuariosController@fncPopulate');
$router->any('usuarios/fncObtenerColores', 'UsuariosController@fncObtenerColores');
$router->any('usuarios/fncCambiarEstado', 'UsuariosController@fncCambiarEstado');
$router->any('usuarios/fncObtenerCamposUsuarios', 'UsuariosController@fncObtenerCamposUsuarios');

$router->any('formulario-empleado/:id/:id/:id', 'VistasController@fncFormularioEmpleado');

 
$router->any('formularios/fncBuildForm', 'BuildFormController@fncBuildForm');
$router->any('formularios/fncBuildFormProspecto', 'BuildFormController@fncBuildFormProspecto');



$router->any('api/dni/:id', 'ApisController@dni');
$router->any('api/ruc/:id', 'ApisController@ruc');



// Prospectos 

$router->any('admin/usuarios/fncGrabarUsuario', 'UsuariosController@fncGrabarUsuario');
$router->any('admin/usuarios/fncMostrarUsuario', 'UsuariosController@fncMostrarUsuario');

$router->any('admin/usuarios/fncRecuperarClave', 'UsuariosController@fncRecuperarClave');
$router->any('admin/usuarios/fncEliminarUsuario', 'UsuariosController@fncEliminarUsuario');

$router->any('formulario-usuario/:id/:id', 'VistasController@fncFormularioUsuario');


$router->any('admin/prospecto/fncIndicativosHoy', 'ProspectosController@fncIndicativosHoy');
$router->any('admin/prospecto/fncGetIndicativosGeneral', 'ProspectosController@fncGetIndicativosGeneral');
$router->any('admin/prospecto/fncDownloadPropuesta/:id', 'ProspectosController@fncDownloadPropuesta');

$router->any('admin/prospecto/fncGetReporteProspectos', 'ProspectosController@fncGetReporteProspectos');
$router->any('admin/prospecto/fncGetReporteAsesor', 'ProspectosController@fncGetReporteAsesor');
$router->any('admin/prospecto/fncGetReporteBasicoUsuarios', 'ProspectosController@fncGetReporteBasicoUsuarios');



$router->any('admin/prospecto/fncActualizaEmpleadoProspecto', 'ProspectosController@fncActualizaEmpleadoProspecto');
$router->any('admin/prospecto/fncGetActividadesNoCumplidas', 'ProspectosController@fncGetActividadesNoCumplidas');
$router->any('admin/prospecto/fncGetProspectosParaReporteVentas', 'ProspectosController@fncGetProspectosParaReporteVentas');
$router->any('admin/prospecto/fncPopulateHistorialCliente', 'ProspectosController@fncPopulateHistorialCliente');
$router->any('admin/prospecto/fncTerminarProspecto', 'ProspectosController@fncTerminarProspecto');
$router->any('admin/prospecto/fncActualizarEstadoCambiosProspecto', 'ProspectosController@fncActualizarEstadoCambiosProspecto');
$router->any('admin/prospecto/fncObtenerProspectoAdjuntosByIdProspecto', 'ProspectosController@fncObtenerProspectoAdjuntosByIdProspecto');
$router->any('admin/prospecto/fncGrabarProspectoAdjunto', 'ProspectosController@fncGrabarProspectoAdjunto');
$router->any('admin/prospecto/fncEliminarProspectoAdjunto', 'ProspectosController@fncEliminarProspectoAdjunto');
$router->any('admin/prospecto/fncEliminarRegistro', 'ProspectosController@fncEliminarRegistro');
$router->any('admin/prospecto/fncObtenerCambiosForAdmin', 'ProspectosController@fncObtenerCambiosForAdmin');
$router->any('admin/prospecto/fncEliminarProspectoCerrado', 'ProspectosController@fncEliminarProspectoCerrado');
 


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
$router->any('admin/prospecto/fncGrabarPS', 'ProspectosController@fncGrabarPS');




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
$router->any('admin/segmentacion/fncCambiarEstado', 'SegmentacionController@fncCambiarEstado');

// Detalle 
$router->any('admin/segmentacion/fncPopulateDetalleSegmentacion', 'SegmentacionController@fncPopulateDetalleSegmentacion');
$router->any('admin/segmentacion/fncGrabarDetalleSegmentacion', 'SegmentacionController@fncGrabarDetalleSegmentacion');
$router->any('admin/segmentacion/fncMostrarDetalleSegmentacion', 'SegmentacionController@fncMostrarDetalleSegmentacion');
$router->any('admin/segmentacion/fncEliminarDetalleSegmentacion', 'SegmentacionController@fncEliminarDetalleSegmentacion');
$router->any('admin/segmentacion/fncCambiarEstadoDetalle', 'SegmentacionController@fncCambiarEstadoDetalle');

// Fin del Segmentacion

// Mantenimiento Cliente
$router->any('admin/cliente/fncGetClientesParaAdmin', 'ClientesController@fncGetClientesParaAdmin');
$router->any('admin/cliente/fncPopulate/:id', 'ClientesController@fncPopulate');
$router->any('admin/cliente/fncGrabarCliente', 'ClientesController@fncGrabarCliente');
$router->any('admin/cliente/fncMostrarRegistro', 'ClientesController@fncMostrarRegistro');
$router->any('admin/cliente/fncEliminarRegistro', 'ClientesController@fncEliminarRegistro');
$router->any('admin/cliente/fncGetClientes', 'ClientesController@fncGetClientes');
$router->any('admin/cliente/fncCambiarEstado', 'ClientesController@fncCambiarEstado');



// Fin del cliente

// Mantenimiento Catalogo
$router->any('admin/catalogo/fncPopulate/:id', 'CatalogoController@fncPopulate');
$router->any('admin/catalogo/fncGrabarCatalogo', 'CatalogoController@fncGrabarCatalogo');
$router->any('admin/catalogo/fncMostrarRegistro', 'CatalogoController@fncMostrarRegistro');
$router->any('admin/catalogo/fncEliminarRegistro', 'CatalogoController@fncEliminarRegistro');
$router->any('admin/catalogo/fncCambiarEstado', 'CatalogoController@fncCambiarEstado');
// Fin del Catalogo

// Mantenimiento Negocios
$router->any('admin/negocios/fncMostrarUsuariosNegocios', 'NegociosController@fncMostrarUsuariosNegocios');
$router->any('admin/negocios/fncEliminarUsuarioNegocio', 'NegociosController@fncEliminarUsuarioNegocio');
$router->any('admin/negocios/fncGrabarUsuarioNegocio', 'NegociosController@fncGrabarUsuarioNegocio');
$router->any('admin/negocios/fncProcesarInvitacionNegocio', 'NegociosController@fncProcesarInvitacionNegocio');
$router->any('admin/negocios/fncGetUsuariosInvitacion', 'NegociosController@fncGetUsuariosInvitacion');
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


$router->get('configuracion/prospecto/:id', 'VistasController@configprospecto');
$router->get('reporte-grafico/:id', 'VistasController@reporteGrafico');
$router->get('reporte-ventas/:id', 'VistasController@reporteVentas');
$router->get('reporte-consultor/:id', 'VistasController@reporteConsultor');
$router->get('reporte-cliente/:id', 'VistasController@reporteCliente');
$router->get('listado-empleados/:id', 'VistasController@listadoEmpleados');

$router->get('home/:id/:id', 'VistasController@index');
$router->get('mis-negocios', 'VistasController@misNegocios');

// $router->any('admin/acceso', 'AuthController@acceso');
// $router->get('admin/salir', 'AuthController@salir');
// $router->get('admin', 'AuthController@acceso');

$router->run();