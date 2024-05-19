<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bimbel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\BimbelExport;
use Maatwebsite\Excel\Facades\Excel;
class SiswaBimbelController extends Controller
{
    public function index()
    {
        $limit = 20;
        $register_Data = Bimbel::orderBy('created_at')->where('status', '2')->paginate($limit);
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
       $register = Bimbel::create([
            'nama_anak' => $request->nama_anak,
            'jk' => $request->jk,
            'usia' => $request->usia,
            'kelas_berjalan' => $request->kelas_berjalan,
            'jenjang_sekolah' => $request->jenjang_sekolah,
            'bimbingan_konsultasi' => $request->bimbingan_konsultasi,
            'program_les' => $request->program_les,
            'jumlah_pertemuan' => $request->jumlah_pertemuan,
            'jadwal_hari' => $jadwal_hari,
            'jam_les' => $request->jam_les,
            'tanggal_mulai' => $request->tanggal_mulai,
            'pelajaran_tertentu' => $request->pelajaran_tertentu,
            'mengaji' => $request->mengaji,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'agama' => $request->agama,
            'orang_tua' => $request->orang_tua,
            'no_telp' => $request->no_telp,
            'catatan_anak_didik' => $request->catatan_anak_didil,
            'catatan_guru_les' => $request->catatan_guru_les,
            'informasi_bimbel' => $request->informasi_bimbel,
            'status' => 2,
       ]);
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

        $jadwal_hari = implode(',', $request->jadwal_hari);

        $bimbel->nama_anak = $request->nama_anak;
        $bimbel->jk = $request->jk;
        $bimbel->usia = $request->usia;
        $bimbel->kelas_berjalan = $request->kelas_berjalan;
        $bimbel->jenjang_sekolah = $request->jenjang_sekolah;
        $bimbel->bimbingan_konsultasi = $request->bimbingan_konsultasi;
        $bimbel->program_les = $request->program_les;
        $bimbel->jumlah_pertemuan = $request->jumlah_pertemuan;
        $bimbel->jadwal_hari = $jadwal_hari;
        $bimbel->jam_les = $request->jam_les;
        $bimbel->tanggal_mulai = $request->tanggal_mulai;
        $bimbel->pelajaran_tertentu = $request->pelajaran_tertentu;
        $bimbel->mengaji = $request->mengaji;
        $bimbel->alamat = $request->alamat;
        $bimbel->asal_sekolah = $request->asal_sekolah;
        $bimbel->agama = $request->agama;
        $bimbel->orang_tua = $request->orang_tua;
        $bimbel->no_telp = $request->no_telp;
        $bimbel->catatan_anak_didik = $request->catatan_anak_didil;
        $bimbel->catatan_guru_les = $request->catatan_guru_les;
        $bimbel->informasi_bimbel = $request->informasi_bimbel;
        $bimbel->status = 2;

        $bimbel->update();
        return redirect()->route('dashboard.datamaster.siswa.bimbel.index')->with('success','Berhasil Update Data');

    }
    public function destroy($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $bimbel->delete();
        return redirect()->route('dashboard.datamaster.siswa.bimbel.index')->with('success','Berhasil Menghapus Data');
    }

    public function exportExcel()
    {
        return Excel::download(new BimbelExport, 'bimbel.xlsx');
    }
}
