<?php
namespace Lite;

use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use App\Providers\TemplateEngineServiceProvider;
use Lite\Service\Container;

class Lite
{
    private $router;

    public function run(Request $request, Routes $routes)
    {        

        // Register the Template Engine Service Provider.
        $templateEngineServiceProvider = new TemplateEngineServiceProvider();
        $container = $templateEngineServiceProvider->register(new Container);        
        $request->addService('templateEngine', $container->get('templateEngine')->getEngine());
        $this->router = new Router($request, $routes->getRouteCollections());
    }
}
