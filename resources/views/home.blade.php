@extends('adminlte::page')

@section('title', 'Tickets | ' . Auth::user()->rol->nombre_rol . ' | ' . Auth::user()->cliente->razon_social)

@section('content_header')
    <h1><span class="fas fa-fw fa-file">&nbsp;</span>Tickets</h1>
@stop

@section('content')
    <span class="float-right">{{ $tickets->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col">Folio</th>
                <th scope="col">Origen</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estatus</th>
                <th scope="col">Usuario</th>
                <th scope="col">Área y Categoría</th>
                <th scope="col">Síntoma</th>
                <th scope="col">Descripción</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $key => $ticket)
                <tr>
                    <th scope="row">{{ $ticket->folio }}</th>
                    <td>{{ $ticket->origen }}</td>
                    <td>{{ $ticket->prioridad }}</td>
                    <td>{{ $ticket->estatus->estatus }}</td>
                    <td>
                        {{ $ticket->usuario_final->nombre }} {{ $ticket->usuario_final->apaterno }}
                        {{ $ticket->usuario_final->amaterno }}
                        <br>
                        <a href="mailto:{{ $ticket->usuario_final->email }}">{{ $ticket->usuario_final->email }}</a>
                        <br>
                        <i>{{ $ticket->usuario_final->cliente->razon_social }}</i>
                    </td>
                    <td>
                        <small>{{ $ticket->sintoma->categoria->area->area }}
                            <br>
                            {{ $ticket->sintoma->categoria->categoria }}<small>
                    </td>
                    <td>
                        {{ $ticket->sintoma->sintoma }}
                    </td>
                    <td>{{ $ticket->descripcion }}</td>
                    <td>
                        <a href="{{ url('ver_ticket', $ticket->id) }}" class="text-info">Abrir</a>
                        @if (Auth::user()->rol_id == 3)
                            <br>
                            <a href="{{ url('editar_ticket', $ticket->id) }}"class="text-warning">Editar</a>
                            {{--  <br>
                            <a href="javascript:void(0)" class="text-danger">Eliminar</a>  --}}
                        @endif
                    </td>
                </tr>
            @endforeach

            @if (count($tickets) <= 0)
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
    <span class="float-right">{{ $tickets->links() }}</span>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
