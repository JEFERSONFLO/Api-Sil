<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 2
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
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
                'Usuario_foto' => 'required',
                'Rol_id' => 'required|int',
                'name' => 'required',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => '¡Usuario registrado exitosamente!',
            'user' => $user
        ], 201);
    }

}
