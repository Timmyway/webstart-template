<?php
namespace Lite\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DatabaseManager
{
    private $capsule;
    private $config;

    public function __construct(array $config) {
        $this->config = $config;
        $this->init();        
        // $this->createDatabase($config['database']);
    }

    protected function init()
    {
        $this->capsule = new Capsule();
        $this->capsule->addConnection($this->config);
        $this->capsule->setAsGlobal();        
        // Add your model directories
        $this->capsule->addConnection(['model_locations' => [basePath('/App/Models')]]);

        $this->capsule->bootEloquent();
    }    

    public function capsule()
    {
        return $this->capsule;
    }    
}