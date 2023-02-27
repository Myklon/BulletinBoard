@extends('layouts.main', ['title' => "Объявление: $product->title"])
@section('content')
    <div class="container mt-5">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <h1>{{$product->title}}</h1>
                <h2>Цена: {{$product->price}} руб.</h2>
                <p class="lead">Категория: <a
                        href="{{route('category.show', $product->category->id)}}">{{$product->category->title}}</a></p>
                <img src="{{ asset("storage/$product->cover") }}" class="img-fluid my-3" width="100%"
                     style="max-height: 340px; object-fit: contain;">
                <article class="main px-3 mt-3">
                <p class="lead">{{$product->short_description}}</p>
                <p class="description">{{$product->description}}</p>
                </article>
                <div class="row">
                    @foreach($product->files as $file)
                        <div class="col-md-12">
                            <img src="/storage/{{$file->path}}" class="img-fluid my-3" width="100%"
                                 style="max-height: 400px; object-fit: contain;">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <h2>Продавец: <a href="{{route('profile.show', $product->user->id)}}">{{$product->user->login}}</a></h2>
                <h3>Связаться: {{$product->user->phone}}</h3>
                @can('edit', $product)
                <div class="d-inline">
                    <a class="btn btn-primary" href="{{route('product.edit', $product->id)}}" role="button">Изменить</a>
                    <form class="mt-2" action="{{route('product.remove', $product->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </div>
                @endcan
            </div>
            <hr>
            <h3 class="mt-4">Рекомендации:</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 d-flex align-items-stretch">
                @foreach($recommendations as $recommendation)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset("storage/$recommendation->cover") }}" alt="" width="100%"
                                 style="max-height: 250px; object-fit: contain;">

                            <div class="card-body">
                                <h3 class="card-title"><a
                                        href="{{route('product.show', $recommendation->id)}}">{{$recommendation->title}}</a></h3>
                                <p class="card-text"><a
                                        href="{{route('category.show', $recommendation->category->id)}}">{{$recommendation->category->title}}</a>
                                </p>
                                <p class="card-text">{{$recommendation->short_description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="text">{{$recommendation->price}} руб.</h5>
                                    <p class="card-text"><a
                                            href="{{route('profile.show', $recommendation->user->id)}}">{{$recommendation->user->login}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
