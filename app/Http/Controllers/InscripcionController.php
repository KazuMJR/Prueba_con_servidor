<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    // Mostrar listado de inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Mostrar formulario para crear nueva inscripcion
    public function create()
    {
        return view('inscripciones.form');
    }

    // Guardar nueva inscripcion
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:inscripcion,codigo',
            'fecha' => 'required|date',
        ]);

        Inscripcion::create($request->only('codigo', 'fecha'));

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción creada correctamente.');
    }

    // Mostrar detalle de una inscripcion
    public function show(Inscripcion $inscripcion)
    {
        return view('inscripciones.show', compact('inscripcion'));
    }

    // Mostrar formulario para editar inscripcion
    public function edit(Inscripcion $inscripcion)
    {
        return view('inscripciones.form', compact('inscripcion'));
    }

    // Actualizar inscripcion
    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'fecha' => 'required|date',
        ]);

        // No se actualiza 'codigo' porque es PK y no incrementable
        $inscripcion->update($request->only('fecha'));

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción actualizada correctamente.');
    }

    // Eliminar inscripcion
    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();

        return redirect()->route('inscripciones.index')
            ->with('success', 'Inscripción eliminada correctamente.');
    }
}
