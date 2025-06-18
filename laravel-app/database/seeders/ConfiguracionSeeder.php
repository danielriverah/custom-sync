<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use App\Models\Proyecto;
use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    public function run(): void
    {
        Proyecto::all()->each(function ($proyecto) {
            Configuracion::create([
                'proyecto_id' => $proyecto->proyecto_id,
                'logo_url' => 'https://placehold.co/200x60',
                'color_primario' => '#0000ff',
                'color_secundario' => '#ffffff',
                'fuente' => 'Arial',
                'layout' => 'sidebar',
                'modo_dark' => false,
            ]);
        });
    }
}
