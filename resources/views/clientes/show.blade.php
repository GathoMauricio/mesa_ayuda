@extends('adminlte::page')

@section('title', $cliente->razon_social . ' | ' . Auth::user()->rol->nombre_rol)

@section('content')
    <div class="container contact-form">
        <div class="contact-image">
            @if ($cliente->imagen == 'cliente.png')
                <img src="{{ asset('img/cliente.png') }}" alt="cliente-{{ $cliente->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @else
                <img src="{{ asset('storage/img/clientes/' . $cliente->imagen) }}" alt="cliente-{{ $cliente->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @endif
        </div>
        <form>
            <h3>Cliente {{ $cliente->razon_social }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area" class="text-primary">Razón social</label>
                        <p>{{ $cliente->razon_social }}</p>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class="text-primary">RFC</label>
                        <p>{{ $cliente->rfc }}</p>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="text-primary">Dirección</label>
                        <p>{{ $cliente->direccion }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sintoma" class="text-primary">Imagen</label>
                        <p>
                            @if ($cliente->imagen == 'cliente.png')
                                <img src="{{ asset('img/cliente.png') }}" alt="cliente-{{ $cliente->imagen }}"
                                    class="p-1" style="width:200px;pxbackground-color:rgb(247, 240, 240);">
                            @else
                                <img src="{{ asset('storage/img/clientes/' . $cliente->imagen) }}"
                                    alt="cliente-{{ $cliente->imagen }}" class="p-1"
                                    style="width:200px;background-color:rgb(247, 240, 240);">
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <table class="table ">
            <thead>
                <tr>
                    <th>Nombre del administrador</th>
                    <td>
                        {{ $administrador->nombre }}
                        {{ $administrador->apaterno }}
                        {{ $administrador->amaterno }}
                    </td>
                </tr>
                <tr>
                    <th>Email del administrador</th>
                    <td>{{ $administrador->email }}</td>
                </tr>
            </thead>
        </table>
        <hr>
        <h5 class="text-center text-primary">EMPLEADOS</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Estatus</th>
                    <th>Rol</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfomo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->getStatus() }}</td>
                        <td>{{ $empleado->rol->nombre_rol }}</td>
                        <td>{{ $empleado->nombre }} {{ $empleado->aoaterno }} {{ $empleado->amaterno }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                    </tr>
                @endforeach
                @if (count($empleados) <= 0)
                    <tr>
                        <td colspan="5">
                            <div class="alert alert-info text-center" role="alert">
                                No se encontraron registros.
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
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
            background: #dc3545;
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
