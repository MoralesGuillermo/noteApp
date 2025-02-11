<?php

namespace services\routing;

class Router{
    protected static $routes = [];

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
    public  function route($uri, $method){
        $route = $this->getRoute($uri);
        if ($route){
            $route->execute($method);
        }else{
            // 404 Page not found
        }
    }
}
