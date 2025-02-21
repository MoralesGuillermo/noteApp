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

// App's configuration
$config = require_once basePath("config.php");

// Load the app routes
require_once basePath("routes.php");

// Initialize Database
$database = new MySqlDB($config);

// Routing
// Passes functions.php's $abort anonymous function
$router = new Router();
$router->route($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"], $abort);

 


