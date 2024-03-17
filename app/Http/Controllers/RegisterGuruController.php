<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Support\Str;
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

       $file_cv = $request->cv;
       if($file_cv){
            $file = $file_cv;
            $ext = $file->getClientOriginalExtension();

            //upload file to folder
            $upload_path = public_path('storage/register-guru/cv/');
            $file_name = 'Cv_'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $file->move($upload_path, $file_name);
       }

        $guru = new Guru();
        $guru->name = $request->name;
        $guru->cv = $file_name;
        $guru->whatsapp = $request->whatsapp;
        $guru->mata_pelajaran = $request->mata_pelajaran;
        $guru->save();

        return redirect()->route('register.guru.status');
    }
}
