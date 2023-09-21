<!-- Modal area-->
<div class="modal fade" id="modal-create-categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('guardar_categoria') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="area_id" class="font-weight-bold">Área</label>
                                <select name="area_id" id="area_id" class="form-select" required>
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
                                <label for="categoria" class="font-weight-bold">Categoría</label>
                                <input type="text" name="categoria" placeholder="Nombre de la categoría..."
                                    class="form-control" required>
                                @error('categoria')
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
