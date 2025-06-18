<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        Proyecto::factory()->count(3)->create()->each(function ($proyecto) {
            $proyecto->modulos()->createMany([
                ['nombre' => 'Introducción', 'descripcion' => 'Módulo inicial', 'orden' => 1],
                ['nombre' => 'Guía', 'descripcion' => 'Guía básica', 'orden' => 2],
            ]);
        });
    }
}
