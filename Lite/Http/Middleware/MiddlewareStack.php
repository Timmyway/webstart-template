<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;

class MiddlewareStack
{
    private $middlewares = [];

    public function addMiddleware(string $name, callable $middleware, array $args, string $scope = 'global'): void
    {
        $this->middlewares[] = compact('name', 'middleware', 'args', 'scope');
    }

    public function execute()
    {
        // Run all the middlewares in the stack, then return a controller         
        foreach ($this->middlewares as $middleware) {
            $controller = $middleware['instance'](...$middleware['args']);
        }

        return $controller;
    }
}