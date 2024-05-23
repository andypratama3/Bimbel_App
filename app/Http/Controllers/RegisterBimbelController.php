<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterBimbelController extends Controller
{
    public function index()
    {
        return view('register_bimbel.index');
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
            'image_pembayaran' => 'required|image',

       ]);

       $jadwal_hari = implode(',', $request->jadwal_hari);
       $image_pembayaran = $request->image_pembayaran;
       if($image_pembayaran){
            $foto = $image_pembayaran;
            $ext = $foto->getClientOriginalExtension();

            //upload foto to folder
            $upload_path = public_path('storage/register-bimbel/img/pembayaran/');
            $picture_name = 'Pembayaran_'.Str::slug($request->nama_anak).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
       }

        if(Auth::check()){
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
                    'user_id' => Auth::user()->id,
                    'image_pembayaran' => $picture_name,
            ]);

            return redirect()->route('register.bimbel.status')->with('Sukses Mendaftar');
        }else{
            return redirect()->route('login')->with('error', 'Login Terlebih Dahulu');
        }
    //    return redirect()->route('register.bimbel.status')->with('Sukses Mendaftar');
    }

    public function status()
    {
        return view('register_bimbel.after-register');
    }

}
