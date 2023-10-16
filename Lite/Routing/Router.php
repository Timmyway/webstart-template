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

            $pathInfo = $this->request->getPathInfo();
            $urlMather = new UrlMatcher($this->routes, $context);
            $result = $urlMather->match($pathInfo);                 
            call_user_func($result['_controller'], $this->request);
        } catch(ResourceNotFoundException $e) {            
            $response = new Response("La page demandée n'existe pas", 404);
        } catch(Exception $e) {
            $response = new Response("Une erreur est survenu sur le serveur", 500);            
        }
        $response->send();
    }    
}