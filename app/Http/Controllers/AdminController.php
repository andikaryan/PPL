<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mitra;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.mitraUser',[
            'users' => User::where('role','mitra')->get(),
            'title' => 'users mitra'
        ]);
    }
}
