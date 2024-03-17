<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class RegisterGuruController extends Controller
{
    public function index()
    {
        return view('register_guru.index');
    }
    public function status()
    {
        return view('register_guru.after-register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'cv' => 'type: pdf',
            'whatsapp' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        if($request->cv){

        }

        $guru = new Guru();
        $guru->name = $request->name;
        $guru->cv = $request->cv;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        // dd($guru);
        $guru->save();

        return redirect()->route('register.guru.status');
    }
}
