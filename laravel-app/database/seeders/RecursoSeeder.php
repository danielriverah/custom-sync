<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class RecursoSeeder extends Seeder
{
    public function run(): void
    {
        Documento::all()->each(function ($documento) {
            $documento->recursos()->createMany([
                ['tipo' => 'imagen', 'url' => 'https://placehold.co/600x400', 'descripcion' => 'Imagen de ejemplo', 'orden' => 1],
            ]);
        });
    }
}
