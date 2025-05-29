<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $grados = Grado::when($busqueda, function ($query, $busqueda) {
            return $query->where(function($q) use ($busqueda) {
                $q->where('nombre_grado', 'like', "%$busqueda%")
                  ->orWhere('nivel_educativo', 'like', "%$busqueda%");
            });
        })->paginate(10)->withQueryString();

        return view('grados.index', compact('grados', 'busqueda'));
    }

    public function create()
    {
        return view('grados.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_grado' => ['required', 'string', 'max:50', 'unique:grado,nombre_grado'],
            'nivel_educativo' => ['required', 'string', 'max:50'],
        ], [
            'nombre_grado.unique' => 'El nombre del grado ya existe, no se permiten duplicados.',
        ]);

        Grado::create($request->all());

        return redirect()->route('grados.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Grado creado con éxito.');
    }

    public function show(Grado $grado)
    {
        return view('grados.show', compact('grado'))->with('busqueda', request('busqueda'));
    }

    public function edit(Grado $grado)
    {
        return view('grados.form', compact('grado'))->with('busqueda', request('busqueda'));
    }

    public function update(Request $request, Grado $grado)
    {
        $request->validate([
            'nombre_grado' => [
                'required',
                'string',
                'max:50',
                Rule::unique('grado', 'nombre_grado')->ignore($grado->id_grado, 'id_grado'),
            ],
            'nivel_educativo' => ['required', 'string', 'max:50'],
        ], [
            'nombre_grado.unique' => 'No se detectaron cambios, no se puede actualizar.',
        ]);

        $grado->update($request->all());

        return redirect()->route('grados.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Grado actualizado correctamente.');
    }

    public function destroy(Request $request, Grado $grado)
    {
        $grado->delete();

        return redirect()->route('grados.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Grado eliminado.');
    }
}
