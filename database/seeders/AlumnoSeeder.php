<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    public function run()
    {
        // Crear 20 alumnos usando el factory
        Alumno::factory()->count(25000)->create();
    }
}
