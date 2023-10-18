<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;

class MiddlewareStack
{
    private $middlewares = [];

    public function addMiddleware(string $name, callable $middleware, string $scope = 'global'): void
    {
        $this->middlewares[] = ['name' => $name, 'instance' => $middleware];
    }

    public function execute(Request $request, $controller)
    {
        // Run all the middlewares in the stack, then return a controller         
        foreach ($this->middlewares as $middleware) {
            $controller = $middleware['instance']($request, $controller);
        }

        return $controller;
    }
}