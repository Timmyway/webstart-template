<?php
namespace App\Providers;

use Lite\Service\Container;
use Lite\View\BladeOneTemplateEngine;
use Lite\View\TemplateEngineFactory;

class TemplateEngineServiceProvider {
    public function register(Container $containerBuilder) {
        $viewsPath = basePath('views'); // Replace with the actual path
        $cachePath = basePath('storage/cache'); // Replace with the actual path

        // $templateEngine = TemplateEngineFactory::create('bladeone', $viewsPath, $cachePath);
        $containerBuilder->register('templateEngine', TemplateEngineFactory::class)
        ->addArgument($viewsPath)
        ->addArgument($cachePath);
        return $containerBuilder;
    }
}
