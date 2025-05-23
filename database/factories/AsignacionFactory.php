<?php

namespace Database\Factories;

use App\Models\Asignacion;
use App\Models\Inscripcion;
use App\Models\Escuela;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Catedratico;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignacionFactory extends Factory
{
    protected $model = Asignacion::class;

    public function definition()
    {
        return [
            'inscripcion_codigo' => Inscripcion::factory(),
            'escuela_id_escuela' => Escuela::factory(),
            'seccion_id_seccion' => Seccion::factory(),
            'grado_id_grado' => Grado::factory(),
            'catedratico_cui' => Catedratico::factory(),
            'curso_id_curso' => Curso::factory(),
        ];
    }
}
