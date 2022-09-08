<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUSIC API</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav>
            <div class="flex grow justify-between items-center bg-gradient-to-r from-slate-800 to-red-500 p-5">
                <h1 class="text-white text-xl font-bold">Welcome</h1>
                <img src="{{ asset('images/headphone.png')}}" alt="" width="50" height="50">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button><img src="{{asset('images/logout.png')}}" alt="logout" width="30" height="30"></button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="font-bold text-3xl">YOU ARE LOGGED IN!</h1>
    </main>
</body>
</html>
