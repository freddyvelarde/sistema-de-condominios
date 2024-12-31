<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CopropietarioController;
use App\Http\Controllers\PagoPropiedadController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\PropietariosController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('/propietario', [PropietariosController::class, 'me']);
    Route::post('/propiedades/crear', [PropiedadesController::class, 'crearDepartamento']);



    // as copropietario
    Route::post('/propiedades/pagar', [PagoPropiedadController::class, 'pagarPropiedad']);
    Route::post('/propiedades/alquilar', [CopropietarioController::class, 'alquilarPropiedad']);
    Route::get('/propiedades', [CopropietarioController::class, 'propiedades']);

});
