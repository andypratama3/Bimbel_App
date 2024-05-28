@extends('layouts.app.dashboard')
@push('css_dashboard')
<style>
    .table tr th {
        font-size: 14px;
    }

    .table tr td {
        font-size: 14px;
    }
    .bi-star{
        color: yellow;
        font-size: 20px;
    }
</style>
@endpush
@section('title','Guru Bimbel')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="card">
                <h5 class="card-title text-center">Guru Bimbel </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            @forelse ($guru_bimbel as $guru)
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <img src="{{ asset('storage/guru/img/'. $guru->guru->foto) }}" alt="" class="img-fluid w-50">
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <p>Nama Guru    : <strong>{{ $guru->guru->name }}</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Mata Pelajaran    : <strong>{{ $guru->guru->mata_pelajaran }}</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Jam Les    : <strong>{{ $guru->jam_les }}</strong></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Hari Les    : <strong>{{ $guru->jadwal_hari }}</strong></p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="container">
                                    <div class="form-group text-center">
                                        <a href="{{ route('dashboard.guru.create') }}" class="btn btn-primary ">Pilih Guru</a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
</section>
@endsection
