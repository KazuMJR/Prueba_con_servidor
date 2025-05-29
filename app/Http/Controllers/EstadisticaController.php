<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Escuela;
use App\Models\Curso;
use App\Models\Catedratico;

class EstadisticaController extends Controller
{
    public function index()
    {
        // Estadística: Alumnos por edad
        $estadisticasEdades = DB::table('alumno')
            ->select(DB::raw('edad, COUNT(*) as cantidad'))
            ->groupBy('edad')
            ->orderBy('edad')
            ->pluck('cantidad', 'edad');

        // Totales generales
        $totalAlumnos = DB::table('alumno')->count();
        $totalEscuelas = DB::table('escuela')->count();
        $totalCatedraticos = DB::table('catedratico')->count();
        $totalCursos = DB::table('curso')->count();

        // Catedráticos por nivel educativo (a través de grado en asignaciones)
        $catedraticosPorNivel = DB::table('asignacion')
            ->join('grado', 'asignacion.grado_id_grado', '=', 'grado.id_grado')
            ->join('catedratico', 'asignacion.catedratico_cui', '=', 'catedratico.cui')
            ->select('grado.nivel_educativo', DB::raw('count(distinct catedratico.cui) as cantidad'))
            ->groupBy('grado.nivel_educativo')
            ->pluck('cantidad', 'nivel_educativo');

        // Total de alumnos por escuela y grado
        $alumnosPorEscuelaYGrado = DB::table('asignacion')
            ->join('escuela', 'asignacion.escuela_id_escuela', '=', 'escuela.id_escuela')
            ->join('grado', 'asignacion.grado_id_grado', '=', 'grado.id_grado')
            ->select('escuela.nombre_escuela', 'grado.nombre_grado', DB::raw('count(*) as total'))
            ->groupBy('escuela.nombre_escuela', 'grado.nombre_grado')
            ->orderBy('escuela.nombre_escuela')
            ->orderBy('grado.nombre_grado')
            ->get();

        // Total de alumnos por grado en general
        $alumnosPorGrado = DB::table('asignacion')
            ->join('grado', 'asignacion.grado_id_grado', '=', 'grado.id_grado')
            ->select('grado.nombre_grado', DB::raw('count(*) as total'))
            ->groupBy('grado.nombre_grado')
            ->orderBy('grado.nombre_grado')
            ->get();

        // Total de alumnos por catedrático
        $alumnosPorCatedratico = DB::table('asignacion')
            ->join('catedratico', 'asignacion.catedratico_cui', '=', 'catedratico.cui')
            ->select('catedratico.nombre_catedratico', DB::raw('count(*) as total'))
            ->groupBy('catedratico.nombre_catedratico')
            ->orderBy('catedratico.nombre_catedratico')
            ->get();

        // Actividades recientes simuladas
        $ultimaEscuela = Escuela::orderBy('id_escuela', 'desc')->first();
        $ultimoCurso = Curso::orderBy('id_curso', 'desc')->first();
        $ultimoCatedratico = Catedratico::orderBy('cui', 'desc')->first();

        return view('estadistica', compact(
            'estadisticasEdades',
            'totalAlumnos',
            'totalEscuelas',
            'totalCatedraticos',
            'totalCursos',
            'catedraticosPorNivel',
            'alumnosPorEscuelaYGrado',
            'alumnosPorGrado',
            'alumnosPorCatedratico',
            'ultimaEscuela',
            'ultimoCurso',
            'ultimoCatedratico'
        ));
    }
}
