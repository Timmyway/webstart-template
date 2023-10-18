<?php
namespace Lite\Routing;

use Symfony\Component\Routing\Route as SymfonyRoute;
use Symfony\Component\Routing\RouteCollection;

class Routes
{
    protected $routeCollections;

    public function __construct()
    {
        $this->routeCollections = new RouteCollection;        
    }

    protected function addRoute(string $method, string $name, string $route, array $routeParams)
    {
        $this->routeCollections->add($name, new SymfonyRoute($route, $routeParams, [], [], '', [], $method));
        return $this->routeCollections;
    }

    public function get(string $name, string $route, array $routeParams)
    {
        return $this->addRoute('GET', $name, $route, $routeParams);
    }

    public function post(string $name, string $route, array $routeParams)
    {
        return $this->addRoute('POST', $name, $route, $routeParams);
    }

    public function put(string $name, string $route, array $routeParams)
    {
        return $this->addRoute('PUT', $name, $route, $routeParams);
    }

    public function PATCH(string $name, string $route, array $routeParams)
    {
        return $this->addRoute('PATCH', $name, $route, $routeParams);
    }

    public function delete(string $name, string $route, array $routeParams)
    {
        return $this->addRoute('DELETE', $name, $route, $routeParams);
    }    

    public function getRouteCollections()
    {
        return $this->routeCollections;
    }
}