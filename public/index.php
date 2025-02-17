<?php

const BASE_PATH = __DIR__ .  DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;

require_once "../services/functions.php";

use services\database\MySqlDB;
use services\routing\Router;

// Enable class autoloading
spl_autoload_register(function ($class){
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require_once basePath("{$class}.php");
});

$config = require_once basePath("config.php");

// Load the app routes
require_once basePath("routes.php");

$db = new MySqlDB($config);

// Routing
$router = new Router();
$router->route($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);

 


