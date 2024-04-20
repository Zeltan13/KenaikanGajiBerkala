<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users({{ $id }})</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>roleId</th>
            <th>Password</th>
            <th>NIP</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Role</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->roleId }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->nip }}</td>
            <td>{{ $user->ttl }}</td>
            <td>{{ $roles[(($user->roleId)-1)]->role}}</td>
        </tr>
        @endforeach   
    </table>
    <div class="apaAja">
        
    </div>
    <script>
        (function(){
            var a = @json($users);
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
    </script>
</body>
</html>