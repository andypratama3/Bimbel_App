@extends('layouts.app.dashboard')
@section('title','Tambah Deskripsi')

@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Tambah Deskripsi</h5>
                <form action="{{ route('dashboard.deskripsi.anak.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Murid Bimbel</label>
                            <select name="bimbel_id" class="form-control select2">
                                <option selected disabled>Pilih Nama Murid</option>
                                @foreach ($murids as $murid)
                                    <option value="{{ $murid->id }}">{{ $murid->nama_anak }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Sesi</label>
                            <input type="number" class="form-control" name="sesi" value="{{ old('sesi') }}">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Deskripsi Perkembangan Anak</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.deskripsi.anak.index') }}" class="btn btn-danger">Kembali</a>
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
