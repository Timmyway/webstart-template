<?php
namespace Lite\Service\Provider;

use Lite\Routing\RouteHelper;
use Lite\Service\Container;
use Symfony\Component\Routing\RequestContext;

class RouteServiceProvider implements ProviderInterface {
    public function register(Container $containerBuilder, array $params) {
        $routes = $params['routes'] ?? [];
        // $templateEngine = TemplateEngineFactory::create('bladeone', $viewsPath, $cachePath);
        $containerBuilder->register('routeHelper', RouteHelper::class)
        ->addArgument($routes)
        ->addArgument(new RequestContext());
        return $containerBuilder;
    }
}
