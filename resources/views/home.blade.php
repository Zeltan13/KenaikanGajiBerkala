<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KGB</title>
    <link rel="stylesheet" href="{{ asset('css/sideBar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sideBar.css') }}">
</head>
<body>
    <div class="menu" style="float:left; width: 10%;">
        <div class="text-Sidebar">
            <h2>Sidebar</h2>
        </div>
            <div class="sidebar">
                <ul>
                    <li><a href="{{ url('/home') }}" id="home">Home</a></li>
                    <li><a href="{{ url('/profile') }}" id="profil">Profile</a></li>
                </ul>
            </div>
    </div>

    <div class="content">
        <h1>Selamat datang, {{ $dataStatisUser->nama }}</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Golongan/Pangkat</th>
                    <th>TMT Golongan</th>
                    <th>Status Pegawai</th>
                    <th>TMT Pegawai</th>
                    <th>Masa Kerja (Tahun)</th>
                    <th>Masa Kerja (Bulan)</th>
                    <th>Kenaikan Gaji Berkala</th>
                </tr>
            </thead>
            <tbody>
                @if($dataStatisUser && $dataDinamisUser)
                    <tr>
                        <td>{{ $dataStatisUser->nama }}</td>
                        <td>{{ $dataDinamisUser->golonganPangkat }}</td>
                        <td>{{ $dataDinamisUser->tmtGolongan }}</td>
                        <td>{{ $dataDinamisUser->statusPegawai }}</td>
                        <td>{{ $dataDinamisUser->tmtPegawai }}</td>
                        <td>{{ $dataDinamisUser->masaKerjaTahun }}</td>
                        <td>{{ $dataDinamisUser->masaKerjaBulan }}</td>
                        <td>{{ $kgbDate ? $kgbDate->format('Y-m-d') : 'No KGB Date' }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="8">No user data found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>