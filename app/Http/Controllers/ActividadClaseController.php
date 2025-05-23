<?php

namespace App\Http\Controllers;

use App\Models\ActividadClase;
use Illuminate\Http\Request;

class ActividadClaseController extends Controller
{
    public function index()
    {
        $actividades = ActividadClase::all();
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        // Pasamos null para indicar que estamos creando (no editando)
        return view('actividades.form', ['actividad' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
        ]);

        ActividadClase::create($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad creada exitosamente.');
    }

    public function show(ActividadClase $actividad)
    {
        return view('actividades.show', compact('actividad'));
    }

    public function edit(ActividadClase $actividad)
    {
        return view('actividades.form', compact('actividad'));
    }

    public function update(Request $request, ActividadClase $actividad)
    {
        $request->validate([
            'descripcion' => 'required|string',
        ]);

        $actividad->update($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad actualizada exitosamente.');
    }

    public function destroy(ActividadClase $actividad)
    {
        $actividad->delete();

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad eliminada exitosamente.');
    }
}
