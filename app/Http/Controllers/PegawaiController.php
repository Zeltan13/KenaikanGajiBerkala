<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    // Function to get all users
    public function getAllUsers()
    {
        $id = Session::get('userId');
        $users = Pegawai::all();
        foreach ($users as $user) {
            // if ($datas) {
            //     $golonganPangkat = $datas->golonganPangkat;
            //     $masaKerjaTahun = $datas->masaKerjaTahun;
            //     $masaKerjaBulan = $datas->masaKerjaBulan;
            //     $tmtGolongan = Carbon::parse($datas->tmtGolongan);
            //     $timeToKGB = $this->calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan);
            //     $kgbDate = $tmtGolongan->addMonths($timeToKGB);
            //     $yearKGB = $timeToKGB-$masaKerjaTahun;
            // } else {
            //     $kgbDate = null;
            //     $yearKGB = null;
            // }
            $tmtGolongan = Carbon::parse($user->tmtGolongan);
            $user->timeToKGB = $this->calculateTimeToKGB($user->golonganPangkat, $user->masaKerjaTahun, $user->masaKerjaBulan);
            $kgbDate = $tmtGolongan->addMonths($user->timeToKGB);
            $user->kgbDate = $kgbDate->format('Y-m-d');
        }
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

        return redirect('/admin/users')->with('success', 'User added successfully');
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
    // public function edit(Pegawai $pegawai){
    //     return view('editUser',['pegawai'=>$pegawai]);
    // }
    public function edit($id)
    {
        $user = Pegawai::findOrFail($id);
        return view('editUser', ['user' => $user]);
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

            return redirect('/admin/users')->with('success', 'Pegawai berhasil ditambahkan');
        } elseif ($request->action == 'edit') {
            return $this->editUser($request);
        }
    }

    public function editUser(Request $request, $id)
    {
        $user = Pegawai::find($id);

        if (!$user) {
            return redirect('/admin/users')->with('error', 'User not found');
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
    
   
    public function update(Request $request, $id)
    {
        $request->validate([
            'roleId' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'satuanKerja' => 'required',
            'golonganPangkat' => 'required',
            'tmtGolongan' => 'required',
            'tmtJabatan' => 'required',
            'statusPegawai' => 'required',
            'tmtPegawai' => 'required',
            'masaKerjaTahun' => 'required',
            'masaKerjaBulan' => 'required',
        ]);

        $user = Pegawai::findOrFail($id);
        $user->roleId = $request->roleId;
        $user->nip = $request->nip;
        if ($request->password) {
            $user->password = Hash::make($request->password);
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

        return redirect()->route('user-list')->with('success', 'User updated successfully');
    }
    private function calculateTimeToKGB($golonganPangkat, $masaKerjaTahun, $masaKerjaBulan)
    {
        $evenMasaKerja = $masaKerjaTahun % 2 === 0;

        if (in_array($golonganPangkat, ['III/a', 'III/b', 'III/c', 'III/d', 'IV/a', 'IV/b', 'IV/c', 'IV/d', 'I/a'])) {
            $timeToKGB = $evenMasaKerja ? 24 : 12;
        } elseif (in_array($golonganPangkat, ['I/b', 'I/c', 'I/d', 'II/a', 'II/b', 'II/c', 'II/d'])) {
            $timeToKGB = $evenMasaKerja ? 12 : 24;
            if (in_array($golonganPangkat, ['I/b', 'I/c', 'I/d', 'II/b', 'II/c', 'II/d'])) {
                $masaKerjaTahun = max(0, $masaKerjaTahun - 3);
            }
            if ($golonganPangkat == 'II/a' && $masaKerjaTahun <= 1) {
                $timeToKGB = 0;
            }
        } else {
            $timeToKGB = 12;
        }

        $timeToKGB -= $masaKerjaBulan;
        return $timeToKGB;
    }

}
