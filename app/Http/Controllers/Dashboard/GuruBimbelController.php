<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GuruBimbel;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use App\Models\Bimbel;
class GuruBimbelController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $bimbel = Bimbel::where('user_id', $user_id)->first();

        $guru_bimbel = GuruBimbel::where('bimbel_id', $bimbel->id)->get();
        if(!$guru_bimbel)
        {
            return redirect()->route('dashboard')->with('error','Silahkan Daftarkan Murid Terlebih Dahulu');
        }
        return view('dashboard.guru.index', compact('guru_bimbel'));
    }

    public function create()
    {
        $gurus = Guru::orderBy('name', 'asc','foto')->paginate(5);
        return view('dashboard.guru.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'jadwal_hari' => 'required',
            'jam_les' => 'required',
        ]);
        $jadwal_hari = implode(',', $request->jadwal_hari);

        $bimbel = Bimbel::where('user_id', Auth::id())->first();
        $guru_bimbel = new GuruBimbel();
        $guru_bimbel->bimbel_id = $bimbel->id;
        $guru_bimbel->guru_id = $request->guru_id;
        $guru_bimbel->bimbel_id = $bimbel->id;
        $guru_bimbel->jadwal_hari = $jadwal_hari;
        $guru_bimbel->jam_les = $request->jam_les;
        $guru_bimbel->save();
        return redirect()->route('dashboard.guru.index')->with('success', 'Data Berhasilt ditambahkan');
    }
}
