<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login');

Route::get('/home',[HomeController::class,'index']);
Route::get('/home/users',[UserController::class,'getAllUsers']);
Route::get('/home/userdata',[UserDataController::class,'getAllUserData']);
Route::get('/home/users/add',function (){
    return view('addUser');
});
Route::post('home/users/add',[UserController::class,'addUser']);
