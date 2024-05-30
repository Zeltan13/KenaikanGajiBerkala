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
public function profileAdmin()
{
    // Logic untuk menampilkan halaman profile
    return view('profile_admin');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:5',
    ]);

    $user = Auth::user();

    // Periksa apakah password yang dimasukkan pengguna sesuai dengan password yang disimpan
    $isPlainTextPassword = !preg_match('/^\$2[ayb]\$.{56}$/', $user->password);

    if ($isPlainTextPassword) {
        // If the password is plain text, check if the plain text passwords match
        if ($request->current_password !== $user->password) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Once the plain text password is verified, hash the new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    } else {
        // If the password is hashed, use Hash::check to verify
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Update the password with the new hashed password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    // Update password dengan password baru yang telah di-hash
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password berhasil diubah');
}
public function admin(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:5',
    ]);

    $user = Auth::user();

    // Periksa apakah password yang dimasukkan pengguna sesuai dengan password yang disimpan
    $isPlainTextPassword = !preg_match('/^\$2[ayb]\$.{56}$/', $user->password);

    if ($isPlainTextPassword) {
        // If the password is plain text, check if the plain text passwords match
        if ($request->current_password !== $user->password) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Once the plain text password is verified, hash the new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    } else {
        // If the password is hashed, use Hash::check to verify
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Update the password with the new hashed password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah');
    }

    // Update password dengan password baru yang telah di-hash
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('success', 'Password berhasil diubah');
}
}
