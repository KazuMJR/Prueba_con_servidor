<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        $nombres = [
            'Matemáticas', 'Lengua', 'Historia',
            'Ciencias', 'Física', 'Química',
            'Arte', 'Educación Física', 'Inglés'
        ];

        return [
            'nombre_curso' => $this->faker->randomElement($nombres),
        ];
    }
}
