@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$product->title}}</h1>
                <h2>Цена: {{$product->price}} руб.</h2>
                <img src="{{$product->cover}}" class="img-fluid my-3">
                <p class="lead">{{$product->short_description}}</p>
                <p>{{$product->description}}</p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="" class="img-fluid my-3">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h2>Продавец: <a href="#">Имя продавца</a></h2>
                <h3>Связаться: {{$product->phone}}</h3>
                <h4>Пользователь не предоставил номер</h4>
            </div>
        </div>
    </div>
@endsection
