<?php
namespace Lite\Routing;

use Exception;
use Lite\Event\ControllerEvent;
use Lite\Event\EventDispatcher as EventEventDispatcher;
use Lite\Event\MiddlewareEvent;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
use Lite\Http\Middleware\EventDispatcher;
use Lite\Http\Middleware\MiddlewareStack;
use Lite\Http\Response;
use Lite\Service\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Contracts\EventDispatcher\Event;

class Router
{
    protected $routes;
    private $request;
    private $middlewareStack;
    private $dispatcher;
    
    public function __construct(Request $request, RouteCollection $routes, MiddlewareStack $middlewareStack, EventEventDispatcher $dispatcher) {
        $this->request = $request;
        $this->routes = $routes;        
        $this->middlewareStack = $middlewareStack;
        $this->dispatcher = $dispatcher;
        $this->setup();
    }

    public function setup()
    {        
        $response = new Response;
        try {
            $context = new RequestContext();
            $context->fromRequest($this->request);
            
            // Setting of URL matcher
            $pathInfo = $this->request->getPathInfo();
            $urlMather = new UrlMatcher($this->routes, $context);
            // Check if require middleware
            
            $routeDetails = $urlMather->match($pathInfo);
            $this->request->attributes->add($routeDetails);
            
            $this->callController($routeDetails);
                        
        } catch(ResourceNotFoundException $e) {            
            return redirect('lost');
        } catch(Exception $e) {
            $response = new Response("Une erreur est survenu sur le serveur: {$e->getMessage()}", 500);            
        }
        $response->send();
    }    

    private function callController($routeDetails)
    {
        // Use resolver to find the appropriate controller, methods and attributes
        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();        
        $controller = $controllerResolver->getController($this->request);
        $this->dispatcher->dispatch(new ControllerEvent($controller), 'kernel.controller');
        // Run middlewares only if needed
        // if ($this->requiresMiddleware($routeDetails)) {
        //     $controller = $this->runMiddlewares($controller);
        // }
        $this->dispatcher->dispatch(
            new MiddlewareEvent(
                $this->request, 
                $controller, 
                $routeDetails, 
                $this->middlewareStack
            ), 'app.middleware'
        );
        // $controller = $this->runMiddlewares($controller, $routeDetails);
        $arguments = $argumentResolver->getArguments($this->request, $controller);
        return call_user_func_array($controller, $arguments);
    }

    private function runMiddlewares($controller, $routeDetails)
    {        
        $this->middlewareStack->execute($this->request, $controller);
    }

    private function requiresMiddleware($routeDetails)
    {
        // Logic to check if the route requires middleware
        // You can implement your own logic to determine if a route needs middleware
        // For example, check the route name or any other relevant attributes

        return $routeDetails['middleware'] ?? false; // Modify this condition as per your route configuration
    }
}