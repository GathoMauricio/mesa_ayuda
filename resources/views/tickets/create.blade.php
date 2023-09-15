@extends('adminlte::page')

@section('title', 'Iniciar Ticket | ' . Auth::user()->rol->nombre_rol)

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
        <form action="{{ url('guardar_ticket') }}" method="POST">
            @csrf
            <h3>Iniciar Ticket</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <select onchange="cargarCategorias(this.value)" name="area" class="form-select" required>
                            <option value>--Seleccione el área--</option>
                            @foreach ($areas as $key => $area)
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
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
                            <option value="Baja">Baja</option>
                            <option value="Normal">Normal</option>
                            <option value="Alta">Alta</option>
                            <option value="Urgente">Urgente</option>
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
                            style="width: 100%; height: 150px;" required></textarea>
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
@stop
