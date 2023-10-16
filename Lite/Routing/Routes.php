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

    public function add(string $name, string $route, $routeParams)
    {
        $this->routeCollections->add($name, new SymfonyRoute($route, $routeParams));
    }

    public function getRouteCollections()
    {
        return $this->routeCollections;
    }
}