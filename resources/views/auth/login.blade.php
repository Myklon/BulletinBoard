@extends('layouts.main')
@section('content')
    <div class="row mt-4 justify-content-center">
        <h2 class="text-center">Вход</h2>
        <div class="col-md-6">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="login">Имя пользователя:</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Введите имя пользователя">
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
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
@endsection
