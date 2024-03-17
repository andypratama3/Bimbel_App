<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
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
        ]);

        $guru = new Guru();
        $guru->name = $request->name;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->status = '2';
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
        $guru->name = $request->name;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->status = $guru->status;
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
