<?php

namespace App\Http\Controllers;

use App\Models\Copropietario;
use App\Models\DatosUsuario;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
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


        if ($request->rol === 'admin') {
            if ($request->email !== env('EMAIL_ADMIN1') && $request->email !== env('EMAIL_ADMIN2')) {
                return response()->json(['message' => "No puedes ser administrador." ]);
            }
        }

        $user = DatosUsuario::create([
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'nombres' => $request->nombres,
            'apellido_pat' => $request->apellido_pat,
            'apellido_mat' => $request->apellido_mat,
            'num_telefono' => $request->num_telefono,
            'rol' => $request->rol,
        ]);





        if ($user->rol === 'admin') {
            Propietario::create([
                'ci' => $request->ci,
                // 'fecha_nacimiento' => $request->fecha_nacimiento,
                'id_usuario' => $user->id
            ]);
        }
        if ($user->rol === 'copropietario') {
            Copropietario::create([
                'ci' => $request->ci,
                // 'fecha_nacimiento' => $request->fecha_nacimiento,
                'id_usuario' => $user->id
            ]);
        }


        $token = Auth::login($user);

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        $user = Auth::user();



        return response()->json([$user], 200);
    }

    public function refresh(Request $request)
    {
        $refreshToken = $request->input('refresh_token');

        try {
            $newToken = Auth::refresh($refreshToken);

            if (!$newToken) {
                return response()->json(['message' => 'Invalid refresh token'], 401);
            }

            return response()->json(['access_token' => $newToken]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Could not refresh token', 'error' => $e], 500);
        }
    }

}
