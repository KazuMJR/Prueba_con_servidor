<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;
    
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    public $timestamps = false;

    protected $fillable = ['nombre_curso'];
}
