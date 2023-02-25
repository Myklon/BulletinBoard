@extends('layouts.main', ['title' => "Пользователь $user->login"])
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {{ \Session::get('success') }}
                    </div>
                @endif

                <h2 class="mb-4">Профиль пользователя {{$user->login}}</h2>
                <p class="mb-1"><strong>Почта:</strong> {{$user->email}}</p>
                <p class="mb-4"><strong>Номер телефона:</strong> {{$user->phone}}</p>
                <a href="{{route('profile.edit', $user->id)}}" class="btn btn-primary">Обновить данные</a>
                @include('profile.partials.user_products')
            </div>
        </div>
    </div>
@endsection
