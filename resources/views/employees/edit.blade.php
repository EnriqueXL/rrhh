@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/pages/view-edit-show.css') }}" rel="stylesheet">
@endsection

{{-- @section('title', 'Editar empleado') --}}

@section('breadcrumb')
    <li class="breadcrumb-item"><a class="breadcrumb-now" href="{{ route('employees.index') }}">Listado de empleados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar empleado</li>
@endsection

@section('nav-menu')
    <a href="{{ route('employees.index') }}" class="navbar-brand"><i class="fas fa-chevron-left"></i></a>
    <a href="{{ route('employees.show', $employee->id) }}" class="navbar-brand"><i class="fas fa-eye"></i></a>


    <!-- Enlace para eliminar -->
    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST"
        class="d-inline">
        @csrf
        @method('DELETE')
        <a href="#" class="navbar-brand" onclick="confirmDelete({{ $employee->id }});">
            <i class="fas fa-trash-alt"></i>
        </a>
    </form>
@endsection

@section('content')
    <!-- Progress Bar -->
    <div class="progress-bar-container">
        <div class="step active" id="step1"></div>
        <div class="step" id="step2"></div>
        <div class="step" id="step3"></div>
    </div>
    <div class="progress-bar-labels">
        <div id="labelStep1" class="active">Datos personales</div>
        <div id="labelStep2">Datos de asignación de la empresa</div>
        <div id="labelStep3">Datos médicos</div>
    </div>
    <!-- Formulario 1: Datos personales -->

    <div class="step-form active" id="formStep1">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm"
                        value="{{ old('nombre') }}" placeholder="Nombre">
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control form-control-sm"
                        value="{{ old('apellido_materno') }}" placeholder="Apellido Materno">
                    @error('apellido_materno')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control form-control-sm"
                        value="{{ old('apellido_paterno') }}" placeholder="Apellido Paterno">
                    @error('apellido_paterno')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="domicilio" class="form-label">Domicilio:</label>
                    <input type="text" name="domicilio" id="domicilio" class="form-control form-control-sm"
                        value="{{ old('domicilio') }}" placeholder="Domicilio">
                    @error('domicilio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="ciudad" class="form-label">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" class="form-control form-control-sm"
                        value="{{ old('ciudad') }}" maxlength="10" placeholder="Ciudad">
                    @error('ciudad')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" name="estado" id="estado" class="form-control form-control-sm"
                        value="{{ old('estado') }}" placeholder="Estado">
                    @error('estado')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="NSS" class="form-label">Número de Seguro Social:</label>
                    <input type="text" name="NSS" id="NSS" class="form-control form-control-sm"
                        value="{{ old('NSS') }}">
                    @error('NSS')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                        class="form-control form-control-sm" value="{{ old('fechaNacimiento') }}">
                    @error('fechaNacimiento')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="rfc" class="form-label">RFC:</label>
                    <input type="text" name="rfc" id="rfc" class="form-control form-control-sm"
                        value="{{ old('rfc') }}">
                    @error('rfc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="curp" class="form-label">CURP:</label>
                    <input type="text" name="curp" id="curp" class="form-control form-control-sm"
                        value="{{ old('curp') }}">
                    @error('curp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="text" name="edad" id="edad" class="form-control form-control-sm"
                        value="{{ old('edad') }}">
                    @error('edad')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" name="correo" id="correo" class="form-control form-control-sm"
                        value="{{ old('correo') }}">
                    @error('correo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="estadoCivil" class="form-label">Estado Civil:</label>
                    <select name="estadoCivil" id="estadoCivil" class="form-select form-select-sm">
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                    <input type="text" name="nacionalidad" id="nacionalidad" class="form-control form-control-sm"
                        value="{{ old('nacionalidad') }}">
                    @error('nacionalidad')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="sexo" class="form-label">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-select form-select-sm">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">No binario</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="cpFiscal" class="form-label">Código Postal Fiscal <span>(Debe coincidir con la constancia
                            del SAT)</span>:</label>
                    <input type="text" name="cpFiscal" id="cpFiscal" class="form-control form-control-sm"
                        value="{{ old('cpFiscal') }}">
                    @error('cpFiscal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form>
    </div>



    <!-- Formulario 2: Expediente -->
    <div class="step-form" id="formStep2">
        {{-- <h4 class="step-title text-center inactive">Expediente</h4> --}}
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label for="fechaVencimientoContrato" class="form-label">Fecha de Vencimiento de Contrato:</label>
                <input type="date" name="fechaVencimientoContrato" id="fechaVencimientoContrato"
                    class="form-control form-control-sm" value="{{ old('fechaVencimientoContrato') }}">
            </div>
            <div class="col-md-4">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" name="puesto" id="puesto" class="form-control form-control-sm"
                    value="{{ old('puesto') }}">
                @error('puesto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="sucursal" class="form-label">Sucursal / Adscripción:</label>
                <input type="text" name="sucursal" id="sucursal" class="form-control form-control-sm"
                    value="{{ old('sucursal') }}">
                @error('sucursal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">

            <div class="col-md-4">
                <label for="regionDeLaSucursal" class="form-label">Región de la Sucursal:</label>
                <input type="text" name="regionDeLaSucursal" id="regionDeLaSucursal"
                    class="form-control form-control-sm" value="{{ old('regionDeLaSucursal') }}">
                @error('regionDeLaSucursal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="ciudadDeLaSucursal" class="form-label">Ciudad de la Sucursal Asignada:</label>
                <input type="text" name="ciudadDeLaSucursal" id="ciudadDeLaSucursal"
                    class="form-control form-control-sm" value="{{ old('ciudadDeLaSucursal') }}">
                @error('ciudadDeLaSucursal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="estadoDeLaSucursal" class="form-label">Estado de la Sucursal Asignada:</label>
                <input type="text" name="estadoDeLaSucursal" id="estadoDeLaSucursal"
                    class="form-control form-control-sm" value="{{ old('estadoDeLaSucursal') }}">
                @error('estadoDeLaSucursal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label for="direccionDeLaSucursal" class="form-label">Dirección de la Sucursal:</label>
                <input type="text" name="direccionDeLaSucursal" id="direccionDeLaSucursal"
                    class="form-control form-control-sm" value="{{ old('direccionDeLaSucursal') }}">
                @error('direccionDeLaSucursal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="salarioQuincenal" class="form-label">Salario Quincenal:</label>
                <input type="text" name="salarioQuincenal" id="salarioQuincenal" class="form-control form-control-sm"
                    value="{{ old('salarioQuincenal') }}">
                @error('salarioQuincenal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="OCR" class="form-label">OCR:</label>
                <input type="text" name="OCR" id="OCR" class="form-control form-control-sm"
                    value="{{ old('OCR') }}">
                @error('OCR')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">

            <div class="col-md-4">
                <label for="tipoDePago" class="form-label">Tipo de Pago:</label>
                <input type="text" name="tipoDePago" id="tipoDePago" class="form-control form-control-sm"
                    value="{{ old('tipoDePago') }}">
                @error('tipoDePago')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>


    <!-- Formulario 3: Datos médicos -->
    <div class="step-form" id="formStep3">
        {{-- <h4 class="step-title text-end inactive">Datos médicos</h4> --}}
        <div class="mb-4">
            <label for="seguro" class="form-label">Número de seguro</label>
            <input type="text" id="seguro" class="form-control" placeholder="Número de seguro social" required
                pattern="\d{11}">
        </div>
        <div class="mb-4">
            <label for="contactoEmergencia" class="form-label">Contacto de emergencia</label>
            <input type="text" id="contactoEmergencia" class="form-control" placeholder="Nombre del contacto"
                required pattern="[A-Za-z\s]{2,100}">
        </div>
    </div>

    <!-- Buttons -->
    <div class="d-flex justify-content-between mt-4">
        {{-- <a href="{{ route('employees.index') }}" class="btn btn-light">Cancelar</a> --}}
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary" id="prevStep">Volver</button>
        </div>
        <div>
            <button type="button" class="btn btn-primary" id="nextStep">Siguiente</button>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let currentStep = 1;

        const totalSteps = 3;
        const steps = {
            1: document.getElementById('step1'),
            2: document.getElementById('step2'),
            3: document.getElementById('step3'),
        };

        const forms = {
            1: document.getElementById('formStep1'),
            2: document.getElementById('formStep2'),
            3: document.getElementById('formStep3'),
        };

        const labels = {
            1: document.getElementById('labelStep1'),
            2: document.getElementById('labelStep2'),
            3: document.getElementById('labelStep3'),
        };

        const nextBtn = document.getElementById('nextStep');
        const prevBtn = document.getElementById('prevStep');

        function showStep(step) {
            // Ocultar todos los formularios y marcar títulos como inactivos
            for (let i = 1; i <= totalSteps; i++) {
                forms[i].classList.remove('active');
                steps[i].classList.remove('active');
                labels[i].classList.remove('active');
            }
            // Mostrar el formulario actual y marcar el título como activo
            forms[step].classList.add('active');
            steps[step].classList.add('active');
            labels[step].classList.add('active');

            // Mostrar u ocultar el botón de "Volver"
            if (step === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'inline-block';
            }
        }

        nextBtn.addEventListener('click', () => {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);

                // Cambiar texto del botón si es el último paso
                if (currentStep === totalSteps) {
                    nextBtn.innerText = 'Guardar';
                }
            } else {
                // Lógica para guardar datos de los formularios
                // const datosPersonales = {
                //     nombre: document.getElementById('nombre').value,
                //     fechaNacimiento: document.getElementById('fechaNacimiento').value,
                // };

                // const expediente = {
                //     numeroExpediente: document.getElementById('expediente').value,
                //     fechaIngreso: document.getElementById('fechaIngreso').value,
                // };

                // const datosMedicos = {
                //     numeroSeguro: document.getElementById('seguro').value,
                //     contactoEmergencia: document.getElementById('contactoEmergencia').value,
                // };

                // // Aquí puedes enviar estos datos al backend con un fetch o AJAX
                // console.log('Datos Personales:', datosPersonales);
                // console.log('Expediente:', expediente);
                // console.log('Datos Médicos:', datosMedicos);

                alert('Formularios guardados correctamente');
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);

                // Cambiar el texto del botón de nuevo a "Next"
                if (currentStep < totalSteps) {
                    nextBtn.innerText = 'Siguiente';
                }
            }
        });

        // Mostrar el primer formulario al cargar
        showStep(currentStep);

        // Confirmar eliminación
        function confirmDelete(employeeId) {
            if (confirm('¡Alerta!¿Estás seguro de que deseas eliminar este empleado?')) {
                document.getElementById('delete-form-' + employeeId).submit();
            }
        }
    </script>
@endsection
