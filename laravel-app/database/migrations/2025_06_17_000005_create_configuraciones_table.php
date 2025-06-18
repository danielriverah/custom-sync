<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id('configuracion_id');
            $table->foreignId('proyecto_id')->unique()->constrained('proyectos')->onDelete('cascade');
            $table->string('logo_url', 500)->nullable();
            $table->string('color_primario', 7)->nullable();
            $table->string('color_secundario', 7)->nullable();
            $table->string('fuente', 100)->nullable();
            $table->enum('layout', ['sidebar', 'topbar', 'minimal'])->default('sidebar');
            $table->boolean('modo_dark')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
