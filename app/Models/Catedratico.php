<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catedratico extends Model
{

    use HasFactory;

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
