@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/products" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div id="carouselExampleInterval" class="carousel slide rounded-3" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="/img/carousell-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/img/carousell-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/img/carousell-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="category mt-4 border rounded-3 shadow-sm p-4">
        <div class="row">
            <h5 class="fw-semibold">Kategori Pilihan</h5>
        </div>
        <div class="row mt-2">
            @foreach ($categories as $category)
                <div class="col-2">
                    <div class="card category-item {{ $slug === $category->slug ? 'category-active' : '' }}">
                        <div class="card-body">
                            <img src="/img/kategori-{{ $category->id }}.jpg" alt="" srcset=""
                                style="width: 100%">
                            <p class="card-title text-center fw-medium">
                                <a href="/category/{{ $category->slug }}" class="text-black">{{ $category->name }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr class="shadow-sm mt-4 mb-4">

    {{-- <h5 class="fw-semibold">Tampil Produk</h5> --}}

    @if (count($products) > 0)
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    <div class="card mb-4 ">
                        <div class="card-body">
                            <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}" alt=""
                                style="width: 100%;">
                            <h3 class="card-title">
                                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                            </h3>

                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                By: <a href="#">{{ $product->user->username }}</a>
                                in <a href="#">{{ $product->category->name }}</a>
                                Price <a href="#">{{ $product->price }}</a>
                            </h6>

                            {{-- <p class="card-text">{!! $product->description !!}</p> --}}
                            <a href="#" class="card-link">Read more...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center fs-4">Produk tidak ditemukan!</p>
    @endif
@endsection
