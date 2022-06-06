<form action="{{ route('edit_prov', $pais->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('provincia.form', ['modo'=>'Editar'])
</form>