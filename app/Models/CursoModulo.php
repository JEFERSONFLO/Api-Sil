<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoModulo extends Model
{
    protected $table = 'cursomodulo';
    protected $primaryKey = 'Cm_id';


    protected $fillable = [
        'Modulo_id',
        'Curso_id',
    ];

    protected $casts = [
        'Modulo_id' => 'integer',
        'Curso_id' => 'integer',
    ];
    public function Curso()
    {
        return $this->belongsTo(Curso::class, 'Curso_id');
    }
    public function Modulo()
    {
        return $this->belongsTo(Modulo::class, 'Modulo_id');
    }
}
