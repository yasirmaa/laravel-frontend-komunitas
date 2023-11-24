@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mb-4">
        <div class="col-8">
            <h5 class="fw-semibold mb-3 fs-4">Edit Produk</h5>
            @if (session()->has('successEdit'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('successEdit') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Nama produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $product->name }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="condition" class="col-sm-3 col-form-label">Kondisi</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="condition" name="condition" required>
                            <option selected>Pilih Kondisi</option>
                            <option value="Baru" @if ($product->condition == 'Baru') selected @endif>Baru</option>
                            <option value="Bekas" @if ($product->condition == 'Bekas') selected @endif>Bekas</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="category_id" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option selected>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($product->category->name == $category->name) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stock" class="col-sm-3 col-form-label">Stok</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ $product->stock }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $product->price }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                    <div class="col-sm-9">
                        <div class="form-floating">
                            <textarea class="form-control p-2" placeholder="" id="description" name="description" style="min-height: 150px;"
                                required>{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gambar" class="col-sm-3 col-form-label">Gambar produk</label>
                    <div class="col-sm-9">
                        <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}" alt=""
                            width="100px">
                        <input type="file" class="form-control mt-3" id="gambar" name="image" accept="image/*">
                    </div>
                </div>
                <div class="d-flex justify-content-end w-100 mt-3">
                    <button type="button" class="btn btn-secondary me-3"><a
                            href="/jual/{{ $product->user->username }}">Batal</a></button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
