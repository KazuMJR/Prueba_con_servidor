<?php

namespace App\Http\Controllers;

use App\Models\Tutelar;
use App\Models\Alumno;
use Illuminate\Http\Request;

class TutelarController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        // Cargar los tutelares con su alumno, y hacer búsqueda opcional
        $tutelares = Tutelar::with('alumno')
            ->when($busqueda, function ($query, $busqueda) {
                $query->where(function ($q) use ($busqueda) {
                    $q->where('nombre_tutor', 'like', "%$busqueda%")
                      ->orWhereHas('alumno', function ($q2) use ($busqueda) {
                          $q2->where('nombre_alumno', 'like', "%$busqueda%");
                      });
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('tutelares.index', compact('tutelares', 'busqueda'));
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
        ], [
            'cui_alumno.required' => 'El CUI del alumno es obligatorio.',
            'cui_alumno.exists' => 'El alumno no existe.',
            'cui_tutor.required' => 'El CUI del tutor es obligatorio.',
            'nombre_tutor.required' => 'El nombre del tutor es obligatorio.',
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
        ], [
            'nombre_tutor.required' => 'El nombre del tutor es obligatorio.',
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
