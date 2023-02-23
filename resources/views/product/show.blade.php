@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$product->title}}</h1>
                <h2>Цена: {{$product->price}} руб.</h2>
                <p class="lead">Категория: <a href="{{route('category.show', $product->category->id)}}">{{$product->category->title}}</a></p>
                <img src="{{ asset("storage/$product->cover") }}" class="img-fluid my-3" width="100%" style="max-height: 340px; object-fit: contain;">
                <p class="lead">{{$product->short_description}}</p>
                <p>{{$product->description}}</p>
                <div class="row">

                        @foreach($product->files as $file)
                        <div class="col-md-12">
                            <img src="/storage/{{$file->path}}" class="img-fluid my-3" width="100%" style="max-height: 400px; object-fit: contain;">
                    </div>
                        @endforeach


                </div>
            </div>
            <div class="col-md-4">
                <h2>Продавец: <a href="{{route('profile.show', $product->user->id)}}">{{$product->user->login}}</a></h2>
                <h3>Связаться: {{$product->user->phone}}</h3>
                <div class="d-inline">
                    <a class="btn btn-primary" href="{{route('product.edit', $product->id)}}" role="button">Изменить</a>
                    <form class="mt-2" action="{{route('product.remove', $product->id)}}" method="post">
                        @csrf
                    <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
