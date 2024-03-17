<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bimbel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaBimbelController extends Controller
{
    public function index()
    {
        $limit = 20;
        $register_Data = Bimbel::orderBy('created_at')->where('status', '1')->paginate($limit);
        $no = $limit * ($register_Data->currentPage() - 1);
        return view('dashboard.data.bimbel.siswa.index', compact('register_Data','no'));
    }
    public function create()
    {
        return view('dashboard.data.bimbel.siswa.create');
    }
    public function store(Request $request)
    {
        $request->validate([
                'nama_anak' => 'required',
                'jk' => 'required',
                'usia' => 'required',
                'kelas_berjalan' => 'required',
                'jenjang_sekolah' => 'required',
                'bimbingan_konsultasi' => 'required',
                'program_les' => 'required',
                'jumlah_pertemuan' => 'required',
                'jadwal_hari' => 'required',
                'jam_les' => 'required',
                'tanggal_mulai' => 'required',
                'pelajaran_tertentu' => 'required',
                'mengaji' => 'required',
                'alamat' => 'required',
                'asal_sekolah' => 'required',
                'agama' => 'required',
                'orang_tua' => 'required',
                'no_telp' => 'required',
        ]);

        $jadwal_hari = implode(',', $request->jadwal_hari);
        $register = new Bimbel();
        $register->nama_anak = $request->nama_anak;
        $register->jk = $request->jk;
        $register->usia = $request->usia;
        $register->kelas_berjalan = $request->kelas_berjalan;
        $register->jenjang_sekolah = $request->jenjang_sekolah;
        $register->bimbingan_konsultasi = $request->bimbingan_konsultasi;
        $register->program_les = $request->program_les;
        $register->jumlah_pertemuan = $request->jumlah_pertemuan;
        $register->jadwal_hari = $jadwal_hari;
        $register->jam_les = $request->jam_les;
        $register->tanggal_mulai = $request->tanggal_mulai;
        $register->pelajaran_tertentu = $request->pelajaran_tertentu;
        $register->mengaji = $request->mengaji;
        $register->alamat = $request->alamat;
        $register->asal_sekolah = $request->asal_sekolah;
        $register->agama = $request->agama;
        $register->orang_tua = $request->orang_tua;
        $register->no_telp = $request->no_telp;
        $register->catatan_anak_didik = $request->catatan_anak_didil;
        $register->catatan_guru_les = $request->catatan_guru_les;
        $register->informasi_bimbel = $request->informasi_bimbel;
        $register->save();
        
        return redirect()->route('dashboard.datamaster.siswa.bimbel.index')->with('success','Berhasil Menambah Siswa');
    }
    public function show($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $jadwal_hari = explode(',',$bimbel->jadwal_hari);
        return view('dashboard.data.bimbel.siswa.show', compact('bimbel','jadwal_hari'));
    }
    public function edit($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $jadwal_hari = explode(',',$bimbel->jadwal_hari);
        return view('dashboard.data.bimbel.siswa.edit', compact('bimbel','jadwal_hari'));
    }
    public function update(Request $request,$slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $bimbel->status = $request->status;
        $bimbel->update();
        return redirect()->route('dashboard.datamaster.siswa.bimbel.index')->with('success','Berhasil Update Data');

    }
    public function destroy($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $bimbel->delete();
        return redirect()->route('dashboard.datamaster.siswa.bimbel.index')->with('success','Berhasil Menghapus Data');
    }
}
