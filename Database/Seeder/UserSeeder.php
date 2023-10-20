<?php
namespace Database\Seeder;

use Database\DatabaseBuilder;
use Throwable;

class UserSeeder extends DatabaseBuilder
{    
    public function run()
    {        
        $users = [
            [
                'name' => 'Tim',
                'email' => 'tim@example.com',
                'password' => liteHash('1234'),
                'is_admin' => true,
                'created_at' => now()->getTimestamp()
            ],            
            [
                'name' => 'Lanja',
                'email' => 'lanja@example.com',
                'password' => liteHash('1234'),
                'is_admin' => true,
                'created_at' => now()->getTimestamp()
            ]
            // ...
        ];

        foreach ($users as $user) {
            echo "---- Creating user {$user['name']} with email {$user['email']} ----" . PHP_EOL;
            try {
                $this->db->table('users')->insert($user);
            } catch(Throwable $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }
}