<?php

$router->get('admin/clientes/:id', 'ClientesController@index');
// Falta crear Controladores 
$router->get('admin/productos/:id', 'ProductosController@index');
$router->get('admin/vendedores/:id', 'VendedoresController@index');
$router->get('admin/supervisores/:id', 'SupervisoresController@index');
$router->get('admin/usuarios/:id', 'UsuariosController@index');
$router->get('admin/roles/:id', 'RolesController@index');
$router->get('admin/prueba/:id', 'RolesController@index');

$router->get('admin/home/:id', 'DashboardController@index');
$router->get('admin/mis-negocios', 'NegociosController@misNegocios');
$router->any('admin/acceso', 'LoginAdminController@acceso');
$router->get('admin/salir', 'LoginAdminController@salir');
$router->get('admin', 'LoginAdminController@acceso');

$router->run();