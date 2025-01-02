<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CopropietarioController;
use App\Http\Controllers\EmpleadosController;
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

    // propiedades
    Route::get('/propiedades/pagos/{id_propiedad}', [PagoPropiedadController::class, 'getPagosPropiedad']);

    // empleados
    Route::post('/empleados/contratar', [EmpleadosController::class, 'contratarEmpleado']);
    Route::post('/empleados/pagar', [EmpleadosController::class, 'pagarEmpleado']);

    // solo el admin puede ver los pagos de los empleados
    Route::get('/empleados/pagos', [EmpleadosController::class, 'pagosPorEmpleado']);
    // solos los admin y el empleado pueden ver sus pagos
    Route::get('/empleados/pagos/{id}', [EmpleadosController::class, 'pagosPorEmpleadoId']);

    Route::get('/empleados/despedir/{id}', [EmpleadosController::class, 'despedirEmpleado']);
});
