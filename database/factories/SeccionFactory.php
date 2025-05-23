<?php

namespace Database\Factories;

use App\Models\Seccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeccionFactory extends Factory
{
    protected $model = Seccion::class;

    public function definition(): array
    {
        return [
            // Generar una letra aleatoria A-Z
           'letra' => strtoupper($this->faker->unique()->randomLetter),
        ];
    }
}
