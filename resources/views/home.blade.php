<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kenaikan Gaji Berkala</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-4 mt-sm-4 bg-light border">
        <div class="sidebar">
            <img src="{{ asset('image/logo BKPSDM.png') }}" class="img-fluid" alt="Deskripsi Gambar">
            <ul class="list-group">
                <li id="home-box" class="list-group-item text-center" onclick="window.location.href='{{ url('/home') }}';">Home</li> <br>
                <li id="profile-box" class="list-group-item text-center" onclick="window.location.href='{{ url('/home/profile') }}';">Profile</li>
                
            </ul>
        </div>
      </div>
      <div class="col-md-10 col-sm-10 mt-sm-4 border">
        <h1>Selamat datang, {{ $dataStatisUser->nama }} </h1>
        <p>Pada {{ $kgbDate ? $kgbDate->format('Y-m-d') : 'No KGB Date' }} adalah Kenaikan Gaji Berkala anda dengan {{ $yearKGB }} tahun {{ $monthKGB }} bulan bekerja</p>

        <hr class="col-md-10 mb-sm-5">
        <div class="row">
          <div class="col-md-10 mb-sm-5" >
            <h3>Informasi Pegawai</h3>
            <table class="table table-borderless mb-sm-5">  <tbody>
                <tr>
                  <th scope="row">Nama</th>
                  <th>:</th>
                  <td class="border">{{ $dataStatisUser->nama }}</td>
                </tr>
                <tr>
                  <th scope="row">Golongan Pangkat</th>
                  <th>:</th>
                  <td class="border">{{ $dataDinamisUser->golonganPangkat }}</td>
                </tr>
                <tr>
                  <th scope="row">TMT Golongan</th>
                  <th>:</th>
                  <td class="border">{{ $dataDinamisUser->tmtGolongan }}</td>
                </tr>
                <tr>
                  <th scope="row">Status Pegawai</th>
                  <th>:</th>
                  <td class="border">{{ $dataDinamisUser->statusPegawai }}</td>
                </tr>
                <tr>
                  <th scope="row">TMT Pegawai</th>
                  <th>:</th>
                  <td class="border">{{ $dataDinamisUser->tmtPegawai }}</td>
                </tr>
                <tr>
                  <th scope="row">Masa Kerja (Tahun)</th>
                  <th>:</th>
                  <td class="border">{{ $dataDinamisUser->masaKerjaTahun }}</td>
                </tr>
                <tr>
                  <th scope="row">Masa Kerja (Bulan)</th>
                  <th class="left">:</th>
                  <td class="border">{{ $dataDinamisUser->masaKerjaBulan }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
