<?php

use App\Http\Controllers\AdminAkunController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInvestorController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\InvestorAkunController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\InvestorKtpController;
use App\Http\Controllers\InvestorProfilController;
use App\Http\Controllers\InvestorProyekController;
use App\Http\Controllers\InvestorTransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraAkunController;
use App\Http\Controllers\MitraBlogController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MitraKtpController;
use App\Http\Controllers\MitraProfilController;
use App\Http\Controllers\MitraProyek;
use App\Http\Controllers\MitraProyekController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\isAdmin;
use App\Models\mitra;

Route::get('/', function () {
    return view('homepage',[
        "title" => "Home"
    ]);
});

Route::get('/m/blog/checkSlug',[MitraBlogController::class,'checkSlug'])->middleware('mitra');
Route::get('/m/register',[RegisterController::class,'mitra'])->middleware('guest');
Route::post('/m/register',[RegisterController::class,'regisMitra']);
Route::get('/i/register',[RegisterController::class,'Investor'])->middleware('guest');
Route::post('/i/register',[RegisterController::class,'regisInvestor']);

// Dashboard
Route::get('/m/dashboard',[MitraController::class,'index'])->middleware('auth');

// Investor
Route::resource('i/blog', BlogController::class)->middleware('investor');
Route::resource('i/akun', InvestorAkunController::class)->middleware('investor');
Route::resource('i/ktp', InvestorKtpController::class)->middleware('investor');
Route::resource('i/proyek', InvestorProyekController::class)->middleware('investor');
Route::resource('i/profil', InvestorProfilController::class)->middleware('investor');
Route::resource('i/transaksi', InvestorTransaksiController::class)->middleware('investor');
Route::get('/i/transaksi/create/{id}',[InvestorTransaksiController::class,'create']);
// Route::post('/i/transaksi/{id}',[InvestorTransaksiController::class,'store']);
// Admin
Route::resource('/a/mitra',AdminController::class)->middleware('admin');
Route::resource('/a/investor',AdminInvestorController::class)->middleware('admin');
Route::resource('/a/blog',AdminBlogController::class)->middleware('admin');
Route::resource('/a/akun',AdminAkunController::class)->middleware('admin');
Route::resource('/a/proyek',AdminProyekController::class)->middleware('admin');
Route::resource('a/profil', AdminProfilController::class)->middleware('admin');

// Mitra
Route::resource('/m/blog', MitraBlogController::class)->middleware('mitra');
Route::resource('/m/proyek', MitraProyekController::class)->middleware('mitra');
Route::resource('/m/akun', MitraAkunController::class)->middleware('mitra');
Route::resource('/m/ktp', MitraKtpController::class)->middleware('mitra');
Route::resource('/m/profil', MitraProfilController::class)->middleware('mitra');
Route::post('/getKabupaten', [MitraAkunController::class,'getKabupaten'])->middleware('mitra')->name('getKabupaten');


// Auth
Route::get('/login',[LoginController::class,'mitra'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'loginMitra']);
Route::post('/logout',[LoginController::class,'logout']);







 
