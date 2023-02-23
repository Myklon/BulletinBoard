@extends('layouts.main')
@section('content')
    <div class="row mt-4 justify-content-center">
        <h3 class="text-center">{{$meta['title']}}</h3>
        <div class="col-md-6">
            <form method="POST" action="
            {{isset($product) ? route('product.update', $product->id) : route('product.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Название товара:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название товара" value="{{ $product->title ?? old('title') }}">
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="category">Выберите категорию:</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                        <option
                            {{ $categoryId = isset($product) ? $product->category_id : old('category_id') }}
                            {{ $categoryId == $category->id ? ' selected ' : '' }}
                            value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="title">Краткое описание:</label>
                    <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Введите краткое описание к товару" value="{{ $product->short_description ?? old('short_description') }}">
                    @error('short_description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="description">Описание товара:</label>
                    <textarea class="form-control" id="description" name="description"> {{ $product->description ?? old('description') }} </textarea>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">{{$meta['cover_info']}}</label>
                    <input name="cover" class="form-control" type="file" id="formFile">
                    @error('cover')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="price">Цена:</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Введите цену товара" step="any" value="{{$product->price ?? old('price')}}">
                    @error('price')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">{{$meta['files_info']}}</label>
                    <input name="files[]" class="form-control" type="file" id="formFileMultiple" multiple>
                    @error('files')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    @if ($errors->has('files.*'))
                            @foreach ($errors->get('files.*') as $error)
                                <p class="text-danger">{{ $error[0] }}</p>
                            @endforeach
                    @endif

                </div>
                <div class="form-group form-check mb-3">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" checked> Активное
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">{{$meta['button']}}</button>
            </form>
        </div>
    </div>
@endsection
