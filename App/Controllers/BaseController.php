<?php
namespace App\Controllers;

use Lite\Http\Request;
use Lite\Service\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class BaseController implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    protected $container;    

    protected function render(string $view, $datas = [])
    {
        // $templateEngine = $request->getService('templateEngine');        
        $templateEngine = $this->container->get('templateEngine')->getEngine();
        
        echo $templateEngine->render($view, $datas);
    }
}