@extends('adminlte::page')

@section('title', 'Nuevo empleado | ' . Auth::user()->rol->nombre_rol)

@section('content')
    <div class="container contact-form">
        <div class="contact-image">
            @if ($empleado->imagen == 'perfil.png')
                <img src="{{ asset('img/perfil.png') }}" alt="empleado-{{ $empleado->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @else
                <img src="{{ asset('storage/img/empleados/' . $empleado->imagen) }}" alt="empleado-{{ $empleado->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @endif
        </div>
        <form action="{{ url('empleados') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Información Empleado</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rol_id" class="text-primary">Rol</label>
                        {{ $empleado->rol->nombre_rol }}

                    </div>
                    <div class="form-group">
                        <label for="telefono" class="text-primary">Teléfono</label>
                        {{ $empleado->telefono }}
                    </div>

                    <div class="form-group">
                        <label for="direccion" class="text-primary">Dirección</label>
                        {{ $empleado->direccion }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="text-primary">Email</label>
                        {{ $empleado->email }}
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="text-primary">Nombre(s)</label>
                        {{ $empleado->nombre }}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="apaterno" class="text-primary">A. Paterno</label>
                                {{ $empleado->apaterno }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amaterno" class="text-primary">A. Materno</label>
                                {{ $empleado->amaterno }}
                            </div>
                        </div>
                    </div>
                    <br>
                    {{--  <div class="row">
                        <div class="form-group">
                            <label for="password" class="text-primary">Contraseña</label>
                            <input type="password" placeholder="Contraeña" name="password" class="form-control" required>
                            @error('password')
                                <small>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="text-primary">Confirmar contraseña</label>
                            <input type="password" placeholder="Confirmación" name="password_confirmation"
                                class="form-control" required>
                            @error('password_confirmation')
                                <small>
                                    <strong class="text-danger">{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact btn-block" value="Guardar" />
                        </div>
                    </div>  --}}
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
        }

        .contact-form {
            background: #fff;
            margin-top: 10%;
            margin-bottom: 5%;
            width: 70%;
        }

        .contact-form .form-control,
        .form-select {
            border-radius: 1rem;
        }

        .contact-image {
            text-align: center;
        }

        .contact-image img {
            border-radius: 6rem;
            width: 11%;
            margin-top: -3%;
            {{--  transform: rotate(29deg);  --}}
        }

        .contact-form form {
            padding: 10%;
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {

            margin-top: -10%;
            text-align: center;
            color: #0062cc;
        }

        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #4c69eb;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .btnContactSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
        }
    </style>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
