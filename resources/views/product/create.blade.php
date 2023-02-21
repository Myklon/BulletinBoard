@extends('layouts.main')
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{route('product.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Название товара:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название товара">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Описание:</label>
                    <textarea class="form-control" id="description" name="description"> </textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="price">Цена:</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Введите цену товара">
                </div>

                <div class="form-group form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> В черновик
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Добавить товар</button>
            </form>
        </div>
    </div>
@endsection
