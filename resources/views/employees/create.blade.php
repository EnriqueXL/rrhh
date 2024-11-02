@extends('layouts.app')

@section('css')
    <style>
        /* css custom page */
        /* Estilos adicionales para el formulario */
        .form-group {
            margin-bottom: 1rem;
        }

        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Ocultar el formulario inicialmente */
        /* #employee-form {
                display: none;
            } */
    </style>
@endsection

@section('title', 'Crear empleado')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Subir Archivo RAR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="upload-form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="rar-file" class="form-label">Seleccione un archivo RAR para extraer los datos con
                                IA.</label>
                            <input type="file" class="form-control" id="rar-file" name="rar-file" accept=".rar"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de empleado -->
    <div id="employee-form">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                            placeholder="Nombre">
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno:</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"
                            value="{{ old('apellido_materno') }}" placeholder="Apellido Materno">
                        @error('apellido_materno')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno:</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"
                            value="{{ old('apellido_paterno') }}" placeholder="Apellido Paterno">
                        @error('apellido_paterno')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="domicilio">Domicilio:</label>
                        <input type="domicilio" name="domicilio" id="domicilio" class="form-control"
                            value="{{ old('domicilio') }}" placeholder="Domicilio">
                        @error('domicilio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="ciudad" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}"
                            maxlength="10" placeholder="Ciudad">
                        @error('ciudad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" class="form-control"
                            value="{{ old('estado') }}" placeholder="Dirección">
                        @error('estado')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpFiscal">Código Postal Fiscal <span>(Este dato debe coincidir con la constancia de
                                situación fiscal, emitida por el SAT)</span>:</label>
                        <input type="text" name="" id="cpFiscal" class="form-control"
                            value="{{ old('cpFiscal') }}">
                        @error('cpFiscal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                        <input type="text" name="" id="fechaNacimiento" class="form-control"
                            value="{{ old('fechaNacimiento') }}">
                        @error('fechaNacimiento')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rfc">RFC:</label>
                        <input type="text" name="rfc" id="rfc" class="form-control"
                            value="{{ old('rfc') }}">
                        @error('rfc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="curp">CURP:</label>
                        <input type="text" name="curp" id="curp" class="form-control"
                            value="{{ old('curp') }}">
                        @error('curp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label fof="edad">Edad:</label>
                        <input type="text" name="edad" id="edad" class="form-control"
                            value="{{ old('edad') }}">
                        @error('edad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Correo">Correo:</label>
                        <input type="text" name="correo" id="correo" class="form-control"
                            value="{{ old('correo') }}">
                        @error('correo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Estado Civil">Estado Civil:</label>
                        <select name="estadoCivil" id="estadoCivil" class="form-control">
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="viudo">Viudo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Nacionalidad">Nacionalidad:</label>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control"
                            value="{{ old('nacionalidad') }}">
                        @error('nacionalidad')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Enviar</button>
                    <a href="{{ route('home') }}" class="btn btn-light">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar el modal al cargar la página
            var uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
            uploadModal.show();

            // Manejar el envío del formulario de subida
            document.getElementById('upload-form').addEventListener('submit', function(e) {
                e.preventDefault();
                // lógica para procesar el archivo RAR
                // ocultar el modal y mostramos el formulario
                uploadModal.hide();
                document.getElementById('employee-form').style.display = 'block';
            });
        });
    </script>
@endsection
