@extends('layouts.app')

@section('css')
    <style>
        /* CSS personalizado para la página */
        .description h1 {
            font-size: 2.5rem;
            color: #0e2238; /* Azul Oscuro */
        }

        .description p {
            font-size: 1.25rem;
            color: #555; /* Gris Medio */
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            color: #0e2238; /* Azul Oscuro */
        }

        .card-text {
            font-size: 2.5rem;
            color: #0e2238; /* Azul Oscuro */
        }

        .card-icon {
            font-size: 3rem;
            color: #0e2238; /* Azul Oscuro */
            margin-bottom: 1rem;
        }

        .card-total {
            background-color: #93C5FD; /* Azul Claro */
            color: white;
        }

        .card-activos {
            background-color: #34D399; /* Verde */
            color: white;
        }

        .card-inactivos {
            background-color: #F87171; /* Rojo */
            color: white;
        }

        .chart-container {
            position: relative;
            height: 40vh;
            width: 100%;
            margin: auto;
        }

        .chart-wrapper {
            overflow-x: auto;
        }
    </style>
@endsection

{{-- @section('title', 'Inicio') --}}

@section('content')

    <div class="container mt-4">
        <div class="row">
            <!-- Card 1: Total de Empleados -->
            <div class="col-md-4 mb-4">
                <div class="card card-total">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users card-icon"></i>
                        <h5 class="card-title">Total de Empleados</h5>
                        <p class="card-text">232</p>
                    </div>
                </div>
            </div>
            <!-- Card 2: Empleados Activos -->
            <div class="col-md-4 mb-4">
                <div class="card card-activos">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-check card-icon"></i>
                        <h5 class="card-title">Empleados Activos</h5>
                        {{-- <p class="card-text">{{ $empleadosActivos }}</p> --}}
                        <p class="card-text">131</p>
                    </div>
                </div>
            </div>
            <!-- Card 3: Empleados Inactivos -->
            <div class="col-md-4 mb-4">
                <div class="card card-inactivos">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-times card-icon"></i>
                        <h5 class="card-title">Empleados Inactivos</h5>
                        <p class="card-text">23</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Distribución de Empleados</h5>
                        <div class="chart-wrapper">
                            <div class="chart-container">
                                <canvas id="employeeDistributionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Empleados Activos vs Inactivos</h5>
                        <div class="chart-wrapper">
                            <div class="chart-container">
                                <canvas id="activeInactiveChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Datos para los gráficos
        const employeeDistributionData = {
            labels: ['Departamento A', 'Departamento B', 'Departamento C', 'Departamento D'],
            datasets: [{
                label: 'Empleados',
                data: [50, 70, 40, 72],
                backgroundColor: ['#93C5FD', '#34D399', '#F87171', '#FBBF24'],
                borderColor: ['#3B82F6', '#10B981', '#EF4444', '#F59E0B'],
                borderWidth: 1
            }]
        };

        const activeInactiveData = {
            labels: ['Activos', 'Inactivos'],
            datasets: [{
                label: 'Empleados',
                data: [131, 23],
                backgroundColor: ['#34D399', '#F87171'],
                borderColor: ['#10B981', '#EF4444'],
                borderWidth: 1
            }]
        };

        // Configuración de los gráficos
        const configEmployeeDistribution = {
            type: 'bar',
            data: employeeDistributionData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de Empleados por Departamento'
                    }
                }
            }
        };

        const configActiveInactive = {
            type: 'pie',
            data: activeInactiveData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Empleados Activos vs Inactivos'
                    }
                }
            }
        };

        // Inicialización de los gráficos
        window.onload = function() {
            const ctxEmployeeDistribution = document.getElementById('employeeDistributionChart').getContext('2d');
            new Chart(ctxEmployeeDistribution, configEmployeeDistribution);

            const ctxActiveInactive = document.getElementById('activeInactiveChart').getContext('2d');
            new Chart(ctxActiveInactive, configActiveInactive);
        };
    </script>
@endsection