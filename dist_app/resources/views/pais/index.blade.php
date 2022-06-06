@extends('layouts.app')
@section('content')
<h1><strong>Listado de Países</strong></h1>
<table class="table table-dark table-striped table-hover table-responsive">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nomenclatura</th>
            <th scope="col">Código Postal</th>
            <th scope="col">Provincias País</th>
            <th scope="col">Editar País</th>
            <th scope="col">Eliminar País</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($paises as $pais)
        <tr>
            <td>{{ $pais->id }}</td>
            <td>{{ $pais->name }}</td>
            <td>{{ $pais->nomenclatura}}</td>
            <td>{{ $pais->postal_code }}</td>
            <td>
                <a class="btn btn-outline-info" href="{{ route('prov_index', $pais->id) }}"
                    role="button">Provincias</a>
            </td>
            <td>
                <a class="btn btn-outline-info" href="{{ url('/pais/' . $pais->id . '/edit') }}" 
                role="button">Editar</a>
            </td>
            <td>

                <form action="{{ url('/pais/' . $pais->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-outline-danger" 
                    onclick="return confirm('¿Quieres borrar?')">Borrar</button>
                        
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{ url('/pais/create') }}" role="button">Registrar nuevo país</a>
@endsection