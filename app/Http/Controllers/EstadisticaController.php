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
        // Alumnos por edad
        $estadisticasEdades = DB::table('alumno')
            ->select(DB::raw('edad, COUNT(*) as cantidad'))
            ->groupBy('edad')
            ->orderBy('edad')
            ->pluck('cantidad', 'edad');

        // Totales
        $totalAlumnos = DB::table('alumno')->count();
        $totalEscuelas = DB::table('escuela')->count();
        $totalCatedraticos = DB::table('catedratico')->count();
        $totalCursos = DB::table('curso')->count();

        // Catedráticos por nivel educativo
        $catedraticosPorNivel = DB::table('asignacion')
            ->join('grado', 'asignacion.grado_id_grado', '=', 'grado.id_grado')
            ->join('catedratico', 'asignacion.catedratico_cui', '=', 'catedratico.cui')
            ->select('grado.nivel_educativo', DB::raw('count(distinct catedratico.cui) as cantidad'))
            ->groupBy('grado.nivel_educativo')
            ->pluck('cantidad', 'nivel_educativo');

        // Actividades recientes simuladas
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
            'ultimaEscuela',
            'ultimoCurso',
            'ultimoCatedratico'
        ));
    }
}
