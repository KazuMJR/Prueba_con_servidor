<?php

namespace Database\Factories;

use App\Models\ProgramaCurso;
use App\Models\Grado;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaCursoFactory extends Factory
{
    protected $model = ProgramaCurso::class;

    public function definition(): array
    {
        return [
            'grado_id_grado' => Grado::inRandomOrder()->first()->id_grado ?? Grado::factory(),
            'curso_id_curso' => Curso::inRandomOrder()->first()->id_curso ?? Curso::factory(),
        ];
    }
}
