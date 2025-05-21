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


    public function getRouteKeyName()
    {
        return 'codigo';
    }


    public function alumno()
    {
        return $this->hasOne(Alumno::class, 'inscripcion_codigo', 'codigo');
    }
}
