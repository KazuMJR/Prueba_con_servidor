<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Si tu tabla en BD se llama 'alumno' (singular)
    protected $table = 'alumno';

    // Clave primaria
    protected $primaryKey = 'cui';

    // 'cui' no es auto-incremental y es string
    public $incrementing = false;
    protected $keyType = 'string';

    // No usar timestamps si no están en la tabla
    public $timestamps = false;

    protected $fillable = [
        'cui',
        'nombre_alumno',
        'edad',
        'sexo',
    ];

    // Relación con inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'cui_alumno', 'cui');
    }
}
