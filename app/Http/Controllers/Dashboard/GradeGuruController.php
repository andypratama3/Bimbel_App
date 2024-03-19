<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use App\Models\Bimbel;
use App\Models\GradeGuru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeGuruController extends Controller
{
    public function index()
    {
        $no = 0;
        $grades = GradeGuru::all();
        $count = $grades->count();
        $siswa = $grades->where('bimbel_id')->count();
        $guru = $grades->where('guru_id')->count();

        return view('dashboard.grade-guru.index', compact('no','grades'));
    }
    public function create()
    {
        $bimbels = Bimbel::where('status', '2')->orderBy('nama_anak')->get();
        $gurus = Guru::where('status', '2')->orderBy('name')->get();
        return view('dashboard.grade-guru.create', compact('bimbels', 'gurus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'bimbel_id' => 'required',
            'guru_id' => 'required',
        ]);
        $grade = new GradeGuru();

        $grade->bimbel_id = $request->bimbel_id;
        $grade->guru_id = $request->guru_id;
        $grade->save();
        return redirect()->route('dashboard.grade.guru.index')->with('success','Berhasil Menambahkan Grade Guru');
    }
}
