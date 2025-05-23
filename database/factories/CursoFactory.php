<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition(): array
    {
        return [
            'nombre_curso' => $this->faker->unique()->randomElement([
                'Matemática', 'Lenguaje', 'Ciencias Naturales', 'Civismo', 'Historia',
                'Educación Física', 'Inglés', 'Computación', 'Música', 'Arte'
            ])
        ];
    }
}
