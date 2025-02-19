<?php

namespace services\routing;

class Router{
    protected static $routes = [];

    // HTTP codes constants
    const NOT_FOUND = 404;
    const NOT_SUPPORTED = 405;

     // Creates a GET Route
     public function get($uri, $callback): Route{
        $route = new Route($uri, ["GET" => $callback]);
        return $this->addRoute($route);
    }

    // Creates a POST Route
    public function post($uri, $callback): Route{
        $route = new Route($uri, ["POST" => $callback]);
        return $this->addRoute($route);
    }

    // Creates a PUT Route
    public function put($uri, $callback): Route{
        $route = new Route($uri, ["PUT" => $callback]);
        return $this->addRoute($route);
    }

    // Creates a DELETE Route
    public function delete($uri, $callback): Route{
        $route = new Route($uri, ["DELETE" => $callback]);
        return $this->addRoute($route);
    }
    
    /**
     * Return a route given a uri
     * @var uri: URI of the route
     * @return Route | null
     */
    private function addRoute($route): Route{
        $existingRoute = $this->getRoute($route->getUri());
        if ($existingRoute){
            // If route exists, add the new action to the route
            $existingRoute->addAction($route->getActions());
        }else{
            // If route doesn't exist, append the new route
            Router::$routes[] = $route;
        }
        return $route;
    }
    
    private function getRoute($uri): Route | null{
        foreach (Router::$routes as $route){
            if ($route->getUri() === $uri){
                return $route;
            }
        }
        return null;
    }

    // Execute a route's action
    public  function route($uri, $method, $errorCallback){
        $route = $this->getRoute($uri);
        if ($route){
            $routeCallback = $route->getCallback($method);
            if (! $routeCallback){
                // Route doesn't support the given method
                $errorCallback(Router::NOT_SUPPORTED);
                die();
            }
            if (is_array($routeCallback)){
                /**
                 * Callback given as [Classname, method] structure. Need to parse
                 * it to be able to execute it
                */
                $routeCallback = $this->parseArrayCallback($routeCallback);
            }
            // Execute the callback
            call_user_func($routeCallback);
        }else{
            // Route doesn't exist
            $errorCallback(Router::NOT_FOUND);
        }
    }

    private function parseArrayCallback($callback): array{
        // Parse a callback given as [className, methodName] so it can be executed
        $instance = newInstance($callback[0]);
        $callback[0] = $instance;
        return $callback;
    }
}
