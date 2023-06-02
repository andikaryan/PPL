<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\mitra;

class isMitraValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = mitra::where('user_id', auth()->user()->id)->first();
        if(!auth()->check() || auth()->user()->role !== 'mitra' || $user->status === 'pending'){
            return redirect()->intended('/m/dashboard')->with('alert', 'lengkapi akun dan tunggu sampai akunmu diverifikasi untuk mengakses fitur tersebut!');
        }
        return $next($request);
    }
}
