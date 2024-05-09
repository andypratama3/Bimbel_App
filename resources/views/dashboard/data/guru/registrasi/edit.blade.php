@extends('layouts.app.dashboard')
@section('title','Detail')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.pendaftar.guru.update', $guru->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                            <div class="row">
                                <h5 class="card-title text-center"><strong>Data Pendaftar Guru</strong></h5>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="nama_anak">Nama</label>
                                            <input type="text" class="form-control" value="{{ $guru->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Nomor Telpon / WhatsApp </label>
                                            <div class="input-group">
                                                <input readonly type="text" class="form-control" name="no_telp" value="{{ $guru->whatsapp }}" readonly>
                                                <a href="https://wa.me/{{ $guru->whatsapp }}" class="btn btn-success"><i class="bi bi-whatsapp"></i> Kirim Pesan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="nama_anak">Mata Pelajaran</label>
                                            <input type="text" class="form-control" value="{{ $guru->mata_pelajaran }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="nama_anak">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="{{ $guru->status }}">Baru Registrasi</option>
                                                <option value="1">Tidak Di Terima</option>
                                                <option value="2">Terima</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group text-center">
                                            <hr>
                                            <label for="nama_anak">CV</label>
                                            <hr>
                                            <iframe src="{{ asset('storage/register-guru/cv/'. $guru->cv) }}" rel="noopener noreferrer nofollow" width="100%" height="1000"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <a href="{{ route('dashboard.datamaster.pendaftar.guru.index') }}" class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-primary float-end">Update</button>
                                    </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
