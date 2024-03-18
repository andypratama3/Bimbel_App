@extends('layouts.app.dashboard')
@section('title','Detail')
@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.datamaster.pendaftar.bimbel.update', $bimbel->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="row">
                                <h5 class="card-title text-center"><strong>Data Pendaftar</strong></h5>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="nama_anak">Nama Lengkap Anak <code>*</code></label>
                                            <input type="text" class="form-control" name="nama_anak" value="{{ $bimbel->nama_anak }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin <code>*</code></label>
                                            <select name="jk" id="jk" class="form-control">
                                                <option selected value="{{ $bimbel->jk }}">{{ $bimbel->jk }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Usia Anak Sekarang <code>*</code></label>
                                            <input type="number" class="form-control" name="usia" value="{{ $bimbel->usia }}" placeholder="Masukan Umur Dengan Angka">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Kelas Berjalan <code>*</code></label>
                                            <input type="text" class="form-control" name="kelas_berjalan" value="{{ $bimbel->kelas_berjalan }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jenjang Sekolah <code>*</code></label>
                                            <select name="jenjang_sekolah" id="jenjang_sekolah" class="form-control">
                                                <option selected value="{{ $bimbel->jenjang_sekolah }}">{{ $bimbel->jenjang_sekolah }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Bimbingan Konsultasi <code>*</code></label>
                                            <select name="bimbingan_konsultasi" id="bimbingan_konsultasi" class="form-control">
                                                <option selected value="{{ $bimbel->bimbingan_konsultasi }}">{{ $bimbel->bimbingan_konsultasi }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Program Les <code>*</code></label>
                                            <select name="program_les" id="program_les" class="form-control">
                                                <option selected value="{{ $bimbel->program_les }}">{{ $bimbel->program_les }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Jadwal Hari Les <code>*</code></label>
                                        <div class="form-group">
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Senin" value="Senin" @if(in_array('Senin', $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Senin">Senin</label>
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Selasa" value="Selasa" @if(in_array('Selasa', $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Selasa">Selasa</label>
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Rabu" value="Rabu" @if(in_array('Rabu', $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Rabu">Rabu</label>
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Kamis" value="Kamis" @if(in_array('Kamis', $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Kamis">Kamis</label>
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Jum'at" value="Jum'at" @if(in_array("Jum'at", $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Jum'at">Jum'at</label>
                                            <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Sabtu" value="Sabtu" @if(in_array('Sabtu', $jadwal_hari)) {{ 'checked' }} @endif>
                                            <label class="form-check-label" for="Sabtu">Sabtu</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jumlah Pertemuan Les <code>*</code></label>
                                            <select name="jumlah_pertemuan" id="jumlah_pertemuan" class="form-control">
                                                <option selected value="{{ $bimbel->jumlah_pertemuan }}">{{ $bimbel->jumlah_pertemuan }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai <code>*</code></label>
                                            <input type="date" class="form-control" name="tanggal_mulai" value="{{ $bimbel->tanggal_mulai }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jam Les Privat <code>*</code></label>
                                            <input type="time" class="form-control" name="jam_les" value="{{ $bimbel->jam_les }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Pelajaran Tertentu</label>
                                            <input type="text" class="form-control" name="pelajaran_tertentu" value="{{ $bimbel->pelajaran_tertentu }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Iqro/Al qur'an Jus Berapa Saat ini? <code>*</code></label>
                                            <input type="text" class="form-control" name="mengaji" value="{{ $bimbel->mengaji }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Alamat Rumah Tempat Tinggal Saat Ini (diisi lengkap) <code>*</code></label>
                                            <textarea class="form-control" name="alamat" id="" cols="30" rows="1">{{ $bimbel->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Asal Sekolah <code>*</code></label>
                                            <input type="text" class="form-control" name="asal_sekolah" value="{{ $bimbel->asal_sekolah }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Agama <code>*</code></label>
                                            <input type="text" class="form-control" name="agama" value="{{ $bimbel->agama }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Nama Orang Tua <code>*</code></label>
                                            <input type="text" class="form-control" name="orang_tua" value="{{ $bimbel->orang_tua }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Nomor Telpon / WhatsApp <code>*</code></label>
                                            <input type="text" class="form-control" name="no_telp" value="{{ $bimbel->no_telp }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for=""><strong>Catatan Anak Didik</strong></label>
                                            <input type="text" class="form-control mt-2" name="catatan_anak_didik" value="{{ $bimbel->catatan_anak_didik }}" placeholder="Catatan Anak Didik">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for=""><strong>Catatan Guru Les</strong></label>
                                            <input type="text" class="form-control" name="catatan_guru_les" value="{{ $bimbel->catatan_guru_les }}" placeholder="Catatan Guru Les">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="">Tahu Info tentang Bimbel Privat Cermat ini dari? </label>
                                            <select name="informasi_bimbel" id="informasi_bimbel" class="form-control">
                                                <option selected value="{{ $bimbel->informasi_bimbel }}">{{ $bimbel->informasi_bimbel }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if($bimbel->image_pembayaran != null)
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group text-center">
                                            <label for="">Bukti Pembayaran</label>
                                            <img src="{{ asset('storage/register-bimbel/img/pembayaran/'. $bimbel->image_pembayaran) }}" alt="" class="img-fluid">
                                        </div>
                                        <a href="{{ asset('storage/register-bimbel/img/pembayaran/'. $bimbel->image_pembayaran) }}" download="{{ $bimbel->image_pembayaran }}" class="btn btn-primary mt-2">Download</a>
                                    </div>
                                    @else
                                    @endif
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Konfirmasi Siswa</label>
                                            <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                                <option selected disabled>Pilih Konfirmasi</option>
                                                <option value="0">Tolak</option>
                                                <option value="1">Belum Di Terima</option>
                                                <option value="2">Terima</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <a href="{{ route('dashboard.datamaster.pendaftar.bimbel.index') }}" class="btn btn-danger">Kembali</a>
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
