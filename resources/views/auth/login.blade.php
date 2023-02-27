@extends('layouts.main', ['title' => 'Вход'])
@section('content')

    <div class="row mt-4 justify-content-center">
        <h2 class="text-center">Вход</h2>
        <div class="col-md-6">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    {{ \Session::get('success') }}
                </div>
            @endif
            @error('fail')
                <div class="alert alert-warning mt-2" role="alert">
                    {{$message}}
                </div>
            @enderror
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="login">Имя пользователя:</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Введите имя пользователя" value="{{old('login')}}">
                    @error('login')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Пароль:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Запомнить меня
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
@endsection
