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
        // No necesitas pasar inscripciones para crear un alumno
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:alumno,cui', // nombre tabla 'alumno'
            'nombre_alumno' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
        ], [
            'cui.unique' => 'El CUI ya está registrado.',
            'cui.required' => 'El CUI es obligatorio.',
            'nombre_alumno.required' => 'El nombre del alumno es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'sexo.required' => 'El sexo es obligatorio.',
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
        // No necesitas inscripciones para editar un alumno
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:alumno,cui,' . $alumno->cui . ',cui',
            'nombre_alumno' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
        ], [
            'cui.unique' => 'El CUI ya está registrado.',
            'cui.required' => 'El CUI es obligatorio.',
            'nombre_alumno.required' => 'El nombre del alumno es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'sexo.required' => 'El sexo es obligatorio.',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado con éxito.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }

    // Método para mostrar estadística por edad (usado en la vista principal)
    public function panelPrincipal()
    {
        $estadisticasEdades = Alumno::select('edad')
            ->get()
            ->groupBy('edad')
            ->map(fn($group) => $group->count())
            ->sortKeys();

        return view('principal', compact('estadisticasEdades'));
    }

    // Función para estadística específica de alumnos por edad (opcional)
    public function estadisticaPorEdad()
    {
        $estadisticasEdades = Alumno::select('edad')
            ->get()
            ->groupBy('edad')
            ->map(fn($group) => $group->count())
            ->sortKeys();

        return view('alumnos.estadistica', compact('estadisticasEdades'));
    }
}
