<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\mitra;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function mitra()
    {
        return view('register.mitra', [
            'title' => 'Register'
        ]);
    }

    public function regisMitra(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'email'        => 'required | email | unique:users',
            'password'     => 'required | min:5 | max:8'
        ]);

        $createUser = [
            'name'   => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'mitra',
        ];
        
        $user = User::create($createUser);

        $request->validate([
            'no_hp' => 'min:11 | max:13 | required',
            'nama_usaha' => 'required | max:255',
        ]);

        mitra::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
            'nama_usaha' => $request->nama_usaha,
        ]);
        var_dump($request->all());
        $request->session()->flash('success', 'Berhasil menambahkan akun, Silakan Login!');
        return redirect('/login');
    }
}
