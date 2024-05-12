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
        $users = User::select(['email','name','slug','role'])->orderBy('name','asc')->paginate($limit);
        $no = $limit * ($users->currentPage() - 1);
        return view('dashboard.user.index', compact('no','users'));
    }

    public function show(User $user)
    {
        return view('dashboard.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->update();
        return redirect()->route('dashboard.user.index')->with('success','Berhasil Mengupdate User');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.user.index')->with('success','Berhasil Menghapus User');
    }
}
