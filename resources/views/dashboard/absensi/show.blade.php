@extends('layouts.app.dashboard')
@section('title','Detail Absensi')

@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Absensi</h5>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Murid Bimbel</label>
                            <select name="bimbel_id" class="form-control select2" readonly>
                                <option value="{{ $absensi->bimbel_id }}" readonly>{{ $absensi->bimbel->nama_anak }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" readonly value="{{ $absensi->tanggal_mulai }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" readonly value="{{ $absensi->tanggal_selesai }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Sesi</label>
                            <input type="number" class="form-control" name="sesi" readonly value="{{ $absensi->sesi }}" placeholder="Contoh Sesi: 10">
                        </div>
                        <div class="col-md-12 mt-2 text-center">
                            <label for="">Foto Absen</label>
                            <img src="{{ asset('storage/absen/img/'.$absensi->foto_absen) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.absensi.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
            </div>
        </div>
    </div>
</div>

@push('js_dashboard')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
@endsection






