@extends('layouts.app.dashboard')
@section('title','Absensi')

@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Tambah Absensi</h5>
                <form action="{{ route('dashboard.dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.flashmessage')
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Murid Bimbel</label>
                            <select name="bimbel_id" class="form-control select2 @error('bimbel_id') is-invalid @enderror">
                                <option selected disabled>Pilih Nama Murid</option>
                                @foreach ($murids as $murid)
                                    <option value="{{ $murid->id }}">{{ $murid->nama_anak }}</option>
                                @endforeach

                                @error('bimbel_id')
                                    <span class="bg-danger">{{ $errors }}</span>
                                @enderror
                            </select>

                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Foto </label>
                            <input type="file" multiple class="form-control" name="foto[]" value="{{ old('foto') }}" accept="image/*">
                        </div>
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
