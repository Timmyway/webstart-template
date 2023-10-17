<?php
return [
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => getenv('DATABASE_URL'),
            'database' => getenv('DB_DATABASE', '')
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => getenv('DATABASE_URL'),
            'host' => getenv('DB_HOST', '127.0.0.1'),
            'port' => getenv('DB_PORT', '3306'),
            'database' => getenv('DB_DATABASE', ''),
            'username' => getenv('DB_USERNAME', 'root'),
            'password' => getenv('DB_PASSWORD', ''),            
            'charset' => 'utf8mb4'
        ]
    ]
];