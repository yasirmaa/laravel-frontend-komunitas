@extends('layouts.main')

@section('container')
    <div class="row mt-5">
        <div class="col-5">
            <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}" alt="" style="width: 100%;">
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <h3>{{ $product->name }}</h3>
            <p>Stock : {{ $product->stock }}</p>
            <p class="fw-bold fs-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <h5 class="fw-semibold">Detail</h5>
            <p><strong>Kondisi : </strong> {{ $product->condition }}</p>
            <p>{{ $product->description }}</p>
            <p><strong>Kontak : </strong> {{ $product->user->no_phone }}</p>
            <p><strong>Alamat : </strong> {{ $product->user->address }}</p>
        </div>
    </div>
    <div class="row mt-4 mb-4 border rounded-4 shadow-sm p-4">
        <div class="col-6">
            <h4 class="fw-semibold">Komentar</h4>
            @if (count($product->comments) == 0)
                <div class="d-flex align-items-center shadow mt-3">
                    <img src="/img/logo-emote.png" alt="" class="img-fluid" style="width: 100px">
                    <p class="fw-semibold fs-5">Belum ada komentar untuk produk ini</p>
                </div>
            @else
                @foreach ($product->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-start">
                                <img class="rounded-circle shadow-1-strong me-3" src="/img/pp-default.png" alt="avatar"
                                    width="40" height="40">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center mb-3 g-4">
                                        <h6 class="text-primary fw-semiboold mb-0 col-8">
                                            {{ $comment->user->username }} <span
                                                class="text-dark ms-2 fw-normal">{{ $comment->content }}</span>
                                        </h6>
                                        <small class="mb-0 col-3 text-end">{{ $comment->created_at }}</small>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="small mb-0" style="color: #aaa;">
                                            <a href="#!" class="link-grey">Reply</a> •
                                            <a href="#!" class="link-grey">Translate</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @auth
                <div class="py-3 border-0">
                    <form action="/comments" method="POST">
                        @csrf
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3" src="/img/pp-default.png" alt="avatar"
                                width="40" height="40" />
                            <div class="form-floating w-100">
                                <textarea class="form-control" name="content" placeholder="Masukkan komentar anda" id="content" style="height: 100px"></textarea>
                                <label for="content">Masukkan komentar anda</label>
                            </div>
                            <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                    </form>
                </div>
            @else
                <p class="mt-4 fs-5">Tidak bisa komentar, anda belum login</p>
            @endauth
        </div>
    </div>
@endsection
