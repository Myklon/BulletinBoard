@extends('layouts.main', ['title'=>"Все объявления"])
@section('content')
    <div class="album py-5 bg-light">
        <h2 class="text-center">Все объявления</h2>
        @auth()
        <div class="d-grid gap-2 mb-4 col-6 mx-auto">
            <a href="{{route('product.create')}}" class="btn btn-primary">Создать объявление</a>
        </div>
        @endauth
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {{ \Session::get('success') }}з
            </div>
        @endif
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 d-flex align-items-stretch">
                @foreach($products as $product)
                    @include('partials.product_card')
                @endforeach
            </div>
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection
