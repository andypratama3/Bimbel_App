@extends('layouts.app.dashboard')
@push('css_dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('title','Edit modul')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Edit modul</h5>
                <form action="{{ route('dashboard.modul.update', $modul->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="name">Nama modul <code>*</code></label>
                                <input type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    name="name" value="{{ $modul->name }}">
                                @error('name')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="name">Foto <code>*</code></label>
                                <select name="bimbel_id" class="form-control select2">
                                    <option selected value="{{ $modul->bimbel_id }}">{{ $modul->bimbel->nama_anak }}</option>
                                    @foreach ($murids as $murid)
                                        <option value="{{ $murid->id }}">{{ $murid->nama_anak }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Status</label>
                            <input type="text" class="form-control" value="{{ $modul->status == 2 ? 'Selesai' : 'Pending' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.modul.index') }}" class="btn btn-danger">Kembali</a>
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
