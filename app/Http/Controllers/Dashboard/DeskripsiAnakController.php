<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bimbel;
use App\Models\DeskripsiAnak;
use App\Models\Guru;
class DeskripsiAnakController extends Controller
{
    public function index()
    {
        $no = 0;
        $userUid = Auth::id();
        $guru = Guru::where('user_id', $userUid)->first();
        if($guru){
            $deskripsis = DeskripsiAnak::where('guru_id', $guru->id)->paginate(10);
        }else {
            $deskripsis = DeskripsiAnak::orderby('created_at', 'desc')->paginate(20);
        }

        return view('dashboard.deskripsi_anak.index', compact('deskripsis','no'));
    }

    public function create()
    {
        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        return view('dashboard.deskripsi_anak.create', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bimbel_id' => 'required',
            'sesi' => 'integer',
            'description' => 'required|min:10|max:5000',
        ]);

        $guru = Guru::where('user_id', Auth::id())->first();

        $DeskripsiAnak = DeskripsiAnak::create([
            'bimbel_id' => $request->bimbel_id,
            'guru_id' => $guru->id,
            'description' => $request->description,
            'sesi' => $request->sesi,
        ]);

        return redirect()->route('dashboard.deskripsi.anak.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function show($slug)
    {
        $deskripsi = DeskripsiAnak::where('slug', $slug)->firstOrFail();
        return view('dashboard.deskripsi_anak.show', compact('deskripsi'));
    }

    public function edit($slug)
    {

        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        $deskripsi = DeskripsiAnak::where('slug', $slug)->firstOrFail();
        return view('dashboard.deskripsi_anak.edit', compact('murids','deskripsi'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'bimbel_id' => 'required',
            'sesi' => 'integer',
            'description' => 'required|min:10|max:5000',
        ]);

        $deskripsiAnak = DeskripsiAnak::where('slug', $slug)->firstOrFail();

        $deskripsiAnak->update([
            'bimbel_id' => $request->bimbel_id,
            'sesi' => $request->sesi,
            'description' => $request->description,
        ]);
        return redirect()->route('dashboard.deskripsi.anak.index')->with('success', 'Berhasil Mengedit Data');
    }


    public function destroy(DeskripsiAnak $DeskripsiAnak)
    {
        $DeskripsiAnak->delete();
        return redirect()->route('dashboard.deskripsi.anak.index')->with('success', 'Berhasil Menghapus Data');
    }


}
