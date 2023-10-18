<?php
namespace Lite;

use App\Providers\TemplateEngineServiceProvider;
use Lite\Database\DatabaseManager;
use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Routing\RouteHelper;
use Lite\Service\Container;
use Lite\Service\ContainerHolder;
use Lite\Service\Provider\DatabaseServiceProvider;
use Lite\Service\Provider\ProviderManager;
use Lite\Service\Provider\RouteServiceProvider;
use Lite\Service\Provider\TemplateEngineServiceProvider as ProviderTemplateEngineServiceProvider;
use Symfony\Component\Routing\RequestContext;

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
        ContainerHolder::setContainer($container);
        $providerManager = new ProviderManager (ContainerHolder::getContainer());
        // Define the list of provider classes
        $providers = [
            [ProviderTemplateEngineServiceProvider::class],
            [DatabaseServiceProvider::class],
            [RouteServiceProvider::class, ['routes' => $routes->getRouteCollections()]]
        ];
        // Register each provider with the ProviderManager
        foreach ($providers as $provider) {            
            $providerManager->register($provider);
        }
        // Boot the providers
        $providerManager->boot();                    

        // Add middlewares
        $middlewareStack = new MiddlewareStack();
        $middlewareStack->addMiddleware(new ContainerInjectionMiddleware(ContainerHolder::getContainer()));
                
        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack);
    }
}
