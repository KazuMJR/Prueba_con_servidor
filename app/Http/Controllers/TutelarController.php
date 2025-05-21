<?php

namespace App\Http\Controllers;

use App\Models\Tutelar;
use App\Models\Alumno;
use Illuminate\Http\Request;

class TutelarController extends Controller
{
    public function index()
    {
        $tutelares = Tutelar::with('alumno')->get();
        return view('tutelares.index', compact('tutelares'));
    }

    public function create()
    {
        $alumnos = Alumno::all();
        return view('tutelares.form', compact('alumnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui_alumno' => 'required|string|exists:alumno,cui',
            'cui_tutor' => 'required|string|max:15',
            'nombre_tutor' => 'required|string|max:60',
            'telefono' => 'nullable|string|max:15',
        ]);

        $exists = Tutelar::where('cui_alumno', $request->cui_alumno)
            ->where('cui_tutor', $request->cui_tutor)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'cui_tutor' => 'Este tutor ya está asignado para este alumno.'
            ])->withInput();
        }

        Tutelar::create($request->only('cui_alumno', 'cui_tutor', 'nombre_tutor', 'telefono'));

        return redirect()->route('tutelares.index')->with('success', 'Tutor asignado correctamente.');
    }

    public function show($cui_alumno, $cui_tutor)
    {
        $tutelar = Tutelar::with('alumno')
            ->where('cui_alumno', $cui_alumno)
            ->where('cui_tutor', $cui_tutor)
            ->firstOrFail();

        return view('tutelares.show', compact('tutelar'));
    }

    public function edit($cui_alumno, $cui_tutor)
    {
        $tutelar = Tutelar::where('cui_alumno', $cui_alumno)
            ->where('cui_tutor', $cui_tutor)
            ->firstOrFail();

        $alumnos = Alumno::all();

        return view('tutelares.form', compact('tutelar', 'alumnos'));
    }

    public function update(Request $request, $cui_alumno, $cui_tutor)
    {
        $request->validate([
            'nombre_tutor' => 'required|string|max:60',
            'telefono' => 'nullable|string|max:15',
        ]);

        $tutelar = Tutelar::where('cui_alumno', $cui_alumno)
            ->where('cui_tutor', $cui_tutor)
            ->firstOrFail();

        $tutelar->update($request->only('nombre_tutor', 'telefono'));

        return redirect()->route('tutelares.index')->with('success', 'Tutor actualizado correctamente.');
    }

    public function destroy($cui_alumno, $cui_tutor)
    {
        $tutelar = Tutelar::where('cui_alumno', $cui_alumno)
            ->where('cui_tutor', $cui_tutor)
            ->firstOrFail();

        $tutelar->delete();

        return redirect()->route('tutelares.index')->with('success', 'Tutor eliminado correctamente.');
    }
}
