<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    public function index(){
        $userId = Session::get('userId');
        $user = User::where('id', $userId)->first();
        echo "<pre>";
        var_dump($user->nama);
        echo "</pre>";
        
        return view('home', ['data' => $user]);
        // // $user = User::where('nip', $nip)->first();
        // //$id = $request -> id;
        // $roleId = User::select('roleId');
        // echo "<pre>";
        
        // echo "</pre>";
        // //$strRole = strval($roleId);
        // return view('home', ['nama'=> "Helo"]);
    }
}
