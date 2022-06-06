@extends('layouts.app')
@section('content')
<form action="{{ url('/pais/' . $pais->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
<input type="hidden" name="id" value="{{$pais->id}}">
@include('pais.form', ['modo'=>'Editar'])
</form>
@endsection