<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProyectoFactory extends Factory
{
    protected $model = Proyecto::class;

    public function definition(): array
    {
        $name = $this->faker->sentence(2);
        return [
            'nombre' => $name,
            'descripcion' => $this->faker->paragraph(),
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 999),
        ];
    }
}
