<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ArticulosController;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\MascotasController;



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

Route::post('registrar', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('user-profile', [UserController::class, 'profile']);
    Route::get('logout', [UserController::class, 'logout']);
    /** rutas categorias */
    Route::get('categorias', [CategoriaController::class, 'index']);
    Route::post('categorias/registrar', [CategoriaController::class, 'store ']);
    Route::put('categorias/{id} ', [CategoriaController::class, 'update']);
    Route::get('categorias/{id}', [CategoriaController::class, 'show']);
    Route::get('categorias/activar/{id}', [CategoriaController::class, 'activar']);
    Route::get('categorias/desactivar/{id}', [CategoriaController::class, 'desactivar']);

 /** rutas articulos */
 Route::get('articulos', [ArticulosController::class, 'index']);
 Route::post('articulos', [ArticulosController::class, 'store']);
 Route::get('articulos/{id}', [ArticulosController::class, 'show']);
 Route::put('articulos/{id}', [ArticulosController::class, 'update']);

 /**rutas clientes */
 Route::get('clientes', [ClientesController::class, 'index']);
 Route::post('clientes', [ClientesController::class, 'store']);
 Route::get('clientes/{id}', [ClientesController::class, 'show']);
 Route::put('clientes/{id}', [ClientesController::class, 'update']);

 /**mascotas */
 Route::get('mascotas', [MascotasController::class, 'index']);
 Route::post('mascotas', [MascotasController::class, 'store']);
 Route::get('mascotas/{id}', [MascotasController::class, 'show']);
 Route::put('mascotas/{id}', [MascotasController::class, 'update']);









});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
