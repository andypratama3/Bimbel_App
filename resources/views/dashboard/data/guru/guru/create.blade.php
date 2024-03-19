@extends('layouts.app.dashboard')
@section('title','Dashboard')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Tambah Guru</h5>

              <!-- General Form Elements -->
              <form action="{{ route('dashboard.datamaster.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">WhatsApp <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Mata Pelajaran <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mata_pelajaran" value="{{ old('mata_pelajaran') }}" placeholder="Contoh: Ipa,Ips">
                  </div>
                </div>

                {{-- register user for login --}}
                <div class="col-md-12 text-center">
                    <hr>
                    <h4>Registrasi User</h4>
                    <hr>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Email <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Foto <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" value="{{ old('foto') }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-12">
                    <a href="{{ route('dashboard.datamaster.guru.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
    </div>
</div>

@endsection
