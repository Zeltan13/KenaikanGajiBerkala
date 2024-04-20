<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Datas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Satuan Kerja</th>
            <th>Golongan Pangkat</th>
            <th>TMT Golongan</th>
            <th>TMT Jabatan</th>
            <th>Status Pegawai</th>
            <th>TMT Pegawai</th>
            <th>Masa Kerja Tahun</th>
            <th>Masa Kerja Bulan</th>
            <th>TMT KGB</th>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->userId }}</td>
            <td>{{ $data->satuanKerja }}</td>
            <td>{{ $data->golonganPangkat }}</td>
            <td>{{ $data->tmtGolongan }}</td>
            <td>{{ $data->tmtJabatan }}</td>
            <td>{{ $data->statusPegawai }}</td>
            <td>{{ $data->tmtPegawai }}</td>
            <td>{{ $data->masaKerjaTahun }}</td>
            <td>{{ $data->masaKerjaBulan }}</td>
        </tr>
        @endforeach   
    </table>
    <!-- <script>
        (function(){
            var a = @json($datas);
            var b = document.querySelector(".apaAja")
            var d = []
            var date = new Date
            console.log(date)
            a.forEach(function(el,i){
                console.log(el,i)
                var c = document.createElement("p")
                c.innerHTML= el.nama
                b.appendChild(c)
                el.test=el.nama + " " + el.nip 
                d.push(el)

            })
            console.log(d)
        })()
    </script> -->

</body>
</html>