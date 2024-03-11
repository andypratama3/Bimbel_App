<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterBimbelController extends Controller
{
    public function index()
    {
        return view('register_bimbel.index');
    }
    public function store(BimbelAction $bimbelAction)
    {
        $bimbelAction->execute($request);
    }
}
