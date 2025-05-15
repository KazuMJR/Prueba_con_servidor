<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catedratico extends Model
{
    protected $table = 'catedratico';
    protected $primaryKey = 'cui';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'cui',
        'nombre_catedratico',
        'edad',
        'sexo'
    ];
}
