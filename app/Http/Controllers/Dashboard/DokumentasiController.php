<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bimbel;
use App\Models\Dokumentasi;
use App\Models\Guru;
use Str;
class DokumentasiController extends Controller
{
    public function index()
    {
        $no = 0;
        $userUid = Auth::id();
        $guru = Guru::where('user_id', $userUid)->first();
        if($guru){
            $dokumentasis = Dokumentasi::where('guru_id', $guru->id)->paginate(10);
        }else {
            $dokumentasis = Dokumentasi::orderby('created_at', 'desc')->paginate(20);
        }

        return view('dashboard.dokumentasi.index', compact('dokumentasis','no'));
    }

    public function create()
    {
        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        return view('dashboard.dokumentasi.create', compact('murids'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'bimbel_id' => 'required',
            'foto.*' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
        $userUid = Auth::id();
        $guru = Guru::where('user_id', Auth::id())->first();

        if ($request->foto) {
            $fotorFiles = $request->foto;
            $dokumentasi_name = [];

            foreach ($fotorFiles as $fotorFile) {
                $ext = $fotorFile->getClientOriginalExtension();
                $uniqueIdentifier = Str::random(8);
                $file_name = 'Dokumentasi' . Str::slug($request->name) . '_' . $uniqueIdentifier . '_' . date('YmdHis') . ".$ext";
                $upload_path = public_path('storage/dokumentasi/img/');
                $fotorFile->move($upload_path, $file_name);
                $dokumentasi_name[] = $file_name;
            }
        }
        $dokumentasi = Dokumentasi::create([
            'name' => $request->name,
            'bimbel_id' => $request->bimbel_id,
            'guru_id' => $guru->id,
            'tanggal' => $request->tanggal,
            'foto' => implode(',', $dokumentasi_name),
        ]);

        return redirect()->route('dashboard.dokumentasi.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function show($slug)
    {
        $dokumentasi = Dokumentasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.dokumentasi.show', compact('dokumentasi'));
    }

    public function edit($slug)
    {

        $murids = Bimbel::orderBy('created_at')->where('status', '2')->get();
        $dokumentasi = Dokumentasi::where('slug', $slug)->firstOrFail();
        return view('dashboard.dokumentasi.edit', compact('murids','dokumentasi'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'bimbel_id' => 'required',
            'foto.*' => 'mimes:jpg,jpeg,png|max:2048',
        ]);
        $userUid = Auth::id();
        $guru = Guru::where('user_id', Auth::id())->first();

        $dokumentasi = Dokumentasi::where('slug', $slug)->firstOrFail();

        if ($request->hasFile('foto')) {
            $fotorFiles = $request->file('foto');
            $dokumentasi_name = [];

            foreach ($fotorFiles as $fotorFile) {
                $ext = $fotorFile->getClientOriginalExtension();
                $uniqueIdentifier = Str::random(8);
                $file_name = 'Dokumentasi' . Str::slug($request->name) . '_' . $uniqueIdentifier . '_' . date('YmdHis') . ".$ext";
                $upload_path = public_path('storage/dokumentasi/img/');
                $fotorFile->move($upload_path, $file_name);
                $dokumentasi_name[] = $file_name;
            }

            // hapus foto yang lama
            foreach (explode(',', $dokumentasi->foto) as $foto) {
                $foto_path = public_path('storage/dokumentasi/img/' . $foto);
                if (file_exists($foto_path)) {
                    unlink($foto_path);
                }
            }

            $dokumentasi->update([
                'name' => $request->name,
                'bimbel_id' => $request->bimbel_id,
                'guru_id' => $guru->id,
                'tanggal' => $request->tanggal,
                'foto' => implode(',', $dokumentasi_name),
            ]);
        } else {
            $dokumentasi->update([
                'name' => $request->name,
                'bimbel_id' => $request->bimbel_id,
                'guru_id' => $guru->id,
                'tanggal' => $request->tanggal,
            ]);
        }

        return redirect()->route('dashboard.dokumentasi.index')->with('success', 'Berhasil Mengedit Data');
    }


    public function destroy($slug)
    {
        $dokumentasi = Dokumentasi::where('slug', $slug)->firstOrFail();
        $dokumentasi->delete();
        return redirect()->route('dashboard.dokumentasi.index')->with('success', 'Berhasil Menghapus Data');
    }


}
