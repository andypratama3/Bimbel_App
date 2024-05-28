<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index()
    {
        $limit = 20;
        $gurus = Guru::orderBy('created_at')->where('status', '2')->paginate($limit);
        $no = $limit * ($gurus->currentPage() - 1);
        return view('dashboard.data.guru.guru.index', compact('gurus', 'no'));
    }
    public function create()
    {
        return view('dashboard.data.guru.guru.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'mata_pelajaran' => 'required',
            // user register
            'email' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->foto){
            $foto = $request->foto;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/guru/img/');
            $picture_name = 'Guru_'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_photo_path = $picture_name;
        $user->password = bcrypt('guru-bimbel123');
        $user->role = 2;
        $user->save();

        $guru = new Guru();
        $guru->name = $request->name;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->status = 2;
        $guru->paket = '1';
        $guru->foto = $picture_name;
        $guru->user_id = $user->id;
        $guru->jenjang = $request->jenjang;
        $guru->save();
        return redirect()->route('dashboard.datamaster.guru.index')->with('success','Berhasil Menambah Guru');
    }

    public function edit($slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();

        return view('dashboard.data.guru.guru.edit', compact('guru'));
    }
    public function update(Request $request, $slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        // dd($guru);
        $request->validate([
            'name' => 'required',
            'whatsapp' => 'required',
            'mata_pelajaran' => 'required',
            // user register
            'email' => 'required',
        ]);
        if($request->foto){
            $foto = $request->foto;
            $ext = $foto->getClientOriginalExtension();
            //path
            $upload_path = public_path('storage/guru/img/');
            $picture_name = 'Guru_'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $foto->move($upload_path, $picture_name);
        }else{
            $picture_name = $guru->foto;
        }


        $user = User::where('id', $guru->user_id)->firstOrFail();

        $guru->name = $request->name;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->jenjang = $request->jenjang;
        $guru->user_id = $user->id;
        $guru->foto = $picture_name;
        $user->role = $request->role;
        $guru->update();

        return redirect()->route('dashboard.datamaster.guru.index')->with('success','Berhasil Update Guru');
    }
    public function destroy($slug)
    {
        $guru = Guru::where('slug', $slug)->firstOrFail();
        $guru->delete();
        return redirect()->route('dashboard.datamaster.guru.index')->with('success','Berhasil Hapus Guru');

    }
}
