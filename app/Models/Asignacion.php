<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = 'asignacion';
    protected $primaryKey = 'id_asignacion';
    public $timestamps = false;

    protected $fillable = [
        'inscripcion_codigo',
        'escuela_id_escuela',
        'seccion_id_seccion',
        'grado_id_grado',
        'catedratico_cui',
        'curso_id_curso',
    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_codigo', 'codigo');
    }

    public function escuela()
    {
        return $this->belongsTo(Escuela::class, 'escuela_id_escuela', 'id_escuela');
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id_seccion', 'id_seccion');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id_grado', 'id_grado');
    }

    public function catedratico()
    {
        return $this->belongsTo(Catedratico::class, 'catedratico_cui', 'cui');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id_curso', 'id_curso');
    }
}
