<?php
/**
 * index.php
 * This serves as the main entry point of the system.
 * @author Aries V. Macandili <macandili.aries@gmail.com>
 * @since 2020.12.05
 */
session_start();

// Include conf/confDefine.php file.
include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'conf' . DIRECTORY_SEPARATOR . 'confDefine.php';

$aModules = array(
    ROOT, APP, VIEW, MODEL, CONTROLLER, DATA, CORE, UPLOAD, LIBRARY
);

// Set include paths and use autoloader for loading classes dynamically.
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $aModules));
spl_autoload_register('spl_autoload', false);

// Invoke Application class from the core directory.
$oApplication = new coreApplication();