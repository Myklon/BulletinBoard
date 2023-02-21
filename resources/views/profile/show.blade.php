@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Профиль (имя)</h2>
                <p class="mb-1"><strong>Логин:</strong> JohnDoe</p>
                <p class="mb-1"><strong>Почта:</strong> johndoe@example.com</p>
                <p class="mb-4"><strong>Номер телефона:</strong> +1 (123) 456-7890</p>
                <a href="{{route('profile.update', 1)}}" class="btn btn-primary">Обновить данные</a>
                <hr>
                <h3 class="mt-4 mb-3">Объявления пользователя (имя)</h3>
                <!-- Здесь может быть контент объявлений пользователя -->
            </div>
        </div>
    </div>
@endsection
