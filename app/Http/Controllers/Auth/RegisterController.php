<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{  // Función register que se ejecuta cuando se recibe una solicitud de registro
    public function register(Request $request)
    {   //Recibe correo, nombre, contraseña
        $data = $request->validate([
            'name' => 'required|string|max:255',  //Es obligatoriio y cadena 255
            'email' => 'required|email|unique:users,email', //Es obligatorio y unico en la tabla users
            'password' => 'required|string|min:6|confirmed', //Es obligatorio y minimo 6 cacracters y se debe confirmar
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Se encripta la contraseña
            'rol' => 'Cliente',
        ]);

        //Se genera el token Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;
       // Mensaje de exito
        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'user' => $user,
            'token' => $token,
        ], 201);
    }
}
