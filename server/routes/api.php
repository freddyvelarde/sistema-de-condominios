<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropietariosController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    return response()->json(['hello' => 'world']);
});

Route::post('/users', [AuthController::class, 'store']);
Route::get('/users/signup', [PropietariosController::class, 'index']);
Route::post('/users/login', [AuthController::class, 'login']);
