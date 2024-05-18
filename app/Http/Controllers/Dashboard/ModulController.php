<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bimbel;
use App\Models\Modul;
use App\Models\Guru;
class ModulController extends Controller
{
    public function index()
    {
        $no = 0;
        $userUid = Auth::id();
        $guru = Guru::where('user_id', $userUid)->first();
        if($guru){
            $moduls = Modul::where('guru_id', $guru->id)->paginate(10);
        }else {
            $moduls = Modul::orderby('created_at', 'desc')->paginate(20);
        }

        return view('dashboard.modul.index', compact('moduls','no'));
    }

    public function create()
    {
        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        return view('dashboard.modul.create', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $guru = Guru::where('user_id', Auth::id())->first();
        $modul = Modul::create([
            'name' => $request->name,
            'bimbel_id' => $request->bimbel_id,
            'guru_id' => $guru->id,
        ]);

        return redirect()->route('dashboard.modul.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit($slug)
    {

        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        $modul = Modul::where('slug', $slug)->firstOrFail();
        return view('dashboard.modul.edit', compact('murids','modul'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'bimbel_id' => 'required',
        ]);
        $modul = Modul::where('slug', $slug)->firstOrFail();
        $modul->name = $request->name;
        $modul->bimbel_id = $request->bimbel_id;

        $modul->update();

        return redirect()->route('dashboard.modul.index')->with('success', 'Berhasil Mengedit Data');
    }

    public function destroy(Modul $modul)
    {
        $modul->delete();
        return redirect()->route('dashboard.modul.index')->with('success', 'Berhasil Menghapus Data');
    }

    public function updateStatus($id)
    {
        $modul = Modul::find($id);
        $modul->status = $modul->status == 1 ? 2 : 1;
        $modul->update();
        return redirect()->back()->with('success', 'Berhasil Mengubah Status Modul');
    }
}
