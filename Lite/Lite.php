<?php
namespace Lite;

use Lite\Event\ControllerEvent;
use Lite\Event\EventDispatcher;
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
        // $middlewareStack->addMiddleware('injectContainer', new ContainerInjectionMiddleware(ContainerHolder::getContainer()));
        // $middlewareStack->addMiddleware('auth', new AuthMiddleware());

        $this->dispatcher->addListener('kernel.controller', function(ControllerEvent $e) {            
            // Inject container to aware controller
            $containerInjector = new ContainerInjectionMiddleware(ContainerHolder::getContainer());
            $controller = $containerInjector->handle($e->getController());
            $e->setController($controller);
        });
                
        $this->router = new Router($request, $routes->getRouteCollections(), $middlewareStack, $this->dispatcher);
    }
}
