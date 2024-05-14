<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/sideBar.css')}}" rel="stylesheet">
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">

    <title>Profile</title>
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
    
<!-- <div class="row">
  <div class="col-md-1 bg-success">.g-col-6</div>
  <div class="col-md-1 bg-primary">.g-col-6</div>
</div> -->

    <div class=content>
        <h1>Profile Page</h1>
        <label for="password">Ganti Password:</label>
        <input type="password" id="password" name="password" style="margin-left: 40px"><br>
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
        </form>

    </div>
    <!-- Profile Page Content --> 
    
</body>
</html>