<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Modulo;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run(): void
    {
        Modulo::all()->each(function ($modulo) {
            $modulo->documentos()->createMany([
                ['titulo' => 'Bienvenida', 'contenido' => 'Contenido de ejemplo', 'orden' => 1],
                ['titulo' => 'Instalación', 'contenido' => 'Pasos de instalación', 'orden' => 2],
            ]);
        });
    }
}
