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
Route::get('/admin/profile',[ProfileController::class,'index2']);
// Route::get('/home',[HomeController::class,'getAllUserData']);
Route::get('/home/users',[Pegawai::class,'getAllUsers']);
Route::get('/home/userdata',[Pegawai::class,'getAllUserData']);
Route::get('/home/users/add',function (){
    return view('addUser');
});
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/update-password', 'App\Http\Controllers\ProfileController@updatePassword')->name('update-password');
// Route::get('/home/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::post('/home/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/edit-pegawai', [PegawaiController::class, 'edit'])->name('edit-pegawai');
Route::post('/edit-pegawai', [PegawaiController::class, 'update'])->name('update-pegawai');
Route::get('/home/users', [PegawaiController::class, 'getAllUsers'])->name('get-all-users');
Route::post('/home/users/add', [PegawaiController::class, 'addUser'])->name('add-user');
Route::post('/add-user', [PegawaiController::class, 'addUser'])->name('add-user');
// Route::post('/edit-user', [PegawaiController::class, 'editUser'])->name('edit-user');
// routes/web.php
Route::get('/admin/users', [PegawaiController::class, 'getAllUsers'])->name('user-list');
Route::get('/admin/users/add', [PegawaiController::class, 'showAddForm'])->name('add-user-form');
Route::get('/admin/users/{id}/edit', [PegawaiController::class, 'edit'])->name('editUser');//edit, product.edit
Route::post('/admin/users/add', [PegawaiController::class, 'addUser'])->name('add-user');
Route::post('/admin/users/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
Route::get('/admin/users/edit', [PegawaiController::class, 'editUserForm'])->name('edit-user-form');
// Route::post('/edit-user', [UserController::class, 'editUser'])->name('edit-user');
Route::post('/save-user', [PegawaiController::class, 'saveUser'])->name('save-user');
Route::post('/admin/users/{id}/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
Route::delete('/admin/users/{id}', [PegawaiController::class, 'deleteUser'])->name('delete-user');
Route::get('/admin/users/search', [PegawaiController::class, 'searchUser'])->name('search-user');


