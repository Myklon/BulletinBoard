@extends('layouts.main', ['title' => "Изменить товар"])
@section('content')
    <div class="row mt-4 justify-content-center">
        <h3 class="text-center">Изменение объявления</h3>
        <div class="col-md-6">
            <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                @csrf
                @include("product.partials.form", ['button' => 'Изменить товар'])
            </form>
        </div>
    </div>
@endsection
