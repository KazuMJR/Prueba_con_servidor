<?php

namespace App\Http\Controllers;

use App\Models\Catedratico;
use Illuminate\Http\Request;

class CatedraticoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $catedraticos = Catedratico::when($busqueda, function ($query, $busqueda) {
            $query->where('cui', 'like', "%{$busqueda}%")
                  ->orWhere('nombre_catedratico', 'like', "%{$busqueda}%");
        })->paginate(10)->withQueryString();

        return view('catedraticos.index', compact('catedraticos', 'busqueda'));
    }

    public function create()
    {
        return view('catedraticos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:catedratico,cui',
            'nombre_catedratico' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
        ], [
            'cui.unique' => 'El CUI ya está registrado.',
            'cui.required' => 'El CUI es obligatorio.',
            'nombre_catedratico.required' => 'El nombre del catedrático es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'sexo.required' => 'El sexo es obligatorio.',
        ]);

        Catedratico::create($request->all());

        return redirect()->route('catedraticos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Catedrático creado con éxito.');
    }

    public function show(Catedratico $catedratico)
    {
        return view('catedraticos.show', compact('catedratico'))->with('busqueda', request('busqueda'));
    }

    public function edit(Catedratico $catedratico)
    {
        return view('catedraticos.edit', compact('catedratico'))->with('busqueda', request('busqueda'));
    }

    public function update(Request $request, Catedratico $catedratico)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:catedratico,cui,' . $catedratico->cui . ',cui',
            'nombre_catedratico' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
        ], [
            'cui.unique' => 'El CUI ya está registrado.',
            'cui.required' => 'El CUI es obligatorio.',
            'nombre_catedratico.required' => 'El nombre del catedrático es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'sexo.required' => 'El sexo es obligatorio.',
        ]);

        $catedratico->update($request->all());

        return redirect()->route('catedraticos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Catedrático actualizado con éxito.');
    }

    public function destroy(Request $request, Catedratico $catedratico)
    {
        $catedratico->delete();

        return redirect()->route('catedraticos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Catedrático eliminado correctamente.');
    }
}
