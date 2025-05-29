<?php

namespace App\Http\Controllers;

use App\Models\CalendarioExamenes;
use Illuminate\Http\Request;

class CalendarioExamenController extends Controller
{
public function index(Request $request)
{
    $busqueda = $request->input('busqueda');

    $examenes = CalendarioExamenes::when($busqueda, function ($query, $busqueda) {
        return $query->where(function ($q) use ($busqueda) {
            $q->where('id_examen', 'like', "%$busqueda%")
              ->orWhere('descripcion', 'like', "%$busqueda%");
        });
    })->paginate(10)->withQueryString();

    if ($request->ajax()) {
        return view('calendarios.partials.table', compact('examenes', 'busqueda'))->render();
    }

    return view('calendarios.index', compact('examenes', 'busqueda'));
}


public function create()
{
// Pasamos null con el mismo nombre que espera la vista
return view('calendarios.form', ['calendario' => null]);
}

public function store(Request $request)
{
$request->validate([
'fecha' => 'required|date',
'descripcion' => 'required|string',
]);

CalendarioExamenes::create($request->all());

return redirect()->route('calendarios.index')
->with('success', 'Examen creado exitosamente.');
}

// Cambié $calendario_examen a $calendario para que coincida con la ruta y la vista
public function show(CalendarioExamenes $calendario)
{
return view('calendarios.show', compact('calendario'));
}

public function edit(CalendarioExamenes $calendario)
{
return view('calendarios.form', compact('calendario'));
}

public function update(Request $request, CalendarioExamenes $calendario)
{
$request->validate([
'fecha' => 'required|date',
'descripcion' => 'required|string',
]);

$calendario->update($request->all());

return redirect()->route('calendarios.index')
->with('success', 'Examen actualizado exitosamente.');
}

public function destroy(CalendarioExamenes $calendario)
{
$calendario->delete();

return redirect()->route('calendarios.index')
->with('success', 'Examen eliminado exitosamente.');
}
}
