<?php

namespace App\Http\Controllers;

use App\Models\Copropietario;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopropietarioController extends Controller
{
    public function alquilarPropiedad(Request $request)
    {
        $request->validate([
            'id_propiedad' => 'required|string',
        ]);

        $user = Auth::user();

        $propiedad = Propiedad::find($request->id_propiedad);
        $copropietario = Copropietario::where('id_usuario', $user->id)->first();

        if ($propiedad && $copropietario) {
            $propiedad->estado = 'ocupado';
            $propiedad->copropietario()->associate($copropietario);
            $propiedad->save();
        }


        return response()->json(['message' => 'Alquiler realizado', 'propiedad' => $propiedad]);
    }

    public function propiedades()
    {

        $user = Auth::user();
        $copropietario = Copropietario::where('id_usuario', $user->id)->first();

        $propiedades = Propiedad::where('id_copropietario', $copropietario-> id)->get();

        return response()->json(['propiedades' => $propiedades]);
    }


}
