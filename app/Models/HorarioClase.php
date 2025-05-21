<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioClase extends Model
{
    protected $table = 'horario_clase';  // nombre exacto de la tabla

    protected $primaryKey = 'id_horario';

    public $timestamps = false; // si no tienes created_at, updated_at

    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'dia',
        'aula',
    ];
}
