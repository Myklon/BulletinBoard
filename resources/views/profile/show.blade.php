@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Профиль пользователя {{$user->login}}</h2>
                <p class="mb-1"><strong>Почта:</strong> {{$user->email}}</p>
                <p class="mb-4"><strong>Номер телефона:</strong> {{$user->phone}}</p>
                <a href="{{route('profile.edit', $user->id)}}" class="btn btn-primary">Обновить данные</a>
                <hr>
                <h3 class="mt-4 mb-3">Объявления пользователя:</h3>
            </div>
        </div>
    </div>
@endsection
