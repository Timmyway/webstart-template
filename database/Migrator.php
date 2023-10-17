<?php

class Migrator
{
    public function migrate()
    {
        // Set the path to the migrations directory
        $migrationsPath = __DIR__.DIRECTORY_SEPARATOR.'migrations';        

        // Get the list of migration files
        $migrationFiles = new \DirectoryIterator($migrationsPath);

        

        // Run each migration file
        foreach ($migrationFiles as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                require_once $file->getPathname();
                $migrationClassName = pathinfo($file->getFilename(), PATHINFO_FILENAME);
                $migration = new $migrationClassName;
                $migration->up();
                echo "Migration executed: " . $migrationClassName . PHP_EOL;
            }
        }
    }
}

$migrator = new Migrator();

$migrator->migrate();