@extends('layouts.app')
@section('content')

<h1>Ciudades de la provincia {{$provincia->nombre}}</h1>

<table class="table table-light table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>

        @foreach ($provincia->ciudades as $ciudad)
        <tr>
            <td>{{ $ciudad->id }}</td>
            <td>{{ $ciudad->nombre }}</td>
            <td>
                <button  
                    type="button"
                    id="editButton"
                    class="btn btn-outline-info" 
                    data-bs-toggle="modal"
                    data-bs-target="#EditarModal"
                    data-bs-nombre="{{$ciudad->nombre}}"
                    data-bs-id="{{$ciudad->id}}">
                    Editar
                </button>
            </td>
            <td>
                <form action="{{ route('del_ci', $provincia->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$ciudad->id}}">
                    <button type="submit" class="btn btn-outline-danger" 
                    onclick="return confirm('¿Quieres borrar esta ciudad?')">
                    Borrar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('ciudad.create')
@include('ciudad.edit')

<button  
    type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CrearModal">
    Crear nueva ciudad
</button>

<a type="button" href="{{route('prov_index', $provincia->pais->id)}}" 
    class="btn btn-secondary">Regresar</a>

<script 
src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous">
</script>

@if($errors->any())
    @if (session()->get('modalError') == 'CrearModal')
    <script>
        $( document ).ready(function() {
            $('#CrearModal').modal('toggle')
        });
    </script>
    @else
    <script>
        $( document ).ready(function() {
            $('#EditarModal').modal('toggle')
        });
    </script>
    @endif
@endif

<script>
    const EditarModal = document.getElementById('EditarModal')
    EditarModal.addEventListener('show.bs.modal', event => {
      // Button that triggered the modal
      const button = event.relatedTarget
      // Extract info from data-bs-* attributes
      const nombre = button.getAttribute('data-bs-nombre')
      const id = button.getAttribute('data-bs-id')
     
      // Update the modal's content.
      const provName = EditarModal.querySelector('#nombre')
      const provId = EditarModal.querySelector('#id')
    
      provName.value = nombre
      provId.value = id
    })
    </script>

@endsection