<div class="modal fade" id="{{$modo}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{$modo}}Modal"
     aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="titleModal">{{$modo}} Provincia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form>
            <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre Provincia:</label>
            <input type="text" name="nombre" class="@error('nombre') is-invalid @enderror" value="{{old('nombre')}}" id="nombre">
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="cod_provincia" class="col-form-label">Código Provincia:</label>
            <input type="text" name="cod_provincia" class="@error('cod_provincia') is-invalid @enderror" value="{{old('cod_provincias')}}" id="cod_provincia">
            @error('cod_provincia')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <input type="hidden" name="pais_id" value="{{$pais->id}}">
            <input type="hidden" name="id" id="id" value="">
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">{{$modo}}</button>
        </div>
    </div>
    </div>
</div>