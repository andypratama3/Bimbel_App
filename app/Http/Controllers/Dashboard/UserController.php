<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $limit = 20;
        $users = User::select(['email','name','slug'])->orderBy('name','asc')->paginate($limit);
        $no = $limit * ($users->currentPage() - 1);
        return view('dashboard.user.index', compact('no','users'));
    }
    public function show(User $user)
    {
        return view('dashboard.user.show', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.user.index')->with('success','Berhasil Menghapus User');
    }
}
