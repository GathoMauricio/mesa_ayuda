@extends('adminlte::page')

@section('title', 'Clientes | ' . Auth::user()->rol->nombre_rol)

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    <a href="{{ url('clientes/create') }}" class="btn btn-primary">Nuevo cliente</a>
    <span class="float-right">{{ $clientes->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col"></th>
                <th scope="col">Razón Social</th>
                <th scope="col">RFC</th>
                <th scope="col">Dirección</th>
                <th scope="col">Administrador</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $key => $cliente)
                <tr>
                    <td>
                        @if ($cliente->imagen == 'cliente.png')
                            <img src="{{ asset('img/cliente.png') }}" alt="cliente-{{ $cliente->imagen }}" class="rounded"
                                style="width:60px;background-color:rgb(247, 240, 240);">
                        @else
                            <img src="{{ asset('storage/img/clientes/' . $cliente->imagen) }}" class="rounded"
                                alt="cliente-{{ $cliente->imagen }}"
                                style="width:60px;background-color:rgb(247, 240, 240);">
                        @endif
                    </td>
                    <td>{{ $cliente->razon_social }}</td>
                    <td>{{ $cliente->rfc }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        {{ $cliente->getAdministrador()->nombre }}
                        {{ $cliente->getAdministrador()->apaterno }}
                        {{ $cliente->getAdministrador()->amaterno }}
                        <br>
                        <a
                            href="mailto:{{ $cliente->getAdministrador()->email }}">{{ $cliente->getAdministrador()->email }}</a>

                    </td>
                    <td>
                        <a href="{{ url('clientes', $cliente->id) }}" class="text-info">Abrir</a>
                        <br>
                        <a href="{{ url('clientes/' . $cliente->id . '/edit') }}"class="text-warning">Editar</a>
                        <br>
                        <form id="form_eliminar_cliente_{{ $cliente->id }}" action="{{ url('clientes', $cliente->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')</form>
                        <a href="javascript:void(0)" onclick="eliminarCliente({{ $cliente->id }})"
                            class="text-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach

            @if (count($clientes) <= 0)
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
    <span class="float-right">{{ $clientes->links() }}</span>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
