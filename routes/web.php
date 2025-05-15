<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TutelarController;
use App\Http\Controllers\CatedraticoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\HorarioClaseController;
use App\Http\Controllers\CalendarioExamenController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProgramaCursoController;
use App\Http\Controllers\ActividadClaseController;
use App\Http\Controllers\AsignacionController;

Route::view('/', 'principal');

Route::resources([
    'escuelas' => EscuelaController::class,
    'inscripciones' => InscripcionController::class,
    'alumnos' => AlumnoController::class,
    'tutelares' => TutelarController::class,
    'catedraticos' => CatedraticoController::class,
    'grados' => GradoController::class,
    'horarios' => HorarioClaseController::class,
    'calendarios' => CalendarioExamenController::class,
    'cursos' => CursoController::class,
    'programas' => ProgramaCursoController::class,
    'actividades' => ActividadClaseController::class,
    'asignaciones' => AsignacionController::class,
]);

// Corrige la ruta de 'secciones' con el nombre correcto del parámetro
Route::resource('secciones', SeccionController::class)->parameters([
    'secciones' => 'seccion',
]);
