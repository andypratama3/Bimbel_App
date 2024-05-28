<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('dashboard.data.guru.registrasi.edit', compact('guru'));
    }
    public function update(Request $request, $slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        $user = User::where('id', $guru->user_id)->first();
        $user->role = '2';
        $user->update();
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
