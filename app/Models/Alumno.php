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
    public $incrementing = false;   // porque 'cui' no es auto-incremental
    protected $keyType = 'string';  // porque 'cui' es string
    public $timestamps = false;

    protected $fillable = [
        'cui',
        'nombre_alumno',
        'edad',
        'sexo',
    ];

    // Un alumno puede tener muchas inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'cui_alumno', 'cui');
    }
}
