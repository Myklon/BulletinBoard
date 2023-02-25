@extends('layouts.main', ['title' => "Создание объявления"])
@section('content')
    <div class="row mt-4 justify-content-center">
        <h3 class="text-center">Создание объявления</h3>
        <div class="col-md-6">
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                @include("product.partials.form", ['button' => 'Добавить товар'])
            </form>
        </div>
    </div>
@endsection
