<?php
namespace Lite;

use Lite\Http\Middleware\AuthMiddleware;
use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\EventDispatcher;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Http\Security\Auth;
use Lite\Service\Container;
use Lite\Service\ContainerHolder;
use Lite\Service\Provider\DatabaseServiceProvider;
use Lite\Service\Provider\ProviderManager;
use Lite\Service\Provider\RouteServiceProvider;
use Lite\Service\Provider\TemplateEngineServiceProvider as ProviderTemplateEngineServiceProvider;

class Lite
{
    private $router;        

    public function run(Request $request, Routes $routes)
    {        

        // Setup environment variable
        $dotenv = \Dotenv\Dotenv::createImmutable(basePath());
        $dotenv->load();

        // Dispatcher
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener('auth', function() {
            if (!Auth::user()->auth && !isActiveRoute('login')) {
                // dd('Authorization is required !!!');
                return redirect('login');
            }
            if (isActiveRoute('login')) {
                return redirect('lost');
            }
        });

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
        $middlewareStack->addMiddleware('injectContainer', new ContainerInjectionMiddleware(ContainerHolder::getContainer()));
        // $middlewareStack->addMiddleware('auth', new AuthMiddleware());
                
        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack, $dispatcher);
    }
}
