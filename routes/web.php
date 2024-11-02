<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Obtener todos los empleados (datatable)
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Mostrar un empleado
Route::get('/employees/{employee}/show', [EmployeeController::class, 'show'])->name('employees.show');

// Registrar empleados
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Editar empleados
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

//Eliminar empleado
Route::delete('/employees/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// Obtener todos los empleados para la API
Route::get('api/employees', [EmployeeController::class, 'apiAllEmployees'])->name('employees.api');

//Obtener un empleado para la API
Route::get('api/employees/{employee}', [EmployeeController::class, 'getEmployeeForApi'])->name('employees.api.show');

// Crear un empleado para la API
Route::post('api/employees', [EmployeeController::class, 'storeEmployeeForApi'])->name('employees.api.store');

// Actualizar un empleado para la API
Route::put('api/employees/{employee}', [EmployeeController::class, 'updateEmployeeForApi'])->name('employees.api.update');

// Eliminar un empleado para la API
Route::delete('api/employees/{employee}', [EmployeeController::class, 'destroyEmployeeForApi'])->name('employees.api.destroy');


require __DIR__.'/auth.php';
