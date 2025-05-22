<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    // Mostrar listado de inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::with('alumno')->get();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Mostrar formulario para crear nueva inscripción
    public function create()
    {
        $alumnos = Alumno::all();
        return view('inscripciones.form', compact('alumnos'));
    }

    // Guardar nueva inscripción
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:inscripcion,codigo',
            'fecha' => 'required|date',
            'cui_alumno' => 'required|string|unique:inscripcion,cui_alumno',
        ], [
            'cui_alumno.unique' => 'El CUI del alumno ya está registrado.',
            'codigo.unique' => 'El código ya está registrado.',
            'fecha.required' => 'La fecha es obligatoria.',
        ]);

        Inscripcion::create($request->only('codigo', 'fecha', 'cui_alumno'));

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción creada correctamente.');
    }

    // Mostrar detalle de una inscripción
    public function show(Inscripcion $inscripcion)
    {
        $inscripcion->load('alumno');
        return view('inscripciones.show', compact('inscripcion'));
    }

    // Mostrar formulario para editar inscripción
    public function edit(Inscripcion $inscripcion)
    {
        $alumnos = Alumno::all();
        return view('inscripciones.form', compact('inscripcion', 'alumnos'));
    }

    // Actualizar inscripción
    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cui_alumno' => 'required|string|unique:inscripcion,cui_alumno,' . $inscripcion->codigo . ',codigo',
        ], [
            'cui_alumno.unique' => 'El CUI del alumno ya está registrado.',
            'fecha.required' => 'La fecha es obligatoria.',
        ]);

        $inscripcion->update($request->only('fecha', 'cui_alumno'));

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción actualizada correctamente.');
    }

    // Eliminar inscripción
    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción eliminada correctamente.');
    }
}
