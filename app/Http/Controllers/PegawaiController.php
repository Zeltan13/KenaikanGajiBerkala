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
        return view('admin_edit', ['users' => $users, 'id' => $id, 'query' => '']);
    }
    public function editUserForm()
{
    // Logic untuk menampilkan form edit user
    // Misalnya, Anda bisa mengambil data user yang ingin diedit
    $userId = request()->route('id');
    $user = Pegawai::findOrFail($userId);
    return view('editUser', ['user' => $user]);
}
    public function showAddForm()
{
    return view('addUser');
}


    // Function to add a user
    public function addUser(Request $request)
    {
        $user = new Pegawai;

        $user->roleId = $request->roleId;
        $user->nip = $request->nip;
        $user->password = bcrypt($request->password); // Hashing the password
        $user->nama = $request->nama;
        $user->ttl = $request->ttl;
        $user->satuanKerja = $request->satuanKerja;
        $user->golonganPangkat = $request->golonganPangkat;
        $user->tmtGolongan = $request->tmtGolongan;
        $user->tmtJabatan = $request->tmtJabatan;
        $user->statusPegawai = $request->statusPegawai;
        $user->tmtPegawai = $request->tmtPegawai;
        $user->masaKerjaTahun = $request->masaKerjaTahun;
        $user->masaKerjaBulan = $request->masaKerjaBulan;
        
        $user->save();

        return redirect('/home/users')->with('success', 'User added successfully');
    }

    // Function to get all user data
    public function getAllUserData()
    {
        $datas = Pegawai::all();
        return view('userData', ['datas' => $datas]);
    }
    public function showEditForm($id)
    {
        $user = Pegawai::find($id);
        if (!$user) {
            return redirect()->route('user-list')->with('error', 'User not found');
        }
        return view('editUser', ['user' => $user]);
    }
    public function edit(Pegawai $pegawai){
        return view('editUser',['pegawai'=>$pegawai]);
    }
    public function saveUser(Request $request)
    {
        if ($request->action == 'add') {
            $user = new Pegawai();
            $user->roleId = $request->roleId;
            $user->nip = $request->nip;
            $user->password = bcrypt($request->password); // Hashing the password
            $user->nama = $request->nama;
            $user->ttl = $request->ttl;
            $user->satuanKerja = $request->satuanKerja;
            $user->golonganPangkat = $request->golonganPangkat;
            $user->tmtGolongan = $request->tmtGolongan;
            $user->tmtJabatan = $request->tmtJabatan;
            $user->statusPegawai = $request->statusPegawai;
            $user->tmtPegawai = $request->tmtPegawai;
            $user->masaKerjaTahun = $request->masaKerjaTahun;
            $user->masaKerjaBulan = $request->masaKerjaBulan;
            $user->save();

            return redirect('/home/users')->with('success', 'Pegawai berhasil ditambahkan');
        } elseif ($request->action == 'edit') {
            return $this->editUser($request);
        }
    }

    public function editUser(Request $request, $id)
    {
        $user = Pegawai::find($id);

        if (!$user) {
            return redirect('/home/users')->with('error', 'User not found');
        }

        $user->roleId = $request->roleId;
        $user->nip = $request->nip;
        if ($request->password) {
            $user->password = bcrypt($request->password); // Hashing the password
        }
        $user->nama = $request->nama;
        $user->ttl = $request->ttl;
        $user->satuanKerja = $request->satuanKerja;
        $user->golonganPangkat = $request->golonganPangkat;
        $user->tmtGolongan = $request->tmtGolongan;
        $user->tmtJabatan = $request->tmtJabatan;
        $user->statusPegawai = $request->statusPegawai;
        $user->tmtPegawai = $request->tmtPegawai;
        $user->masaKerjaTahun = $request->masaKerjaTahun;
        $user->masaKerjaBulan = $request->masaKerjaBulan;

        $user->save();
        
        return redirect('/home/users')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
{
    $user = Pegawai::find($id);

    if (!$user) {
        return redirect()->route('user-list')->with('error', 'User not found');
    }

    $user->delete();

    return redirect()->route('user-list')->with('success', 'User deleted successfully');
}


    // Function to search users
    public function searchUser(Request $request)
    {
        $query = $request->input('query');
        $users = Pegawai::where('nama', 'LIKE', "%$query%")
                        ->orWhere('nip', 'LIKE', "%$query%")
                        ->orWhere('satuanKerja', 'LIKE', "%$query%")
                        ->get();

        return view('admin_edit', ['users' => $users, 'query' => $query]);
    }
    


}
