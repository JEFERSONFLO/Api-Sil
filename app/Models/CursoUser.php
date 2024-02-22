<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Enum;

class CursoUsers extends Model
{
    protected $table = 'cursousuario';
    protected $primaryKey = 'CurUsuario';


    protected $fillable = [
        'Users_id',
        'Curso_id',
        'status',
        'progreso'
    ];

    protected $casts = [
        'Users_id' => 'bigint',
        'Curso_id' => 'integer',
        'status' => 'tinyint',
        'progreso' =>'enum'
    ];
    public function Curso()
    {
        return $this->belongsTo(Curso::class, 'Curso_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'Users_id');
    }
}
