<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('documento_id');
            $table->foreignId('submodulo_id')->nullable()->constrained('submodulos')->nullOnDelete();
            $table->foreignId('modulo_id')->nullable()->constrained('modulos')->nullOnDelete();
            $table->string('titulo', 150);
            $table->longText('contenido')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
