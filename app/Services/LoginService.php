<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class LoginService
{
    protected $apiUrl = 'https://www.micro-tec.com.mx/pagina/nomina_mgr/api_rh/api_rh.php';

    public function login($user, $pass)
    {
        $response = Http::asForm()->post($this->apiUrl, [
            'function' => 'login_rh',
            'user' => $user,
            'pass' => $pass
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => true,
            'message' => 'No se pudo realizar el inicio de sesión.',
            'code' => $response->status()
        ];
    }
}
