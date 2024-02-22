<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PermisoRol;
class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'Rol_id';


    protected $fillable = [
        'Rol_nombre',
    ];

    protected $casts = [
        'Rol_nombre' => 'string',
    ];

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permiso_rol', 'Roles_id', 'Permisos_id')->withPivot('Permiso_estatus');
    }
}
