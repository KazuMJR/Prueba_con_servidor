<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Escuela;
use App\Models\Grado;
use App\Models\Curso;
use App\Models\Seccion;
use App\Models\Alumno;
use App\Models\Catedratico;
use App\Models\Inscripcion;
use App\Models\ProgramaCurso;
use App\Models\ActividadClase;
use App\Models\Tutelar;
use App\Models\HorarioClase;
use App\Models\CalendarioExamenes;
use App\Models\Asignacion;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Orden de creación según dependencias
        Escuela::factory(10)->create();
        Grado::factory(5)->create();
        Curso::factory(10)->create();
        Seccion::factory(3)->create();

        Alumno::factory(30)->create();
        Catedratico::factory(10)->create();

        // Requiere alumnos creados
        Inscripcion::factory(25)->create();

        // Requiere grados y cursos
        ProgramaCurso::factory(15)->create();

        ActividadClase::factory(10)->create();

        // Requiere alumnos
        Tutelar::factory(20)->create();

        HorarioClase::factory(10)->create();
        CalendarioExamenes::factory(8)->create();

        // Requiere inscripciones, escuela, seccion, grado, catedratico y curso
        Asignacion::factory(20)->create();
    }
}
