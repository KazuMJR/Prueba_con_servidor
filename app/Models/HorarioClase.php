<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorarioClase extends Model
{

    use HasFactory;

    protected $table = 'horario_clase'; 

    protected $primaryKey = 'id_horario';

    public $timestamps = false;

    protected $fillable = [
        'hora_inicio',
        'hora_fin',
        'dia',
        'aula',
    ];
}
