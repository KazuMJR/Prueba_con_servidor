<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ActividadClase;

class ActividadClaseFactory extends Factory
{
    protected $model = ActividadClase::class;

    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->sentence(10), // Una descripción breve de actividad
        ];
    }
}
