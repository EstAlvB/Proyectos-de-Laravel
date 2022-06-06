<form action="{{ route('add_prov', $pais->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('provincia.form', ['modo'=>'Crear'])
</form>