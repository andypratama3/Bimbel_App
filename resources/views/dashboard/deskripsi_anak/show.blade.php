@extends('layouts.app.dashboard')
@section('title','Detail Deskripsi')

@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Deskripsi</h5>

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Murid Bimbel</label>
                            <select name="bimbel_id" class="form-control select2" disabled>
                                <option selected value="{{ $deskripsi->bimbel_id }}">{{ $deskripsi->bimbel->nama_anak }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Guru Bimbel</label>
                            <select name="guru_id" class="form-control select2" disabled>
                                <option selected value="{{ $deskripsi->guru_id }}">{{ $deskripsi->guru->name }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Sesi</label>
                            <input type="number" class="form-control" name="sesi" disabled value="{{ old('sesi', $deskripsi->sesi) }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Deskripsi Perkembangan Anak</label>
                            <textarea name="description" class="form-control" disabled cols="30" rows="10">{{ $deskripsi->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.deskripsi.anak.index') }}" class="btn btn-danger">Kembali</a>

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
