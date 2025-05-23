<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActividadClase extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'actividades_clase';

    // Llave primaria personalizada
    protected $primaryKey = 'id_actividad';

    // Si la llave primaria es auto incremental (true por defecto)
    public $incrementing = true;

    // Tipo de la llave primaria (por defecto es int)
    protected $keyType = 'int';

    // Si la tabla usa timestamps (created_at, updated_at)
    public $timestamps = false;

    // Campos asignables masivamente
    protected $fillable = [
        'descripcion',
    ];
}
