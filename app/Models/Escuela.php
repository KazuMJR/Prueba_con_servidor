<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Escuela extends Model
{

    use HasFactory;

    protected $table = 'escuela';
    protected $primaryKey = 'id_escuela';
    public $timestamps = false;

    protected $fillable = [
        'nombre_escuela',
        'direccion',
        'codigo_establecimiento',
        'zona',
    ];

    public function getRouteKeyName()
    {
        return 'id_escuela';
    }
}
