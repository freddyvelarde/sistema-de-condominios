<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\PagoPropiedad;
use App\Models\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoPropiedadController extends Controller
{
    public function pagarPropiedad(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'price' => 'required|double',
            'metodo' => 'required|string|in:qr,efectivo',
            'id_propiedad' => 'required|string',
        ]);
        $prop = Propiedad::where('id_copropietario', $user->id)->where('id', $request->id_propiedad)->firstOrFail();
        if (!$prop) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $pago = Pago::create([
            'price' => $request->price,
            'tipo' => 'ingreso',
            'fecha' => now(),
            'categoria' => 'cuota',
            'metodo' => $request->metodo,
        ]);
        PagoPropiedad::create([
            'id_copropietario' => $user->id,
            'id_propiedad' => $request->id_propiedad,
            'id_pago' => $pago->id,
        ]);

        return response()->json(['message' => 'Pago realizado', 'pago' => $pago]);
    }
}
