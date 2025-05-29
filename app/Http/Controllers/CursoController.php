<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $cursos = Curso::when($busqueda, function ($query, $busqueda) {
            return $query->where('nombre_curso', 'like', "%$busqueda%");
        })->paginate(10)->withQueryString();

        return view('cursos.index', compact('cursos', 'busqueda'));
    }

    public function create()
    {
        return view('cursos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => ['required', 'string', 'max:50', 'unique:curso,nombre_curso'],
        ], [
            'nombre_curso.unique' => 'El nombre del curso ya existe, no se permiten duplicados.',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Curso creado con éxito.');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'))->with('busqueda', request('busqueda'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.form', compact('curso'))->with('busqueda', request('busqueda'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre_curso' => [
                'required',
                'string',
                'max:50',
                Rule::unique('curso', 'nombre_curso')->ignore($curso->id_curso, 'id_curso'),
            ],
        ], [
            'nombre_curso.unique' => 'No se detectaron cambios, no se puede actualizar.',
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Request $request, Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Curso eliminado.');
    }
}
