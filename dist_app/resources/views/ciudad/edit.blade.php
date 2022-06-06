<form action="{{route('edit_ci', $provincia->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Editar Ciudad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form>
            <div class="mb-3">
            <label for="nombre" class="col-form-label">Nombre Ciudad:</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" id="nombre">
            @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <input type="hidden" name="provincia_id" value="{{$provincia->id}}">
            <input type="hidden" name="pais_id" value="{{$provincia->pais->id}}">
            <input type="hidden" name="id" id="id" value="">
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>
    </div>
</div>
</form>