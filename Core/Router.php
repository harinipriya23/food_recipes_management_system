<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];
    public function action($uri, $controllers, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controllers' => $controllers,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }
    public function get($uri, $controllers)
    {
        return $this->action($uri, $controllers, "GET");
    }
    public function post($uri, $controllers)
    {
        return $this->action($uri, $controllers, "POST");
    }
    public function update($uri, $controllers)
    {
        return $this->action($uri, $controllers, "UPDATE");
    }
    public function delete($uri, $controllers)
    {
        return $this->action($uri, $controllers, "DELETE");
    }
    public function only($value)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $value;
        return $this;
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolveMiddleware($route['middleware']);
                return require base_path('/controllers/' . $route['controllers']);
            }
        }
    }
}
