<?php

namespace App\Http\Controllers;

use App\Models\ProgramaCurso;
use App\Models\Grado;
use App\Models\Curso;
use Illuminate\Http\Request;

class ProgramaCursoController extends Controller
{
    public function index()
    {
        $programas = ProgramaCurso::with(['grado', 'curso'])->get();
        return view('programas.index', compact('programas'));
    }

    public function create()
    {
        $grados = Grado::all();
        $cursos = Curso::all();
        $programa = null; // necesario para evitar error en la vista

        return view('programas.form', compact('grados', 'cursos', 'programa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grado_id_grado' => 'required|exists:grado,id_grado',
            'curso_id_curso' => 'required|exists:curso,id_curso',
        ]);

        ProgramaCurso::create($validated);

        return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }

    public function show(ProgramaCurso $programa)
    {
        return view('programas.show', compact('programa'));
    }

    public function edit(ProgramaCurso $programa)
    {
        $grados = Grado::all();
        $cursos = Curso::all();

        return view('programas.form', compact('programa', 'grados', 'cursos'));
    }

    public function update(Request $request, ProgramaCurso $programa)
    {
        $validated = $request->validate([
            'grado_id_grado' => 'required|exists:grado,id_grado',
            'curso_id_curso' => 'required|exists:curso,id_curso',
        ]);

        $programa->update($validated);

        return redirect()->route('programas.index')->with('success', 'Programa actualizado exitosamente.');
    }

    public function destroy(ProgramaCurso $programa)
    {
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }
}
