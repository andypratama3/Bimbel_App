<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd($user->profile_photo_url);
        $guru = Guru::where('user_id', $user->id)->first();
        return view('dashboard.profile.index', compact('user', 'guru'));
    }
}
