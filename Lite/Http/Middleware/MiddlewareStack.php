<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;

class MiddlewareStack
{
    private $middlewares = [];

    public function addMiddleware(string $name, string $class, array $args = []): void
    {        
        $this->middlewares[] = compact('name', 'class', 'args');
    }

    public function execute(Request $request, $controller, $routeDetails)
    {
        // Run all the middlewares in the stack, then return a controller         
        foreach ($this->middlewares as $middleware) {
            new $middleware['class'](
                $middleware['name'],
                $request, 
                $controller, 
                $routeDetails,                
                $middleware['args']
            );            
        }        
    }
}