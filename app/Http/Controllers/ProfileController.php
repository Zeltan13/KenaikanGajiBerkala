<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
{
    // Logic untuk menampilkan halaman profile
    return view('profile');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:5',
    ]);

    $user = Auth::user();

    // Periksa apakah password yang dimasukkan pengguna sesuai dengan password yang disimpan
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
    }

    // Update password dengan password baru yang telah di-hash
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password berhasil diubah');
}

}
