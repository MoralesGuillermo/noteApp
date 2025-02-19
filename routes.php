<?php

use controllers\AboutController;
use services\routing\Router;
use controllers\HomeController;
use controllers\NotesController;

$router = new Router();

$router->get("/", [HomeController::class, "home"]);

$router->get("/about", [AboutController::class, "get"]);

$router->get("/notes", [NotesController::class, "get"]);
