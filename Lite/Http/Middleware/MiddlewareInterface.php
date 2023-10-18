<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;
use Lite\Http\Response;

interface MiddlewareInterface
{
    public function handle(Request $request, callable $next, $routeDetails, ...$args);
}