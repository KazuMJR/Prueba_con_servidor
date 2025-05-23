<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inscripcion;
use App\Models\Alumno;

class InscripcionFactory extends Factory
{
    protected $model = Inscripcion::class;

    public function definition(): array
    {
        // Asegúrate de que existan alumnos antes de ejecutar este factory
        return [
            'codigo' => $this->faker->unique()->bothify('INS#####'),
            'fecha' => $this->faker->date(),
            'cui_alumno' => Alumno::inRandomOrder()->value('cui') ?? $this->faker->unique()->numerify('###############'),
        ];
    }
}
