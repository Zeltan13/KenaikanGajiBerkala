<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/adminEdit.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Daftar Pegawai</title>
</head>
<body>
    @if (session('role') === 1)
    <div class="container mt-5 col-md-8">
        <h1>Daftar Pegawai</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Search Bar -->
        <div class="d-flex justify-content-end mb-3">
            <form action="{{ route('search-user') }}" method="GET" class="form-inline">
                <input type="text" name="query" class="form-control" placeholder="Filter Berdasarkan Nama atau NIP" value="{{ request()->input('query') }}">
                <input type="text" name="satuanKerja" class="form-control ml-2" placeholder="Filter Satuan Kerja" value="{{ request()->input('satuanKerja') }}">
                <input type="month" name="kgbDate" class="form-control ml-2" placeholder="Filter KGB Month" value="{{ request()->input('kgbDate') }}">
                <button type="submit" class="btn btn-primary ml-2">Filter</button>
                @if(request()->has('query') || request()->has('satuanKerja') || request()->has('kgbDate'))
                    <a href="{{ route('search-user', array_merge(request()->except(['page', 'query', 'satuanKerja', 'kgbDate']), ['page' => null])) }}" class="btn btn-danger ml-2">Remove Filter</a>
                @endif
            </form>
        </div>
        
        <table class="table table-striped col-md-9 col-sm-8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Satuan Kerja</th>
                    <th>Golongan Pangkat</th>
                    <th>TMT Golongan</th>
                    <th>TMT Jabatan</th>
                    <th>Status Pegawai</th>
                    <th>TMT Pegawai</th>
                    <th>Masa Kerja (Tahun)</th>
                    <th>Masa Kerja (Bulan)</th>
                    <th>Kenaikan Gaji Berkala</th> 
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr @if(request()->input('query') && strpos(strtolower($user->nama), strtolower(request()->input('query'))) !== false) class="table-warning" @endif>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nip }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->satuanKerja }}</td>
                    <td>{{ $user->golonganPangkat }}</td>
                    <td>{{ $user->tmtGolongan }}</td>
                    <td>{{ $user->tmtJabatan }}</td>
                    <td>{{ $user->statusPegawai }}</td>
                    <td>{{ $user->tmtPegawai }}</td>
                    <td>{{ $user->masaKerjaTahun }}</td>
                    <td>{{ $user->masaKerjaBulan }}</td>
                    <td>{{ $user->kenaikanGajiBerkala }}</td>
                    <td>
                        <a href="{{ route('editUser', $user->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('delete-user', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    @else
    <div class="container mt-5 col-md-8">
        <h1>Daftar Pegawai</h1>
        <p>Anda tidak memiliki izin untuk melihat daftar pegawai.</p>
    </div>
    @endif
</body>
</html>
           
