<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link link-dark px-2">Объявления</a></li>
                <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link link-dark px-2">Категории (dropdown?)</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-dark px-2">Войти</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-dark px-2">Зарегистрироваться</a></li>
                <li class="nav-item"><a href="{{route('profile.show', 1)}}" class="nav-link link-dark px-2">Профиль (логин)</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Выйти</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
