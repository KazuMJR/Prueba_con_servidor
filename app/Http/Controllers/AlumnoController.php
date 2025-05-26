<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $alumnos = Alumno::when($busqueda, function ($query, $busqueda) {
            return $query->where(function ($q) use ($busqueda) {
                $q->where('cui', 'like', "%$busqueda%")
                  ->orWhere('nombre_alumno', 'like', "%$busqueda%");
            });
        })->paginate(20)->withQueryString();

        if ($request->ajax()) {
            return view('alumnos.partials.table', compact('alumnos', 'busqueda'));
        }

        return view('alumnos.index', compact('alumnos', 'busqueda'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cui' => 'required|string|max:15|unique:alumno,cui',
            'nombre_alumno' => 'required|string|max:60',
            'edad' => 'required|integer|min:1',
            'sexo' => 'required|string|in:M,F',
        ], [
            'cui.unique' => 'El CUI ya está registrado.',
            'cui.required' => 'El CUI es obligatorio.',
            'nombre_alumno.required' => 'El nombre del alumno es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'sexo.required' => 'El sexo es obligatorio.',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Alumno creado con éxito.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'))->with('busqueda', request('busqueda'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'))->with('busqueda', request('busqueda'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
    'cui' => 'required|string|max:15|unique:alumno,cui,' . $alumno->cui . ',cui',
    'nombre_alumno' => 'required|string|max:60',
    'edad' => 'required|integer|min:1',
    'sexo' => 'required|string|in:M,F',
], [
    'cui.unique' => 'El CUI ya está registrado.',
    'cui.required' => 'El CUI es obligatorio.',
    'nombre_alumno.required' => 'El nombre del alumno es obligatorio.',
    'edad.required' => 'La edad es obligatoria.',
    'sexo.required' => 'El sexo es obligatorio.',
]);


        $alumno->update($request->all());

        return redirect()->route('alumnos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Alumno actualizado con éxito.');
    }

    public function destroy(Request $request, Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index', ['busqueda' => $request->busqueda ?? null])
                         ->with('success', 'Alumno eliminado correctamente.');
    }

}
