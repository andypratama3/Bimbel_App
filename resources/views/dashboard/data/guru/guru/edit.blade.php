@extends('layouts.app.dashboard')
@section('title','Dashboard')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Edit Guru</h5>

              <!-- General Form Elements -->
              <form action="{{ route('dashboard.datamaster.guru.update', $guru->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $guru->name }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">WhatsApp <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="whatsapp" value="{{ $guru->whatsapp }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Mata Pelajaran <code>*</code></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="mata_pelajaran" value="{{ $guru->whatsapp }}" placeholder="Contoh: Ipa,Ips">
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
                    @if(optional($guru->user)->email)
                        <input type="text" class="form-control" name="email" value="{{ $guru->user->email }}">
                    @else
                        <input type="text" class="form-control" name="email" >
                    @endif
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
                    <button type="submit" class="btn btn-primary float-end">Update</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
    </div>
</div>

@endsection
