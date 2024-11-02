<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Llamada al servicio de autenticación
        $response = $this->loginService->login($request->email, $request->password);

        if (isset($response['error']) && $response['error']) {
            return response()->json(['message' => $response['message']], $response['code']);
        }

        // Aquí manejamos el token (asumiendo que la API regresa un token de autenticación)
        $token = $response['token']; // Ajusta si es otro campo.

        // Autenticación del usuario en Laravel (si es necesario)
        // Aquí podrías guardar datos en la sesión o en caché para validar con `auth` middleware

        return response()->json(['token' => $token, 'message' => 'Inicio de sesión exitoso']);
    }

    public function logout()
    {
        // Opcionalmente, manejar el cierre de sesión aquí
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}