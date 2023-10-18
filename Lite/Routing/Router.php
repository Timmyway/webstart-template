<?php
namespace Lite\Routing;

use Exception;
use Lite\Http\Middleware\ContainerInjectionMiddleware;
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

class Router
{
    protected $routes;
    private $request;
    private $middlewareStack;
    
    public function __construct(Request $request, RouteCollection $routes, MiddlewareStack $middlewareStack) {
        $this->request = $request;
        $this->routes = $routes;        
        $this->middlewareStack = $middlewareStack;
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
            $this->request->attributes->add($urlMather->match($pathInfo));
            
            $this->callController();
                        
        } catch(ResourceNotFoundException $e) {            
            return redirect('lost');
        } catch(Exception $e) {            
            dd($e->getMessage());
            $response = new Response("Une erreur est survenu sur le serveur: {$e->getMessage()}", 500);            
        }
        $response->send();
    }    

    private function callController()
    {        
        // Use resolver to find the appropriate controller, methods and attributes
        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();        
        $controller = $controllerResolver->getController($this->request);
        // Run middlewares
        $controller = $this->runMiddlewares($controller);        
        $arguments = $argumentResolver->getArguments($this->request, $controller);        
        return call_user_func_array($controller, $arguments);
    }

    private function runMiddlewares($controller)
    {        
        return $this->middlewareStack->execute($this->request, $controller);
    }
}