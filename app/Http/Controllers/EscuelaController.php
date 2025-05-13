<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;

class EscuelaController extends Controller
{
    public function index()
    {
        $escuelas = Escuela::all();
        return view('escuelas.index', compact('escuelas'));
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
            'codigo_establecimiento' => 'required|string|max:6',
            'zona' => 'required|string|max:2',
        ]);

        Escuela::create($request->all());

        return redirect()->route('escuelas.index')->with('success', 'Escuela creada con éxito.');
    }

    public function show($id)
{
    $escuela = Escuela::find($id); // Obtener la escuela por ID

    if (!$escuela) {
        return redirect()->route('escuelas.index')->with('error', 'Escuela no encontrada');
    }

    return view('escuelas.show', compact('escuela'));
}

    public function edit(Escuela $escuela)
    {
        return view('escuelas.edit', compact('escuela'));
    }

    public function update(Request $request, Escuela $escuela)
    {
        $request->validate([
            'nombre_escuela' => 'required|string|max:60',
            'direccion' => 'required|string|max:60',
            'codigo_establecimiento' => 'required|string|max:6',
            'zona' => 'required|string|max:2',
        ]);

        $escuela->update($request->all());

        return redirect()->route('escuelas.index')->with('success', 'Escuela actualizada correctamente.');
    }

    public function destroy(Escuela $escuela)
    {
        $escuela->delete();
        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada.');
    }
}
