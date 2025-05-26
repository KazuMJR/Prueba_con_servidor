<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstadisticaController;

// Ruta dashboard para evitar error "Route [dashboard] not defined."
Route::get('/dashboard', function () {
    return redirect()->route('horario_clase.index'); // Cambia según tu preferencia
})->name('dashboard');

// Ruta para vista estadística general (estadistica.blade.php)
Route::get('/estadistica', [EstadisticaController::class, 'index'])->name('estadistica');

// Ruta principal
Route::get('/', function () {
    return view('principal');
})->name('principal');


// Recursos con resource simple
Route::resources([
    'escuelas' => EscuelaController::class,
    'alumnos' => AlumnoController::class,
    'catedraticos' => CatedraticoController::class,
    'grados' => GradoController::class,
    'horario_clase' => HorarioClaseController::class,
    'calendarios' => CalendarioExamenController::class,
    'cursos' => CursoController::class,
    'programas' => ProgramaCursoController::class,
]);

// Recurso actividades con parámetro singular personalizado
Route::resource('actividades', ActividadClaseController::class)->parameters([
    'actividades' => 'actividad',
]);

// Recurso asignaciones con parámetros personalizados
Route::resource('asignaciones', AsignacionController::class)->parameters([
    'asignaciones' => 'asignacion',
]);

// Recursos adicionales con parámetros personalizados
Route::resource('inscripciones', InscripcionController::class)->parameters([
    'inscripciones' => 'inscripcion',
]);

Route::resource('secciones', SeccionController::class)->parameters([
    'secciones' => 'seccion',
]);

// Rutas para tutelares con clave primaria compuesta
Route::get('tutelares', [TutelarController::class, 'index'])->name('tutelares.index');
Route::get('tutelares/create', [TutelarController::class, 'create'])->name('tutelares.create');
Route::post('tutelares', [TutelarController::class, 'store'])->name('tutelares.store');
Route::get('tutelares/{cui_alumno}/{cui_tutor}', [TutelarController::class, 'show'])->name('tutelares.show');
Route::get('tutelares/{cui_alumno}/{cui_tutor}/edit', [TutelarController::class, 'edit'])->name('tutelares.edit');
Route::put('tutelares/{cui_alumno}/{cui_tutor}', [TutelarController::class, 'update'])->name('tutelares.update');
Route::delete('tutelares/{cui_alumno}/{cui_tutor}', [TutelarController::class, 'destroy'])->name('tutelares.destroy');

// Ruta para editar perfil
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Ruta logout para evitar error "Route [logout] not defined."
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
