@extends('layouts.main')
@section('content')

    <div class="album py-5 bg-light">
        <h2 class="text-center">{{$meta['title']}}</h2>
        <div class="d-grid gap-2 mb-4 col-6 mx-auto">
            <a href="{{route('product.create')}}" class="btn btn-primary">Создать объявление</a>
        </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 d-flex align-items-stretch">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset("storage/$product->cover") }}" alt="" width="100%" style="max-height: 250px; object-fit: contain;" >

                            <div class="card-body">
                                <h3 class="card-title"><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a></h3>
                                <p class="card-text"><a href="{{route('category.show', $product->category->id)}}">{{$product->category->title}}</a></p>
                                <p class="card-text">{{$product->short_description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="text">{{$product->price}} руб.</h5>
                                        <p class="card-text"><a href="{{route('profile.show', $product->user->id)}}">{{$product->user->login}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection
