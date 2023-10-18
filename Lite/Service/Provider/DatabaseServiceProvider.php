<?php
namespace Lite\Service\Provider;

use Lite\ConfigLoader;
use Lite\Database\DatabaseManager;
use Lite\Service\Container;

class DatabaseServiceProvider implements ProviderInterface {

    public function register(Container $containerBuilder, $params = null) {        
        // Load config file
        $config = new ConfigLoader();
        $databaseConfig = $config->get('database.connections')[env('DB_CONNECTION')];
        
        // $templateEngine = TemplateEngineFactory::create('bladeone', $viewsPath, $cachePath);
        $containerBuilder->register('database', DatabaseManager::class)
        ->addArgument($databaseConfig);        
        return $containerBuilder;
    }
}
