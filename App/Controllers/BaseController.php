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
        $engine = $request->getService('templateEngine')->getEngine();

        dd($engine);
        $templateEngine = $this->getContainer()->get('templateEngine');
        $templateEngine->render($view, $datas);
    }

    public function getContainer()
    {
        return $this->container;
    }
}