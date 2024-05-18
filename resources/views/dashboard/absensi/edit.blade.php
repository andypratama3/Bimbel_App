@extends('layouts.app.dashboard')
@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title','Edit Absensi')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Absensi</h5>
                <form action="{{ route('dashboard.absensi.update', $absensi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Murid Bimbel</label>
                            <select name="bimbel_id" class="form-control select2" required>
                                <option value="{{ $absensi->bimbel_id }}">{{ $absensi->bimbel->nama_anak }}</option>
                                @foreach ($murids as $murid)
                                    <option value="{{ $murid->id }}">{{ $murid->nama_anak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai', $absensi->tanggal_mulai) }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggal_selesai" value="{{ old('tanggal_selesai', $absensi->tanggal_selesai) }}">
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="">Sesi</label>
                        <input type="number" class="form-control" name="sesi" value="{{ old('sesi', $absensi->sesi) }}" placeholder="Contoh Sesi: 10">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="">Foto Absen</label>
                        <input type="file" class="form-control" name="foto_absen" value="{{ old('foto_absen', $absensi->foto_absen) }}" accept="image/*">
                    </div>

                    <div class="col-md-12 mt-2 text-center">
                        <label for="">Foto</label>
                        <img src="{{ asset('storage/absen/img/'.$absensi->foto_absen) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.absensi.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
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

