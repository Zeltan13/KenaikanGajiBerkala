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
        $users = collect(); // Initialize $users as an empty collection
        $datas = Pegawai::all();
        $role = Session::get('role');

        // Define $users based on the role
        if ($role === 1) {
            $users = Pegawai::paginate(50)->onEachSide(3);; // Use paginate() here
        } else if ($role >= 3 && $role <= 65) {
            $satuanKerja = $this->getSatuanKerjaByRole($role);
            $users = Pegawai::where('satuanKerja', $satuanKerja)->paginate(50); // Use paginate() here
        } else {
            $users = collect(); // Empty collection for unauthorized roles
        }

        // Process the users
        foreach ($users as $user) {
            $tempId = $user->id;
            $tmtGolongan = Carbon::parse($user->tmtGolongan);
            $user->timeToKGB = $this->calculateTimeToKGB($user->golonganPangkat, $user->masaKerjaTahun, $user->masaKerjaBulan);
            $kgbDate = $tmtGolongan->addMonths($user->timeToKGB);
            $user->kgbDate = $kgbDate->format('Y-m-d');
            
            // Find the user in $datas by $tempId
            $data = $datas->find($tempId);

            // Update the calculated KGB date for the found user
            if ($data) {
                $data->kenaikanGajiBerkala = $kgbDate->format('Y-m-d'); // Set the kenaikanGajiBerkala attribute
                $data->save(); // Save the user to the database
            }
        }

        return view('admin_edit', ['users' => $users, 'id' => $id, 'query' => '']);
    }
    public function getUserBySatuanKerja($satuanKerja)
    {
        $id = Session::get('userId');

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
        $role = Session::get('role');
        $satuanKerja = $this->getSatuanKerjaByRole($role);

        return view('addUser', ['role' => $role, 'satuanKerja' => $satuanKerja]);
    }


    // Function to add a user
    public function addUser(Request $request)
    {
        $role = Session::get('role');
        $satuanKerja = $this->getSatuanKerjaByRole($role);

        // Validasi jika pengguna biasa mencoba menambahkan pegawai dengan satuan kerja berbeda
        if ($role !== 1 && $request->satuanKerja !== $satuanKerja) {
            return redirect()->back()->withErrors(['satuanKerja' => 'Anda tidak diizinkan menambahkan pegawai dengan satuan kerja ini.']);
        }

        $user = new Pegawai;
        $user->roleId = $request->roleId;
        $user->nip = $request->nip;
        $user->password = bcrypt($request->password);
        $user->nama = $request->nama;
        $user->ttl = $request->ttl;

        // Jika role bukan admin super, set satuanKerja sesuai dengan role pengguna yang sedang login
        if ($role !== 1) {
            $user->satuanKerja = $satuanKerja;
        } else {
            $user->satuanKerja = $request->satuanKerja;
        }

        $user->golonganPangkat = $request->golonganPangkat;
        $user->tmtGolongan = $request->tmtGolongan;
        $user->tmtJabatan = $request->tmtJabatan;
        $user->statusPegawai = $request->statusPegawai;
        $user->tmtPegawai = $request->tmtPegawai;
        $user->masaKerjaTahun = $request->masaKerjaTahun;
        $user->masaKerjaBulan = $request->masaKerjaBulan;

        $timeToKGB = $this->calculateTimeToKGB($user->golonganPangkat, $user->masaKerjaTahun, $user->masaKerjaBulan);
        $kgbDate = Carbon::parse($user->tmtGolongan)->addMonths($timeToKGB);
        $user->kenaikanGajiBerkala = $kgbDate->format('Y-m-d');

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
        
        return redirect('/admin/users')->with('success', 'User updated successfully');
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


public function searchUser(Request $request)
    {
        $role = Session::get('role');
        $query = $request->input('query');
        $filterSatuanKerja = $request->input('satuanKerja');
        $filterKGBDate = $request->input('kgbDate');

        $baseQuery = Pegawai::query();

        if ($role === 1) {
            $baseQuery = Pegawai::query();
        } else if ($role >= 3 && $role <= 65) {
            $satuanKerja = $this->getSatuanKerjaByRole($role);
            $baseQuery = $baseQuery->where('satuanKerja', $satuanKerja);
        }

        if ($query) {
            $baseQuery = $baseQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('nama', 'LIKE', "%$query%")
                             ->orWhere('nip', 'LIKE', "%$query%");
            });
        }

        if ($filterSatuanKerja) {
            $baseQuery = $baseQuery->where('satuanKerja', 'LIKE', "%$filterSatuanKerja%");
        }

        if ($filterKGBDate) {
            [$year, $month] = explode('-', $filterKGBDate);
            $baseQuery = $baseQuery->whereYear('kenaikanGajiBerkala', $year)
                                   ->whereMonth('kenaikanGajiBerkala', $month);
        }

        $users = $baseQuery->paginate(50);

        return view('admin_edit', ['users' => $users, 'query' => $query]);
    }
    
    private function getSatuanKerjaByRole($role){
        $roles = [
            3 => "Badan Kepegawaian dan Pengembangan Sumber Daya Manusia",
            4 => "Badan Kesatuan Bangsa dan Politik",
            5 => "Badan Keuangan dan Aset Daerah",
            6 => "Badan Pendapatan Daerah",
            7 => "Badan Perencanaan Pembangunan, Penelitian dan Pengembangan",
            8 => "Dinas Arsip dan Perpustakaan",
            9 => "Dinas Cipta Karya, Bina Konstruksi dan Tata Ruang",
            10 => "Dinas Kebakaran dan Penanggulangan Bencana",
            11 => "Dinas Kebudayaan dan Pariwisata",
            12 => "Dinas Kependudukan dan Pencatatan Sipil",
            13 => "Dinas Kesehatan",
            14 => "Dinas Ketahanan Pangan dan Pertanian",
            15 => "Dinas Ketenagakerjaan",
            16 => "Dinas Komunikasi dan Informatika",
            17 => "Dinas Koperasi, Usaha Mikro, Kecil dan Menengah",
            18 => "Dinas Lingkungan Hidup",
            19 => "Dinas Pemberdayaan Perempuan dan Perlindungan Anak",
            20 => "Dinas Pemuda dan Olahraga",
            21 => "Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu",
            22 => "Dinas Pendidikan",
            23 => "Dinas Pengendalian Penduduk dan Keluarga Berencana",
            24 => "Dinas Perdagangan dan Perindustrian",
            25 => "Dinas Perhubungan",
            26 => "Dinas Perumahan dan Kawasan Permukiman",
            27 => "Dinas Sosial",
            28 => "Dinas Sumber Daya Air dan Bina Marga",
            29 => "Inspektorat Daerah",
            30 => "Kecamatan Andir",
            31 => "Kecamatan Antapani",
            32 => "Kecamatan Arcamanik",
            33 => "Kecamatan Astana Anyar",
            34 => "Kecamatan Babakan Ciparay",
            35 => "Kecamatan Bandung Kidul",
            36 => "Kecamatan Bandung Kulon",
            37 => "Kecamatan Bandung Wetan",
            38 => "Kecamatan Batununggal",
            39 => "Kecamatan Bojongloa Kaler",
            40 => "Kecamatan Bojongloa Kidul",
            41 => "Kecamatan Buahbatu",
            42 => "Kecamatan Cibeunying Kaler",
            43 => "Kecamatan Cibeunying Kidul",
            44 => "Kecamatan Cibiru",
            45 => "Kecamatan Cicendo",
            46 => "Kecamatan Cidadap",
            47 => "Kecamatan Cinambo",
            48 => "Kecamatan Coblong",
            49 => "Kecamatan Gedebage",
            50 => "Kecamatan Kiaracondong",
            51 => "Kecamatan Lengkong",
            52 => "Kecamatan Mandalajati",
            53 => "Kecamatan Panyileukan",
            54 => "Kecamatan Rancasari",
            55 => "Kecamatan Regol",
            56 => "Kecamatan Sukajadi",
            57 => "Kecamatan Sukasari",
            58 => "Kecamatan Sumur Bandung",
            59 => "Kecamatan Ujungberung",
            60 => "Rumah Sakit Khusus Gigi dan Mulut",
            61 => "Rumah Sakit Umum Daerah",
            62 => "Rumah Sakit Umum Daerah Bandung Kiwari",
            63 => "Satuan Polisi Pamong Praja",
            64 => "Sekretariat Daerah",
            65 => "Sekretariat Dewan Perwakilan Rakyat Daerah",
        ];
    
        return $roles[$role] ?? null;
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

