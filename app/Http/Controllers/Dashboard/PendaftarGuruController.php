<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendaftarGuruController extends Controller
{
    public function index( )
    {
        $limit = 20;
        $gurus = Guru::orderBy('created_at')->where('status', '0')->paginate($limit);
        $no = $limit * ($gurus->currentPage() - 1);
        return view('dashboard.data.guru.registrasi.index', compact('no','gurus'));
    }
    public function edit($slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        // dd(public_path('storage/register-guru/cv/'.$guru->cv));
        return view('dashboard.data.guru.registrasi.edit', compact('guru'));
    }
    public function update(Request $request, $slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        $guru->status = $request->status;
        $guru->update();
        return redirect()->route('dashboard.datamaster.pendaftar.guru.index')->with('success','Berhasil Update Data');

    }
    public function destroy($slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        $guru->delete();
        return redirect()->route('dashboard.datamaster.pendaftar.guru.index')->with('success','Berhasil Menghapus Data');
    }
}
