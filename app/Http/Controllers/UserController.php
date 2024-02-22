<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class UserController extends Controller
{
    /**
     * Create a new ModuloController instance.
     *
     * @return void
     */
    public function __construct(){$this->middleware('auth:api');}
    public function me() {
        $user = auth()->user()->load(['rol.permisos' => function ($query) {
            $query->wherePivot('Permiso_estatus', 1);
        }]);
        return response()->json(auth()->user());
    }


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










    public function updateUserAdmin(Request $request, $id)  {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene el rol de administrador
        if (!$user->hasRole('Administrador')) {
            return response()->json(['message' => 'No tienes permiso para acceder a esta función'], 403);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'Usuario_dni' => 'required|int',
            'Usuario_apellidos' => 'required|string|max:100',
            'Usuario_fnacimiento' => 'required|date',
            'Usuario_sexo' => 'required|string|max:1',
            'Usuario_direccion' => 'required|string|max:200',
            'Usuario_distrito' => 'required|string|max:100',
            'Usuario_provincia' => 'required|string|max:100',
            'Usuario_departamento' => 'required|string|max:100',
            'Usuario_celular' => 'required|string|max:11',
            'Usuario_status' => 'required|string|max:1',
            'Usuario_foto' => 'requerid|LONGBLOB',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buscar el usuario a actualizar
        $userToUpdate = User::findOrFail($id);

        // Actualizar los campos del usuario
        $userToUpdate->fill($request->except('password'));

        // Verificar si se proporcionó una nueva contraseña y actualizarla si es así
        if ($request->has('password')) {
            $userToUpdate->password = bcrypt($request->password);
        }

        // Guardar los cambios
        $userToUpdate->save();

        return response()->json(['message' => 'Usuario actualizado correctamente', 'user' => $userToUpdate]);
    }

        /**
     * Update the authenticated User's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)   {
        $user = auth()->user();

        // Verificar si el usuario tiene permiso para cambiar el rol del usuario
        if ($user->hasRole(['secretaria', 'administrador'])) {
            // Validar solo el rol del usuario
            $request->validate([
                'Rol_id' => 'required|int',
            ]);

            // Actualizar el campo de rol si el usuario tiene permiso
            $user->Rol_id = $request->Rol_id;
            $user->save();
        }

        // Validar los otros campos del perfil
        $validator = Validator::make($request->all(), [
            'Usuario_dni' => 'required|int|unique',
            'Usuario_apellidos' => 'required|string|max:100',
            'Usuario_fnacimiento' => 'required|date',
            'Usuario_sexo' => 'required|string|max:1',
            'Usuario_direccion' => 'required|string|max:200',
            'Usuario_distrito' => 'required|string|max:100',
            'Usuario_provincia' => 'required|string|max:100',
            'Usuario_departamento' => 'required|string|max:100',
            'Usuario_celular' => 'required|string|max:11',
            'Usuario_status' => 'required|string|max:1',
            'Usuario_foto' => 'requerid|LONGBLOB',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $user->fill($request->except('Rol_id', 'password'));


        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }


        $user->save();

        return response()->json(['message' => 'Perfil actualizado correctamente', 'user' => $user]);
    }
}
