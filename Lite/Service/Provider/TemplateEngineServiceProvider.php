<?php
namespace Lite\Service\Provider;

use Lite\Service\Container;
use Lite\View\TemplateEngineFactory;

class TemplateEngineServiceProvider implements ProviderInterface {
    public function register(Container $containerBuilder, $params = []) {
        $viewsPath = basePath('views'); // Replace with the actual path
        $cachePath = basePath('storage/cache'); // Replace with the actual path

        // $templateEngine = TemplateEngineFactory::create('bladeone', $viewsPath, $cachePath);
        $containerBuilder->register('templateEngine', TemplateEngineFactory::class)
        ->addArgument($viewsPath)
        ->addArgument($cachePath);
        return $containerBuilder;
    }
}
