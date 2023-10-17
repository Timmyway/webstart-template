<?php
namespace Lite;

use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use App\Providers\TemplateEngineServiceProvider;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Service\Container;

class Lite
{
    private $router;

    public function run(Request $request, Routes $routes)
    {        

        // Setup environment variable
        $dotenv = \Dotenv\Dotenv::createImmutable(basePath());
        $dotenv->load();

        // Load config file
        $config = new ConfigLoader();
        $databaseConfig = $config->get('database');
        dd($databaseConfig);

        // Register the Template Engine Service Provider.
        $templateEngineServiceProvider = new TemplateEngineServiceProvider();
        $container = $templateEngineServiceProvider->register(new Container);        
        $request->addService('templateEngine', $container->get('templateEngine')->getEngine());

        // Add middlewares
        $middlewareStack = new MiddlewareStack();
        $middlewareStack->addMiddleware(new ContainerInjectionMiddleware($container));

        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack);
    }
}
