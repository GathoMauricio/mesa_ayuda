@extends('adminlte::page')

@section('title', 'Editar Ticket | ' . Auth::user()->rol->nombre_rol)

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
        <form action="{{ url('updater_ticket', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3>Editar Ticket {{ $ticket->folio }}</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select id="cbo_area" onchange="cargarCategorias(this.value)" name="area" class="form-select"
                            required>
                            <option value>--Seleccione el área--</option>
                            @foreach ($areas as $key => $area)
                                @if ($ticket->sintoma->categoria->area->id == $area->id)
                                    <option value="{{ $area->id }}" selected>{{ $area->area }}</option>
                                @else
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('area')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select onchange="cargarSintomas(this.value)" id="cbo_categoria" name="categoria"
                            class="form-select" required>
                            <option value>--Seleccione la categoría--</option>
                        </select>
                        @error('categoria')
                            <small>
                                <strong class="text-danger" required>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select id="cbo_sintoma" name="sintoma_id" class="form-select" required>
                            <option value="">--Seleccione el síntoma--</option>
                        </select>
                        @error('sintoma_id')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="prioridad" class="form-select" required>
                            <option value="">--Seleccione la prioridad--</option>
                            @if ($ticket->prioridad == 'Baja')
                                <option value="Baja" selcted>Baja</option>
                            @else
                                <option value="Baja">Baja</option>
                            @endif
                            @if ($ticket->prioridad == 'Normal')
                                <option value="Normal" selected>Normal</option>
                            @else
                                <option value="Normal">Normal</option>
                            @endif
                            @if ($ticket->prioridad == 'Alta')
                                <option value="Alta" selected>Alta</option>
                            @else
                                <option value="Alta">Alta</option>
                            @endif
                            @if ($ticket->prioridad == 'Urgente')
                                <option value="Urgente" selected>Urgente</option>
                            @else
                                <option value="Urgente">Urgente</option>
                            @endif
                        </select>
                        @error('prioridad')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="descripcion" class="form-control" placeholder="Describa su problemática..."
                            style="width: 100%; height: 150px;" required>{{ $ticket->descripcion }}</textarea>
                        @error('descripcion')
                            <small>
                                <strong class="text-danger">{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact btn-block" value="Enviar" />
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

            width: 40%;
            margin-top: -3%;

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
    <script>
        $("#document").ready(function() {
            var area = $("#cbo_area").val();
            console.log(area);
            cargarCategorias(area);
            setTimeout(function() {
                $("#cbo_categoria").val({{ $ticket->sintoma->categoria->id }});
                var categoria = $("#cbo_categoria").val();
                cargarSintomas(categoria);
                setTimeout(function() {
                    $("#cbo_sintoma").val({{ $ticket->sintoma->id }});
                }, 1000);
            }, 1000);



        });
    </script>

@stop
