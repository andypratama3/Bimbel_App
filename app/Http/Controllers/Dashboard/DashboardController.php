<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bimbel;
class DashboardController extends Controller
{
    public function __invoke()
    {
        $count_pendaftar = Bimbel::where('status', 0)->count();
        $count_murid = Bimbel::where('status', 2)->count();
        
        return view('dashboard.index', compact('count_pendaftar', 'count_murid'));
    }
}
