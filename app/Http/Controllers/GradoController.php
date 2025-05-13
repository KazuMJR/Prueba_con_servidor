<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        return view('grados.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_grado' => 'required',
            'nivel_educativo' => 'required'
        ]);

        Grado::create($request->all());
        return redirect()->route('grados.index');
    }

    public function show(Grado $grado)
    {
        return view('grados.show', compact('grado'));
    }

    public function edit(Grado $grado)
    {
        return view('grados.form', compact('grado'));
    }

    public function update(Request $request, Grado $grado)
    {
        $request->validate([
            'nombre_grado' => 'required',
            'nivel_educativo' => 'required'
        ]);

        $grado->update($request->all());
        return redirect()->route('grados.index');
    }

    public function destroy(Grado $grado)
    {
        $grado->delete();
        return redirect()->route('grados.index');
    }
}
