
@extends('layouts.main')

@section('container')
{{-- @dd($products[2]->comments[0]) --}}
    @foreach ($products as $product)
        <h3>Title : {{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <h3>Comments : </h3>
        {{-- {{ @dd($product->comments) }} --}}
        @foreach ($product->comments as $comment)
            <p class="text-danger">{{ $comment->content }}</p>
            <p>by: {{ $comment->user->username }}</p>
        @endforeach
    @endforeach
@endsection