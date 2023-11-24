@extends('layouts.main')

@section('container')
    <div class="row align-items-center" style="height: 620px">
        <div class="col-8">
            <h2 class="fw-bold"><span class="home-title">DJUALYA</span> Komunitas</h2>
            <h1 class="display-5 fw-bold home-str" id="str"></h1>
            <p class="col-md-8 fs-5 text-secondary">Temukan barang yang Anda cari atau jual barang dengan keamanan
                dan kenyamanan yang kami
                tawarkan. Bersama kami, jual beli menjadi lebih mudah!</p>
            <a href="/products">
                <button class="btn btn-success btn-lg home-btn" type="button">
                    Mulai Belanja <i class="bi bi-arrow-right-circle"></i>
                </button>
            </a>
        </div>
        <div class="col-4">
            <img src="/img/logo-jual.png" alt="" style="width: 100%">
        </div>
    </div>
@endsection
