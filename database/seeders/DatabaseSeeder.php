<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Escuela;
use App\Models\Catedratico;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\HorarioClase;
use App\Models\ProgramaCurso;
use App\Models\Seccion;
use App\Models\Tutelar;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecutar los seeders para poblar la base de datos.
     */
    public function run(): void
    {
        // Crear 50 registros falsos en la tabla alumno
        Alumno::factory(50)->create();
        // Crear 20 registros falsos en la tabla catedratico
        Catedratico::factory(20)->create();
        // Crear 10 registros falsos en la tabla curso
        Curso::factory(10)->create();
        // Crear 10 registros falsos en la tabla escuela
        Escuela::factory(10)->create();
        // Crear 10 registros falsos en la tabla grado
        Grado::factory(10)->create();
        // Crear 10 registros falsos en la tabla seccion
        Seccion::factory(10)->create();
        // Crear 10 registros falsos en la tabla horario_clase
        HorarioClase::factory(10)->create();
        // Crear 10 registros falsos en la tabla programa_curso
        ProgramaCurso::factory(10)->create();
        // Crear 10 registros falsos en la tabla tutelar
        Tutelar::factory(10)->create();
    }
}
