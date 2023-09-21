<!-- Modal area-->
<div class="modal fade" id="modal-create-sintoma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Síntoma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('guardar_sintoma') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="area_id" class="font-weight-bold">Área</label>
                                <select name="area_id" onchange="cargarCategorias(this.value)" id="area_id"
                                    class="form-select" required>
                                    <option value>--Seleccione opción--</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="categoria_id" class="font-weight-bold">Categoría</label>
                                <select name="categoria_id" id="cbo_categoria" class="form-select" required>
                                    <option value>--Seleccione opción--</option>
                                </select>
                                @error('categoria_id')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="sintoma" class="font-weight-bold">Síntoma</label>
                                <input type="text" name="sintoma" placeholder="Nombre del síntoma..."
                                    class="form-control" required>
                                @error('sintoma')
                                    <small>
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
