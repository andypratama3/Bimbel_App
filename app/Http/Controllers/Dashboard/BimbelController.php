<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BimbelController extends Controller
{
    public function index()
    {
        return view('dashboard.data.bimbel.registrasi.index');
    }

}
