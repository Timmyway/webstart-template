<?php
namespace Lite;

use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;

class Lite
{
    private $router;

    public function run(Request $request, Routes $routes)
    {        
        $this->router = new Router($request, $routes->getRouteCollections());
    }
}
