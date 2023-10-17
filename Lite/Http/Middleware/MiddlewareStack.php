<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;

class MiddlewareStack
{
    private $middlewares = [];

    public function addMiddleware(callable $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    public function execute(Request $request, $controller)
    {
        // Run all the middlewares in the stack, then return a controller
        foreach ($this->middlewares as $middleware) {
            $controller = $middleware($request, $controller);
        }

        return $controller;
    }
}