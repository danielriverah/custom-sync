<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuario_id');
            $table->string('username', 100)->unique();
            $table->string('email', 150)->unique();
            $table->string('password_hash');
            $table->enum('rol', ['admin', 'editor', 'viewer'])->default('viewer');
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
