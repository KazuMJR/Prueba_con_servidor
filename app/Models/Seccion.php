<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seccion extends Model
{

    use HasFactory;

    protected $table = 'seccion';
    protected $primaryKey = 'id_seccion';
    public $timestamps = false;

    protected $fillable = [
        'letra',
    ];

    public function getRouteKeyName()
    {
        return 'id_seccion';
    }
}
