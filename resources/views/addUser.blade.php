<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addUser.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Tambah Pegawai</title>
</head>
<body>
    <div class="container mt-5 col-md-5">
        <h1>{{ isset($user) ? 'Edit Pegawai' : 'Tambah Pegawai' }}</h1>
        <form id="pegawaiForm" method="POST" action="{{ route('save-user') }}">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
            <div class="mb-3">
                <label for="roleId" class="form-label">Role ID</label>
                <input type="text" class="form-control" id="roleId" name="roleId" value="{{ isset($user) ? $user->roleId : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ isset($user) ? $user->nip : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($user) ? $user->nama : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="ttl" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl" value="{{ isset($user) ? $user->ttl : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="satuanKerja" class="form-label">Satuan Kerja</label>
                <input type="text" class="form-control" id="satuanKerja" name="satuanKerja" value="{{ isset($user) ? $user->satuanKerja : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="golonganPangkat" class="form-label">Golongan Pangkat</label>
                <input type="text" class="form-control" id="golonganPangkat" name="golonganPangkat" value="{{ isset($user) ? $user->golonganPangkat : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtGolongan" class="form-label">TMT Golongan</label>
                <input type="text" class="form-control" id="tmtGolongan" name="tmtGolongan" value="{{ isset($user) ? $user->tmtGolongan : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtJabatan" class="form-label">TMT Jabatan</label>
                <input type="text" class="form-control" id="tmtJabatan" name="tmtJabatan" value="{{ isset($user) ? $user->tmtJabatan : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="statusPegawai" class="form-label">Status Pegawai</label>
                <input type="text" class="form-control" id="statusPegawai" name="statusPegawai" value="{{ isset($user) ? $user->statusPegawai : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtPegawai" class="form-label">TMT Pegawai</label>
                <input type="text" class="form-control" id="tmtPegawai" name="tmtPegawai" value="{{ isset($user) ? $user->tmtPegawai : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="masaKerjaTahun" class="form-label">Masa Kerja (Tahun)</label>
                <input type="text" class="form-control" id="masaKerjaTahun" name="masaKerjaTahun" value="{{ isset($user) ? $user->masaKerjaTahun : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="masaKerjaBulan" class="form-label">Masa Kerja (Bulan)</label>
                <input type="text" class="form-control" id="masaKerjaBulan" name="masaKerjaBulan" value="{{ isset($user) ? $user->masaKerjaBulan : '' }}" required>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/admin/users') }}" class="btn btn-primary">Kembali</a>
            </div>
            <button type="submit" name="action" value="add" class="btn btn-primary">Tambah</button>
            
        </form>
    </div>

    <script>
        document.getElementById('pegawaiForm').addEventListener('submit', function (event) {
            var action = document.activeElement.getAttribute('value');
            if (action === 'edit') {
                this.action = '{{ url("/admin/users") }}/' + document.getElementById('user_id').value + '/edit';
            }
        });
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addUser.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Tambah Pegawai</title>
</head>
<body>
    <div class="container mt-5 col-md-5">
        <h1>{{ isset($user) ? 'Edit Pegawai' : 'Tambah Pegawai' }}</h1>
        <form id="pegawaiForm" method="POST" action="{{ route('save-user') }}">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
            <div class="mb-3">
                <label for="roleId" class="form-label">Role ID</label>
                <input type="text" class="form-control" id="roleId" name="roleId" value="{{ isset($user) ? $user->roleId : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ isset($user) ? $user->nip : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($user) ? $user->nama : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="ttl" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl" value="{{ isset($user) ? $user->ttl : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="satuanKerja" class="form-label">Satuan Kerja</label>
                <input type="text" class="form-control" id="satuanKerja" name="satuanKerja" value="{{ isset($user) ? $user->satuanKerja : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="golonganPangkat" class="form-label">Golongan Pangkat</label>
                <input type="text" class="form-control" id="golonganPangkat" name="golonganPangkat" value="{{ isset($user) ? $user->golonganPangkat : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtGolongan" class="form-label">TMT Golongan</label>
                <input type="text" class="form-control" id="tmtGolongan" name="tmtGolongan" value="{{ isset($user) ? $user->tmtGolongan : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtJabatan" class="form-label">TMT Jabatan</label>
                <input type="text" class="form-control" id="tmtJabatan" name="tmtJabatan" value="{{ isset($user) ? $user->tmtJabatan : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="statusPegawai" class="form-label">Status Pegawai</label>
                <input type="text" class="form-control" id="statusPegawai" name="statusPegawai" value="{{ isset($user) ? $user->statusPegawai : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="tmtPegawai" class="form-label">TMT Pegawai</label>
                <input type="text" class="form-control" id="tmtPegawai" name="tmtPegawai" value="{{ isset($user) ? $user->tmtPegawai : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="masaKerjaTahun" class="form-label">Masa Kerja (Tahun)</label>
                <input type="text" class="form-control" id="masaKerjaTahun" name="masaKerjaTahun" value="{{ isset($user) ? $user->masaKerjaTahun : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="masaKerjaBulan" class="form-label">Masa Kerja (Bulan)</label>
                <input type="text" class="form-control" id="masaKerjaBulan" name="masaKerjaBulan" value="{{ isset($user) ? $user->masaKerjaBulan : '' }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="action" value="add" class="btn btn-primary">Tambah</button>
                <a href="{{ url('/admin/users') }}" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('pegawaiForm').addEventListener('submit', function (event) {
            var action = document.activeElement.getAttribute('value');
            if (action === 'edit') {
                this.action = '{{ url("/admin/users") }}/' + document.getElementById('user_id').value + '/edit';
            }
        });
    </script>
</body>
</html>
