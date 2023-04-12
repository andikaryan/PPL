<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\mitra;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $mitra = mitra::where('status','pending')->get();

        return view('admin.mitraUser',[
            // 'users' => user::where('role','mitra')->get(),
            'pending' => mitra::where('status','pending')->get(),
            'active' => mitra::where('status','active')->get(),
            'title' => 'users mitra'
        ]);
    }
}
