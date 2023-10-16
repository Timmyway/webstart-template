<?php
namespace Lite\Routing;

use Exception;
use Lite\Http\Response;
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
    
    public function __construct(Request $request, RouteCollection $routes) {
        $this->request = $request;
        $this->routes = $routes;
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
            $response = new Response("La page demandée n'existe pas", 404);
        } catch(Exception $e) {
            $response = new Response("Une erreur est survenu sur le serveur", 500);            
        }
        $response->send();
    }    

    private function callController()
    {
        // Use resolver to find the appropriate controller, methods and attributes
        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();        
        $controller = $controllerResolver->getController($this->request);
        $arguments = $argumentResolver->getArguments($this->request, $controller);         
        // dd($arguments);
        return call_user_func_array($controller, $arguments);
    }
}