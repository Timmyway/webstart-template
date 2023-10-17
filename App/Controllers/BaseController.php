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

    protected function render(Request $request, string $view, $datas = [])
    {
        $templateEngine = $request->getService('templateEngine');        
        echo $templateEngine->render($view, $datas);
    }
}