<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Guru;
use App\Models\GuruBimbel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MuridBimbel extends Controller
{
    public function index()
    {

        $limit = 10;
        $guru = Guru::where('user_id', Auth::id())->first();
        $murid_list = GuruBimbel::where('guru_id', $guru->id)->orderBy('created_at', 'desc')->paginate($limit);
        $count = GuruBimbel::where('guru_id', $guru->id)->count();
        $no = $limit * ($murid_list->currentPage() - 1);
        return view('dashboard.murid.index', compact('murid_list', 'no', 'count'));
    }
}
