@extends('adminlte::page')

@section('title', 'Catálogos | ' . Auth::user()->rol->nombre_rol)

@section('content_header')
    <h1 class="text-center">Catálogos</h1>
@stop

@section('content')
    <h4>Áreas</h4>
    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-create-area" class="btn btn-primary">Agregar Área</a>
    <span class="float-right">{{ $areas->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col">Área</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $key => $area)
                <tr>
                    <td>{{ $area->area }}</td>
                    <td>
                        <form id="form_eliminar_area_{{ $area->id }}" action="{{ url('eliminar_area', $area->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="eliminarArea({{ $area->id }})" class="btn btn-danger">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Categorías</h4>
    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-create-categoria" class="btn btn-primary">Agregar
        Categoría</a>
    <span class="float-right">{{ $categorias->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col">Área</th>
                <th scope="col">Categoría</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $key => $categoria)
                <tr>
                    <td>{{ $categoria->area->area }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td>
                        <form id="form_eliminar_categoria_{{ $categoria->id }}"
                            action="{{ url('eliminar_categoria', $categoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="eliminarCategoria({{ $categoria->id }})" class="btn btn-danger">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Síntomas</h4>
    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-create-sintoma" class="btn btn-primary">Agregar
        Síntoma</a>
    <span class="float-right">{{ $sintomas->links() }}</span>
    <table class="table table-striped table-light">
        <thead>
            <tr style="background-color:#081302a9">
                <th scope="col">Área</th>
                <th scope="col">Categoría</th>
                <th scope="col">Síntoma</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sintomas as $key => $sintoma)
                <tr>
                    <td>{{ $sintoma->categoria->area->area }}</td>
                    <td>{{ $sintoma->categoria->categoria }}</td>
                    <td>{{ $sintoma->sintoma }}</td>
                    <td>
                        <form id="form_eliminar_sintoma_{{ $sintoma->id }}"
                            action="{{ url('eliminar_sintoma', $sintoma->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="eliminarSintoma({{ $sintoma->id }})" class="btn btn-danger">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('catalogos.modal-create-area')
    @include('catalogos.modal-create-categoria')
    @include('catalogos.modal-create-sintoma')
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@stop
