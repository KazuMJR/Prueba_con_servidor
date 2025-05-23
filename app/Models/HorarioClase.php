<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioClase extends Model
{
    use HasFactory;

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
