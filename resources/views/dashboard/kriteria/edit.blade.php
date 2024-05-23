@extends('layouts.app.dashboard')
@section('title','Edit Kriteria')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Kriteria</h5>
                <form action="{{ route('dashboard.kriteria.update', $kriteria->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="name">Kriteria <code>*</code></label>
                                <input type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    name="name" value="{{ $kriteria->name }}">
                                @error('name')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <a href="{{ route('dashboard.paket.bimbel.index') }}" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
