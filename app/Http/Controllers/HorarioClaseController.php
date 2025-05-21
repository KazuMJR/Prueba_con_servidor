<?php

namespace App\Http\Controllers;

use App\Models\HorarioClase;
use Illuminate\Http\Request;

class HorarioClaseController extends Controller
{
    // Mostrar listado
    public function index()
    {
        $horarios = HorarioClase::all();
        return view('horario_clase.index', compact('horarios'));
    }

    // Mostrar formulario para crear nuevo registro
    public function create()
    {
        return view('horario_clase.form');
    }

    // Guardar nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'dia' => 'required|string|max:10',
            'aula' => 'required|string|max:15',
        ]);

        // Agregar ":00" para cumplir formato H:i:s esperado por la base de datos
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

    // Mostrar un registro específico
    public function show($id)
    {
        $horario = HorarioClase::findOrFail($id);
        return view('horario_clase.show', compact('horario'));
    }
}
