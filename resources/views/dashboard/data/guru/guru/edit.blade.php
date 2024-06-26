@extends('layouts.app.dashboard')
@section('title','Dashboard')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Edit Guru</h5>
                @include('layouts.flashmessage')
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
                    <label for="" class="col-sm-2 col-form-label">Jenjang <code>*</code></label>
                    <div class="col-sm-10">
                        <select name="jenjang" id="" class="form-control">
                            <option selected value="{{ $guru->jenjang }}">{{ $guru->jenjang }}</option>
                            <option value="Belum Sekolah" @if (old('jenjang_sekolah') == "Belum Sekolah") {{ 'selected' }} @endif>Belum Sekolah</option>
                            <option value="Paud" @if (old('jenjang_sekolah') == "Paud") {{ 'selected' }} @endif>Paud</option>
                            <option value="SD/MI" @if (old('jenjang_sekolah') == "SD/MI") {{ 'selected' }} @endif>SD/MI</option>
                            <option value="SMP/MTS" @if (old('jenjang_sekolah') == "SMP/MTS") {{ 'selected' }} @endif>SMP/MTS</option>
                            <option value="SMA/MAN/SMK" @if (old('jenjang_sekolah') == "SMA/MAN/SMK") {{ 'selected' }} @endif>SMA/MAN/SMK</option>
                        </select>
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
                    <input type="file" class="form-control" name="foto" value="{{ $guru->foto }}">
                  </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="" class="text-center">Priview</label>
                    <img src="{{ asset('storage/guru/img/'. $guru->foto) }}" alt="" style="width: 100%">
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
