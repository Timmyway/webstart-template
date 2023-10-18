<?php
namespace Lite\Http\Middleware;

use Lite\Service\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\HttpFoundation\Request;

class ContainerInjectionMiddleware
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;        
    }

    public function handle($controller)
    {        
        // Check if the controller's class is aware of container
        if (is_array($controller) && $controller[0] instanceof ContainerAwareInterface) {
            // If it is the case, we inject the container to the controller
            $controller[0]->setContainer($this->container);
        }        

        return $controller;
    }
}
