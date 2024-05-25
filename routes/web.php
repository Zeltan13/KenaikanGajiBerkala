<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login');

Route::get('/home',[HomeController::class,'index']);
Route::get('/admin',[HomeController::class,'admin']);
// Route::get('/home',[HomeController::class,'getAllUserData']);
Route::get('/home/users',[Pegawai::class,'getAllUsers']);
Route::get('/home/userdata',[Pegawai::class,'getAllUserData']);
Route::get('/home/users/add',function (){
    return view('addUser');
});
Route::post('home/users/add',[Pegawai::class,'addUser']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/update-password', 'App\Http\Controllers\ProfileController@updatePassword')->name('update-password');
