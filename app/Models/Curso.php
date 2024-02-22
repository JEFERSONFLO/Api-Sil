<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'Curso_id';


    protected $fillable = [
        'Curso_codigo',
        'Curso_nombre',
    ];

    protected $casts = [
        'Curso_codigo' => 'integer',
        'Curso_nombre' => 'string',
    ];

    // Define relaciones si es necesario
}
