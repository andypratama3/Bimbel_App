<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterGuruController extends Controller
{
    public function index()
    {
        return view('register_guru.index');
    }
}
