<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftarGuruController extends Controller
{
    public function index( )
    {
        return view('dashboard.data.pendafataran-guru.index');
    }
}
