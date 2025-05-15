<?php

namespace App\Http\Controllers;

use App\Models\Catedratico;
use Illuminate\Http\Request;

class CatedraticoController extends Controller
{
    public function index()
    {
        $catedraticos = Catedratico::all();
        return view('catedraticos.index', compact('catedraticos'));
    }

    public function create()
    {
        return view('catedraticos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui' => 'required|unique:catedratico',
            'nombre_catedratico' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:M,F'
        ]);

        Catedratico::create($request->all());
        return redirect()->route('catedraticos.index');
    }

    public function show(Catedratico $catedratico)
    {
        return view('catedraticos.show', compact('catedratico'));
    }

    public function edit(Catedratico $catedratico)
    {
        return view('catedraticos.form', compact('catedratico'));
    }

    public function update(Request $request, Catedratico $catedratico)
    {
        $request->validate([
            'nombre_catedratico' => 'required',
            'edad' => 'required|integer',
            'sexo' => 'required|in:M,F'
        ]);

        $catedratico->update($request->all());
        return redirect()->route('catedraticos.index');
    }

    public function destroy(Catedratico $catedratico)
    {
        $catedratico->delete();
        return redirect()->route('catedraticos.index');
    }
}
