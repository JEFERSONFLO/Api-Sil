<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permiso;
class PermisoRol extends Model
{
    protected $table = 'permiso_rol';
    protected $primaryKey = 'PermisoR_id';
      protected $fillable = [
        'Roles_id',
        'Permisos_id',
        'Permiso_estatus',
    ];

    protected $casts = [
        'Roles_id' => 'integer',
        'Permisos_id' => 'integer',
        'Permiso_estatus' => 'boolean',
    ];

    // Define relaciones si es necesario

    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'Permisos_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'Roles_id');
    }
}
