<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterGuruController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('register_guru.index' , compact('kriteria'));
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


        if(Auth::check()){
            $guru = new Guru();
            $guru->name = $request->name;
            $guru->paket = '1';
            $guru->cv = $file_name;
            $guru->whatsapp = $request->whatsapp;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->user_id = Auth::id();
            $guru->jenjang = $request->jenjang;
            $guru->save();

            $guru->kriteria()->attach($request->kriteria_id);
        }else{
            return redirect()->route('login')->with('error','Login Terlebih Dahalu');
        }

        return redirect()->route('register.guru.status');
    }
}
