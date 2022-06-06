@extends('layouts.app')
@section('content')
<form action="{{ url('/pais') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('pais.form', ['modo'=>'Crear'])
</form>
@endsection