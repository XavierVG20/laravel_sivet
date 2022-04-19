<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ArticulosController;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\MascotasController;
use App\Http\Controllers\Api\ProveedoresController;
use App\Http\Controllers\Api\CitasController;
use App\Http\Controllers\Api\HistorialController;
use App\Http\Controllers\Api\VentasController;
use App\Http\Controllers\Api\DetalleVentasController;
use App\Http\Controllers\Api\IngresosController;
use App\Http\Controllers\Api\DetalleIngresosController;




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

 /**proveedores */
 Route::get('proveedores',[ProveedoresController::class, 'index']);
 Route::post('proveedores',[ProveedoresController::class, 'store']);
 Route::get('proveedores/{id}',[ProveedoresController::class, 'show']);
 Route::put('proveedores/{id}',[ProveedoresController::class, 'update']);


/**citas */
Route::get('citas', [CitasController::class, 'index']);
Route::post('citas', [CitasController::class, 'store']);
Route::get('citas/{id}', [CitasController::class, 'show']);
Route::put('citas/{id}', [CitasController::class, 'update']);

/**historiales */

Route::get('historial', [HistorialController::class, 'index']);
Route::post('historial', [HistorialController::class, 'store']);
Route::get('historial/{id}', [HistorialController::class, 'show']);
Route::put('historial/{id}', [HistorialController::class, 'update']);

/**ventas */
Route::get('venta', [VentasController::class, 'index']);
Route::post('venta', [VentasController::class, 'store']);
Route::get('venta/{id}', [VentasController::class, 'show']);
Route::put('venta/{id}', [VentasController::class, 'update']);


/**detalle Ventas */

Route::get('detalle-venta', [DetalleVentasController::class, 'index']);
Route::post('detalle-venta', [DetalleVentasController::class, 'store']);
Route::get('detalle-venta/{id}', [DetalleVentasController::class, 'show']);
Route::put('detalle-venta/{id}', [DetalleVentasController::class, 'update']);
Route::delete('detalle-venta/{id}', [DetalleVentasController::class, 'destroy']);

/**ingresos */
Route::get('ingreso', [ IngresosController::class, 'index']);
Route::post('ingreso', [IngresosController::class, 'store']);
Route::get('ingreso/{id}', [IngresosController::class, 'show']);
Route::put('ingreso/{id}', [IngresosController::class, 'update']);


/**detalle ingresos */

Route::get('detalle-ingreso', [DetalleIngresosController::class, 'index']);
Route::post('detalle-ingreso', [DetalleIngresosController::class, 'store']);
Route::get('detalle-ingreso/{id}', [DetalleIngresosController::class, 'show']);
Route::put('detalle-ingreso/{id}', [DetalleIngresosController::class, 'update']);
Route::delete('detalle-ingreso/{id}', [DetalleIngresosController::class, 'destroy']);





});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
