<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;

// Define routes for regular users
Route::middleware([\App\Http\Middleware\UserMiddleware::class, 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/users', [PegawaiController::class, 'getAllUsers'])->name('get-all-users');
    Route::get('/home/userdata', [PegawaiController::class, 'getAllUserData']);
    Route::get('/home/users/add', function () {
        return view('addUser');
    });
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
});

// Define routes for admin users
Route::middleware([\App\Http\Middleware\AdminMiddleware::class, 'auth'])->group(function () {
    Route::get('/admin', [HomeController::class, 'admin']);
    Route::get('/admin/profile', [ProfileController::class, 'index2']);
    Route::get('/admin/users', [PegawaiController::class, 'getAllUsers'])->name('user-list');
    Route::get('/admin/users/add', [PegawaiController::class, 'showAddForm'])->name('add-user-form');
    Route::get('/admin/users/{id}/edit', [PegawaiController::class, 'edit'])->name('editUser');
    Route::post('/admin/users/add', [PegawaiController::class, 'addUser'])->name('add-user');
    Route::post('/admin/users/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
    Route::get('/admin/users/edit', [PegawaiController::class, 'editUserForm'])->name('edit-user-form');
    Route::post('/save-user', [PegawaiController::class, 'saveUser'])->name('save-user');
    Route::post('/admin/users/{id}/edit', [PegawaiController::class, 'editUser'])->name('edit-user');
    Route::delete('/admin/users/{id}', [PegawaiController::class, 'deleteUser'])->name('delete-user');
    Route::get('/admin/users/search', [PegawaiController::class, 'searchUser'])->name('search-user');
});

// Authentication routes
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
