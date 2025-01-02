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
            'monto' => 'required|numeric',
            'metodo' => 'required|string|in:qr,efectivo',
            'id_propiedad' => 'required|string',
        ]);
        $prop = Propiedad::where('id_usuario', $user->id)->where('id', $request->id_propiedad)->get();
        if (count($prop) == 0) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $pago = Pago::create([
            'monto' => $request->monto,
            'tipo' => 'ingreso',
            'fecha' => now(),
            'categoria' => 'cuota',
            'metodo' => $request->metodo,
        ]);
        PagoPropiedad::create([
            'id_usuario' => $user->id,
            'id_propiedad' => $request->id_propiedad,
            'id_pago' => $pago->id,
        ]);

        return response()->json(['message' => 'Pago realizado', 'pago' => $prop]);
    }

    public function getPagosPropiedad(String $id_propiedad)
    {
        $user = Auth::user();

        if (!$id_propiedad) {
            return response()->json(['message' => 'Propiedad no encontrada, necesitas pasar la `id_propiedad`.'], 404);
        }

        $prop = Propiedad::where('id_usuario', $user->id)->where('id', $id_propiedad)->get();
        if (count($prop) == 0) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        }

        $pagos = PagoPropiedad::where('id_propiedad', $id_propiedad)->get();

        for ($i = 0; $i < count($pagos); $i++) {
            $pagos[$i]->pago = Pago::where('id', $pagos[$i]->id_pago)->get();
        }
        return response()->json(['pagos' => $pagos, 'propiedad' => $prop, 'usuario' => $user]);
    }

}
