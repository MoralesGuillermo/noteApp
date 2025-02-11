<?php

use services\routing\Router;
use controllers\HomeController;

$router = new Router();

$router->get("/", [HomeController::class, "home"]);
