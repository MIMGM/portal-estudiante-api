<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) { 
    // validamos los datos
    $credentials = $request->validate([ 
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'confirm_password' => 'required',
    ]);

    //Encriptamos el password
    $credentials['password'] = Hash::make($credentials['password']);

    //crear usuario nuevo
    $usuario = User::create($credentials);

    //generar token
    $token = $usuario->createToken('TokenUsuario')->plainTextToken;

    //devolver respuesta Esto es un Standarde formato de respuesta
    $respuesta = [ 
        'data' => [ 
            'usuario' => $usuario,
            'token' => $token
        ],
    ]; 

    return response()->json($respuesta);
    }
}
