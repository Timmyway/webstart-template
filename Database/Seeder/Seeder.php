<?php
namespace Database\Seeder;

class Seeder
{
    public static function run()
    {
        $seeds = [
            'users' => UserSeeder::class
        ];
        echo 'Running seeders...' . PHP_EOL;
        foreach ($seeds as $name => $seedClass) {
            $seed = new $seedClass();
            $seed->run();
            echo "Finished seeding {$name}." . PHP_EOL;
        }        
        echo 'Complete all seeding operations.' . PHP_EOL;
    }
}