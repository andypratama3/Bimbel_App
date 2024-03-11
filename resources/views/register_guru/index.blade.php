@extends('layouts.app.user')
@section('title', 'Daftar Bimbel')
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about mt-5">
    <div class="container">
        <a href="/" class="btn btn-primary mb-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title text-center"><strong>Daftar Guru</strong></h5>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
