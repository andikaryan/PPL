<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvestorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraBlogController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\isAdmin;
use App\Models\mitra;

Route::get('/', function () {
    return view('homepage',[
        "title" => "Home"
    ]);
});

Route::get('/m/dashboard',[MitraController::class,'index'])->middleware('auth');
Route::get('/m/blog/checkSlug',[MitraBlogController::class,'checkSlug'])->middleware('mitra');
Route::resource('/m/blog', MitraBlogController::class)->middleware('mitra');
Route::get('/m/register',[RegisterController::class,'mitra'])->middleware('guest');
Route::post('/m/register',[RegisterController::class,'regisMitra']);

Route::resource('/investor', InvestorController::class);

Route::get('/a/users',[AdminController::class,'index'])->middleware('admin');

Route::get('/login',[LoginController::class,'mitra'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'loginMitra']);
Route::post('/logout',[LoginController::class,'logout']);







 
