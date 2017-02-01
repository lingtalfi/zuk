<?php

use BumbleBee\Autoload\ButineurAutoloader;
use Core\Application\Application;
use Crud\CrudModule;
use Lang\LangModule;
use Privilege\Privilege;
use Privilege\PrivilegeUser;
use QuickPdo\QuickPdo;


//------------------------------------------------------------------------------/
// AUTOLOADER (from the universe framework)
//------------------------------------------------------------------------------/
require_once __DIR__ . '/class-planets/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/class-planets/BumbleBee/Autoload/ButineurAutoloader.php';
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/class")
    ->addLocation(__DIR__ . "/class-core", "Core")
    ->addLocation(__DIR__ . "/class-modules", "Module")
    ->addLocation(__DIR__ . "/class-planets");
ButineurAutoloader::getInst()->start();


//--------------------------------------------
// FUNCTIONS
//--------------------------------------------
require_once __DIR__ . "/functions/main-functions.php";


//--------------------------------------------
// CONSTANTS (used in class-core and class-modules)
//--------------------------------------------
define('DEV_MODE', ('127.0.0.1' === $_SERVER['REMOTE_ADDR']));
define('APP_ROOT', __DIR__);


//--------------------------------------------
// APPLICATION CONFIG (meant to be updated by an admin website)
//--------------------------------------------
$conf = [];
require_once APP_ROOT . '/config/app-config.php';
Application::setConfig($conf);



