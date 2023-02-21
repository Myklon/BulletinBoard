@extends('layouts.main')
@section('content')
    <div class="row mt-4 justify-content-center">
        <h2 class="text-center">Редактирование профиля</h2>
        <div class="col-md-6">
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" class="form-control" id="username" placeholder="Введите имя пользователя">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" id="password" placeholder="Введите пароль">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>
@endsection
