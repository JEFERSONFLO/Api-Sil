<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Usuario_dni',
        'Usuario_apellidos',
        'Usuario_fnacimiento',
        'Usuario_sexo',
        'Usuario_direccion',
        'Usuario_distrito',
        'Usuario_provincia',
        'Usuario_departamento',
        'Usuario_celular',
        'Usuario_status',
        'Usuario_foto',
        'Rol_id',
        'name',
        'email',
        'password',
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'Rol_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * Verifica si el usuario tiene un rol específico.
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            return in_array($this->rol->Rol_nombre, $roles);
        }

        return $this->rol->Rol_nombre === $roles;
    }


    public function sedes()
    {
        return $this->belongsToMany(Sede::class, 'usuariossede', 'Users_id', 'Sedes_id');
    }


    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'cursousuario', 'Users_id', 'Curso_id')  ->withPivot('status', 'progreso');

    }

}
