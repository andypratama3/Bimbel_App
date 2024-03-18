<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\PaketBimbel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaketBimbelController extends Controller
{
    public function index()
    {
        $limit = 15;
        $pakets = PaketBimbel::select(['name','foto','slug'])->paginate($limit);
        $no = $limit * ($pakets->currentPage() - 1);
        return view('dashboard.paket-bimbel.index', compact('no','pakets'));
    }
    public function create()
    {
        return view('dashboard.paket-bimbel.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'foto' => 'required'
        ]);

        $picture = $request->foto;
        if($picture){
            $foto = $picture;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/paket/img/');
            $picture_name = 'Pembayaran_'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }

        $paket = new PaketBimbel();
        $paket->name = $request->name;
        $paket->foto = $picture_name;
        $paket->save();

        return redirect()->route('dashboard.paket.bimbel.index')->with('success','Berhasil Menambah Paket');
    }
    public function edit($slug)
    {
        $paket = PaketBimbel::where('slug', $slug)->firstOrFail();
        return view('dashboard.paket-bimbel.edit', compact('paket'));
    }
    public function update(Request $request,$slug)
    {
        $paket = PaketBimbel::where('slug', $slug)->firstOrFail();
        $picture = $request->foto;
        if($picture ){
            $foto = $picture;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/paket/img/');
            $picture_name = 'Pembayaran_'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }else

        $paket = new PaketBimbel();
        $paket->name = $request->name;
        $paket->foto = $picture_name;
        $paket->update();

        return redirect()->route('dashboard.paket.bimbel.index')->with('success','Berhasil Update Paket');

    }
    public function destroy($slug)
    {
        $paket = PaketBimbel::where('slug', $slug)->firstOrFail();
        $paket->delete();
        return redirect()->route('dashboard.paket.bimbel.index')->with('success','Berhasil Hapus Paket');

    }
}
