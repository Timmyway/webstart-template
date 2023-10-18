<?php
namespace Lite\Http\Middleware;

use Lite\Http\Request;
use Lite\Http\Response;

interface MiddlewareInterface
{
    public function __invoke(Request $request, callable $next);
}