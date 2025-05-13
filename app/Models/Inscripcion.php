<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcion';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'fecha',
    ];

    public $timestamps = false;

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'inscripcion_codigo', 'codigo');
    }
}
