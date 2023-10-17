<?php
namespace Lite;

use App\Providers\TemplateEngineServiceProvider;
use Lite\Database\DatabaseManager;
use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Service\Container;
use Lite\Service\Provider\DatabaseServiceProvider;
use Lite\Service\Provider\ProviderManager;
use Lite\Service\Provider\TemplateEngineServiceProvider as ProviderTemplateEngineServiceProvider;

class Lite
{
    private $router;        

    public function run(Request $request, Routes $routes)
    {        

        // Setup environment variable
        $dotenv = \Dotenv\Dotenv::createImmutable(basePath());
        $dotenv->load();

        // Register the Template Engine Service Provider.
        $container = new Container;
        $providerManager = new ProviderManager ($container);
        // Define the list of provider classes
        $providers = [
            ProviderTemplateEngineServiceProvider::class,
            DatabaseServiceProvider::class
        ];
        // Register each provider with the ProviderManager
        foreach ($providers as $providerClass) {            
            $providerManager->register(new $providerClass());
        }
        // Boot the providers
        $providerManager->boot();                    

        // Add middlewares
        $middlewareStack = new MiddlewareStack();
        $middlewareStack->addMiddleware(new ContainerInjectionMiddleware($container));

        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack);
    }
}
