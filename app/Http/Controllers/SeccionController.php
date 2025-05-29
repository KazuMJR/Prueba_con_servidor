<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index(Request $request)
{
    $busqueda = $request->input('busqueda');

    $secciones = Seccion::when($busqueda, function ($query, $busqueda) {
        return $query->where('letra', 'like', "%$busqueda%");
    })->paginate(10)->withQueryString();

    return view('secciones.index', compact('secciones', 'busqueda'));
}

    public function create()
    {
        return view('secciones.form', ['seccion' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'letra' => 'required|string|size:1'
        ]);

        Seccion::create($request->only('letra'));

        return redirect()->route('secciones.index')->with('success', 'Sección creada correctamente.');
    }

    public function show(Seccion $seccion)
    {
        return view('secciones.show', compact('seccion'));
    }

    public function edit(Seccion $seccion)
    {
        return view('secciones.form', compact('seccion'));
    }

    public function update(Request $request, Seccion $seccion)
    {
        $request->validate([
            'letra' => 'required|string|size:1'
        ]);

        $seccion->update($request->only('letra'));

        return redirect()->route('secciones.index')->with('success', 'Sección actualizada correctamente.');
    }

    public function destroy(Seccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('secciones.index')->with('success', 'Sección eliminada correctamente.');
    }
}
