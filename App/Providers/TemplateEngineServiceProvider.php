<?php
namespace App\Providers;

use Lite\Service\Container;
use Lite\View\BladeOneTemplateEngine;
use Lite\View\TemplateEngineFactory;

class TemplateEngineServiceProvider {
    public function register(Container $containerBuilder) {
        $viewsPath = base_path('views'); // Replace with the actual path
        $cachePath = base_path('cache'); // Replace with the actual path

        // $templateEngine = TemplateEngineFactory::create('bladeone', $viewsPath, $cachePath);
        $containerBuilder->register('templateEngine', TemplateEngineFactory::class)
        ->addArgument($viewsPath)
        ->addArgument($cachePath);
        return $containerBuilder;
    }
}
