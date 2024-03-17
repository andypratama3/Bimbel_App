@extends('layouts.app.user')
@section('title', 'Daftar Bimbel')
@push('css')
    <style>
        .ul-font-size{
            font-size: 14px;
        }
        .ul-font-size-pelajaran{
            font-size: 12.5px;
        }
    </style>
@endpush
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about mt-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 text-center">
                    <h2>Pendaftaran Guru Sukses</h2>
                    <h6>Silahkan Menunggu Konfirmasi Dari Admin Melalui WhatsApp <br> Terima Kasih</h6>
                    <a href="/" class="btn btn-success">Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
