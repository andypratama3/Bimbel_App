@extends('layouts.app.dashboard')
@section('title','Edit Paket')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Paket</h5>
                <form action="{{ route('dashboard.paket.bimbel.update', $paket->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="form-group"> 
                                <label for="name">Nama Paket <code>*</code></label>
                                <input type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    name="name" value="{{ $paket->name }}">
                                @error('name')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label for="name">Foto <code>*</code></label>
                                <input type="file"
                                    class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                    name="foto" value="{{ $paket->foto }}">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Foto</label>
                            <img src="{{ asset('storage/paket/img/'. $paket->foto) }}" alt="" class="img-fluid">
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
