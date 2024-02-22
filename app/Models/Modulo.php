<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
class Modulo extends Model
{
    protected $table = 'modulo';
    protected $primaryKey = 'Modulo_id';


    protected $fillable = [
        'Modulo_codigo',
        'Modulo_nombre',
    ];

    protected $casts = [
        'Modulo_codigo' => 'string',
        'Modulo_nombre' => 'string',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'CursoModulo', 'Modulo_id', 'Curso_id');
    }
    // Define relaciones si es necesario
}
