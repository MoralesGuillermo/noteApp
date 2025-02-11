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

    public function getAction($method): array | callable{
        return $this->actions[$method];
    }

    public function addAction($action): array{
        $this->actions += $action;
        return $action;
    }

    // Execute one of the routes actions
    public function execute($method){
        $callback = $this->getAction($method);
        if (! $callback){
            // Route doesn't support the given method
            // TODO: Solve if Route should be handling controller execution or the router is responsible of that
            var_dump("ROUTE DOESN'T SUPPORT THE GIVEN METHOD");
            die();
        }
        // If not true, callback given as Closure or function
        if (is_array($callback)){
            // Callback given as [Classname, method] structure
            $instance = newInstance($callback[0]);
            $callback[0] = $instance;
        }
        call_user_func($callback);
    }

}


