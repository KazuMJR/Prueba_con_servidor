<?php

namespace App\Http\Controllers;

use App\Models\HorarioClase;
use Illuminate\Http\Request;

class HorarioClaseController extends Controller
{
    // Mostrar listado con búsqueda y paginación
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $horarios = HorarioClase::when($busqueda, function ($query, $busqueda) {
            return $query->where(function($q) use ($busqueda) {
                $q->where('hora_inicio', 'like', "%$busqueda%")
                  ->orWhere('hora_fin', 'like', "%$busqueda%")
                  ->orWhere('dia', 'like', "%$busqueda%")
                  ->orWhere('aula', 'like', "%$busqueda%");
            });
        })
        ->paginate(10)
        ->withQueryString();

        return view('horario_clase.index', compact('horarios', 'busqueda'));
    }

    // Mostrar formulario para crear nuevo horario
    public function create()
    {
        return view('horario_clase.form');
    }

    // Guardar nuevo horario
    public function store(Request $request)
    {
        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dia' => 'required|string|max:10',
            'aula' => 'required|string|max:15',
        ]);

        // Añadir segundos para formato completo
        $horaInicio = $request->input('hora_inicio') . ':00';
        $horaFin = $request->input('hora_fin') . ':00';

        HorarioClase::create([
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'dia' => $request->input('dia'),
            'aula' => $request->input('aula'),
        ]);

        return redirect()->route('horario_clase.index')->with('success', 'Horario creado correctamente.');
    }

    // Mostrar formulario para editar un horario existente
    public function edit($id)
    {
        $horario = HorarioClase::findOrFail($id);
        return view('horario_clase.form', compact('horario'));
    }

    // Actualizar horario existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dia' => 'required|string|max:10',
            'aula' => 'required|string|max:15',
        ]);

        $horario = HorarioClase::findOrFail($id);

        $horaInicio = $request->input('hora_inicio') . ':00';
        $horaFin = $request->input('hora_fin') . ':00';

        $horario->update([
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'dia' => $request->input('dia'),
            'aula' => $request->input('aula'),
        ]);

        return redirect()->route('horario_clase.index')->with('success', 'Horario actualizado correctamente.');
    }

    // Mostrar detalles de un horario específico
    public function show($id)
    {
        $horario = HorarioClase::findOrFail($id);
        return view('horario_clase.show', compact('horario'));
    }

    // Opcional: eliminar un horario
    public function destroy($id)
    {
        $horario = HorarioClase::findOrFail($id);
        $horario->delete();

        return redirect()->route('horario_clase.index')->with('success', 'Horario eliminado correctamente.');
    }
}
