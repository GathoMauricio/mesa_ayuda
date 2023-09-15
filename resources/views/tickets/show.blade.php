@extends('adminlte::page')

@section('title', 'Ticket ' . $ticket->folio . '| ' . Auth::user()->rol->nombre_rol)

@section('content')
    <div class="container contact-form">
        <div class="contact-image">
            @if (Auth::user()->cliente->imagen == 'cliente.png')
                <img src="{{ asset('img/cliente.png') }}" alt="cliente-{{ Auth::user()->cliente->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @else
                <img src="{{ asset('storage/img/clientes/' . Auth::user()->cliente->imagen) }}"
                    alt="cliente-{{ Auth::user()->cliente->imagen }}"
                    style="width:120px;height:120px;background-color:rgb(247, 240, 240);"
                    class="rounded-circle shadow-4-strong p-1">
            @endif
        </div>
        <form>
            @csrf
            <h3>Ticket {{ $ticket->folio }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area" class="text-primary">Área</label>
                        <p>{{ $ticket->sintoma->categoria->area->area }}</p>
                    </div>
                    <div class="form-group">
                        <label for="categoria" class="text-primary">Categoria</label>
                        <p>{{ $ticket->sintoma->categoria->categoria }}</p>
                    </div>
                    <div class="form-group">
                        <label for="sintoma" class="text-primary">Síntoma</label>
                        <p>{{ $ticket->sintoma->sintoma }}</p>
                    </div>
                    <div class="form-group">
                        <label for="prioridad" class="text-primary">Prioridad</label>
                        <p>{{ $ticket->prioridad }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descripcion" class="text-primary">Descripción</label>
                        <p>{{ $ticket->descripcion }}</p>
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
