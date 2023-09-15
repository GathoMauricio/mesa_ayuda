@extends('adminlte::page')

@section('title', 'Editar empleado | ' . Auth::user()->rol->nombre_rol)

@section('content')
    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://i.ibb.co/KjH5bbc/mesa-ayuda.png" alt="rocket_contact" />
        </div>
        <form action="{{ url('empleados', $empleado->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3>Editar Empleado {{ $empleado->nombre }} {{ $empleado->apaterno }} {{ $empleado->amaterno }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rol_id" class="text-primary">Rol</label>
                        <select name="rol_id" value="{{ old('rol_id') }}" class="form-select" required>
                            <option value>--Seleccione una opción--</option>
                            @foreach ($roles as $rol)
                                @if ($empleado->rol_id == $rol->id)
                                    <option value="{{ $rol->id }}" selected>{{ $rol->nombre_rol }}</option>
                                @else
                                    <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('rol_id')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="text-primary">Teléfono</label>
                        <input type="text" placeholder="Teléfono (opcional)"
                            value="{{ old('telefono', $empleado->telefono) }}" name="telefono" class="form-control">
                        @error('telefono')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen" class="text-primary">Imagen (opcional)</label>
                        <input type="file" name="imagen" accept=".png, .jpg, .jpeg"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="text-primary">Dirección</label>
                        <textarea name="direccion" placeholder="Dirección (opcional)" class="form-control" rows="2">{{ old('direccion', $empleado->direccion) }}</textarea>
                        @error('direccion')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="text-primary">Email</label>
                        <input type="email" value="{{ $empleado->email }}" placeholder="Email" name="email"
                            class="form-control" disabled>
                        @error('email')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="text-primary">Nombre(s)</label>
                        <input type="text" value="{{ old('nombre', $empleado->nombre) }}" placeholder="Nombre"
                            name="nombre" class="form-control" required>
                        @error('nombre')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="apaterno" class="text-primary">A. Paterno Administrador</label>
                                <input type="text" value="{{ old('apaterno', $empleado->apaterno) }}"
                                    placeholder="Apellid paterno" name="apaterno" class="form-control">
                                @error('apaterno')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amaterno" class="text-primary">A. Materno Administrador</label>
                                <input type="text" value="{{ old('amaterno', $empleado->amaterno) }}"
                                    placeholder="Apellido materno" name="amaterno" class="form-control">
                                @error('amaterno')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        {{--  <div class="form-group">
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
                        </div>  --}}

                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact btn-block" value="Guardar" />
                        </div>
                    </div>
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
