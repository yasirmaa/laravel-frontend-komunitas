@extends('layouts.main')

@section('container')
    {{-- <?php dd(count($product->comments)); ?> --}}
    <div class="row mt-5">
        <div class="col-5">
            <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}" alt="" style="width: 100%;">
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <h3>{{ $product->name }}</h3>
            <p>Stock : {{ $product->stock }}</p>
            <p class="fw-bold">Rp {{ $product->price }}</p>
            <h4>Detail</h4>
            <p>{{ $product->description }}</p>
        </div>
    </div>
    <div class="row mt-4">
        <h2>Komentar</h2>
        @if (count($product->comments) == 0)
            <p>Belum ada komentar</p>
        @else
            @foreach ($product->comments as $comment)
                <p>{{ $comment->content }}</p>
            @endforeach
        @endif
    </div>
@endsection
