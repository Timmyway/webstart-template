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

    private function createSqliteDatabase()
    {
        // Make sure the database file directory exists
        $directory = basePath($this->config['database']);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // Check if the database file exists
        if (!file_exists($this->config['database'])) {
            $this->capsule->getConnection()->statement('CREATE DATABASE IF NOT EXISTS ' . $this->config['database']);
        }
    }

    public function capsule()
    {
        return $this->capsule;
    }

    public function createDatabase(string $databaseName): void
    {
        // Make sure the database file directory exists
        $directory = dirname($databasePath);
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $connection = $this->capsule->getConnection();
        $connection->statement('CREATE DATABASE IF NOT EXISTS ' . $databaseName);
    }
}