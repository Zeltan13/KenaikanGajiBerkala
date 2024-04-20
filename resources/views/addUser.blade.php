<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
</head>
<body>
    <h1>User Form</h1>
    <form action="/home/users/add" method="post">
        <label for="roleId">Role ID:</label>
        <input type="text" id="roleId" name="roleId"><br>

        <label for="nip">NIP:</label>
        <input type="nip" id="nip" name="nip"><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>

        <label for="ttl">TTL:</label>
        <input type="text" id="ttl" name="ttl"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
