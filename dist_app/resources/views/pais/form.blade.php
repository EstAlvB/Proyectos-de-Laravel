@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nombre del País:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="name" value="{{ isset($pais->name)?$pais->name:'' }}" id="name">
    </div>
</div>
<div class="form-group row">
    <label for="postal_code" class="col-sm-2 col-form-label">Código Postal:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="postal_code" value="{{ isset($pais->postal_code)?$pais->postal_code:'' }}" id="postal_code">
    </div>
</div>
<div class="form-group row">
    <label for="nomenclatura" class="col-sm-2 col-form-label">Nomenclatura:</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="nomenclatura" value="{{ isset($pais->nomenclatura)?$pais->nomenclatura:'' }}" id="nomenclatura">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">{{$modo}}</button>
    </div>
</div>