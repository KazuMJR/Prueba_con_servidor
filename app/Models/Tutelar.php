<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutelar extends Model
{
    use HasFactory;

    protected $table = 'tutelares';

    // Ahora la PK es un campo entero autoincremental llamado 'id'
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true; // si tienes timestamps en la tabla

    protected $fillable = [
        'cui_alumno',
        'cui_tutor',
        'nombre_tutor',
        'telefono',
    ];

    // Relación con Alumno (muchos tutores para un alumno)
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'cui_alumno', 'cui');
    }
}
