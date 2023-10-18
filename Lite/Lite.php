<?php
namespace Lite;

use Lite\Event\ContainerInjectionListener;
use Lite\Event\EventDispatcher;
use Lite\Event\MiddlewareListener;
use Lite\Http\Middleware\AuthMiddleware;
use Lite\Http\Request;
use Lite\Routing\Router;
use Lite\Routing\Routes;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Service\Container;
use Lite\Service\ContainerHolder;
use Lite\Service\Provider\DatabaseServiceProvider;
use Lite\Service\Provider\ProviderManager;
use Lite\Service\Provider\RouteServiceProvider;
use Lite\Service\Provider\TemplateEngineServiceProvider as ProviderTemplateEngineServiceProvider;

class Lite
{
    private $router;
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function run(Request $request, Routes $routes)
    {        

        // Setup environment variable
        $dotenv = \Dotenv\Dotenv::createImmutable(basePath());
        $dotenv->load();

        // Register the Template Engine Service Provider.
        $container = new Container;
        ContainerHolder::setContainer($container);        
        
        // ---- Register services ----
        // Define the list of provider classes
        $providers = [
            [ProviderTemplateEngineServiceProvider::class],
            [DatabaseServiceProvider::class],
            [RouteServiceProvider::class, ['routes' => $routes->getRouteCollections()]]
        ];
        // Register each provider with the ProviderManager
        $providerManager = new ProviderManager (ContainerHolder::getContainer());
        $providerManager->setProviders($providers)
            ->registerAll()
            ->boot();        
        // Add middlewares
        $middlewareStack = new MiddlewareStack();        
        $middlewareStack->addMiddleware('auth', AuthMiddleware::class, ['name' => 'Timmy Way']);

        // Link container with aware controller
        $containerInjectorMiddleware = new ContainerInjectionMiddleware(ContainerHolder::getContainer());
        $listener = new ContainerInjectionListener($containerInjectorMiddleware);
        $middlewareListener = new MiddlewareListener();
        $this->dispatcher->addListener('kernel.controller', [$listener, 'onKernelController']);
        $this->dispatcher->addListener('app.middleware', [$middlewareListener, 'onAppMiddleware']);
                
        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack, $this->dispatcher);
    }
}
