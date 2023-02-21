@extends('layouts.main')
@section('content')
    <div class="row mt-4 justify-content-center">
        <h2 class="text-center">Регистрация</h2>
        <div class="col-md-6">
            <form method="POST">
                <div class="form-group mb-3">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" class="form-control" id="username" placeholder="Введите имя пользователя">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Введите email">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Номер телефона:</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Введите свой номер телефона">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" id="password" placeholder="Введите пароль">
                </div>
                <div class="form-group form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Запомнить меня
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
