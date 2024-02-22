<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permiso';
    protected $primaryKey = 'Permiso_id';


    protected $fillable = [
        'Permiso_nombre',
    ];

    protected $casts = [
        'Permiso_nombre' => 'string',
    ];

    // Define relaciones si es necesario
}
