<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';

    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'fecha',
        'cui_alumno', // se agrega el campo foráneo
    ];

    public function getRouteKeyName()
    {
        return 'codigo';
    }

    // Relación: una inscripción pertenece a un alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'cui_alumno', 'cui');
    }
}
