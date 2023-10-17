<?php
return [
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => basePath(env('DB_DATABASE', ''))
        ],

        'mysql' => [
            'driver' => 'mysql',            
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', basePath('database.sqlite')),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),            
            'charset' => 'utf8mb4'
        ]
    ]
];