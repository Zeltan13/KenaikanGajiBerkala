<!-- resources/views/admin_edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/addUser.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Daftar Pegawai</title>
</head>
<body>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Role ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nip }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->roleId }}</td>
                    <td>
                        <a href="{{ route('edit-user', $user->id) }}" class="btn btn-secondary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('add-user-form') }}" class="btn btn-primary">Tambah Pegawai</a>
    </div>
</body>
</html>
