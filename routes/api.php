<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioPreguntaContoller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Roles
Route::get('/roles',[RolController::class,'index']);

// Paises
Route::get('/paises',[PaisController::class,'index']);

// Preguntas
Route::get('/preguntas',[PreguntasController::class,'index']);
Route::put('/preguntas/{id}',[PreguntasController::class,'update']);

// Usuarios
Route::get('/usuarios',[UsuarioController::class,'index']);
Route::post('/usuarios',[UsuarioController::class,'store']);
Route::post('/usuarios/loguear',[UsuarioController::class,'loguear']);
Route::get('/usuarios/{id}',[UsuarioController::class,'show']);
Route::get('/usuarios/mostrar/datos',[UsuarioController::class,'mostrar']);


// Usuario-Pregunta
Route::get('/usuario_pregunta/{id}',[UsuarioPreguntaContoller::class,'respuestas']);

