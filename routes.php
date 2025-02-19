<?php

use controllers\AboutController;
use services\routing\Router;
use controllers\HomeController;

$router = new Router();

$router->get("/", [HomeController::class, "home"]);

$router->get("/about", [AboutController::class, "get"]);
