<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;

abstract class Middleware
{
    protected $name;
    protected $request;
    protected $controller;
    protected $routeDetails;    
    protected $args;    

    public function __construct(
            string $name,
            Request $request, 
            $controller, 
            $routeDetails, 
            array $args = []
        ) {
        $this->name = $name;
        $this->request = $request;
        $this->controller = $controller;
        $this->routeDetails = $routeDetails;        
        $this->args = $args;
        $this->getRouteMiddlewares();

        $this->check();
    }

    private function check()
    {
        if (isset($this->args['scope']) && $this->args['scope'] === 'global') {            
            return $this->handle();
        }
        if ($this->apply()) {
            $this->handle();
        }
    }

    abstract public function handle();

    public function apply()
    {
        $isInList = in_array($this->name, $this->getRouteMiddlewares());
        return $isInList;
    }

    public function getRouteMiddlewares()
    {
        $middlewareString = $this->routeDetails['middleware'] ?? '';
        if (!$middlewareString) {
            return [];
        }
        $middlewareList = explode('|', $middlewareString);
        return $middlewareList;
    }
}