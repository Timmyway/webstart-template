<?php
namespace Database\Seeder;
require 'UserSeeder.php';

class Seeder
{
    public static function run()
    {
        echo 'test';
        $user_seed = new UserSeeder();
        $user_seed->run();
    }
}

Seeder::run();