@extends('layouts.app.dashboard')
@section('title','Tambah Siswa')
@section('content')
<form action="{{ route('dashboard.datamaster.siswa.bimbel.store') }}" method="POST">
    @csrf
    <div class="row">
        {{-- @include('layouts.flashmessage') --}}
        <h5 class="card-title text-center"><strong>Tambah Siswa</strong></h5>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="nama_anak">Nama Lengkap Anak <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('nama_anak') ? 'is-invalid' : '' }}" name="nama_anak" value="{{ old('nama_anak') }}">
                    @error('nama_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Jenis Kelamin <code>*</code></label>
                    <select name="jk" id="jk" class="form-control {{ $errors->has('jk') ? 'is-invalid' : '' }}">
                        <option selected disabled>Pilih</option>
                        <option value="Laki-Laki"  @if (old('jk') == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                        <option value="Perempuan"  @if (old('jk') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                    </select>
                    @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="usia_anak">Usia Anak Sekarang <code>*</code></label>
                    <input type="number" class="form-control {{ $errors->has('usia') ? 'is-invalid' : '' }}" name="usia" value="{{ old('usia') }}" placeholder="Masukan Umur Dengan Angka">
                    @error('usia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="kelas_berjalan">Kelas Berjalan <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('kelas_berjalan') ? 'is-invalid' : '' }}" name="kelas_berjalan" value="{{ old('kelas_berjalan') }}" placeholder="">
                    @error('kelas_berjalan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Jenjang Sekolah <code>*</code></label>
                    <select name="jenjang_sekolah" id="jenjang_sekolah" class="form-control {{ $errors->has('jenjang_sekolah') ? 'is-invalid' : '' }}">
                        <option selected disabled>Pilih</option>
                        <option value="Belum Sekolah" @if (old('jenjang_sekolah') == "Belum Sekolah") {{ 'selected' }} @endif>Belum Sekolah</option>
                        <option value="Paud" @if (old('jenjang_sekolah') == "Paud") {{ 'selected' }} @endif>Paud</option>
                        <option value="SD/MI" @if (old('jenjang_sekolah') == "SD/MI") {{ 'selected' }} @endif>SD/MI</option>
                        <option value="SMP/MTS" @if (old('jenjang_sekolah') == "SMP/MTS") {{ 'selected' }} @endif>SMP/MTS</option>
                        <option value="SMA/MAN/SMK" @if (old('jenjang_sekolah') == "SMA/MAN/SMK") {{ 'selected' }} @endif>SMA/MAN/SMK</option>
                    </select>
                </div>
                @error('jenjang_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Bimbingan Konsultasi <code>*</code></label>
                    <select name="bimbingan_konsultasi" id="bimbingan_konsultasi" class="form-control {{ $errors->has('bimbingan_konsultasi') ? 'is-invalid' : '' }}">
                        <option selected disabled>Pilih</option>
                        <option value="Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)" @if (old('bimbingan_konsultasi') == "Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)") {{ 'selected' }} @endif>Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)</option>
                        <option value="Bimbel SD/MI (Kelas 1-6)" @if (old('bimbingan_konsultasi') == "Bimbel SD/MI (Kelas 1-6)") {{ 'selected' }} @endif>Bimbel SD/MI (Kelas 1-6)</option>
                        <option value="Bimbel SMP/MTS (Kelas 7, 8 & 9)" @if (old('bimbingan_konsultasi') == "Bimbel SMP/MTS (Kelas 7, 8 & 9)") {{ 'selected' }} @endif>Bimbel SMP/MTS (Kelas 7, 8 & 9)</option>
                        <option value="Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)" @if (old('bimbingan_konsultasi') == "Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)") {{ 'selected' }} @endif>Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)</option>
                        <option value="Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja" @if (old('bimbingan_konsultasi') == "Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja") {{ 'selected' }} @endif>Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja</option>
                    </select>
                </div>
                @error('bimbingan_konsultasi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Program Les <code>*</code></label>
                    <select name="program_les" id="program_les" class="form-control {{ $errors->has('program_les') ? 'is-invalid' : '' }}">
                        <option selected disabled>Pilih</option>
                        <option value="Regular" @if (old('program_les') == "Regular") {{ 'selected' }} @endif>Regular</option>
                        <option value="Islami" @if (old('program_les') == "Islami") {{ 'selected' }} @endif>Islami</option>
                    </select>
                </div>
                @error('program_les')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <label for="">Jadwal Hari Les <code>*</code></label>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Senin" value="Senin" @if(in_array('Senin', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Senin">Senin</label>
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Selasa" value="Selasa" @if(in_array('Selasa', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Selasa">Selasa</label>
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Rabu" value="Rabu" @if(in_array('Rabu', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Rabu">Rabu</label>
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Kamis" value="Kamis" @if(in_array('Kamis', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Kamis">Kamis</label>
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Jum'at" value="Jum'at" @if(in_array("Jum'at", old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Jum'at">Jum'at</label>
                    <input class="form-check-input" type="checkbox" name="jadwal_hari[]" id="Sabtu" value="Sabtu" @if(in_array('Sabtu', old('jadwal_hari', []))) {{ 'checked' }} @endif>
                    <label class="form-check-label" for="Sabtu">Sabtu</label>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Jumlah Pertemuan Les <code>*</code></label>
                    <select name="jumlah_pertemuan" id="jumlah_pertemuan" class="form-control {{ $errors->has('jumlah_pertemuan') ? 'is-invalid' : '' }}">
                        <option selected disabled>Pilih</option>
                        <option value="8x Pertemuan (2x Les per minggu)" @if (old('jumlah_pertemuan') == "8x Pertemuan (2x Les per minggu)") {{ 'selected' }} @endif>8x Pertemuan (2x Les per minggu)</option>
                        <option value="12x Pertemuan (3x Les per minggu)" @if (old('jumlah_pertemuan') == "12x Pertemuan (3x Les per minggu)") {{ 'selected' }} @endif>12x Pertemuan (3x Les per minggu)</option>
                        <option value="16x Pertemuan (4x Les per minggu)" @if (old('jumlah_pertemuan') == "16x Pertemuan (4x Les per minggu)") {{ 'selected' }} @endif>16x Pertemuan (4x Les per minggu)</option>
                        <option value="20x Pertemuan (5x Les per minggu)" @if (old('jumlah_pertemuan') == "20x Pertemuan (5x Les per minggu)") {{ 'selected' }} @endif>20x Pertemuan (5x Les per minggu)</option>
                    </select>
                </div>
                @error('jumlah_pertemuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Tanggal Mulai <code>*</code></label>
                    <input type="date" class="form-control {{ $errors->has('tanggal_mulai') ? 'is-invalid' : '' }}" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                </div>
                @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Jam Les Privat <code>*</code></label>
                    <input type="time" class="form-control {{ $errors->has('jam_les') ? 'is-invalid' : '' }}" name="jam_les" value="{{ old('jam_les') }}">
                </div>
                @error('jam_les')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Pelajaran Tertentu</label>
                    <input type="text" class="form-control  {{ $errors->has('jam_les') ? 'is-invalid' : '' }}" name="pelajaran_tertentu" value="{{ old('pelajaran_tertentu') }}">
                </div>
                @error('pelajaran_tertentu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Iqro/Al qur'an Jus Berapa Saat ini? <code>*</code></label>
                    <input type="text" class="form-control  {{ $errors->has('mengaji') ? 'is-invalid' : '' }}" name="mengaji" value="{{ old('mengaji') }}">
                </div>
                @error('mengaji')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Alamat Rumah Tempat Tinggal Saat Ini (diisi lengkap) <code>*</code></label>
                    <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="" cols="30" rows="1">{{ old('alamat') }}</textarea>
                </div>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Asal Sekolah <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('asal_sekolah') ? 'is-invalid' : '' }}" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
                </div>
                @error('asal_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Agama <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama" value="{{ old('agama') }}">
                </div>
                @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Nama Orang Tua <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('orang_tua') ? 'is-invalid' : '' }}" name="orang_tua" value="{{ old('orang_tua') }}" placeholder="Bisa salah satu saja yang diisi (Ayah atau Ibu)">
                </div>
                @error('orang_tua')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for="">Nomor Telpon / WhatsApp <code>*</code></label>
                    <input type="text" class="form-control {{ $errors->has('no_telp') ? 'is-invalid' : '' }}" name="no_telp" value="{{ old('no_telp') }}">
                </div>
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for=""><strong>Catatan Anak Didik</strong></label>
                    <input type="text" class="form-control {{ $errors->has('catatan_anak_didik') ? 'is-invalid' : '' }} mt-2" name="catatan_anak_didik" value="{{ old('catatan_anak_didik') }}" placeholder="Catatan Anak Didik">
                </div>
                @error('catatan_anak_didik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mt-2">
                <div class="form-group">
                    <label for=""><strong>Catatan Guru Les</strong></label>
                    <input type="text" class="form-control" name="catatan_guru_les" value="{{ old('catatan_guru_les') }}" placeholder="Catatan Guru Les">
                </div>
            </div>
    </div>
    <div class="col-md-12 mt-5">
        <a href="{{ route('dashboard.datamaster.siswa.bimbel.index') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary float-end">Submit</button>
    </div>
</form>
@endsection
