<?php
namespace Database\Seeder;
require 'DatabaseSeeder.php';

class UserSeeder extends DatabaseSeeder
{    
    public function run()
    {
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => $this->encrypt('secret')],
            ['name' => 'Jane Doe', 'email' => 'jane@example.com', 'password' => $this->encrypt('secret')],
            // Add more user data as needed
        ];

        foreach ($users as $user) {
            $this->db->table('users')->insert($user);
        }
    }
}