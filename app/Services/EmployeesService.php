<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EmployeesService
{
    public function getAllEmployees()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');
        if ($response->successful()) {
            return $response->json();
        }
        return [
            'error' => true,
            'message' => 'No se pudo obtener los empleados',
            'code' => $response->status()
        ];
    }
}