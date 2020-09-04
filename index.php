<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
set_time_limit(0);

/*
 * ---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 * ---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */

define('ENVIRONMENT', 'development');
/*
 * ---------------------------------------------------------------
 * DEFAULT TIME ZONE
 * ---------------------------------------------------------------
 */
date_default_timezone_set('America/Lima');

/*
 * ---------------------------------------------------------------
 * ERROR REPORTING
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;

        case 'testing':
        case 'production':
            error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}

/*
 * ---------------------------------------------------------------
 * MVC FOLDER NAMES
 * ---------------------------------------------------------------
 *
 * These variables must contain the names of your MVC folders.
 * Include the path if the folder is not in the same directory
 * as this file. Include a trailing forward slash "/".
 *
 */
$application_path   = ROOTPATH . '/app/';                // default: '../app/'
$controllers_path   = ROOTPATH . '/app/Controllers/';    // default: '../app/controllers/'
$models_path        = ROOTPATH . '/app/Models/';         // default: '../app/models/'
$entity_path        = ROOTPATH . '/app/Entity/';         // default: '../app/models/'
$views_path         = ROOTPATH . '/app/Views/';          // default: '../app/models/'
$helpers_path       = ROOTPATH . '/app/Helpers/';        // default: '../app/helpers/'
$libs_path          = ROOTPATH . '/app/Libs/';           // default: '../app/libs/'
$language_path      = ROOTPATH . '/app/Languages/';      // default: '../app/languages/'



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------


/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The name of THIS file


// Paths to the system folders
define('APPLICATION_PATH', $application_path);
define('CONTROLLERS_PATH', $controllers_path);
define('MODELS_PATH', $models_path);
define('ENTITY_PATH', $entity_path);
define('VIEWS_PATH', $views_path);
define('HELPERS_PATH', $helpers_path);
define('LIBS_PATH', $libs_path);
define('LANGUAGE_PATH', $language_path);
// Build front-loader

$router = new \Buki\Router([
    'paths' => [
        'controllers' => 'app/Controllers',
    ],
    'namespaces' => [
        'controllers' => 'Application\Controllers',
    ]
]);



require_once ROOTPATH . '/app/Config/routes.php';