<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition(): array
    {
        return [
            'cui' => $this->faker->unique()->numerify('###############'), // 15 dígitos numéricos únicos
            'nombre_alumno' => $this->faker->name,
            'edad' => $this->faker->numberBetween(6, 18),
            'sexo' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
