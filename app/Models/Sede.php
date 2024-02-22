<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'Sede_Id';


    protected $fillable = [
        'Sede_nombre',
        'Sede_direccion',
        'Sede_institucion',
        'Sede_distrito',
        'Sede_provincia',
        'Sede_departamento',
    ];

    protected $casts = [
        'Sede_nombre' => 'string',
        'Sede_direccion' => 'string',
        'Sede_institucion' => 'string',
        'Sede_distrito' => 'string',
        'Sede_provincia' => 'string',
        'Sede_departamento' => 'string',
    ];

    // Define relaciones si es necesario
}
