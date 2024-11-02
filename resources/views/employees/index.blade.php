@extends('layouts.app')

@section('css-datatables')

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
@endsection

@section('css')
    <style>
        /* CSS custom page */
        thead{
            background-color: #f0f4f8;

        }
    </style>
@endsection

{{-- @section('title', 'Listado de empleados') --}}

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Listado de empleados</li>
@endsection

@section('content')

    <div class="table-responsive">
        <table class="table table-hover table-sm text-center" id="allUsersTable">
            <thead>
                <tr>
                    <th class="text-center">Folio</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Created at</th>
                    <th class="text-center">Visualizar</th>
                </tr>
            </thead>
        </table>

    </div>
@endsection

@section('js-datatables')

    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/2.1.7/i18n/es-MX.json"></script>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#allUsersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employees.index') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'acciones',
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return data;
                        }
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.1.7/i18n/es-MX.json'
                }
            });
        });

       
    </script>
@endsection
