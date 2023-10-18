<?php
namespace Lite\Event;

use Lite\Http\Middleware\MiddlewareStack;
use Lite\Http\Request;
use Symfony\Contracts\EventDispatcher\Event;

class MiddlewareEvent extends Event
{
    protected $routeDetails;
    protected $controller;
    protected $middlewareStack;
    protected $request;

    public function __construct(Request $request, $controller, $routeDetails, MiddlewareStack $middlewareStack)
    {
        $this->request = $request;
        $this->controller = $controller;
        $this->routeDetails = $routeDetails;
        $this->middlewareStack = $middlewareStack;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getRouteDetails()
    {
        return $this->routeDetails;
    }

    public function getRequest()
    {
        return $this->request;
    }
    
    public function getMiddlewareStack()
    {
        return $this->middlewareStack;
    }
}