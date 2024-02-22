<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CursoUserController extends Controller
{
    /**
     * Create a new ModuloController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function CursoUsers()
    {
        $user = auth()->user();

        if (!$user->cursos()->exists()) {
            return response()->json(['message' => 'El usuario no tiene cursos asociados'], 404);
        }

        $cursos = $user->cursos()->wherePivot('status', 'progreso')->get();

        return response()->json(['cursos' => $cursos]);
    }

    public function  CursoUserProfesor (){
        $user = auth()->user();

        if ($user->hasRole('Profesor')) {
            $users=User::whereHas
            return response()->json(['mensaje'=>'puede ver los usuarios estudiantes que están en su curso']);
        }else{
            return response()->json(['error'=>'No tiene permisos para acceder a esta funcionalidad'],403);
        }

    }
/*
    public function getUsers(){
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario es administrador
        if ($user->hasRole('Administrador')) {
            // Si el usuario es administrador, recuperar todos los usuarios
            $users = User::with(['rol.permisos' => function ($query) {
                $query->wherePivot('Permiso_estatus', 1);
            }])->get();

            // Retornar los usuarios
            return response()->json(['users' => $users]);
        } elseif ($user->hasRole('Secretarias')) {
            // Si el usuario es una secretaria, obtener su sede
            $sede = $user->sedes()->first();

            if ($sede) {
                // Si la secretaria tiene una sede asociada, obtener todos los usuarios con el mismo rol y sede
                $users = User::whereHas('sedes', function ($query) use ($sede) {
                    $query->where('Sedes_id', $sede->Sede_Id); // Corregir referencia a la columna de la sede
                })->whereHas('rol', function ($query) {
                    $query->where('Rol_nombre', 'Alumno')->orWhere('Rol_nombre', 'Profesor'); // Corregir referencia a la columna de nombre
                })->with(['rol.permisos' => function ($query) {
                    $query->wherePivot('Permiso_estatus', 1);
                }])->get();

                // Retornar los usuarios
                return response()->json(['users' => $users]);
            } else {
                // Si la secretaria no tiene una sede asociada, devolver un mensaje de error
                return response()->json(['message' => 'La secretaria no tiene una sede asociada'], 404);
            }
        } else {
            // Si el usuario no es ni administrador ni secretaria, devolver un error de permiso
            return response()->json(['message' => 'No tienes permiso para acceder a esta función'], 403);
        }
    }

 */
}
