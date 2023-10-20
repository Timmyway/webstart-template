<?php
namespace Lite\Routing;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class BaseController implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    protected $container;
    protected $database;    

    protected function render(string $view, array $datas = [])
    {
        // $templateEngine = $request->getService('templateEngine');        
        $templateEngine = $this->container->get('templateEngine')->getEngine();        
        
        echo $templateEngine->render($view, $datas);
    }

    protected function db()
    {
        return $this->container->get('database')->capsule();
    }

    protected function route($routeName = '')
    {
        return $this->container->get('routeHelper')->generateUrl($routeName);
    }
}