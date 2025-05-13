<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
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
