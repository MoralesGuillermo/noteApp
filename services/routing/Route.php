<?php

namespace services\routing;

use Exception;

// App routes

class Route{
    // Class to manage url routing

    private $uri;

    /**
     * Route actions by HTTP method
     * @var array
     */
    private $actions = array();


    public function __construct($uri, $actions){
        $this->uri = $uri;
        $this->actions = $actions;
    }

    public function getUri(): string{
        return $this->uri;
    }

    public function getActions(): array{
        return $this->actions;
    }

    public function getAction($method): array | callable | null{
        return $this->actions[$method] ?? null;
    }

    public function addAction($action): array{
        $this->actions += $action;
        return $action;
    }

    // Execute one of the routes actions
    public function getCallback($method){
        return $this->getAction($method);
    }
}


