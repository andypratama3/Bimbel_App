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
        $grades = GradeGuru::with('guru')->get();
        $grades_by_guru = $grades->groupBy('guru_id')->map(function ($grades) {
            return $grades->count('siswa_id');
        });


        $starRatings = $grades_by_guru->map(function ($count) {
            $averageGrade = $count / 5;
            if ($averageGrade >= 4.5) {
                return 5; // 5 stars
            } elseif ($averageGrade >= 3.5) {
                return 4; // 4 stars
            } elseif ($averageGrade >= 2.5) {
                return 3; // 3 stars
            } elseif ($averageGrade >= 1.5) {
                return 2; // 2 stars
            } else {
                return 1; // 1 star
            }
        });

        return view('dashboard.grade-guru.index', compact('no','grades','grades_by_guru','starRatings'));
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
        $bimbel_id = $request->bimbel_id;
        $guru_id = $request->guru_id;

        $grade_find = GradeGuru::where('guru_id', $guru_id)->where('bimbel_id', $bimbel_id)->first();
        if(!$grade_find){
            $grade = new GradeGuru();
            $grade->bimbel_id = $bimbel_id;
            $grade->guru_id = $guru_id;
            $grade->save();
            return redirect()->route('dashboard.grade.guru.index')->with('success','Berhasil Menambahkan Grade Guru');
        }else{
            return redirect()->route('dashboard.grade.guru.index')->with('error','Gagal Menambahkan Grade, Murid Sudah Ada Memberi Grade');
        }
    }
    public function show($guru_id)
    {
        $limit = 20;
        $grades = GradeGuru::with('bimbel','guru')->where('guru_id', $guru_id)->paginate($limit);

        $no = $limit * ($grades->currentPage() - 1);

        return view('dashboard.grade-guru.show', compact('grades','no'));
    }
    public function destroy($bimbel_id)
    {
        $grade = GradeGuru::where('bimbel_id', $bimbel_id)->first();
        $grade->delete();
        return redirect()->route('dashboard.grade.guru.index')->with('success','Berhasil Menghapus Murid Dari Grade Guru');


    }
}
