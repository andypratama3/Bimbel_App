@extends('layouts.app.dashboard')
@section('title','Tambah Grade')
@push('css_dashboard')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Beri Grade</h5>
                <form action="{{ route('dashboard.grade.guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <p><code>*</code>Guru yang Tampil Berdasarkan Jenjang Siswa Bimbel</p>
                            <div class="form-group">
                                <label for="name">Karakter Guru<code>*</code></label>
                                <select name="kriteria_id" multiple id="kriteria" class="form-control select2" data-placeholder="Pilih Karakter Guru">
                                    <option disabled>Pilih Karakter </option>
                                    @foreach ($kriterias as $kriteria)
                                            <option value="{{ $kriteria->id }}"> {{ $kriteria->name }}</option>
                                    @endforeach
                                </select>
                                @error('karakter')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="name">Guru<code>*</code></label>
                                    <select name="guru_id" id="guru_id" class="form-control select2">
                                        <option selected disabled>Pilih Guru</option>
                                        @foreach ($gurus as $guru)
                                            <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                        @endforeach
                                </select>
                                @error('guru_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.grade.guru.rating') }}" class="btn btn-danger">Kembali</a>
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
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'Select an option',

        });

        });
    </script>
@endpush
@endsection
