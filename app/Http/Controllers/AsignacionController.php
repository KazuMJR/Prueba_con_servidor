<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Inscripcion;
use App\Models\Escuela;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Catedratico;
use App\Models\Curso;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    // Mostrar listado de asignaciones
    public function index(Request $request)
    {
        $busqueda = $request->input('busqueda');

        $asignaciones = Asignacion::with(['inscripcion', 'escuela', 'seccion', 'grado', 'catedratico', 'curso'])
            ->when($busqueda, function ($query, $busqueda) {
                return $query->where(function ($q) use ($busqueda) {
                    $q->where('id_asignacion', 'like', "%$busqueda%")
                      ->orWhereHas('inscripcion', function ($inscripcionQuery) use ($busqueda) {
                          $inscripcionQuery->where('codigo', 'like', "%$busqueda%");
                      })
                      ->orWhereHas('escuela', function ($escuelaQuery) use ($busqueda) {
                          $escuelaQuery->where('nombre_escuela', 'like', "%$busqueda%");
                      })
                      ->orWhereHas('seccion', function ($seccionQuery) use ($busqueda) {
                          $seccionQuery->where('letra', 'like', "%$busqueda%");
                      })
                      ->orWhereHas('grado', function ($gradoQuery) use ($busqueda) {
                          $gradoQuery->where('nombre_grado', 'like', "%$busqueda%");
                      })
                      ->orWhereHas('catedratico', function ($catedraticoQuery) use ($busqueda) {
                          $catedraticoQuery->where('nombre_catedratico', 'like', "%$busqueda%");
                      })
                      ->orWhereHas('curso', function ($cursoQuery) use ($busqueda) {
                          $cursoQuery->where('nombre_curso', 'like', "%$busqueda%");
                      });
                });
            })
            ->paginate(10)
            ->withQueryString();

        if ($request->ajax()) {
            return view('asignaciones.partials.table', compact('asignaciones', 'busqueda'))->render();
        }

        return view('asignaciones.index', compact('asignaciones', 'busqueda'));
    }

    // Mostrar formulario para crear una nueva asignación
    public function create()
    {
        $inscripciones = Inscripcion::all();
        $escuelas = Escuela::all();
        $secciones = Seccion::all();
        $grados = Grado::all();
        $catedraticos = Catedratico::all();
        $cursos = Curso::all();

        return view('asignaciones.form', compact('inscripciones', 'escuelas', 'secciones', 'grados', 'catedraticos', 'cursos'));
    }

    // Guardar nueva asignación
    public function store(Request $request)
    {
        $request->validate([
            'inscripcion_codigo' => 'required|string|exists:inscripcion,codigo',
            'escuela_id_escuela' => 'required|integer|exists:escuela,id_escuela',
            'seccion_id_seccion' => 'required|integer|exists:seccion,id_seccion',
            'grado_id_grado' => 'required|integer|exists:grado,id_grado',
            'catedratico_cui' => 'required|string|exists:catedratico,cui',
            'curso_id_curso' => 'required|integer|exists:curso,id_curso',
        ]);

        Asignacion::create($request->all());

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación creada correctamente.');
    }

    // Mostrar detalle de una asignación
    public function show(Asignacion $asignacion)
    {
        $asignacion->load(['inscripcion', 'escuela', 'seccion', 'grado', 'catedratico', 'curso']);
        return view('asignaciones.show', compact('asignacion'));
    }

    // Mostrar formulario para editar asignación
    public function edit(Asignacion $asignacion)
    {
        $inscripciones = Inscripcion::all();
        $escuelas = Escuela::all();
        $secciones = Seccion::all();
        $grados = Grado::all();
        $catedraticos = Catedratico::all();
        $cursos = Curso::all();

        return view('asignaciones.form', compact('asignacion', 'inscripciones', 'escuelas', 'secciones', 'grados', 'catedraticos', 'cursos'));
    }

    // Actualizar asignación
    public function update(Request $request, Asignacion $asignacion)
    {
        $request->validate([
            'inscripcion_codigo' => 'required|string|exists:inscripcion,codigo',
            'escuela_id_escuela' => 'required|integer|exists:escuela,id_escuela',
            'seccion_id_seccion' => 'required|integer|exists:seccion,id_seccion',
            'grado_id_grado' => 'required|integer|exists:grado,id_grado',
            'catedratico_cui' => 'required|string|exists:catedratico,cui',
            'curso_id_curso' => 'required|integer|exists:curso,id_curso',
        ]);

        $asignacion->update($request->all());

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación actualizada correctamente.');
    }

    // Eliminar asignación
    public function destroy(Asignacion $asignacion)
    {
        $asignacion->delete();

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignación eliminada correctamente.');
    }
}
