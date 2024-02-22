<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;

class SedeController extends Controller
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

    public function getSedesUsuario()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario tiene sedes asociadas
        if (!$user->sedes()->exists()) {
            return response()->json(['message' => 'El usuario no tiene sede asociadas'], 404);
        }

        $sedes = $user->sedes()->get();

        // Retornar las sedes
        return response()->json(['sedes' => $sedes]);
    }

    
    public function sedes()
    {
        $sedes = Sede::all();
        return response()->json($sedes);
    }
}
