<?php

namespace App\Http\Controllers;

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
        if (!$propiedad) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        if ($propiedad && $user) {
            $propiedad->estado = 'ocupado';
            $propiedad->copropietario()->associate($user);
            $propiedad->save();
        }


        return response()->json(['message' => 'Alquiler realizado', 'propiedad' => $propiedad, 'user' => $user]);
    }

    public function propiedades()
    {

        $user = Auth::user();

        $propiedades = Propiedad::where('id_usuario', $user-> id)->get();

        return response()->json(['propiedades' => $propiedades]);
    }


}
