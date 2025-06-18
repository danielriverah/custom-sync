<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\ProyectoSeeder;
use Database\Seeders\DocumentoSeeder;
use Database\Seeders\RecursoSeeder;
use Database\Seeders\ConfiguracionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed inicial para el sistema de documentación
        $this->call([
            UsuarioSeeder::class,
            ProyectoSeeder::class,
            DocumentoSeeder::class,
            RecursoSeeder::class,
            ConfiguracionSeeder::class,
        ]);
    }
}
