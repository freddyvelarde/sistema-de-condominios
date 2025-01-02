<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Pago;
use App\Models\PagoEmpleado;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpleadosController extends Controller
{
    public function pagosPorEmpleado()
    {
        $user = Auth::user();
        if ($user->rol != 'admin') {
            return response()->json(['message' => 'No tienes permisos para ver los pagos de los empleados.'], 403);
        }

        $pagos = PagoEmpleado::all();
        return response()->json(['pagos' => $pagos], 200);
    }
    public function pagosPorEmpleadoId($id)
    {
        $user = Auth::user();

        // admin and empleado can see
        if ($user->rol != 'admin' && $user->id != $id) {
            return response()->json(['message' => 'No tienes permisos para ver los pagos de los empleados.'], 403);
        }

        $pagos = PagoEmpleado::where('id_usuario', $id)->get();
        return response()->json(['pagos' => $pagos], 200);
    }

    public function pagarEmpleado(Request $request)
    {
        $user = Auth::user();
        if ($user->rol != 'admin') {
            return response()->json(['message' => 'No tienes permisos para pagar empleados.'], 403);
        }

        $request->validate([
            'monto' => 'required|numeric',
            'metodo' => 'required|string|in:efectivo,qr',
            'id_usuario' => 'required|numeric',
        ]);

        $contrato = Contrato::where('id_usuario', $request->id_usuario)->first();
        if (!$contrato) {
            return response()->json(['message' => 'Contrato no encontrado, no existe contrato para cancelar al empleado'], 404);
        }
        if ($contrato->estado != 'activo') {
            return response()->json(['message' => 'El contrato no esta activo, no se puede realizar el pago'], 400);
        }

        $pago = Pago::create([
            'monto' => $request->monto,
            'tipo' => 'gasto',
            'categoria' => 'sueldo',
            'metodo' => $request->metodo,
            'estado' => 'pagado',
        ]);
        PagoEmpleado::create([
           'id_pago' => $pago->id,
           'id_usuario' => $contrato->id_usuario,
        ]);

        // $contrato->pagos()->create([
        //     'monto' => $request->monto,
        //     'fecha' => $request->fecha,
        // ]);

        return response()->json(['message' => 'Pago realizado.', 'pago', $pago], 201);
    }

    public function contratarEmpleado(Request $request)
    {

        $user = Auth::user();
        if ($user->rol != 'admin') {
            return response()->json(['message' => 'No tienes permisos para contratar empleados.'], 403);
        }

        $request->validate([
            'ci_empleado' => 'required|string|unique:usuarios,ci',
            'fecha_final' => 'required|date',
            'tipo' => 'required|string|in:indefinido,temporal,por obra',
            'sueldo_base' => 'required|numeric',
            'cargo' => 'required|string|in:limpieza,seguridad',
            'estado' => 'required|string|in:terminado,activo,suspendido',

            // 'email' => 'required|string|unique:usuarios',
            'nombres' => 'required|string',
            'apellido_pat' => 'required|string',
            // 'password' => 'required|string',
        ]);

        $empleado = Usuarios::create([
            'ci' => $request->ci_empleado,
            'nombres' => $request->nombres,
            'apellido_pat' => $request->apellido_pat,
            'rol' => 'empleado',
            'password' => Hash::make($request->ci_empleado),
        ]);


        $contrato = Contrato::create([
            'id_usuario' => $empleado->id,
            'ficha_inicio' => now(),
            'fecha_final' => $request->fecha_final,
            'tipo' => $request->tipo,
            'sueldo_base' => $request->sueldo_base,
            'cargo' => $request->cargo,
            'estado' => $request->estado,
        ]);
        $token_empleado = Auth::login($user);


        return response()->json(['message' => 'Contrato creado.', 'contrato' => $contrato, 'empleado' => $empleado, 'token_empleado' => $token_empleado], 201);

    }
    public function despedirEmpleado($id_usuario)
    {
        $user = Auth::user();
        if ($user->rol != 'admin') {
            return response()->json(['message' => 'No tienes permisos para despedir empleados.'], 403);
        }

        $contrato = Contrato::where('id_usuario', $id_usuario)->first();
        if (!$contrato) {
            return response()->json(['message' => 'Contrato no encontrado, no existe contrato para cancelar al empleado'], 404);
        }

        $contrato->update([
            'fecha_final' => now(),
            'estado' => 'terminado',
        ]);

        return response()->json(['message' => 'Contrato actualizado, empleado fue despedido', 'contrato' => $contrato], 200);
    }
}
