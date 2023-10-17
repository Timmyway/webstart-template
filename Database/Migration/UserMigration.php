<?php
namespace Database\Migration;

use Database\DatabaseBuilder;
use Illuminate\Database\Schema\Blueprint;

class UserMigration extends DatabaseBuilder
{
    public function up()
    {
        if(!$this->db::schema()->hasTable('users')) {
            $this->db::schema()->create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->boolean('is_admin')->default(false);
                $table->rememberToken();
                $table->timestamps();
            });
        } else {
            echo "Table users already exists" . PHP_EOL;
        }
    }

    public function down(): void
    {
        $this->db::schema()->dropIfExists('users');
    }
}
