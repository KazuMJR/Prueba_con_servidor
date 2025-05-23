<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramaCurso extends Model
{
    use HasFactory;

    protected $table = 'programa_curso';
    protected $primaryKey = 'id_programa';
    public $timestamps = false;

    protected $fillable = ['grado_id_grado', 'curso_id_curso'];

    // Definir las relaciones con los modelos Grado y Curso
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'grado_id_grado', 'id_grado');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id_curso', 'id_curso');
    }
}
