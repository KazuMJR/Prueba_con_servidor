<?php

namespace App\Http\Controllers;

use App\Models\CalendarioExamenes;
use Illuminate\Http\Request;

class CalendarioExamenController extends Controller
{
public function index()
{
$examenes = CalendarioExamenes::all();
return view('calendarios.index', compact('examenes'));
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
