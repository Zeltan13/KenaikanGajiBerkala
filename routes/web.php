<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;

//Route User/Pegawai uah rapih
Route::middleware([\App\Http\Middleware\UserMiddleware::class, 'auth'])->group(function () {
    Route::get('/home',[HomeController::class,'index']);
    Route::get('/home/users',[Pegawai::class,'getAllUsers']);//
    Route::get('/home/userdata',[Pegawai::class,'getAllUserData']);// ga perlu
    Route::get('/home/profile', [ProfileController::class, 'index']);
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    
});


Route::middleware([\App\Http\Middleware\AdminMiddleware::class, 'auth'])->group(function () {
    //Route Admin yang yakin perlu
    Route::get('/admin', [HomeController::class, 'admin']);
    Route::get('/admin/profile', [ProfileController::class, 'profileAdmin']);
    Route::get('/admin/users', [PegawaiController::class, 'getAllUsers'])->name('user-list');
    Route::get('/admin/users/add', [PegawaiController::class, 'showAddForm'])->name('add-user-form');
    Route::post('/admin/users/add', [PegawaiController::class, 'addUser'])->name('add-user');

    Route::post('/save-user', [PegawaiController::class, 'saveUser'])->name('save-user');
    Route::post('/admin/users/{id}/edit', [PegawaiController::class, 'update'])->name('updateUser');
    Route::get('/admin/users/search', [PegawaiController::class, 'searchUser'])->name('search-user');

    //Route admin perlu dicek
    Route::get('/admin/users/{id}/edit', [PegawaiController::class, 'edit'])->name('editUser');
    Route::post('/admin/users/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
    
    Route::get('/admin/users/edit', [PegawaiController::class, 'editUserForm'])->name('edit-user-form');
    Route::post('/admin/users/{id}/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
    Route::delete('/admin/users/{id}', [PegawaiController::class, 'deleteUser'])->name('delete-user');
    
    Route::get('/admin/users/{id}/edit', [PegawaiController::class, 'edit'])->name('editUser');//edit, product.edit
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
});

// Route Authentikasi
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
