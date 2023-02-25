@extends('layouts.main', ['title' => "Редактирование профиля"])
@section('content')
    <div class="row mt-4 justify-content-center">
        <h2 class="text-center">Редактирование профиля</h2>
        <div class="col-md-6">
            <form action="{{route('profile.change_phone', $user->id)}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="phone">Изменить номер телефона:</label>
                    <input type="tel" name="phone" class="form-control" id="phone"
                           placeholder="Введите свой номер телефона" value="{{$user->phone}}">
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Изменить номер телефона</button>
            </form>
            <hr>
            @error('password')
            <div class="alert alert-warning mt-2" role="alert">
                {{$message}}
            </div>
            @enderror
            <form action="{{route('profile.change_password', $user->id)}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="password">Текущий пароль:</label>
                    <input type="password" name="old_password" class="form-control" id="old_password"
                           placeholder="Введите текущий пароль">
                    @error('old_password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Новый пароль:</label>
                    <input type="password" name="new_password" class="form-control" id="password"
                           placeholder="Введите пароль">
                    @error('new_password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Повторите новый пароль:</label>
                    <input type="password" name="new_password_confirmation" class="form-control" id="password"
                           placeholder="Повторите новый пароль">
                    @error('new_password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Изменить пароль</button>
            </form>
        </div>
    </div>
@endsection
