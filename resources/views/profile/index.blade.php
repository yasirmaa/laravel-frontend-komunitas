@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-4" style="min-height: 620px">
        <div class="col-8">
            <h5 class="fw-semibold mb-3 fs-4">Profil Saya</h5>
            @if (session()->has('successEdit'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('successEdit') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/profile/{{ $data['user']['id'] }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Depan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="firstname"
                            value="{{ $data['user']['firstname'] }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Belakang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="lastname"
                            value="{{ $data['user']['lastname'] }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="username"
                            value="{{ $data['user']['username'] }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="email"
                            value="{{ $data['user']['email'] }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Nomor Telpon</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="no_phone"
                            value="{{ $data['user']['no_phone'] }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="address"
                            value="{{ $data['user']['address'] }}" required>
                    </div>
                </div>
                <div class="d-flex justify-content-end w-100 mt-3">
                    <button type="button" class="btn btn-secondary me-3"><a
                            href="/jual/{{ $data['user']['username'] }}">Batal</a></button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
