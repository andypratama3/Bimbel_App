<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kriteria;
class KriteriaController extends Controller
{
    public function index()
    {
        $limit = 10;
        $kriterias = Kriteria::orderBy('name')->paginate($limit);
        $count = $kriterias->count();
        $no = $limit * ($kriterias->currentPage() - 1);
        return view('dashboard.kriteria.index', compact('kriterias','no'));
    }

    public function create()
    {
        return view('dashboard.kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $kriteria = Kriteria::create([
            'name' => $request->name,
        ]);

        return redirect()->route('dashboard.kriteria.index')->with('success', 'Berhasil Menambhakan Kriteria');
    }

    public function edit($slug)
    {
        $kriteria = Kriteria::where('slug', $slug)->firstOrFail();
        return view('dashboard.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request,$slug)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $kriteria = Kriteria::where('slug', $slug)->firstOrFail();
        $kriteria->update([
            'name' => $request->name,
        ]);
        return redirect()->route('dashboard.kriteria.index')->with('success', 'Berhasil Menambhakan Update Kriteria');
    }

    public function destroy($slug)
    {
        $kriteria = Kriteria::where('slug', $slug)->firstOrFail();
        $kriteria->delete();

        return redirect()->route('dashboard.kriteria.index')->with('success', 'Berhasil Menghapus Kriteria');
    }
}
