<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id('recurso_id');
            $table->foreignId('documento_id')->constrained('documentos')->onDelete('cascade');
            $table->enum('tipo', ['imagen', 'video', 'ayuda']);
            $table->string('url', 500);
            $table->text('descripcion')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
