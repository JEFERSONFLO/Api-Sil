<?php

use App\Http\Controllers\CursoUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\UserController;
use App\Models\CursoUsers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/usuarios', 'UserController@index')->middleware('admin');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('me', [UserController::class, 'me']);

    Route::post('users', [UserController::class, 'getUsers']);
    Route::post('update', [UserController::class, 'update']);
    Route::post('updateall/{id}', [UserController::class, 'updateUserAdmin']);


    Route::post('roles', [RolController::class, 'roles']);


    Route::post('sede/users', [SedeController::class, 'getSedesUsuario']);
    Route::post('sedes', [SedeController::class, 'sedes']); //COMPLETAR PARA QUE SOLO MUESTRE LAS SEDES QUE PERTENECE A LA SECRETARIA Y SOLO SE PUEDE VER TODAS LAS SEDES SI ES ADMINISTRADOR

    Route::post('modulos', [ModuloController::class, 'modulos']);
    Route::post('modulosuser', [ModuloController::class, 'getModeloUsuario']);
    Route::post('create/modulo/user', [ModuloController::class, 'createModulo']);
    Route::post('curso/user', [CursoUserController::class, 'CursoUsers']);
    Route::post('profesor/users', [CursoUserController::class, 'CursoUserProfesor']);
    Route::post('new/course',[CursoController::class,'createcurso']);
});
