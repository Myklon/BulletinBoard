<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset("storage/css/styles.css") }}">
    <title>{{$title ?? "Akihime"}}</title>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="wrapper flex-grow-1">
    <div>
        <nav class="py-2 bg-light border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto">
                    <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link link-dark px-2">Объявления</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link link-dark px-2">Категории</a>
                    </li>
                </ul>
                <ul class="nav">
                    @guest
                        <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-dark px-2">Войти</a></li>
                        <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-dark px-2">Зарегистрироваться</a>
                        </li>
                    @endguest
                    @auth()
                        <li class="nav-item"><a href="{{route('profile.show', Auth::user()->id)}}"
                                                class="nav-link link-dark px-2">Профиль ({{Auth::user()->login}})</a>
                        </li>
                        <li class="nav-item"><a href="{{route('logout')}}" class="nav-link link-dark px-2">Выйти</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
</div>
<footer>
    <hr>
    <p class="text-center text-muted">©2023 Akihime | Bulletin Board</p>
</footer>
</body>
</html>
