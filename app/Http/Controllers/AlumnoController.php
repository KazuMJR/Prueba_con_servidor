<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $inscripciones = Inscripcion::all();
        return view('alumnos.create', compact('inscripciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:alumno,cui',
            'nombre_alumno' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
            'inscripcion_codigo' => 'required|exists:inscripcion,codigo',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado con éxito.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        $inscripciones = Inscripcion::all();
        return view('alumnos.edit', compact('alumno', 'inscripciones'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:alumno,cui,' . $alumno->cui . ',cui',
            'nombre_alumno' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
            'inscripcion_codigo' => 'required|exists:inscripcion,codigo',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado con éxito.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
