<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body>
    
<header class="header">
    <nav class="nav">
        <a href="{{route('posts.index')}}" class="logo">Home</a>
        @auth
        <div class="dropdown" x-data="{open: false}">
            {{-- Dropdown menu button --}}
            <button @click="open = !open" type="button" class="dropdown-button">
                <img src="https://picsum.photos/200" alt="" class="avatar">
            </button>
            {{-- Dropdown menu --}}
            <div x-show="open" @click.outside="open = false" class="dropdown-menu">
                <p class="username">@ {{ auth()->user()->username }}</p>
                <a href="{{ route('dashboard') }}" class="dropdown-link">Dashboard</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="dropdown-link">Logout</button>
                </form>
            </div>
        </div>
        @endauth
        @guest
        <div class="auth-links">
            <a href="{{route('login')}}" class="auth-link">Login</a>
            <a href="{{ route('register')}}" class="auth-link">Register</a>
        </div>
        @endguest
    </nav>
</header>

<main class="main">
    {{$slot}}
</main>

</body>
</html>