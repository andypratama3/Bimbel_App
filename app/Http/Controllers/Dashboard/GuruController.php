<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('dashboard.data.guru.index');
    }
    public function create()
    {
        return view('dashboard.data.guru.registrasi.create');
    }
}
