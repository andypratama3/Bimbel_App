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
