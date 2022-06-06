@extends('layouts.app')
@section('content')

<h1>Provincias de {{$pais->name}}</h1>

<table class="table table-light table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Código provincial</th>
            <th scope="col">Ciudades Provincia</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>

        @foreach ($pais->provincias as $provincia)
        <tr>
            <td>{{ $provincia->id }}</td>
            <td>{{ $provincia->nombre }}</td>
            <td>{{ $provincia->cod_provincia}}</td>
            <td>
                <a class="btn btn-outline-info" 
                    href="{{ route('ci_index', $provincia->id) }}"
                    role="button">Ciudades</a>
            </td>
            <td>
                <button  
                    type="button"
                    id="editButton"
                    class="btn btn-outline-info" 
                    data-bs-toggle="modal"
                    data-bs-target="#EditarModal"
                    data-bs-nombre="{{$provincia->nombre}}"
                    data-bs-cod="{{$provincia->cod_provincia}}"
                    data-bs-id="{{$provincia->id}}">
                    Editar
                </button>
            </td>
            <td>
                <form action="{{ route('del_prov', $pais->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="hidden" name="id" value="{{$provincia->id}}">
                    <button type="submit" class="btn btn-outline-danger" 
                    onclick="return confirm('¿Quieres borrar esta provincia?')">
                    Borrar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<button  
    type="button"
    id="createButton"
    class="btn btn-primary" 
    data-bs-toggle="modal"
    data-bs-target="#CrearModal">
    Crear nueva provincia
</button>

<a type="button" href="{{url('/')}}" class="btn btn-secondary">Regresar</a>

@include('provincia.create')

@if (!$pais->provincias->isEmpty())
    @include('provincia.edit')
@endif


<script>
const EditarModal = document.getElementById('EditarModal')
EditarModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const nombre = button.getAttribute('data-bs-nombre')
  const code = button.getAttribute('data-bs-cod')
  const id = button.getAttribute('data-bs-id')
 
  // Update the modal's content.
  const provName = EditarModal.querySelector('#nombre')
  const provCod = EditarModal.querySelector('#cod_provincia')
  const provId = EditarModal.querySelector('#id')

  provName.value = nombre
  provCod.value = code
  provId.value = id
})
</script>

@endsection


