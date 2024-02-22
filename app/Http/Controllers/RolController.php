<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
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
    public function roles()
    {
        $user = auth()->user();
        $sedes = Rol::all();
        return response()->json($sedes);
    }
}
