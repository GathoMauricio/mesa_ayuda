@extends('adminlte::page')

@section('title', 'Tickets | ' . Auth::user()->rol->nombre_rol . ' | Mesa dee Ayuda')

@section('content_header')
    <h1>DASHBOARD</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($clientes as $key => $cliente)
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <table style="width:100%;">
                            <tr>
                                <td>
                                    @if ($cliente->imagen == 'cliente.png')
                                        <img src="{{ asset('img/cliente.png') }}" alt="cliente-{{ $cliente->imagen }}"
                                            width="60" height="60">
                                    @else
                                        <img src="{{ asset('storage/img/clientes/' . $cliente->imagen) }}" class="rounded"
                                            alt="cliente-{{ $cliente->imagen }}" width="60" height="60">
                                    @endif
                                </td>
                                <td>
                                    <h4>{{ $cliente->razon_social }}</h4>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <ul>
                            <li>
                                <b>Empleados:</b>
                                {{ \App\Models\User::where('rol_id', '!=', 2)->where('cliente_id', $cliente->id)->count() }}
                            </li>
                            <li>
                                <b>Tickets:</b>{{ \App\Models\Ticket::where('cliente_id', $cliente->id)->count() }}
                            </li>
                        </ul>
                    </div>
                    <a href="{{ url('clientes', $cliente->id) }}" class="small-box-footer">Ver Cliente <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
