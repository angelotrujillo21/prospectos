<?php
define('ROOTPATH', __DIR__);

define('WEB', 'http://localhost:8082/');

define('WEB_ROOT', WEB .'prospectos/');

define('DB_DRIVER'  , 'mysql'); // mysql, mysqli, sqlite are options for use with the Base Model.
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'prospectos');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


/* MAIL */
define('HOST_MAIL', 'mail.mmconsultoresinformaticos.net');
define('USER_MAIL', 'deliappauth@mmconsultoresinformaticos.net');
define('PASSWORD_MAIL', 'mYfCvrb@025!');


define('WEB_ROOT_RESOURCE', WEB_ROOT . 'public/');

define('ROOTPATHRESOURCE', ROOTPATH . '/public/');

define('NOMBRE_SITIO', 'App Prospectos');


define('IGV', 18);
define('SIMBOLO_MONEDA', ' S./ ');
define('TEXTO_MONEDA', ' SOLES ');

/*PRODUCTION 


define('WEB_ROOT', 'http://192.168.0.15:8082/api-procesos/');

define('DB_DRIVER', 'mysql'); // mysql, mysqli, sqlite are options for use with the Base Model.
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'mmconpfa_deliapp_principal');
define('DB_USERNAME', 'mmconpfa');
define('DB_PASSWORD', 'mYfCvrb@025!');


define('DB_DRIVER', 'mysql'); // mysql, mysqli, sqlite are options for use with the Base Model.
define('DB_HOSTNAME', 'localhost');
define('DB_DATABASE', 'mmconpfa_deliapp_principal');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');


*/