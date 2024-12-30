<?php

namespace App\Http\Controllers;

use App\Models\Propietario;

// use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    public function index()
    {
        $propietatios = Propietario::with('datosUsuario')->get();

        if ($propietatios->isEmpty()) {
            return response()->json([
                'mensaje' => "No hay propietarios registrados"
            ], 404);
        }

        return response()->json($propietatios, 200);
    }
}
