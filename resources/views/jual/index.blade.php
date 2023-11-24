@extends('layouts.main')

@section('container')
    <div class="" style="min-height: 100vh">
        <div class="border rounded-4 mt-5 p-4 shadow">
            <div class="row mb-3">
                <div class="col-2">
                    <h5 class="fw-semibold mb-3">Tawaran Anda</h5>
                    <button type="button" class="btn btn-success ps-3 pe-3" data-bs-toggle="modal"
                        data-bs-target="#jualBarang">
                        Jual Barang &nbsp;<i class="bi bi-plus-circle"></i>
                    </button>
                </div>
                @if (session()->has('deleteSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        {{ session('deleteSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('successProduct'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        {{ session('successProduct') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            @if (count($products) > 0)
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-3 ">
                            <div class="card mb-4 shadow border border-0 rounded-3 overflow-hidden"
                                style="min-height: 380px">
                                <div class="card-body">
                                    <div class="w-100" style="height: 190px;">
                                        <img src="http://laravel-api-uas.test/api/image/{{ $product->image }}"
                                            alt="" style="height: 100%; width:100%" class="text-center">
                                    </div>
                                    <h5 class="card-title mt-2">
                                        <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                                    </h5>

                                    <h5 class="text-dark mb-2 fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </h5>

                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="text-muted mb-0">Available: <span
                                                class="fw-bold">{{ $product->stock }}</span>
                                        </p>
                                        <div class="ms-auto text-warning">{{ $product->condition }}</div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-warning ps-3 pe-3">
                                            <a href="/edit-product/{{ $product->id }}">Edit &nbsp;<i
                                                    class="bi bi-pencil-square"></i></a>
                                        </button>
                                        <form method="POST" action="/products/{{ $product->id }}"
                                            onsubmit="return confirm('Ingin Menghapus Data Tersebut?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center mb-5">
                    <div class="col-6 d-flex align-items-center shadow mt-3 justify-content-center">
                        <img src="/img/logo-jual.png" alt="" class="img-fluid" style="width: 100px">
                        <p class="fw-semibold fs-5">Belum ada produk yang ditawarkan!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="jualBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Buat Tawaran Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Nama produk</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="condition" class="col-sm-3 col-form-label">Kondisi</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="condition" name="condition" required>
                                    <option selected>Pilih Kondisi</option>
                                    <option value="Baru">Baru</option>
                                    <option value="Bekas">Bekas</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="category_id" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="stock" class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-9">
                                <div class="form-floating">
                                    <textarea class="form-control p-2" placeholder="" id="description" name="description" style="min-height: 150px;"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="col-sm-3 col-form-label">Pilih gambar produk</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="gambar" name="image"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100 mt-3">
                            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
