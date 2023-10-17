<?php
namespace Database\Migration;

class Migration
{
    public static function run()
    {
        $migrations = [
            UserMigration::class
        ];
        foreach ($migrations as $migrationClass) {
            $migration = new $migrationClass();
            $migration->up();
        }
        echo 'All migrations are finished' . PHP_EOL;
    }

    public static function rollback()
    {
        $migrations = [
            UserMigration::class
        ];
        foreach ($migrations as $migrationClass) {
            $migration = new $migrationClass();
            $migration->down();
        }
        echo 'Rolled back all migrations' . PHP_EOL;
    }

    public static function reset()
    {
        self::rollback();
        self::run();
    }
}