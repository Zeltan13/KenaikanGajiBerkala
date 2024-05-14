<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/addUser.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>User Form</title>
</head>
<body>
    <div class="container mt-5 col-md-5">
            <h1>User Form</h1>
            <form action="/home/users/add" method="post">
                <!-- <label for="roleId">Role ID:</label>
                <input type="text" id="roleId" name="roleId" style="margin-left: 50px" ><br>
        
                <label for="nip">NIP:</label>
                <input type="nip" id="nip" name="nip" style="margin-left: 75px"><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" style="margin-left: 40px"><br>
        
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" style="margin-left: 63px"><br>
        
                <label for="ttl">TTL:</label>
                <input type="text" id="ttl" name="ttl" style="margin-left: 72px"><br> -->
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Role ID</label>
                    <input type="text" class="form-control" id="roleId" placeholder="Example input placeholder">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" placeholder="Another input placeholder">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                </div>
                            
                <button type="submit">Submit</button>
            </form>
            </div>
</body>
</html>
