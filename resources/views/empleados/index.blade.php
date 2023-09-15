@extends('adminlte::page')

@section('title', 'Empleados | ' . Auth::user()->rol->nombre_rol)

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    <a href="{{ url('empleados/create') }}" class="btn btn-primary">Nuevo empleado</a>
    <span class="float-right">{{ $empleados->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col"></th>
                <th scope="col">Rol</th>
                <th scope="col">Estatus</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email/Teléfono</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $key => $empleado)
                <tr>
                    <td>
                        @if ($empleado->imagen == 'perfil.png')
                            <img src="{{ asset('img/perfil.png') }}" alt="empleados-{{ $empleado->imagen }}" class="rounded"
                                style="width:60px;background-color:rgb(247, 240, 240);">
                        @else
                            <img src="{{ asset('storage/img/empleados/' . $empleado->imagen) }}" class="rounded"
                                alt="empleado-{{ $empleado->imagen }}"
                                style="width:60px;background-color:rgb(247, 240, 240);">
                        @endif
                    </td>
                    <td>{{ $empleado->rol->nombre_rol }}</td>
                    <td>{{ $empleado->getStatus() }}</td>
                    <td>
                        {{ $empleado->nombre }}
                        {{ $empleado->apaterno }}
                        {{ $empleado->amaterno }}
                    </td>
                    <td>
                        <a href="mailto:{{ $empleado->email }}">{{ $empleado->email }}</a>
                        <br>
                        <a href="tel:{{ $empleado->telefono }}">{{ $empleado->telefono }}</a>
                    </td>
                    <td>
                        <a href="{{ url('empleados', $empleado->id) }}" class="text-info">Abrir</a>
                        <br>
                        <a href="{{ url('empleados/' . $empleado->id . '/edit') }}"class="text-warning">Editar</a>
                        <br>
                        <form id="form_eliminar_empleado_{{ $empleado->id }}"
                            action="{{ url('empleados', $empleado->id) }}" method="POST">
                            @csrf
                            @method('DELETE')</form>
                        <a href="javascript:void(0)" onclick="eliminarEmpleado({{ $empleado->id }})"
                            class="text-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach

            @if (count($empleados) <= 0)
                <tr>
                    <td colspan="8">
                        <div class="alert alert-info text-center" role="alert">
                            No se encontraron registros.
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <span class="float-right">{{ $empleados->links() }}</span>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
