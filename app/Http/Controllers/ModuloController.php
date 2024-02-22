<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;
use GuzzleHttp\Promise\Create;

class ModuloController extends Controller
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

    /**
     * Obtiene todos los módulos.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function modulos()
    {
        $modulos = auth()->user()->load(['cursos']);
        return response()->json($modulos);
    }

    public function createModulo(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        // Verificar si el usuario tiene permiso de administrador o secretarias
        if ($user->hasRole(['Secretarias', 'Administrador'])) {

            $request->validate([
                'codigo' => 'required|string|max:8',
                'nombre' => 'required|string|max:150',
            ]);
            $modulo = new Modulo();
            $modulo->Modulo_codigo = $request->input('codigo');
            $modulo->Modulo_nombre = $request->input('nombre');

            $modulo->save();
            return response()->json(['mensaje' => 'Módulo creado', 'Modulo' => $modulo], 200);
        } else {
            // Si el usuario no tiene los roles requeridos, devuelve un error de permiso
            return response()->json(['error' => 'No tienes permiso para realizar esta acción'], 403);
        }
    }

    /*  public function getUsers(){
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
    public function getModeloUsuario()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene sedes asociadas
        if (!$user->Modulos()->exists()) {
            return response()->json(['message' => 'El usuario no tiene sedes asociadas'], 404);
        }

        // Obtener las sedes asociadas al usuario
        $sedes = $user->Modulos()->get();

        // Retornar las sedes
        return response()->json(['sedes' => $sedes]);
    }
}
