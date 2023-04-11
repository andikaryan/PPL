<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function mitra()
    {
        return view('login.mitra', [
            'title' => 'login mitra'
        ]);
    }

    public function loginMitra(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email:dns',
            'password'  => 'required | min:5 | max:255'
        ]);
        try {
            if(Auth::attempt($credentials)){
            // Auth::attempt($credentials);
            $request->session()->regenerate();
            return redirect()->intended('/m/dashboard');}
            else{
                return back()->with('loginError', 'Login gagal');
            }
        } catch (Exception $err) {
            return back()->with('loginError', $err->getMessage());
        }
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
}
