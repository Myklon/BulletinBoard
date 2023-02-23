@extends('layouts.main')
@section('content')
    <div class="album py-5 bg-light">
        <h2 class="text-center">Все Категории</h2>
        <ul>
            @foreach($categories as $category)
                <li><h4><a href="{{route('category.show', $category->id)}}">{{$category->title}} ({{$category->products->count()}})</a></h4></li>
            @endforeach
        </ul>
    </div>
@endsection
