<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Role;

class PegawaiController extends Controller
{
    // Function to get all users
    public function getAllUsers()
    {
        $id = Session::get('userId');
        $users = Pegawai::all();
        $roles = Role::all();
        return view('users', ['users' => $users, 'roles' => $roles, 'id' => $id]);
    }

    // Function to add a user
    public function addUser(Request $request)
    {
        // Assuming you will implement the logic for adding a user
        // $user = new Pegawai;
        
        // $user->roleId = $request->roleId;
        // $user->nip = $request->nip;
        // $user->password = bcrypt($request->password); // Hashing the password
        // $user->nama = $request->nama;
        // $user->ttl = $request->ttl;
        // $user->satuanKerja = $request->satuanKerja;
        // $user->golonganPangkat = $request->golonganPangkat;
        // $user->tmtGolongan = $request->tmtGolongan;
        // $user->tmtJabatan = $request->tmtJabatan;
        // $user->statusPegawai = $request->statusPegawai;
        // $user->tmtPegawai = $request->tmtPegawai;
        // $user->masaKerjaTahun = $request->masaKerjaTahun;
        // $user->masaKerjaBulan = $request->masaKerjaBulan;
        
        // $user->save();

        // return redirect('/home/users')->with('success', 'User added successfully');
    }

    // Function to get all user data
    public function getAllUserData()
    {
        $datas = Pegawai::all();
        return view('userData', ['datas' => $datas]);
    }
}
