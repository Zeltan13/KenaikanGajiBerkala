<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\UserData;
use App\Models\Pegawai;

class UserDataController extends Controller
{
    function getAllUserData(){
        $datas = Pegawai::all();
        return view('userData',['datas'=>$datas]);
    }
}
