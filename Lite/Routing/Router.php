<?php
namespace Lite\Routing;

use Exception;
use Lite\Http\Response;
use Symfony\Component\HttpFoundation\Request;
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
            $result = $urlMather->match($pathInfo); 
            $this->request->attributes->add($result);

            $controller = $this->extractController($result['_controller']);
            $this->callController($controller);
            // dd($controller);            
        } catch(ResourceNotFoundException $e) {            
            $response = new Response("La page demandée n'existe pas", 404);
        } catch(Exception $e) {
            $response = new Response("Une erreur est survenu sur le serveur", 500);            
        }
        $response->send();
    }  
    
    private function extractController(string $controllerName, $sep = '@'): array
    {
        $controller = substr(
            $controllerName,
            0,
            strpos($controllerName, $sep)
        );
        $method = substr(
            $controllerName,
            strpos($controllerName, $sep) + 1
        );
        return ['class' => $controller, 'method' => $method];
    }

    private function callController(array $controller)
    {
        $controllerToCall = [new $controller['class'], $controller['method']];
        return call_user_func($controllerToCall, $this->request);
    }
}