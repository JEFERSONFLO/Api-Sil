<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;

class CursoController extends Controller
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
     * Store a newly created course.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createcurso(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'Curso_codigo' => 'required|string|max:10',
            'Curso_nombre' => 'required|string|max:150',
            // Puedes añadir más reglas de validación según tus necesidades
        ]);

        // Crear un nuevo curso con los datos proporcionados
        $curso = new Curso();
        $curso->Curso_codigo = $request->input('Curso_codigo');
        $curso->Curso_nombre = $request->input('Curso_nombre');
        // Puedes asignar created_at y updated_at automáticamente con las marcas de tiempo de Laravel
        // No es necesario asignar estos campos manualmente, Laravel los gestionará automáticamente
        $curso->save();

        // Devolver una respuesta de éxito
        return response()->json(['message' => 'Curso creado exitosamente'], 201);
    }
}
