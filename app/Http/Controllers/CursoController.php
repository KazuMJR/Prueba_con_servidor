<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required|string|max:50',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.form', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre_curso' => 'required|string|max:50',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
