<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kenaikan Gaji Berkala</title>
  <link rel="stylesheet" href="{{ asset('css/homeAdmin.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="sidebar">
          <img src="{{ asset('image/logo BKPSDM.png') }}" class="img-fluid mb-4" alt="Deskripsi Gambar">
          <ul class="list-group">
            <li id="home-box" class="list-group-item text-center" onclick="window.location.href='{{ url('/admin') }}';">Home</li>
            <li id="profile-box" class="list-group-item text-center" onclick="window.location.href='{{ url('/admin/profile') }}';">Profile</li>
            <li id="profile-box" class="list-group-item text-center mb-3" onclick="window.location.href='{{ url('/admin/users') }}';">Edit Data</li>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="content">
          <h1 class="mb-3">Selamat datang, {{ $dataStatisUser->nama }}</h1>
          <p>Pada {{ $kgbDate ? $kgbDate->format('Y-m-d') : 'No KGB Date' }} adalah Kenaikan Gaji Berkala anda dengan {{ $yearKGB }} tahun {{ $monthKGB }} bulan bekerja</p>
          <hr>
          <h3 class="mb-3">Informasi Pegawai</h3>
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th scope="row">Nama</th>
                <td>:</td>
                <td>{{ $dataStatisUser->nama }}</td>
              </tr>
              <tr>
                <th scope="row">Golongan Pangkat</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->golonganPangkat }}</td>
              </tr>
              <tr>
                <th scope="row">TMT Golongan</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->tmtGolongan }}</td>
              </tr>
              <tr>
                <th scope="row">Status Pegawai</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->statusPegawai }}</td>
              </tr>
              <tr>
                <th scope="row">TMT Pegawai</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->tmtPegawai }}</td>
              </tr>
              <tr>
                <th scope="row">Masa Kerja (Tahun)</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->masaKerjaTahun }}</td>
              </tr>
              <tr>
                <th scope="row">Masa Kerja (Bulan)</th>
                <td>:</td>
                <td>{{ $dataDinamisUser->masaKerjaBulan }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
