<?php

use Database\Migration\Migration;
use Database\Seeder\Seeder;

const BASEPATH = __DIR__ . DIRECTORY_SEPARATOR;
require 'vendor/autoload.php'; // Load Composer's Autoloader
// Setup environment variable
$dotenv = \Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

// Check for command-line arguments
if ($argc < 2) {
    // No arguments provided, display usage instructions
    echo "Usage: php lite.php <command>\n";
    echo "Available commands:\n";
    echo "  migrate   - Run database migrations\n";
    echo "  seed      - Seed the database\n";
    exit(1);
}

// Get the command from the first argument
$command = $argv[1];

// Process the command
switch ($command) {
    case 'migrate':
        Migration::run();
        break;
    case 'migrate:fresh':
        Migration::reset();
        break;
    case 'seed':
        Seeder::run();
        break;
    default:
        // Invalid command
        echo "Invalid command: $command\n";
        exit(1);
        break;
}