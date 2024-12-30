<?php

namespace App\Http\Controllers;

use App\Models\DatosUsuario;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWT;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'email' => 'required|string|email',
        ]);
        if ($validator->fails()) {
            $res = ['message' => 'Error al validar usuario', 'error' => $validator->errors()];
            return response()->json([$res], 200);
        }
        try {
            $res = DatosUsuario::where('email', $request->email)->first();
            $passwordValid = Hash::check($request->password, $res->password);
            if (!$passwordValid) {
                return response()->json(['message' => 'El password no es correcto'], 200);
            }
            // JWT::
            return response()->json($res, 200);
        } catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'message' => 'Error creating user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'password' => 'required|string|min:8',
            'email' => 'required|string|email|unique:datos_usuarios,email',
            'nombres' => 'required|string|max:255',
            'apellido_pat' => 'required|string|max:255',
            'apellido_mat' => 'required|string|max:255',
            'num_telefono' => 'required|string',
            'rol' => 'required|string|in:admin,copropietario,empleado,directivo',
            'ci' => 'required_if:rol,admin|string',
            'fecha_nacimiento' => 'required_if:rol,admin|date'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al validar usuario',
                'error' => $validator->errors(),
            ];
            return response()->json([$data], 200);
        }

        try {

            $usuario = DatosUsuario::create([
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'nombres' => $request->nombres,
                'apellido_pat' => $request->apellido_pat,
                'apellido_mat' => $request->apellido_mat,
                'num_telefono' => $request->num_telefono,
                'rol' => $request->rol,
            ]);

            if ($request->rol === 'admin') {
                Propietario::create([
                    'ci' => $request->ci,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'id_usuario' => $usuario->id,
                ]);
            }


            return response()->json([
                'message' => 'User created successfully',
                'user' => $usuario->load('propietario')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error creating user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
