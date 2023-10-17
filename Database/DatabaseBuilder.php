<?php
namespace Database;

use Lite\ConfigLoader;
use Lite\Database\DatabaseManager;

class DatabaseBuilder
{
    protected $db;
        
    public function __construct() {
        $config = new ConfigLoader();
        // dd($config->get('database.connections'));        
        $databaseConfig = $config->get('database.connections')[env('DB_CONNECTION')];
        $manager = new DatabaseManager($databaseConfig);
        $this->db = $manager->capsule();
    }    
}