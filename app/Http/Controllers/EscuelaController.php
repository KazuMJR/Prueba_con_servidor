<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $escuelas = Escuela::when($busqueda, function ($query, $busqueda) {
            return $query->where(function ($q) use ($busqueda) {
                $q->where('nombre_escuela', 'like', "%$busqueda%")
                  ->orWhere('direccion', 'like', "%$busqueda%")
                  ->orWhere('codigo_establecimiento', 'like', "%$busqueda%")
                  ->orWhere('zona', 'like', "%$busqueda%");
            });
        })->paginate(10)->withQueryString();

        return view('escuelas.index', compact('escuelas', 'busqueda'));
    }

    public function create()
    {
        return view('escuelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_escuela' => 'required|string|max:60',
            'direccion' => 'required|string|max:60',
            'codigo_establecimiento' => 'required|string|max:6|unique:escuela,codigo_establecimiento',
            'zona' => 'required|string|max:2',
        ]);

        Escuela::create($request->all());

        return redirect()->route('escuelas.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Escuela creada con éxito.');
    }

    public function show(Escuela $escuela)
    {
        return view('escuelas.show', compact('escuela'))->with('busqueda', request('busqueda'));
    }

    public function edit(Escuela $escuela)
    {
        return view('escuelas.edit', compact('escuela'))->with('busqueda', request('busqueda'));
    }

    public function update(Request $request, Escuela $escuela)
    {
    $request->validate([
               'nombre_escuela' => 'required|string|max:60',
              'direccion' => 'required|string|max:60',
              'codigo_establecimiento' => 'required|string|max:6|unique:escuela,codigo_establecimiento,' . $escuela->id_escuela . ',id_escuela',
             'zona' => 'required|string|max:2',
      ]);

     $escuela->update($request->all());

     return redirect()->route('escuelas.index', ['busqueda' => $request->busqueda ?? null])
                     ->with('success', 'Escuela actualizada correctamente.');
    }

    public function destroy(Request $request, Escuela $escuela)
    {
        $escuela->delete();

        return redirect()->route('escuelas.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Escuela eliminada.');
    }
}
