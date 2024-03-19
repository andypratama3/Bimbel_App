<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\PaketBimbel;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function __invoke()
    {
        $gurus = Guru::where('status', '2')->get();
        $pakets = PaketBimbel::select(['name','foto','slug'])->get();
        return view('welcome', compact('pakets', 'gurus'));
    }

}
