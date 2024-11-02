<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        // Todas las rutas que usan este controlador requerirán autenticación
        $this->middleware('auth');
    }

    // Este controlador será invocable
    public function __invoke()
    {
        return view('home');
    }
}
