@extends('layouts.auth-page')
@section('auth-card')
<div class="container w-3/4 md:w-1/2 min-h-fit bg-white p-10 shadow-md rounded-md">
    <form class="flex-col" action="{{route('try-to-login')}}" method="post">
    @csrf
        <div class="flex grow items-center justify-center">
            <picture>
                <img src="{{asset('images/nota-musical.png')}}" width="100" height="100" alt="nota musical">
            </picture>
        </div>
        @if($errors->any())
            <div class="fixed flex items-center border rounded text-white bg-red-500 my-6 p-4">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-wrap items-center justify-start md:justify-center my-6">
            <label class="basis-1/5" for="email">{{__('auth.email')}}:</label>
            <input class="w-full md:mx-2 md:w-1/2 h-8 border-2 rounded border-slate-400 px-3" name="email" id="email" type="text" value="{{old('email')}}" autofocus required>
        </div>
        <div class="flex flex-wrap items-center justify-start md:justify-center my-6">
            <label class="basis-1/5" for="password">{{__('auth.password')}}:</label>
            <input class="w-full md:mx-2 md:w-1/2 h-8 border-2 rounded border-slate-400 px-3" name="password" id="password" type="password" required>
        </div>
        <div class="flex grow justify-between items-end">
            <a class="text-sm underline antialiased" href="#">¿No tienes una cuenta? Regístrate</a>
            <button class="border mx-3 px-5 py-2 rounded-md text-white bg-red-500" type="submit">Enviar</button>
        </div>
    </form>
</div>
@endsection