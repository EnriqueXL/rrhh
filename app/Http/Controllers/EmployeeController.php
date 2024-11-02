<?php

namespace App\Http\Controllers;

use App\Services\EmployeesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    private $employeesService;

    public function __construct(EmployeesService $employeesService)
    {
        $this->employeesService = $employeesService;
        $this->middleware('auth');
    }

    // Método para obtener todos los empleados
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = Employee::select('id', 'name', 'email', 'created_at');

            return datatables()->of($users)
                ->addColumn('acciones', function ($row) {
                    return '
                    <a href="' . route('employees.show', $row->id) . '" class="btn btn-sm">
                        <i class="fas fa-eye" aria-hidden="true"></i>
                    </a>
                ';
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }

        // Retorna la vista de todos los empleados
        return view('employees.index');
    }


    // Método para mostrar un empleado
    public function show($id)
    {
        // Busca el empleado por el id
        $employee = Employee::find($id);
        // Retorna la vista para mostrar un empleado
        return view('employees.show', compact('employee'));
    }

    // Método para crear un nuevo empleado
    public function create()
    {
        // Retorna la vista para crear un nuevo empleado
        return view('employees.create');
    }

    // Método para editar un empleado
    public function edit($id)
    {
        // Busca el empleado por el id
        $employee = Employee::find($id);
        // Retorna la vista para editar un empleado
        return view('employees.edit', compact('employee'));
    }

    //Eliminar un empleado
    public function destroy($id)
    {
        // Busca el empleado por el id
        $employee = Employee::find($id);

        // Elimina el empleado
        $employee->delete();
        // Retorna a la vista de todos los empleados
        return redirect()->route('employees.index');
    }

    public function apiAllEmployees(): JsonResponse
    {
        $employees = $this->employeesService->getAllEmployees();
        return response()->json($employees['results']);
    }
}
