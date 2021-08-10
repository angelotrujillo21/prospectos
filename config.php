<?php
//require_once '../host-prospectos.php';

define('ROOTPATH', __DIR__);

define('WEB', 'http://localhost/');

define('WEB_ROOT', WEB . 'prospectos/');

define('DB_DRIVER', 'mysql'); // mysql, mysqli, sqlite are options for use with the Base Model.
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'newprospectostwo');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


/* MAIL */
// define('HOST_MAIL', 'mail.norsalespiura.com');
// define('USER_MAIL', 'server@norsalespiura.com');
// define('PASSWORD_MAIL', '+PLZ~!(o$sm3');

define('HOST_MAIL', 'mail.mmconsultoresinformaticos.net');
define('USER_MAIL', 'deliappauth@mmconsultoresinformaticos.net');
define('PASSWORD_MAIL', 'mYfCvrb@025!');


define('WEB_ROOT_RESOURCE', WEB_ROOT . 'public/');
define('ROOTPATHRESOURCE', ROOTPATH . '/public/');
define('NOMBRE_SITIO', 'App Prospectos');


define('IGV', 18);
define('SIMBOLO_MONEDA', ' S./ ');
define('TEXTO_MONEDA', ' SOLES ');
define('HOST_NAME', "192.168.1.103");
define('PORT', "8090");
define('WEB_SOCKET_JS', "ws://" . HOST_NAME . ":" . PORT . "/");