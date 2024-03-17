@extends('layouts.app.user')
@section('title', 'Daftar Bimbel')
@push('css')
    <style>
        .ul-font-size{
            font-size: 14px;
        }
        .ul-font-size-pelajaran{
            font-size: 12.5px;
        }
    </style>
@endpush
@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="about mt-5">
    <div class="container">
        <a href="/" class="btn btn-primary mb-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3 text-center" id="pills-tab">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab">Pengisian Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-form-2-tab">Form Pembayaran</a>
                        </li>
                    </ul>
                </div>
                <form action="{{ route('register.bimbel.store') }}" method="POST">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade show active form-1" id="form-1">
                            <div class="row">
                                <h5 class="card-title text-center"><strong>Daftar Bimbel</strong></h5>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="nama_anak">Nama Lengkap Anak <code>*</code></label>
                                            <input type="text" class="form-control" name="nama_anak" value="{{ old('nama_anak') }}">
                                            <div class="invalid-feedback">

                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin <code>*</code></label>
                                            <select name="jk" id="jk" class="form-control">
                                                <option selected disabled>Pilih</option>
                                                <option value="Laki-Laki"  @if (old('jk') == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                                                <option value="Perempuan"  @if (old('jk') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Usia Anak Sekarang <code>*</code></label>
                                            <input type="number" class="form-control" name="usia" value="{{ old('usia') }}" placeholder="Masukan Umur Dengan Angka">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Kelas Berjalan <code>*</code></label>
                                            <input type="text" class="form-control" name="kelas_berjalan" value="{{ old('kelas_berjalan') }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jenjang Sekolah <code>*</code></label>
                                            <select name="jenjang_sekolah" id="jenjang_sekolah" class="form-control">
                                                <option selected disabled>Pilih</option>
                                                <option value="Belum Sekolah" @if (old('jenjang_sekolah') == "Belum Sekolah") {{ 'selected' }} @endif>Belum Sekolah</option>
                                                <option value="Paud" @if (old('jenjang_sekolah') == "Paud") {{ 'selected' }} @endif>Paud</option>
                                                <option value="SD/MI" @if (old('jenjang_sekolah') == "SD/MI") {{ 'selected' }} @endif>SD/MI</option>
                                                <option value="SMP/MTS" @if (old('jenjang_sekolah') == "SMP/MTS") {{ 'selected' }} @endif>SMP/MTS</option>
                                                <option value="SMA/MAN/SMK" @if (old('jenjang_sekolah') == "SMA/MAN/SMK") {{ 'selected' }} @endif>SMA/MAN/SMK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Bimbingan Konsultasi <code>*</code></label>
                                            <select name="bimbingan_konsultasi" id="bimbingan_konsultasi" class="form-control">
                                                <option selected disabled>Pilih</option>
                                                <option value="Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)" @if (old('bimbingan_konsultasi') == "Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)") {{ 'selected' }} @endif>Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)</option>
                                                <option value="Bimbel SD/MI (Kelas 1-6)" @if (old('bimbingan_konsultasi') == "Bimbel SD/MI (Kelas 1-6)") {{ 'selected' }} @endif>Bimbel SD/MI (Kelas 1-6)</option>
                                                <option value="Bimbel SMP/MTS (Kelas 7, 8 & 9)" @if (old('bimbingan_konsultasi') == "Bimbel SMP/MTS (Kelas 7, 8 & 9)") {{ 'selected' }} @endif>Bimbel SMP/MTS (Kelas 7, 8 & 9)</option>
                                                <option value="Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)" @if (old('bimbingan_konsultasi') == "Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)") {{ 'selected' }} @endif>Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)</option>
                                                <option value="Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja" @if (old('bimbingan_konsultasi') == "Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja") {{ 'selected' }} @endif>Bimbel BTQ (Baca Tulis/Alqur'an & Iqro) atau Mengaji saja</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Program Les <code>*</code></label>
                                            <select name="program_les" id="program_les" class="form-control">
                                                <option selected disabled>Pilih</option>
                                                <option value="Regular" @if (old('program_les') == "Regular") {{ 'selected' }} @endif>Regular</option>
                                                <option value="Islami" @if (old('program_les') == "Islami") {{ 'selected' }} @endif>Islami</option>
                                            </select>
                                        </div>
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
                                    <div class="col-md-12 mt-4">
                                        <div class="form-group text-center">
                                            <img src="{{ asset('assets/img/draft-biaya.png') }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Jumlah Pertemuan Les <code>*</code></label>
                                            <select name="jumlah_pertemuan" id="jumlah_pertemuan" class="form-control">
                                                <option selected disabled>Pilih</option>
                                                <option value="8x Pertemuan (2x Les per minggu)" @if (old('jumlah_pertemuan') == "8x Pertemuan (2x Les per minggu)") {{ 'selected' }} @endif>8x Pertemuan (2x Les per minggu)</option>
                                                <option value="12x Pertemuan (3x Les per minggu)" @if (old('jumlah_pertemuan') == "12x Pertemuan (3x Les per minggu)") {{ 'selected' }} @endif>12x Pertemuan (3x Les per minggu)</option>
                                                <option value="16x Pertemuan (4x Les per minggu)" @if (old('jumlah_pertemuan') == "16x Pertemuan (4x Les per minggu)") {{ 'selected' }} @endif>16x Pertemuan (4x Les per minggu)</option>
                                                <option value="20x Pertemuan (5x Les per minggu)" @if (old('jumlah_pertemuan') == "20x Pertemuan (5x Les per minggu)") {{ 'selected' }} @endif>20x Pertemuan (5x Les per minggu)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai <code>*</code></label>
                                            <input type="date" class="form-control" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <ul class="ul-font-size">
                                                <p style="margin: 0 !important;">Note :</p>
                                                <li>Durasi Waktu Belajar 1 Jam 15 Menit (75 Menit) untuk Bimbingan Calistung hingga SMA/SMK baik Program regular maupun islami </li>
                                                <li>Durasi Waktu Belajar 1 Jam (60 Menit) untuk Bimbingan BTQ (Baca Tulis Al-qur'an) dan Mengaji saja</li>
                                                <li>Silahkan memilih waktu les sesuai dengan waktu kerja bimbel kami yakni mulai pukul 8 pagi hingga 7 malam</li>
                                            </ul>
                                            <label for="">Jam Les Privat <code>*</code></label>
                                            <input type="time" class="form-control" name="jam_les" value="{{ old('jam_les') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <ul class="ul-font-size-pelajaran">
                                                <p style="margin: 0 !important;">Note :</p>
                                                <li>Apabila Calistung, maka bisa menulis Calistung (regular) atau Calistung dan BTQ (islami)</li>
                                                <li>Apabila SD/MI, maka bisa menulis Semua Mapel atau Mata pelajaran tertentu saja seperti English</li>
                                                <li>Apabila SMP/MTS, maka bisa memilih maksimal 2 mapel contoh Matematika atau IPA & MTK</li>
                                                <li>Apabila SMA/SMK/MAN, maka bisa memilih 1 mapel contoh BIOLOGI</li>
                                            </ul>
                                            <label for="">Pelajaran Tertentu</label>
                                            <input type="text" class="form-control" name="pelajaran_tertentu" value="{{ old('pelajaran_tertentu') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Iqro/Al qur'an Jus Berapa Saat ini? <code>*</code></label>
                                            <input type="text" class="form-control" name="mengaji" value="{{ old('mengaji') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Alamat Rumah Tempat Tinggal Saat Ini (diisi lengkap) <code>*</code></label>
                                            <textarea class="form-control" name="alamat" id="" cols="30" rows="1">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Asal Sekolah <code>*</code></label>
                                            <input type="text" class="form-control" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Agama <code>*</code></label>
                                            <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for="">Nama Orang Tua <code>*</code></label>
                                            <input type="text" class="form-control" name="orang_tua" value="{{ old('orang_tua') }}" placeholder="Bisa salah satu saja yang diisi (Ayah atau Ibu)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <p style="margin: 0 !important;">Bisa lebih dari 1 nomor. contoh: 0852123XXXX/0813098XXX</p>
                                            <label for="">Nomor Telpon / WhatsApp <code>*</code></label>
                                            <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for=""><strong>Catatan Anak Didik</strong></label>
                                            <p style="margin: 0 !important;">Mohon dibantu isi ya ayah/bunda dengan singkat agar bisa menjadi tambahan informasi untuk guru lesnya nanti. Bagaimana karakter/sifat anak didik saat ini (contoh: anaknya pemalu, dan aktif) atau Bagaimana perkembangan belajar terakhir dari anak didik (contoh: belum mengenal huruf/angka sama sekali, menulis masih kurang rapi, belum bisa penjumlahan/perkalian dll) </p>
                                            <input type="text" class="form-control mt-2" name="catatan_anak_didik" value="{{ old('catatan_anak_didik') }}" placeholder="Catatan Anak Didik">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label for=""><strong>Catatan Guru Les</strong></label>
                                            <p style="margin: 0 !important;">Apabila ada permintaan khusus terkait metode pembelajaran tertentu atau guru les yang akan mengajar ananda. Apabila tidak ada maka abaikan saja tidak usah diisi.</p>
                                            <input type="text" class="form-control" style="margin-top: 75px;" name="catatan_guru_les" value="{{ old('catatan_guru_les') }}" placeholder="Catatan Guru Les">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="">Tahu Info tentang Bimbel Privat Cermat ini dari? </label>
                                            <select name="informasi_bimbel" id="informasi_bimbel" class="form-control">
                                                <option selected disabled>Pilih Informasi</option>
                                                <option value="Rekomendasi dari Teman/Kerabat/Tetangga" @if (old('informasi_bimbel') == "Rekomendasi dari Teman/Kerabat/Tetangga") {{ 'selected' }} @endif>Rekomendasi dari Teman/Kerabat/Tetangga</option>
                                                <option value="Facebook" @if (old('informasi_bimbel') == "Facebook") {{ 'selected' }} @endif>Facebook</option>
                                                <option value="Instagram" @if (old('informasi_bimbel') == "Instagram") {{ 'selected' }} @endif>Instagram</option>
                                                <option value="Telegram" @if (old('informasi_bimbel') == "Telegram") {{ 'selected' }} @endif>Telegram</option>
                                                <option value="Grup WhatsApp" @if (old('informasi_bimbel') == "Grup WhatsApp") {{ 'selected' }} @endif>Grup WhatsApp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <a href="/" class="btn btn-danger">Kembali</a>
                                        <button type="button" id="form-1-btn" class="btn btn-primary float-end">Lanjut</button>
                                    </div>
                            </div>
                        </div>
                        <div class="tab-pane fade form-2" id="form-2">
                            <div class="row">
                                <h5 class="card-title text-center"><strong>Pembayaran</strong></h5>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="">Nomor Rekening</label>
                                            <input type="text" class="form-control" value="BRI : 9876543457689808765" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label for="">Upload Bukti Pembayaran</label>
                                            <div class="mb-3">
                                                <input class="form-control" name="image_pembayaran" type="file" id="">
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @include('layouts.flashmessage')
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <button type="button" id="btn_prev" class="btn btn-danger">Kembali</button>
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- End About Section -->
@push('js')
    <script>
       document.addEventListener('DOMContentLoaded', function () {
        const Button_next = document.getElementById('form-1-btn');
        const btn_prev = document.getElementById('btn_prev');
        const form_1 = document.getElementById('form-1'); // Selecting the individual element
        const form_2 = document.getElementById('form-2'); // Selecting the individual element
        Button_next.addEventListener('click', function() {
            form_1.classList.remove("show", "active");
            form_2.classList.add('show', 'active');
            const nav_form_1 = document.getElementById('pills-home-tab');
            nav_form_1.classList.remove('active');
            const nav_link_form_2 = document.getElementById('pills-form-2-tab');
            nav_link_form_2.classList.add('active');
            window.scrollTo(0, 0); // Scroll to the top of the page

        });
        btn_prev.addEventListener('click', function() {
            form_2.classList.remove("show", "active");
            form_1.classList.add('show', 'active');
            const nav_link_form_2 = document.getElementById('pills-form-2-tab');
            nav_link_form_2.classList.remove('active');
            const nav_form_1 = document.getElementById('pills-home-tab');
            nav_form_1.classList.add('active');
            window.scrollTo(0, 0); // Scroll to the top of the page

        });
    });

    </script>
@endpush
@endsection
