<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioExamenes extends Model
{
    use HasFactory;

    protected $table = 'calendario_examen';
    protected $primaryKey = 'id_examen';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'descripcion',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];
}
