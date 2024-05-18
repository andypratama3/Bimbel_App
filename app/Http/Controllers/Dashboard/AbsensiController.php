<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Bimbel;
use App\Models\Guru;
use Str;
class AbsensiController extends Controller
{
    public function index()
    {
        $no = 0;
        $userUid = Auth::id();
        $guru = Guru::where('user_id', $userUid)->first();
        if($guru){
            $absensis = Absensi::where('guru_id', $guru->id)->paginate(10);
        }else {
            $absensis = Absensi::orderby('created_at', 'desc')->paginate(20);
        }

        return view('dashboard.absensi.index', compact('absensis','no'));
    }

    public function create()
    {
        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        return view('dashboard.absensi.create', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'sesi' => 'required',
            'foto_absen' => 'required',
        ]);

        $guru = Guru::where('user_id', Auth::id())->first();

        $picture = $request->foto_absen;
        if($picture){
            $foto = $picture;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/absen/img/');
            $picture_name = 'Absen'.Str::slug($request->tanggal_mulai . $request->tanggal_selesai) .'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }
        $absen = Absensi::create([
            'bimbel_id' => $request->bimbel_id,
            'guru_id' => $guru->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'sesi' => $request->sesi,
            'foto_absen' => $picture_name,
        ]);

        return redirect()->route('dashboard.absensi.index')->with('success', 'Berhasil Menambahkan Data Absen');
    }

    public function show($id)
    {
        $absensi = Absensi::where('id', $id)->firstOrFail();
        return view('dashboard.absensi.show', compact('absensi'));
    }
    public function edit($id)
    {

        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        $absensi = Absensi::where('id', $id)->firstOrFail();
        return view('dashboard.absensi.edit', compact('murids','absensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bimbel_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'sesi' => 'required',
        ]);
        $absen = Absensi::where('id', $id)->firstOrFail();
        $guru = Guru::where('user_id', Auth::id())->first();

        $picture = $request->foto_absen;
        if($picture){
            $foto = $picture;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/absen/img/');
            $picture_name = 'Absen'.Str::slug($request->tanggal_mulai . $request->tanggal_selesai) .'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
            $absen->foto_absen = $picture_name;
        }

        $absen->bimbel_id = $request->bimbel_id;
        $absen->guru_id = $guru->id;
        $absen->tanggal_mulai = $request->tanggal_mulai;
        $absen->tanggal_selesai = $request->tanggal_selesai;
        $absen->sesi = $request->sesi;
        $absen->save();

        return redirect()->route('dashboard.absensi.index')->with('success', 'Berhasil Mengedit Data Absen');
    }

    public function destroy($id)
    {
        $absen = Absensi::where('id', $id)->firstOrFail();
        $absen->delete();
        return redirect()->route('dashboard.absensi.index')->with('success', 'Berhasil Menghapus Data');
    }

}
