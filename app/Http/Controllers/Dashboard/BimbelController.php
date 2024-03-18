<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Bimbel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BimbelController extends Controller
{
    public function index()
    {
        $limit = 20;
        $register_Data = Bimbel::orderBy('created_at','asc')->where('status', '0')->paginate($limit);
        $no = $limit * ($register_Data->currentPage() - 1);
        return view('dashboard.data.bimbel.registrasi.index', compact('register_Data','no'));
    }

    public function show($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $jadwal_hari = explode(',',$bimbel->jadwal_hari);
        return view('dashboard.data.bimbel.registrasi.show', compact('bimbel','jadwal_hari'));
    }
    public function edit($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $jadwal_hari = explode(',',$bimbel->jadwal_hari);
        return view('dashboard.data.bimbel.registrasi.edit', compact('bimbel','jadwal_hari'));
    }
    public function update(Request $request,$slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $request->validate([
                'status' => 'required',
        ]);
        $bimbel->status = $request->status;
        $bimbel->update();
        return redirect()->route('dashboard.datamaster.pendaftar.bimbel.index')->with('success','Berhasil Update Data');

    }
    public function destroy($slug)
    {
        $bimbel = Bimbel::where('slug', $slug)->firstOrFail();
        $bimbel->delete();
        return redirect()->route('dashboard.datamaster.pendaftar.bimbel.index')->with('success','Berhasil Menghapus Data');
    }
}
