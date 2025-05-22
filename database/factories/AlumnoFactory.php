<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    protected $model = \App\Models\Alumno::class;

    public function definition()
    {
        return [
            'cui' => $this->faker->unique()->numerify('###########'), // 11 dígitos string único
            'nombre_alumno' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(5, 20), // máximo 20
            'sexo' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
