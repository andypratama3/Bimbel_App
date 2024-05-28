<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use App\Models\Bimbel;
use App\Models\GradeGuru;
use Illuminate\Support\Facades\Auth;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class GradeGuruController extends Controller
{
    public function index()
    {
        $limit = 15;
        $grades_by_guru = null; // Initialize $grades_by_guru
        $starRatings = null; // Initialize $starRatings
        if(Auth::user()->role == 1){
            $grades = GradeGuru::with('guru')->paginate($limit);
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
        }else{
            $bimbel_id = Auth::id();
            $bimbel_id = Bimbel::where('user_id', $bimbel_id)->first();
            $grades = GradeGuru::with('guru')->where('bimbel_id', $bimbel_id->id)->paginate($limit);

        }
        $no = $limit * ($grades->currentPage() - 1);

        return view('dashboard.grade-guru.index', compact('no','grades','grades_by_guru','starRatings'));
    }

    public function create()
    {
        $kriterias = Kriteria::orderBy('name')->get();
        $bimbel = Bimbel::where('user_id', Auth::id())->first();
        $gurus = Guru::where('status', '2',)->where('jenjang', $bimbel->jenjang_sekolah)->orderBy('name')->get();
        return view('dashboard.grade-guru.create', compact('gurus','kriterias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'kriteria_id' => 'required',
        ]);
        $user_id = Auth::id();
        $bimbel_id = Bimbel::where('user_id', $user_id)->first();
        $guru_id = $request->guru_id;
        $kriteria_id = is_array($request->kriteria_id) ? $request->kriteria_id : [$request->kriteria_id];
        $grade_find = GradeGuru::where('guru_id', $guru_id)->where('bimbel_id', $bimbel_id)->first();
        if(!$grade_find){
            $grade = new GradeGuru();
            $grade->bimbel_id = $bimbel_id->id;
            $grade->guru_id = $guru_id;
            $grade->kriteria_id = implode(',', $kriteria_id);
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
    public function destroy($id)
    {
        $grade = GradeGuru::where('id', $id)->first();
        $grade->delete();
        return redirect()->route('dashboard.grade.guru.index')->with('success','Berhasil Menghapus Murid Dari Grade Guru');


    }
}
