<!-- Modal area-->
<div class="modal fade" id="modal-create-area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Área</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('guardar_area') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="area" class="font-weight-bold">Área</label>
                                <input type="text" name="area" placeholder="Nombre del área..."
                                    class="form-control" required>
                                @error('area')
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
