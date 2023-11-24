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
            <div class="carousel-item">
                <img src="/img/carousell-4.jpg" class="d-block w-100" alt="...">
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

    @if (count($products) > 0)
        <div class="row mb-5 mt-4">
            @foreach ($products as $product)
                <div class="col-3">
                    <div class="card mb-4 shadow border border-0 rounded-3 overflow-hidden" style="min-height: 350px">
                        <div class="card-body">
                            <div class="w-100" style="height: 190px;">
                                <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}" alt=""
                                    style="height: 100%; width:100%" class="text-center">
                            </div>
                            <h5 class="card-title mt-2">
                                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                            </h5>

                            <h5 class="text-dark mb-2 fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            <div class="d-flex">
                                <img class="rounded-circle shadow-1-strong me-1" src="/img/pp-default.png" alt="avatar"
                                    width="20" height="20">
                                <p class="small"><a href="#" class="text-muted">{{ $product->user->username }}</a>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">Available: <span class="fw-bold">{{ $product->stock }}</span>
                                </p>
                                <div class="ms-auto text-warning">{{ $product->condition }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row justify-content-center mb-5">
            <div class="col-6 d-flex align-items-center shadow mt-3 justify-content-center">
                <img src="/img/logo-emote.png" alt="" class="img-fluid" style="width: 100px">
                <p class="fw-semibold fs-5">Produk tidak ditemukan!</p>
            </div>
        </div>
    @endif
@endsection
