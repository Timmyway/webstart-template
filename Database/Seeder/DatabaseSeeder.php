<?php
namespace Database\Seeder;
require '../../Lite/ConfigLoader.php';
require '../../Lite/Database/DatabaseManager.php';

use Lite\ConfigLoader;
use Lite\Database\DatabaseManager;

class DatabaseSeeder
{
    protected $db;
        
    public function __construct() {
        $config = new ConfigLoader();
        $databaseConfig = $config->get('database.connections')[env('DB_CONNECTION')];
        $manager = new DatabaseManager($databaseConfig);
        $this->db = $manager->capsule();
    }

    protected function encrypt($str)
    {
        $password = password_hash($str, PASSWORD_DEFAULT);
        return $password;
    }
}