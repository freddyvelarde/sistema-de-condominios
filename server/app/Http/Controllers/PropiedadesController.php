<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropiedadesController extends Controller
{
    public function crearDepartamento(Request $request)
    {

        $user = Auth::user();

        if ($user->rol !== 'admin') {
            return response()->json(['message' => $user->nombres.' no es un administrador para crear un nuevo departamento.']);
        }

        $request->validate([
            'numero_propiedad' => 'string|required',
            'piso' => 'string|required',
            'num_habitaciones' => 'int|required',
            'estado' => 'required|string|in:ocupado,mantenimiento,desocupado',
            'tipo' => 'required|string|in:vivienda,oficina,local',
            // 'id_copropietario' => 'required|string'
        ]);


        $propiedad = Propiedad::create([
            'numero_propiedad' => $request->numero_propiedad,
            'piso' => $request->piso,
            'num_habitaciones' => $request->num_habitaciones,
            'estado' =>  $request->estado,
            'tipo' => $request->tipo,
            // 'id_copropietario' => $user->
        ]);
        return response() -> json(['message', 'Propiedad creada', 'propiedad' => $propiedad]);

    }
}
