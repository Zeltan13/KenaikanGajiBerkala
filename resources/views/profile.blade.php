<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/sideBar.css')}}" rel="stylesheet">
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
    <div class=profile style="float:right; width: 90%;">
        <h1>Profile Page</h1>
    </div>
    <!-- Profile Page Content --> 
</body>
</html>