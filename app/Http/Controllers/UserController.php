<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function apiLogin(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (\Hash::check($request->password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    "estatus" => 0,
                    "mensaje" => "Inicio de sesión correcto.",
                    "auth_token" => $token,
                    "data" => $user,
                ]);
            } else {
                return response()->json([
                    "estatus" => 0,
                    "mensaje" => "Su contraseña de acceso es incorrecta.",
                ]);
            }
        } else {
            return response()->json([
                "estatus" => 0,
                "mensaje" => "El usuario no se encuentra registrado en el sistema.",
            ]);
        }
    }

    public function apiDatosUsuario()
    {
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Información del usuario.",
            "data" => auth()->user(),
        ]);
    }
}
