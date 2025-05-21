<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumno';
    protected $primaryKey = 'cui';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'cui',
        'nombre_alumno',
        'edad',
        'sexo',

    ];

    // Relación con Inscripción
    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_codigo', 'codigo');
    }
}

